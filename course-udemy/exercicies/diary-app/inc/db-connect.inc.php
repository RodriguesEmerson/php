<?php
   try{
      $pdo = new PDO('mysql:host=localhost;dbname=diary;charset=utf8mb4', 'root', '', [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
   }catch(PDOException $error){
      echo 'It was not possible to connect with the database!';
      die();
   }

?>