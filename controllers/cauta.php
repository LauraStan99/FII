<?php

class Cauta extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function index(){
        
        $cauta = new Cauta_model();
        if(!empty($_POST['input'])){

            $countSearch = $cauta->countSearch($_POST['input']);
            if($countSearch == 0){
                $this->view->message='Ne pare rău, niciun produs nu a fost găsit de căutarea dvs. : '.$_POST['input'];
            }
           
            $this->view->result = $cauta->searchByWord($_POST['input']);
        }
        
        $this->view->render('cauta');
    }
    function ordonare($resultPage){
        $cauta = new Cauta_model();
        $this->view->message="";
        if (isset($_POST['popularitate'])) {
             $this->view->result=$cauta->sortare($resultPage,'nr_accesari','desc');
             $cauta->deleteFromProduse_filter_order();
        }
    }
}
