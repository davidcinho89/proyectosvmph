<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div align="center">    
    <form id="myform" action="index.php?controlador=ManageUsers&accion=editBasicUser" method="post">
        <fieldset class="colorleyend" style="width: 90%">
            <legend class="colorleyendinto"><?php $doc->texto('BASIC_INFORMATION') ?></legend>
            <table cellspacing="10" style="width:100%; line-height: 20px" align="center">
                <tr>
                    <td colspan="4" style="font-size: small; line-height: normal !important">
                        A continuaci&oacute;n podra actualizar la informaci&oacute;n basica del usuario seleccionado, los campos que tienen asterisco "(*)" son obligatorios.
                    </td>              
                </tr>
                <tr>
                    <td style="vertical-align: middle"><?php $doc->texto('FULL_NAME') ?>: </td>
                    <td style="vertical-align: middle">                        
                        <?php
                        $view->input("full_name", "text", $doc->t('FULL_NAME'), array('required' => true, 'text' => 'onlytext', 'minsize' => '8'), array('size' => '40', 'maxlength' => '35', 'value' => $usuario['nombre']));
                        ?> 
                    </td>
                   <td><?php $doc->texto('MAIL') ?>: </td>
                    <td>
                        <?php
                        $view->input("email", "text", $doc->t('MAIL'), array('required' => true, 'text' => 'email', 'norepeat' => 'val1', 'except' => $usuario['email']), array('size' => '45', 'maxlength' => '40', 'value' => $usuario['email']));
                        ?>
                    </td>

                </tr>
                <tr>
                    <td>E-mail secundario: </td>
                    <td>
                        <?php
                        $view->input("email2", "text", $doc->t('MAIL'), array('text' => 'email'), array('size' => '45', 'maxlength' => '40', 'value' => $usuario['email2']));
                        ?>
                    </td>                      
                    <td></td> 
                    <td>                                        
                    </td>
                </tr>
            </table>
            <div style="width: 100%; text-align: center;margin-top: 10px ">
                <input type="hidden" name="idusuario" value="<?php echo $usuario['id'] ?>" />
                <button class="buscarButton" id="accpet" style="float: left">GUARDAR CAMBIOS</button>  
                <div id="loader" style="float: left; margin-left: 12px; display: none;">
                    <img src="images/ajax-loader.gif"/> Procesando...
                </div>
                <div style="clear: both"></div>
            </div>                        
        </fieldset>         
    </form>
    <form id="myform2" action="index.php?controlador=ManageUsers&accion=editPassUser" method="post">
        <fieldset class="colorleyend" style="width: 90%">
            <legend class="colorleyendinto">Informacion de usuario</legend>
            <table cellspacing="10" style="width:100%; line-height: 20px" align="center" >
                <tr>
                    <td colspan="4" style="font-size: small; line-height: normal !important">
                        A continuaci&oacute;n podra actualizar la contrase&ntilde;a del usuario seleccionado, los campos que tienen asterisco "(*)" son obligatorios.
                    </td>              
                </tr>
                <tr>
                    <td style="vertical-align: top">Alias: </td>
                    <td style="vertical-align: top">                        
<?php
$view->input("alias", "text", 'Alias', array('text' => 'regular', 'minsize' => '5'), array('size' => '25', 'maxlength' => '20',
    'value' => $usuario['alias'],
    'disabled' => 'disabled',
    'readonly' => 'readonly',
    'style' => 'cursor:default; background: #c9d3e8'));
?>                                            
                    </td>
                    <td>Fecha de ingreso:</td>               
                    <td><?php echo $usuario['fechaingreso'] ?></td>               
                </tr>
                <tr>                
                    <td style="vertical-align: top">Contrase&ntilde;a(*): </td>
                    <td style="vertical-align: top">
                        <input id="pass" type="password" size="30" onkeyup="verificar2()" name="con" minsize="5" patt="val1" label="password" presence="val1" maxlength="16"/>
                    </td>  
                    <td style="vertical-align: top">Confirmar contrase&ntilde;a(*): </td>
                    <td style="vertical-align: top">
                        <input id="passs" type="password" size="30" onkeyup="verificar()" name="concon" maxlength="16"/>
                    </td>
                </tr>
            </table>
            <div style="width: 100%; text-align: center;margin-top: 10px ">
                <input type="hidden" name="idusuariopass" value="<?php echo $usuario['id'] ?>" />
                <button class="buscarButton" id="accpet2" style="float: left">GUARDAR CAMBIOS</button>  
                <div id="loader2" style="float: left; margin-left: 12px; display: none;">
                    <img src="images/ajax-loader.gif"/> Procesando...
                </div>
                <div style="clear: both"></div>
            </div>  
        </fieldset>   
    </form>   
