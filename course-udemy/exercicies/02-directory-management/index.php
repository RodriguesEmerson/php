<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Image List</title>

   <style>
      .galery{
         display: flex;
         flex-direction: column;
         gap: 5px;
      }
      .img-box{
         width: 300px;
         overflow: hidden;
         border-radius: 5px;
         height: 150px;

         & img{
            max-width: 100%;
         }
      }

   </style>
</head>
<body>
   <header>Automatic Image List</header>
   <main>
      <?php 
         //Check if exeists the repective file in the folder;
         var_dump(file_exists(__DIR__ . '/images/IMG-1.jpg'));

         //Folders are also considered file here.
         var_dump(file_exists(__DIR__ . '/images'));

         //Check if the file is a directory
         var_dump(is_dir(__DIR__ . '/images'));
         
         //Check if the file is exactly a file 
         var_dump(is_file(__DIR__ . '/images'));

         //Check the file size
         var_dump(filesize(__DIR__ . '/images/IMG-1.jpg') / 1024 / 1024);

         //Ope the folther with the images.
         $handle = opendir(__DIR__ . '/images');
         
         // $currentFile = readdir($handle);
         // while($currentFile !== false){
         //    var_dump($currentFile);
         //    $currentFile = readdir($handle);
         // }

         $images = [];
         $allowdExtensions = ['jpg', 'jpeg', 'png'];
         //Cycle through each item in the folder.
         while(($currentFile = readdir($handle)) !== false){
            #Skipe the two firts items of the folder, they are gonna always to apear.
            if($currentFile === '.' || $currentFile === '..') continue;

            //It takes the extension of the file.
            $extension = pathinfo($currentFile, PATHINFO_EXTENSION);

            //It only takes allowed files.
            if(!in_array($extension, $allowdExtensions)){
               continue;
            }

            // if($extension !== 'jpg') continue;
            // var_dump($extension);

            #Push the images in the array.
            $images[] = $currentFile;
         }

         //Close the foldder *important
         closedir($handle);
      ?>

   <section class="galery">
      <?php foreach($images AS $image) :?>
            <div class="item">
               <div class="img-box">
                  <img src="./images/<?php echo rawurlencode($image) ?>" alt="Image">
               </div>
            </div>

            <?php endforeach;?>
      </section>
   </main>

</body>
</html>