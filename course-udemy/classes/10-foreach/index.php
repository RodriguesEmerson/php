<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ForEach in PHP</title>
</head>
<body>
   <?php $cidades = ["São Paulo", "Rio de Janeiro", "Belo Horizonte", "Salvador", "Curitiba"]; ?>
   <ul>
      <?php
         foreach ($cidades as $cidade) {
            echo "<li>$cidade</li>";
         }
      ?>
   </ul>

   <p>Outra Sintaxe</p>

   <ul>
      <?php foreach ($cidades as $cidade) : ?>
         <?php if($cidade === "Salvador") continue; ?> <!-- Pula para proxima se a condição for verdadeira -->
         <?php if($cidade === "Belo Horizonte") break; ?> <!-- Para o forEach se a condição for verdadeira -->
         <li><?php echo "$cidade" ?></li>
      <?php endforeach; ?>
   </ul>
</body>

</html>