<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Image List</title>
</head>
<body>
   <header>Automatic Image List</header>
   <main>
      <?php 

         //Pega/abre a pasta com as imagens
         $handle = opendir(__DIR__ . '/images');
         
         // $currentFile = readdir($handle);
         // while($currentFile !== false){
         //    var_dump($currentFile);
         //    $currentFile = readdir($handle);
         // }

         $images = [];
         //Faz um loop por cada item da pasta
         while(($currentFile = readdir($handle)) !== false){
            #Pula os dois primeiro item que sempre terâo na pasta.
            if($currentFile === '.' || $currentFile === '..') continue;

            //Pega a extenção/formato do arquivo;
            $extension = pathinfo($currentFile, PATHINFO_EXTENSION);
            if($extension !== 'jpg') continue;
            var_dump($extension);


            #Adiciona cada item ao array.
            $images[] = $currentFile;
         }

         //Fecha a pasta *importante
         closedir($handle);
      ?>

      <?php foreach($images AS $image) :?>
         <img src="./images/<?php echo rawurlencode($image) ?>" alt="Image">
      <?php endforeach;?>
   </main>

</body>
</html>