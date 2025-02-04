<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./../../style.css">
   <title>Números Aleatórios</title>
</head>

<body>
   <header>
      <h1>Números Aleatórios</h1>
   </header>
   <main>

      <button onclick="generateRandonNumber()">Gerar Número</button>
      <p>O número gerado foi <strong id="randonNumber">0</strong>!</p>
 
      <script>
         function generateRandonNumber(){
            fetch("randonNumber.php")
            .then(response => response.text())
            .then(txt => {
               document.querySelector("#randonNumber").textContent = `${txt}`
            })
         }
      </script>
   </main>

</body>

</html>