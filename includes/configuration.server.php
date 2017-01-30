<?php
defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');
$config = Config::singleton();
$config->set('dbtype', 'postgres');
$config->set('dbport', '5432');
$config->set('dbhost', 'localhost'); 
$config->set('dbname', 'gluggnet_software');
$config->set('dbuser', 'gluggnet');
$config->set('dbpass', 'E%-z1XNnl4ml');

$config->set('logs', false);
$config->set('lang', 'es');
$config->set('mail', 'correo@gmail.com');
$config->set('company', 'SOFTWARE VENTAS');
$config->set('direccion', 'DG 1');
$config->set('telefono', '1 000 0000');
$config->set('nit', '000.000.000-0');


$config->set('pointvalue', 1200);
$config->set('minpoints', 122);
$config->set('nivel0', 15);
$config->set('nivel1', 12);
$config->set('nivel2', 7);
$config->set('nivel3', 12);
$config->set('niveln', 4);
date_default_timezone_set('America/Panama');
?>
