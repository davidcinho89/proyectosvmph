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
                            <td style="width: 50px;">A&ntilde;o: </td>
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
                         <!--   <td>Comparar con </td> 
                            <td>
                                <select disabled="disabled" style="cursor: default">
                                    <option>
                                        2013
                                    </option>
                                </select>
                            </td> -->
                            <td></td>
                            <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                               <td></td>
                        </tr> 
                    </tbody>
                </table>
            </form>
            <a id="aplicar" href='#' onclick="redireccion()">        
                <button style="width: 220px" class="buscarButton" id="CancelAll">Aplicar filtros</button>
            </a>
        </fieldset>  
         <?php
                if(!$reportini){?>
        <div>             
            <div style="margin-top: 0px;margin-bottom: 20px; width: 100%">                           
                <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                    <legend class="colorleyendinto">Reporte de ventas del a&ntilde;o 2014</legend>                                                                                               
                    <div style="margin-top: 0px;margin-bottom: 20px">   
                        <table class="mytable<?php echo $tablas ?>" border="0" cellspacing="0" cellpadding="0">      
                            <thead>  
                                <tr class="headall">                                                                                                                                                          
                                    <th class="headinit" style="cursor: pointer;" colspan="5">Ene</th>
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
                                    <?php for ($index1 = 1; $index1 <= 12; $index1++) { ?>                                                                                                                  
                                        <th class="head" style="cursor: pointer;" >1</th>                                                                             
                                        <th class="head" style="cursor: pointer;" >2</th>    
                                        <th class="head" style="cursor: pointer;" >3</th>    
                                        <th class="head" style="cursor: pointer;" >4</th>    
                                        <th class="head" style="cursor: pointer;" >5</th>  
                                    <?php } ?>
                                </tr> 
                            </thead>       
                            <tbody style="line-height: 25px">      
                                <tr>                                                                                                
                                    <?php for ($index1 = 1; $index1 <= 12; $index1++) { ?>                                                                                                 
                                        <td class="init2" style="cursor: pointer;" ><?php echo $precios["cantidades"][$fechaini][$index1][1] ?></td>                                                                             
                                        <td class="item2" style="cursor: pointer;" ><?php echo $precios["cantidades"][$fechaini][$index1][2] ?></td>    
                                        <td class="item2" style="cursor: pointer;" ><?php echo $precios["cantidades"][$fechaini][$index1][3] ?></td>    
                                        <td class="item2" style="cursor: pointer;" ><?php echo $precios["cantidades"][$fechaini][$index1][4] ?></td>    
                                        <td class="item2" style="cursor: pointer; margin-right: 0px" ><?php echo $precios[$fechaini][$index1][5] ?></td>  
                                    <?php } ?>
                                        <td class="item2" rowspan=""><?php echo number_format($precios[$fechaini]["total"]/60,2,",",".")  ?></td>
                                        <td class="item2" rowspan=""><?php echo $precios[$fechaini]["total"]  ?></td>
                                </tr>                                 
                            </tbody>   
                            <tfoot>
                                <tr>                                                                                                
                                    <?php for($index1 = 1; $index1 <= 12; $index1++) { 
                                        if($index1==1){?>                                   
                                        <td class="init2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($precios["cantidades"][$fechaini][$index1][1]+$precios["cantidades"][$fechaini][$index1][2]+$precios["cantidades"][$fechaini][$index1][3]+$precios["cantidades"][$fechaini][$index1][4]+$precios["cantidades"][$fechaini][$index1][5]) ?>
                                        </td>                                                                                                                                                                                                                                                                           
                                    <?php }else{ ?>
                                        <td class="item2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($precios["cantidades"][$fechaini][$index1][1]+$precios["cantidades"][$fechaini][$index1][2]+$precios["cantidades"][$fechaini][$index1][3]+$precios["cantidades"][$fechaini][$index1][4]+$precios["cantidades"][$fechaini][$index1][5]) ?>
                                        </td> 
                                    <?php }}?>  
                                        <td class="item2" rowspan=""><?php echo number_format($precios[$fechaini]["total"]/12,2,",",".")  ?></td>
                                        <td class="item2" rowspan=""><?php echo $precios[$fechaini]["total"]  ?></td>
                                </tr> 
                            </tfoot>
                        </table>
                    </div>                                  
                </fieldset>                
            </div>
            
            
            <div style="margin-top: 0px;margin-bottom: 20px; width: 100%">                           
                <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                    <legend class="colorleyendinto">Reporte de ventas en TONELADAS del a&ntilde;o 2014</legend>                                                                                               
                    <div style="margin-top: 0px;margin-bottom: 20px">   
                        <table class="mytable<?php echo $tablas ?>" border="0" cellspacing="0" cellpadding="0">      
                            <thead>  
                                <tr class="headall">                                                                                                                                                          
                                    <th class="headinit" style="cursor: pointer;" colspan="5">Ene</th>
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
                                    <?php for ($index1 = 1; $index1 <= 12; $index1++) { ?>                                                                                                                  
                                        <th class="head" style="cursor: pointer;" >1</th>                                                                             
                                        <th class="head" style="cursor: pointer;" >2</th>    
                                        <th class="head" style="cursor: pointer;" >3</th>    
                                        <th class="head" style="cursor: pointer;" >4</th>    
                                        <th class="head" style="cursor: pointer;" >5</th>  
                                    <?php } ?>
                                </tr> 
                            </thead>       
                            <tbody style="line-height: 25px">      
                                <tr>                                                                                                
                                    <?php for ($index1 = 1; $index1 <= 12; $index1++) { ?>                                                                                                 
                                        <td class="init2" style="cursor: pointer;" ><?php echo $precios["toneladas"][$fechaini][$index1][1] ?></td>                                                                             
                                        <td class="item2" style="cursor: pointer;" ><?php echo $precios["toneladas"][$fechaini][$index1][2] ?></td>    
                                        <td class="item2" style="cursor: pointer;" ><?php echo $precios["toneladas"][$fechaini][$index1][3] ?></td>    
                                        <td class="item2" style="cursor: pointer;" ><?php echo $precios["toneladas"][$fechaini][$index1][4] ?></td>    
                                        <td class="item2" style="cursor: pointer; margin-right: 0px" ><?php echo $precios["toneladas"][$fechaini][$index1][5] ?></td>  
                                    <?php } ?>
                                        <td class="item2" rowspan=""><?php echo number_format($precios[$fechaini]["totaltoneladas"]/60,2,",",".")  ?></td>
                                        <td class="item2" rowspan=""><?php echo $precios[$fechaini]["totaltoneladas"]  ?></td>
                                </tr>                                 
                            </tbody>   
                            <tfoot>
                                <tr>                                                                                                
                                    <?php for($index1 = 1; $index1 <= 12; $index1++) { 
                                        if($index1==1){?>                                   
                                        <td class="init2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($precios["toneladas"][$fechaini][$index1][1]+$precios["toneladas"][$fechaini][$index1][2]+$precios["toneladas"][$fechaini][$index1][3]+$precios["toneladas"][$fechaini][$index1][4]+$precios["toneladas"][$fechaini][$index1][5]) ?>
                                        </td>                                                                                                                                                                                                                                                                           
                                    <?php }else{ ?>
                                        <td class="item2" style="cursor: pointer;" colspan="5" style="text-align: center !important">
                                            <?php echo ($precios["toneladas"][$fechaini][$index1][1]+$precios["toneladas"][$fechaini][$index1][2]+$precios["toneladas"][$fechaini][$index1][3]+$precios["toneladas"][$fechaini][$index1][4]+$precios["toneladas"][$fechaini][$index1][5]) ?>
                                        </td> 
                                    <?php }}?>  
                                        <td class="item2" rowspan=""><?php echo number_format($precios[$fechaini]["totaltoneladas"]/12,2,",",".")  ?></td>
                                        <td class="item2" rowspan=""><?php echo $precios[$fechaini]["totaltoneladas"]  ?></td>
                                </tr> 
                            </tfoot>
                        </table>
                    </div>                                  
                </fieldset>                
            </div>
             
            
          
    <div id="chart_div" style="width: 2400px; height: 500px; margin-left: -195px"></div>
<?php
                }?>
        </div>                 
    </div> 
</div>   
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
        //$('#fechafin').val("<?php// echo $fechafin; ?>");                  
       
       var arraycolum=new Array(62);
        <?php 
        if(!$reportini){
        for($index2 = 0; $index2 <= 61; $index2++) {?>
           arraycolum[<?php echo $index2?>]=null;
           <?php } ?>
        $('.mytable').css('line-height' ,'15px');
        $('.mytable').css('width' ,'100%');
        $('.mytable').dataTable( { 
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
        
          <?php } ?>
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
    });  
    function redireccion(){
        window.location="index.php?controlador=Reportyear&accion=general&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&fechaini="+$('#fechaini').val();
    }  
    
    $(window).load(function(){
       $('html').css("width", "0px") 
    });
    <?php 
        if(!$reportini){?>
    google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $grafico?>);

        var options = {
          title: 'Ventas <?php echo $fechaini; ?>'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      <?php 
        }?>

</script>      