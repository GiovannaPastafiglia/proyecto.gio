<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== 'admin') {
    header("Location: panel.php");
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: admin_usuarios.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nuevo_usuario = trim($_POST['usuario']);
    $nuevo_mail = trim($_POST['mail']);
    $nuevo_rol = $_POST['rol'];

    $update = $conexion->prepare("UPDATE inscripiones SET usuario = ?, mail = ?, rol = ? WHERE id = ?");
    $update->execute([$nuevo_usuario, $nuevo_mail, $nuevo_rol, $id]);
    header("Location: admin_usuarios.php");
    exit;
}

$stmt = $conexion->prepare("SELECT * FROM inscripiones WHERE id = ?");
$stmt->execute([$id]);
$u = $stmt->fetch();
if (!$u) {
    header("Location: admin_usuarios.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow form-card-custom">
        <h3 class="mb-3 text-warning">Editar Usuario</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label small">Nombre de Usuario</label>
                <input type="text" name="usuario" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($u['usuario']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label small">Correo Electrónico</label>
                <input type="email" name="mail" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($u['mail']) ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label small">Rol del Usuario</label>
                <select name="rol" class="form-control bg-dark text-white border-secondary">
                    <option value="usuario" <?= $u['rol'] === 'usuario' ? 'selected' : '' ?>>Usuario</option>
                    <option value="admin" <?= $u['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning w-100 fw-bold text-dark mb-2">Guardar Cambios</button>
            <a href="admin_usuarios.php" class="btn btn-outline-light w-100 btn-sm">Cancelar</a>
        </form>
    </div>
</body>
</html>