<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Aula 02</title>
</head>
<body>
   <?php 
      $nome = "Emerson";
      echo "Meu nome é $nome";
      
      date_default_timezone_set("America/Sao_Paulo");
      echo "Hoje é dia " . date("d/M/Y");
      echo "A hora é " . date("G:i:s");
   ?>
   <?= "Emerson" ?>
</body>
</html>