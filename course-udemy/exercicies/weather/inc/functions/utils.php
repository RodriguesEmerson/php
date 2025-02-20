<?php 
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
?>