<?php 
   include './getDatas.php'; 
   #Define o cabeçalho para json
   header('Content-Type: application/json');

   if(!isset($hourly_Temp)){
      echo json_encode(["error" => "Variável não definida"]);
      exit;
   }

   #Converte para json e imprime
   echo json_encode($hourly_Temp);
?>


