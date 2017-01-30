<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>           
        <div class="container" style="margin-bottom: 20px; margin-top: 10px">           
            <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Reporte de precios</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>
            <div style="width: 100%;">     
                <fieldset class="colorleyend" style="width: 97%; padding: 10px">
                    <legend class="colorleyendinto">Opciones de búsqueda</legend>                         
                    <table border="0" style="padding: 10px; line-height: 15px">   
                        <tbody>    
                            <tr>        
                                <td>Producto inicial:</td>
                                <td> 
                                    <div id="cajaselect" style="margin-bottom: 0px">
                                        <table border="0" width="100%">                   
                                            <tr>      
                                                <td>   
                                                    <select id="productoini" name="productoini" style="width: 130px;">  
                                                        <?php foreach ($productostodos as $key => $value) { ?>
                                                            <option value="<?php echo $key ?>">  
                                                                <?php echo $nombresproductos[$value] ?>
                                                            </option> 
                                                        <?php } ?>
                                                    </select>                             
                                                </td>                   
                                            </tr>
                                        </table> 
                                    </div>     
                                </td>   
                                <td>Producto final:</td>
                                <td> 
                                    <div id="cajaselect2" style="margin-bottom: 0px">
                                        <table border="0" width="100%">                   
                                            <tr>      
                                                <td>   
                                                    <select id="productofin" name="productofin" style="width: 130px;">                                                
                                                        <?php foreach ($productostodos as $key => $value) { ?>
                                                            <option value="<?php echo $key ?>">  
                                                                <?php echo $nombresproductos[$value] ?>
                                                            </option> 
                                                        <?php } ?>                                                                                                     
                                                    </select>                             
                                                </td>                   
                                            </tr>
                                        </table> 
                                    </div>     
                                </td>  
                                <td>Cliente inicial:</td>
                                <td> 
                                    <div id="cajaselect3" style="margin-bottom: 0px" >
                                        <table border="0" width="100%">                   
                                            <tr>      
                                                <td>   
                                                    <select id="clienteini" name="clienteini" style="width: 150px;">   
                                                        <?php foreach ($clientestodos as $key => $value) { ?>
                                                            <option value="<?php echo $key ?>">  
                                                                <?php echo $nombresclientes[$key] ?>
                                                            </option> 
                                                        <?php } ?>
                                                    </select>                             
                                                </td>                   
                                            </tr>
                                        </table> 
                                    </div>     
                                </td>   
                                <td>Cliente final:</td>
                                <td> 
                                    <div id="cajaselect4" style="margin-bottom: 0px">
                                        <table border="0" width="100%">                   
                                            <tr>      
                                                <td>   
                                                    <select id="clientefin" name="clientefin" style="width: 150px;">                                                
                                                        <?php foreach ($clientestodos as $key => $value) { ?>
                                                            <option value="<?php echo $key ?>">  
                                                                <?php echo $nombresclientes[$key] ?>
                                                            </option> 
                                                        <?php } ?>                                                                                                     
                                                    </select>                             
                                                </td>                   
                                            </tr>
                                        </table> 
                                    </div>     
                                </td>
                            </tr>       
                            <tr>       
                                <td><?php $doc->texto('DATEINI') ?><br>(A&ntilde;o-Mes-Semana): </td>
                                <td>
                                    <select name="fechainianio" style="float: left" id="anioini">
                                        <?php for ($index1 = $aniomin; $index1 <= $aniomax; $index1++) { ?>
                                            <option><?php echo $index1 ?></option>                                    
                                        <?php } ?>
                                    </select>                               
                                    <select name="fechainimes" style="float: left" id="mesini">
                                        <?php for ($index1 = 1; $index1 <= $mesmax1; $index1++) { ?>
                                            <option><?php echo $index1 ?></option>                                    
                                        <?php } ?>
                                    </select>                                
                                    <select name="fechainisemana" style="float: left" id="semanaini">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>

                                    </select>
                                    <div style="clear: both"></div>
                                </td>  
                                <td><?php $doc->texto('DATEFIN') ?><br>(A&ntilde;o-Mes-Semana): </td>
                                <td>
                                    <select name="fechafinanio" style="float: left" id="aniofin">
                                        <?php for ($index1 = $aniomin; $index1 <= $aniomax; $index1++) { ?>
                                            <option><?php echo $index1 ?></option>                                    
                                        <?php } ?>
                                    </select>                               
                                    <select name="fechafinmes" style="float: left" id="mesfin">
                                        <?php for ($index1 = 1; $index1 <= $mesmax2; $index1++) { ?>
                                            <option><?php echo $index1 ?></option>                                    
                                        <?php } ?>
                                    </select>                                
                                    <select name="fechafinsemana" style="float: left" id="semanafin">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <div style="clear: both"></div>
                                </td>  
                                <td>Tienda inicial:</td>
                                <td> 
                                    <div id="cajaselec5" style="margin-bottom: 0px">
                                        <table border="0" width="100%">                   
                                            <tr>      
                                                <td>   
                                                    <select id="tiendaini" name="tiendaini" style="width: 150px;">  
                                                        <?php foreach ($tiendastodos as $value) { ?>
                                                            <option value="<?php echo $value[0] ?>">  
                                                                <?php echo $nombrestiendas[$value[1]] ?>
                                                            </option> 
                                                        <?php } ?>  
                                                    </select>                             
                                                </td>                   
                                            </tr>
                                        </table> 
                                    </div>     
                                </td>   
                                <td>Tienda final:</td>
                                <td> 
                                    <div id="cajaselect6" style="margin-bottom: 0px">
                                        <table border="0" width="100%">                   
                                            <tr>      
                                                <td>   
                                                    <select id="tiendafin" name="tiendafin" style="width: 150px;">                                                
                                                        <?php foreach ($tiendastodos as $value) { ?>
                                                            <option value="<?php echo $value[0] ?>">  
                                                                <?php echo $nombrestiendas[$value[1]] ?>
                                                            </option> 
                                                        <?php } ?>                                                                                                     
                                                    </select>                             
                                                </td>                   
                                            </tr>
                                        </table> 
                                    </div>     
                                </td>
                            </tr> 
                        </tbody>
                    </table> 
                    <a id="aplicar" href='#' onclick="redireccion()">        
                        <button style="width: 220px" class="buscarButton" id="CancelAll">Aplicar filtros</button>
                    </a>
                </fieldset>   
                <?php
                if(!$reportini){
                $tablas = 0;
                $columnas = null;
                foreach ($clientes as $key22 => $value8) {
                    $valtabbb[$key22] = false;
                    foreach ($tiendas as $value9) {
                        if ($value9[2] == $key22) {
                            $valtabbb[$key22] = true;
                        }
                    }
                    $tablas++;
                    if ($valtabbb[$key22]) {
                        ?>                                                                 
                        <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                            <legend class="colorleyendinto">Reporte de precios del cliente <?php echo $nombresclientes[$key22] ?></legend>                                                                                               
                            <div style="margin-top: 0px;margin-bottom: 20px">   
                                <table class="mytable<?php echo $tablas ?>" border="0" cellspacing="0" cellpadding="0">      
                                    <thead>  
                                        <tr class="headall">     
                                            <th class="headinit" style="cursor: pointer;" rowspan="2">Producto</th>
                                            <?php
                                            $contadorcito = 0;                                         
                                            foreach ($tiendas as $value9) {
                                                if ($value9[2] == $key22) {
                                                    $contadorcito++;
                                                    ?> 
                                                    <th class="head" style="cursor: pointer;" colspan="2"><?php echo $nombrestiendas[$value9[1]] ?> </th>                                                    
                                                    <?php
                                                }
                                            }
                                            $columnas[$tablas] = $contadorcito
                                            ?> 
                                            <th class="head" style="cursor: pointer;" rowspan="2">Precio máximo </th>                                                            
                                            <th class="head" style="cursor: pointer;" rowspan="2">Cantidad máxima</th>                                                            
                                            <th class="head" style="cursor: pointer;" rowspan="2">Precio mínimo</th>                                                            
                                            <th class="head" style="cursor: pointer;" rowspan="2">Cantidad mínima</th> 
                                        </tr>  
                                        <tr class="headall">  
                                            <?php foreach ($tiendas as $value9) {
                                                if ($value9[2] == $key22) { ?>                                                   
                                                    <th class="head" style="cursor: pointer;border-top: none">Precio</th>                                                    
                                                    <th class="head" style="cursor: pointer;border-top: none">Cantidad</th>                                                    
                                            <?php }
                                        } ?> 
                                        </tr>                                                       
                                    </thead>     
                                    <tbody style="line-height: 25px">      
                                            <?php                                               
                                            foreach ($productos as $key15 => $value10) {
                                                ?>     
                                            <tr>                                                        
                                                <td class="init2" style="cursor: pointer;"><?php echo $nombresproductos[$value10] ?> </td>
                                                <?php                                                                                                
                                                $todosprecion=null;
                                                $todoscantidad=null;
                                                foreach ($tiendas as $value9) {
                                                    if ($value9[2] == $key22) {?>   
                                                        <td class="item2" style="cursor: pointer;">
                                                            <?php echo '&#36;' . number_format($precios[0][$key15][$value9[0]], 0, ',', '.');                                                             
                                                            if($precios[0][$key15][$value9[0]]>0){
                                                                $otro[$value9[0]]["todos"][]=$precios[0][$key15][$value9[0]];
                                                                $todosprecion[]=$precios[0][$key15][$value9[0]];
                                                            }                                                                                                                        
                                                            ?>
                                                        </td> 
                                                        <td class="item2" style="cursor: pointer;">
                                                            <?php echo $precios[1][$key15][$value9[0]];                                                            
                                                            if($precios[1][$key15][$value9[0]]>0){
                                                                $otro[$value9[0]]["todoscan"][]=$precios[1][$key15][$value9[0]];
                                                                $todoscantidad[]=$precios[1][$key15][$value9[0]];
                                                            }                                                         
                                                            ?>                                                             
                                                        </td> 
                                                    <?php }
                                                } ?> 
                                                        <td class="item2" style="cursor: pointer;"><?php 
                                                        if($todosprecion){
                                                        arsort($todosprecion);
                                                        echo '&#36;' . number_format(current($todosprecion), 0, ',', '.');}else{  echo '&#36;' . '0';}?>
                                                        </td> 
                                                        
                                                        <td class="item2" style="cursor: pointer;"><?php 
                                                        if($todoscantidad){
                                                        arsort($todoscantidad);
                                                        echo current($todoscantidad);}else{  echo '0';}?>
                                                        </td> 
                                                        <td class="item2" style="cursor: pointer;"><?php 
                                                        if($todosprecion){
                                                        asort($todosprecion);
                                                        echo '&#36;' . number_format(current($todosprecion), 0, ',', '.');}else{  echo '&#36;' . '0';}?>
                                                        </td> 
                                                        <td class="item2" style="cursor: pointer;"><?php 
                                                        if($todoscantidad){
                                                        asort($todoscantidad);
                                                        echo current($todoscantidad);}else{  echo '0';}?></td> 
                                                        
                                            </tr>   
                                    <?php } ?>
                                    </tbody>   
                                    <tfoot>
                                        <tr>
                                            <td class="init2"><strong>MAXIMO</strong></td>
                                        <?php  foreach ($tiendas as $value9) {
                                                    if ($value9[2] == $key22) {?> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php                                                               
                                                                  if(isset($otro[$value9[0]]["todos"])){                                                           
                                                                      arsort($otro[$value9[0]]['todos']);                                                          
                                                                      echo '&#36;' . number_format(current($otro[$value9[0]]['todos']), 0, ',', '.');
                                                                  }else{
                                                                      echo '&#36;' . '0';
                                                                  } ?>                                                    
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php                                                               
                                                                  if(isset($otro[$value9[0]]["todoscan"])){                                                           
                                                                      arsort($otro[$value9[0]]['todoscan']);                                                          
                                                                      echo current($otro[$value9[0]]['todoscan']);
                                                                  }else{
                                                                      echo '0';
                                                                  } ?>                                                      
                                                         </td> 
                                         <?php  }
                                         
                                         }?>  
                                        </tr>
                                        <tr>
                                            <td class="init2"><strong>MINIMO</strong></td>
                                        <?php  foreach ($tiendas as $value9) {
                                                 if ($value9[2] == $key22) {?>   
                                                <td class="item2" style="cursor: pointer;">
                                                      <?php                                                               
                                                      if(isset($otro[$value9[0]]["todos"])){                                                           
                                                          asort($otro[$value9[0]]['todos']);                                                          
                                                          echo '&#36;' . number_format(current($otro[$value9[0]]['todos']), 0, ',', '.');
                                                      }else{
                                                          echo '&#36;' . '0';
                                                      } ?>                                                      
                                                 </td> 
                                                 <td class="item2" style="cursor: pointer;">
                                                      <?php                                                               
                                                      if(isset($otro[$value9[0]]["todoscan"])){                                                           
                                                          asort($otro[$value9[0]]['todoscan']);                                                          
                                                          echo current($otro[$value9[0]]['todoscan']);
                                                      }else{
                                                          echo '0';
                                                      } ?>                                                     
                                                </td> 
                                         <?php  }
                                         
                                         }?>  
                                        </tr>
                                   </tfoot> 
                                </table>
                            </div>                                  
                        </fieldset>                                                        
    <?php }
} }?>
            </div> 
        </div>         
