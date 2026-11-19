<?php
session_start();
$sesionIniciada = isset($_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brawl Stars - Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="index.php">BRAWL STARS</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#desarrollo">Desarrollo del juego</a>
                    </li>

                    <?php if ($sesionIniciada): ?>
                        <li class="nav-item">
                            <a class="nav-link text-warning fw-bold" href="panel.php">Mi panel</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="logout.php" class="btn btn-danger btn-sm px-3 py-2">Cerrar sesión</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login_form.php">Iniciar sesión</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="registro.php" class="btn btn-warning btn-sm fw-bold px-3 py-2 text-dark" style="border-radius: 6px;">Registrarse</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECCIÓN DE INICIO -->
    <section id="inicio" class="container hero-section">
        <div class="row align-items-center hero-banner-box p-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <p class="text-uppercase text-warning fw-bold mb-2" style="font-size: 13px; letter-spacing: 1px;">TU PRÓXIMA AVENTURA EMPIEZA ACÁ</p>
                <h1 class="display-5 fw-bold mb-3">Descubrí el universo de Brawl Stars</h1>
                <p class="text-secondary mb-4">Explorá los modos de juego y unite a la comunidad registrándote.</p>
                <a href="#desarrollo" class="btn btn-primary px-4 py-2 fw-semibold" style="background-color: #0070f3; border: none;">Ver modos de juego</a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://tarjetadirecta.es/cdn-cgi/imagedelivery/Pk8Ky-xDyeK8TLUvfplArQ/7/ac7a2182-b4a3-47a4-a436-2966a4f2a8aa-Banner_productpagina.png/public" 
                    alt="Brawl Stars Banner" 
                    class="img-fluid rounded shadow hero-img-custom">
            </div>
        </div>
    </section>

    <!-- SECCIÓN DESARROLLO DEL JUEGO -->
    <section id="desarrollo" class="container my-5 pb-5">
        <div class="mb-4">
            <h2 class="fw-bold fs-3">Desarrollo del juego</h2>
            <p class="text-secondary">Conocé los modos de juego disponibles en esta plataforma.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToCya6KKzOZL1DEOSQUNRSghJ21wHVFW_s_jjGnC3hZEz5w4huXjQ5tW63&s=10" class="card-img-top" alt="Atrapajemas">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Atrapajemas</h5>
                        <p class="text-secondary small mb-3">Batallas 3v3 llenas de estrategia para recolectar y mantener 10 gemas.</p>
                        <span class="fw-bold text-warning">Multijugador</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXQyeZXhP9ez3vgTuApbTrZUIt6wefdFaGUyparymKPw&s=10" class="card-img-top" alt="Supervivencia">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Supervivencia</h5>
                        <p class="text-secondary small mb-3">Un battle royale en solitario o en pareja. ¡Cajas sorpresa y veneno letal!</p>
                        <span class="fw-bold text-warning">Battle Royale</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9pVadqEyjo05iInOY950sY41JOsXpVDeb_pywzIU5oQCl7DCDusy-O9M&s=10" class="card-img-top" alt="Balón Brawl">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Balón Brawl</h5>
                        <p class="text-secondary small mb-3">Fútbol con disparos y súper habilidades. ¡Meté dos goles para ganar!</p>
                        <span class="fw-bold text-warning">Deportes / Acción</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSe5zaNUlJm6iA0QIC7hDZg5iWwEsHBBy0TVMcOahdqbq9KJtyv65mOwA&s=10" class="card-img-top" alt="Caza Estelar">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Caza Estelar</h5>
                        <p class="text-secondary small mb-3">Eliminá rivales para conseguir estrellas y liderar el marcador de tu equipo.</p>
                        <span class="fw-bold text-warning">Eliminación</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm">
                    <img src="https://supercell.com/images/8aecb6a563472e69d488e04d0aead3d8/BS_SUBWAY_SURFERS_FINAL__1_.png" class="card-img-top" alt="Noqueo">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Noqueo</h5>
                        <p class="text-secondary small mb-3">Partidas al mejor de tres rondas sin reaparición. ¡Sobreviví con tu equipo!</p>
                        <span class="fw-bold text-warning">Táctico</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm">
                    <img src="https://album.mediaset.es/eimg/2025/11/11/1griff-1-jpg-16-9-aspect-ratio-default-0_da39.jpg" class="card-img-top" alt="Asalto">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Asalto</h5>
                        <p class="text-secondary small mb-3">Atacá la caja fuerte del enemigo mientras defendés la tuya en equipo.</p>
                        <span class="fw-bold text-warning">Estrategia</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>