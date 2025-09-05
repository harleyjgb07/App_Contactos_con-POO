<h2>Agregar Contacto</h2>
<?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>
<form method="POST" action="index.php?action=agregar">
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="text" name="telefono" placeholder="Teléfono" required><br>
    <input type="email" name="email" placeholder="Correo" required><br>
    <button type="submit">Guardar</button>
</form>
<p><a href="index.php?action=contactos">Volver</a></p>
