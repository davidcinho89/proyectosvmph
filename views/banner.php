<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>
<style>
#logoempresa{ max-height: 100px; max-width: 200px;
margin: 0; border-radius: 3px
}    
</style>
<script>
    function ir(idmenu, urlprincipal){
        if(idmenu==7){
            var frameset = parent.document.getElementById("nopos");
            origCols = frameset.cols;
            frameset.cols = "0, *";
            var frameset2 = parent.document.getElementById("sipos");
            origCols = frameset2.cols;
            frameset2.cols = "132, *";
        }else{
            var frameset = parent.document.getElementById("nopos");
            origCols = frameset.cols;
            frameset.cols = "132, *";
            var frameset2 = parent.document.getElementById("sipos");
            origCols = frameset2.cols;
            frameset2.cols = "0, *";
        }
        
        top.contenido.location=urlprincipal;
        top.menu.location="index.php?controlador=Index&accion=Menu&idmenu="+idmenu;
    }   
</script>  
<div style="float: left; margin: 0px 0px 0px 0px; padding-left: 5px;padding-top: 5px;">
    <img id="logoempresa" src="<?php echo $empresa['logoempresa']?>" alt="Logo" />    
</div>
<div style="float: right; margin-right: 20px; font-size: 13px; margin-top: 6px; font-family: Verdana,Arial,Helvetica,sans-serif;color: #358B0C">
    <strong><?php $doc->texto('WELCOME', $nombre) ?></strong>   
    <div style="text-align: right;font-size: 10px; margin-top: 2px; font-family: Verdana,Arial,Helvetica,sans-serif;color: #358B0C">
    <strong>(<?php echo $perfil ?>)</strong>    
    </div>    
</div>
<div style="float: right; margin-right: 20px; clear: right; margin-top: 6px;">
    <form action="index.php" method="get" target="_parent">
        <input type="hidden" name="controlador" value="User"/>
        <input type="hidden" name="accion" value="salir"/>
        <button class="logininputb"><?php $doc->texto('EXIT', $nombre) ?></button> 
    </form>   
</div>
<?php if($menus!=null){?>
<ul id="navigation">
    <?php foreach ($menus as $value) { ?>
        <li class="home">
            <a onclick="ir('<?php echo $value['idmen'] ?>','<?php echo $value['urlprin'] ?>')" style="cursor: pointer;">
                <span><?php echo $value['namemen'] ?></span>
            </a>
        </li> 
    <?php } ?>
</ul>
<?php }?>
<script type="text/javascript">
    $(function() {
        var d=300;
        $('#navigation a').each(function(){
            $(this).stop().animate({
                'marginTop':'-80px'
            },d+=150);
        });

        $('#navigation > li').hover(
        function () {
            $('a',$(this)).stop().animate({
                'marginTop':'-50px'
            },200);
        },
        function () {
            $('a',$(this)).stop().animate({
                'marginTop':'-80px'
            },200);
        }
    );
    });
</script>