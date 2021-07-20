<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'conexao.php';

    $sql = "SELECT * FROM produtos";
        
    $result = $conn->query($sql);

    if($result) {
      echo "<table>";
      echo "<caption><h1>Produtos</h1></caption>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Código de Barras</th><th>Nome</th><th>Categoria</th><th>Preço</th><th>Estoque</th>";
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
    
      $alterar = "./alterarProduto.html?id={$id}" . "&codigobarra=${codigoBarra}" . "&nome=${nome}" . "&fabricante=${fabricante}" . "&categoria=${categoria}" . "&tipo=${tipo}" . "&preco=${preco}" . "&qt=${qt}" . "&peso=${peso}" . "&descricao=${descricao}" . "&linkimg=${linkImg}" . "&data=${data}" . "&ativo=${ativo}";

      $detalhes = "./detalhesProduto.php?codigobarra=${codigoBarra}";
        
      if ($produto["ativo"] != 0) {
        echo "<tr>";
        echo "<td><span>{$codigoBarra}</span></td>";
        echo "<td><span><a class='detalhes' href=\"{$detalhes}\">{$nome}</a></span></td>";
        echo "<td><span>{$categoria}</span></td>";
        echo "<td><span>R$ {$preco}</span></td>";
        echo "<td><span>{$qt}</span></td>";
        echo "<td><span class='table'><a href=\"{$alterar}\"><button>Alterar</button></a></span></td>";
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