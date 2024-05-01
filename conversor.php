<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valor do seu real em dolar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php


$inicio= date ("m-d-Y", strtotime(" -7 days "));
$Fim= date ("m-d-Y");
date_default_timezone_set("America/Sao_Paulo");
//cotação da moeda dólar
$url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$Fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
$dados = json_decode(file_get_contents($url), true);



//variavel de um valor x em reais
    ($_SERVER["REQUEST_METHOD"] == "GET"); {
    if (isset($_GET["DINHEIRO"])) {
    $real = (double)$_GET["DINHEIRO"];
    $Dolarcotacao = $dados["value"][0]["cotacaoCompra"];
    $dolar = $real / $Dolarcotacao;

$padrão = numfmt_create("pt,BR", NumberFormatter::CURRENCY);

ECHO "Seus" . numfmt_format_currency($padrão, $real, "BRL") . "equivalem a" . numfmt_format_currency($padrão, $dolar, "USD");

    } else {
    echo "PREENCHA COM UM VALOR VALIDO";
    }

}
?>
    <button onclick="goBack()"> Voltar para a página anterior </button>
    
    
    <script>
function goBack (){
window.history.back(history.go(-1));
}
</script>

</body>
</html>




















