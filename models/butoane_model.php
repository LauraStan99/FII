<?php
    use PHPMailer\PHPMailer\PHPMailer;

    class Butoane_model extends Model{
        
        public function __construct(){
            parent::__construct();
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

        public function selectProductDetails($id_product){
            return $this->db->select1('produse', 'id_produs', $id_product);
        }

        public function deleteFromCart($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('cos', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        public function deleteFromWishlist($id_product,$size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('wishlist', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        public function countProductsCart(){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount('cos', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function countWishlistProducts(){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount('wishlist', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function selectProductCount($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function addQuantity($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            $newQuantity = $row['cantitate']+1;
            $newPrice = $newQuantity*$row['pret'];
            return $this->db->update3('cos', 'cantitate', $newQuantity, 'pretTotal', $newPrice,'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
        }

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

        public function getQuantity($id_product, $size){
            if (!isset($_SESSION)){
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['cantitate'];
        }
        
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