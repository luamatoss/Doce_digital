<?php 
require_once '../classes/Database.php';
require_once '../classes/Utilizador.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $utilizador = new Utilizador();
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($utilizador->registar($nome, $email, $password)) {
        header("Location: login.php");
        exit;
    } else {
        $erro = "Email já existe ou erro ao registar.";
    }
}
?>

<?php require_once '../componentes/header.php'; ?>

<form method="POST">

    <!-- Campo Nome -->
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>

    <div class="mb-3">
    <label ="exampleInputEmail1" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <?php if ($erro != '') { ?>
    <div class="alert alert-danger"><?= $erro ?></div>
<?php } ?>
  <button type="submit" class="btn btn-primary">Submeter</button>
</form>


<?php require_once '../componentes/footer.php'; ?>

