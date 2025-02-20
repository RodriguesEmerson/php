<?php
   require_once  './../../../config.php';
   loadEnv();
   $data = getDatas();

   // Carrega variáveis do .env
   function getDatas(){
      $apiKey = getenv('WEATHER_KEY'); // Obtém a chave do ambiente;
      $city_name = $_GET["city"] ?? "Brasília";
      $curl = "http://api.weatherapi.com/v1/forecast.json?key=" . $apiKey . "&q=" . urlencode($city_name) . "&days=3&aqi=no&alerts=no";
      $response = file_get_contents($curl);
      $data = json_decode($response, true);

      return ($data);
   };

   echo json_encode([
      'city' => $data['location']['name'],
      'country' => $data['location']['country'],
      'curr_temp' => $data['current']['temp_c'],
      'curr_icon' => $data['current']['condition']['icon'],
      'curr_condition' => $data['current']['condition']['text'],
      'curr_wind' => $data['current']['wind_kph'],
      'curr_humidity' => $data['current']['humidity'],
      'curr_feelslike' => $data['current']['feelslike_c'],
      'curr_vis' => $data['current']['vis_km'],
      'curr_uv' => $data['current']['uv'],
      'today_chance_of_rain' => $data['forecast']['forecastday'][0]['day']['daily_chance_of_rain'],
   ]);

?>
