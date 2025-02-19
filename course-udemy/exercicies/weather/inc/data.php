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
         $formated_Date = new DateTime($date);
         return [
            "day" => $formated_Date->format("d-m-Y"),
            "hour" => $formated_Date->format("H:i")
         ];
      } catch (Exception $e) {
         return ["error" => "Data inválida"];
      }
   };

   function getHourlyTemp($forecast_Data){
      $now_Time = time();
      $hourly_Data = [];
      $dayly_temp = [];
      
      foreach($forecast_Data AS $day){
         $hourly = $day['hour']; 
         foreach($hourly AS $hour){
            if($hour['time_epoch'] <= $now_Time) continue;
            $hourly_Data[getDateHourOnly($hour['time'])] = $hour['temp_c'];
         }
      };

      return $hourly_Data;
   }

   function getDateHourOnly($date){
      return date(("H-d"), strtotime($date));   
   }
   
?>
