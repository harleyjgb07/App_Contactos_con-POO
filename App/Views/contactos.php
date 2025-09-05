
<h2>Hola <?php echo $_SESSION['usuario_nombre']; ?></h2>
<a href="index.php?action=agregar">Agregar contacto</a> | 
<a href="index.php?action=logout">Cerrar sesión</a>

<h3>Lista de Contactos</h3>

<?php if (empty($lista)): ?>
    <p>Aún no tienes contactos</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($lista as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['nombre']) ?></td>
                <td><?= htmlspecialchars($c['telefono']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td>
                    <a href="index.php?action=editar&id=<?php echo $c['id']; ?>">Editar</a> | 
                    <a href="index.php?action=eliminar&id=<?php echo $c['id']; ?>">Eliminar</a> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>