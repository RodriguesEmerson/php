<?php

interface Car{
   public function drive();
    
   //If i set any return, all the classes that using it need to return a string;
   // public function drive(): string; 
}
class FuelCar implements Car{
   public function drive(){
      echo "The car is driving and consuming fuel. <br>";
   }
}
class EletricCar implements Car{
   public function drive(){
      echo 'The car is driving and using electricity. <br>';
   }
}
/**
 * @param class $car must to be a instance of FuelCar or EletricCar;
 */
// function transport(FuelCar|EletricCar $car){ $car->drive(); }

/**
 * @param class $car now might to be a intance of any class that implements the interface Car.
 */
function transport(Car $car){ $car->drive(); }

$audi = new FuelCar();
$tesla = new EletricCar();
transport($audi);
transport($tesla);
// transport('Teste'); 