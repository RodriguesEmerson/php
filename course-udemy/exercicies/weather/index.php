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


   ?>
   <?php echo $curr_icon?>
   <p><img src="<?php echo $curr_icon ?>" alt="icon"><?php echo $curr_temp?> &deg;C</p>
   <p>Cidade: <?php echo "$city - $country" ?></p>
   <p><?php echo $date['hour'] . " " . $date['day']?></p>
</body>
</html>