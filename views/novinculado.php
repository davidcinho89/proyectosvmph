<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<form id="myform" action="index.php?controlador=Novinculado&accion=enviarfrm" method="post">
    <fieldset class="colorleyend" style="width: 95%">
        <legend class="colorleyendinto">Informacion Basica</legend>
        <table cellspacing="10" style="width:100%; line-height: 20px" align="center">
            <tr>
                <td style="color: red;text-align: justify" colspan="4">
                    NOTA: Usted prodra realizar compras online, sin embargo estas compras "NO" generan puntos ni comision alguna.
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle"><?php $doc->texto('FULL_NAME') ?>: </td>
                <td style="vertical-align: middle">
                    <?php
                    $view->input("nombreusuario", 
                            "text",
                            $doc->t('FULL_NAME'), 
                            array('required' => true,
                                        'text' => 'onlytext',
                                        'minsize' => '8'),
                                    array('size' => '40', 
                                        'maxlength' => '35'));?>                     
                </td>
                <td style="vertical-align: middle"><?php $doc->texto('IDENTIFIER') ?>: </td>
                <td style="vertical-align: middle">
                    <?php
                    $view->input("cedula", 
                            "numeric", 
                            $doc->t('IDENTIFIER'), 
                            array('required' => true, 'text' => 'numeric', 'norepeat' => 'val1','minsize' => '5'),
                            array('size' => '20', 'maxlength' => '15')); ?>                 
                </td>

            </tr>
            <tr>
                <td><?php $doc->texto('BORN_DATE') ?>(*): </td>
                <td>
                    <?php
                    $view->input("born_date", 
                            "calendar", 
                            $doc->t('BORN_DATE'),
                            array('required' => true),
                            array('readonly' => 'readonly',
                                'midate' => (int) date("Y") - 100,
                                'madate' => (int) date("Y") - 18));
                    ?>
                </td>
                <td><?php $doc->texto('MAIL') ?>: </td>
                <td>
                    <?php
                    $view->input("email", "text", $doc->t('MAIL'), 
                            array('required' => true, 'text' => 'email', 'norepeat' => 'val1'), 
                            array('size' => '30', 'maxlength' => '25'));
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php $doc->texto('STADE') ?>: </td>
                <td> <?php echo $deps; ?></td>
                <td><?php $doc->texto('CITY') ?>: </td>
                <td><div id="resCid"><?php echo $cids; ?></div></td>
            </tr>
            <tr>
                <td><?php $doc->texto('SECTOR') ?>: </td>
                <td> <?php echo $locvin; ?></td>
                <td><?php $doc->texto('NEIGHBORHOOD') ?>: </td>
                <td><div id="barrio"><?php echo $barrvin; ?></div></td>
            </tr>
            <tr>
                <td><?php $doc->texto('ADDRESS') ?>: </td>
                <td width="30%">
                    <?php
                    $view->input("direccion", 
                            "text", 
                            "Direccion", 
                            array('required' => true, 'text' => 'address'), 
                            array('size' => '40', 'maxlength' => '50', 'minsize' => '10'));
                    ?>
                </td>
                <td><?php $doc->texto('PHONE') ?>: </td>
                <td width="30%">
                    <?php
                    $view->input("telefono",
                            "numeric", 
                            "Telefóno", 
                            array('required' => true, 'text' => 'numeric', 'minsize' => '7'),
                            array('size' => '12', 'maxlength' => '10'));
                    ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset class="colorleyend" style="width: 95%">
        <legend class="colorleyendinto">Informacion de usuario</legend>
        <table cellspacing="10" style="width:100%; line-height: 20px" align="center" >
            <tr>
                <td style="vertical-align: top">Alias: </td>
                <td style="vertical-align: top">
                    <?php
                    $view->input("alias", 
                            "text", 
                            'Alias', 
                            array('required' => true, 'text' => 'alias', 'minsize' => '5', 'norepeat' => 'val1'), 
                            array('size' => '25', 'maxlength' => '20', 'style' => 'text-transform:uppercase;', 'id' => 'alias'));
                    ?>
                </td>
                <td style="vertical-align: top"><?php $doc->texto('PASSWORD') ?>: </td>
                <td style="vertical-align: top">
                    <input id="pass" type="password" size="30" onkeyup="verificar2()" name="pass" minsize="5" patt="val1" label="password" presence="val1" maxlength="16"/>
                </td>

            </tr>
            <tr>
                <td style="vertical-align: top"><?php $doc->texto('CONFIRPASS') ?>: </td>
                <td style="vertical-align: top">
                    <input id="passs" type="password" size="30" onkeyup="verificar()" name="cpass" maxlength="16"/>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </fieldset>
    <button class="buscarButton" id="accpet" style="float: left">Aceptar</button>
