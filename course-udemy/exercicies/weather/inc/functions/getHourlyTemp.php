<?php 
   function getHourlyTemp($forecast_Data){
      $now_Time = time();
      $hourly_Data = [];
      
      foreach($forecast_Data AS $day){
         $hourly = $day['hour']; 
         foreach($hourly AS $hour){
            if($hour['time_epoch'] <= $now_Time) continue;
            $hourly_Data[$hour['time_epoch']] = $hour['temp_c'];
         }
      };

      return $hourly_Data;
   }

   function getDateHourOnly($date){
      return date(("H-d"), strtotime($date));   
   }
?>