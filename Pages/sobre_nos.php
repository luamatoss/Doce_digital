<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simpa Baker</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="../Assets/Imagens/Icones/favicon.png">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- GOOGLE FONTS -->

    <!-- BOOTSTRAP ICONS -->

    <!-- MEU CSS -->
    <link rel="stylesheet" href="../Assets/CSS/style.css">

</head>

<body class="d-flex flex-column min-vh-100">
<?php require_once '../componentes/header.php'; ?>

    <main>

        <section class="sobre-hero container">
            <div class="sobre-texto">
                <h1>O meu livro de receitas <em>especiais</em></h1>
                <p>Este é o meu cantinho doce, onde guardo e partilho receitas que fazem parte da minha história, aquelas que marcaram momentos especiais e que continuam a trazer conforto em cada preparo.</p>
                <p>Simples, prático e sempre disponível.</p>
                <a href="receitas.html" class="btn btn-simpa" style="margin-top:1rem;">Ver Receitas</a>
            </div>
            <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80" alt="Baker" />
        </section>

        <!-- VALORES -->
        <section class="valores">
            <h2>Os Nossos Valores</h2>
            <div class="divider"></div>
            <div class="valores-grid">
                <div class="valor-card">
                    <div class="valor-icon"><i class="fa-solid fa-heart"></i></div>
                    <h3>Com Amor</h3>
                    <p>Cada receita é testada com cuidado e partilhada com genuíno afeto.</p>
                </div>
                <div class="valor-card">
                    <div class="valor-icon"><i class="fa-solid fa-seedling"></i></div>
                    <h3>Ingredientes Simples</h3>
                    <p>Valorizamos o uso de produtos naturais e locais.</p>
                </div>
                <div class="valor-card">
                    <div class="valor-icon"><i class="fa-solid fa-users"></i></div>
                    <h3>Comunidade</h3>
                    <p>Queremos criar uma comunidade calorosa onde todos aprendem e se inspiram mutuamente.</p>
                </div>
            </div>
        </section>

        <!-- NÚMEROS -->
        <section class="numeros">
            <div class="numeros-grid">
                <div class="numero-item">
                    <h3>120+</h3>
                    <p>Receitas publicadas</p>
                </div>
                <div class="numero-item">
                    <h3>50k</h3>
                    <p>Seguidores</p>
                </div>
                <div class="numero-item">
                    <h3>30+</h3>
                    <p>Tutoriais em vídeo</p>
                </div>
                <div class="numero-item">
                    <h3>5★</h3>
                    <p>Avaliação média</p>
                </div>
            </div>
        </section>

        <!-- EQUIPA -->
        <section class="equipa container">
            <h2>A Nossa Equipa</h2>
            <div class="divider"></div>
            <div class="equipa-grid">

                <div class="membro">
                    <img src="../Assets/Imagens/Equipa/jessica.jpg" alt="Jessica" />
                    <h3>Jessica Amorim</h3>
                    <span>Chef de Cozinha, Fundadora</span>
                </div>
                <div class="membro">
                    <img src="../Assets/Imagens/Equipa/Luana.jpg" alt="Luana" />
                    <h3>Luana Valerio</h3>
                    <span>Criadora de Conteúdo, Fundadora</span>
                </div>
            </div>
        </section>


    </main>

    <?php require_once '../componentes/footer.php'; ?>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <!-- MEU JS -->
    <script src="../Assets/JS/main.js"></script>
</body>

</html>