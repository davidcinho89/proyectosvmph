<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
/*
 function numberOfWeek ($dia, $mes, $ano) { 
    $fecha = mktime ($hora, $min, $seg, $mes, 1, $ano);

    $numberOfWeek = ceil (($dia + (date ("w", $fecha)-1)) / 7);

    return $numberOfWeek;
}

echo numberOfWeek("31","3", "2014")."<br>";
*/
?>   
<div class="container" style="margin-bottom: 20px; margin-top: 10px">
        <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Productos sin rotación</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>
                   
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
                            <td><?php $doc->texto('DATEINI') ?><br>(A&ntilde;o-Mes-Semana): </td>
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
                            <td><?php $doc->texto('DATEFIN') ?><br>(A&ntilde;o-Mes-Semana): </td>
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
                        </tr> 
                        </tbody>
                    </table> 
                     <a id="aplicar" href='#' onclick="redireccion()">        
                        <button style="width: 220px" class="buscarButton" id="CancelAll">Aplicar filtros</button>
                    </a>
                </fieldset>    
                <?php
                if(!$reportini){?>
                            <fieldset class="colorleyend" style="width: 100%; padding: 5px">   
                                <legend class="colorleyendinto">Productos sin rotación </legend>                                                                                               
                                      <div style="margin-top: 0px;margin-bottom: 20px">   
                                        <table class="mytable" border="0" cellspacing="0" cellpadding="0">      
                                            <thead>  
                                                <tr class="headall">     
                                                    <th class="headinit">Codigo localizaci&oacute;n</th>
                                                    <th class="head" style="cursor: pointer;">Descripcion localizaci&oacute;n</th>
                                                    <th class="head" style="cursor: pointer;">Producto</th>
                                                    <th class="head" style="cursor: pointer;">Cantidad</th>                                                    
                                                </tr>                                                                                                      
                                            </thead>     
                                            <tbody style="line-height: 25px">      
                                                <?php                                                  
                                                foreach ($precios as $value9) { ?>     
                                                    <tr>                                                        
                                                        <td class="init2"><?php echo $value9[0]  ?> </td>                                                               
                                                         <td class="item2" style="cursor: pointer;">
                                                             <?php echo $nombrestiendas[$value9[0]]  ?>                                                     
                                                         </td>    
                                                          <td class="item2" style="cursor: pointer;">
                                                              <?php echo $nombresproductos[$value9[1]]  ?>                                                    
                                                         </td> 
                                                          <td class="item2" style="cursor: pointer;">
                                                              <?php echo 0 ?>                                                      
                                                         </td>                                                         
                                                    </tr>  
                                                            
                                           <?php } ?>
                                            </tbody>                                                   
                                        </table>
                                    </div>                                  
                            </fieldset> 
                <?php
                }?>
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
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#productofin').change(function(){
           window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#clienteini').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#clientefin').change(function(){
          window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });        
        $('#tiendaini').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#tiendafin').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#anioini').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#aniofin').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#mesini').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#mesfin').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#semanaini').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        $('#semanafin').change(function(){
            window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
        });
        */
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
                   
       <?php
                if(!$reportini){?>
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
            "aaSorting": [[ 2, "asc" ]],            
            "aoColumns": [null,null,null,null]
        });    
        
        <?php
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
                        url: "index.php?controlador=ReportNoRotate&accion=gettiendasAjax",
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
                        url: "index.php?controlador=ReportNoRotate&accion=gettiendasAjax",
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
                 window.location="index.php?controlador=ReportNoRotate&productoini="+$('#productoini').val()+"&productofin="+$('#productofin').val()+"&clienteini="+$('#clienteini').val()+"&clientefin="+$('#clientefin').val()+"&tiendafin="+$('#tiendafin').val()+"&tiendaini="+$('#tiendaini').val()+"&anioini="+$('#anioini').val()+"&aniofin="+$('#aniofin').val()+"&mesini="+$('#mesini').val()+"&mesfin="+$('#mesfin').val()+"&semanaini="+$('#semanaini').val()+"&semanafin="+$('#semanafin').val();
             }
</script>      