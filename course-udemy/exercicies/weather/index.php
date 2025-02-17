<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      include './inc/data.php';
      $data = getData();
      if(!$data) {
         die("Erro: Dados não encontrados.");
      }
      var_dump($data)
   ?>
</body>
</html>