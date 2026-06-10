<?php
require_once '../config/db.php';
require_once '../classes/Database.php';
require_once '../classes/Receita.php';
require_once '../classes/Utilizador.php';

$receitaObj = new Receita();
$receitas = $receitaObj->listarTodas();
?>

<?php require_once '../componentes/header.php'; ?>

<main>
    <div class="container my-5">
        <div class="page-hero">
            <h1 class="fw-bold">Receitas</h1>
            <div class="divider"></div>
            <p>Descobre receitas deliciosas para todas as ocasiões</p>
        </div>
        <div class="section-divider"></div>

        <input type="text" id="pesquisaReceita" 
               placeholder="Pesquisar por bolo, cookies, brigadeiro..."
               class="form-control mb-4">

               <?php if (Utilizador::estaLogado()): ?>
    <div class="text-end mb-4">
        <a href="<?= BASE_URL ?>Pages/admin/adicionar_receita.php" class="btn-simpa">
            <i class="fa-solid fa-plus me-2"></i>Adicionar Receita
        </a>
    </div>
<?php endif; ?>

        <div id="listaReceitas" class="row g-4">

            <?php if (empty($receitas)): ?>
                <p class="text-center">Ainda não há receitas. <a href="<?= BASE_URL ?>Pages/admin/adicionar_receita.php">Adiciona a primeira!</a></p>
            <?php else: ?>
                <?php foreach ($receitas as $r): ?>
                    <div class="col-12 col-md-4 receita">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= BASE_URL ?>Assets/Imagens/Receitas/<?= htmlspecialchars($r['imagem']) ?>" 
                                 class="card-img-top" 
                                 alt="<?= htmlspecialchars($r['titulo']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($r['titulo']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($r['descricao']) ?></p>
                                <a href="<?= BASE_URL ?>Pages/receita_detalhe.php?id=<?= $r['id'] ?>" class="btn-simpa">Ver receita</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php require_once '../componentes/footer.php'; ?>