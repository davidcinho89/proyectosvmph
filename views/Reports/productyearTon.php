<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>          
<div class="container" style="margin-bottom: 20px; margin-top: 10px">           
    <div style="width: 100%;">     
        <fieldset class="colorleyend" style="width: 140%; padding: 10px">
            <legend class="colorleyendinto">Opciones de búsqueda</legend>     
            <form method="POST" action="index.php?controlador=Reports&accion=reporteVentas">
                <table border="0" style="padding: 10px; line-height: 15px; width: 100%">
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
                                <div id="cajaselect3" style="margin-bottom: 0px">
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
                            <td>A&ntilde;o: </td>
                            <td>
                                <select name="fechaini" id="fechaini">
                                    <?php foreach ($anios as $value) { ?>
                                        <option>  
                                            <?php echo $value ?>
                                        </option> 
                                    <?php } ?> 
                                </select>
                            </td>  
                            
                            <td><?php if($fechafin){?>
                                <input type="checkbox" name="compare" id="compares" style="float: left" checked="checked"/>
                                <?php }else{?>
                                <input type="checkbox" name="compare" id="compares" style="float: left"/>
                                <?php } ?> 
                                <div style="float: left">Comparar con:</div> <div style="clear: left">
                                    
                                </div>
                            </td> 
                            <td>
                                
                                    <?php if($fechafin){?>
                                    <select name="fechafin" id="fechafin" class="selectornormal" style="cursor: default">
                                        <?php foreach ($anios2 as $value) { ?>
                                            <option>  
                                                <?php echo $value ?>
                                            </option> 
                                        <?php } ?> 
                                    </select>
                                    <?php }else{?>
                                    <select name="fechafin" id="fechafin" disabled="disabled" class="selectordisabled" style="cursor: default">
                                    <option>
                                        N/A
                                    </option>
                                    </select>
                                    <?php }?>
                                
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
            </form>
            <a id="aplicar" href='#' onclick="redireccion()">        
                <button style="width: 220px" class="buscarButton" id="CancelAll">Aplicar filtros</button>
            </a>
        </fieldset>                                  
        <div>             
            <div style="margin-top: 0px;margin-bottom: 20px; width: 100%">  
                <?php
                if(!$reportini){
                $tablas = 0;
                $columnas = null;                
                foreach ($productos as $key22 => $value8) {
                    $total=null;
                    $total2=null;
                    $totaltotales=0;
                    $totaltotales2=0;
                    $tablas++;
                    ?> 
                    <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                        <legend class="colorleyendinto">Reporte anual de ventas en TONELADAS del producto <?php echo $nombresproductos[$value8] ?></legend>                                                                                               
                        <div style="margin-top: 0px;margin-bottom: 20px">   
                            <table class="mytable<?php echo $tablas ?>" border="0" cellspacing="0" cellpadding="0">      
                                <thead>  
                                    <tr class="headall">     
                                        <th class="headinit" style="cursor: pointer;" rowspan="2">Tienda</th>
                                        <th class="head" style="cursor: pointer;" rowspan="2">A&ntilde;o</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Ene</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Feb</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Mar</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Abr</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">May</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Jun</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Jul</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Ago</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Sep</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Oct</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Nov</th>
                                        <th class="head" style="cursor: pointer;" colspan="5">Dic</th>
                                        <th class="head" style="cursor: pointer;" rowspan="2">Promedio</th>
                                        <th class="head" style="cursor: pointer;" rowspan="2">Total</th>
                                    </tr>   
                                    <tr class="headall">     
                                       <?php for ($index1 = 1; $index1 <=12; $index1++){?>                                                                                                                  
                                        <th class="head" style="cursor: pointer;" >1</th>                                                                             
                                        <th class="head" style="cursor: pointer;" >2</th>    
                                        <th class="head" style="cursor: pointer;" >3</th>    
                                        <th class="head" style="cursor: pointer;" >4</th>    
                                        <th class="head" style="cursor: pointer;" >5</th>  
                                        <?php }?>
                                    </tr> 
                                </thead>     
                                <tbody style="line-height: 25px">      
                                <?php foreach ($tiendas as $value9) {
                                    if (isset($clientes[$value9[2]])) { ?>                                                
                                                       
                                                <?php if($fechafin){?>
                                                <tr>
                                                <td class="init2"><?php echo $nombrestiendas[$value9[1]] ?> </td> 
                                                <td class="init2"><?php echo $fechaini?> </td> 
                                                <?php for ($index14 = 1; $index14 <=12; $index14++){?> 
                                                 <td class="item2">
                                                    <?php echo $var1=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1];
                                                    $total[$index14][1]=$total[$index14][1]+$var1?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var2=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][2]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][2]; 
                                                     $total[$index14][2]=$total[$index14][2]+$var2?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var3=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][3]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][3];
                                                    $total[$index14][3]=$total[$index14][3]+$var3?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var4=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][4]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][4]; 
                                                    $total[$index14][4]=$total[$index14][4]+$var4?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var5=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][5]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][5]; 
                                                    $total[$index14][5]=$total[$index14][5]+$var5?>
                                                 </td>
                                                  <?php }?>                                                                                             
                                                 <td class="item2"><?php echo number_format($precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"]/60,2,",",".") ?>
                                                <td class="item2"><?php echo $precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"] ?>
                                                </td>
                                                 
                                                 </tr>
                                                  <tr>
                                                      <td class="init2"><?php echo $nombrestiendas[$value9[1]] ?> </td> 
                                                <td class="init2"><?php echo $fechafin?> </td> 
                                                <?php for ($index14 = 1; $index14 <=12; $index14++){?> 
                                                 <td class="item2">
                                                    <?php echo $var11=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][1]==""?0:$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][1];
                                                    $total2[$index14][1]=$total2[$index14][1]+$var11?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var21=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][2]==""?0:$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][2]; 
                                                     $total2[$index14][2]=$total2[$index14][2]+$var21?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var31=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][3]==""?0:$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][3];
                                                    $total2[$index14][3]=$total2[$index14][3]+$var31?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var41=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][4]==""?0:$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][4]; 
                                                    $total2[$index14][4]=$total2[$index14][4]+$var41?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var51=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][5]==""?0:$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][5]; 
                                                    $total2[$index14][5]=$total2[$index14][5]+$var51?>
                                                 </td>
                                                  <?php }?>                                                     
                                                 <td class="item2"><?php echo number_format($precios[$key22][$value9[0]][$key22][$value9[0]][$fechafin]["total"]/60,2,",",".") ?>
                                                <td class="item2"><?php echo $precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin]["total"] ?>
                                                </td>
                                                 </tr>
                                                 
                                                 <tr>
                                                     <td class="init2"><?php echo $nombrestiendas[$value9[1]] ?> </td> 
                                                <td class="init2">% de cambio</td> 
                                                <?php for ($index14 = 1; $index14 <=12; $index14++){?> 
                                                <?php $cambiox=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][1]-$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1];
                                                        $porcentaje=($cambiox*100)/$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1];?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                 <?php $cambiox=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][2]-$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][2];
                                                        $porcentaje=($cambiox*100)/$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][2];?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                 <?php $cambiox=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][3]-$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][3];
                                                        $porcentaje=($cambiox*100)/$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][3];?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                 <?php $cambiox=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][4]-$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][4];
                                                        $porcentaje=($cambiox*100)/$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][4];?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                 <?php $cambiox=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin][$index14][5]-$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][5];
                                                        $porcentaje=($cambiox*100)/$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][5];?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                  <?php }?>    
                                                 <?php $cambiox=($precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin]["total"]/60)-($precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"]/60);
                                                        $porcentaje=($cambiox*100)/($precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"]/60);?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                <?php $cambiox=$precios2[$key22][$value9[0]][$key22][$value9[0]][$fechafin]["total"]-$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"];
                                                        $porcentaje=($cambiox*100)/$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"];?>
                                                 <td class="item2" style="font-weight: bold;color:<?php if($porcentaje>0){ echo "#007700"; }else{ echo "#770000";}?>">                                                    
                                                        <?php if($porcentaje>0){ echo "+".number_format($porcentaje, 2,",",".")."%"; }else{  echo number_format($porcentaje, 2,",",".")."%";}?>                                                    
                                                 </td>
                                                 </tr>
                                                
                                                <?php }else{?>
                                                 <tr>
                                                <td class="init2" ><?php echo $nombrestiendas[$value9[1]] ?> </td> 
                                                <td class="item2"><?php echo $fechaini?> </td> 
                                                <?php for ($index14 = 1; $index14 <=12; $index14++){?> 
                                                 <td class="item2">
                                                    <?php echo $var1=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1];
                                                    $total[$index14][1]=$total[$index14][1]+$var1?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var2=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][2]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][2]; 
                                                     $total[$index14][2]=$total[$index14][2]+$var2?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var3=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][3]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][3];
                                                    $total[$index14][3]=$total[$index14][3]+$var3?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var4=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][4]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][4]; 
                                                    $total[$index14][4]=$total[$index14][4]+$var4?>
                                                 </td>
                                                 <td class="item2">
                                                    <?php echo $var5=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][5]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][5]; 
                                                    $total[$index14][5]=$total[$index14][5]+$var5?>
                                                 </td>
                                                  <?php }?>                                                                                             
                                                 <td class="item2"><?php echo number_format($precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"]/60,2,",",".") ?>
                                                <td class="item2"><?php echo $precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini]["total"] ?>
                                                </td>
                                                </tr>  
                                                <?php }?>              
                                                                                                
                                             
                                    <?php }
                                } ?>
                                </tbody> 
                                <tfoot>
                                     <?php if($fechafin){?>
                                    <tr>                                                        
                                        <td class="init2" colspan="64" style="background-color: #D1CFD0"><strong>TOTALES x SEMANA</strong></td>                                        
                                    </tr>
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL SEMANA</strong></td>
                                        <td class="init2"><?php echo $fechaini?> </td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){
                                           $totaltotales=$totaltotales+$total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5]?>                                                                                                                  
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][1] ?></td>                                                                             
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][2] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][3] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][4] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][5] ?></td>  
                                        <?php }?>
                                         <td class="item2"><?php echo number_format($totaltotales/60,2,",",".") ?></td>
                                         <td class="item2"><?php echo $totaltotales ?></td>
                                    </tr> 
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL SEMANA</strong></td>
                                        <td class="init2"><?php echo $fechafin?> </td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){
                                           $totaltotales2=$totaltotales2+$total2[$index1][1]+$total2[$index1][2]+$total2[$index1][3]+$total2[$index1][4]+$total2[$index1][5]?>                                                                                                                  
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total2[$index1][1] ?></td>                                                                             
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total2[$index1][2] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total2[$index1][3] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total2[$index1][4] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total2[$index1][5] ?></td>  
                                        <?php }?>
                                         <td class="item2"><?php echo number_format($totaltotales2/60,2,",",".") ?></td>
                                         <td class="item2"><?php echo $totaltotales2 ?></td>
                                    </tr> 
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL SEMANA</strong></td>
                                        <td class="init2">% de cambio</td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){
                                           // $totaltotales=$totaltotales+$total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5];                                                                                                                 
                                           //$totaltotales2=$totaltotales2+$total2[$index1][1]+$total2[$index1][2]+$total2[$index1][3]+$total2[$index1][4]+$total2[$index1][5]?>                                                                                                                  
                                        <?php $cambio1x1=$total2[$index1][1]-$total[$index1][1];?> 
                                        <td class="item2" style="font-weight: bold;color:<?php if($cambio1x1>0){ echo "#007700"; }else{ echo "#770000";}?>">                                            
                                         <?php if($cambio1x1<=0){echo number_format((($cambio1x1*100)/$total[$index1][1]), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x1*100)/$total[$index1][1]), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>     
                                         <?php $cambio1x2=$total2[$index1][2]-$total[$index1][2];?> 
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x2>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                         <?php if($cambio1x2<=0){echo number_format((($cambio1x2*100)/$total[$index1][2]), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x2*100)/$total[$index1][2]), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>  
                                         <?php $cambio1x3=$total2[$index1][3]-$total[$index1][3];?>
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x3>0){ echo "#007700"; }else{ echo "#770000";}?>"> 
                                         <?php if($cambio1x3<=0){echo number_format((($cambio1x3*100)/$total[$index1][3]), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x3*100)/$total[$index1][3]), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>  
                                         <?php $cambio1x4=$total2[$index1][4]-$total[$index1][4];?> 
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x4>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                        <?php if($cambio1x4<=0){echo number_format((($cambio1x4*100)/$total[$index1][4]), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x4*100)/$total[$index1][4]), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>  
                                         <?php $cambio1x5=$total2[$index1][5]-$total[$index1][5];?>
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x5>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                         <?php if($cambio1x5<=0){echo number_format((($cambio1x5*100)/$total[$index1][5]), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x5*100)/$total[$index1][5]), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>  
                                        <?php }?>
                                         
                                         <?php $cambio1x6=($totaltotales2/60)-($totaltotales/60) ?>
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x6>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                             <?php if($cambio1x6<=0){echo number_format((($cambio1x6*100)/($totaltotales/60)), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x6*100)/($totaltotales/60)), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>
                                         
                                         <?php $cambio1x6=$totaltotales2-$totaltotales ?>
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x6>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                             <?php if($cambio1x6<=0){echo number_format((($cambio1x6*100)/$totaltotales), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x6*100)/$totaltotales), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>
                                    </tr> 
                                    
                                    <tr>                                                        
                                        <td class="init2" colspan="64" style="background-color: #D1CFD0"><strong>TOTALES x MES</strong></td>                                        
                                    </tr>
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL MES</strong></td>
                                        <td class="init2"><?php echo $fechaini?></td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){?>                                                                                                                  
                                        <td class="item2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5]) ?>
                                        </td>                                                                                                                     
                                        <?php }?>   
                                        <td class="item2"><?php echo number_format($totaltotales/12,2,",",".") ?></td>
                                        <td class="item2"><?php echo $totaltotales ?></td>
                                    </tr> 
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL MES</strong></td>
                                        <td class="init2"><?php echo $fechafin?></td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){?>                                                                                                                  
                                        <td class="item2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($total2[$index1][1]+$total2[$index1][2]+$total2[$index1][3]+$total2[$index1][4]+$total2[$index1][5]) ?>
                                        </td>                                                                                                                     
                                        <?php }?>   
                                        <td class="item2"><?php echo number_format($totaltotales2/12,2,",",".") ?></td>
                                        <td class="item2"><?php echo $totaltotales2?></td>
                                    </tr> 
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL MES</strong></td>
                                        <td class="init2">% de cambio</td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){?>                                                                                                                  
                                        <?php $cambioxx21=(($total2[$index1][1]+$total2[$index1][2]+$total2[$index1][3]+$total2[$index1][4]+$total2[$index1][5])-($total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5])) ?>
                                        <td class="item2" colspan="5" style="font-weight: bold;color:<?php if($cambioxx21>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                             <?php if($cambioxx21<=0){echo number_format((($cambioxx21*100)/($total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5])), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambioxx21*100)/($total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5])), 2,",",".")."%";
                                         }
                                         ?>   
                                            </td>
                                        <?php }?>   
                                            
                                        <?php $cambio1x8=($totaltotales2/12)-($totaltotales/12) ?>
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x8>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                             <?php if($cambio1x8<=0){echo number_format((($cambio1x8*100)/($totaltotales/12)), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x8*100)/($totaltotales/12)), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>
                                            
                                        <?php $cambio1x8=$totaltotales2-$totaltotales ?>
                                         <td class="item2" style="font-weight: bold;color:<?php if($cambio1x8>0){ echo "#007700"; }else{ echo "#770000";}?>">
                                             <?php if($cambio1x8<=0){echo number_format((($cambio1x8*100)/$totaltotales), 2,",",".")."%";}else{
                                             echo "+".number_format((($cambio1x8*100)/$totaltotales), 2,",",".")."%";
                                         }
                                         ?>
                                         </td>
                                    </tr> 
                                <?php }else{?>
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL SEMANA</strong></td>
                                        <td class="item2"><?php echo $fechaini?> </td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){
                                           $totaltotales=$totaltotales+$total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5]?>                                                                                                                  
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][1] ?></td>                                                                             
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][2] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][3] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][4] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][5] ?></td>  
                                        <?php }?>
                                         <td class="item2"><?php echo number_format($totaltotales/60,2,",",".") ?></td>
                                         <td class="item2" rowspan="2"><?php echo $totaltotales ?></td>
                                    </tr>                                     
                                    <tr>                                                        
                                        <td class="init2"><strong>TOTAL MES</strong></td>
                                        <td class="item2"><?php echo $fechaini?></td>
                                        <?php                                         
                                        for ($index1 = 1; $index1 <=12; $index1++){?>                                                                                                                  
                                        <td class="item2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5]) ?>
                                        </td>                                                                                                                     
                                        <?php }?>       
                                        <td class="item2"><?php echo number_format($totaltotales/12,2,",",".") ?></td>
                                    </tr> 
                                    
                                    <?php }?>
                                </tfoot>
                            </table>
                        </div>                                  
                    </fieldset>   
