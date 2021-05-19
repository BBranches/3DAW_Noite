<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inserir Disciplina</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
</head>

<body>
  <header id="header"> 
    <!--MENU-->
    <nav class="nav" id="nav">
      <ul class="lista">
        <li><a id="home" href="index.html">Home</a></li>
        <li><a class="btnMenu active" href="inserirDisc.php">Inserir Disciplinas</a></li>
        <li><a class="btnMenu" href="listarDisc">Buscar Disciplina</a></li>
        <li><a class="btnMenu" href="alterarDisc.php">Alterar Disciplina</a></li>
        <li><a class="btnMenu" href="excluirDisc.php">Excluir Disciplina</a></li>
      </ul>
    </nav>
  </header>

  <section>
    <form action="inserirDisc.php" method="POST" class="insert">
      <h1>Inserir Disciplina</h1>
      <br>
      <label for="id">ID:</label>
      <input type="text" name="id" id="id">
      <br>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
      <br>
      <label for="periodo">Período:</label>
      <input type="text" name="periodo" id="periodo">
      <br>
      <label for="idprerequisito">IDpreRequisito:</label>
      <input type="text" name="idprerequisito" id="idprerequisito">
      <br>
      <label for="creditos">Créditos:</label>
      <input type="text" name="creditos" id="creditos">
      <br>
      <input class="btn btninsert" type="submit" name="op" value="Inserir Disciplina">
    </form>
  </section>
</body>
</html>

<?php
setlocale (LC_ALL, 'pt_BR');
echo '<section>';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $periodo = $_POST["periodo"];
    $idPreRequisito = $_POST["idprerequisito"];
    $creditos = $_POST["creditos"];
    $op = $_POST["op"];
    
    $idValido = 0;
    $nomeValido = 0;
    $periodoValido = 0;
    $idPreRequisitoValido = 0;
    $creditosValido = 0;

    include 'connect.php';
    $sql = 0;

    if ($op =="Inserir Disciplina") {

      if (is_numeric($id)) {
        $idValido = 1;
      } else {
        echo "Insira um ID (numérico) válido.";
        echo "<br><br>";
      }
      if ($nome != "") {
        $nomeValido = 1;
      } else {
        echo "Preencha com o nome da disciplina.";
      }
      if (is_numeric($periodo)) {
        $periodoValido = 1;
        $periodo = $periodo."º";
      } else {
        echo "Insira o valor (numérico) do périodo.";
        echo "<br><br>";
      }
      if (is_numeric($idPreRequisito)) {
        $idPreRequisitoValido = 1;
      } else {
        echo "Insira um ID de Pré-Requisito (numérico) válido (0 caso não tenha).";
        echo "<br><br>";
      }
      if (is_numeric($creditos)) {
        $creditosValido = 1;
      } else {
        echo "Insira o valor (numérico) dos créditos.";
        echo "<br><br>";
      }

      if ($idValido != 1 || $nomeValido != 1 || $periodoValido != 1 || $idPreRequisitoValido != 1 || $creditosValido != 1) {
        echo "Preencha todos os campos com valores válidos.";  
      } else {
        $sql = "INSERT INTO disciplinas(id, nome, periodo, idprerequisito, creditos) VALUES ('$id', '$nome', '$periodo', '$idPreRequisito', '$creditos')";
        if ($conn->query($sql)) {
          echo "Disciplina $nome foi inserida no banco.";
        } else {
          echo "Erro ao inserir disciplina.";
        }  
      }
    }
  }
?>