<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <h1>Subir Imagen del Minijuego</h1>
    <form action="subir.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del minijuego:</label><br><br>
        <input type="text" name="nombre" id="nombre" readonly value="<?php echo htmlspecialchars($resultado['nombre']); ?>" ><br><br>

        <input type="hidden" name="idjuego" value="<?php echo $resultado['idjuego']; ?>">

        <p>El tamaño maximo es 2mb y los tipos permitidos son jpg, jpeg, png, gif</p>
        <label for="imagen">Selecciona la imagen:</label><br><br>
        <input type="file" name="imagen" id="imagen" accept="image/*" required><br><br>

        <input type="submit" value="Subir Imagen">
    </form>
    </body>
</html>