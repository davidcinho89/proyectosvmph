<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ConfGeneralController extends ControllerBase {
 
    public function main() {
        $this->view->setTemplate('Confgeneral' . DS . 'confgeneral');
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addScript("jquery-ui.min");
        $this->document->addScript("jquery_002");
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addCss("style");
        $this->document->addCss("orden");
        $this->document->addCss("ImageOverlay");
        $this->document->addCss("pos");
        $this->document->setHeader(); 
        $this->getModel("Confgeneral");   
        $ciudadactual = $this->model->getCiudadActual();
        $departamentos = $this->model->getSelectDepartamentos();
        $traerdepto2 = $this->model->traerDepto($ciudadactual['ciudad']);
        $traerdepto = json_encode($traerdepto2); 
        $traerciudad = json_encode($ciudadactual['ciudad']);
        $ciudades = $this->model->getSelectCiudades($traerdepto2);        
          
        $empresa= $this->model->getData();
        $this->view->setVars("empresa",$empresa);
        $this->view->setVars('deps', $departamentos);
        $this->view->setVars('cids', $ciudades);
        $this->view->setVars('tdepto', $traerdepto); 
        $this->view->setVars('tciu', $traerciudad);
        $this->view->show();   
    }
  
     public function ajaxCiudades() {
        $this->getModel("Confgeneral");
        $ciudades = $this->model->getChangeCiudades();
        echo $ciudades;
    }  
    
    public function updateData(){
        $this->getModel("Confgeneral");
        $settigs = $this->model->updateData();
    }
    
      public function imageManager() {
        $this->view->setTemplate('Confgeneral' . DS . 'manageImage'); 
        $this->document->addCss("stylesdropdrag");
        $this->document->addCss("jquery.si");
        $this->document->addScript("jquery.filedrop");
        $this->document->addScript("script");
        $this->document->addScript("jquery.si");
        $this->document->setHeader();
        $this->view->show();
    }

    public function subirimagenAjax() {
        $this->getModel("Confgeneral");
        $this->model->uploadPicture(); 
    }

    public function subirimagen() { 
        $this->view->setTemplate('Confgeneral' . DS . 'manageImage');
        $this->document->setHeader();
        $this->getModel("Confgeneral"); 
        $this->model->uploadPicture();
    }

    
}
?>