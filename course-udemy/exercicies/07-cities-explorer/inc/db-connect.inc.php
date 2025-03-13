<?php 
   $host = '127.0.0.1';
   $db = 'cities';
   $user = 'cities';
   $password = 'diFXtng_@5L)Y32W';
   $charset = "utf8mb4";

   #PDO database connection
   try{
      $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password, [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
   }catch(PDOException $e){
      var_dump($e->getMessage(), (int)$e->getCode());
      die();
   }

   var_dump($pdo);
?>