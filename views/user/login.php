<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<style>
    body{background-image: url("images/Page-BgGradient.png");   
        
    }
    .ingreso{ border: 1px solid #D5D6D6; border-radius: 5px; background: url("images/tablabg.png") #fff; width: 402px; height: 302px; 
    background-repeat: no-repeat; text-align: center; font-family: arial
    }
    .ingreso input{background-image: url("images/inputbg.png"); }
    input[type="text"], input[type="password"]{height: 46px !important;
    width: 277px !important;
    background-repeat: no-repeat; font-size: 24px; color: #444444;
    opacity: 0.8
    }
    #ingresoimg{ text-align: center}
    #ingresoimg img { margin:  -6px 0 0 0 !important}
    #formlogin{ padding-top: 50px }
     #formulario{  margin-left: auto;
    margin-right: auto;
    width: 600px;} 
     #logoempresa{ height: 100px;
    margin-left: auto;
    margin-right: auto;
    width: 200px;
    margin-bottom: 10px}
    #logoempresa img{ border-radius: 5px}
    .aliasycod{ padding: 0 150px 0 0; color: #b5b5b5}
    select:hover, select:focus, textarea:hover, textarea:focus, input:hover, input:focus{
     background-color: #D65D3A !important;
    border: 1px solid #D65D3A !important;       
    }
</style>
<script>
    $(document).ready(function(){
        $("#various3").fancybox({
            'width'                : 1200,
            'height'               : 500,
            'autoScale'            : false,
            'transitionIn'         : 'elastic',
            'transitionOut'        : 'elastic',
            'speedIn'              :  500,
            'type'                 : 'iframe',
            'hideOnOverlayClick'   : false                           
        });
            
        $("#various4").fancybox({
            'width'                : 600,
            'height'               : 220,
            'autoScale'            : false,
            'transitionIn'         : 'elastic',
            'transitionOut'        : 'elastic',
            'speedIn'              :  500,
            'type'                 : 'iframe',
            'hideOnOverlayClick'   : false                           
        });                      
<?php if ($message != null) { ?>
            message('<?php echo $message ?>','<?php echo $icon_message ?>');
<?php } ?>
    
    });
</script>
<style>
    body{
        overflow: hidden;
    }
</style>
<div id="formulario">  
    <?php $view->startForm("index.php", "formlogin"); ?>   
    <div id="logoempresa" style="height: 75px; text-align: center;"> <img src="<?php  echo $empresa['logoempresa']?>" alt="Logo" /></div>
            <table class="ingreso" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr><td colspan="2" id="ingresoimg"><img src="images/imgingreso.png"></td></tr>
                <tr><td class="aliasycod">Alias o codigo</td></tr>
                <tr>
                    <td>&nbsp;                                            
                         <?php $view->input("user", "text", "Alias o codigo", array('required' => true), array('maxlength' => '20')); ?>                        
                    </td>
                </tr>
                <tr>
                    <td class="aliasycod"><?php $doc->texto('PASSWORD')?>:</td>
                </tr>
                <tr>
                    <td>&nbsp;                        
                        <?php $view->input("pwd", "password", $doc->t('PASSWORD'), array('required' => true), array('maxlength' => '16')); ?>  
                        <?php $view->input("cont", "hidden",'',array(), array('value' =>'User')); ?>  
                        <?php $view->input("act", "hidden", '',array(), array('value' => 'validacion')); ?>  
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <button class="logininputb">Entrar</button>                             
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <a id="various4" title="Reestablecer contrase&ntilde;a" href="index.php?controlador=Novinculado&accion=frmrecordarpass"><?php $doc->texto('REMEMBER_PASSWORD') ?></a>                      
                    </td>
                </tr>                 
            </table>           
        <?php $view->endForm(); ?> 
</div>