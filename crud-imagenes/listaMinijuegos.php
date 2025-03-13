<?php
    include("controlador/Cminijuegos.php");
    $objC=new CMinijuegos;
    $resultado=$objC->listar_minijuegos();
?>