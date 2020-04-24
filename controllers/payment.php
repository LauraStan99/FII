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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid->validateNumeCard($this->view->numeCard, $this->view->numeCardErr);
            $valid->validateNumarCard($this->view->numarCard, $this->view->numarCardErr);
            $valid->validateMonthCard($this->view->lunaCard, $this->view->lunaCardErr);
            $valid->validateYearCard($this->view->anCard, $this->view->anCardErr);
            $valid->validateCvvCard($this->view->cvvCard, $this->view->cvvCardErr);
        }
        $this->view->render('payment');
    }
}
