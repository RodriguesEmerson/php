<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./../../style.css">
   <title>N antecessor e sucessor</title>
</head>
<body>
   <header>
      <h1>Resultado</h1>
   </header>
   <main>
      <?php 
         $number = $_GET["number"] ?? 1;
         $before = $number - 1;
         $after = $number + 1;

         echo "
            <ul style='padding: 0;list-style-type: none;'>
            <li>O número escolhido é $number</li>
            <li>O seu antecessor é $before</li>
            <li>O seu sucessor é $after</li>
            </ul>"
      ?>
      <p><a href="javascript:history.go(-1)">Voltar</a></p>
   </main>

</body>
</html>