<?php 
   $account = [
      'nr' => '45234523',
      'holder' => 'Holder-1',
      'balance' => 250.00
   ];
   $account2 = [
      'nr' => '45264543',
      'holder' => 'Holder-2',
      'balance' => 450.00
   ];

   function print_balance(array $account){
      echo "The balance of account #{$account['nr']} is: {$account['balance']}. </br>";
   };

   //When I put & berfore the $array, it will doesn't create a copy of it, but will handle the own array that was passed as parameter.
   function transfer(array &$from, array &$to, int|float $amount): void{
      $from['balance'] = $from['balance'] - $amount;
      $to['balance'] = $to['balance'] + $amount;
   }

   transfer($account, $account2, 100);

   print_balance($account);
   print_balance($account2);
?>