<?php 

#try and catch must to be used in production.
#PHP 8.2 version has fixed this error by default, but it's still a good practice to do it.
try{
   $pdo = new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   ]);

}catch(PDOException $e){
   echo 'It was not possible to connect to the DataBase.';
   die();
}

   $stsm = $pdo->prepare('DELETE FROM `notes` WHERE `id` = :id');
   $stsm->bindValue('id', (int) 5);

   $stsm->execute();
?>