<?php 
   // Carrega variáveis do .env
   require_once  './../../../config.php';
   loadEnv();
   function getData(){
     
      $apiKey = getenv('WEATHER_KEY'); // Obtém a chave do ambiente;
      $city_name = $_GET["city"] ?? "Brasília";
      $curl = "http://api.weatherapi.com/v1/forecast.json?key=" . $apiKey . "&q=" . urlencode($city_name) . "&days=3&aqi=no&alerts=no";
      $response = file_get_contents($curl);
      $data = json_decode($response, true);

      return($data);
   };

   function formatedDate(string $date): array{
      try { 
         $formatedDate = new DateTime($date);
         return [
            "day" => $formatedDate->format("d-m-Y"),
            "hour" => $formatedDate->format("H:i")
         ];
      } catch (Exception $e) {
         return ["error" => "Data inválida"];
      }
   }
   
?>
