<?php 
   $raw_dayly_temp = ($data['forecast']['forecastday']);
   $dayly_temp = [];
   date_default_timezone_set("America/Sao_Paulo");
   foreach($raw_dayly_temp AS $day){
      $dayly_temp[] = [
         "week_day" => getAbrevDay($day["date_epoch"]),
         "condition" => $day["day"]["condition"]["text"],
         "condition_icon" => $day["day"]["condition"]["icon"],
         "max_temp" => (int)$day["day"]["maxtemp_c"],
         "min_temp" => (int)$day["day"]["mintemp_c"],
      ];
   }
   function getAbrevDay($date){
      date_default_timezone_set("America/Sao_Paulo");
      return date("D", (int)$date);   
   }
?>


