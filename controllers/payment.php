<?php

class Payment extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * la apasarea butonului "Plaseaza Comanda" din pagina de payment
     * validez toate datele din form
     * daca nu apare nicio eroare
     * comanda este inregistrata cu succes in baza de date
     */
    public function index()
    {
        $valid = new Validate();
        $payment = new Payment_model();
        $button = new Butoane_model();
        if (isset($_POST["submit"])) {
            $valid->validateNameCard($this->view->numeCard, $this->view->numeCardErr);
            $valid->validateNumarCard($this->view->numarCard, $this->view->numarCardErr);
            $valid->validateMonthCard($this->view->lunaCard, $this->view->lunaCardErr);
            $valid->validateYearCard($this->view->anCard, $this->view->anCardErr);
            $valid->validateCvvCard($this->view->cvvCard, $this->view->cvvCardErr);

            if($this->view->numeCardErr == "" && $this->view->numarCardErr == "" && $this->view->lunaCardErr == "" && $this->view->anCardErr == "" && $this->view->cvvCardErr == "" ){
                if(isset($_GET['id_comanda'])){
                    $change = $payment->changeOrderStatus($_GET['id_comanda']);
                    if($change == true)
                    {
                        $button->sendEmailConfirmation($_GET['id_comanda']);
                        header('location: ' . URL . 'order');
                    }
                }
            }
        }
        $this->view->render('payment');
    }
}
