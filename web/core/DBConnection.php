<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;

class DBConnection
{
  private $pdo;

  public function __construct()
  {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $_ENV['DB_HOST'], $_ENV['MYSQL_DATABASE']);
    $user = $_ENV['MYSQL_USER'];
    $password = $_ENV['MYSQL_PASSWORD'];

    $this->pdo = new PDO($dsn, $user, $password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getPDO()
  {
    return $this->pdo;
  }
}
