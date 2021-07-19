<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'conexao.php';
    
    $codigobarra = $_GET["buscacodigo"];
    $codigoValido = 0;
    $sql = 0;

    if (is_numeric($codigobarra)) {
      $codigoValido = 1;
    } else {
      echo "Insira um Código de Barras (numérico) válido.";
      echo "<br><br>";
      }
  
    if($codigoValido === 1) {
      $sql = "SELECT * FROM produtos WHERE codigobarra=$codigobarra";
    }
        
    $result = $conn->query($sql);

    if($result) {
      echo "<table>";
      echo "<caption><h1>Produtos</h1></caption>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Código de Barras</th><th>Nome</th><th>Categoria</th><th>Qt Estoque</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
    
     while ($produto = $result->fetch_assoc()) {
        $id = $produto["id"];
        $codigoBarra = $produto["codigobarra"];
        $nome = $produto["nome"];
        $fabricante = $produto["fabricante"];
        $categoria = $produto["categoria"];
        $tipo = $produto["tipo"];
        $preco = $produto["preco"];
        $qt = $produto["qt"];
        $peso = $produto["peso"];
        $descricao = $produto["descricao"];
        $linkImg = $produto["linkimg"];
        $data = $produto["data"];
        $ativo = $produto["ativo"];
    
        $excluir = "./excluirProdutoDetalhes.html?id={$id}" . "&codigobarra=${codigoBarra}" . "&nome=${nome}" . "&fabricante=${fabricante}" . "&categoria=${categoria}" . "&tipo=${tipo}" . "&preco=${preco}" . "&qt=${qt}" . "&peso=${peso}" . "&descricao=${descricao}" . "&linkimg=${linkImg}" . "&data=${data}" . "&ativo=0";
        
        if ($produto["ativo"] == 1) {
          echo "<tr>";
          echo "<td>{$codigoBarra}</td>";
          echo "<td>{$nome}</td>";
          echo "<td>{$categoria}</td>";
          echo "<td>{$qt}</td>";
          echo "<td><a href=\"{$excluir}\"><button>Excluir</button></a></td>";
          echo "</tr>";
        }
      }
    
      echo "</tbody>";
      echo "</table>";   
    } else {
        echo "Erro ao buscar produto.";
        }
}
?>