<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Resultado</title>
</head>
<body>
   <header>
      <h1>Resultado do Processamento</h1>
   </header>
   <main>
      <?php 
         //  var_dump($_GET);
         $n = $_GET["nome"];
         $s = $_GET["sobrenome"];

         echo "<p>Meu nome é <strong>$n $s</strong>!</p>"
      ?>
      <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
   </main>

</body>
</html>