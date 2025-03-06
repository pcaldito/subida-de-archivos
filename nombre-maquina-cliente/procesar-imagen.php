<?php
    // Si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
        $ruta = 'archivos/' . $_FILES['imagen']['name'];
        // Mover la imagen a la ruta especificada
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        // Mostrar la imagen
        echo '<img src="' . $ruta . '">';
    }

    echo "<br/><br/>";
    echo '<a href="index.html">Regresar</a>';
?>