<?php
session_start();
require_once('cone.php');
$conect = new basedatos;
$conect->conectarBD();

if (isset($_POST['codigo']) && isset($_SESSION['template_id'])) {
    $codigo = $_POST['codigo'];
    $user_id = $_SESSION['template_id'];

    // Verificar el código en la base de datos
    $stmt = $conect->conectarBD()->prepare("SELECT codigo_verificacion, codigo_expiracion FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($codigo_verificacion, $codigo_expiracion);
    $stmt->fetch();
    $stmt->close();

    if ($codigo == $codigo_verificacion && strtotime($codigo_expiracion) > time()) {
        // Código válido, redirigir al sistema
        header("Location: view/index.php");
    } else {
        echo "Código incorrecto o expirado.";
    }
}
?>