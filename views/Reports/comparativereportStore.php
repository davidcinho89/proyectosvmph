<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>   
<div class="container" style="margin-bottom: 20px; margin-top: 10px"> 
        <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Reporte de tiendas comparativo (Productos)</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>                  
            <div style="width: 100%;">     
                <fieldset class="colorleyend" style="width: 97%; padding: 10px">
                    <legend class="colorleyendinto">Filtros para comparar</legend>                         
                    <table border="0" style="padding: 10px; line-height: 15px">   
                        <tbody>    
                            <tr>
                                <td>Periodos a comparar:</td>
                            <td>                                                                            
                                <select name="periodocompa" id="periodocompa" style="width: 130px;">                                                
                                        <option value="semana">Semanas</option>
                                        <option value="mes">Meses</option>                                                                                                                                                                                                                                                              
                                </select>                                                                           
                            </td>                               
                            <td></td>
                            <td></td>   
                            </tr>  
                            <tr>
                                <td>Fecha 1<br><span id="fecha1">(A&ntilde;o-Mes-Semana):</span> </td>
                                <td>
                                    <select name="fechainianio" style="float: left" id="anioini">
                                        <?php for ($index1 = $aniomin; $index1 <= $aniomax; $index1++) {?>
                                        <option><?php echo $index1?></option>                                    
                                        <?php }?>
                                    </select>                               
                                    <select name="fechainimes" style="float: left" id="mesini">
                                        <?php for ($index1 = 1; $index1 <= $mesmax1; $index1++) {?>
                                        <option><?php echo $index1?></option>                                    
                                        <?php }?>
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
                                <td>Fecha 2<br><span id="fecha2">(A&ntilde;o-Mes-Semana):</span> </td>
                            <td>
                                <select name="fechafinanio" style="float: left" id="aniofin">
                                    <?php for ($index1 = $aniomin; $index1 <= $aniomax; $index1++) {?>
                                    <option><?php echo $index1?></option>                                    
                                    <?php }?>
                                </select>                               
                                <select name="fechafinmes" style="float: left" id="mesfin">
                                    <?php for ($index1 = 1; $index1 <= $mesmax2; $index1++) {?>
                                    <option><?php echo $index1?></option>                                    
                                    <?php }?>
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
                            </tr> 
                        </tbody>
                    </table>
                </fieldset>
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
                                              <?php  foreach ($productostodos as $key => $value) {?>
                                                    <option value="<?php echo $key?>">  
                                                        <?php echo $nombresproductos[$value]?>
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
                                                    <?php  foreach ($productostodos as $key => $value) {?>
                                                    <option value="<?php echo $key?>">  
                                                        <?php echo $nombresproductos[$value]?>
                                                    </option> 
                                              <?php  } ?>                                                                                                     
                                            </select>                             
                                            </td>                   
                                        </tr>
                                    </table> 
                                </div>     
                            </td>  
                            <td>Cliente inicial:</td>
                            <td> 
                                <div id="cajaselect3" style="margin-bottom: 0px">
                                    <table border="0" width="100%">                   
                                        <tr>      
                                            <td>   
                                            <select id="clienteini" name="clienteini" style="width: 150px;">  
                                              <?php  foreach ($clientestodos as $key => $value) {?>
                                                    <option value="<?php echo $key?>">  
                                                        <?php echo $nombresclientes[$key]?>
                                                    </option> 
                                              <?php  } ?>
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
                                                    <?php  foreach ($clientestodos as $key => $value) {?>
                                                    <option value="<?php echo $key?>">  
                                                        <?php echo $nombresclientes[$key]?>
                                                    </option> 
                                              <?php  } ?>                                                                                                     
                                            </select>                             
                                            </td>                   
                                        </tr>
                                    </table> 
                                </div>     
                            </td>
                            </tr>       
                            <tr>                                    
                           <td>Tienda inicial:</td>
                            <td> 
                                <div id="cajaselec5" style="margin-bottom: 0px">
                                    <table border="0" width="100%">                   
                                        <tr>      
                                            <td>   
                                            <select id="tiendaini" name="tiendaini" style="width: 150px;">  
                                              <?php  foreach ($tiendastodos as  $value) {?>
                                                    <option value="<?php echo $value[0]?>">  
                                                        <?php echo $nombrestiendas[$value[1]]?>
                                                    </option> 
                                              <?php  } ?>  
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
                                                    <?php  foreach ($tiendastodos as  $value) {?>
                                                    <option value="<?php echo $value[0]?>">  
                                                        <?php echo $nombrestiendas[$value[1]]?>
                                                    </option> 
                                              <?php  } ?>                                                                                                     
                                            </select>                             
                                            </td>                   
                                        </tr>
                                    </table> 
                                </div>     
                            </td>
                            <td></td>
                            <td></td>  
                            <td></td>
                            <td></td> 
                        </tr> 
                        </tbody>
                    </table> 
                    <a id="aplicar" href='#' onclick="redireccion()">        
                        <button style="width: 220px" class="buscarButton" id="CancelAll">Aplicar filtros</button>
                    </a>
                </fieldset>   
                
                <?php  
                if(!$reportini){
                $tablas=0;
                $columnas=null;
                    foreach ($clientes as $key22 => $value8) {                         
                        $tablas++;?>                                                                                   
                            <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                                <legend class="colorleyendinto">Reporte de tiendas comparativo de ventas x producto del cliente <?php echo $nombresclientes[$key22] ?></legend>                                                                                               
                                      <div style="margin-top: 0px;margin-bottom: 20px">   
                                        <table class="mytable<?php echo $tablas?>" border="0" cellspacing="0" cellpadding="0">      
                                            <thead>  
                                                <tr class="headall">     
                                                    <th class="headinit" style="cursor: pointer;" rowspan="2">Tienda</th>                                                                                                   
                                                    <?php  $contadorcito=0; 
                                                    $otro=null;
                                                    foreach ($productos as  $key15 => $value10) {                                                                                                 
                                                        $contadorcito++; ?> 
                                                    <th class="head" style="cursor: pointer;" colspan="6"><?php echo  $nombresproductos[$value10]?> </th>                                                    
                                                      <?php                                                                                                   
                                                    }
                                                    $columnas[$tablas]=$contadorcito  ?>   
                                                </tr>  
                                                <tr class="headall">   
                                                    <?php foreach ($productos as  $key15 => $value10) { ?> 
                                                    <th class="head" style="cursor: pointer;">Fecha 1</th>                                                    
                                                    <th class="head" style="cursor: pointer;">Fecha 2</th>
                                                    <th class="head" style="cursor: pointer;">Diferencia</th>                                                    
                                                    <th class="head" style="cursor: pointer;">Acumulado hasta<br> la fecha 1</th>   
                                                    <th class="head" style="cursor: pointer;">Acumulado hasta<br> la fecha 2</th>  
                                                    <th class="head" style="cursor: pointer;">Diferencia Acumulado</th>   
                                                    <?php }?>
                                                </tr>   
                                            </thead>     
                                            <tbody style="line-height: 25px">      
                                               <?php                                                  
                                                foreach ($tiendas as $value9) {                                                      
                                                   if($value9[2]==$key22){?>     
                                                    <tr>                                                        
                                                          <td class="init2"><?php echo $nombrestiendas[$value9[1]]  ?> </td>
                                                    <?php        
                                                    
                                                     foreach ($productos as  $key15 => $value10) {?>                
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $precios[1][$key15][$value9[0]];                                                               
                                                              if($otro[$key15]['maximo1']){
                                                                  $otro[$key15]['maximo1'] = $otro[$key15]['maximo1']>$precios[1][$key15][$value9[0]]?$otro[$key15]['maximo1']:$precios[1][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo1'] = $otro[$key15]['minimo1']<$precios[1][$key15][$value9[0]]?$otro[$key15]['minimo1']:$precios[1][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total1'] = $otro[$key15]['total1']+$precios[1][$key15][$value9[0]];         
                                                              }else{
                                                                  $otro[$key15]['maximo1'] = $precios[1][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo1'] = $precios[1][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total1'] = $precios[1][$key15][$value9[0]];   
                                                              }
                                                              ?>                                                      
                                                         </td> 
                                                         
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $precios[0][$key15][$value9[0]]; 
                                                              if($otro[$key15]['maximo2']){
                                                                  $otro[$key15]['maximo2'] = $otro[$key15]['maximo2']>$precios[0][$key15][$value9[0]]?$otro[$key15]['maximo2']:$precios[0][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo2'] = $otro[$key15]['minimo2']<$precios[0][$key15][$value9[0]]?$otro[$key15]['minimo2']:$precios[0][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total2'] = $otro[$key15]['total2']+$precios[0][$key15][$value9[0]];         
                                                              }else{
                                                                  $otro[$key15]['maximo2'] = $precios[0][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo2'] = $precios[0][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total2'] = $precios[0][$key15][$value9[0]];   
                                                              }
                                                              ?>                                                      
                                                         </td> 
                                                         
                                                         <?php $x=$precios[0][$key15][$value9[0]]-$precios[1][$key15][$value9[0]]; 
                                                              $porcentaje=$x/$precios[1][$key15][$value9[0]];
                                                              $imprimir=$porcentaje*100;
                                                              
                                                              if($otro[$key15]['maximo3']){
                                                                  $otro[$key15]['maximo3'] = $otro[$key15]['maximo3']>$imprimir?$otro[$key15]['maximo3']:$imprimir;
                                                                  $otro[$key15]['minimo3'] = $otro[$key15]['minimo3']<$imprimir?$otro[$key15]['minimo3']:$imprimir;                                                    
                                                                  $otro[$key15]['total3'] = $otro[$key15]['total3']+$imprimir;         
                                                              }else{
                                                                  $otro[$key15]['maximo3'] = $imprimir;
                                                                  $otro[$key15]['minimo3'] = $imprimir;                                                    
                                                                  $otro[$key15]['total3'] = $imprimir;   
                                                              }
                                                              ?>
                                                         <td class="item2" style="color:<?php if($imprimir<0){?> #FF0000<?php }else if($imprimir>0){?>#00FF00<?php }else{?>#000000<?php }?>; font-weight: bold">
                                                         <?php echo $imprimir>0?"+":""?>      
                                                         <?php echo number_format($imprimir,2,",",".")?>%                                                     
                                                         </td>
                                                         
                                                         
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $precios[2][$key15][$value9[0]]; 
                                                              if($otro[$key15]['maximo4']){
                                                                  $otro[$key15]['maximo4'] = $otro[$key15]['maximo4']>$precios[2][$key15][$value9[0]]?$otro[$key15]['maximo4']:$precios[2][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo4'] = $otro[$key15]['minimo4']<$precios[2][$key15][$value9[0]]?$otro[$key15]['minimo4']:$precios[2][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total4'] = $otro[$key15]['total4']+$precios[2][$key15][$value9[0]];         
                                                              }else{
                                                                  $otro[$key15]['maximo4'] = $precios[2][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo4'] = $precios[2][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total4'] = $precios[2][$key15][$value9[0]];   
                                                              }
                                                              ?>                                                      
                                                         </td> 
                                                          <td class="item2" style="cursor: pointer;">
                                                              <?php echo $precios[3][$key15][$value9[0]];
                                                              if($otro[$key15]['maximo5']){
                                                                  $otro[$key15]['maximo5'] = $otro[$key15]['maximo5']>$precios[3][$key15][$value9[0]]?$otro[$key15]['maximo5']:$precios[3][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo5'] = $otro[$key15]['minimo5']<$precios[3][$key15][$value9[0]]?$otro[$key15]['minimo5']:$precios[3][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total5'] = $otro[$key15]['total5']+$precios[3][$key15][$value9[0]];         
                                                              }else{
                                                                  $otro[$key15]['maximo5'] = $precios[3][$key15][$value9[0]];
                                                                  $otro[$key15]['minimo5'] = $precios[3][$key15][$value9[0]];                                                    
                                                                  $otro[$key15]['total5'] = $precios[3][$key15][$value9[0]];   
                                                              }
                                                              ?>                                                      
                                                         </td> 
                                                         <?php $x=$precios[3][$key15][$value9[0]]-$precios[2][$key15][$value9[0]]; 
                                                              $porcentaje=$x/$precios[2][$key15][$value9[0]];
                                                              $imprimir=$porcentaje*100;
                                                              if($otro[$key15]['maximo6']){
                                                                  $otro[$key15]['maximo6'] = $otro[$key15]['maximo6']>$imprimir?$otro[$key15]['maximo6']:$imprimir;
                                                                  $otro[$key15]['minimo6'] = $otro[$key15]['minimo6']<$imprimir?$otro[$key15]['minimo6']:$imprimir;                                                    
                                                                  $otro[$key15]['total6'] = $otro[$key15]['total6']+$imprimir;         
                                                              }else{
                                                                  $otro[$key15]['maximo6'] = $imprimir;
                                                                  $otro[$key15]['minimo6'] = $imprimir;                                                    
                                                                  $otro[$key15]['total6'] = $imprimir;   
                                                              }
                                                              ?>
                                                         <td class="item2" style="color:<?php if($imprimir<0){?> #FF0000<?php }else if($imprimir>0){?>#00FF00<?php }else{?>#000000<?php }?>; font-weight: bold">
                                                         <?php echo $imprimir>0?"+":""?>      
                                                         <?php echo number_format($imprimir,2,",",".")?>%                                                     
                                                         </td>
                                                         
                                                         
                                                          <?php }    ?>                                                                                                      
                                                    </tr>  
                                                    <?php }?>         
                                           <?php } ?>
                                            </tbody> 
                                            <tfoot>
                                                <tr>
                                                    <td class="init2"><strong>TOTAL</strong></td>
                                                <?php  foreach ($productos as  $key15 => $value10) {?>                
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['total1']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['total2']?>  
                                                             
                                                         </td> 
                                                          <?php $x=$otro[$key15]['total2']-$otro[$key15]['total1']; 
                                                              $porcentaje=$x/$otro[$key15]['total1'];
                                                              $imprimir=$porcentaje*100;
                                                              ?>
                                                         <td class="item2" style="color:<?php if($imprimir<0){?> #FF0000<?php }else if($imprimir>0){?>#00FF00<?php }else{?>#000000<?php }?>; font-weight: bold">
                                                         <?php echo $imprimir>0?"+":""?>      
                                                         <?php echo number_format($imprimir,2,",",".")?>%                                                     
                                                         </td>
                                                         
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['total4']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['total5']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;"></td> 
                                                         <?php  }?>  
                                                </tr>
                                                <tr>
                                                    <td class="init2"><strong>MAXIMO</strong></td>
                                                <?php  foreach ($productos as  $key15 => $value10) {?>                
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['maximo1']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['maximo2']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php //echo $otro[$key15]['maximo3']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['maximo4']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['maximo5']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php // echo $otro[$key15]['maximo6']?>                                                      
                                                         </td> 
                                                         <?php  }?>  
                                                </tr>
                                                <tr>
                                                    <td class="init2"><strong>MINIMO</strong></td>
                                                <?php  foreach ($productos as  $key15 => $value10) {?>                
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['minimo1']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['minimo2']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php //echo $otro[$key15]['minimo3']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['minimo4']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php echo $otro[$key15]['minimo5']?>                                                      
                                                         </td> 
                                                         <td class="item2" style="cursor: pointer;">
                                                              <?php //echo $otro[$key15]['minimo6']?>                                                      
                                                         </td> 
                                                         <?php  }?>  
                                                </tr>                                                
                                            </tfoot> 
                                                  
                                        </table>
                                    </div>                                  
                            </fieldset>                                                        
                <?php }} ?>
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
        $('#productoini').val("<?php  echo $productoselectedini; ?>"); 
        $('#productofin').val("<?php  echo $productoselectedfin; ?>"); 
        $('#clienteini').val("<?php  echo $clienteselectedini; ?>"); 
        $('#clientefin').val("<?php  echo $clienteselectedfin; ?>");
        $('#tiendaini').val("<?php  echo $tiendaselectedini; ?>"); 
        $('#tiendafin').val("<?php  echo $tiendaselectedfin; ?>");
        $('#anioini').val("<?php  echo $anioini; ?>"); 
        $('#aniofin').val("<?php  echo $aniofin; ?>");
        $('#mesini').val("<?php  echo (int) $mesini; ?>"); 
        $('#mesfin').val("<?php  echo (int) $mesfin; ?>");
        $('#semanaini').val("<?php  echo (int) $semanaini; ?>"); 
        $('#semanafin').val("<?php  echo (int) $semanafin; ?>");
        $("#periodocompa").val("<?php  echo $periodo; ?>");
        
        if("<?php  echo $periodo; ?>"=="mes"){
           $("#semanaini").hide();
           $("#semanafin").hide();
           $("#fecha1").html("(A&ntilde;o-Mes):");
           $("#fecha2").html("(A&ntilde;o-Mes):");
        }else{
           $("#semanaini").show();
           $("#semanafin").show();
           $("#fecha1").html("(A&ntilde;o-Mes-Semana):");
           $("#fecha2").html("(A&ntilde;o-Mes-Semana):");
        }
       
          
        <?php  
        if(!$reportini){
        for ($index = 1; $index <= $tablas; $index++) {?>
           var arraycolum=new Array(<?php echo (($columnas[$index])*6)+1?>)    
           arraycolum[0]=null;    
           <?php for($index2 = 1; $index2 <= ($columnas[$index])*6; $index2++) {?>
           arraycolum[<?php echo $index2?>]={"sType": "numeric-point", "bSearchable": false};
           <?php } ?>
        $('.mytable<?php echo $index?>').css('line-height' ,'15px');
        $('.mytable<?php echo $index?>').css('width' ,'100%');
        $('.mytable<?php echo $index?>').dataTable( { 
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
                        url: "index.php?controlador=ReportSales&accion=gettiendasAjax",
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
                        url: "index.php?controlador=ReportSales&accion=gettiendasAjax",
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
                
               $("#periodocompa").change(function(){
                   if($("#periodocompa").val()=="mes"){
                       $("#semanaini").hide();
                       $("#semanafin").hide();
                       $("#fecha1").html("(A&ntilde;o-Mes):");
                       $("#fecha2").html("(A&ntilde;o-Mes):");
                   }else{
                       $("#semanaini").show();
                       $("#semanafin").show();
                       $("#fecha1").html("(A&ntilde;o-Mes-Semana):");
                       $("#fecha2").html("(A&ntilde;o-Mes-Semana):");
                   }
               });
                
   });  
   
   function redireccion(){
       window.location="index.php?controlador=ReportComparativeStore&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val()+"&periodo="+$("#periodocompa").val();
   }
</script>      
