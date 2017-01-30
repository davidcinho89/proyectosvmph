<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div align="center">    
    <form action="index.php?controlador=Suppliers&accion=createsuppliers" method="POST" id="formSupplier">  
        <fieldset class="colorleyend" style="width: 90%">
            <legend class="colorleyendinto">Crear cliente</legend>
            <table cellspacing="10" border="0" style="width: 100%;line-height: 18px" align="center">
                <tr>
                    <td colspan="2" style="font-size: small">
                        A continuaci&oacute;n diligencie la informaci&oacute;n del nuevo cliente, los campos que tienen asterisco "(*)" son obligatorios.
                    </td>              
                </tr>
                <tr>
                    <td width="50%">Nombre Cliente(*): </td>              
                    <td width="50%">
                        <?php
                        $view->input("name_supplier",
                                "text", 
                                "Nombre del cliente", 
                                array('required' => true, 'text' => 'regular', 'minsize' => '3'), 
                                array('size' => '40', 'maxlength' => '40'));
                        ?>                    
                    </td>
                </tr>
                <tr>
                    <td>Nit(*): </td>
                    <td width="30%">
                        <?php
                        $view->input("nit", 
                                "numeric", 
                                "Nit", 
                                array('required' => true, 'text' => 'numeric', 'norepeat' => 'val5', 'minsize' => '5'), 
                                array('size' => '15', 'maxlength' => '13'));
                        ?>            
                    </td>
                </tr>
                <tr>
                    <td>Codigo EAN: </td>
                    <td width="30%">
                        <?php
                        $view->input("codigotercero", 
                                "numeric", 
                                "Codigo EAN", 
                                array('text' => 'numeric', 'norepeat' => 'val5', 'minsize' => '5'), 
                                array('size' => '15', 'maxlength' => '13'));
                        ?>            
                    </td>
                </tr> 
                <tr>
                    <td>Departamento: </td>
                    <td width="30%">
                        <?php echo $deps; ?>    
                    </td>
                </tr> 
                <tr>
                    <td>Ciudad: </td>
                    <td width="30%">
                        <div id="resCid">
                        <?php echo $cids; ?>
                        </div>   
                    </td>
                </tr>
                <tr>
                    <td>Dirección: </td>
                    <td width="30%">
                            <?php
                            $view->input("address_supplier", 
                                    "text", 
                                    "Dirección", 
                                    array(),
                                    array('size' => '40', 'maxlength' => '80', 'minsize' => '10'));
                            ?>            
                    </td>
                </tr>
                <tr>
                    <td width="50%">Email: </td>              
                    <td width="50%">
                        <?php
                        $view->input("email_supplier",
                                "text",
                                "Email", 
                                array('text' => 'email', 'minsize' => '5'),
                                array('size' => '40', 'maxlength' => '40'));
                        ?>                    
                    </td>
                </tr>  
                <tr>
                    <td>Tel&eacute;fono: </td>
                    <td width="30%">
                        <?php
                        $view->input("phone_supplier", 
                                "numeric", 
                                "Telefono", 
                                array('text' => 'numeric', 'minsize' => '7'), 
                                array('size' => '12', 'maxlength' => '10'));
                        ?>            
                    </td>
                </tr>  
                <tr>
                    <td>Tel&eacute;fono alterno: </td>
                    <td width="30%">
                        <?php
                        $view->input("phone_supplier2", 
                                "numeric", 
                                "Telefono alterno", 
                                array('text' => 'numeric', 'minsize' => '7'), 
                                array('size' => '12', 'maxlength' => '10'));
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
                                array('size' => '40', 'maxlength' => '40'));
                        ?>                    
                    </td>
                </tr> 
                <tr>
                    <td>Celular: </td>
                    <td width="30%">
                        <?php
                        $view->input("cellphone_supplier",
                                "numeric",
                                "Celular", 
                                array('text' => 'numeric', 'minsize' => '10'), 
                                array('size' => '12', 'maxlength' => '10'));
                        ?>            
                    </td>
                </tr>

            </table>
        </fieldset>   
    </form>
    <button class="buscarButton" style="float: left;height: 40px; margin-left: 5%" id="finish">Crear <br>cliente</button>    
    <div id="loader" style="float: left;margin-left: auto; margin-right: auto; display: none">
        <img src="images/ajax-loader.gif"/> Procesando...        
    </div>
    <div style="clear: both"></div>                    
</div> 
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
    function message(mensaje, imagen) {
        $("#titlemesagge", window.parent.document).html("<strong>" + mensaje + "<strong/>");
        $("#iconmesagge", window.parent.document).html(" <img src='" + imagen + "'/>");
        $("#barraf", window.parent.document).slideDown(1000).delay(3000).fadeIn(400);
        $("#barraf", window.parent.document).slideUp(1000).fadeOut(400);
    }
    $(document).ready(function() {
        $("#departamentos").val(6);
        $("#departamentos").change(function() {
            var ajaxOpts = {
                type: "get",
                url: "index.php",
                data: "&controlador=Suppliers&accion=ajaxCiudades&departamento=" + $("#departamentos").val() + "&tag=ciudades",
                success: function(data) {
                    $('#resCid').html(data);
                }

            };
            $.ajax(ajaxOpts);
        });

        $('#finish').click(function() {
            $('#formSupplier').ajaxForm({
                dataType: 'json',
                beforeSubmit: function() {
                    $('#finish').attr('disabled', 'disabled');
                    $("#finish").addClass("buscarButtonDis");
                    $("#finish").removeClass("buscarButton");
                    $('#loader').css('display', 'block');
                    if (validates("formSupplier")) {
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
                        parent.message("Se ha creado un nuevo cliente", "images/iconos_alerta/ok.png");
                        parent.createdata(responseText.id,
                        responseText.nombre,
                        responseText.nit,
                        responseText.telefono,
                        responseText.idid,
                        responseText.verify,
                        responseText.contacto,
                        responseText.email,
                        responseText.codigo);                        
                        parent.$.fancybox.close();
                    } else if (responseText.respuesta == 'no') {
                        parent.message('No se ha podido crear el cliente', 'images/iconos_alerta/error.png');
                        parent.$.fancybox.close();
                    }
                }
            }).submit();
        });
        $("#formSupplier input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });
    });    
</script>
