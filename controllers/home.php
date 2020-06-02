<?php

class Home extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $home = new Home_model();
        $this->view->result=$home->getPopularProducts();
        $home->createXML();
        $this->view->render('home');
    }

    function fluxRSS()
    {
        define('FEED',URL."/popularitate.xml");
        $xml = simplexml_load_file(FEED);
        $this->view->result = $xml;

        $this->view->render('fluxRSS');
    }
}
