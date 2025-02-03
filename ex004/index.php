<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Formulários</title>
</head>
<body>
   <header>
      <h1>Pegando dados do Formulário em PHP</h1>
   </header>
   <section>
      <form action="cad.php" method="get">
         <label for="idnome">Nome</label>
         <input type="text" name="nome" id="idnome">
         <label for="idsobrenome">Sobrenome</label>
         <input type="text" name="sobrenome" id="idsobrenome">
         <input type="submit" value="Enviar">
      </form>
   </section>

</body>
</html>