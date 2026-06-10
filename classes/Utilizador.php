<?php
class Utilizador {
    private PDO $db;

    public function __construct() {
        $this->db = Database::obterLigacao();
    }

    public function registar(string $nome, string $email, string $password): bool {
        // Verifica se email já existe
        $stmt = $this->db->prepare("SELECT id FROM utilizadores WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) return false; // já existe

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare(
            "INSERT INTO utilizadores (nome, email, password) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$nome, $email, $hash]);
    }

    public function login(string $email, string $password): bool {
        $stmt = $this->db->prepare("SELECT * FROM utilizadores WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            return true;
        }
        return false;
    }

    public static function estaLogado(): bool {
        if (session_status() === PHP_SESSION_NONE) session_start();
        return isset($_SESSION['user_id']);
    }

    public static function protegerPagina(): void {
        if (!self::estaLogado()) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Simpa_Baker/Pages/login.php");
            exit;
        }
    }
}