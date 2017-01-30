<?php defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');?>
<div id="accordion">
    <h3 style="text-align: center;"><a href="#"><?php echo $tituloMenu; ?></a></h3>
    <div>
        <?php foreach ($submenus as $value) { ?>
            <div style="margin: 20px auto;text-align: center;">
                <a class="p" href="<?php echo $value['urlmenu']?>" target="contenido">
                    <img src="<?php echo $value['icono']?>" alt="<?php echo $value['nombre']?>" />
                </a>
            </div>
        <?php } ?>        
    </div>
</div>
<script>
    $(document).ready(function() {
        $('img').css("border","0");                
    });
    $(window).load(function(){
        $("#accordion").accordion();
    });
</script>