<?php } }?>
            </div>                                
        </div>                 
    </div> 
</div>        
<script>
    var oTables= new Array(<?php echo $tablas ?>);
    <?php if($fechafin){?>        
        var comparai=true; 
   <?php }else{?>   
       var comparai=false; 
   <?php }?>   
    
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
        $('#productoini').val("<?php echo $productoselectedini; ?>"); 
        $('#productofin').val("<?php echo $productoselectedfin; ?>"); 
        $('#clienteini').val("<?php echo $clienteselectedini; ?>"); 
        $('#clientefin').val("<?php echo $clienteselectedfin; ?>");
        $('#tiendaini').val("<?php echo $tiendaselectedini; ?>"); 
        $('#tiendafin').val("<?php echo $tiendaselectedfin; ?>");
        $('#fechaini').val("<?php echo $fechaini; ?>"); 
        <?php if($fechafin){?>        
        $('#fechafin').val("<?php echo $fechafin;  ?>");         
        <?php }?>              
<?php 
if(!$reportini){
for ($index = 1; $index <= $tablas; $index++) { ?>
                   
                     var arraycolum=new Array(64)               
           <?php for($index2 = 0; $index2 <= 63; $index2++) {?>
           arraycolum[<?php echo $index2?>]=null;
           <?php } ?>
                   
                   $('.mytable<?php echo $index ?>').css('line-height' ,'15px');
                   $('.mytable<?php echo $index ?>').css('width' ,'100%');
                   
                   <?php if($fechafin){?> 
                   oTables[<?php echo $index-1?>]=$('.mytable<?php echo $index ?>').dataTable( {                         
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
                   }).rowGrouping();   
                   <?php }else{?> 
                       oTables[<?php echo $index-1?>]=$('.mytable<?php echo $index ?>').dataTable( {                         
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
                <?php }?> 
<?php } }?>  
    
     $("#clienteini").change(function(){
                    $.ajax({
                        type: "POST",
                        url: "index.php?controlador=Reportyear&accion=gettiendasAjax",
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
                            $("#tiendaini").nextAll(".jojojo").remove();
                            $("#tiendafin").nextAll(".jojojo").remove();
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
                        url: "index.php?controlador=Reportyear&accion=gettiendasAjax",
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
                
                $('#compares').change(function() {
                    if($(this).is(":checked")) {
                        $("#fechafin").removeAttr("disabled");
                        $("#fechafin").removeClass("selectordisabled");
                        $("#fechafin").addClass("selectornormal");
                        $.ajax({
                            type: "POST",
                            url: "index.php?controlador=Reportyear&accion=validateperiod",
                            dataType: "json",
                            data: {fechainiajax:$("#fechaini").val()},
                            beforeSend: function(xhr) {
                                $("#fechafin").attr("disabled","disabled");
                                $("#fechaini").attr("disabled","disabled");                                   
                                $("#fechafin").hide();                                
                                $("#fechafin").after("<img class='jojojojo' src='images/ajax-loader.gif'/>");   
                            },
                            success: function(data) {
                                $("#fechafin").removeAttr("disabled");
                                $("#fechaini").removeAttr("disabled");                             
                                $("#fechafin").show();                            
                                $("#fechafin").nextAll(".jojojojo").remove();                            
                                $("#fechafin").html("");
                                for(var i = 0; i < data.length; i++){
                                    var option = $("<option>").appendTo("#fechafin");
                                    option.html(data[i]);
                                }
                                $("#fechafin").val(data[0]);
                                comparai= true;
                            }               
                        });
                    }else {
                        $("#fechafin").html("");                        
                        var option = $("<option>").appendTo("#fechafin");
                        option.html('N/A');                        
                        $("#fechafin").attr("disabled","disabled");
                        $("#fechafin").removeClass("selectornormal");
                        $("#fechafin").addClass("selectordisabled");
                        comparai= false;
                    }                           
                });

                $("#fechaini").change(function(){
                    if($('#compares').is(":checked")) {
                        $.ajax({
                            type: "POST",
                            url: "index.php?controlador=Reportyear&accion=validateperiod",
                            dataType: "json",
                            data: {fechainiajax:$("#fechaini").val()},
                            beforeSend: function(xhr) {
                                $("#fechafin").attr("disabled","disabled");
                                $("#fechaini").attr("disabled","disabled");                                   
                                $("#fechafin").hide();                                
                                $("#fechafin").after("<img class='jojojojo' src='images/ajax-loader.gif'/>");   
                            },
                            success: function(data) {
                                $("#fechafin").removeAttr("disabled");
                                $("#fechaini").removeAttr("disabled");                             
                                $("#fechafin").show();                            
                                $("#fechafin").nextAll(".jojojojo").remove();                            
                                $("#fechafin").html("");
                                for(var i = 0; i < data.length; i++){
                                    var option = $("<option>").appendTo("#fechafin");
                                    option.html(data[i]);
                                }
                                $("#fechafin").val(data[0]);
                            }               
                        });
                    }
                });
                
             });  
             function redireccion(){
                if(comparai){
                    window.location="index.php?controlador=Reportyear&accion=productyearToneladas&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&fechaini="+$('#fechaini').val()+"&fechafin="+$('#fechafin').val();
                }else{
                    window.location="index.php?controlador=Reportyear&accion=productyearToneladas&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&fechaini="+$('#fechaini').val();
                }
             }
             
             $(window).load(function(){
                $('html').css("width", "0px") 
             });
</script>      