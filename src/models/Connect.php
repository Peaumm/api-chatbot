<?php

namespace App\Models;
use \PDO;
use \PDOException;

Class Connect {
  protected string $system_info;
  protected object $connect;


  public function __construct() {
    $this->system_info = php_uname();

    if (strpos($this->system_info, 'Windows') !== false) {
      $server = 'localhost';
      $port = '70';
      $login = 'root';
      $mdp = '';
      $db = 'Api-chatbot';
    } elseif (strpos($this->system_info, 'Darwin') !== false) {
      $server = 'localhost';
      $port = '8888';
      $login = 'root';
      $mdp = 'root';
      $db = 'Api-chatbot';
    } else {
      $server = 'localhost';
      $port = '70';
      $login = 'maxence';
      $mdp = 'Max45430';
      $db = 'Api-chatbot';
    }
  
    try{
      $this->connect = new PDO("mysql:host=$server;port=$port;dbname=$db",$login,$mdp, 
      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
      $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connect->query('SET NAMES UTF8');
      return $this->connect;
    }
    catch(PDOException $e) {
      $msg = 'ERREUR dans ' . $e->getFile() . ' Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
      exit($msg);
    }
  
  }
}
