<?php 
// phpinfo();
// tratamento data-hora
date_default_timezone_set("America/Sao_Paulo");
$mes = date('M');
$mes_portugues = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Março',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Nov' => 'Novembro',
    'Dec' => 'Dezembro'
);

$today = date("d/m/Y");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./assets/css/reset.css" type="text/css" rel="stylesheet">
    <link href="./assets/css/home-page.css" type="text/css" rel="stylesheet">

    <link rel = "shortcut icon" type = "imagem/x-icon" href = "./assets/img/doacao-icon.png"/>

    <title>PHP Donations Foundation</title>
</head>
<body> 
    <div class="full-page">
        <header class="header-bar">
            <div>
                <img src="./assets/img/doacao-icon.png" class="img-donation">
            </div>
            
            <div>
                <h1>
                    PHP Donations Foundation
                </h1>

                <span>
                    <?php 
                        echo "Jundiaí, " . date("d") . " de " . $mes_portugues["$mes"] . " de " . date("Y"); 
                    ?>
                </span>
            </div>
        </header>

        <main class="content-box">

        <p class="main-descricao"> A PHP Donations Foundation é uma organização sem fins lucrativos fundada em 2022 pelos sócios João, Lucas, Max e Vinicius.<br> Sua proposta é arrecadar, processar e distribuir doações monetárias para instituições de ensino da área de tecnologia, de maneira totalmente automatizada e integrada.
        </p>

        <span class="second-descricao">Nos campos abaixo, você pode <strong>fazer a diferença</strong> doando valores a partir de R$0,10. </span>
       

            <form action="./processamento.php" method="post">
                <fieldset>
                    <div class="linha-form">
                        <div class="default-camp">
                            <label>Nome</label>
                            <input type="text" name="nome" placeholder="Fulano da Silva" required/>
                        </div>

                        <div class="default-camp data">
                            <label>Data</label>
                            <input type="text" name="data" value="<?php echo $today; ?>" readonly/>
                        </div> 
                    </div>

                    <div class="linha-form">
                        <div class="default-camp">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="fulano@gmail.com" required/>
                        </div>

                        <div class="default-camp">
                            <label>Telefone</label>
                            <input type="number" name="telefone" placeholder="(DDD) 9 1234-5678" required/>
                        </div>
                    </div>
                    
                    <div class="linha-form doa">
                        <div class="default-camp">
                            <label>Valor para doação (R$)</label>    
                            <input type="number" name="valor" min="0.1" step="0.1" placeholder="R$ 10.000.000,00" required/>
                        </div>
                    </div>

                    <input class="submit-btn" type="submit" name="enviar" value="CONTRIBUIR"/>
                    
                </fieldset>
            </form>
        </main>
    </div>

    <footer>
        © 2022 PHP Donations Foundation, Inc.
    </footer>
</body>
</html>