<?php defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>'); ?>
<div class="container" style="margin-bottom: 20px; margin-top: 15px"> 
    <table>
    <tr>
        <td style="width: 116px">
            <strong>Perfil seleccionado:</strong>
        </td>
         <td>
           <?php echo $profile['nombre'] ?>
        </td>
    </tr>
    <tr>
                    <td colspan="2" style="font-size: small">
                        A continuaci&oacute;n seleccione los modulos a los que podra tener acceso el perfil seleccionado.
                    </td>              
                </tr>
</table>
    <form action="POST" method="#" id="formpermissions987934">
        <?php
        foreach ($menus as $key => $value) {
            if (!(($key == 'Usuarios' || $key == 'Inventario' || $key == 'Reportes' || $key == 'caja') && ($profile['grupo'] == 'Vinculado' || $profile['grupo'] == 'No vinculado'))) {
                if (!(($key == 'Oficina Personal' || $key == 'caja') && ($profile['grupo'] == 'Superadministrador'))) {
                    if (!(($key == 'caja' || $key == 'Usuarios') && ($profile['grupo'] == 'Administrador'))) {
                        if (!(($key == 'Oficina Personal' || $key == 'Usuarios') && ($group == 'Cajero'))) {
                        ?>
                        <div style="width: 98%;">
                            <fieldset class="colorleyend" style="width: 100%;">
                                <legend class="colorleyendinto"><?php echo $key; ?></legend>
                                <table class="table" border="0" cellspacing="0" cellpadding="3" style="width: 90%;margin: 0 auto;">        
                                    <tr class="headall">    
                                        <th class="headinit">icono</th> 
                                        <th class="head">Nombre del menu</th>
                                        <th class="head">Habilitado</th>                                    
                                    </tr>      
                                    <?php $estilo = 1;
                                    foreach ($value as $value2) { ?>
                                        <tr class="class<?php echo $estilo; ?>">   
                                            <th class="init" style="text-align: center;width: 105px;">
                                                <img src="<?php echo $value2['iconsub']; ?>" height="45"/>
                                            </th>
                                            <th class="item" style="text-align: left;padding-left: 10px"> 
                                                <?php echo $value2['nombresub']; ?>
                                            </th>
                                            <th class="item" style="text-align: center;width: 99px;">
                                                <?php if ($value2['permiso'] == 1) { ?>
                                                    <input type="checkbox" name="permission<?php echo $value2['idsub']; ?>" value="<?php echo $value2['idsub']; ?>" checked=""/>
                                                <?php } else if ($value2['permiso'] == 0) { ?>
                                                    <input type="checkbox" name="permission<?php echo $value2['idsub']; ?>" value="<?php echo $value2['idsub']; ?>"/>
                                                <?php } ?>
                                            </th>                               
                                        </tr>
                                        <?php
                                        if ($estilo == 1) {
                                            $estilo = 2;
                                        } else {
                                            $estilo = 1;
                                        }
                                    }
                                    ?> 
                                </table>  
                            </fieldset>
                        </div>  
                        <?php
                    }
                }
            }
        }
        }
        ?>
        <input id="verification" type="hidden" name="verification" value="<?php echo strrev(urlencode(base64_encode($profile['id']))) ?>"/>
        <input type="hidden" name="formid" id="formid" value="<?php echo sha1(987934) ?>"/>
    </form>
    <button class="buscarButton" style="float: left;height: 40px; margin-left: 5%" id="finish">Editar permisos</button>          
    <div id="loader" style="float: left;margin-left: auto; margin-right: auto; display: none">
        <img src="images/ajax-loader.gif"/> Procesando...        
    </div>
    <div style="clear: both"></div>    
</div> 

<script>
    $(document).ready(function() { 
        $('#finish').click(function() { 
            $('#finish').attr('disabled', 'disabled');
            $("#finish").addClass("buscarButtonDis");
            $("#finish").removeClass("buscarButton");
            $('#loader').css('display', 'block');    
            var $inputt = $('#formpermissions987934 :input[type=checkbox]'); 
            var verification= $('#verification').val();
            var fomi= $('#formid').val();
            $inputt.each(function() {             
                if($(this).is(':checked')){  
                    var subII= $(this).val();
                    var valu= 1;
                    var values={idveri: verification, subitem:subII, newval:valu, fomid: fomi};            
                    $.ajax({                
                        type: "POST",
                        async:false,
                        dataType: "json",               
                        url: "index.php?controlador=Profiles&accion=addSubMenu",
                        data: values,
                        success: function( response ) 
                        {                                
                        },
                        error: function( error ){
                            alert( error );
                        }
                    });    
                }else{
                    var subII= $(this).val();
                    var valu= 0;
                    var values={idveri: verification, subitem:subII, newval:valu, fomid: fomi};            
                    $.ajax({                
                        type: "POST",
                        async:false,
                        dataType: "json",               
                        url: "index.php?controlador=Profiles&accion=delSubMenu",
                        data: values,
                        success: function( response ) 
                        {                                
                        },
                        error: function( error ){
                            alert( error );
                        }
                    }); 
                }
            });
            $('#loader').css('display', 'none');
            $('#finish').removeAttr('disabled');
            $("#finish").addClass("buscarButton");
            $("#finish").removeClass("buscarButtonDis");
            parent.message("Se ha actualizado el perfil","images/iconos_alerta/ok.png");
            parent.$.fancybox.close();
        });        
    });
</script>