<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Detalhes Produto</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
</head>

<body>
<header id="header">
    <!--MENU-->
    <nav class="nav" id="nav">
      <ul class="lista">
        <li><a class="btnMenu" id="home" href="index.html">Home</a></li>
        <li><a class="btnMenu" href="inserirProduto.html">Inserir Produto</a></li>
        <li><a class="btnMenu" href="listarProduto.html">Listar Produto</a></li>
        <li><a class="btnMenu" href="excluirProduto.html">Excluir Produto</a></li>
      </ul>
    </nav>
  </header>
  <section>
    <div id="detalhes" class="detalhes">
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';

  $codigoBarra = $_GET["codigobarra"];

  $sql = "SELECT * FROM produtos";
  $result = $conn->query($sql);

  while ($produto = $result->fetch_assoc()) {
    if ($produto["codigobarra"] == $codigoBarra) {
      echo "<img src=\"{$produto["linkimg"]}\">";
      echo "<h3>ID:</h3> {$produto["id"]}";
      echo "<h3>Código de Barras:</h3> {$produto["codigobarra"]}";
      echo "<h3>Nome:</h3> {$produto["nome"]}";
      echo "<h3>Fabricante:</h3> {$produto["fabricante"]}";
      echo "<h3>Categoria do Produto:</h3> {$produto["categoria"]}";
      echo "<h3>Tipo do Produto:</h3>{$produto["tipo"]}";
      echo "<h3>Preço de Venda:</h3> {$produto["preco"]}";
      echo "<h3>Quantidade em Estoque:</h3> {$produto["qt"]}";
      echo "<h3>Peso em gramas:</h3> {$produto["peso"]}";
      echo "<h3>Descrição:</h3>{$produto["descricao"]}";
      echo "<h3>Data de Inclusão:</h3> {$produto["data"]}";
      echo "<h3>Ativo:</h3> {$produto["ativo"]}";    
    }
  }
}
?>
</div>
</section>
</body>
</html>