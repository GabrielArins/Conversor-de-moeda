<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
    Conversor de dolar
    </h1>
   
    <header>
        <main>
            
            <?php 

                $inicio = date("m-d-Y", strtotime('-7 days'));
                $fim = date("m-d-Y");
             
             
             $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
            
             $dados = json_decode(file_get_contents($url), true);

             // var_dump($dados); para ver como os dados saem

             $dolar = $dados ["value"][0]["cotacaoCompra"];


             $real = $_GET ["valor"] ?? 0;
             $conversao = $real / $dolar;
             print "Sua conversão para dolar é U$" . round($conversao)
            
            ?>
        </main>
    </header>
    
</body>
</html>