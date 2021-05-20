<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alterar Disciplina</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>
  <header id="header"> 
    <!--MENU-->
    <nav class="nav" id="nav">
      <ul class="lista">
        <li><a id="home" href="index.html">Home</a></li>
        <li><a class="btnMenu" href="inserirDisc.php">Inserir Disciplinas</a></li>
        <li><a class="btnMenu" href="listarDisc">Buscar Disciplina</a></li>
        <li><a class="btnMenu active" href="alterarDisc.php">Alterar Disciplina</a></li>
        <li><a class="btnMenu" href="excluirDisc.php">Excluir Disciplina</a></li>
      </ul>
    </nav>
  </header>
  <section>
    <form action="alterarDisc.php" method="POST" class="update">
      <h1>Alterar Disciplina</h1>
      <br>
      <label for="id">ID da Disciplina:</label>
      <input type="text" name="id" id="id">
      <br>
      <label for="operacao">Campo de alteração:</label>
      <select name="operacao">
        <option name="operacao"></option>
        <option name="operacao" value="idoutro">ID</option>
        <option name="operacao" value="nome">Nome</option>
        <option name="operacao" value="periodo">Período</option>
        <option name="operacao" value="idprerequisito">IDpreRequisito</option>
        <option name="operacao" value="creditos">Créditos</option>
      </select>
      <br>
      <label for="novovalor">Novo valor:</label>
      <input type="text" name="novovalor" id="novovalor">
      <br>
      <input class="btn btninsert" type="submit" name="op" value="Alterar Disciplina">
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

      if ($op =="Alterar Disciplina") {
        if (is_numeric($id)) {
          $idValido = 1;
        } else {
          echo "Insira um ID (numérico) válido.";
          echo "<br><br>";
        }

        if($idValido == 1) {
          if ($operacao == "idoutro") {
            if (is_numeric($novoValor)) {
              $novoValorValido = 1;
            } else {
              echo "Insira um novo ID (numérico) válido.";
              echo "<br><br>";
            }
            if($novoValorValido == 1) {
              $sql = "UPDATE `disciplinas` SET `id`='$novoValor' WHERE id = '$id'";
            }
          } elseif ($operacao == "nome") {
              if ($novoValor != "") {
                $novoValorValido = 1;
              } else {
                echo "Preencha com o novo nome da disciplina.";
                echo "<br><br>";
              }
              if($novoValorValido == 1) {
                $sql = "UPDATE `disciplinas` SET `nome`='$novoValor' WHERE id = '$id'";
              }
          } elseif ($operacao == "periodo"){
              if (is_numeric($novoValor)) {
                $novoValorValido = 1;
                $novoValor = $novoValor."º";
              } else {
                echo "Insira o novo valor (numérico) do périodo.";
                echo "<br><br>";
              }
              if($novoValorValido == 1) {
                $sql = "UPDATE `disciplinas` SET `periodo`='$novoValor' WHERE id = '$id'";
              }
          } elseif ($operacao == "idprerequisito"){
              if (is_numeric($novoValor)) {
                $novoValorValido = 1;
              } else {
                echo "Insira um novo ID de Pré-Requisito (numérico) válido (0 caso não tenha).";
                echo "<br><br>";
              }
              if($novoValorValido == 1) {
                $sql = "UPDATE `disciplinas` SET `idprerequisito`='$novoValor' WHERE id = '$id'";
              }
          } elseif ($operacao == "creditos") {
              if (is_numeric($novoValor)) {
                $novoValorValido = 1;
              } else {
                echo "Insira o novo valor (numérico) dos créditos.";
                echo "<br><br>";
              }
              if($novoValorValido == 1) {
                $sql = "UPDATE `disciplinas` SET `creditos`='$novoValor' WHERE id = '$id'";
              }
          }
        
          $result = $conn->query($sql);
          if ($result) {
            echo "Disciplina alterada com sucesso!";
          } else {
            echo "Erro ao alterar disciplina!";
          }
        }
      }
    }
?>