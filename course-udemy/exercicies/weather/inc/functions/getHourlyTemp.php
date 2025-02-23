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
      return getLabelsAndValues($hourly_Data);
   };
   
   function getLabelsAndValues($hourly_Data){
      $hourly_temp = [];
      $labels = [];
      $temps = [];
      $ind = 0;

      foreach($hourly_Data AS $hour => $temp){
         $hourly_temp[] = ['label' => getDateHourOnly($hour), 'temp' => removeFloatNumber($temp)];
      }

      foreach($hourly_temp AS $index => $value){
         if($ind == $index){
            if(count($labels) >= 8) break;
            $labels[] = $value['label'];
            $temps[] = $value["temp"];
            $ind += 3;
         }         
      };

      return ["labels" => $labels, "temps" => $temps];
   };

   function getDateHourOnly($date){
      date_default_timezone_set("America/Sao_Paulo");
      return date("H:i", (int)$date);   
   }

   function removeFloatNumber($value){
      return (int)$value;
   }
?>