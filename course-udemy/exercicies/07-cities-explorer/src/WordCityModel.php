<?php 
   class WordCityModel {
      
      public function __construct(
         public int $id,
         public string $city,
         public string $cityAscii,
         public float $lat,
         public float $lng,
         public string $country,
         public string $iso1,
         public string $iso2,
         public string $adminName,
         public string $capital,
         public int $population
      ){}
   }
?>