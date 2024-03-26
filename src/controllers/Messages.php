<?php

namespace App\Controllers;
use \PDO;

class Messages {
  protected array $params;
  protected string $reqMethod;

  public function __construct($params) {
    $this->params = $params;
    $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);

    $this->run();
  }

  function getBDD($id) {
    $connexion=getConnect();
    $req = $connexion->prepare('SELECT message, name, date FROM messages WHERE id=:id;');
    $req->bindValue(':id', $id, PDO::PARAM_STR);
    $req->execute();
    $resultat = $req->fetch(PDO::FETCH_ASSOC);
    $datas =[];
    foreach ($resultat as $key => $value) {
      $datas[$key] = $value;
    }
    var_dump($datas);
  }

  protected function getMessages() {
    $messages = [
      [
        'message' => "Salut c'est moi.",
        'name' => 'David',
        'date' => date("d/m/Y, g:i:s A")
      ],
      [
        'message' => "Salut c'est encore moi.",
        'name' => 'Richard',
        'date' => date("d/m/Y, g:i:s A")
      ],
      [
        'message' => "Salut c'est pas moi.",
        'name' => 'Alexander',
        'date' => date("d/m/Y, g:i:s A")
      ],
      [
        'message' => "Hola, soy yo.",
        'name' => 'Pablo',
        'date' => date("d/m/Y, g:i:s A")
      ],
      [
        'message' => "Salut.",
        'name' => 'Lucas',
        'date' => date("d/m/Y, g:i:s A")
      ]
    ];
    return $messages;
  }

  protected function header() {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
  }


  protected function ifMethodExist() {
    $method = $this->reqMethod.'Messages';

    if (method_exists($this, $method)) {
      echo json_encode($this->$method());

      return;
    }

    header('HTTP/1.0 404 Not Found');
    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);

    return;
  }

  protected function run() {
    $this->header();
    $this->ifMethodExist();
    $this->getMessages();
    $this->getBDD(2);
  }
}
