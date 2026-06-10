<?php
require_once '../config/db.php';
require_once '../classes/Database.php';
require_once '../classes/Receita.php';
require_once '../classes/Utilizador.php';

$id = (int)($_GET['id'] ?? 0);

if (!$id) {
    header("Location: receitas.php");
    exit;
}

$receitaObj = new Receita();
$receita = $receitaObj->obterPorId($id);

if (!$receita) {
    header("Location: receitas.php");
    exit;
}

$db = Database::obterLigacao();
$stmt = $db->prepare("
    SELECT c.id, c.mensagem, c.criado_em, c.id_utilizador, u.nome
    FROM comentarios c
    JOIN utilizadores u ON c.id_utilizador = u.id
    WHERE c.id_receita = ?
    ORDER BY c.criado_em DESC
");
$stmt->execute([$receita['id']]);
$comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once '../componentes/header.php'; ?>

<main>
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="<?= BASE_URL ?>Assets/Imagens/Receitas/<?= htmlspecialchars($receita['imagem']) ?>" 
                 class="img-fluid rounded" alt="<?= htmlspecialchars($receita['titulo']) ?>">
        </div>
        <div class="col-md-6">
            <h2 class="section-title text-start"><?= htmlspecialchars($receita['titulo']) ?></h2>
            <p><?= htmlspecialchars($receita['descricao']) ?></p>
            <ul>
                <li>⏱ Tempo: <?= htmlspecialchars($receita['tempo']) ?></li>
                <li>👩‍🍳 Dificuldade: <?= htmlspecialchars($receita['dificuldade']) ?></li>
                <li>🍰 Porções: <?= $receita['porcoes'] ?></li>
            </ul>
            <?php if (Utilizador::estaLogado()): ?>
            <div class="mt-3 d-flex gap-2">
                <a href="<?= BASE_URL ?>Pages/admin/editar_receita.php?id=<?= $receita['id'] ?>" 
                   class="btn btn-warning">Editar</a>
                <a href="<?= BASE_URL ?>Pages/admin/apagar_receita.php?id=<?= $receita['id'] ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Tens a certeza que queres apagar esta receita?')">Apagar</a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (!empty($receita['ingredientes'])): ?>
    <div class="mt-5">
        <h3>Ingredientes</h3>
        <ul>
            <?php foreach ($receita['ingredientes'] as $ing): ?>
                <li><?= htmlspecialchars($ing) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="mt-5">
        <h3>Comentários</h3>

        <?php if (!empty($comentarios)): ?>
            <?php foreach ($comentarios as $c): ?>
                <div class="card mb-3 p-3">
                    <strong><?= htmlspecialchars($c['nome']) ?></strong>
                    <small class="text-muted"> — <?= $c['criado_em'] ?></small>
                    <p class="mt-2 mb-0"><?= htmlspecialchars($c['mensagem']) ?></p>
                    <?php if (Utilizador::estaLogado() && $_SESSION['user_id'] == $c['id_utilizador']): ?>
                    <div class="d-flex gap-2 mt-2">
                        <a href="<?= BASE_URL ?>Pages/comentario_editar.php?id=<?= $c['id'] ?>&id_receita=<?= $receita['id'] ?>"
                           class="btn btn-sm btn-warning">Editar</a>
                        <a href="<?= BASE_URL ?>Pages/comentario_apagar.php?id=<?= $c['id'] ?>&id_receita=<?= $receita['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Apagar comentário?')">Apagar</a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Ainda não há comentários.</p>
        <?php endif; ?>

        <?php if (Utilizador::estaLogado()): ?>
        <form method="POST" action="<?= BASE_URL ?>Pages/comentario_adicionar.php">
            <input type="hidden" name="id_receita" value="<?= $receita['id'] ?>">
            <div class="mb-3">
                <textarea name="mensagem" class="form-control" rows="3" 
                          placeholder="Deixa o teu comentário..."></textarea>
            </div>
            <button type="submit" class="btn btn-enviar">Comentar</button>
        </form>
        <?php else: ?>
            <p><a href="<?= BASE_URL ?>Pages/login.php">Faz login</a> para comentar.</p>
        <?php endif; ?>
    </div>

    <div class="mt-3">
        <a href="<?= BASE_URL ?>Pages/receitas.php" class="btn-simpa">← Voltar às receitas</a>
    </div>
</div>
</main>

<?php require_once '../componentes/footer.php'; ?>