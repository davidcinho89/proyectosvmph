<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ReportSaldosController extends ControllerBase {   
    
    public function main(){
        
        $this->view->setTemplate('Reports' . DS . 'saldosyear');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("catalogo");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");    
        $this->document->addCss("jquery-ui");
        $this->document->setHeader();
        $this->getModel("Reports");       
        $productostodos=$productofin = $productoini = $this->model->getproductoInicial();
        $clientestodos=$clientefin = $clienteini = $this->model->getclienteInicial();
        $tiendastodos = $tiendafin = $tiendaini = $this->model->gettiendaInicial();
        if(isset($_GET['productoini'])){
            $productofin = $this->model->restarproductos($_GET['productoini'], $productoini);
            $productoselected=$_GET['productoini'];
             $reportini=false;
        }else{
            $productoselected=current($productoini);
            $reportini=true;
        }                
        
        if(isset($_GET['clienteini'])){
            $clientefin = $this->model->restarclientes($_GET['clienteini'], $clienteini);
            $tiendaini = $tiendafin = $this->model->restartiendas($clientefin, $tiendaini);
            $clienteselected=$_GET['clienteini'];
        }else{
            $clienteselected=current($clienteini);
        }
        
        if(isset($_GET['clientefin'])){
            $clientefin2 = $this->model->restarclientes2($_GET['clientefin'], $clientefin);            
            $tiendaini = $tiendafin = $this->model->restartiendas($clientefin2, $tiendaini);               
        }else{
            end($clientefin);
            $clientefin2 = $this->model->restarclientes2(key($clientefin), $clientefin); 
            reset($clientefin);
        }   
        
        if(isset($_GET['tiendaini'])){
            $tiendafin = $this->model->restartiendas2($_GET['tiendaini'], $tiendaini);
            $tiendaselected=$_GET['tiendaini'];
        }else{
            $tiendaselected=current($tiendaini); 
            $tiendaselected=$tiendaselected[0];
        }  
        
        if(isset($_GET['tiendafin'])){
            $tiendafin2 = $this->model->restartiendas3($_GET['tiendafin'], $tiendafin);
            $tiendaselected2= $_GET['tiendafin'];
        }else{
            $tiendatmp=end($tiendafin);            
            $tiendafin2 = $this->model->restartiendas3($tiendatmp[0], $tiendafin); 
            $tiendaselected2= $tiendatmp[0];
            reset($tiendafin);
        }   
        
        if(isset($_GET['productofin'])){
            $productofin2 = $this->model->restarproductos2($_GET['productofin'], $productofin);
            $productoselected2= $_GET['productofin'];
        }else{
            end($productofin);
            $productofin2 = $this->model->restarproductos2(key($productofin), $productofin); 
            reset($productofin);
        }   
                      
        end($clientefin);
        end($productofin);
        $selector=end($tiendafin);        
        $clienteselected2=isset($_GET['clientefin'])?isset($clientefin[$_GET['clientefin']])?$_GET['clientefin']:key($clientefin):key($clientefin);
        $productoselected2=isset($_GET['productofin'])?isset($productofin[$_GET['productofin']])?$_GET['productofin']:key($productofin):key($productofin);
        //$tiendaselected2=isset($_GET['tiendafin'])?$selector[0]==$_GET['tiendafin']?$_GET['tiendafin']:$selector[0]:$selector[0];
        reset($clientefin);
        reset($productofin);
        reset($tiendafin);
        
        if(isset($_GET['fechaini'])){
            $precios = $this->model->traerSaldos($productofin2, $tiendafin2, $_GET['fechaini']);
            $fechaselected= $_GET['fechaini'];
            //$fechaselected2= $_GET['fechafin'];
        }else{
            $fechaselected= date('Y'); 
           // $fechaselected2= date("Y-m-d");            
            //$precios = $this->model->traerSaldos($productofin2, $tiendafin2, $fechaselected);            
        }         
        
        $nombresclientes = $this->model->traerNombreCliente();
        $nombresproductos = $this->model->traerNombreProducto();
        $nombrestiendas = $this->model->traerNombreTienda();                  
        
        $this->view->setVars('reportini', $reportini); 
        $this->view->setVars('productostodos', $productostodos);
        $this->view->setVars('clientestodos', $clientestodos);
        $this->view->setVars('tiendastodos', $tiendastodos);
        $this->view->setVars('productoselectedini', $productoselected);
        $this->view->setVars('productoselectedfin', $productoselected2);
        $this->view->setVars('clienteselectedini', $clienteselected);
        $this->view->setVars('clienteselectedfin', $clienteselected2);
        $this->view->setVars('tiendaselectedini', $tiendaselected);
        $this->view->setVars('tiendaselectedfin', $tiendaselected2);
        $this->view->setVars('productofin', $productofin);
        $this->view->setVars('productoini', $productoini);
        $this->view->setVars('clienteini', $clienteini);
        $this->view->setVars('clientefin', $clientefin);
        $this->view->setVars('tiendaini', $tiendaini);
        $this->view->setVars('tiendafin', $tiendafin);
        $this->view->setVars('clientes', $clientefin2);
        $this->view->setVars('tiendas', $tiendafin2);
        $this->view->setVars('productos', $productofin2);
        $this->view->setVars('precios', $precios);
        $this->view->setVars('fechaini', $fechaselected);
       // $this->view->setVars('fechafin', $fechaselected2);
        $this->view->setVars('nombresclientes', $nombresclientes);
        $this->view->setVars('nombresproductos', $nombresproductos);
        $this->view->setVars('nombrestiendas', $nombrestiendas);
        $this->view->show();   
    }
   
    
    public function gettiendasAjax(){
        $clienteini = $_POST['clienteiniajax'];
        $clientefin = $_POST['clientefinajax'];
        $this->getModel("Reports");
        $tiendas=$this->model->gettiendasAjax($clienteini,$clientefin);    
        echo json_encode($tiendas);
    }

}

?>
