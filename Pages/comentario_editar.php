<?php
require_once '../config/db.php';
require_once '../classes/Database.php';
require_once '../classes/Utilizador.php';

Utilizador::protegerPagina();

$id = (int)($_GET['id'] ?? 0);
$id_receita = (int)($_GET['id_receita'] ?? 0);

$db = Database::obterLigacao();

// Buscar comentário
$stmt = $db->prepare("SELECT * FROM comentarios WHERE id = ? AND id_utilizador = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$comentario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$comentario) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/receitas.php");
    exit;
}

$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = trim($_POST['mensagem'] ?? '');
    if ($mensagem) {
        $stmt = $db->prepare("UPDATE comentarios SET mensagem = ? WHERE id = ? AND id_utilizador = ?");
        $stmt->execute([htmlspecialchars($mensagem), $id, $_SESSION['user_id']]);
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/receita_detalhe.php?id=" . $id_receita);
        exit;
    }
}
?>

<?php require_once '../componentes/header.php'; ?>

<main>
<div class="container my-5">
    <div class="col-md-8 mx-auto">
        <div class="form-card">
            <h4 class="titulo-formulario">Editar Comentário</h4>
            <form method="POST">
                <div class="mb-3">
                    <label>Comentário</label>
                    <textarea name="mensagem" class="form-control" rows="4"><?= htmlspecialchars($comentario['mensagem']) ?></textarea>
                </div>
                <button type="submit" class="btn btn-enviar">Guardar</button>
                <a href="<?= BASE_URL ?>Pages/receita_detalhe.php?id=<?= $id_receita ?>" 
                   class="btn btn-secondary mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</main>

<?php require_once '../componentes/footer.php'; ?>