</div>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
    function verificar(){
        if($('#pass').val()==''&& $('#passs').val()!=''){
            $('#errormipas').remove();
            $('#passs').val('');
            $('#passs').after('<div id="errormipas" style="font-size: 12px; color: Red; font-weight: bold;">Debe digitar una nueva contrase&ntilde;a.</div>');
        }
    }
    function verificar2(){
        if($('#pass').val()==''&& $('#passs').val()!=''){
            $('#passs').val('');
        }else{
            $('#errormipas').remove();
        }
    }
    function message(mensaje,imagen){        
        $("#titlemesagge",window.parent.document).html("<strong>"+mensaje+"<strong/>");
        $("#iconmesagge",window.parent.document).html(" <img src='"+imagen+"'/>");       
        $("#barraf",window.parent.document).slideDown(1000).delay(3000).fadeIn(400);
        $("#barraf",window.parent.document).slideUp(1000).fadeOut(400);  
    }
    $(document).ready(function(){    
        $(".bottoncancel").click(function(){
            parent.$.fancybox.close();
        });        
        $('#myform').ajaxForm({
            dataType: 'json',
            beforeSubmit: function() {
                $('#accpet').attr('disabled', 'disabled');
                $("#accpet").addClass("buscarButtonDis");
                $("#accpet").removeClass("buscarButton");
                $('#loader').css('display', 'block');                
                if(validates('myform')){
                    return true;
                }else{
                    $('#loader').css('display', 'none');
                    $("#accpet").addClass("buscarButton");
                    $("#accpet").removeClass("buscarButtonDis");
                    $('#accpet').removeAttr('disabled');
                    return false;
                }

            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            success: function(responseText) {
                $('#loader').css('display', 'none');
                $("#accpet").addClass("buscarButton");
                $("#accpet").removeClass("buscarButtonDis");
                $('#accpet').removeAttr('disabled');
                if(responseText.respuesta=='si'){                    
                    parent.updatedata(responseText.id,responseText.nombre);
                    parent.message('se han actualizados los datos del usuario','images/iconos_alerta/ok.png');                    
                }else if(responseText.respuesta=='no'){
                    parent.message('No se ha podido actualizar los datos del usuario','images/iconos_alerta/error.png');                    
                }
            }
        });
        $('#myform2').ajaxForm({
            dataType: 'json',
            beforeSubmit: function() {
                $('#accpet2').attr('disabled', 'disabled');
                $("#accpet2").addClass("buscarButtonDis");
                $("#accpet2").removeClass("buscarButton");
                $('#loader2').css('display', 'block');                
                if(validates('myform2')){                                        
                    if($('#pass').val()!=''){
                        if($('#passs').val()==$('#pass').val()){
                            return true;
                        }else{
                            $('#loader2').css('display', 'none');
                            $("#accpet2").addClass("buscarButton");
                            $("#accpet2").removeClass("buscarButtonDis");
                            $('#accpet2').removeAttr('disabled');
                            $('#passs').after('<div class="error_input" style="font-size: 12px; color: Red; font-weight: bold;">Las contrase&ntilde;as no coinciden</div>');
                            parent.message('Verifique los datos ingresados','images/iconosalerta/error.png');
                            return false;
                        }
                    }            
                }else{                    
                    if($('#pass').val()!=''){
                        if($('#passs').val()==$('#pass').val()){
                            $('#loader2').css('display', 'none');
                            $("#accpet2").addClass("buscarButton");
                            $("#accpet2").removeClass("buscarButtonDis");
                            $('#accpet2').removeAttr('disabled');
                            return false;
                        }else{
                            $('#loader2').css('display', 'none');
                            $("#accpet2").addClass("buscarButton");
                            $("#accpet2").removeClass("buscarButtonDis");
                            $('#accpet2').removeAttr('disabled');
                            $('#passs').after('<div class="error_input" style="margin-top:8px !important;font-size: 12px; color: Red; font-weight: bold;">las contrase&ntilde;as no coinciden</div>');
                            return false;
                        }
                    }else{
                        $('#loader2').css('display', 'none');
                        $("#accpet2").addClass("buscarButton");
                        $("#accpet2").removeClass("buscarButtonDis");
                        $('#accpet2').removeAttr('disabled');
                        return false;
                    }
                }

            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            success: function(responseText) {
                $('#loader2').css('display', 'none');
                $("#accpet2").addClass("buscarButton");
                $("#accpet2").removeClass("buscarButtonDis");
                $('#accpet2').removeAttr('disabled');
                if(responseText.respuesta=='si'){  
                    $('#passs').val('');
                    $('#pass').val('');
                    parent.message('se ha cambiado el password del usuario','images/iconos_alerta/ok.png');                    
                }else if(responseText.respuesta=='no'){
                    parent.message('No se ha podido cambiar el passwords del usuario','images/iconos_alerta/error.png');                    
                }
            }
        });
        $("#myform input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });
        $("#myform2 input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });
    });
</script>