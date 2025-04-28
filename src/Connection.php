<?php

namespace PersonLinks\Internship;

use Exception;
use PDO;


class Connection
{
	
	 /** @var PDO|null */
	private static $instance = null;
	public function __construct()
	{
	}
	public function __wakeup()
	{
	}
	public function __clone()
	{
	}

	public static function getInstance(): PDO
	{
		if (self::$instance == null) {
			$host = $_ENV["DB_HOST"];
			$dbname = $_ENV['DB_NAME'];
			$username = $_ENV['DB_USER'];
			$password = $_ENV['DB_PASSWORD'];
			$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

			try {
				self::$instance = new PDO(
					$dsn,
					$username,
					"", // TODO: Change to use env password value
					[
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					]
				);
			} catch (Exception $e) {
				throw new \PDOException($e->getMessage(), (int) $e->getCode());
			}
		}
		return self::$instance;
	}
}
