<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?> 
<div id="main"> 
    <div class="maxcontent" id="content">
        <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Devoluci&oacute;nes de ventas</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>
        <div class="container" style="margin-bottom: 20px; margin-top: 10px"> 
            <div style="float: left;width: 50%;">
        <fieldset class="colorleyend" style="width: 100%;">
            <legend class="colorleyendinto">Informaci&oacute;n</legend>
            <div id="cajaselect3" style="margin-bottom: 15px">
                        Bodega: <strong><?php echo $nombrebodega?></strong>                        
           </div>
            <div id="cajaselect3" style="margin-bottom: 15px">
                <p style="line-height: normal; font-size: small">A continuaci&oacute;n consulte y seleccione la factura de venta a la cual desea realizar la devoluci&oacute;n.</p>
           </div>
        </fieldset>
                </div>
    <div style="clear:both"></div>
    <fieldset class="colorleyend" style="width: 100%;">
                <legend class="colorleyendinto">Facturas de venta</legend>
                <div style="float: left;height: 16px;margin-bottom: 10px">
                    <img src="images/return.png" width="18px" height="18px" /> : Detalles y devoluci&oacute;n de venta de una factura
                </div>
                <div style="float: left; margin-left: 30px; height: 16px; padding-top: 7px;">
                            <strong style="color: #252f38">N/A</strong> : No aplica
                        </div>   
                <div style="clear: both; margin-bottom: 15px"></div>
    <div style="margin-top: 15px;margin-bottom: 20px">  
        <table class="table" border="0" cellspacing="0" cellpadding="3" id="example">  
            <thead>     
                <tr class="headall">      
                    <th class="headinit" style="cursor: pointer">No Factura</th>                        
                    <th class="head" style="cursor: pointer">Fecha Factura</th>
                    <th class="head">Valor Total</th> 
                    <th class="head">Codigo vinculado</th>
                    <th class="head">Nombre Vinculado</th>
                    <th class="head">Realizar devoluci&oacute;n</th>                      
                </tr> 
            </thead>
            <tbody>
                <?php 
                $estilo = 1;
                if(sizeof($facturas)!=0){
                foreach ($facturas as $value) {
                    ?>
                    <tr class="class<?php echo $estilo; ?>"> 
                        <td class="init2" align="center">
                            <?php echo $value["id"] ?>
                        </td>  
                        <td class="item2" align="center">
                          <?php echo $value["fecha"] ?>
                        </td> 
                        <td class="item2" align="center">
                          <?php echo '&#36;'.number_format($value["valor"],0, '.','.')  ?>
                        </td>
                        <td class="item2" align="center">
                            <?php echo $value["usuario"] ?>  
                        </td> 
                        <td class="item2" align="center">
                            <?php echo $value["nomusuario"] ?> 
                        </td>      
                        <td align="center" class="item2" style="width: 20px;">
                            <?php if($value["referencia"]!="LICINS"){ ?> 
                            <a class="various4" title="Devoluci&oacute;n de la venta" href="index.php?controlador=ReturnSales&accion=detailsreturnsales&idfactura=<?php echo $value["id"] ?>&codigo=<?php echo $value["codigo"] ?>" style="width: 15px; margin-left: auto; margin-right: auto;">
                                <img src="images/return.png" width="18px" height="18px" title="<?php $doc->texto('VIEW_DETAILS2'); ?>"/>
                            </a> 
                            <?php } else {?>
                                 <strong style="color: #252f38">N/A</strong>
                            <?php } ?>
                        </td>                        
                    </tr>
                    <?php
                    if ($estilo == 1) {
                        $estilo = 2;
                    } else {
                        $estilo = 1;
                    }
                }
                }
                ?> 
            </tbody>
        </table>           
    </div>
    </fieldset>
</div> 
        </div> 
    </div> 
<script>

    jQuery.fn.dataTableExt.oSort['numeric-comma-asc']  = function(a,b) {
        var x = (a == "-") ? 0 : a.replace( /,/, "." );
        var y = (b == "-") ? 0 : b.replace( /,/, "." );
        x = parseFloat( x );
        y = parseFloat( y );
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
 
    jQuery.fn.dataTableExt.oSort['numeric-comma-desc'] = function(a,b) {
        var x = (a == "-") ? 0 : a.replace( /,/, "." );
        var y = (b == "-") ? 0 : b.replace( /,/, "." );
        x = parseFloat( x );
        y = parseFloat( y );
        return ((x < y) ?  1 : ((x > y) ? -1 : 0));
    };

    jQuery.fn.dataTableExt.oSort['numeric-point-asc']  = function(a,b) {
        var x = (a == "-") ? 0 : a.replace( "$", "" ).replace( ".", "" );
        var y = (b == "-") ? 0 : b.replace( "$", "" ).replace( ".", "" );
        return (x-y);
    };

    jQuery.fn.dataTableExt.oSort['numeric-point-desc'] = function(a,b) {
        var x = (a == "-") ? 0 : a.replace( "$", "" ).replace( ".", "" );
        var y = (b == "-") ? 0 : b.replace( "$", "" ).replace( ".", "" );
        return (y-x);
    };
    
    $(document).ready(function(){

        $(".various4").fancybox({
            'width'                : 1000,
            'height'               : 480,
            'autoScale'            : false,
            'transitionIn'         : 'elastic',
            'transitionOut'        : 'elastic',
            'speedIn'              :  500, 
            'type'                 : 'iframe',
            'hideOnOverlayClick'   : false            
        });

        $('#example').dataTable( {
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
            "aaSorting": [[ 0, "desc" ]],
            "aoColumns": [
                null,
                { "bSortable": false, "bSearchable": false },
                { "bSortable": false, "bSearchable": false },
                { "bSortable": false, "bSearchable": false },
                { "bSortable": false, "bSearchable": false },
                { "bSortable": false, "bSearchable": false },
            ]
        } );
    });
</script>