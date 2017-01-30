<?php  
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<div id="hidden_clicker" style="display:none;">
    <a class="overlay-flash" id="hiddenclicker" href="#" >Hidden Clicker</a>
</div>
<div id="main">   
    <div class="maxcontent" id="content"> 
        <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Configuraci&oacute;n general</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>
        <div align="center">                            
            <form action="index.php?controlador=ConfGeneral&accion=updateData"  enctype="multipart/form-data" method="POST" id="formConfig"> 
            <fieldset class="colorleyend" style="width: 90%;">
                <legend class="colorleyendinto">Informaci&oacute;n basica de la empresa</legend>
                <table cellspacing="10" style="width: 100%;" align="center">
                    <tr>  
                        <td style="font-size: small; line-height: normal" colspan="4">
                           A continuaci&oacute;n diligencie la informaci&oacute;n de la empresa, estos datos son necesarios para los envios de correos y descarga de documentos del aplicativo, los campos que tienen asterisco "(*)" son obligatorios.
                        </td>              
                    </tr>    
                    <tr>
                        <td style="vertical-align: top"><?php $doc->texto('FULL_NAME') ?>: </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("nombre",
                                    "text",    
                                    $doc->t('FULL_NAME'), array('required' => true,
                                    'text' => 'regular',
                                    'minsize' => '5'), array('size' => '40',
                                    'maxlength' => '35',  
                                    'value'=> trim($empresa["nombreempresa"])));
                            ?> 
                        </td>
                        <td style="vertical-align: top">Nit(*): </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("nit", 
                                    "text", 
                                    "Nit", 
                                    array('required' => true, 'text' => 'regular', 'minsize' => '10'), 
                                    array('size' => '20', 'maxlength' => '15', 'value'=>trim($empresa["nitempresa"])));
                            ?>
                        </td>

                    </tr>
                    <tr>                        
                        <td><?php $doc->texto('MAIL') ?>: </td>
                        <td>
                            <?php
                            $view->input("email", "text", $doc->t('MAIL'), 
                                    array('required' => true, 'text' => 'email'),
                                    array('size' => '45', 'maxlength' => '40','value'=>trim($empresa["emailempresa"])));
                            ?>
                        </td>
                        <td style="vertical-align: top"><?php $doc->texto('PHONE') ?>(*): </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("telefono",
                                    "text",
                                    $doc->t('PHONE'), 
                                    array('required' => true,
                                'text' => 'regular',
                                'minsize' => '5'), array('size' => '16',
                                'maxlength' => '15',
                                'value'=>trim($empresa["telefono"])));
                            ?> 
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td style="vertical-align: top"><?php $doc->texto('ADDRESS') ?>: </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("direccion", 
                                    "text", 
                                    $doc->t('ADDRESS'), 
                                    array('required' => true, 'text' => 'regular', 'minsize' => '10'), 
                                    array('size' => '35', 'maxlength' => '35', 'value'=>trim($empresa["direccionempresa"])));
                            ?>
                        </td>

                        <td style="vertical-align: top">Contacto empresa: </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("contacto", 
                                    "text", 
                                    $doc->t('FULL_NAME'), 
                                    array('required' => true, 'text' => 'regular', 'minsize' => '10'), 
                                    array('size' => '35', 'maxlength' => '35', 'value'=>trim($empresa["contactoempresa"])));
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
                        
                        <td style="vertical-align: top">Slogan empresa: </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("slogan", 
                                    "text", 
                                    $doc->t('FULL_NAME'), 
                                    array('required' => true, 'text' => 'regular', 'minsize' => '10'), 
                                    array('size' => '35', 'maxlength' => '35', 'value'=>trim($empresa["sloganempresa"])));
                            ?>
                        </td> 
                       <td style="vertical-align: top">Régimen empresa</td> 
                       <td style="vertical-align: top">
                           <input type="text" name="regimen" value="<?php echo $empresa['regimen'] ?>">                           
                        </td>
                    </tr> 
                    <tr>
                        
                        <td style="vertical-align: top">Actividad empresa: </td>
                        <td style="vertical-align: top">
                            <?php
                            $view->input("actividad", 
                                    "text", 
                                    $doc->t('FULL_NAME'), 
                                    array('required' => true, 'text' => 'regular', 'minsize' => '10'), 
                                    array('size' => '35', 'maxlength' => '35', 'value'=>trim($empresa["actividadempresa"])));
                            ?>
                        </td> 
                        <td style="vertical-align: top">Dominio empresa</td> 
                        <td style="vertical-align: top">
                            <?php
                            $view->input("dominio", 
                                    "text", 
                                    $doc->t('FULL_NAME'), 
                                    array('required' => true, 'text' => 'regular', 'minsize' => '10'), 
                                    array('size' => '35', 'maxlength' => '35', 'value'=>trim($empresa["dominioempresa"])));
                            ?>                            
                        </td>
                    </tr>
                    <tr>
                    <td style="vertical-align: top">Logo empresa</td> 
                    <td style="vertical-align: top">
                        <ul id="secondGallery" class="image-overlay">
                            <li> 
                                <a class="otros3" href="index.php?controlador=ConfGeneral&accion=imageManager">
                                    <div id="nonemig">
                                        <img title=""  alt="<?php echo $empresa['nombreempresa'] ?>" src="<?php echo $empresa['logoempresa'] ?>" />
                                        <input type="hidden" name="imagen" value="<?php echo $producto['idimagen'] ?>"/>
                                    </div>
                                    <div style="top: -46px; background-color: rgb(97, 11, 56); color: rgb(255, 128, 0);" class="caption">
                                        <h2><font style="font-size: 14px"><center>Cambiar imagen</center></font></h2>
                                    </div>
                                </a>
                            </li>    
                        </ul>                    
                    </td>
                    </tr>                    
                </table>
            </fieldset>                         
            <button class="buscarButton" style="float: left;height: 40px;margin-left: 5%" id="finish">Guardar</button>    
            <div id="loader" style="float: left;margin-left: auto; margin-right: auto; display: none">
                <img src="images/ajax-loader.gif"/> Procesando...        
            </div>    
        </form>            
            <div style="clear: both"></div> 
        </div> 
    </div>
