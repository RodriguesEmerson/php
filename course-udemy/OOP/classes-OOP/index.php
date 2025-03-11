<?php 
   
   class BankAccount{
      public string $nr;
      public string $holder;
      public float $balance;
   }

   $account1 = new BankAccount();
   $account1->nr = '13451435';
   $account1->holder = 'Holder-1';
   $account1->balance = 1234.65;

   //This function only allows parameters instaciated by BankAccount;
   function print_balance(BankAccount $account){
      echo "The balance of account #{$account->nr} is: {$account->balance}. </br>";
   }

   var_dump($account1);
   print_balance($account1);

?>