<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h3 class="text-center text-info">Controle de Comissão - Cadastro de Usuários</h3>
    <form name="login" method="post" action="">
        <p>
            <label>Informe o nome do usuário:</label><br>
            <input type="text" name="usuario" size="30" maxlength="30" required>
        </p>
        <p>
            <label>Senha:</label><br>
            <input type="password" name="senha" size="20" maxlength="20" required>
        </p>
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
        <a href='index.php' class="btn btn-danger">Efetuar Login</a>
    </form>
    <?php
        if(isset($_POST["cadastrar"])) {
            $usuario    =   $_POST["usuario"];
            $senha      =   $_POST["senha"];
            require "conexao.php";
            $sql="INSERT INTO tbusuarios(idusuario, usuario, senha)";
            $sql.=" VALUES(null,'$usuario','$senha')" or die(mysqli_error($conexao));
            mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            echo "<script type=\"text/javascript\">alert('Usuário Cadastrado com sucesso!'); </script>";
        }
    ?>
</div>
</body>
</html>