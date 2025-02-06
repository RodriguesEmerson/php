<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Culinary Cove &bull; <?php echo $pageTitle; ?></title>
   <style>
      *{
         padding: 0;
         box-sizing: border-box;
         margin: 0;

      }
      header{
         height: 90px;
         background-color: green;
         margin-bottom: 20px;
         color: white;
         text-align: center;
      }
      a{
         border: 1px solid white;
         color: white;
         padding: 5px;
         border-radius: 5px;
         &:hover{
            background-color: white;
            color: green;
            transition:  0.4s;
         }
      }
      a:not(:last-child){
         margin-right: 20px;
         
      }
   </style>
</head>
<body>
   <header>
      <h1><?php echo "$pageTitle";?></h1>
      <p>Your sanctuary for excpetional flavors</p>
      <nav>
         <a href="index.php">Out mission</a>
         <a href="ingredients.php">ingredients</a>
      </nav>
   </header>
   <main>
      