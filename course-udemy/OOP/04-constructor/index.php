<?php
   //I already knew OOP in JS, so now it is very easy to understand.

   class BankAccount{
      /**
       * Sintax 1 for writing a constructor and to declare variables.
       */
               // public string $nr;
               // public string $holder;
               // public float $balance = 0; //The default value is 0;

               // function __construct(string $nr, string $holder, float $balance){
               //    $this->nr = $nr;
               //    $this->holder = $holder;
               //    $this->balance = $balance;

               // }


      /**
       * Sintax 2 for writing a constructor and to declare variables.
       */

      
      public $otherVars; //Variables that aren't used in the constructor.
      #Public properties.
      // function __construct(
      //    public string $nr, 
      //    public string $holder, 
      //    public float $balance){
      //       $this->nr = $nr;
      //       $this->holder = $holder;
      //       $this->balance = $balance;

      // }

      #Private properties.
      public function __construct(
         private string $nr, 
         private string $holder, 
         private float $balance){
            $this->nr = $nr;
            $this->holder = $holder;
            $this->balance = $balance;

      }

      public function getHolder(): string{
         return $this->holder;
      }
      public function setHolder(string $holder){
         $this->holder = $holder;
      }


      public function transfer(BankAccount $to, float $amount):bool{
         if($this->balance >= $amount){
            $this->balance -= $amount; 
            $to->balance += $amount; 
            $this->printBalance();
            return true;
         }else{
            return false;
         }
      }


      private function printBalance(){
         echo "The balance of account #{$this->holder} is: {$this->balance}. </br>";
      }
   }

   $account1 = new BankAccount('3142341', 'Holder-1', 413.234);
   // $account1->printBalance();
   $account2 = new BankAccount('5234523', 'Holder-2', 513.432);
   // $account1->printBalance();
   $account1->transfer($account2, 100);
   // $account1->printBalance();
   // $account2->printBalance();
   
   $user = $account1->getHolder();
   $account1->setHolder('New-User-1');
   // $account1->printBalance();

   var_dump($user);

?>