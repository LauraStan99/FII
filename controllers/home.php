<?php

class Home extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
/**
 * se randeaza pagina principala , in acelasi timp trimitandu-se pe front un result cu cele mai populare produse de pe site,
 * creandu-se si un XML care sa le contina , acesta actualizandu-se la fiecare accesare a paginii principale
 */
    function index()
    {
        $button = new Butoane_model();
        $this->view->result=$button->getPopularProducts();
        $button->createXML();
        $this->view->render('home');
    }
/**
 * se preia fisierul XML de la calea oferita si se trimite catre pagina de fluxRSS pentru a se adauga informatiile pe pagina
 */
    function fluxRSS()
    {
        define('FEED',URL."public/util/popularitate.xml");
        $xml = simplexml_load_file(FEED);
        $this->view->result = $xml;
        $this->view->render('fluxRSS');
    }
}
