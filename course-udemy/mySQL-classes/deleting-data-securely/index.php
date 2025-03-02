<?php 
   $pdo = new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   ]);

   $stsm = $pdo->prepare('DELETE FROM `notes` WHERE `id` = :id');
   $stsm->bindValue('id', (int) 5);

   $stsm->execute();
?>