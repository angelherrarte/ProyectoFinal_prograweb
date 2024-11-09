<?php
session_start();
if (!isset($_SESSION['template_id'])) {
    header("Location: index.php"); // Redirige al login si no hay sesión
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar Código</title>
</head>
<body>
    <h2>Ingrese el código de verificación enviado a su correo</h2>
    <form method="POST" action="procesar_codigo.php">
        <label for="codigo">Código de verificación:</label>
        <input type="text" id="codigo" name="codigo" required>
        <button type="submit">Verificar</button>
    </form>
</body>
</html>
