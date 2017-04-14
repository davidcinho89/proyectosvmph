<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class DataBase {

    private static $instance;
    private $conexion;
    private $config;

    public function __construct() {

        $this->config = Config::singleton();
        if ($this->config->get('dbtype') == "postgres") {
            $this->conexion = pg_connect("host=" . $this->config->get('dbhost') .
                    " port=" . $this->config->get('dbport') .
                    " dbname=" . $this->config->get('dbname') .
                    " user=" . $this->config->get('dbuser') .
                    " password=" . $this->config->get('dbpass')) or die("No se pudo conectar al servidor de base de datos" . pg_last_error($this->conexion));
        } elseif ($this->config->get('dbtype') == "mysql") {
            $this->conexion = mysql_connect($this->config->get('dbhost'), $this->config->get('dbuser'), $this->config->get('dbpass')) or die("no se pudo conectar al servidor de base de datos");
            mysql_select_db($this->config->get('dbname'), $this->conexion) or die("no se ha encontrado la base de datos" . mysql_error());
        }
    }
    
    function startTransaction() {
        pg_query($this->conexion,"BEGIN");
    }
    
    function commitTransaction() {
        pg_query($this->conexion,"COMMIT");
    }
    
    function rollbackTransaction() {
        pg_query($this->conexion,"ROLLBACK");
    }

    function executeQue($query) {
        $rs = null;
        $tiempo1=0;
        $tiempo2=0;
        if ($this->config->get('dbtype') == "postgres") {
            $tiempo1=microtime();
            $rs = pg_query($this->conexion, $query);            
            if ($rs===false) {
                if($this->config->get('logs')){
                    $accion=isset($_GET['accion'])?$_GET['accion']:"main";
                   // $postvar=json_encode(utf8_encode($_POST[]));
                   // $getvar=json_encode(utf8_encode($_GET[]));
                   /* error_log("\n\n" . "Fecha y hora: " . date("Y-m-d H:i:s") . " \n", 3, LOGDB);
                    error_log("Ruta: " . CONTROLLERS . DS . $_GET['controlador'] . 'Controller.php' . " \n", 3, LOGDB);
                    error_log("Controlador: " . $_GET['controlador'] . "Controller \n", 3, LOGDB);*/
                    //error_log("Post: " . $postvar . " \n", 3, LOGDB);
                   // error_log("Get: " . $getvar . " \n", 3, LOGDB);
                   /* error_log("Error en la consulta: " . $query . " \n" . pg_last_error($this->conexion), 3, LOGDB);*/
                }
                return false;
            }
        } elseif ($this->config->get('dbtype') == "mysql") {
            $rs = mysql_query($query, $this->conexion);
            error_log($query . " \n\n\n\n", 3, LOG);
        }
        return $rs;
    }

    function numRows($result) {
        $num = 0;
        if ($this->config->get('dbtype') == "postgres") {
            $num = pg_num_rows($result);
        } elseif ($this->config->get('dbtype') == "mysql") {
            $num = mysql_num_rows($result);
        }
        return $num;
    }

    function arrayResult($result) {
        $array = null;
        if ($this->config->get('dbtype') == "postgres") {
            $array = pg_fetch_assoc($result);
        } elseif ($this->config->get('dbtype') == "mysql") {
            $array = mysql_fetch_assoc($result);
        }
        return $array;
    }

    public static function singleton() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

}

?>