<?php

class Cauta extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function index(){
        
        $cauta = new Cauta_model();

        if(isset($_POST['input'])){
            $this->view->word = $_POST['input'];

            $countSearch = $cauta->countSearch($this->view->word);
            if($countSearch == 0){
                $this->view->message='Ne pare rău, niciun produs nu a fost găsit de căutarea dvs. : '.$this->view->word;
            }
            $this->view->result = $cauta->searchByWord($this->view->word);
        }
        else{
            $this->view->result=$cauta->selectSearch();
        }

        if(isset($_POST['adauga-cos'])){
            $buton = new Butoane_model();
            if ($buton->addToCart($_GET['id'], 'XS') == false) {
                if ($buton->addToCart($_GET['id'], 'S') == false) {
                    if ($buton->addToCart($_GET['id'], 'M') == false) {
                        if ($buton->addToCart($_GET['id'], 'L') == false) {
                            if ($buton->addToCart($_GET['id'], 'XL') == false) {
                                if ($buton->addToCart($_GET['id'], 'XXL') == false) {
                                    $this->view->message = 'Produsul nu este in stoc.';
                                }
                            }
                        }
                    }
                }
            } 
        }

       
        $this->view->render('cauta');
    }

    function ordonare($filter, $order){
        $cauta = new Cauta_model();
        $this->view->result=$cauta->sortare($filter, $order);
        $this->view->render('cauta');
    }
}
