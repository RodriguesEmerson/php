<?php 
   // Carregar variáveis do .env
   require_once  './../../../config.php';
   loadEnv();
   function getData(){
     
      $apiKey = getenv('WEATHER_KEY'); // Obtém a chave do ambiente;
      $city_name = $_GET["city"] ?? "Brasília";
      $curl = "http://api.openweathermap.org/data/2.5/forecast?q=" . urlencode($city_name) . "&appid=" . $apiKey;
      $response = file_get_contents($curl);
      $data = json_decode($response, true);

      return($data);
   }
?>