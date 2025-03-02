<?php 
   #host might be "localhost" or "127.0.0.1";
   #charset=utf8mb4 ensures all data be in UTF-8 format;
   $pdo = new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   ]);

   $stsm = $pdo->prepare('UPDATE `notes` SET `title` = :title, `content` = :content WHERE `id` = :id');
   $stsm->bindValue('id', (int) 6);
   $stsm->bindValue('title', 'Updating data');
   $stsm->bindValue('content', 'This data was updated from php in VScode');

   $stsm->execute();

?>