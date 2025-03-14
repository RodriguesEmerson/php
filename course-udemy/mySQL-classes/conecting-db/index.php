<?php    
   #host might be "localhost" or "127.0.0.1";
   #charset=utf8mb4 ensures all data be in UTF-8 format;
   $pdo =  new PDO('mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4', 'root', '',[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

      #PDO::FETCH_ASSOC might be here or *(2)*
      ////PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   ]);
   

   #Fetching data from DB
   #Here, all data was imported.
   // $stsm = $pdo->prepare('SELECT * FROM `notes`');

   #Here, the data was filtered.
   $stsm = $pdo->prepare('SELECT `title`, `content` FROM `notes` WHERE `id` < 4 OR `id` = 5 ORDER BY `title` ASC');
   $stsm->execute();
   
   #*(2)* here as a parameter;
   #Without the "PDO::FETCH_ASSOC", it'll get twice all same data, one with [0]index and the another with ['title']key
   #Fetching all data at once;
   ////$results = $stsm->fetchAll(PDO::FETCH_ASSOC);


   $results =[];
   while(($result = $stsm->fetch(PDO::FETCH_ASSOC)) !== false){
      $results[] = $result;
   };

   // var_dump($stsm);
   // var_dump($results);

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
      <?php foreach($results AS $item):?>
         <li>
            <div>
               <h2><?php echo e($item["title"]) ?></h2>
               <p><?php echo e($item["content"]) ?></p>
            </div>
         </li>
      <?php endforeach;?>
   </ul>
</body>
</html>