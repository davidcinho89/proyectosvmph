<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>           
<div class="container" style="margin-bottom: 20px; margin-top: 10px">   
<div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Reporte de saldos</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>
   <div style="width: 100%;">     
        <fieldset class="colorleyend" style="width: 97%; padding: 10px">
            <legend class="colorleyendinto">Opciones de búsqueda</legend>     
            <form method="POST" action="index.php?controlador=Reports&accion=reporteVentas">
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
                                    <option>
                                        2014
                                    </option>
                                    <option>
                                        2013
                                    </option>
                                </select>
                            </td>  
                            <!--
                            <td><input type="checkbox" name="compare" id="compares" style="float: left"/><div style="float: left">Comparar con:</div> <div style="clear: left"></div></td> 
                            <td>
                                <select id="fechaotra" disabled="disabled" style="cursor: default">
                                    <option>
                                        2013
                                    </option>
                                </select>
                            </td> 
                            -->       
                            <td></td><td></td>
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
                    $totaltotales=0;
                    $tablas++;
                    ?> 
                    <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                        <legend class="colorleyendinto">Reporte de Saldos del producto <?php echo $nombresproductos[$value8] ?></legend>                                                                                               
                        <div style="margin-top: 0px;margin-bottom: 20px">   
                            <table class="mytable<?php echo $tablas ?>" border="0" cellspacing="0" cellpadding="0">      
                                <thead>  
                                    <tr class="headall">     
                                        <th class="headinit" style="cursor: pointer;" rowspan="2">Tienda</th>                                                                                                               
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
                                            <tr>           
                                                <td class="init2"><?php echo $nombrestiendas[$value9[1]] ?> </td>  
                                                <?php $totalfila=0;
                                                for ($index14 = 1; $index14 <=12; $index14++){?> 
                                                 <td class="item2">
                                                    <?php echo $var1=$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1]==""?0:$precios[$key22][$value9[0]][$key22][$value9[0]][$fechaini][$index14][1];
                                                    $total[$index14][1]=$total[$index14][1]+$var1;?>
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
                                                  <?php 
                                                  $totalfila=$totalfila+$var1+$var2+$var3+$var4+$var5;
                                                }?>   
                                                 <td class="item2">
                                                    <?php echo number_format($totalfila/60,2,",",".")?>
                                                 </td>
                                            </tr>   
                                    <?php }
                                } ?>
                                 
                                </tbody> 
                                <tfoot>
                                <tr>                                                        
                                        <td class="init2"><strong>TOTAL SEMANA</strong></td>                                        
                                        <?php    
                                        $totalfilax=0;
                                        for ($index1 = 1; $index1 <=12; $index1++){?>                                           
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][1] ?></td>                                                                             
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][2] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][3] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][4] ?></td>    
                                         <td class="item2" style="cursor: pointer;" ><?php echo $total[$index1][5] ?></td>  
                                        <?php 
                                        $totalfilax=$totalfilax+$total[$index1][1]+$total[$index1][2]+$total[$index1][3]+$total[$index1][4]+$total[$index1][5];
                                        }?>    
                                         <td class="item2" style="cursor: pointer;" >
                                         <?php echo number_format($totalfilax/60,2,",",".")?></td>
                                    </tr>                                     
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
        //$('#fechafin').val("<?php // echo $fechafin;  ?>");                  
       
       
<?php 
if(!$reportini){
for ($index = 1; $index <= $tablas; $index++) { ?>
                   
                     var arraycolum=new Array(62)               
           <?php for($index2 = 0; $index2 <= 61; $index2++) {?>
           arraycolum[<?php echo $index2?>]=null;
           <?php } ?>
                   
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
                   } );  
            
<?php } }?>  
    
     $("#clienteini").change(function(){
                    $.ajax({
                        type: "POST",
                        url: "index.php?controlador=ReportSaldos&accion=gettiendasAjax",
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
                        url: "index.php?controlador=ReportSaldos&accion=gettiendasAjax",
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
                 window.location="index.php?controlador=ReportSaldos&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&fechaini="+$('#fechaini').val();
             }                          
</script>      