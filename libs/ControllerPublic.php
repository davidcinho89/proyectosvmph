<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ControllerPublic {

    protected $view;
    protected $model;
    protected $document;

    function __construct() {
        $this->document = Document::singleton();
        $this->view = new View();
        $this->document->addScript("jquery-1.4.4.min");
        $this->document->addScript("cal");
        $this->document->addScript("aplication");
        $this->document->addCss("calendar");
        $this->view->setVars('doc', $this->document);
        $this->view->setVars('view', $this->view);        
    }

    function getModel($nameModel) {        
        $model = $nameModel . 'Model';
        $path = MODELS . DS . $nameModel . 'Model.php';          
        require ($path);             
        $this->model = new $model();        
        return $this->model;
    }

}

?>