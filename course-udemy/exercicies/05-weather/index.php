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
   require_once './inc/translate.php'
   ?>
   <header>
      <h1>Weather</h1>
   </header>
   <section class="weather-box">
      <?php 
         include './inc/form.php'
      ?>
      <div class="geral-infos">
         <div class="temp">
            <div class="curr-temp">
               <span class="icon-box"><img src="<?php echo sh($curr_icon) ?>" alt="icon"></span>
               <div>
                  <p><?php echo (int)sh($curr_temp) ?></p><span> &deg;C</span>
               </div>
            </div>
            <div class="curr-datas">

               <span>Sensação: <?php echo sh($curr_feelslike) ?>%</span>
               <span>Humidade: <?php echo sh($curr_humidity) ?>%</span>
               <span>Vento: <?php echo sh($curr_wind) ?> km/h</span>
               <span>Visibilidade: <?php echo sh($curr_vis) ?> km</span>
               <span>Prob. Chuva: <?php echo sh($today_chance_of_rain) ?>%</span>
            </div>
         </div>
         <div class="curr-clima">
            <p>Clima</p>
            <span><?php echo sh("$city - $country") ?></span>
            <span><?php echo sh($date['hour'] . " " . $date['day']) ?></span>
            <span><?php echo sh($words_translate[$curr_condition]) ?></span>
         </div>
      </div>

      <div>
         <div class="chart-box">
            <canvas width="625" height="150" id="hourly-chart"></canvas>
         </div>
      </div>

      <div class="dayly-temp-box">
         <ul>
            <?php foreach ($dayly_temp as $day => $value) : ?>
               <li class="<?php if ($day == 1) echo "dayly-today-temp" ?>">
                  <span><?php echo sh($words_translate[$value['week_day']]) ?>.</span>
                  <img src="<?php echo rawurldecode($value['condition_icon']) ?>" alt="condition icon">
                  <div>
                     <span><?php echo sh($value['max_temp']) ?>°</span>
                     <span class="dayly-mim-temp"><?php echo sh($value['min_temp']) ?>°</span>
                  </div>
               </li>
            <?php endforeach; ?>
         </ul>
      </div>
   </section>

   <p class="hourly-temp" style="display: none;"><?php echo $hourly_Temp ?></p>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
   <script src="./createChartData.js" type="module"></script>
   <script src="./chartTemp.js" type="module"></script>
</body>

</html>

<!-- https://www.weatherapi.com/api-explorer.aspx#forecast -->