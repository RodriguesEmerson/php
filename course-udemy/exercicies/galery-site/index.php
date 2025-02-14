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
      function SH($value){
         return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
      }
   ?>
   <?php 
      $images = [
         "Lake City" => "./images/IMG-(1).jpg",
         "Sunrize" => "./images/IMG-(2).jpg",
         "Big City" => "./images/IMG-(3).jpg",
         "Sland" => "./images/IMG-(4).jpg",
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
            <img src="<?php echo SH($image) ?>" alt="<?php echo SH($title)?>">
         </a>
      <?php endforeach;?>
   </section>
</body>
</html>