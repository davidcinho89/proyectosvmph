<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ReportyearController extends ControllerBase {

    public function main() {       
        $this->view->setTemplate('Reports' . DS . 'reportyear');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");        
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("catalogo");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");
        $this->document->addScript("jquery-ui.min");
        $this->document->addCss("jquery-ui");
        $this->document->addCss("tabtabmiga");
        $this->document->setHeader();      
        $this->view->show();  
    }
    
    public function general(){
        $this->view->setTemplate('Reports' . DS . 'generalyear');
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
        $this->document->setHeader();
        $this->getModel("Reports");       
        
        
        if(isset($_GET['fechaini'])){
            $precios = $this->model->traerCantidadesTotales($_GET['fechaini']);
            $fechaselected= $_GET['fechaini'];
            $reportini=false;
            
            //$fechaselected2= $_GET['fechafin'];
        }else{
            $fechaselected= date('Y'); 
            $reportini=true;
            //$fechaselected2= date("Y-m-d");            
            //$precios = $this->model->traerCantidadesTotales($fechaselected);            
        }                     
        
        $mesesnames= array("","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
        
        $nuevoarreglo[0]=array("Semana", "Ventas $fechaselected");
        foreach ($precios["cantidades"][$fechaselected] as $key=> $value) {
            foreach ($value as $key2=> $value2) {
                $nuevoarreglo[]=array("$mesesnames[$key] $key2", (int) $value2);
            }
        }
        
        $grafico=json_encode($nuevoarreglo);
                        
        $this->view->setVars('grafico', $grafico);       
        $this->view->setVars('precios', $precios);
        $this->view->setVars('fechaini', $fechaselected); 
        $this->view->setVars('reportini', $reportini);         
        $this->view->show();  
    }
    
    public function productyear(){
       $this->view->setTemplate('Reports' . DS . 'productyear');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addScript("dataTables.fixedColumns");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("catalogo");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");        
        $this->document->addCss("dataTables.fixedColumns");
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
        
        
        $_SESSION["gravables"]=null;
        $_SESSION["gravables"]=$anios = $this->model->getPeriodos();
        
        
        if(isset($_GET['fechaini'])){
            $precios = $this->model->traerCantidades($productofin2, $tiendafin2, $_GET['fechaini']);            
            $fechaselected= $_GET['fechaini'];                                    
            if(isset($_GET['fechafin'])){
                $fechaselected2=$_GET['fechafin'];
                $anios2=null; 
                foreach ($_SESSION["gravables"] as $value7){
                    if($value7!=$fechaselected){
                        $anios2[]=$value7;
                    }
                }
                $precios2 = $this->model->traerCantidades($productofin2, $tiendafin2, $_GET['fechafin']);            
            }else{
                $fechaselected2=false;
                $anios2=null;
                $precios2=null;
            }
        }else{
            $fechaselected= date('Y'); 
            $fechaselected2=false;  
            $anios2=null;
            $precios2=null;
        }                 
        
        
        $nombresclientes = $this->model->traerNombreCliente();
        $nombresproductos = $this->model->traerNombreProducto();
        $nombrestiendas = $this->model->traerNombreTienda();                  
        
        
        
        /*
         * 
         *  $aniomax = date("Y");
            $aniomin = date("Y", strtotime('-1 year'));
            //fecha a mostrar en filtros
            $fechaselected = date('Y-m-d', strtotime('-1 month'));           // 
            $fechaselected2 = date("Y-m-d");
            $array1 = explode("-", $fechaselected);
            $array2 = explode("-", $fechaselected2);
            //rango de meses
            if ($array1[0] == $aniomax) {
                $mesmax1 = date("m");
            } else {
                $mesmax1 = 12;
            }
            if ($array2[0] == $aniomax) {
                $mesmax2 = date("m");
            } else {
                $mesmax2 = 12;
            }


            $anioiniselected = $array1[0];
            $aniofinselected = $array2[0];
            $mesiniselected = $array1[1];
            $mesfinselected = $array2[1];
            //$semanainiselected = date('W', strtotime('-1 month'));
            $fechaaaaaaaa = mktime (date("H"), date("i"), date("s"),$array1[1], 1, $array1[0]);
            $semanainiselected = ceil ((date("d", strtotime('+1 day')) + (date ("w", $fechaaaaaaaa)-1)) / 7);
            //$semanafinselected = date('W');
            $fechaaaa = mktime (date("H"), date("i"), date("s"), $array2[1], 1, $array2[0]);
            $semanafinselected = ceil ((date("d") + (date ("w", $fechaaaa)-1)) / 7);
            //$semanafinselected = date(W,mktime(0,0,0,$mes,date(t, mktime(0,0,0,$mes,1,$anio)),$anio))-date(W,mktime(0,0,0,$mes,1,$anio));
            //$precios = $this->model->traerPrecios($productofin2, $tiendafin2, $anioiniselected, $aniofinselected, $mesiniselected, $mesfinselected, $semanainiselected, $semanafinselected);
         * 
         */
        
        
        
        
        $this->view->setVars('precios2', $precios2);
        $this->view->setVars('anios', $anios);
        $this->view->setVars('anios2', $anios2);
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
        $this->view->setVars('fechafin', $fechaselected2);
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
    
    public function validateperiod(){        
        $_POST["fechainiajax"];
        $anos=null;
        foreach($_SESSION["gravables"] as $value){
            if($_POST["fechainiajax"]!=$value){
               $anos[] = $value;
            }
        }
        echo json_encode($anos);
    }
    
    public function productyearToneladas(){        
         $this->view->setTemplate('Reports' . DS . 'productyearTon');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addScript("dataTables.fixedColumns");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("catalogo");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");        
        $this->document->addCss("dataTables.fixedColumns");
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
        
        
        $_SESSION["gravables"]=null;
        $_SESSION["gravables"]=$anios = $this->model->getPeriodos();
        
        
        if(isset($_GET['fechaini'])){
            $precios = $this->model->traerCantidadesToneladas($productofin2, $tiendafin2, $_GET['fechaini']);            
            $fechaselected= $_GET['fechaini'];                                    
            if(isset($_GET['fechafin'])){
                $fechaselected2=$_GET['fechafin'];
                $anios2=null; 
                foreach ($_SESSION["gravables"] as $value7){
                    if($value7!=$fechaselected){
                        $anios2[]=$value7;
                    }
                }
                $precios2 = $this->model->traerCantidadesToneladas($productofin2, $tiendafin2, $_GET['fechafin']);            
            }else{
                $fechaselected2=false;
                $anios2=null;
                $precios2=null;
            }
        }else{
            $fechaselected= date('Y'); 
            $fechaselected2=false;  
            $anios2=null;
            $precios2=null;
        }                 
        
        
        $nombresclientes = $this->model->traerNombreCliente();
        $nombresproductos = $this->model->traerNombreProducto();
        $nombrestiendas = $this->model->traerNombreTienda();                  
        
        
        $this->view->setVars('precios2', $precios2);
        $this->view->setVars('anios', $anios);
        $this->view->setVars('anios2', $anios2);
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
        $this->view->setVars('fechafin', $fechaselected2);
        $this->view->setVars('nombresclientes', $nombresclientes);
        $this->view->setVars('nombresproductos', $nombresproductos);
        $this->view->setVars('nombrestiendas', $nombrestiendas);
        $this->view->show();  
    }

    public function productyeargeneral(){
       $this->view->setTemplate('Reports' . DS . 'productyeargeneral');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addScript("dataTables.fixedColumns");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("catalogo");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");        
        $this->document->addCss("dataTables.fixedColumns");
        $this->document->setHeader();
         $this->getModel("Reports");       
        $productostodos=$productofin = $productoini = $this->model->getproductoInicial();
        
        if(isset($_GET['productoini'])){
            $productofin = $this->model->restarproductos($_GET['productoini'], $productoini);
            $productoselected=$_GET['productoini'];
            $reportini=false;
        }else{
            $productoselected=current($productoini);
            $reportini=true;
        }                
             
        if(isset($_GET['productofin'])){
            $productofin2 = $this->model->restarproductos2($_GET['productofin'], $productofin);
            $productoselected2= $_GET['productofin'];
        }else{
            end($productofin);
            $productofin2 = $this->model->restarproductos2(key($productofin), $productofin); 
            reset($productofin);
        }   
                              
        end($productofin);              
        
        $productoselected2=isset($_GET['productofin'])?isset($productofin[$_GET['productofin']])?$_GET['productofin']:key($productofin):key($productofin);        
        
        reset($productofin);        
                
        $_SESSION["gravables"]=null;
        $_SESSION["gravables"]=$anios = $this->model->getPeriodos();
                
        if(isset($_GET['fechaini'])){
            $precios = $this->model->traerCantidadesProductos($productofin2, $_GET['fechaini']);            
            $fechaselected= $_GET['fechaini'];                                    
            if(isset($_GET['fechafin'])){
                $fechaselected2=$_GET['fechafin'];
                $anios2=null; 
                foreach ($_SESSION["gravables"] as $value7){
                    if($value7!=$fechaselected){
                        $anios2[]=$value7;
                    }
                }
                $precios2 = $this->model->traerCantidadesProductos($productofin2, $_GET['fechafin']);            
            }else{
                $fechaselected2=false;
                $anios2=null;
                $precios2=null;
            }
        }else{
            $fechaselected= date('Y'); 
            $fechaselected2=false;  
            $anios2=null;
            $precios2=null;
        }                 
                        
        $nombresproductos = $this->model->traerNombreProducto();                        
                
        $this->view->setVars('precios2', $precios2);
        $this->view->setVars('anios', $anios);
        $this->view->setVars('anios2', $anios2);
        $this->view->setVars('reportini', $reportini);      
        $this->view->setVars('productostodos', $productostodos);        
        $this->view->setVars('productoselectedini', $productoselected);
        $this->view->setVars('productoselectedfin', $productoselected2);        
        $this->view->setVars('productofin', $productofin);
        $this->view->setVars('productoini', $productoini);                
        $this->view->setVars('productos', $productofin2);
        $this->view->setVars('precios', $precios);
        $this->view->setVars('fechaini', $fechaselected);
        $this->view->setVars('fechafin', $fechaselected2);        
        $this->view->setVars('nombresproductos', $nombresproductos);        
        $this->view->show();   
    }
}

?>
