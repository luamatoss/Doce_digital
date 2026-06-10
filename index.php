<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simpa Baker</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="Assets/Imagens/Icones/favicon.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesone - Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Botstrap Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="Assets/CSS/style.css">

</head>


<body class="d-flex flex-column min-vh-100">
<?php require_once 'componentes/header.php'; ?>
    <!-- HEADER -->
   

    <!-- MAIN -->
    <main>
        <!-- HERO -->
        <div class="hero d-flex align-items-center text-white">
            <div class="container text-start">
                <!-- Título principal -->
                <h1 class="fw-bold">O meu livro digital de receitas</h1>
                <!-- Texto -->
                <p>Um espaço doce para revisitar receitas especiais</p>
                <!-- Botao -->
                <a href="receitas.html" class="btn btn-custom mt-3">Ver receitas</a>
            </div>
        </div>

        <!-- CATEGORIAS -->
        <div class="container text-center my-5">

            <!-- Titulo da secçao -->
            <h2 class="section-title">Categorias</h2>
            <div class="section-divider"></div>
            <!-- Grid -->
            <div class="row justify-content-center g-4">

                <!-- Categoria -->
                <div class="col-6 col-md-3">
                    <div class="categoria">
                        <i class="bi bi-cake2"></i>
                        <p>Bolos</p>
                    </div>
                </div>
                <!-- Repeticao -->
                <div class="col-6 col-md-3">
                    <div class="categoria">
                        <i class="bi bi-heart-fill"></i>
                        <p>Recheios</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="categoria">
                        <i class="bi bi-emoji-grin"></i>
                        <p>Sobremesas</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="categoria">
                        <i class="bi bi-cookie"></i>
                        <p>Cookies</p>
                    </div>
                </div>

            </div>
        </div>

    </main>
    <?php require_once 'componentes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <!-- Meu JS -->
    <script src="Assets/JS/main.js"></script>
</body>

</html>