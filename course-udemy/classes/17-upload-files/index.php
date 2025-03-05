<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      // var_dump($_POST);
      // var_dump($_FILES);
      // var_dump(phpinfo());

      if(!empty($_FILES) && !empty($_FILES['image'])){
         if($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0){

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $name = preg_replace('/[^a-zA-Z0-9]/', '', pathinfo($_FILES['image']['name'], PATHINFO_FILENAME));
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $originalImage = $_FILES['image']['tmp_name'];
            $imgDestination = __DIR__ . '/images' . $name . '-'. time() . '.' .$extension;

            #========This way might be dangerous, because the image might to includ code.=============
               // if(in_array($extension, $allowedExtensions)){
               //    move_uploaded_file(
               //       $_FILES['image']['tmp_name'], 
               //       __DIR__ . '/images' . $name . '-'. time() . '.' .$extension
               //    );
               // }


            #=====This is the way to go.==========================================================
            #Resizing the image
            [$imgWidht, $imgHeight] = getimagesize($originalImage);

            $maxDim = 500; //The max dimention
            $scaleFactor = $maxDim / max($imgWidht, $imgHeight);
            $newImgWith = $scaleFactor * $imgWidht;
            $newImgHeight = $scaleFactor * $imgHeight;

            //If this function don't work, probabily the "extension=gd" is disabled in php.ini.
            $jpegImg = imagecreatefromjpeg($originalImage); //Converting the image to .jpeg
            $newImage = imagecreatetruecolor($newImgWith, $newImgHeight); //Create a white image that suports true colors.
            //Really resize the image, preserving the the proporsions and improving the image quality.
            imagecopyresampled($newImage, $jpegImg, 0, 0, 0, 0, $newImgWith, $newImgHeight, $imgWidht, $imgHeight);

            //Save the new image into the destination path.
            imagejpeg($newImage, $imgDestination);
         };
      }
   ?>
   <form action="index.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Updload">
   </form>
</body>
</html>