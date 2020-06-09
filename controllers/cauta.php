<?php

class Cauta extends Controller
{
    function __construct(){
        parent::__construct();
    }

    /**
     * functie care imi randeaza o pagina de produse in functie de un cuvant/cuvinte cheie
     * introduse de catre utilizator in input-ul din search
     * produsele ce vor fi afisate in urma rezultatului select-ului sunt paginate
     * pe fiecare pagina vor aparea maxim 12 produse
     * exista posibilitatea ca utilizatorul sa adauge in cos produsul din lista
     * cum nu se poate seta o marime, marimea introdusa in cos va fi prima marime disponibila, incepand de la cea mai mica
     * de asemenea, toate produsele pot fi sortate dupa: popularitate, pret crescator si descrescator si alfabetic
     */
    function index(){

        $cauta = new Cauta_model();
        $limit = 12;     
        if (isset($_GET["page"])) {  
        $this->view->page= $_GET["page"];  
        }  
        else {  
        $this->view->page=1;  
        };
  
        $start_from = ($this->view->page-1) * $limit;

        if(isset($_POST['input'])){
            $this->view->word = $_POST['input'];

            $countSearch = $cauta->countSearch($this->view->word);
            if($countSearch == 0){
                $this->view->message='Ne pare rău, niciun produs nu a fost găsit de căutarea dvs. : '.$this->view->word;
            }
            $this->view->result = $cauta->searchByWord($this->view->word, $start_from, $limit);
            $this->view->total_records = $countSearch;
            $this->view->total_pages = ceil($this->view->total_records / $limit);

        }
        else{
            $this->view->result=$cauta->selectSearch($start_from, $limit);
            $this->view->total_records = $cauta->count();
            $this->view->total_pages = ceil($this->view->total_records / $limit);
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

        if(isset($_POST['popularitate']))
        {
            $this->view->result=$cauta->sortare('nr_accesari','desc',$start_from,$limit);
        }
        if(isset($_POST['alfabetic']))
        {
            $this->view->result=$cauta->sortare('nume','asc',$start_from,$limit);
        }
        if(isset($_POST['crescator']))
        {
            $this->view->result=$cauta->sortare('pret','asc',$start_from,$limit);
        }
        if(isset($_POST['descrescator']))
        {
            $this->view->result=$cauta->sortare('pret','desc',$start_from,$limit);
        }
       
        $this->view->render('cauta');
    }
}
