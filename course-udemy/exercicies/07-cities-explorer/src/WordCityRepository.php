<?php 
   class WordCityRepository {
      
      public function __construct(private PDO $pdo){
      }

      public function fetch():array{
         $stmt = $this->pdo->prepare('SELECT `id`, `city`, `lat`, `lng`, `country`, `iso2`, `iso3`, `capital`, `population` 
                                      FROM `worldcities` 
                                      ORDER BY `population` 
                                      LIMIT 10'
                                    );
         $stmt->execute();
         // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $data = $stmt->fetchAll(PDO::FETCH_CLASS); //It brings an object notation;
         return $data;
      }
   }
?>