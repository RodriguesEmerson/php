<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <pre>
      <?php 
         $pageTitle = "PHP";
         $pageTitle2 = 'PHP';
         unset($pageTitle2); //Remove a var completamente.
         var_dump(isset($pageTitle)); //Isset verifica se a var existe.
         var_dump(empty($pageTitle)); //Empty verifica se a var está vazia

         if (isset($pageTitle) && $pageTitle !== "") :
            echo "<h1>The var exist</h1>";
         endif;

         if(isset($pageTitle) && $pageTitle !== ""){
            echo "<h1>The var exist</h1>";
         }
      ?>
      
      <!-- Maneira mais adequada -->
      <?php if (!empty($pageTitle)) : ?>
         <h1><?php echo $pageTitle?></h1> 
      <?php endif;?>
   </pre>
   
</body>
</html>