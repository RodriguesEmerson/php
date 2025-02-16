<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Galery Site</title>
</head>
<body>
   
   <?php
      include_once "inc/sh.func.php"; 
      $images = [
         "Lake City" => "IMG-(1).jpg",
         "Sunrize" => "IMG-(2).jpg",
         "Big City" => "IMG-(3).jpg",
         "Sland" => "IMG-(4).jpg",
      ]
   ?>
   <header>
      <h1>Galery</h1>
      <p>Images galery viwer</p>
   </header>
   <section class="galery">
      <?php foreach($images as $title => $image) : ?> <!-- se não precisar do index: ($images as $image) -->
         <a href="viewer.php?<?php echo http_build_query(["title" => "$title", "image" => "$image"]) ?>" class="image-box">
            <h2 class="image-title"><?php echo SH($title)?></h2>
            <img src="./images/<?php echo rawurldecode($image) ?>" alt="<?php echo SH($title)?>">
         </a>
      <?php endforeach;?>
   </section>
</body>
</html>