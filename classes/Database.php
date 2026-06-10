<?php
require_once __DIR__ . '/../config/db.php';

class Database {
    private static ?PDO $instancia = null;

    public static function obterLigacao(): PDO {
        if (self::$instancia === null) {
            self::$instancia = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$instancia;
    }
}