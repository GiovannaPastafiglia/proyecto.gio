<?php
require_once "conexion.php";

$error = "";
$exito = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST["usuario"] ?? "");
    $mail = trim($_POST["mail"] ?? "");
    $clave = $_POST["clave"] ?? "";
    $clave2 = $_POST["clave2"] ?? "";

    if ($usuario === "" || $mail === "" || $clave === "" || $clave2 === "") {
        $error = "Completá todos los campos.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = "Ingresá un correo válido.";
    } elseif ($clave !== $clave2) {
        $error = "Las contraseñas no coinciden.";
    } elseif (strlen($clave) < 8) {
        $error = "La contraseña debe tener al menos 8 caracteres.";
    } else {
        $busca = $conexion->prepare("SELECT id FROM inscripiones WHERE usuario = ?");
        $busca->execute([$usuario]);

        if ($busca->fetch()) {
            $error = "Ese usuario ya está registrado.";
        } else {
            $hash = password_hash($clave, PASSWORD_DEFAULT);

            $alta = $conexion->prepare(
                "INSERT INTO inscripiones (usuario, contraseña, mail, rol) VALUES (?, ?, ?, 'usuario')"
            );
            $alta->execute([$usuario, $hash, $mail]);

            $exito = "¡Cuenta creada con éxito! Redirigiendo al login...";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta - Brawl Stars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">

<div class="card p-4 shadow form-card-custom">
    <h1 class="h4 text-center mb-4 text-warning fw-bold">Crear cuenta</h1>

    <?php if ($error !== ""): ?>
        <div class="alert alert-danger py-2 small">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <?php if ($exito !== ""): ?>
        <div class="alert alert-success py-2 small">
            <?= htmlspecialchars($exito) ?>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = 'login_form.php';
            }, 2000);
        </script>
    <?php endif; ?>

    <form action="registro.php" method="POST">
        <div class="mb-3">
            <label class="form-label small">Usuario</label>
            <input type="text" name="usuario" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <div class="mb-3">
            <label class="form-label small">Correo electrónico</label>
            <input type="email" name="mail" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <div class="mb-3">
            <label class="form-label small">Contraseña (mínimo 8 caracteres)</label>
            <input type="password" name="clave" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <div class="mb-4">
            <label class="form-label small">Repetir contraseña</label>
            <input type="password" name="clave2" class="form-control bg-dark text-white border-secondary" required>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold text-dark">Registrarme</button>
    </form>

    <hr class="border-secondary">

    <a href="login_form.php" class="btn btn-outline-light btn-sm w-100 mb-2">Ya tengo cuenta</a>
    <a href="index.php" class="btn btn-link text-secondary btn-sm w-100 text-decoration-none">← Volver al inicio</a>
</div>

</body>
</html>