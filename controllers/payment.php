<?php

class Payment extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $valid = new Validate();
        $payment = new Payment_model();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid->validateNameCard($this->view->numeCard, $this->view->numeCardErr);
            $valid->validateNumarCard($this->view->numarCard, $this->view->numarCardErr);
            $valid->validateMonthCard($this->view->lunaCard, $this->view->lunaCardErr);
            $valid->validateYearCard($this->view->anCard, $this->view->anCardErr);
            $valid->validateCvvCard($this->view->cvvCard, $this->view->cvvCardErr);
        }
        
        if(isset($_POST["submit"])){
            if($this->view->numeCardErr == "" && $this->view->numarCardErr == "" && $this->view->lunaCardErr == "" && $this->view->anCardErr == "" && $this->view->cvvCardErr == "" ){
                if(isset($_GET['id_comanda'])){
                    $change = $payment->changeOrderStatus($_GET['id_comanda']);
                    if($change == true)
                    {
                        header('location: ' . URL . 'home');
                    }
                }
            }
        }
        $this->view->render('payment');
    }
}