<script>
    jQuery.fn.dataTableExt.oSort['numeric-point-asc'] = function(a, b) {
        var x = (a == "-") ? 0 : a.replace("$", "").replace(".", "").replace("/Kg.", "").replace("/Und.", "");
        var y = (b == "-") ? 0 : b.replace("$", "").replace(".", "").replace("/Kg.", "").replace("/Und.", "");
        return (x - y);
    };

    jQuery.fn.dataTableExt.oSort['numeric-point-desc'] = function(a, b) {
        var x = (a == "-") ? 0 : a.replace("$", "").replace(".", "").replace("/Kg.", "").replace("/Und.", "");
        var y = (b == "-") ? 0 : b.replace("$", "").replace(".", "").replace("/Kg.", "").replace("/Und.", "");
        return (y - x);
    };
    $(document).ready(function(){ 
        /*
        $('#productoini').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#productofin').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#clienteini').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#clientefin').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });        
        $('#tiendaini').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#tiendafin').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#anioini').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#aniofin').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#mesini').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#mesfin').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#semanaini').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#semanafin').change(function(){
            window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        */
        $('#productoini').val("<?php echo $productoselectedini; ?>"); 
        $('#productofin').val("<?php echo $productoselectedfin; ?>"); 
        $('#clienteini').val("<?php echo $clienteselectedini; ?>"); 
        $('#clientefin').val("<?php echo $clienteselectedfin; ?>");
        $('#tiendaini').val("<?php echo $tiendaselectedini; ?>"); 
        $('#tiendafin').val("<?php echo $tiendaselectedfin; ?>");
        $('#anioini').val("<?php echo $anioini; ?>"); 
        $('#aniofin').val("<?php echo $aniofin; ?>");
        $('#mesini').val("<?php echo (int) $mesini; ?>"); 
        $('#mesfin').val("<?php echo (int) $mesfin; ?>");
        $('#semanaini').val("<?php echo (int) $semanaini; ?>"); 
        $('#semanafin').val("<?php echo (int) $semanafin; ?>");
       
          
<?php 
if(!$reportini){
for ($index = 1; $index <= $tablas; $index++) { ?>
                    var arraycolum=new Array(<?php echo ($columnas[$index] * 2) + 5 ?>)    
                    arraycolum[0]=null;    
    <?php for ($index2 = 1; $index2 <= $columnas[$index] * 2; $index2++) { ?>
                           arraycolum[<?php echo $index2 ?>]={"sType": "numeric-point", "bSearchable": false};
    <?php } ?>
           arraycolum[<?php echo $columnas[$index]+1 ?>]=null;
           arraycolum[<?php echo $columnas[$index]+2 ?>]=null;
           arraycolum[<?php echo $columnas[$index]+3 ?>]=null;
           arraycolum[<?php echo $columnas[$index]+4 ?>]=null;
                       $('.mytable<?php echo $index ?>').css('line-height' ,'15px');
                       $('.mytable<?php echo $index ?>').css('width' ,'100%');
                       $('.mytable<?php echo $index ?>').dataTable( { 
                           "oLanguage":  {
                               "sEmptyTable":     "No existen datos disponibles",
                               "sInfo":           "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                               "sInfoEmpty":      "Mostrando desde 0 hasta 0 de 0 registros",
                               "sInfoFiltered":   "(filtrado de _MAX_ registros en total)",
                               "sInfoPostFix":    "",
                               "sInfoThousands":  ",",
                               "sLengthMenu":     "Mostrar _MENU_ registros",
                               "sLoadingRecords": "Cargando...",
                               "sProcessing":     "Procesando...",
                               "sSearch":         "Buscar:",
                               "sZeroRecords":    "No se encontraron resultados",
                               "oPaginate": {
                                   "sFirst":    "Primero",
                                   "sLast":     "Último",
                                   "sNext":     "Siguiente",
                                   "sPrevious": "Anterior"
                               }, 
                               "oAria": { 
                                   "sSortAscending":  ": activar para Ordenar Ascendentemente",
                                   "sSortDescending": ": activar para Ordendar Descendentemente"
                               }
                           }, 
                           "sPaginationType": "full_numbers",
                           "aaSorting": [[ 0, "asc" ]],
                           "aoColumns": arraycolum
                           // "aoColumns": [null,null,null]
                       });         
<?php }
}?>  
                $("#anioini").change(function(){
                    $.ajax({
                        type: "POST",
                        url: "index.php?controlador=ReportPrice&accion=getmesesAjax",
                        dataType: "json",
                        data: {anioajax:$(this).val()},
                        beforeSend: function(xhr) {
                            $("#anioini").attr("disabled","disabled");                            
                            $("#mesini").hide();                            
                            $("#mesini").after("<img class='jojojo' src='images/ajax-loader.gif'/>");                                                       
                        },
                        success: function(data) {
                            $("#anioini").removeAttr("disabled");                            
                            $("#mesini").show();                            
                            $("#mesini").nextAll(".jojojo").remove();                            
                            $("#mesini").html("");                            
                            for(var i = 1; i <= data['meses']; i++){
                                var option = $("<option>").attr('value', i).appendTo("#mesini");
                                option.html(i);
                            }                                                       
                        }               
                    });
                });
                
                $("#aniofin").change(function(){
                    $.ajax({
                        type: "POST",
                        url: "index.php?controlador=ReportPrice&accion=getmesesAjax",
                        dataType: "json",
                        data: {anioajax:$(this).val()},
                        beforeSend: function(xhr) {
                            $("#aniofin").attr("disabled","disabled");                            
                            $("#mesfin").hide();                            
                            $("#mesfin").after("<img class='jojojo' src='images/ajax-loader.gif'/>");                                                       
                        },
                        success: function(data) {
                            $("#aniofin").removeAttr("disabled");                            
                            $("#mesfin").show();                            
                            $("#mesfin").nextAll(".jojojo").remove();                            
                            $("#mesfin").html("");                            
                            for(var i = 1; i <= data['meses']; i++){
                                var option = $("<option>").attr('value', i).appendTo("#mesfin");
                                option.html(i);
                            }                                                       
                        }               
                    });
                });
                
                $("#clienteini").change(function(){
                    $.ajax({
                        type: "POST",
                        url: "index.php?controlador=ReportPrice&accion=gettiendasAjax",
                        dataType: "json",
                        data: {clienteiniajax:$(this).val(),clientefinajax:$("#clientefin").val()},
                        beforeSend: function(xhr) {
                            $("#clientefin").attr("disabled","disabled");
                            $("#clienteini").attr("disabled","disabled");   
                            $("#tiendaini").hide();
                            $("#tiendafin").hide();
                            $("#tiendaini").after("<img class='jojojo' src='images/ajax-loader.gif'/>");
                            $("#tiendafin").after("<img class='jojojo' src='images/ajax-loader.gif'/>");                            
                        },
                        success: function(data) {
                            $("#clientefin").removeAttr("disabled");
                            $("#clienteini").removeAttr("disabled"); 
                            $("#tiendaini").show();
                            $("#tiendafin").show();
                            $("#tiendaini").nextAll(".jojojo").remove();;
                            $("#tiendafin").nextAll(".jojojo").remove();;
                            $("#tiendaini").html("");
                            $("#tiendaini").html("");
                            for(var i = 1; i < data.length; i++){
                                var option = $("<option>").attr({'value': data[i]['id'],
                                    'id': 'optionus'+data[i]['id']}).appendTo("#tiendaini");
                                option.html(data[i]['codigo']);
                            }
                            $("#tiendafin").html("");
                            for(var i = 1; i < data.length; i++){
                                var option = $("<option>").attr({'value': data[i]['id'],
                                    'id': 'optionus'+data[i]['id']}).appendTo("#tiendafin");
                                option.html(data[i]['codigo']);
                            }
                            $("#clientefin").val(data[0]);
                        }               
                    });
                });
                
                $("#clientefin").change(function(){
                //<img src="images/ajax-loader.gif"/>
                    $.ajax({
                        type: "POST",
                        url: "index.php?controlador=ReportPrice&accion=gettiendasAjax",
                        dataType: "json",
                        data: {clientefinajax:$(this).val(),clienteiniajax:$("#clienteini").val()},
                        beforeSend: function(xhr) {
                            $("#clientefin").attr("disabled","disabled");
                            $("#clienteini").attr("disabled","disabled");   
                            $("#tiendaini").hide();
                            $("#tiendafin").hide();
                            $("#tiendaini").after("<img class='jojojo' src='images/ajax-loader.gif'/>");
                            $("#tiendafin").after("<img class='jojojo' src='images/ajax-loader.gif'/>");                            
                        },
                        success: function(data) {
                            $("#clientefin").removeAttr("disabled");
                            $("#clienteini").removeAttr("disabled"); 
                            $("#tiendaini").show();
                            $("#tiendafin").show();
                            $("#tiendaini").nextAll(".jojojo").remove();;
                            $("#tiendafin").nextAll(".jojojo").remove();;
                            $("#tiendaini").html("");
                            for(var i = 1; i < data.length; i++){
                                var option = $("<option>").attr({'value': data[i]['id'],
                                    'id': 'optionus'+data[i]['id']}).appendTo("#tiendaini");
                                option.html(data[i]['codigo']);
                            }
                            $("#tiendafin").html("");
                            for(var i = 1; i < data.length; i++){
                                var option = $("<option>").attr({'value': data[i]['id'],
                                    'id': 'optionus'+data[i]['id']}).appendTo("#tiendafin");
                                option.html(data[i]['codigo']);
                            }
                            $("#clientefin").val(data[0]);
                        }               
                    });
                });
            }); 
            function redireccion(){
                 window.location="index.php?controlador=ReportPrice&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
             }
</script>      
