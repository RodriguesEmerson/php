<?php 
   $id = $_GET['id'] ?? 1;
   #Here, only are redirected erros if the index id bigger then 5.
   if($id > 5){
      require __DIR__ . '/notfound.php';
      die();
   }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
   <header>
      <h1>News Letter</h1>
   </header>   
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem rerum iste et mollitia commodi est ipsa totam accusamus, necessitatibus similique natus aliquid, soluta optio, aliquam molestias. Inventore voluptatibus ad suscipit?</p>
   <p>
      <?php echo "ID: $id" ?>
   </p>
</body>
</html>