</form>
<div id="loader" style="float: left; margin-left: 12px; display: none;">
    <img src="images/ajax-loader.gif"/>
</div>
<div style="clear: both"></div>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
function verificar() {
    if ($('#pass').val() == '' && $('#passs').val() != '') {
        $('#errormipas').remove();
        $('#passs').val('');
        $('#passs').after('<div id="errormipas" style="font-size: 12px; color: Red; font-weight: bold;">Debe digitar una nueva contrase&ntilde;a.</div>');
    }
}

function verificar2() {
    if ($('#pass').val() == '' && $('#passs').val() != '') {
        $('#passs').val('');
    } else {
        $('#errormipas').remove();
    }
}

function message(mensaje, imagen) {
    $("#titlemesagge", window.parent.document).html("<strong>" + mensaje + "<strong/>");
    $("#iconmesagge", window.parent.document).html(" <img src='" + imagen + "'/>");
    $("#barraf", window.parent.document).slideDown(1000).delay(3000).fadeIn(400);
    $("#barraf", window.parent.document).slideUp(1000).fadeOut(400);
}

$(document).ready(function() {
    $("#departamentos").val(6);
    $('#myform').ajaxForm({
        dataType: 'json',
        beforeSubmit: function() {
            $('#accpet').attr('disabled', 'disabled');
            $("#finish").attr('disabled', 'disabled');
            $('#loader').css('display', 'block');
            $('#alias').val($('#alias').val().toUpperCase());
            if (validates('myform')) {
                if ($('#passs').val() == $('#pass').val()) {
                    return true;
                } else {
                    $('#loader').css('display', 'none');
                    $('#accpet').removeAttr('disabled');
                    $("#finish").removeAttr('disabled');
                    $('#passs').after('<div class="error_input" style="font-size: 12px; color: Red; font-weight: bold;">Las contrase&ntilde;as no coinciden</div>');
                    parent.message('Verifique los datos ingresados', 'images/iconosalerta/error.png');
                    return false;
                }
            } else {
                if ($('#passs').val() == $('#pass').val()) {
                    $('#loader').css('display', 'none');
                    $('#accpet').removeAttr('disabled');
                    $("#finish").removeAttr('disabled');
                    return false;
                } else {
                    $('#loader').css('display', 'none');
                    $('#accpet').removeAttr('disabled');
                    $("#finish").removeAttr('disabled');
                    $('#passs').after('<div class="error_input" style="margin-top:8px !important;font-size: 12px; color: Red; font-weight: bold;">las contrase&ntilde;as no coinciden</div>');
                    return false;
                }
            }
        },
        uploadProgress: function(event, position, total, percentComplete) {
        },
        success: function(responseText) {
            $('#loader').css('display', 'none');
            $('#accpet').removeAttr('disabled');
            $("#finish").removeAttr('disabled');
            if (responseText.result == 'error') {
                parent.message(responseText.mensaje, 'images/iconos_alerta/error.png');
                parent.$.fancybox.close();
            } else {
                parent.message(responseText.mensaje, 'images/iconos_alerta/ok.png');
                parent.$.fancybox.close();
            }
        }
    });

    $("#departamentos").change(function() {
        var ajaxOpts = {
            type: "get",
            url: "index.php",
            data: "&controlador=Novinculado&accion=ajaxCiudades&departamento=" + $("#departamentos").val() + "&tag=ciudades",
            success: function(data) {
                if($("#departamentos").val()!=6){
                    $("#locvin").css("background-color","#BBBBBB");
                    $('select[name="barrvin"]').css("background-color","#BBBBBB");
                    $("#locvin").attr("disabled","disabled");                    
                    $('select[name="barrvin"]').attr("disabled","disabled");                    
                    $("#locvin").attr("readonly","readonly");
                    $('select[name="barrvin"]').attr("readonly","readonly");
                }else{
                    $("#locvin").css("background-color","#FFF");
                    $('select[name="barrvin"]').css("background-color","#FFF");
                    $("#locvin").removeAttr("disabled","disabled");                    
                    $('select[name="barrvin"]').removeAttr("disabled","disabled");                    
                    $("#locvin").removeAttr("readonly","readonly"); 
                   $('select[name="barrvin"]').removeAttr("readonly","readonly");
                }
                $('#resCid').html(data); 
           }
        };
        $.ajax(ajaxOpts);
    });

    $("#locvin").change(function() {
        var ajaxOpts = {
            type: "get",
            url: "index.php",
            data: "&controlador=Novinculado&accion=ajaxBarrios&localidad=" + $("#locvin").val() + "&tag=barrvin",
            success: function(data) {
                $('#barrio').html(data);
            }

        };
        $.ajax(ajaxOpts);
    });
    
    $('input.onepic').click(function(){
            $("[name='year']").val(<?php echo $ano ?>);   
            $("[name='month']").val(<?php echo $mes ?>); 
            var dia =<?php echo $dia ?>;
            var $ttd = $('td.date');             
            $ttd.each(function() { 
                if($.trim($(this).html())>dia){                    
                    $(this).removeClass("chosen");
                    $(this).css("color","#555555");
                    $(this).css("cursor","default"); 
                    $(this).unbind();
                }
            });

            $("select[name='year']").change(function(){                
                var ano =  $(this).val();
                var mes =  $("[name='month']").val();
                var diamax =<?php echo $dia ?>;
                var mesmax =<?php echo $mes ?>;
                var anomax =<?php echo $ano ?>; 
                var $ttd = $('td.date');
                if(ano<anomax){
                    $ttd.each(function() {                                                                           
                        $(this).css("color","#000000");
                        $(this).css("cursor","pointer");                                                    
                    });
                }else if(ano==anomax){
                    if(mes<mesmax){                         
                        $ttd.each(function() {  
                            $(this).css("color","#000000");
                            $(this).css("cursor","pointer"); 
                        });
                    }else if(mes==mesmax){
                        $ttd.each(function() { 
                            if($.trim($(this).html())>diamax){                    
                                $(this).css("color","#555555");
                                $(this).css("cursor","default"); 
                                $(this).unbind();
                            }else{
                                $(this).css("color","#000000");
                                $(this).css("cursor","pointer");   
                            }
                        });
                    }else if(mes>mesmax){                            
                        $ttd.each(function() {                                                                
                            $(this).css("color","#555555");
                            $(this).css("cursor","default"); 
                            $(this).unbind();              
                        }); 
                    }
                }else if(ano>anomax){                            
                    $ttd.each(function() {                                                            
                        $(this).css("color","#555555");
                        $(this).css("cursor","default"); 
                        $(this).unbind();               
                    }); 
                }
            });
            $("[name='month']").change(function(){
                var ano =  $("[name='year']").val();
                var mes =  $("[name='month']").val();
                var diamax =<?php echo $dia ?>;
                var mesmax =<?php echo $mes ?>;
                var anomax =<?php echo $ano ?>; 
                var $ttd = $('td.date');
                if(ano<anomax){
                    $ttd.each(function() { 
                        $(this).css("color","#000000");
                        $(this).css("cursor","pointer");
                    });
                }else if(ano==anomax){
                    if(mes<mesmax){
                        $ttd.each(function() { 
                            $(this).css("color","#000000");
                            $(this).css("cursor","pointer"); 
                        });
                    }else if(mes==mesmax){
                        $ttd.each(function() { 
                            if($.trim($(this).html())>diamax){                    
                                $(this).css("color","#555555");
                                $(this).css("cursor","default"); 
                                $(this).unbind();
                            }else{
                                $(this).css("color","#000000");
                                $(this).css("cursor","pointer");   
                            }
                        });
                    }else if(mes>mesmax){                            
                        $ttd.each(function() {                                    
                            $(this).css("color","#555555");
                            $(this).css("cursor","default"); 
                            $(this).unbind();               
                        }); 
                    }
                }else if(ano>anomax){                            
                    $ttd.each(function() {                                    
                        $(this).css("color","#555555");
                        $(this).css("cursor","default"); 
                        $(this).unbind();               
                    }); 
                }
            });
             $("#myform input").not(".onepic").click(function(){
                $(".close").click();
            });
        });
        $("#myform input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });
});
</script>