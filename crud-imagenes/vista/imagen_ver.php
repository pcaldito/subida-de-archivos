<h2>Imagen del Juego:</h2>

<?php if (!empty($resultado['imagen'])): ?>
    <img src="imagenes/<?php echo htmlspecialchars($resultado['imagen']); ?>" alt="Imagen del juego" width="300">
<?php else: ?>
    <p>Este juego no tiene imagen asociada.</p>
<?php endif; ?>

<a href="listaMinijuegos.php">Volver</a>
