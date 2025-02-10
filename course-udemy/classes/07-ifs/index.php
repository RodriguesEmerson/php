<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>If in PHP</title>
</head>
<body>
   <pre>
      <?php 
      $serverSatus = "a";
         if($serverSatus === "ok"){
            echo "If working";
         }else if ($serverSatus === "o"){
            echo "If working still";
         }else{
            echo "If not working";
         }
      ?>
   </pre>
   
</body>
</html>