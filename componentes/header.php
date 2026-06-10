<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Utilizador.php';
?>

<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doce Digital</title>

    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>Assets/Imagens/Icones/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>Assets/CSS/style.css">
</head>

<body class="d-flex flex-column min-vh-100">


<header class="text-center">





<!-- Logo -->
<a href="index.php">
   <img class="img-fluid" style="max-width: 160px;" src="<?= BASE_URL ?>Assets/Imagens/Icones/logo_doce_digital.png">
</a>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" data-bs-theme="light">
    <div class="container">
        <!-- Botao mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-center" id="menu">

            <ul class="navbar-nav gap-4">

                <!-- Links -->
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_URL ?>index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?= BASE_URL ?>Pages/sobre_nos.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>Pages/receitas.php">Receitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>Pages/videos.php">Tutoriais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>Pages/receita-da-semana.php">Receita da semana</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>Pages/contactos.php">Contacto</a>
                </li>
                <?php if (Utilizador::estaLogado()) { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>Pages/logout.php">Logout</a>
    </li>
<?php } else { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>Pages/login.php">Login</a>
    </li>
<?php } ?>
            </ul>
        </div>

    </div>
</nav>

</header>