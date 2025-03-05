<?php
   $termsError = false;
   $user = $_POST['user'] ?? '';
   $email = $_POST['email'] ?? '';
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      if(!empty($_POST['terms'])){
         //Code to save user in the DB
   
         header('Location: thanks.php');
         die();
      }else{
         $termsError = true;
      }
   }
?><!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      *{
         font-family: Arial, Helvetica, sans-serif;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }
      header{
         height: 50px;
         background-color: lightgray;
         text-align: center;
         align-content: center;
         font-weight: bold;
         margin-bottom: 40px;
         font-size: 30px;
      }
      form{
         margin: auto;
         display: flex;
         flex-direction: column;
         gap: 10px;
         width: 300px;
      }
      input{
         border-radius: 5px;
         height: 30px;
      }
      input[type="text"], input[type="email"]{
         border: 1px solid gray;
      }
      input[type="submit"]{
         background-color: cadetblue;
         transition: .4s;
         cursor: pointer;
         color: white;
         border: none;
         &:hover{
            background-color: blue;
         }
      }
      .terms{
         display: flex;
         flex-direction: row;
         gap: 5px;
         align-items: center;
      }
   </style>
</head>
<body>
   <header>
      Sign-Up page with Location Headers
   </header>
   <form action="index.php" method="post">
      <label for="user">User</label>   
      <input type="text" name="user" id="user" value="<?php echo $user?>">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="<?php echo $email?>">
      <div class="terms">
         <input type="checkbox" value="1" name="terms" id="terms">
         <label for="terms">Receive emails</label>
      </div>
      <?php if(!empty($termsError)):?>
         <p style="color: darkred;">You need to accept the terms!</p>
      <?php endif;?>
      <input type="submit" value="Submit">

   </form>
</body>
</html>