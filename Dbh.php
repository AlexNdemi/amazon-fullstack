<?php
declare(strict_types = 1);
class Dbh{
  
  private $host = '127.0.0.1';
  private $user = 'root';
  private $password = '1234.pSBx';
  private $dbName = "amazon_database";
  protected function connect(){
    try{
      $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
      $pdo = new PDO($dsn,$this->user,$this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
     return $pdo; 
    } catch(PDOException $e){
      print "Error!:".$e->getMessage().'<br/>';
    }
    
  }

}
