<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php 
      require_once './inc/functions/getDatas.php';
      require_once './inc/functions/getDaylyTemp.php';
      require_once './inc/functions/utils.php';
   ?>
   <div>
      <span><img src="<?php echo sh($curr_icon) ?>" alt="icon"></span> 
      <span><?php echo sh($curr_temp) ?> &deg;C</span>
      
   </div>
   
   <div>
      <span>Humidade: <?php echo sh($curr_humidity) ?>%</span>
      <span>Vento: <?php echo sh($curr_wind) ?> km/h</span>
      <span>Visibilidade: <?php echo sh($curr_vis) ?> km</span>
      <span>Prob. Chuva: <?php echo sh($today_chance_of_rain) ?>%</span>
   </div>
   
   <div>
      <span>Clima</span>
      <span><?php echo sh("$city - $country") ?></span>
      <span><?php echo sh($date['hour'] . " " . $date['day']) ?></span>
      <span><?php echo sh($curr_condition) ?></span>

   </div>
   
   <div>
      <div class="chart-box">
         <canvas width="625" height="150" id="hourly-chart"></canvas>
      </div>
   </div>

   <div>
      <?php var_dump($dayly_temp)?>
      <ul>
         <?php  foreach($dayly_temp AS $day) :?>
            <li>
               <div>
                  <span><?php echo sh($day['week_day'])?></span>
                  <img src="<?php echo sh($$day['condition_icon']) ?>" alt="condition icon">
                  <span><?php echo sh($day['max_temp'])?></span>
                  <span><?php echo sh($day['min_temp'])?></span>
               </div>
            </li>
         <?php endforeach;?>
      </ul>
   </div>


   <p class="hourly-temp" style="display: none;"><?php echo $hourly_Temp?></p>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
   <script src="./createChartData.js" type="module"></script>
   <script src="./chartTemp.js" type="module"></script>
</body>
</html>

<!-- https://www.weatherapi.com/api-explorer.aspx#forecast -->