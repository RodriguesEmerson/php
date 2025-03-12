<?php

   //I already knew OOP in JS, so now it is very easy to understand.

   class BankAccount_{
      public string $nr;
      public string $holder;
      public float $balance = 0; //The default value is 0;

      public $something; //Not typed. It allows any type of datas. 

      function printBalance(){
         echo "The balance of account #{$this->nr} is: {$this->balance}. </br>";
      }
   }

   $account1 = new BankAccount_();
   $account1->nr = '3142341';
   $account1->holder = 'Holder-1';
   $account1->balance = 413.234;
   $account1->printBalance();
   
   $account2 = new BankAccount_();
   $account2->nr = '62452435';
   $account2->holder = 'Holder-2';
   $account2->balance = 213.234;
   $account2->printBalance();


?>