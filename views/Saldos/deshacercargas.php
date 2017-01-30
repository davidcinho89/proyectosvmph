<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div class="container" style="margin-bottom: 20px; margin-top: 20px;min-width: 660px">    
    <fieldset class="colorleyend" style="width: 650px;">
        <legend class="colorleyendinto">Lista de Cargas de Saldos</legend>                 
        <div style="margin-top: 15px">
            <table class="table" border="0" cellspacing="0" cellpadding="3" id="mytable">      
                <thead>
                    <tr class="headall">     
                        <th class="headinit">Url Archivo</th>                        
                        <th class="head">Fecha de carga</th>
                        <th class="head">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $estilo = 1;
                    if (sizeof($cargas) != 0) {
                        foreach ($cargas as $value) {
                            ?>
                            <tr class="class<?php echo $estilo; ?>" id="<?php echo sha1($value["url"]) ?>"> 
                                <td class="init2">                                    
                                    <?php echo $value["url"] ?>                                    
                                </td>  
                                <td class="item2">
                                    <?php echo $value["fecha"] ?>
                                </td>                                                        
                                <td class="item2" style="width: 20px;text-align: center">                                    
                                        <a id="dell<?php echo sha1($value['url']); ?>" 
                                           callback="<?php echo $value['fecha']; ?>" 
                                           tar="index.php?controlador=Saldos&accion=deleteCarga"                                            
                                           href="#" 
                                           verify="<?php echo base64_encode($value['url']); ?>"
                                           onclick="confirmfunction($(this).attr('id'))">
                                           <img class="delete" src="images/delete.gif" title="Eliminar item"/> 
                                        </a>                                  
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
<div style="display: none">
    <div id="contentcall">
        <div style="text-align: center; margin-bottom: 12px;margin-top: 40px;padding-left: 20px;padding-right: 20px; font-size: 12px">
            Esta seguro de eliminar la carga de la fecha <strong id="nombrecalldel"></strong>?
        </div>
        <div style="text-align: center; margin-bottom: 12px;">
            <button class="buscarButton" id="accept">ACEPTAR</button>    
            <button style="margin-left: 10px" class="buscarButton" id="cancel">CANCELAR</button>
        </div>
    </div>
</div>
<div style="display: none">
    <a href="#contentcall" class="callback">Open Example</a>
</div>
<script>
    var oTable;
    function confirmfunction(id) {
       $('#nombrecalldel').html($('#' + id).attr('callback'));
       $('.callback').trigger('click');
       $('#accept').click(function() {
           $.ajax({
               type: "POST",
               url: $('#' + id).attr('tar'),
               dataType: "json",
               data: {verify: $('#' + id).attr('verify')},
               success: function(data) {
                   if (data.res == 'si') {
                       oTable.fnDeleteRow(oTable.fnGetPosition($('#' + data.idrow).get(0)));
                       $.fancybox.close();
                       parent.message("Se ha eliminado la carga.", "images/iconos_alerta/ok.png");                     
                   } else {
                       $.fancybox.close();
                       parent.message("No se pudo eliminar la carga", "images/iconos_alerta/error.png");
                   }
               }
           });
       });
       $('#cancel').click(function() {
           $.fancybox.close();
       });
    }
    $(document).ready(function() {   
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
        $('img').css("border", "0");
        oTable = $('#mytable').dataTable({
            "aLengthMenu": [
                [5,10, 15, 20, -1],
                [5,10, 15, 20, "Todos"]
            ],
            "iDisplayLength": 5,
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
            "aaSorting": [[1, "desc"]],
            "aoColumns": [
                null,
                null,
                null
            ]
        });
    });
</script>
