<?php

namespace App\Controllers;

class User {
  protected array $params;

  public function __construct($params) {
    $this->params = $params;
    $this->run();
  }

  private function getUser(){
    echo json_encode([
      'firstname' => 'Maxence',
      'name' => 'Fouquet',
      'promo' => 'B1',
      'school' => 'Coda'
    ]);
  }

  protected function run(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
      $this->getUser();
    }
    echo 'user';
  }
}