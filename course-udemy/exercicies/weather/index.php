<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php 
      include './inc/data.php';
      $data = getData();
      if(!$data) {
         die("Erro: Dados não encontrados.");
      }
      var_dump($data);
      // var_dump($data['list'][0]);
      $city = $data['location']['name'];
      $country = $data['location']['country'];
      $date = formatedDate($data['location']['localtime']);
      $curr_temp = $data['current']['temp_c'];
      $curr_condition = $data['current']['condition']['text'];
      $curr_icon = $data['current']['condition']['icon'];
      $curr_wind = $data['current']['wind_kph'];
      $curr_humidity = $data['current']['humidity'];
      $curr_feelslike = $data['current']['feelslike_c'];
      $curr_vis = $data['current']['vis_km'];
      $curr_uv = $data['current']['uv'];
      $today_chance_of_rain = $data['forecast']['forecastday'][0]['day']['daily_chance_of_rain'];
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
   <script src="chart.js"></script>
</body>
</html>

<!-- https://www.weatherapi.com/api-explorer.aspx#forecast -->