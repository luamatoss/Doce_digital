<?php
require_once '../config/db.php';
require_once '../classes/Database.php';
require_once '../classes/Utilizador.php';

Utilizador::protegerPagina();

$id = (int)($_GET['id'] ?? 0);
$id_receita = (int)($_GET['id_receita'] ?? 0);

if ($id) {
    $db = Database::obterLigacao();
    $stmt = $db->prepare("DELETE FROM comentarios WHERE id = ? AND id_utilizador = ?");
    $stmt->execute([$id, $_SESSION['user_id']]);
}

header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/receita_detalhe.php?id=" . $id_receita);
exit;