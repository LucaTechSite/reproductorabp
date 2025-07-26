<?php

class App
{

    function __construct(){
        // echo '<p>Controlador_App</p>';
        require_once('inicio.controlador.php');
        $controlador = new Inicio_Controlador;
        $controlador->renderizar();
    }
}
?>