<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Comissão - Editar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <p class="text-center">
            <img src="imagens/comissao.png" alt="Cadastro da Comissão" width="30%">
        </p>
        <?php
        echo "<h4 class='text-center text-info'>Controle de Comissão - Editar</h4>";
        require "conexao.php";
        $idcomissao = $_REQUEST["idcomissao"]; // Recupera o idvendedor referente a pesquisa efetuada
        $sql = "SELECT tbcomissao.idcomissao, tbcomissao.idcomissao_vendedor, tbvendedor.vendedor, 
            tbcomissao.data, tbcomissao.valor_venda, tbcomissao.percentual_comissao FROM tbcomissao
            INNER JOIN tbvendedor ON tbvendedor.idvendedor = tbcomissao.idcomissao_vendedor WHERE idcomissao='$idcomissao'";
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        $linha = mysqli_fetch_array($resultado);
        $idcomissao         =   $linha["idcomissao"];
        $idcomissao_vendedor =   $linha["idcomissao_vendedor"];
        $vendedor           =   $linha["vendedor"];
        $data               =   $linha["data"];
        $valor_venda        =   $linha["valor_venda"];
        $percentual_comissao =   $linha["percentual_comissao"];

        echo "<form name='comissao' method='post' action=''>";
        echo "<table>";
        echo "<tr>";
        echo "<td><label>idComissao:</label></td>";
        echo "<td><input type='text' name='idcomissao' size='5' value='$idcomissao' readonly>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";

        echo "<label for='IDVendedor'>Vendedor:</label></td>";
        echo "<td><input type='hidden' name='idcomissao_vendedor' size='5' value='$idcomissao_vendedor' required>";
        echo "<select name='IDVendedor' id='IDVendedor'>";
        echo "<option>$vendedor<option>";
        $pesquisa = "SELECT * FROM tbvendedor ORDER BY vendedor";
        $sql = mysqli_query($conexao, $pesquisa) or die(mysqli_error($conexao));

        while ($campo = mysqli_fetch_row($sql)) {
            echo "<option value=$campo[0]> $campo[1]</option> ";
        };
        echo "</td>";
        echo "</tr>";
        echo "</select>";
        echo "<tr>";
        echo "<td><label>Data:</label></td>";
        echo "<td><input type='date' name='data' value='$data' required></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>Valor da Venda:</label></td>";
        echo "<td><input type='number' name='valor_venda' step='0.01' min='0' max='99999' value='$valor_venda' required>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><label>% Comissão:</label></td>";
        echo "<td><input type='number' name='percentual_comissao' step='0.01' min='0' max='99999' value='$percentual_comissao' required>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' align='center'><input type='submit' value='Editar' name='editar' class='btn btn-primary'>";
        echo "&nbsp;<a href='Comissao_Pesquisar.php' class='btn btn-danger'>Voltar</a></td>";
        echo "</tr>";
        echo "</td>";
        echo "</table>";
        echo "</form>";

        if (isset($_POST['editar'])) {
            $idcomissao             =   $_POST["idcomissao"];
            $idcomissao_vendedor    =   $_POST["IDVendedor"];
            $data                   =   $_POST["data"];
            $valor_venda            =   $_POST["valor_venda"];
            $percentual_comissao    =   $_POST["percentual_comissao"];
            $sql = "UPDATE tbcomissao SET idcomissao_vendedor='$idcomissao_vendedor', data='$data', valor_venda='$valor_venda', percentual_comissao = '$percentual_comissao' WHERE idcomissao='$idcomissao'";
            mysqli_query($conexao, $sql)  or die(mysqli_error($conexao));
            echo "<script type=\"text/javascript\">alert('Comissão Editada com sucesso!'); </script>";
            echo '<script>window.location.href = window.location.href;</script>';
        }
        ?>
    </div>
</body>

</html>