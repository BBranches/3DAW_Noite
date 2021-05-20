<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
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
      <label for="id">ID do Usuário:</label>
      <input type="text" name="id" id="id">
      <br>
      <label for="operacao">Campo de alteração:</label>
      <select name="operacao">
        <option name="operacao"></option>
        <option name="operacao" value="idoutro">ID</option>
        <option name="operacao" value="nome">Nome</option>
        <option name="operacao" value="email">E-mail</option>
        <option name="operacao" value="senha">Senha</option>
        <option name="operacao" value="tipo">Tipo</option>
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
      $id = $_POST["id"];

      $idValido = 0;
      $novoValorValido = 0;

      include 'connect.php';
      $sql = 0;

      if ($op =="Alterar Usuário") {
        if (is_numeric($id)) {
          $idValido = 1;
        } else {
          echo "Insira um ID (numérico) válido.";
          echo "<br><br>";
        }

        if ($operacao == "idoutro") {
          if ($novoValor != "") {
            $novoValorValido = 1;
          } else {
            echo "Preencha com um novo ID (numérico) válido.";
            echo "<br><br>";
          }
          if($novoValorValido == 1) {
            $sql = "UPDATE `usuarios` SET `id`='$novoValor' WHERE id = '$id'";
          }
        } elseif ($operacao == "nome") {
            if ($novoValor != "") {
              $novoValorValido = 1;
            } else {
              echo "Preencha com o novo nome do usuário.";
              echo "<br><br>";
            }
            if($novoValorValido == 1) {
              $sql = "UPDATE `usuarios` SET `nome`='$novoValor' WHERE id = '$id'";
            }
        } elseif ($operacao == "email"){
            if ($novoValor != "") {
              $novoValorValido = 1;
            } else {
              echo "Preencha com o novo email do usuário.";
              echo "<br><br>";
            }
            if($novoValorValido == 1) {
              $sql = "UPDATE `usuarios` SET `email`='$novoValor' WHERE id = '$id'";
            }
        } elseif ($operacao == "senha"){
            if ($novoValor != "") {
              $novoValorValido = 1;
            } else {
              echo "Preencha com a nova senha do usuário.";
              echo "<br><br>";
            }
            if($novoValorValido == 1) {
              $sql = "UPDATE `usuarios` SET `senha`='$novoValor' WHERE id = '$id'";
            }
        } elseif ($operacao == "tipo") {
            if ($novoValor != "") {
              $novoValorValido = 1;
            } else {
              echo "Preencha com o novo tipo de usuário.";
              echo "<br><br>";
            }
            if($novoValorValido == 1) {
              $sql = "UPDATE `usuarios` SET `tipo`='$novoValor' WHERE id = '$id'";
            }
        }

        if ($conn->query($sql)) {
          echo "Usuário alterado com sucesso!";
        } else {
          echo "Erro ao alterar usuário!";
        }
     }
   }
?>