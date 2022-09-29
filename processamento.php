<?php
    // tratamento data-hora
    date_default_timezone_set("America/Sao_Paulo");
    $mes = date('M');
    $mes_portugues = array(
        'Jan' => 'JAN',
        'Feb' => 'FEV',
        'Mar' => 'MAR',
        'Apr' => 'ABR',
        'May' => 'MAI',
        'Jun' => 'JUN',
        'Jul' => 'JUL',
        'Aug' => 'AGO',
        'Sep' => 'SET',
        'Oct' => 'OUT',
        'Nov' => 'NOV',
        'Dec' => 'DEZ'
    );
    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
    } else {
        $nome = "";
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    } else {
        $email = "";
    }
    if (isset($_POST["telefone"])) {
        $telefone = $_POST["telefone"];
    } else {
        $telefone = "";
    }
    if (isset($_POST["data"])) {
        $data = $_POST["data"];
    } else {
        $data = "";
    }
    if (isset($_POST["valor"])) {
        $valor = $_POST["valor"];
    } else {
        $valor = 0;
    }

    // tratamento de primeiro nome
    $primeiro_nome = explode(" ", $nome);


    // criando arquivo texto
    $formulario = fopen('formulario.txt','a+');
    if($formulario == false){
        die('Não foi possível criar o arquivo.');
    }
    fwrite($formulario, "$nome;$email;$telefone;$data;$valor".PHP_EOL);
    fclose($formulario);

    // calculo imposto sobre valor doado
    $desc_rf=$valor*0.04;
    $valor_liq=$valor*0.96;
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="./assets/css/reset.css" type="text/css" rel="stylesheet">
        <link href="./assets/css/processamento-page.css" type="text/css" rel="stylesheet">

        <link rel = "shortcut icon" type = "imagem/x-icon" href = "./assets/img/check-icone.png"/>

        <title>Transação bem sucedida!</title>
    </head>
    <body>
        <div class="bcg-recibo">
            <h1>Obrigado pela doação, <?php echo $primeiro_nome[0]?>!</h1> 

            <div> <i> <?php 
                echo date('d') . " " .  $mes_portugues["$mes"] . " " . date('Y') . ", " . date("H:i:s"); 
            ?></i></div>
            
            <img class="img-check" src="./assets/img/check-icone.png" title="teste"> 

            <p class="transacao-sucesso">
                Sua transação no valor de <b> R$ <?php echo number_format($valor,2,",",".")?> </b> foi processada com sucesso.
            </p>

            <span class="comprovante-email">Fique tranquilo, o recibo da sua doação foi encaminhado para o e-mail <?php echo $email ?></span>

            
            <div class="valores-recibo">
                <div class="desc-esquerda">
                    <span class="valor-doacao">Valor Recebido</span>
                    <span class="valor-descontado"><a href="https://portal.fazenda.sp.gov.br/servicos/itcmd/Paginas/Sobre.aspx" target="_blank" title="Imposto sobre Transmissão Causa Mortis e Doação de Quaisquer Bens ou Direitos (clique para mais detalhes)">ITCMD </a></span>
                    <span class="valor-total">Valor Total</span>
                </div>

                <div class="vlr-direita">
                    <span class="valor-doacao"><?php echo number_format($valor,2,",",".")?></span>
                    <span class="valor-descontado"> <?php echo number_format($desc_rf,2,",",".");?></span>
                    <span class="valor-total"><?php echo number_format($valor_liq,2,",",".");?></span>
                </div>
            </div>
        <div>
    </body>
</html>