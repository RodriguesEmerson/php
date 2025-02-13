<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>QueryString in PHP</title>
</head>
<body>
   <!-- Forma correta para setar uma querystring em um link-->
   <a href="page.php?<?php echo http_build_query(['book' => 'book name', "author" => 'author name'])?>">Book Name</a>
</body>
</html>