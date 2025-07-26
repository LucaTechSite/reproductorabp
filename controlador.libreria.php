<?php

require_once('vista.libreria.php');

class Controlador
{
    protected $vista;

    function __construct(){
        $this->vista = new Vista();
    }

}

?>