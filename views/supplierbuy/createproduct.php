<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>

<div id="hidden_clicker" style="display:none;">
    <a class="overlay-flash" id="hiddenclicker" href="#" title="Crear categoria">Hidden Clicker</a>
</div>
<div align="center">     
    <form action="index.php?controlador=SupplierBuy&accion=insertProduct" method="POST" id="formProduct"> 
    <fieldset class="colorleyend" style="width: 95%">
        <legend class="colorleyendinto">Crear producto</legend>
        <table cellspacing="5" border="0" style="width: 100%;" align="center">
            <tr>
                <td colspan="3" style="font-size: small; line-height: normal !important">
                    A continuaci&oacute;n diligencie la informaci&oacute;n del nuevo producto, los campos que tienen asterisco "(*)" son obligatorios. El producto creado sera agregado automaticamente como item de la compra.
                </td>              
            </tr>
            <tr>
                <td width="50%" style="line-height: normal">Nombre producto(*): </td>              
                <td width="50%">
                    <?php
                    $view->input("name_products", 
                            "text", 
                            "Nombre producto",
                            array('required' => true, 'text' => 'regular', 'minsize' => '2'),
                            array('maxlength' => '50', 'size' => '35'));
                    ?>                          
                </td>
            </tr>
            <tr>
                <td>Referencia(*): </td>
                <td width="30%">
                <?php
                    $view->input("referencia_disabled",
                            "numeric", 
                            "Referencia",
                            array('required' => true, 'text' => 'numeric', 'norepeat' => 'val2', 'minsize' => '1'), 
                            array('maxlength' => '15', 
                                'size' => '20',
                                'value' => $referencia,
                                'disabled'=>'disabled',
                                'readonly'=>'readonly',
                                'style'=>'cursor:default; background: #c9d3e8'));
                ?>     
                    <input type="hidden" name="referencia" value="<?php echo $referencia?>"/>
                </td>
            </tr>
            <tr>
                <td style="line-height: normal">Unidad de Medida: </td>
                <td width="30%">
                    <select  name="unidad">   
                            <option value="und">
                                Unidades
                            </option>
                            <option value="kg">
                                Kilogramos
                            </option>                            
                        </select> 
                    </td> 
             </tr>
            <tr>
                <td>Precio venta base(*): </td>
                <td width="30%">
                    $ <?php
                        $view->input("price", 
                                "text", 
                                "Precio venta", 
                                array('required' => true, 'text' => 'decimal', 'minsize' => '2'),
                                array('maxlength' => '8', "size" => "10"));
                      ?>   
                </td>
            </tr>
            <tr>
                <td>Iva(*): </td>
                <td width="30%">
                    % <?php
                    $view->input("iva", 
                            "numeric",
                            "Iva", 
                            array('required' => true, 'text' => 'digit', 'minsize' => '1'), 
                            array('maxlength' => '2', "size" => "4"));
?>    
                </td>
            </tr>
            <tr>
                <td>Categoria: </td>
                <td width="30%">
                    <select id="categorias" name="categorias">
                       <?php if (sizeof($categorias) == 0) { ?> 
                                <option value="9999999">
                                    NO EXISTEN CATEGORIAS DISPONIBLES
                                </option>
                                <?php
                            } else {
                                foreach ($categorias as $key => $value) {
                                    ?>                           
                                    <option value="<?php echo $key ?>">
                                        <?php echo $value ?>
                                    </option>
                                <?php
                                }
                            }
                            ?>
                            <option value="1500">
                                CREAR CATEGORIA
                            </option>
                        </select> 
                    </td> 
                </tr>      
            </table>
        </fieldset>     
    </form>       
        <button class="buscarButton" style="float: left;height: 40px; margin-left: 5%" id="finish">Crear producto</button>          
    <div id="loader" style="float: left;margin-left: auto; margin-right: auto; display: none">
        <img src="images/ajax-loader.gif"/> Procesando...        
    </div>
    <div style="clear: both"></div>    
</div> 
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>     
    var defaultcat='<?php echo $selected;?>';
    function updateSelect(idnuevo,nombrenuevo){
        $("#categorias").append("<option value='"+idnuevo+"'>"+nombrenuevo+"</option>");
        $("#categorias").val(""+idnuevo+"");
    }
    function message(mensaje,imagen){
        //parent.$.fancybox.close(); 
        $("#titlemesagge",window.parent.document).html("<strong>"+mensaje+"<strong/>");
        $("#iconmesagge",window.parent.document).html(" <img src='"+imagen+"'/>");       
        $("#barraf",window.parent.document).slideDown(1000).delay(3000).fadeIn(400);
        $("#barraf",window.parent.document).slideUp(1000).fadeOut(400);  
    }
    
    $(document).ready(function(){
        $("#categorias").val("<?php echo $selected;?>");
        $("#categorias").change(function(){
            if($("#categorias").val()==1500){          
                var j1 = document.getElementById("hiddenclicker");
                j1.href = "index.php?controlador=Products&accion=createCategory";
                $('#hiddenclicker').trigger('click');
            }    
        });    
        $("a.overlay-flash").fancybox({
            'autoDimensions': false,
            'width': 600,
            'height': 190,
            'autoScale': false,
            'transitionIn': 'elastic',
            'transitionOut': 'fade',
            'speedIn': 500,
            'type': 'iframe',
            'hideOnOverlayClick': false,            
            'overlayColor': '#000',
            'margin': 15,
            'padding': 5
        });     
        
        $('#finish').click(function() {
            $('#formProduct').ajaxForm({
                dataType: 'json',
                beforeSubmit: function() {
                    $('#finish').attr('disabled', 'disabled');
                    $("#finish").addClass("buscarButtonDis");
                    $("#finish").removeClass("buscarButton");
                    $('#loader').css('display', 'block');
                    if ($("#categorias").val() == "9999999") {
                        $('#loader').css('display', 'none');
                        $('#finish').removeAttr('disabled');
                        $("#finish").addClass("buscarButton");
                        $("#finish").removeClass("buscarButtonDis");
                        parent.message('Debe seleccionar o crear una categoria para crear el producto', 'images/iconos_alerta/error.png');
                        return false;
                    } else {
                        if (validates("formProduct")) {                            
                                return true;                            
                        } else {
                            $('#loader').css('display', 'none');
                            $('#finish').removeAttr('disabled');
                            $("#finish").addClass("buscarButton");
                            $("#finish").removeClass("buscarButtonDis");
                            return false;
                        }
                    }
                },
                uploadProgress: function(event, position, total, percentComplete) {
                },
                success: function(responseText) {
                    $('#loader').css('display', 'none');
                    $('#finish').removeAttr('disabled');
                    if (responseText.respuesta == 'si') {
                        parent.message('Se ha creado un nuevo producto', 'images/iconos_alerta/ok.png');
                        parent.createdataDet(responseText.id,
                        responseText.nombre,
                        responseText.referencia,
                        responseText.idid,
                        responseText.verify,
                        responseText.unidad);
                       parent.$.fancybox.close();
                    } else if (responseText.respuesta == 'no') {
                        parent.message('No se ha podido crear el producto', 'images/iconos_alerta/error.png');
                        parent.$.fancybox.close();
                    }
                }
            }).submit();

        });
        
        $("#formProduct input").focus(function(){
            $(this).css("background-color","#FFF");
            $(this).nextAll().remove();
        });
    });      		                   
</script>