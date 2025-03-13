<?php
    // Conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'minijuegos');

    // Comprobar conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombreJuego = $_POST['nombre']; 
        $nombreImagen = $_FILES['imagen']['name'];    
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $tamaño = $_FILES['imagen']['size'];
        $tipo = mime_content_type($rutaTemporal);

        $carpeta = 'archivos/';
        $rutaFinal = $carpeta . $nombreImagen;

        $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $tamañoMaximo = 2 * 1024 * 1024;
        $extension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));

        // Validar extensión
        if (!in_array($extension, $extensionesPermitidas)) {
            echo "Error: Solo se permiten archivos JPG, JPEG, PNG o GIF.";
            exit;
        }

        // Validar tipo MIME
        if (strpos($tipo, 'image/') !== 0) {
            echo "Error: El archivo no es una imagen válida.";
            exit;
        }

        // Validar tamaño
        if ($tamaño > $tamañoMaximo) {
            echo "Error: El archivo supera los 2MB permitidos.";
            exit;
        }

        // Mover imagen al servidor
        if (move_uploaded_file($rutaTemporal, $rutaFinal)) {

            // Actualizar la imagen del minijuego en la base de datos
            $consulta = "UPDATE minijuegos SET imagen = '$nombreImagen' WHERE nombre = '$nombreJuego'";

            if ($conexion->query($consulta) === TRUE) {
                echo "<p>Imagen actualizada correctamente para el minijuego: <strong>$nombreJuego</strong></p>";
                echo '<img src="' . $rutaFinal . '" width="300">';
            } else {
                echo "Error al actualizar en la base de datos: " . $conexion->error;
            }

        } else {
            echo "Error al subir la imagen.";
        }
    }

    echo "<br/><br/>";
    echo '<p><a href="index.html">Regresar</a></p>';

    // Cerrar conexión
    $conexion->close();
?>
