<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercicio 003</title>
</head>
<body>
   <h1>Tipos Primitivos em PHP</h1>
   <?php 
      $v = 45.4;
      $n = (int) "950"; //coerção
      $nome = "Emerson \u{1F418}";
      const ESTADO = "Rio Grande do Sul. ";
      
      echo "Meu nome é $nome e moro no " . ESTADO;
      echo "Estamos no ano de " . date('Y ');
      echo "Eu sou \"Estudante\"";  //Sequência de escape
      // var_dump($v);
   ?>
</body>
</html>