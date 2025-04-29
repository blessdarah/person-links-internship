<?php

namespace PersonLinks\Internship;

use Exception;
use PDO;

class Connection
{
    /** @var PDO|null */
    private static $instance = null;

    public function __construct() {}

    public function __wakeup() {}

    public function __clone() {}

    public static function getInstance(): PDO
    {
        if (self::$instance == null) {
            self::$instance = self::buildDsn($_ENV['DB_ENGINE'])();
        }

        return self::$instance;
    }

    protected static function buildDsn(string $dbEngine)
    {
        return match ($dbEngine) {
            'mysql' => function () {
                $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";
                try {
                    $pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    return $pdo;

                } catch (Exception $e) {
                    throw new \PDOException($e->getMessage(), (int) $e->getCode());
                }
            },
            'pgsql' => function () {
                $dsn = "pgsql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};user={$_ENV['DB_USER']};password={$_ENV['DB_PASSWORD']}";
                try {
                    $pdo = new PDO($dsn);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    return $pdo;
                } catch (Exception $e) {
                    throw new \PDOException($e->getMessage(), (int) $e->getCode());
                }
            }
        };
    }
}
