<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div id="main"> 
    <div class="maxcontent" id="content"> 
        <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Cargar saldos de inventario</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>
        <div class="container" style="margin-bottom: 20px; margin-top: 10px">    
            <fieldset class="colorleyend" style="width: 98%">
                <legend class="colorleyendinto">Opciones</legend>
                <div style="float: left">
                    <div id="cajaselect" style="margin-bottom: 15px">                
                    <div>
                        <a style="cursor: pointer; color: #005500; font-weight: bold" 
                           id="subirtttintert"
                           href="index.php?controlador=Saldos&accion=massiveupload" 
                           title="Carga de archivo de saldos">
                            + Realizar carga masiva
                        </a>
                    </div>
                        <div style="margin-top: 10px">
                            <a style="cursor: pointer; color: #005500; font-weight: bold" 
                           id="vercargas"
                           href="index.php?controlador=Saldos&accion=cargasDiferentes" 
                           title="Deshacer carga(s) de saldos">
                            + Deshacer carga(s) de saldos
                        </a>
                        </div>
                        </div>
                </div>
                <div style="clear: both"></div>
            </fieldset>  
            <fieldset class="colorleyend" style="width: 98%">
                <legend class="colorleyendinto">Filtros</legend>
                <div style="float: left">
                    A continuaci&oacute;n seleccione un rango de fechas de carga de saldos, por defecto se traeran las cargas realizadas en el mes actual.
                    <div id="cajaselect" style="margin-bottom: 15px">    
                        <table>
                            <tr>
                                <td>
                                Cargar saldos desde(A&ntilde;o-Mes): 
                                </td>
                                <td>
                                    <select name="anioini" id="anioini">
                                        <?php for ($index = $aniomin; $index <= $aniomax; $index++) {?>
                                            <option><?php echo $index;?></option>
                                        <?php }?>                                        
                                    </select>   
                                <select name="mesini" id="mesini">
                                    <?php for ($index = 1; $index <= $mesmax1; $index++) {?>
                                            <option><?php echo $index;?></option>
                                        <?php }?>  
                                </select>
                                </td>
                                <td style="padding-left: 20px">
                                Hasta(A&ntilde;o-Mes):
                                 </td>
                                <td>
                                <select name="aniofin" id="aniofin">
                                    <?php for ($index = $aniomin; $index <= $aniomax; $index++) {?>
                                            <option><?php echo $index;?></option>
                                        <?php }?> 
                                </select>
                                <select name="mesfin" id="mesfin">
                                   <?php for ($index = 1; $index <= $mesmax2; $index++) {?>
                                            <option><?php echo $index;?></option>
                                        <?php }?> 
                                </select>
                                </td>                                
                                <td style="padding-left: 20px">
                                    <a id="aplicar" href='#' onclick="redireccion()">        
                                        <button style="width: 220px" class="buscarButton" id="CancelAll">Aplicar filtros</button>
                                    </a>
                                </td>
                            </tr>                        
                        </table>                        
                    </div>
                </div>
                <div style="clear: both"></div>
            </fieldset>  
            <?php if ($mensagge&&$mensagge=="Se ha realizado la carga correctamente") { 
                if($registros>0){
                    $mensagge = "Se han insertado ".$registros." registros nuevos";
                    $iconooo="images/iconos_alerta/ok.png";
                }else{
                    $mensagge = "No se han insertado registros, por favor revise el archivo de resultado";
                    $iconooo="images/iconos_alerta/warning.png";
                }?>
                <div style="width: 265px;">
                    <a href="index.php?controlador=Saldos&accion=WriteExcelNotify">            
                        <p><img src="images/excel.png" width="22px" height="22px" style="margin-right: 5px" align="left"/>Descargar resultado de la carga masiva</p>
                    </a>
                </div>
            <?php } ?>
            <fieldset class="colorleyend" style="width: 98%">
                <legend class="colorleyendinto">Historial de Saldos cargados</legend>
                <div style="margin-top: 15px;margin-bottom: 20px">
                    <table class="table" border="0" cellspacing="0" cellpadding="0" id="example">
                        <thead>
                            <tr class="headall">
                                <th class="headinit">Codigo Producto</th>
                                <th class="head">Codigo tienda</th>  
                                <th class="head">Fecha de saldo<br>(A&ntilde;o-mes-semana)</th>
                                <th class="head">Precio venta</th>  
                                <th class="head">Cantidad</th>                                                                   
                                <th class="head">Fecha de carga</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $estilo = 1;                           
                                foreach ($productosstock as $value) {
                                    
                                        ?>
                                        <tr class="class<?php echo $estilo; ?>">
                                            <td class="init2">
                                                <?php echo $value["producto"] ?>
                                            </td>
                                            <td class="item2">
                                                <?php echo $value["tienda"] ?>
                                            </td> 
                                            <td class="item2">
                                                <?php echo $value["fechareal"] ?>
                                            </td> 
                                            <td class="item2">
                                                <?php echo '&#36;' . number_format( $value["precio"], 0, ',', '.'); ?>
                                            </td> 
                                            <td class="item2">
                                                <?php echo $value["cantidad"] ?>
                                            </td> 
                                            
                                            <td class="item2">
                                                <?php echo $value["fecha"] ?>
                                            </td>                                                                                        
                                        </tr>                                               
            <?php
        
        if ($estilo == 1) {
            $estilo = 2;
        } else {
            $estilo = 1;
        }
    }

