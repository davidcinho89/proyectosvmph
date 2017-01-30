<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div align="center">    
    <form action="index.php?controlador=Warehouse&accion=createwarehouses" method="POST" id="formWarehouse"> 
    <fieldset class="colorleyend" style="width: 90%">
        <legend class="colorleyendinto">Crear tienda</legend>
        <table cellspacing="10" border="0" style="width: 100%;" align="center">
            <tr>
                    <td colspan="2" style="font-size: small; line-height: normal">
                        A continuaci&oacute;n diligencie la informaci&oacute;n de la nueva tienda, los campos que tienen asterisco "(*)" son obligatorios.
                    </td>              
            </tr>
            <tr>
                <td>Nombre tienda(*): </td>              
                <td>
                    <?php $view->input("nombrebodega",
                            "text", 
                            "Nombre de bodega", 
                            array('required' => true, 'text' => 'regular', 'minsize'=>'3','norepeat' => 'val7'),
                            array('size' => '50','maxlength'=>'40')); ?>                    
                </td>
            </tr>
            <tr>
                    <td>Codigo EAN(*): </td>
                    <td width="30%">
                        <?php
                        $view->input("codigobodega", 
                                "numeric", 
                                "Codigo EAN", 
                                array('required' => true, 'text' => 'numeric', 'norepeat' => 'val7', 'minsize' => '5'), 
                                array('size' => '15', 'maxlength' => '13'));
                        ?>            
                    </td>
                </tr>
            <tr>
            <tr>
                    <td>Cliente(*): </td>
                    <td width="30%">
                         <div style="margin-left: 2px;float: left; margin-top: 2px">
                            <a id="searchch" href="index.php?controlador=SupplierBuy&accion=getProvedoresList" title="Buscar cliente">
                                <img src="images/zoom.png" width="17" height="17"/>
                            </a>
                        </div>
                        <input type="hidden" name="idproveedor" value="" id="idcliente"/>
                        <?php
                        $view->input("nombrevliente", 
                                "text", 
                                "Cliente tienda", 
                                array('required' => true, 'text' => 'regular', 'minsize' => '5'), 
                                array('size' => '35',
                                    'maxlength' => '13',
                                    'style'=>'float: left',
                                    'readonly'=>'readonly',
                                    'id'=>'nitcliente'));
                        ?> 
                       
                    </td>
                </tr>
            <tr>
                <td>Direcci&oacute;n(*): </td>
                <td>
                    <?php $view->input("direccion",
                            "text", 
                            "direccion tienda", 
                            array('required' => true, 'minsize'=>'4'),
                            array('size' => '50','maxlength'=>'80')); ?>     
                </td>
            </tr>
             <tr>
                    <td width="50%">Email: </td>              
                    <td width="50%">
                        <?php
                        $view->input("email",
                                "text",
                                "Email", 
                                array('text' => 'email', 'minsize' => '5'),
                                array('size' => '50', 'maxlength' => '40'));
                        ?>                    
                    </td>
                </tr>  
                <tr>
                    <td>Tel&eacute;fono: </td>
                    <td width="30%">
                        <?php
                        $view->input("phone", 
                                "numeric", 
                                "Telefono", 
                                array('text' => 'numeric', 'minsize' => '7'), 
                                array('size' => '15', 'maxlength' => '10'));
                        ?>            
                    </td>
                </tr>          
                 <tr>
                    <td width="50%">Nombre Contacto: </td>              
                    <td width="50%">
                        <?php
                        $view->input("namecontact", 
                                "text", 
                                "Nombre del contacto",
                                array('text' => 'onlytext', 'minsize' => '8'), 
                                array('size' => '50', 'maxlength' => '40'));
                        ?>                    
                    </td>
                </tr> 
        </table>
    </fieldset>     
    </form>
    <button class="buscarButton" style="float: left;height: 40px; margin-left: 5%" id="finish">Crear <br>tienda</button>    
    <div id="loader" style="float: left;margin-left: auto; margin-right: auto; display: none">
        <img src="images/ajax-loader.gif"/> Procesando...        
    </div>
    <div style="clear: both"></div>         
</div> 
<script src="http://malsup.github.com/jquery.form.js"></script>
<script> 
    function message(mensaje,imagen){        
        $("#titlemesagge",window.parent.document).html("<strong>"+mensaje+"<strong/>");
        $("#iconmesagge",window.parent.document).html(" <img src='"+imagen+"'/>");       
        $("#barraf",window.parent.document).slideDown(1000).delay(3000).fadeIn(400);
        $("#barraf",window.parent.document).slideUp(1000).fadeOut(400);  
    }
    function actualizarproveedor(nombre,nit,id){
        $('#idcliente').val(id);
        $('#nitcliente').val(nombre);
    }
    
    $(document).ready(function() {  
        $("#searchch").fancybox({
           'width': 700,
           'height': 280,
           'autoScale': false,
           'transitionIn': 'elastic',
           'transitionOut': 'elastic',
           'speedIn': 500,
           'type': 'iframe',
           'hideOnOverlayClick': false
       });
       
        
         $('#finish').click(function() {
            $('#formWarehouse').ajaxForm({
                dataType: 'json',
                beforeSubmit: function() {
                    $('#finish').attr('disabled', 'disabled');
                    $("#finish").addClass("buscarButtonDis");
                    $("#finish").removeClass("buscarButton");
                    $('#loader').css('display', 'block');
                    if (validates("formWarehouse")) {
                        return true;
                    } else {
                        $('#loader').css('display', 'none');
                        $('#finish').removeAttr('disabled');
                        $("#finish").addClass("buscarButton");
                        $("#finish").removeClass("buscarButtonDis");
                        return false;
                    }
                },
                uploadProgress: function(event, position, total, percentComplete) {
                },
                success: function(responseText) {
                    $('#loader').css('display', 'none');
                    $('#finish').removeAttr('disabled');
                    if (responseText.respuesta == 'si') {
                        parent.message("Se ha creado una nueva tienda", "images/iconos_alerta/ok.png");
                        parent.createdata(responseText.id,
                        responseText.nombre,
                        responseText.direccion,                        
                        responseText.idid,
                        responseText.verify,
                        responseText.codigo,
                        responseText.cliente);                        
                        parent.$.fancybox.close();
                    } else if (responseText.respuesta == 'no') {
                        parent.message('No se ha podido crear la tienda', 'images/iconos_alerta/error.png');
                        parent.$.fancybox.close();
                    }
                }
            }).submit();
        });
        
        $("#formWarehouse input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });        
    });
</script>

