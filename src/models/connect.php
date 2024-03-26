<?php

session_start();

function getConnect(){
  $server = 'localhost';
  $port = '70';
  $login = 'maxence';
  $mdp = 'Max45430';
  $db = 'Api-chatbot';

  try{
    $connexion = new PDO("mysql:host=$server;port=$port;dbname=$db",$login,$mdp, 
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
  }
  catch(PDOException $e) {
    $msg = 'ERREUR dans ' . $e->getFile() . ' Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
    exit($msg);
  }

}
