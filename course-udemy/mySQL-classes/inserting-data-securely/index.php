<?php    
   #host might be "localhost" or "127.0.0.1";
   #charset=utf8mb4 ensures all data be in UTF-8 format;
   $pdo =  new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'root', '',[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   ]);

   #==================================== INSETING DATA INTO DB ========================================= 
      $title = 'Inserting Data Securely';
      $content = 'At thi class, I learned how to inset data securely into the database.';

      // $stsm = $pdo->prepare("INSERT INTO `notes` (`id`,`title`, `content`) VALUES (NULL, 'One more note', 'Its content')");
      #I can omit the ID, it is gerenated automaticaly by the DataBase .
      $stsm = $pdo->prepare("INSERT INTO `notes` (`title`, `content`) VALUES (:title, :content)");
      $stsm->bindValue('title', (string) $title);
      $stsm->bindValue('content', (string) $content);

      $stsm->execute();

   #====================================================================================================

?>