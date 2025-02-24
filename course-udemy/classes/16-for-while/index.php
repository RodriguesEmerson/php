<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      $lenght = 10;
      $lenght2 = 10;
      for($ind = 0; $ind <= $lenght; $ind++){
         if($ind === 5) continue;
         echo "Loop: $ind </br>";
         if($ind === 7) break;
      }

      while($lenght2 >= 1){
         echo "While Loop: $lenght2 </br>";
         $lenght2--;
      }


   ?>
</body>
</html>