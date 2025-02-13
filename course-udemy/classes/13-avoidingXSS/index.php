<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      function safeHTML($value){
         #Evita ataques XSS;
         return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
      }
   ?>
   <form action="<?=$_SERVER["PHP_SELF"] ?>" method="post">
      <input type="text" name="name" value="<?php if(!empty($_POST['name'])) echo safeHTML($_POST['name'])?>"/>
      <input type="submit" value="Send">
   </form>
   
   <?php $name = $_POST["name"] ?? ""?>
   <p><?php if(!empty($_POST['name'])) echo safeHTML($_POST['name']); ?></p>
</body>
</html>
