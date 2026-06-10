<?php
require_once '../../config/db.php';
require_once '../../classes/Database.php';
require_once '../../classes/Utilizador.php';
require_once '../../classes/Receita.php';

Utilizador::protegerPagina();

$id = (int)($_GET['id'] ?? 0);
$receitaObj = new Receita();
$receita = $receitaObj->obterPorId($id);

if (!$receita) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/receitas.php");
    exit;
}

$sucesso = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'titulo'      => $_POST['titulo'] ?? '',
        'descricao'   => $_POST['descricao'] ?? '',
        'tempo'       => $_POST['tempo'] ?? '',
        'dificuldade' => $_POST['dificuldade'] ?? 'Fácil',
        'porcoes'     => $_POST['porcoes'] ?? 1,
    ];
    if ($receitaObj->atualizar($id, $dados)) {
        $sucesso = "Receita atualizada com sucesso!";
        $receita = $receitaObj->obterPorId($id);
    } else {
        $erro = "Erro ao atualizar receita.";
    }
}
?>

<?php require_once '../../componentes/header.php'; ?>

<main>
<div class="container my-5">
    <div class="col-md-8 mx-auto">
        <div class="form-card">
            <h4 class="titulo-formulario">Editar Receita</h4>

            <?php if ($sucesso): ?>
                <div class="alert alert-success"><?= $sucesso ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" 
                           value="<?= htmlspecialchars($receita['titulo']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3" required><?= htmlspecialchars($receita['descricao']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Tempo</label>
                    <input type="text" name="tempo" class="form-control" 
                           value="<?= htmlspecialchars($receita['tempo']) ?>">
                </div>
                <div class="mb-3">
                    <label>Dificuldade</label>
                    <select name="dificuldade" class="form-control">
                        <option <?= $receita['dificuldade'] == 'Fácil' ? 'selected' : '' ?>>Fácil</option>
                        <option <?= $receita['dificuldade'] == 'Intermédio' ? 'selected' : '' ?>>Intermédio</option>
                        <option <?= $receita['dificuldade'] == 'Avançado' ? 'selected' : '' ?>>Avançado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Porções</label>
                    <input type="number" name="porcoes" class="form-control" 
                           value="<?= $receita['porcoes'] ?>">
                </div>
                <button type="submit" class="btn btn-enviar">Guardar alterações</button>
                <a href="<?= BASE_URL ?>Pages/receitas.php" class="btn btn-secondary mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</main>

<?php require_once '../../componentes/footer.php'; ?>