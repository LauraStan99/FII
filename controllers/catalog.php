<?php

class Catalog extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function femei($categorie)
    {

        $catalog=new catalog_model();

        $this->view->result=$catalog->selectCategory($categorie);
        $this->view->render('catalogFRochii');
    }

}
