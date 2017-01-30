<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
?>   
<div class="container" style="margin-bottom: 20px; margin-top: 10px; width: 96% !important">
        <div id="fancybox-title" class="fancybox-title-float" style="left: 465px; display: block; z-index: 50"><table cellspacing="0" cellpadding="0" id="fancybox-title-float-wrap"><tbody><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">Reporte de ventas anuales</td><td id="fancybox-title-float-right"></td></tr></tbody></table></div>                   
            <div id="tabs">
                <ul>                    
                    <li><a class="tabref2" href="#tabs-2" rel="index.php?controlador=Reportyear&accion=productyear">Producto</a></li>          
                    <li><a class="tabref3" href="#tabs-3" rel="index.php?controlador=Reportyear&accion=productyearToneladas">Producto (Toneladas)</a></li>  
                    <li><a class="tabref4" href="#tabs-4" rel="index.php?controlador=Reportyear&accion=productyeargeneral">Productos (General)</a></li>                      
                    <li><a class="tabref" href="#tabs-1" rel="index.php?controlador=Reportyear&accion=general">General</a></li>  
                    
                </ul>
                <div id="tabs-1" >
                </div>

                <div id="tabs-2" class="tabMain">
                </div>

                <div id="tabs-3">
                </div>
                
                <div id="tabs-4">
                </div>
            </div> 
        </div>           
<script>
    $(document).ready(function() {
        var $tabs = $('#tabs').tabs();

        //get selected tab
        function getSelectedTabIndex() {
            return $tabs.tabs('option', 'selected');
        }

        //get tab contents
        beginTab = $("#tabs ul li:eq(" + getSelectedTabIndex() + ")").find("a");

        loadTabFrame($(beginTab).attr("href"),$(beginTab).attr("rel"));

        $("a.tabref").click(function() {
            loadTabFrame($(this).attr("href"),$(this).attr("rel"));
        });
        
        $("a.tabref2").click(function() {
            loadTabFrame2($(this).attr("href"),$(this).attr("rel"));
        });
        
        $("a.tabref3").click(function() {
            loadTabFrame3($(this).attr("href"),$(this).attr("rel"));
        });
        
        $("a.tabref4").click(function() {
            loadTabFrame3($(this).attr("href"),$(this).attr("rel"));
        });

        //tab switching function
        function loadTabFrame(tab, url) {
            if ($(tab).find("iframe").length == 0) {
                var html = [];
                html.push('<div class="tabIframeWrapper">');
                html.push('<div class="openout"><a href="' + url + '"></a></div><iframe name="reporte" id="reportero1" class="iframetab" src="' + url + '">Load Failed?</iframe>');
                html.push('</div>');
                $(tab).append(html.join(""));  
                $("#reportero1").load(function() {                    
                    $(this).height( $(this).contents().find("body").height()+150 );
                    $(this).width(3300);
                });
            }
            return false;
        }
        
        function loadTabFrame2(tab, url) {
            if ($(tab).find("iframe").length == 0) {
                var html = [];
                html.push('<div class="tabIframeWrapper">');
                html.push('<div class="openout"><a href="' + url + '"></a></div><iframe id="reportero2" name="reporter" class="iframetab" src="' + url + '">Load Failed?</iframe>');
                html.push('</div>');
                $(tab).append(html.join(""));                 
                $("#reportero2").load(function() {
                    $(this).height( $(this).contents().find("body").height()+150 );
                    $(this).width(3300);
                });                        
            }
            return false;
        }
        
        function loadTabFrame3(tab, url) {
            if ($(tab).find("iframe").length == 0) {
                var html = [];
                html.push('<div class="tabIframeWrapper">');
                html.push('<div class="openout"><a href="' + url + '"></a></div><iframe id="reportero3" name="reporter" class="iframetab" src="' + url + '">Load Failed?</iframe>');
                html.push('</div>');
                $(tab).append(html.join(""));                 
                $("#reportero3").load(function() {
                    $(this).height( $(this).contents().find("body").height()+150 );
                    $(this).width(3300);
                });                        
            }
            return false;
        }
        
        function loadTabFrame4(tab, url) {
            if ($(tab).find("iframe").length == 0) {
                var html = [];
                html.push('<div class="tabIframeWrapper">');
                html.push('<div class="openout"><a href="' + url + '"></a></div><iframe id="reportero4" name="reporter" class="iframetab" src="' + url + '">Load Failed?</iframe>');
                html.push('</div>');
                $(tab).append(html.join(""));                 
                $("#reportero4").load(function() {
                    $(this).height( $(this).contents().find("body").height()+150 );
                    $(this).width(3300);
                });                        
            }
            return false;
        }
    });
</script>