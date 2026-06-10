<?php
require_once '../../config/db.php';
require_once '../../classes/Database.php';
require_once '../../classes/Utilizador.php';
require_once '../../classes/Receita.php';

Utilizador::protegerPagina();

$sucesso = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $receitaObj = new Receita();
    $dados = [
        'titulo'      => $_POST['titulo'] ?? '',
        'descricao'   => $_POST['descricao'] ?? '',
        'imagem'      => $_POST['imagem'] ?? '',
        'tempo'       => $_POST['tempo'] ?? '',
        'dificuldade' => $_POST['dificuldade'] ?? 'Fácil',
        'porcoes'     => $_POST['porcoes'] ?? 1,
    ];
    $id = $receitaObj->criar($dados, $_SESSION['user_id']);
    if ($id) {
        $sucesso = "Receita adicionada com sucesso!";
    } else {
        $erro = "Erro ao adicionar receita.";
    }
}
?>

<?php require_once '../../componentes/header.php'; ?>

<main>
<div class="container my-5">
    <div class="col-md-8 mx-auto">
        <div class="form-card">
            <h4 class="titulo-formulario">Adicionar Receita</h4>

            <?php if ($sucesso): ?>
                <div class="alert alert-success"><?= $sucesso ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Nome da imagem (ex: bolo-chocolate.jpg)</label>
                    <input type="text" name="imagem" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Tempo</label>
                    <input type="text" name="tempo" class="form-control" placeholder="ex: 40 min">
                </div>
                <div class="mb-3">
                    <label>Dificuldade</label>
                    <select name="dificuldade" class="form-control">
                        <option>Fácil</option>
                        <option>Intermédio</option>
                        <option>Avançado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Porções</label>
                    <input type="number" name="porcoes" class="form-control" value="4">
                </div>
                <button type="submit" class="btn btn-enviar">Adicionar Receita</button>
            </form>
        </div>
    </div>
</div>
</main>

<?php require_once '../../componentes/footer.php'; ?>