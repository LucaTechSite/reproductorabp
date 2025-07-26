<?php

require_once('controlador.libreria.php');

class Inicio_Controlador extends Controlador{

    function __construct(){
        // echo '<p>Inicio_Controlador</p>';
        parent::__construct();
    }

    function renderizar(){
      
        $arr_vista = [];
        $this->vista->plantilla(null,'inicio', $arr_vista);
    }




}

?>