<?php

class Cauta extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function index(){
        
        $cauta = new Cauta_model();
        if(isset($_POST['input'])){
            $this->view->result = $cauta->searchByWord($_POST['input']);
        }
        $this->view->render('cauta');
    }
}
