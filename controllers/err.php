<?php

class Err extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function index()
    { 
        $this->view->message = 'Pagina de eroare';
        $this->view->render('error');
       
    }
}
