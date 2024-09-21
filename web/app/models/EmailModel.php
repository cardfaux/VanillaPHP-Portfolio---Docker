<?php

namespace App\Models;

use PDO;

class EmailModel
{
  protected $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function selectAll()
  {
    $statement = $this->pdo->prepare('select * from emails');
    $statement->execute();
    return $all_emails = $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function totalEmails()
  {
    $statement = $this->pdo->prepare('select count(*) from emails');
    $statement->execute();
    return $all_emails = $statement->fetchAll(PDO::FETCH_ASSOC)[0]["count(*)"];
  }

  public function insert($data)
  {
    $data = [
      "email" => $data
    ];
    $statement = $this->pdo->prepare("INSERT INTO emails (email, created_at, updated_at) VALUES (:email, now(), now())");

    return $statement->execute($data);
  }
}
