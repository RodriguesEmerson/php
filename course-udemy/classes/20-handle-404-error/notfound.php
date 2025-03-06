<?php 
   http_response_code(404);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="<?php echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME)?>/style/style.css">
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
   <header>
      <h1>News Letter</h1>
   </header> 
   <main>
      <p>Page not found</p>
   </main>
</body>
</html>