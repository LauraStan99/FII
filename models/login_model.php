<?php
class Login_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {

        $string = 'SELECT * from utilizatori where email=' . "'" . $_POST['email'] . "'" . '  and parola=' . "'" . $_POST['parola'] . "'";

        if (!($rez = $this->db->con->query($string))) {
            die('A survenit o eroare la interogare');
        } else {

            $inreg = $rez->fetch_assoc();

            if ($inreg['id_utilizator'] != null) {
                Session::init();
                Session::set('id_utilizator', $inreg['id_utilizator']);
                Session::set('nume', $inreg['nume']);
                Session::set('prenume', $inreg['prenume']);
                Session::set('adresa', $inreg['adresa']);
                Session::set('email', $inreg['email']);
                Session::set('telefon', $inreg['telefon']);
                Session::set('parola', $inreg['parola']);
                Session::set('loggedIn',true);
                header('location: ../home');
                header('Cache-Control: no-cache, no-store, must-revalidate');
            } else {
                header('location: ../login?msg=failed');
            }
        }
    }
}
