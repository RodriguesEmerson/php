<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./../../style.css">
   <title>Cotação Dolar</title>
</head>
<body>
   <header>
      <h1>Cotação Dolar</h1>
   </header>
   <main>
      <?php 
         $startDate = date("m-d-Y", strtotime("-7 days")); //7 dias anteriores
         $endDate = date("m-d-Y");
         $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$startDate.'\'&@dataFinalCotacao=\''.$endDate.'\'&$top=100&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

         $dados = json_decode(file_get_contents($url), true);
         // var_dump($dados);

         //Para esse codigo funcionar é preciso ativar o extension=intl no php.ini
         $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

         $valor = $_GET["valor"] ?? 0;
         $cotacaoAtual = $dados["value"][0]["cotacaoCompra"];
         $valorEmDolar = $valor / $cotacaoAtual;

         echo "<p>O valor de <strong>". numfmt_format_currency($padrao, $valor, "BRL") . "</strong> equivalem à <strong>" . numfmt_format_currency($padrao, $valorEmDolar, "USD") ."</strong>.</p>"
      ?>
      <button onclick="javascript:history.go(-1)">Voltar</button>
   </main>
</body>
</html>