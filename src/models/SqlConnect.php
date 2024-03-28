<?php

namespace App\Models;

use \PDO;

class SqlConnect {
  protected string $system_info;
  public object $db;
  private string $host;
  private string $port;
  private string $dbname;
  private string $password;
  private string $user;

  public function __construct() {
    $system_info = php_uname();
    if (strpos($system_info, 'Windows') !== false) {
      $this->host = '127.0.0.1';
      $this->port = '3306';
      $this->dbname = 'Api-chatbot';
      $this->user = 'maxence';
      $this->password = 'Max45430';
    } elseif (strpos($system_info, 'Darwin') !== false) {
      $this->host = '127.0.0.1';
      $this->port = '3306';
      $this->dbname = 'Api-chatbot';
      $this->user = 'maxence';
      $this->password = 'Max45430';
    } else {
      $this->host = '127.0.0.1';
      $this->port = '3306';
      $this->dbname = 'Api-chatbot';
      $this->user = 'maxence';
      $this->password = 'Max45430';
    }

    $this->db = new PDO(
      'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname,
      $this->user,
      $this->password
    );

    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_PERSISTENT, false);
  }

  public function transformDataInDot($data) {
    $dataFormated = [];

    foreach ($data as $key => $value) {
      $dataFormated[':' . $key] = $value;
    }

    return $dataFormated;
  }
}