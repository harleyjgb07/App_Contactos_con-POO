<h2>Iniciar Sesión</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST" action="index.php?action=login">
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Ingresar</button>
</form>
<p><a href="index.php?action=registro">Registrarse</a></p>
