<h2>Editar Contacto</h2>
<form method="POST" action="index.php?action=editar&id=<?php echo $c['id']; ?>">
    <input type="text" name="nombre" value="<?php echo $c['nombre']; ?>" required><br>
    <input type="text" name="telefono" value="<?php echo $c['telefono']; ?>" required><br>
    <input type="email" name="email" value="<?php echo $c['email']; ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<p><a href="index.php?action=contactos">Volver</a></p>
