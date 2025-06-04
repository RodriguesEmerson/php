<?php

class Animal{
   /**
    * public: Any class can access this attibute.
    */
      // public function __construct(public int $weight){}

   /**
    * private: Means that this attribute is available only for this class, 
    * not even its children are able to access it.
    */
      // public function __construct(private int $weight){}
   
   /**
    * protected: This key means that the attribute may be accessed only from itself, parent or child.
    * It can't be accessed from outside, like this: $newAnimal->weight;
    */
      public function __construct(protected int $weight){}

   public function move(){
      echo "Animal::move has been called <br>";
   }

   public function eat(){
      echo "Animal::eat has been called, Weight: ($this->weight)kg <br>";

      //Here, "move" refer to the method of the class that called this method.
      $this->move();

      //Using "self", it ensures that the method "move" will always to refer to its own method.
      self::move();
   }
}

/**
 * abstract classes are able only to be extended, not intancied;
 */
abstract class Animal_2{

   //In abstract class, when is seted a model, its children are enforced to use it or is going to give an error.
   abstract protected function getWeight():int;
   public function run(){
      echo "Animal_2::run has been called.";
   }
}


class Dog extends Animal{
   public function __construct(public string $breed, $weight){
      parent::__construct($weight);
   }

   public function bark(){
      echo "Dog::bark has been called. (Breed: $this->breed) $this->weight <br>";
   }

   //Polimorfism | Overwrite
   #[\Override]  //Only works into 8.3 and above.
   public function move(){
      echo "Dog::move has been called <br>";

      //When "parent" is use, it is going to call the method from the father class.
      parent::move();
   }
}


class Lion extends Animal_2{
   protected function getWeight(): int{
      return 20;
   }
}


$animal = new Animal(10);
$animal->move();

$dog = new Dog('Golden Retriever',15);
$dog->move();
$dog->bark();
$dog->eat();