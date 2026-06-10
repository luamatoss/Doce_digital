<?php
require_once '../config/db.php';
require_once '../classes/Database.php';
require_once '../classes/Utilizador.php';

Utilizador::protegerPagina();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_receita    = (int)($_POST['id_receita'] ?? 0);
    $mensagem      = trim($_POST['mensagem'] ?? '');
    $id_utilizador = $_SESSION['user_id'];

    if ($id_receita && $mensagem) {
        $db = Database::obterLigacao();
        $stmt = $db->prepare("INSERT INTO comentarios (id_receita, id_utilizador, mensagem) VALUES (?, ?, ?)");
        $stmt->execute([$id_receita, $id_utilizador, htmlspecialchars($mensagem)]);
    }
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/receita_detalhe.php?id=" . $id_receita);
    exit;
}
?>
