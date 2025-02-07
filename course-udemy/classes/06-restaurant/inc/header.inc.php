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
      .activePage{
         border-color: yellow;
         color: yellow;

         &:hover{
            background-color: yellow;
         }
      }
   </style>
</head>
<body>
   <header>
      <h1><?php echo "$pageTitle";?></h1>
      <p>Your sanctuary for excpetional flavors</p>
      <nav>
         <a href="index.php" class="<?php echo $pageTitle == ('Our mission') ? 'activePage' : '' ;?>">Our mission</a>

         <a href="ingredients.php" class="<?php echo $pageTitle == ('Ingredients') ? 'activePage' : '' ;?>">ingredients</a>
      </nav>
      <?php 
         $promoCode = 'SUMMER_SALE';
         $price = 4.44444;
         echo "Seasonal Offer! 🤑 Use \"{$promoCode}\" for an exclusive discount." . round($price, 2);
      ?>
   </header>
   <main>
      