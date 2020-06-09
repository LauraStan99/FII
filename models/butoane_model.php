<?php
    use PHPMailer\PHPMailer\PHPMailer;

    class Butoane_model extends Model{
        
        public function __construct(){
            parent::__construct();
        }

        /**
         * creez un fisier xml cu datele preluate din tabela produse
         * respectiv preiau cele mai populare 10 produse in functie de nr accesarilor
         * tagg urile din xml vor fi channel
         * care va contine un titlu, link si o descriere
         * iar apoi mai multe item-uri care contin si ele un titlu, link si descriere
         * xml ul este salvat in public/util
         */
        public function createXML()
        {
            $result = $this->db->selectOrderByLimit('produse','nr_accesari', 'desc', 10);
    
            $xml = new DOMDocument("1.0");
            $xml->formatOutput = true;
    
            $channel = $xml->createElement("channel");
            $xml->appendChild($channel);
    
            $title = $xml->createElement('title', 'Impressed');
            $channel->appendChild($title);
            $link = $xml->createElement('link', 'http://localhost/Impressed/home');
            $channel->appendChild($link);
            $description = $xml->createElement('description', 'Magazin online');
            $channel->appendChild($description);
    
            while ($row = $result->fetch()) {
    
                $item = $xml->createElement('item');
                $channel->appendChild($item);
    
                $title = $xml->createElement('title', $row['nume']);
                $item->appendChild($title);
    
                $link = $xml->createElement('link', "http://localhost/Impressed/produse/produs/" . $row['id_produs']);
                $item->appendChild($link);
    
                $description = $xml->createElement('description', $row['descriere']);
                $item->appendChild($description);
            }
            $xml->save("public/util/popularitate.xml");
        }
        

        /**
         * creez un fisier xml cu toti utilizatorii aplicatiei
         * acestia vor fi preluati din baza de date Impressed din tabela utilizatori
         * tagg-ul principal va fi users
         * care va contine mai multi user
         * cu un id si email
         * xml ul este salvat in public/util
         */
        public function createXMLUsers()
        {
            $result = $this->db->selectAll('utilizatori');
    
            $xml = new DOMDocument("1.0");
            $xml->formatOutput = true;
    
            $users = $xml->createElement("users");
            $xml->appendChild($users);

    
            while ($row = $result->fetch()) {
    
                $user = $xml->createElement('user');
                $users->appendChild($user);
    
                $id = $xml->createElement('id', $row['id_utilizator']);
                $user->appendChild($id);
    
                $email = $xml->createElement('email', $row['email']);
                $user->appendChild($email);
            }
            $xml->save("public/util/utilizatori.xml");
        }
        

        public function getPopularProducts()
        {
         return $this->db->selectOrderByLimit('produse','nr_accesari', 'desc', 10);
        }
    
        /**
         * creez un array cu datele despre produsul cu id-ul si marimea date ca parametru
         * in functie de marimea data ca parametru, caut cate produse cu acea marimea exista
         * daca cantiatea este 0, returnez false
         * altfel, caut sa vad daca produsul nu este deja in wishlist pt utilizatorul logat,
         * daca nu exista, il adaug, altfel returnez false
         */
        public function addToWishlistSize($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $insert_data = array(
                'id_utilizator' => $id,'id_produs' => $id_product , 'marime'=>$size
            );
            $result = $this->db->select2('marimi', 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            if($row['cantitate'] == 0){
                return false;
            }
            else {
                $result1 = $this->db->selectCount3('wishlist', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
                $row1 = $result1->fetch();
                if($row1['count(*)']) return false;
                else return $this->db->insert('wishlist', $insert_data);
            }
        }

        /**
         * creez un array cu datele despre produsul cu id-ul si marimea date ca parametru
         * pe care le inserez in tabela wishlist
         * insa, inainte de acest lucru verific daca acest produs cu aceasta marime nu exista deja in wishlist
         * daca exista, returnez false
         * altfel, inserez in tabela wishlist
         */
        public function addToWishlist($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $insert_data = array(
                'id_utilizator' => $id,'id_produs' => $id_product , 'marime'=>$size
            );
            $result = $this->db->selectCount3('wishlist', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            if($row['count(*)']) return false;
            else return $this->db->insert('wishlist', $insert_data);
        }

        /**
         * preiau toate datele din tabela produse pentru produsul cu id-ul dat ca parametru
         * creez un array cu datele acestui produs
         * in functie de marimea data ca parametru, caut cate produse cu acea marimea exista
         * daca cantiatea este 0, returnez false
         * altfel, caut sa vad daca produsul nu este deja in cos pt utilizatorul logat,
         * daca nu exista, il adaug, altfel ii cresc cantitatea
         */
        public function addToCart($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $result = $this->selectProductDetails($id_product);
            $row = $result->fetch();
            $id = Session::get('id_utilizator');
            $insert_data = array(
                'id_utilizator' => $id,'id_produs' => $id_product, 'cantitate' => 1, 'pretTotal' => $row['pret'],
                'marime'=>$size, 'pret'=>$row['pret']
                
            );
            $result1 = $this->db->select2('marimi', 'id_produs', $id_product, 'marime', $size);
            $row1 = $result1->fetch();
            if($row1['cantitate'] == 0)
            {
                return false;
            }
            else{
                $quantityInCart = $this->selectProductCount($id_product, $size);
                if($quantityInCart != 0){
                    return $this->addQuantity($id_product,$size);
                }
                else return $this->db->insert('cos', $insert_data);
            }
            
        }

        /**
         * selectez din tabela produse toate datele pentru produsul cu id-ul dat ca parametru
         */
        public function selectProductDetails($id_product){
            return $this->db->select1('produse', 'id_produs', $id_product);
        }

        /**
         * sterg produsul din cos cu id-ul si marimea date ca parametru
         */
        public function deleteFromCart($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('cos', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        /**
         * sterg produsul din wihslist cu id-ul si marimea date ca parametru
         */
        public function deleteFromWishlist($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('wishlist', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        /**
         * calculez nr ul de produse din cos pentru utilizatorul curent
         * returnez acest numar
         */
        public function countProductsCart(){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount('cos', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        /**
         * calculez nr-ul de produse din wishlist pentru utilizatorul curent
         * returnez acest numar
         */
        public function countWishlistProducts(){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount('wishlist', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        /**
         * calculez din cos numarul de produse cu id-ul si marimea date ca parametru
         * returnez acest numar
         */
        public function selectProductCount($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        /**
         * cresc cantitatea pentru un produs din cos
         */
        public function addQuantity($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            $newQuantity = $row['cantitate']+1;
            $newPrice = $newQuantity*$row['pret'];

            $result1 = $this->db->select2('marimi', 'id_produs', $id_product, 'marime', $size);
            $row1 = $result1->fetch();
            if($row1['cantitate'] - 1 != 0)
            {
                return $this->db->update3('cos', 'cantitate', $newQuantity, 'pretTotal', $newPrice,'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            }
            else return false;
        }

        /**
         * scad cantitatea cu o unitate pentru un produs din cos
         */
        public function subtractQuantity($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            $newQuantity = $row['cantitate']-1;
            $newPrice = $newQuantity*$row['pret'];
            return $this->db->update3('cos', 'cantitate', $newQuantity, 'pretTotal', $newPrice,'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
        }

        /**
         * returnez cantitatea curenta pentru un produs aflat in cos
         */
        public function getQuantity($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['cantitate'];
        }
        
        /**
         * trimitere email de confirmare in urma efectuarii unei comenzi
         * se preiau datele necesare pentru un astfel de email
         * adica datele de contact si de trimitere a coletului
         * si datele despre produsele achizitionate de catre utilizator
         * folosesc smtp gmail utilizand adresa de utilizare impressed.shop2020@gmail.com
         * setez ca adresa de la care sa fie mail ul sa fie: impressed.shop2020@gmail.com
         * adaug catre cine se va trimite mail-ul adica e-mail-ul utilizatorului
         * body ul mail ului va contine doua tabele informative
         * cu datele utilizatorului
         * si produsele achizitionate
         * plus plata ce va trebuie sau a fost deja achitata
         * alaturi de taxele de transport
         */
        public function sendEmailConfirmation($orderId){
            $result = $this->db->select1('comanda', 'id_comanda', $orderId);
            $result1 = $this->db->selectJoin('produse_comanda', 'produse','id_produs','id_produs','id_comanda', $orderId);
            $row = $result -> fetch();
            $mail = new PHPMailer();
    
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "impressed.shop2020";
            $mail->Password = "impressed2020$";
            $mail->Port = 587;
            $mail->SMTPSecure="tls";
    
            $mail->isHTML(true);
            $mail->setFrom("impressed.shop2020@gmail.com");
            $mail->addAddress($row['email']);
            $mail->Subject = "Comanda Impressed";
            $mail->Body = "
            <html>
            <body>
            <p>Datele comenzii:</p>
            <table>
            <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Email</th>
            <th>Adresa</th>
            <th>Oras</th>
            <th>Tara</th>
            <th>Metoda Plata</th>
            <th>Metoda Livrare</th>
            <th>Data Plasare</th>
            </tr>
            <tr>
            <td>".$row['nume']."</td>
            <td>".$row['prenume']."</td>
            <td>".$row['email']."</td>
            <td>".$row['adresa']."</td>
            <td>".$row['oras']."</td>
            <td>".$row['tara']."</td>
            <td>".$row['metoda_plata']."</td>
            <td>".$row['metoda_livrare']."</td>
            <td>".$row['data_plasare']."</td>
            </tr>
            </table>
            <br>
            <p>Detaliile comenzii:</p>
            <table>
            <tr>
            <th>Nume</th>
            <th>Material</th>
            <th>Culoare</th>
            <th>Marime</th>
            <th>Cantitate</th>
            <th>Pret</th>
            <th>Pret Total</th>
            </tr>";
            $suma = 0;
            while($row1 = $result1->fetch())
            {
                $mail->Body.="
                <tr>
                <td>".$row1['nume']."</td>
                <td>".$row1['material']."</td>
                <td>".$row1['culoare']."</td>
                <td>".$row1['marime']."</td>
                <td>".$row1['cantitate']."</td>
                <td>".$row1['pret']."</td>
                <td>".$row1['pret']*$row1['cantitate']."</td>
                </tr>
                ";
                $suma = $row1['pret']*$row1['cantitate'] + $suma;
            }
            $mail->Body.="
            <br>
            <p> Pret total produse: ".$suma."<p>";
            if($suma >= 350){
                $mail->Body.="
                <p> Livrare : 0 lei</p>
                <p> Pret total comanda: ".$suma."<p>
                ";
            }
            else{ 
                $suma = $suma + 20;
                $mail->Body.="
                <p> Livrare : 20 lei</p>
               
                <p> Pret total comanda: ".$suma."<p>
                ";
            }
            $mail->Body.="
            </body>
            </html>
            ";
            $mail->send();
            $mail->clearAddresses();
            $mail->smtpClose();
        }
    }
?>