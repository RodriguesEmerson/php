<?php 
   #Now, this function only allows integer numbers and retuns only int number too.
   function add_number(int $number): int{
      $result = $number + 5;
      return $result;
   };

   $sumNumber = '5';
   // var_dump(add_number($sumNumber));

   #This function only allows strings as paramenter.
   function print_message(string $message){
      echo $message;
   };
   
   // print_message('Emerson');
   
   #This function only allows strings as paramenter and retur a interger number.
   function sum_array(array $prices): int{
      $sum = 0;
      foreach($prices AS $price){
         $sum += $price;
      }
      return $sum;
   };

   // var_dump(sum_array([1, 2, 3]));

   #This function allows two types of parameters and returns only two types too.
   function mult_type(float|int $number): int|float{
      $result = $number + 5;
      return $result;
   };

   #This function allows string or null; '?' means it might be null.
   function print_message2(?string $message){
      if(!empty($message)){
         echo $message;
      }
   }

    #This function allows  number or null and retrus number or null too.
    function sum2(?int $number): ?int{
      if($number < 0){
         return null;
      }
      return $number + 5;
   }