<?php
class Login_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * functia run este apelata la pagina de logare unde utilizatorul se conecteaza cu email-ul si parola
     * dupa realizarea verificarii parolei (codificata)in baza de date , se face un select cu toate datele utilizatorului conectat
     * si se creeaza o noua sesiune pentru utilizator , in sesiune sunt retinute datele esentiale ale unui utilizator , care ne vor fi 
     * de folos pe parcursul proiectului 
     * In cazul in care utilizatorul s-a logat cu succes el este redirectionat catre pagina principala, iar in caz de esec se adauga in URL un mesaj de eroare
     */
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
                Session::set('tip_utilizator',$inreg['tip_utilizator']);
                Session::set('loggedIn', true);

                $query1 = 'SELECT * FROM wishlist WHERE id_utilizator=' . $inreg['id_utilizator'];
                $stmt_query1 = $this->db->con->prepare($query1);
                $stmt_query1->execute();
                $row1 = $stmt_query1->fetch();
                if ($row1['id_produs'] != null) {
                    Session::set('wishlist', true);
                } else {
                    Session::set('wishlist', false);
                }

                $query2 = 'SELECT * FROM cos WHERE id_utilizator=' . $inreg['id_utilizator'];
                $stmt_query2 = $this->db->con->prepare($query2);
                $stmt_query2->execute();
                $row2 = $stmt_query2->fetch();
                if ($row2['id_produs'] != null) {
                    Session::set('cart', true);
                } else {
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
