<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Comissão por Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        a {
            color: white;
        }

        a:hover{
            background-color: blue;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">        
        <p class="text-center p-3 mb-2 bg-primary"> 
            <form name="comissao" method="post" action="">
                <label>Informe a Data Inicial e a Data Final: </label>
                <input type="date" name="DataInicial">
                <input type="date" name="DataFinal">
                <input type="subimit" name="pesquisar" value="Pesquisar" class="btn btn-primary">
            </form>
            <?php
                if(isset($_POST["pesquisar"])) {
                    $Data_Inicial = $_POST["DataInicial"];
                    $Data_Final = $_POST["DataFinal"];


                    require "conexao.php";
                    $sql = "SELECT tbcomissao.idcomissao, tbcomissao.idcomissao_vendedor, tbvendedor.vendedor,
                    tbcomissao.data, tbcomissao.valor_venda, tbcomissao.percentual_comissao FROM tbcomissao
                    INNER JOIN tbvendedor ON tbvendedor.idvendedor = tbcomissao.idcomissao_vendedor WHERE data BETWEEN
                    '$Data_Inicial' AND '$Data_Final'";
                    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                    echo "<table align='center'>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nome do vendedor</th>";
                        echo "<th>Data</th>";
                        echo "<th>Vl.Venda</th>";
                        echo "<th>% Com</th>";
                        echo "<th>Vl.Comissão</th>";
                        echo "<th>Editar</th>";
                    echo "</tr>";
                    while($linha=mysqli_fetch_array($resultado)) {
                        $idcomissao             =   $linha["idcomissao"];
                        $vendedor               =   $linha["vendedor"];
                        $data                   =   $linha["data"];
                        $valor_venda            =   $linha["valor_venda"];
                        $percentual_comissao    =   $linha["percentual_comissao"];
    
                        echo "<tr>";
                            echo "<td align='right'>$idcomissao</td>";
                            echo "<td align='left'>$vendedor</td>";
                            $Data_Formato_Brasil = substr($data, 8,2) . "/" . substr($data, 5,2) . "/" . substr($data, 0,4) ;
                            echo "<td align='left'>$Data_Formato_Brasil</td>";
                            $Valor_Venda = number_format($valor_venda, 2, ",",".");
                            echo "<td align='right'>R$ $Valor_Venda</td>";
                            $Percentual_Comissao = number_format($percentual_comissao, 2, ",",".");
                            echo "<td align='right'>$Percentual_Comissao</td>";                        
                            $Total_Comissao = ($valor_venda * $percentual_comissao) / 100;
                            $Valor_Da_Comissao = number_format($Total_Comissao, 2, ",",".");
                            echo "<td align='right'>R$ $Valor_Da_Comissao</td>";
                            echo "<td><a href='Comissao_Editar.php?idcomissao=$idcomissao'>Editar</a></td>";
                        echo "<tr>";
                    }
                echo "</table>";   
                }
            ?>
        </p>
    </div>
</body>
</html>