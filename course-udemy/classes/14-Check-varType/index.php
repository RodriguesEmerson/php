<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checking variable types</title>
</head>
<body>
   <?php 
      $num = 15;
      $str = "PHP";
      $isNum = is_int($num);
   ?>

   <?php if($isNum) :?>
      <p>The variable is a integer!</p>
   <?php else:?>
      <p>The variable doesn't is a integer</p>
   <?php endif;?>
   
</body>
</html>