</div>  
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>        
    $(document).ready(function() {                               
 $("#departamentos").change(function() {              
            var ajaxOpts = {
                type: "get",
                url: "index.php",  
                data: "&controlador=ConfGeneral&accion=ajaxCiudades&departamento=" + $("#departamentos").val(),
                success: function(data) {							
                    $('#resCid').html(data);
                }                   
            };
            $.ajax(ajaxOpts);
        });
        $("#departamentos").val(<?php echo $tdepto ?>);
        $("#ciudades").val(<?php echo $tciu ?>);        
<?php if ($message != null) { ?>
            message('<?php echo $message ?>','<?php echo $icon_message ?>');
<?php } ?>       
        $("#formConfig input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });
                 
        $('#formConfig').ajaxForm({
            dataType: 'json',
            beforeSubmit: function() {
                $('#finish').attr('disabled', 'disabled');
                $("#finish").addClass("buscarButtonDis");
                $("#finish").removeClass("buscarButton");
                $('#cancel').attr('disabled', 'disabled');
                $("#cancel").addClass("buscarButtonDis");
                $("#cancel").removeClass("buscarButton");
                $('#loader').css('display', 'block');
                if (validates("formConfig")) {
                    return true;
                } else {
                    $('#loader').css('display', 'none');
                    $('#finish').removeAttr('disabled');
                    $("#finish").addClass("buscarButton");
                    $("#finish").removeClass("buscarButtonDis");
                    $('#cancel').removeAttr('disabled');
                    $("#cancel").addClass("buscarButton");
                    $("#cancel").removeClass("buscarButtonDis");
                    return false;
                } 
            },            
            success: function(responseText) {   
                    $('#loader').css('display', 'none');
                    $('#finish').removeAttr('disabled');
                    $("#finish").addClass("buscarButton");
                    $("#finish").removeClass("buscarButtonDis");
                    $('#cancel').removeAttr('disabled');
                    $("#cancel").addClass("buscarButton");
                    $("#cancel").removeClass("buscarButtonDis");
                    message("Se han actualizado los datos correctamente", "images/iconos_alerta/ok.png");               
            }
        });
        
                $("a.overlay-flash").fancybox({
            'autoDimensions': false,
            'width': 500,
            'height': 170,
            'autoScale': false,
            'transitionIn': 'elastic',
            'transitionOut': 'fade',
            'speedIn': 500,
            'type': 'iframe',
            'hideOnOverlayClick': false,
            'showCloseButton': false,
            'overlayColor': '#000',
            'margin': 15,
            'padding': 5
        });
                $(".otros3").fancybox({
            'autoDimensions': false,
            'width': 560,
            'height': 330,
            'autoScale': false,
            'overlayOpacity': 0.9,
            'transitionIn': 'elastic',
            'transitionOut': 'fade',
            'speedIn': 500,
            'type': 'iframe',
            'hideOnOverlayClick': true,
            'overlayColor': '#000',
            'showCloseButton': false,
            'padding': 0,
            'margin': 0
        });
    });
        $(window).load(function() {
        $("#secondGallery").ImageOverlay({
            border_color: "#005500",
            overlay_color: "#009900",
            overlay_origin: "top",
            overlay_text_color: "#FFFFFF"
        }); 
        $(".otros3").css("width", "200px");
        $(".otros3").css("height", "100px");
    });
</script>
