<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header id="header"> 
    <!--MENU-->
    <nav class="nav" id="nav">
      <ul class="lista">
        <li><a id="home" href="index.html">Home</a></li>
        <li><a class="btnMenu" href="inserirUser.php">Inserir Usuário</a></li>
        <li><a class="btnMenu" href="listarUser">Buscar Usuário</a></li>
        <li><a class="btnMenu active" href="alterarUser.php">Alterar Usuário</a></li>
        <li><a class="btnMenu" href="excluirUser.php">Excluir Usuário</a></li>
      </ul>
    </nav>
  </header>	
  <section>
    <form action="alterarUser.php" method="POST" class="update">
      <h1>Alterar Usuário</h1>
      <br>
      <label for="perfil">Perfil do Usuário:</label>
      <input type="text" name="perfil" id="perfil">
      <br>
      <label for="operacao">Campo de alteração:</label>
      <select name="operacao">
        <option name="operacao"></option>
        <option name="operacao" value="nome">Nome</option>
        <option name="operacao" value="email">E-mail</option>
        <option name="operacao" value="senha">Senha</option>
        <option name="operacao" value="tipo">Tipo</option>
        <option name="operacao" value="perfiloutro">Perfil</option>
      </select>
      <br>
      <label for="novovalor">Novo valor:</label>
      <input type="text" name="novovalor" id="novovalor">
      <br>
      <input class="btn btninsert" type="submit" name="op" value="Alterar Usuário">
    </form>
  </section>
</body>
</html>

<?php
setlocale (LC_ALL, 'pt_BR');
echo '<section>';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $operacao = $_POST["operacao"];
      $op = $_POST["op"];
      $novoValor = $_POST["novovalor"];
      $perfil = $_POST["perfil"];

      include 'connect.php';
      $sql = 0;

      if ($op =="Alterar Usuário") {

        if ($operacao == "perfiloutro") {
          $sql = "UPDATE `usuarios` SET `perfil`='$novoValor' WHERE perfil = '$perfil'";
        } elseif ($operacao == "nome") {
          $sql = "UPDATE `usuarios` SET `nome`='$novoValor' WHERE perfil = '$perfil'";
        } elseif ($operacao == "email"){
          $sql = "UPDATE `usuarios` SET `email`='$novoValor' WHERE perfil = '$perfil'";
        } elseif ($operacao == "senha"){
          $sql = "UPDATE `usuarios` SET `senha`='$novoValor' WHERE perfil = '$perfil'";
        } elseif ($operacao == "tipo") {
          $sql = "UPDATE `usuarios` SET `tipo`='$novoValor' WHERE perfil = '$perfil'";
        }
        if ($conn->query($sql)) {
          echo "Usuário alterado com sucesso!";
        } else {
          echo "Erro ao alterar usuário!";
        }
    }
  }
?>