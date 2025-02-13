<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      $book = $_GET["book"];
      $author = $_GET["author"];
   ?>
   <h1><?php echo $book?></h1>
   <p><?php echo $author?></p>
</body>
</html>