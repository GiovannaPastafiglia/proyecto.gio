<?php
session_start();

// Guardia corregida: verificamos si existe la sesión de usuario
if (!isset($_SESSION["usuario"])) {
    header("Location: login_form.php");
    exit;
}

$esAdmin = (isset($_SESSION["rol"]) && $_SESSION["rol"] === 'admin');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Brawl Stars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <nav class="navbar navbar-dark bg-black px-4">
        <span class="navbar-brand mb-0 h1 text-warning">Panel de Control</span>
        <div>
            <a href="index.php" class="btn btn-outline-warning btn-sm me-2">Ir al Inicio</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Salir</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card bg-secondary text-white shadow-sm border-0">
            <div class="card-body p-4">
                <h1 class="h4">¡Hola, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h1>
                <p class="text-light">Estás conectado correctamente a la plataforma de Brawl Stars.</p>

                <?php if ($esAdmin): ?>
                    <hr class="border-light">
                    <div class="alert alert-warning text-dark">
                        <strong>Modo Administrador activado:</strong> Tenés permisos para gestionar cuentas de usuarios.
                    </div>
                    <a href="admin_usuarios.php" class="btn btn-warning fw-bold text-dark">Gestionar Usuarios</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>