<?php 
   declare(strict_types=1);

   class WordCityRepository {
      
      public function __construct(private PDO $pdo){}

      public function fetch():array{
         $stmt = $this->pdo->prepare('SELECT `id`, `city`, `city_ascii`, `lat`, `lng`, `country`, `iso2`, `iso3`, `admin_name`, `capital`, `population` 
                                      FROM `worldcities` 
                                      ORDER BY `population` 
                                      LIMIT 10'
                                    );
         $stmt->execute();
         // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         // $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'WordCityModel'); //It brings an object notation;
         $models = [];
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach($data AS $city){
            $models[] = new WordCityModel(
               $city['id'],
               $city['city'],
               $city['city_ascii'],
               (float) $city['lat'],
               (float) $city['lng'],
               $city['country'],
               $city['iso2'],
               $city['iso3'],
               $city['admin_name'],
               $city['capital'],
               $city['population'],
            );
         }
         var_dump($models);
         return [];
      }
   }
?>