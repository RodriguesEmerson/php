<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./../style.css">

   <title>Superglobais</title>
</head>
<body>
   <main>
      <pre>
         <?php 
            setcookie("dia-da-semana", "SEGUNDA", time() + 3600);
            $_SESSION["teste"] = "SessionSetada";

            echo "<h1> Supergobal GET</h1>";
            var_dump($_GET);

            echo "<h1> Supergobal POST</h1>";
            var_dump($_POST);

            echo "<h1> Supergobal REQUEST</h1>";
            var_dump($_REQUEST);

            echo "<h1> Supergobal  COOKIE</h1>";
            var_dump($_COOKIE);

            echo "<h1> Supergobal  SESSION</h1>";
            var_dump($_SESSION);
         ?>
      </pre>
   </main>
</body>
</html>