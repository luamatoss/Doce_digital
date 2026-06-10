<?php
class Receita {
    private PDO $db;

    public function __construct() {
        $this->db = Database::obterLigacao();
    }

    // READ — lista todas (com JOIN ao utilizador)
    public function listarTodas(): array {
        $stmt = $this->db->query("
            SELECT r.*, u.nome AS autor
            FROM receitas r
            JOIN utilizadores u ON r.id_utilizador = u.id
            ORDER BY r.criado_em DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ — uma receita por ID (com ingredientes)
    public function obterPorId(int $id): ?array {
        $stmt = $this->db->prepare("
            SELECT r.*, u.nome AS autor
            FROM receitas r
            JOIN utilizadores u ON r.id_utilizador = u.id
            WHERE r.id = ?
        ");
        $stmt->execute([$id]);
        $receita = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$receita) return null;

        // Vai buscar ingredientes
        $stmt2 = $this->db->prepare(
            "SELECT descricao FROM ingredientes WHERE id_receita = ?"
        );
        $stmt2->execute([$id]);
        $receita['ingredientes'] = $stmt2->fetchAll(PDO::FETCH_COLUMN);

        return $receita;
    }

    // CREATE
    public function criar(array $dados, int $idUtilizador): int {
        $stmt = $this->db->prepare("
            INSERT INTO receitas (titulo, descricao, imagem, tempo, dificuldade, porcoes, id_utilizador)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            htmlspecialchars($dados['titulo']),
            htmlspecialchars($dados['descricao']),
            $dados['imagem'],
            $dados['tempo'],
            $dados['dificuldade'],
            (int)$dados['porcoes'],
            $idUtilizador
        ]);
        return (int)$this->db->lastInsertId();
    }

    // UPDATE
    public function atualizar(int $id, array $dados): bool {
        $stmt = $this->db->prepare("
            UPDATE receitas
            SET titulo=?, descricao=?, tempo=?, dificuldade=?, porcoes=?
            WHERE id=?
        ");
        return $stmt->execute([
            htmlspecialchars($dados['titulo']),
            htmlspecialchars($dados['descricao']),
            $dados['tempo'],
            $dados['dificuldade'],
            (int)$dados['porcoes'],
            $id
        ]);
    }

    // DELETE
    public function eliminar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM receitas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}