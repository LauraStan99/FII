<?php 

class Informatii extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ghid()
    {
        $this->view->render('ghid');
    }
    public function progres()
    {
        $this->view->render('progres');
    }
    public function documentatie()
    {
        $this->view->render('documentatie');
    }
    
}
?>