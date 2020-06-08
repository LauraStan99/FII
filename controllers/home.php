<?php

class Home extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $button = new Butoane_model();
        $this->view->result=$button->getPopularProducts();
        $button->createXML();
        $this->view->render('home');
    }

    function fluxRSS()
    {
        define('FEED',URL."public/util/popularitate.xml");
        $xml = simplexml_load_file(FEED);
        $this->view->result = $xml;

        $this->view->render('fluxRSS');
    }
}
