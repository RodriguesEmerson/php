<?php 
   $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
   if(strpos($ua, 'Chrome')){
      echo "You are using Chrome </br>";
   }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css.php">
</head>
<body>
   <a href="download.php">Download</a>

</body>
</html>