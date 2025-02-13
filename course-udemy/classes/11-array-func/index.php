<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
      $otherNumbers = [11, 12, 13, 14, 15, 16, 17];

      #Ways to merge an array
      $mergeNumber = array_merge($numbers, $otherNumbers);
      $mergeNumber2 = [...$numbers, ...$otherNumbers, 18];
   ?>

   <?php 
      $highestValue = max($numbers);
      $lowestValue = min($numbers);
      $totalSum = array_sum($numbers);
      echo "<p>Highest value is: $highestValue</p>";
      echo "<p>Lowest value is: $lowestValue</p>";
      echo "<p>Sum is: $totalSum</p>";
   ?>
   <ul>
      <?php foreach($mergeNumber2 as $number) :?>
         <li><?php echo "$number"?></li>
      <?php endforeach;?>
   </ul>
</body>
</html>