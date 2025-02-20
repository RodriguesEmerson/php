<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      require_once './inc/functions/getDatas.php';
      require_once './inc/functions/getHourlyTemp.php';
      require_once './inc/functions/utils.php';
      
      $date = formatedDate($data['location']['localtime']);
      $forecast_Data = $data['forecast']['forecastday'];
      $hourly_Temp = getHourlyTemp($forecast_Data);
   ?>
   <div>
      <span><img src="<?php echo $curr_icon ?>" alt="icon"></span> 
      <span><?php echo $curr_temp?> &deg;C</span>
      
   </div>
   
   <div>
      <span>Humidade: <?php echo $curr_humidity?>%</span>
      <span>Vento: <?php echo $curr_wind?> km/h</span>
      <span>Visibilidade: <?php echo $curr_vis?> km</span>
      <span>Prob. Chuva: <?php echo $today_chance_of_rain?>%</span>
   </div>
   
   <div>
      <span>Clima</span>
      <span><?php echo "$city - $country" ?></span>
      <span><?php echo $date['hour'] . " " . $date['day']?></span>
      <span><?php echo $curr_condition?></span>

   </div>
   
   <div>
      <div>
         <canvas id="hourly-chart"></canvas>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="./generateChartData.js" type="module"></script>
   <script src="./chart.js" type="module"></script>
</body>
</html>

<!-- https://www.weatherapi.com/api-explorer.aspx#forecast -->