<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Brawl Stars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">

<div class="card p-4 shadow form-card-custom">
    <h1 class="h4 text-center mb-1 text-warning fw-bold">Iniciar Sesión</h1>
    <p class="text-secondary text-center small mb-4">Ingresá a tu cuenta de Brawl Stars</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger py-2 small text-center">
            <?php 
                if ($_GET['error'] == 'no_existe') {
                    echo "El usuario no está registrado.";
                } else {
                    echo "Contraseña incorrecta.";
                }
            ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div class="mb-3">
            <label class="form-label small">Usuario</label>
            <input type="text" name="usuario" class="form-control bg-dark text-white border-secondary" placeholder="Tu usuario" required>
        </div>

        <div class="mb-4">
            <label class="form-label small">Contraseña</label>
            <input type="password" name="clave" class="form-control bg-dark text-white border-secondary" placeholder="Tu contraseña" required>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold text-dark mb-2">Entrar</button>
        <a href="registro.php" class="btn btn-outline-light w-100 btn-sm mb-2">Crear cuenta nueva</a>
        <a href="index.php" class="btn btn-link text-secondary w-100 btn-sm text-decoration-none">← Volver al inicio</a>
    </form>
</div>

</body>
</html>