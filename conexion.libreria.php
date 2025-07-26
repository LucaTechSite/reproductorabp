<?php 

class Conexion{

    private $pdo = null;
    private $host = 'mysql-sitehostlc.alwaysdata.net';
    private $basededatos = 'sitehostlc_bdreproductorabp';
    private $user = '409025_abp';
    private $password = "p@ssabp25";
    private $charset  = 'utf8mb4';



public function getConexion(){
    
    $cadena_conexion = "mysql:host=".$this->host.";dbname=".$this->basededatos.";charset=".$this->charset;
    $opciones = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"];

    try{
        $pdo = new PDO($cadena_conexion, $this->user, $this->password, $opciones);
        return $pdo;
    } catch(PDOException $e){
        die("ERROR: ".$e->getMessage());
    }
}

}

?>