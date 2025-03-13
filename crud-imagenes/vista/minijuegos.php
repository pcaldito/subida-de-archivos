<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Minijuegos</title>
</head>
<body>
    <h2>Lista de Minijuegos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['idjuego']; ?> </td>
                <td><?php echo $fila['nombre']; ?> </td>
                <td><?php echo $fila['imagen']; ?> <a href="anadirImagen.php?idjuego=<?php echo $fila['idjuego']; ?>">Añadir</a> | <a href="verImagen.php?idjuego=<?php echo $fila['idjuego']; ?>">Ver</a> |
                <a href="eliminarImagen.php?idjuego=<?php echo $fila['idjuego']; ?>">Eliminar</a> |</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
