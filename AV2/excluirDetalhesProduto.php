<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Detalhes Produto - Excluir</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
</head>

<body>
  <section>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';
  
  function validarCodigoBarra($codigoBarra){
    if (is_numeric($codigoBarra)) {
      $result = 1;
    } else{
      echo "Insira um Código de Barras (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }
  function validarCodigoBarraExistente($codigoBarra, $conn) {
    $sqlCod = "SELECT codigobarra FROM produtos WHERE codigobarra = $codigoBarra";
    $result = $conn->query($sqlCod);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;
  }

  $codigoBarra = $_GET["codigobarra"];
  $sql = 0;

  if(validarCodigoBarra($codigoBarra) === 1 && validarCodigoBarraExistente($codigoBarra, $conn) === 1) {
    $sql = "SELECT * FROM produtos";

    $result = $conn->query($sql);

    while ($produto = $result->fetch_assoc()) {
      if ($produto["codigobarra"] == $codigoBarra) {
        if($produto["ativo"] == 1) {
          echo '<div id="excluirdetalhes" class="detalhes">';
          echo "<img src=\"{$produto["linkimg"]}\">";
          echo "<h3>ID:</h3> {$produto["id"]}";
          echo "<h3>Código de Barras:</h3> {$produto["codigobarra"]}";
          echo "<h3>Nome:</h3> {$produto["nome"]}";
          echo "<h3>Fabricante:</h3> {$produto["fabricante"]}";
          echo "<h3>Categoria do Produto:</h3> {$produto["categoria"]}";
          echo "<h3>Tipo do Produto:</h3>{$produto["tipo"]}";
          echo "<h3>Preço:</h3> {$produto["preco"]}";
          echo "<h3>Quantidade em Estoque:</h3> {$produto["qt"]}";
          echo "<h3>Peso em gramas:</h3> {$produto["peso"]}";
          echo "<h3>Descrição:</h3>{$produto["descricao"]}";
          echo "<h3>Data de Inclusão:</h3> {$produto["data"]}";
          echo "<h3>Ativo:</h3> {$produto["ativo"]}";   
          echo '<form action="" method="GET" name="Produtos" class="excluirdetalhes" id="formExcluir"><input class="btninsert" name="button" type="button" value="Excluir" onclick="excluirProduto()"></form>';
        } else {
            echo "<div id='det'>";
            echo "Produto Inativo.";
          } 
      }
    } 
  } else {
    echo "Produto Inexistente.";
  }
}
?>
</section>
</body>
</html>