<?php


defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class LoadSalesController extends ControllerBase {

    public function main() {
        $this->view->setTemplate('InventoryAdjust' . DS . 'adjustmain');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addScript("columnfilter");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");
        $this->document->setHeader();
        $this->getModel("InventoryAdjust");
        if (isset($_GET['anioini'])) {
            $aniomax = date("Y");
            $aniomin = date("Y", strtotime('-1 year'));
            $anioiniselected = $_GET['anioini'];
            $aniofinselected = $_GET['anioini'] >= $_GET['aniofin'] ? $_GET['anioini'] : $_GET['aniofin'];            
            if ($anioiniselected == $aniomax) {
                $mesmax1 = date("m");
            } else {
                $mesmax1 = 12;
            }
            if ($aniofinselected == $aniomax) {
                $mesmax2 = date("m");                
            } else {
                $mesmax2 = 12;
            }            
            if ($_GET['anioini'] == $_GET['aniofin']) {
                $mesiniselected = $_GET['mesini'] > $mesmax1 ? $mesmax1 : $_GET['mesini'];
                $mesfinselected = $_GET['mesfin'] > $mesmax2 ? $mesmax2 : $_GET['mesfin'];
                $mesiniselected = $_GET['mesini'] >= $mesfinselected ? $mesfinselected: $_GET['mesini'];
            } else {
                $mesiniselected = $_GET['mesini'] > $mesmax1 ? $mesmax1 : $_GET['mesini'];
                $mesfinselected = $_GET['mesfin'] > $mesmax2 ? $mesmax2 : $_GET['mesfin'];
            }            
            //date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
            $fecha1 = new DateTime($anioiniselected."-".$mesiniselected."-01");
            $fecha2 = new DateTime($aniofinselected."-".$mesfinselected."-01");
            $fecha1->modify('first day of this month');   
            $fecha2->modify('last day of this month');                     
            $productosstock = $this->model->getProductosStock($fecha1->format('Y-m-d')." 00:00:00",$fecha2->format('Y-m-d')." 23:59:59"); 
        }else{
            //Rangos de anios
            $aniomax = date("Y");
            $aniomin = date("Y", strtotime('-1 year'));
            //fecha a mostrar en filtros
            //$fechaselected = date('Y-m-d', strtotime('-1 month'));           // 
            $fechaselected = date("Y-m-d");
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
            $fecha1 = new DateTime($anioiniselected."-".$mesiniselected."-01");
            $fecha2 = new DateTime($aniofinselected."-".$mesfinselected."-01");
            $fecha1->modify('first day of this month');
            $fecha2->modify('last day of this month');                        
            $productosstock = $this->model->getProductosStock($fecha1->format('Y-m-d')." 00:00:00",$fecha2->format('Y-m-d')." 23:59:59"); 
        }        
        
        $mensagge = !$_GET["respuesta"] ? null : $_GET["respuesta"];
        $registros = !$_GET["registros"] ? null : $_GET["registros"];
        $this->view->setVars('productosstock', $productosstock);
        $this->view->setVars('mensagge', $mensagge);
        $this->view->setVars('registros', $registros);
        $this->view->setVars('anioiniselected', $anioiniselected);
        $this->view->setVars('aniofinselected', $aniofinselected);
        $this->view->setVars('mesiniselected', $mesiniselected);
        $this->view->setVars('mesfinselected', $mesfinselected);    
        $this->view->setVars('aniomin', $aniomin);
        $this->view->setVars('aniomax', $aniomax);    
        $this->view->setVars('mesmax1', $mesmax1);  
        $this->view->setVars('mesmax2', $mesmax2);  
        $this->view->show();
    }

    public function massiveupload() {
        $this->view->setTemplate('InventoryAdjust' . DS . 'uploadAll');
        $this->document->addCss("style");
        $this->document->addCss("orden");
        $this->document->setHeader();
        $this->getModel("Reports");
        $anios = $this->model->getPeriodos();
        $this->view->setVars('anios', $anios);
        $this->view->show();
    }

    public function updateAllStock() {
        if ($_FILES['exceldatos']['size'] != 0) {
            if ($_FILES['exceldatos']['type'] == 'application/excel' ||
                    $_FILES['exceldatos']['type'] == 'application/vnd.ms-excel' ||
                    $_FILES['exceldatos']['type'] == 'application/x-excel' ||
                    $_FILES['exceldatos']['type'] == 'application/x-msexcel' ||
                    $_FILES['exceldatos']['type'] == 'text/csv' ||
                    $_FILES['exceldatos']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                $this->getModel('InventoryAdjust');
                if (!$this->model->getventas($_FILES['exceldatos']['name'])) {
                    if (!$this->model->verificarFecha($_POST["anioventa"], $_POST["mesventa"], $_POST["semanaventa"])) {
                        $misdatos = $this->model->createDataSessionInventory();
                        if ($misdatos[1]) {
                            $_SESSION['resultados'] = $misdatos[0];
                            $respuesta['registros'] = $misdatos[2];
                            $respuesta['respuesta'] = 'si';
                            echo json_encode($respuesta);
                        } else {
                            $_SESSION['resultados'] = $misdatos[0];
                            $respuesta['respuesta'] = 'sierror';
                            echo json_encode($respuesta);
                        }
                    } else {
                        $respuesta['respuesta'] = 'no';
                        $respuesta['error'] = 'Ya se cargaron ventas para el a&ntilde;o, mes y semana selecionados';
                        echo json_encode($respuesta);
                    }
                } else {
                    $respuesta['respuesta'] = 'no';
                    $respuesta['error'] = 'Archivo ya fue cargado';
                    echo json_encode($respuesta);
                }
            } else {
                $respuesta['respuesta'] = 'no';
                $respuesta['error'] = 'Tipo de archivo incorrecto';
                echo json_encode($respuesta);
            }
        } else {
            $respuesta['respuesta'] = 'no';
            $respuesta['error'] = 'Debe seleccionar un archivo';
            echo json_encode($respuesta);
        }
    }

    public function WriteExcelNotify() {
        error_reporting(E_ALL);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Resultado_carga_masiva_' . date("Y") . '_' . date("m") . '_' . date("d") . '.xlsx"');
        header('Cache-Control: max-age=0');
        // ini_set('include_path', ini_get('include_path') . ';../Classes/');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Software");
        $objPHPExcel->getProperties()->setLastModifiedBy("Software");
        $objPHPExcel->getProperties()->setSubject("Resultado carga Software");
        $objPHPExcel->getProperties()->setDescription("Resultado carga Software");
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', "TIENDA");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', "PRODUCTO");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', "CANTIDAD");
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', "PRECIO");
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', "RESULTADO CARGA");
        $cont = 2;
        foreach ($_SESSION["resultados"] as $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $cont, $value[0]);
            $objPHPExcel->getActiveSheet()->getStyle('A' . $cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $cont, $value[1]);
            $objPHPExcel->getActiveSheet()->getStyle('B' . $cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $cont, $value[2]);
            $objPHPExcel->getActiveSheet()->getStyle('C' . $cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $cont, $value[3]);
            $objPHPExcel->getActiveSheet()->getStyle('D' . $cont)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $cont, $value[4]);
            $cont++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('Resultado');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true)->setSize(15);
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('php://output');
    }

    public function cargasDiferentes(){        
        $this->view->setTemplate('InventoryAdjust' . DS . 'deshacercargas');         
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addScript("columnfilter");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->addCss("style");
        $this->document->addCss("orden");
        $this->document->addCss("pos");
        $this->document->addCss("demo_page");
        $this->document->addCss("demo_table");
        $this->document->setHeader();
        $this->getModel("InventoryAdjust");
        $cargas = $this->model->getCargas();
        $this->view->setVars('cargas', $cargas);
        $this->view->show();        
    }
    
    public function deleteCarga(){
        $this->getModel("InventoryAdjust");
        $cargas = $this->model->deleteCarga();                
    }
}

?>
