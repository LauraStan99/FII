<?php
    use PHPMailer\PHPMailer\PHPMailer;
    class Butoane_model extends Model{
        
        public function __construct()
        {
            parent::__construct();
        }


        public function addToWishlist($id_product,$size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $insert_data = array(
                'id_utilizator' => $id,'id_produs' => $id_product , 'marime'=>$size
            );
            return $this->db->insert('wishlist', $insert_data);
        }

        public function addToCart($id_product,$size){
            if (!isset($_SESSION))
            {
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
                
                return $this->db->insert('cos', $insert_data);
            }
            
        }

        public function selectProductDetails($id_product){
            return $this->db->select1('produse', 'id_produs', $id_product);
        }

        public function deleteFromCart($id_product,$size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('cos', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        public function deleteFromWishlist($id_product,$size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            return $this->db->delete3('wishlist', 'id_utilizator', $id, 'id_produs', $id_product,'marime', $size);
        }

        public function countProductsCart(){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select_count('cos', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function countWishlistProducts(){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->select_count('wishlist', 'id_utilizator', $id);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function selectProductCount($id_product, $size){
            if (!isset($_SESSION))
            {
                session_start();
            }
            $id = Session::get('id_utilizator');
            $result = $this->db->selectCount3('cos', 'id_utilizator', $id, 'id_produs', $id_product, 'marime', $size);
            $row = $result->fetch();
            return $row['count(*)'];
        }

        public function addQuantity($id_product, $size){
            if (!isset($_SESSION))
            {
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
            if (!isset($_SESSION))
            {
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
            if (!isset($_SESSION))
            {
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
            }
            $mail->Body.="</body>
            </html>
            ";
            $mail->send();
            $mail->clearAddresses();
            $mail->smtpClose();
        }
    }
?>