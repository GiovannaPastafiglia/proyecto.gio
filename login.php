<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login_form.php");
    exit;
}

$usuario = trim($_POST["usuario"] ?? "");
$clave = $_POST["clave"] ?? "";

// Consultamos en la tabla 'inscripiones'
$consulta = $conexion->prepare(
    "SELECT usuario, contraseña, rol FROM inscripiones WHERE usuario = ?"
);
$consulta->execute([$usuario]);
$fila = $consulta->fetch();

// Verificamos si el usuario existe en la base de datos
if (!$fila) {
    // El usuario no existe en la BD
    header("Location: login_form.php?error=no_existe");
    exit;
}

// Verificamos si la contraseña coincide con el hash almacenado
if (password_verify($clave, $fila["contraseña"])) {
    // Contraseña correcta: creamos la sesión
    $_SESSION["usuario"] = $fila["usuario"];
    $_SESSION["rol"] = $fila["rol"];

    header("Location: panel.php");
    exit;
} else {
    // Contraseña incorrecta
    header("Location: login_form.php?error=clave_incorrecta");
    exit;
}
?>