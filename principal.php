<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Comissão</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center text-yellow bg-primary">Controle de Comissão</h3>
        <p class="text-center text-info">
            <a href="Comissao.php">Comissão</a> |
            <a href="sobre.php">Sobre</a> |
            <a href="contato.php">Contato</a> |
            <a href="logout.php">Sair</a>
        </p>
        <p class="text-center">
            <figure>
                <p class="text-center"><img src="imagens/comissao-de-vendas.png" width="" alt="Comissão de Vendas"></p>
            <figcaption>
                <p class="text-center text-danger"><strong>Comissão de Vendas</strong></p>
            </figcaption>
            </figure>
        </p>
 

    <?php
    error_reporting(0); // Ignora possíveis erros de codificação
    session_start(); // Inicia a sessão
    // Verifica se a sessão do usuário está definida, através do comando isset
    if(isset($_SESSION['usuario'])) {
        echo "Seja-bem vindo " .$_SESSION["usuario"] . "<br>";
    } else {
        echo "Você precisa realizar o login!";
        //echo "<meta http-equiv='refresh' content='2;url=index.php'>";
        header("Location: index.php");
    }
    ?>   
    </div>
</body>
</html>

