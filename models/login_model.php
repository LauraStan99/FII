<?php
class Login_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $parola = Hash::create('sha256', $_POST['parola'], HASH_PASSWORD_KEY);
        $string = 'SELECT * from utilizatori where email=' . "'" . $_POST['email'] . "'" . '  and parola=' . "'" . $parola . "'";
        $stmt = $this->db->con->prepare($string);
        if (!($stmt->execute())) {
            die('A survenit o eroare la interogare');
        } else {
            
            $inreg = $stmt->fetch();

            if ($inreg['id_utilizator'] != null) {
                Session::init();
                Session::set('id_utilizator', $inreg['id_utilizator']);
                Session::set('nume', $inreg['nume']);
                Session::set('prenume', $inreg['prenume']);
                Session::set('adresa', $inreg['adresa']);
                Session::set('email', $inreg['email']);
                Session::set('telefon', $inreg['telefon']);
                Session::set('parola', $inreg['parola']);
                Session::set('loggedIn', true);
                
                $query = 'SELECT * FROM wishlist WHERE id_utilizator='.$inreg['id_utilizator'];
                $stmt_query = $this->db->con->prepare($query);
                $stmt_query->execute();
                $row = $stmt_query->fetch(); 
                if($row['id_produs'] != null ){
                    Session::set('wishlist', true);
                }
                else{
                    Session::set('wishlist', false);
                }

                $query = 'SELECT * FROM cart WHERE id_utilizator='.$inreg['id_utilizator'];
                $stmt_query = $this->db->con->prepare($query);
                $stmt_query->execute();
                $row = $stmt_query->fetch(); 
                if($row['id_produs'] != null ){
                    Session::set('cart', true);
                }
                else{
                    Session::set('cart', false);
                }
                
               
                header('location: ../home');
                header('Cache-Control: no-cache, no-store, must-revalidate');
            } else {
                header('location: ../login?msg=failed');
            }
        }
    }
}
