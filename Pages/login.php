<?php

require_once '../config/db.php';
require_once '../classes/Database.php';
require_once '../classes/Utilizador.php';



$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $utilizador = new Utilizador();
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($utilizador->login($email, $password)) {
      header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/index.php");
        exit;
    } else {
        $erro = "Email ou password incorretos.";
    }
}
?>

<?php require_once '../componentes/header.php';
?>






<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="form-card">
                <h4 class="titulo-formulario">Login</h4>
                <p class="texto-formulario">Entra na tua conta</p>

                <form method="POST">
                    <div class="mb-3">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="email@exemplo.com">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="A tua password">
                    </div>
                    <?php if ($erro != '') { ?>
                        <div class="alert alert-danger"><?= $erro ?></div>
                    <?php } ?>
                    <button type="submit" class="btn btn-enviar">Entrar</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
require_once '../componentes/footer.php'; 


?>