?>
                        </tbody>
                        <tfoot>
                <tr>
                    <th>Producto</th>                                            
                    <th>Tienda</th>         
                    <th>Fecha</th>                                                              
                    <th></th> 
                    <th></th> 
                    <th></th>                    
                </tr>
            </tfoot>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<div style="display: none">
    <div id="contentcall">
        <div style="text-align: center; margin-bottom: 12px;margin-top: 40px;padding-left: 20px;padding-right: 20px; font-size: 12px">
            Esta seguro de cancelar el ajuste de inventario actual?
        </div>
        <div style="text-align: center; margin-bottom: 12px;">
            <button class="buscarButton" id="accept">Aceptar</button>
            <button style="margin-left: 10px" class="buscarButton" id="cancelll">Cancelar</button>
        </div>
    </div>
</div><div style="display: none">
    <a href="#contentcall" class="callback">Open Example</a>
</div>
<script>
<?php if ($mensagge) { ?>
            message("<?php echo $mensagge; ?>", "<?php echo $iconooo; ?>");
<?php } ?>
    jQuery.fn.dataTableExt.oSort['format-date-asc']  = function(a,b) {
        var x = (a == "-") ? 0 : a.replace( "-", "" ).replace( "-", "" );
        var y = (b == "-") ? 0 : b.replace( "-", "" ).replace( "-", "" );
        return (x-y);
    };

    jQuery.fn.dataTableExt.oSort['format-date-desc'] = function(a,b) {
        var x = (a == "-") ? 0 : a.replace( "-", "" ).replace( "-", "" );
        var y = (b == "-") ? 0 : b.replace( "-", "" ).replace( "-", "" );
        return (y-x);
    };
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
    $(document).ready(function() { 
        $("#anioini").val(<?php echo $anioiniselected?>);
        $("#mesini").val(<?php echo $mesiniselected?>);
        $("#mesfin").val(<?php echo $mesfinselected?>);
        $("#aniofin").val(<?php echo $aniofinselected?>);
        $("#subirtttintert").fancybox({
            'width': 700,
            'height': 270,
            'autoScale': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 500,
            'type': 'iframe',
            'hideOnOverlayClick': false
        });
        $(".callback").fancybox({
            'autoDimensions': false,
            'width': 400,
            'height': 130,
            'autoScale': false,
            'overlayOpacity': 0.1,
            'transitionIn': 'elastic',
            'transitionOut': 'fade',
            'speedIn': 500,
            'hideOnOverlayClick': false,
            'overlayColor': '#000',
            'showCloseButton': false,
            'padding': 0,
            'margin': 0
        });
        
         $("#vercargas").fancybox({
            'width': 700,
            'height': 400,
            'autoScale': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 500,
            'type': 'iframe',
            'hideOnOverlayClick': false
        });

        $('img').css("border", "0");        
        $('#example').dataTable({
            "oLanguage": {
                "sEmptyTable": "No existen datos disponibles",
                "sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando desde 0 hasta 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sLoadingRecords": "Cargando...",
                "sProcessing": "Procesando...",
                "sSearch": "Buscar:",
                "sZeroRecords": "No se encontraron resultados",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": activar para Ordenar Ascendentemente",
                    "sSortDescending": ": activar para Ordendar Descendentemente"
                }
            },
            "sPaginationType": "full_numbers",
            "aaSorting": [],
            "aoColumns": [
                {"bSortable": false},
                {"bSortable": false},
                {"sType": "format-date", "bSearchable": false},
                {"sType": "numeric-point", "bSearchable": false},
                {"bSearchable": false},
                {"bSortable": false,"bSearchable": false}     
            ]
        }).columnFilter({
            aoColumns: [{type: "select"},  
                {type: "select"}, 
                {type: "select"},                               
                null,
                null,
                null]
        });
    });
    
    function redireccion(){
         window.location="index.php?controlador=Saldos&anioini="+$("#anioini").val()+"&mesini="+$("#mesini").val()+"&aniofin="+$("#aniofin").val()+"&mesfin="+$("#mesfin").val();
    }
</script>
