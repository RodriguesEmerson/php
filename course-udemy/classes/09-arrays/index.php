<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Arrays in PHP</title>
</head>
<body>
   <?php 
      $categories = ['Programming', 'Bisiness', 'Self improvment', 'History'];
      $categories[1] = "Company";               //Altera o valor do index informado
      unset($categories[1]);                    //Remove o valor e o index informado
      $categories = array_values($categories);  //Reorganiza os indexes do array
      $categories[] = "Books";                  //Adiciona um elemento no fim do array com o index autoincremetado.
      $categoriesLength = count($categories);   //Informa a quantidade de itens no array
      $choice = rand(0, $categoriesLength - 1); //Seleciona um index aleatório do array
      
      var_dump(in_array("Programming", $categories)); //verifica se existe no array
      $isAvailabe = in_array("Programming", $categories);

      if($isAvailabe){
         echo "<h1>The categorie is available!</h1>" . "\n";
         echo "<p>Categories length is: $categoriesLength</p>" . "\n";
         var_dump($categories);

      }
   ?>
   <p><?php echo "$categories[$choice]"?></p>
   <p><?php 
      $winner = $categories[rand(0, count($categories) -1)];
      echo $winner
   ?></p>
</body>
</html>