<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Include Method PHP</title>
   <style>
      .text-1 {color: green}
      .text-2 {color: gray}
      .text-3 {color: yellow}
      .text-4 {color: blue}
      .text-5 {color: magenta}
   </style>
</head>
<body class="text-<?php echo rand(1,5) ?>">
   <?php echo "<h1>Helo from PHP</h1>"; ?>
</body>
</html>