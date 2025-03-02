<?php    
   #host might be "localhost" or "127.0.0.1";
   #charset=utf8mb4 ensures all data be in UTF-8 format;
   $pdo =  new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'root', '',[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

      #PDO::FETCH_ASSOC might be here or *(2)*
      ////PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   ]);
   
   
   #============================================ Fetching data by data================================================
   #Here, the data was filtered.
   /*
   $stsm = $pdo->prepare('SELECT `title`, `content` FROM `notes` WHERE `id` < 4 OR `id` = 5 ORDER BY `title` ASC');
   $stsm->execute();   
   
   $results =[];
   while(($result = $stsm->fetch(PDO::FETCH_ASSOC)) !== false){
      $results[] = $result;
   };
   */
   #=================================================================================================================

   #============================================ Fetching an expecific data =========================================
   #Here, the data was filtered.
   #The SQL code must never be inside duble quotes.
   $stsm = $pdo->prepare('SELECT `title`, `content` FROM `notes` WHERE `id` = :id');

   #:id is a placeholder, so now you just need to set its value.
   #Setting its value
   $stsm->bindValue('id', (int) $_GET['id']);  #It do need to be an integer number, to avoid any type of SQL injection;
   $stsm->execute();   
   
   $results = $stsm->fetch(PDO::FETCH_ASSOC);
   var_dump($results);
   #=================================================================================================================

   function e($value){
      return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
   }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <ul>
      <!-- <?php #foreach($results AS $item):?> -->
         <li>
            <div>
               <h2><?php echo e($results["title"]) ?></h2>
               <p><?php echo e($results["content"]) ?></p>
            </div>
         </li>
      <!-- <?php # endforeach;?> -->
   </ul>
</body>
</html>