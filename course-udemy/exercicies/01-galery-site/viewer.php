<?php 
   include_once "inc/sh.func.php";
   $title = $_GET["title"];
   $image = $_GET["image"];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styleViewer.css">
   <title><?php echo SH($title)?></title>
</head>
<body>
   <header>
      <h1><?php echo SH($title)?></h1>
   </header>
   <section class="container">
      <div class="image-box">
         <img src="./images/<?php echo rawurldecode($image)?>" alt="<?php echo SH($title)?>">
      </div>
      <div class="description">
         <h2>Description</h2>
         <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim provident itaque corrupti qui aperiam repudiandae quasi, voluptatem, minus a quos praesentium. Ut provident cupiditate ex quibusdam dignissimos deserunt voluptates nihil?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sint explicabo tenetur quibusdam debitis fugit mollitia.
         </p>
         <p>
            Laborum, necessitatibus. Totam provident qui animi, culpa doloremque natus voluptatibus aut inventore maiores accusamus.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere ipsum rem praesentium voluptatibus eum esse qui est dignissimos commodi ducimus iste perspiciatis ad earum beatae, illum porro nihil veniam quidem.
         </p>
      </div>
      <a class="gobackButton" href="javascript:history.go(-1)">Go back</a>
      </body>
   </section>
</html>