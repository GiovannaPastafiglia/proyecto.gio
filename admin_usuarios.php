<?php
session_start();
require_once "conexion.php";

// Solo permitir si es admin
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== 'admin') {
    header("Location: panel.php");
    exit;
}

// Lógica para Borrar usuario definitivamente
if (isset($_GET['eliminar'])) {
    $id_eliminar = $_GET['eliminar'];
    $stmt = $conexion->prepare("DELETE FROM inscripiones WHERE id = ?");
    $stmt->execute([$id_eliminar]);
    header("Location: admin_usuarios.php");
    exit;
}

// Obtener todos los usuarios de la base de datos
$stmt = $conexion->query("SELECT id, usuario, mail, rol FROM inscripiones");
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <nav class="navbar navbar-dark bg-black px-4">
        <span class="navbar-brand text-warning">Panel de Administración - Brawl Stars</span>
        <div>
            <a href="panel.php" class="btn btn-outline-warning btn-sm me-2">Mi panel</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Salir</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-warning mb-2">Gestión de Usuarios</h2>
        <p class="text-secondary">Desde acá podés ver los usuarios registrados, modificar sus nombres, asignarles rol de administrador o eliminarlos.</p>
        
        <table class="table table-dark table-striped mt-3 align-middle border border-secondary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['usuario']) ?></td>
                    <td><?= htmlspecialchars($u['mail']) ?></td>
                    <td>
                        <!-- Etiqueta visual para distinguir administradores de usuarios comunes -->
                        <span class="badge <?= $u['rol'] === 'admin' ? 'bg-warning text-dark fw-bold' : 'bg-secondary' ?>">
                            <?= ucfirst($u['rol']) ?>
                        </span>
                    </td>
                    <td>
                        <a href="editar_usuario.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-warning fw-bold text-dark me-1">Editar</a>
                        <?php if ($u['usuario'] !== $_SESSION['usuario']): ?>
                            <a href="admin_usuarios.php?eliminar=<?= $u['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás segura de eliminar esta cuenta?')">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>