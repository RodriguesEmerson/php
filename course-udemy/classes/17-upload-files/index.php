<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      var_dump($_POST);
      var_dump($_FILES);

      if(!empty($_FILES) && !empty($_FILES['image'])){
         if($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0){

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $name = preg_replace('/[^a-zA-Z0-9]/', '', pathinfo($_FILES['image']['name'], PATHINFO_FILENAME));
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            if(in_array($extension, $allowedExtensions)){
               move_uploaded_file(
                  $_FILES['image']['tmp_name'], 
                  __DIR__ . '/images' . $name . '-'. time() . '.' .$extension
               );
            }
         };
      }
   ?>
   <form action="index.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Updload">
   </form>
</body>
</html>