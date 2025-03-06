<?php
    // Si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre= $_FILES['imagen']['name'];    
        $ruta = 'archivos/' .$nombre; //indicamos la ruta donde se guardarán los archivos
        //comprueba si ya hay un archivo con el mismo nombre, si lo hay añade un (1)
        if(file_exists($ruta)){
            $extension=pathinfo($nombre,PATHINFO_EXTENSION);
            $nombreBase=basename($nombre,'.' .$extension);
            $ruta='archivos/'.$nombreBase. '(1).'. $extension;
        }
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        echo '<img src="' . $ruta . '">';
    }

    echo "<br/><br/>";
    echo '<p><a href="index.html">Regresar</a></p>';
?>