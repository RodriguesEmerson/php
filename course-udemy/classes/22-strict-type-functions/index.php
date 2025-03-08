<?php 

   #This function allows the all function in the code, receives only their respective allowed parameters types.
   #So, I need to specify the variable type when I'm declaring it. Ex:
   declare(strict_types=1);

   function sum(int|float|null $number): int|float|null{
      return $number + 5;
   }  

   $num = (int) $_GET['id'] ?? 0;
   var_dump(sum($num));

   #This function will never retun something.
   function print_5x(string $message): void{
      echo $message."</br>";
      echo $message."</br>";
      echo $message."</br>";
      echo $message."</br>";
      echo $message."</br>";
   };

   print_5x((string) $num);