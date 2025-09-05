<h2>Confirmar eliminación de contacto</h2>
<p><strong>Nombre:</strong> <?= htmlspecialchars($c['nombre']) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($c['email']) ?></p>
<p><strong>Teléfono:</strong> <?= htmlspecialchars($c['telefono']) ?></p>

<form method="post">
    <button type="submit">Eliminar contacto</button>
    <a href="index.php?action=contactos">Cancelar</a>
</form>