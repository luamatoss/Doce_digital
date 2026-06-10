<?php
require_once '../../config/db.php';
require_once '../../classes/Database.php';
require_once '../../classes/Utilizador.php';
require_once '../../classes/Receita.php';

Utilizador::protegerPagina();

$id = (int)($_GET['id'] ?? 0);

if ($id) {
    $receitaObj = new Receita();
    $receitaObj->eliminar($id);
}

header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/receitas.php");
exit;