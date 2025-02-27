<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Galery</title>
   <style>

      *{
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: Arial, Helvetica, sans-serif;
      }
      header{
         height: 50px;
         background-color: darkcyan;
         text-align: center;
         align-content: center;
         margin-bottom: 10px;
         color: white;
      }
      .galery{
         display: flex;
         flex-direction: column;
         gap: 5px;
         max-width: 750px;
         margin: auto;
         margin-bottom: 10px;
      }
      .img-box{
         min-width: 300px;
         width: 300px;
         overflow: hidden;
         border-radius: 5px;
         height: 150px;

         & img{
            max-width: 100%;
         }
      }
      .item{
         display: flex;
         flex-direction: row;
         align-items: center;
         gap: 5px;

         & .content{
            & p {
               font-size: 15px;
            }
         }
      }
   </style>
</head>
<body>
   <?php 
      function s($value){
         return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
      }

      $handle = opendir(__DIR__ . '/images');

      $images = [];
      $imagesAllowedExtensions = ['jpg'];

      while(($currentFile = readdir($handle) )!== false){
         $extension = pathinfo($currentFile, PATHINFO_EXTENSION);

         if(in_array($extension, $imagesAllowedExtensions)){

            //Only takes the file name
            $imageName = pathinfo($currentFile, PATHINFO_FILENAME);

            $contentText = __DIR__ . "/images/$imageName.txt";

            if(file_exists($contentText)){
               //Get the file contet
               $content = file_get_contents($contentText);
               
               //Divide the content by lines
               $lines = explode("\n", $content);

               //Remove empty lines.
               $lines = array_filter(array_map('trim', $lines));
            }

            $images[$imageName] = [
               "img" => $currentFile,
               "title" => isset($lines[0]) ? $lines[0] : '',
               "description" => isset($lines[1]) ? $lines[1] : ''
            ];
         }

      };

      closedir($handle);
   ?>
   <header>
      <h1>Galery</h1>
   </header>
   <main>
      <section class="galery">
         <?php foreach($images AS $image) :?>
            <div class="item">
               <div class="img-box">
                  <img src="./images/<?php echo rawurlencode($image['img']) ?>" alt="<?php  echo s($image['title'])?> image">
               </div>
               <div class="content">
                  <h2><?php echo s($image['title']) ?></h2>
                  <p><?php echo s($image['description']) ?></p>
               </div>
            </div>

            <?php endforeach;?>
      </section>
   </main>
   
</body>
</html>