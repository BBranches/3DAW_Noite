<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Excluir Disciplina</title>
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
        <li><a class="btnMenu" href="alterarDisc.php">Alterar Disciplina</a></li>
        <li><a class="btnMenu active" href="excluirDisc.php">Excluir Disciplina</a></li>
      </ul>
    </nav>
  </header>
  <section>
    <form action="excluirDisc.php" method="POST" class="insertOne">
      <h1>Excluir Disciplina</h1>
      <br>
      <label for="id">ID:</label>
      <input type="text" name="id" id="id">
      <br>
      <h3>OU</h3>
      <br>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
      <br>
      <input class="btn" type="submit" name="op" value="Excluir Disciplina">
    </form>
  </section>
</body>
</html>

<?php
setlocale (LC_ALL, 'pt_BR');
echo '<section>';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $op = $_POST["op"];
    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $idValido = 0;
    $nomeValido = 0;

    include 'connect.php';
    $sql = 0;
      
    if ($op == "Excluir Disciplina") {
      if (is_numeric($id)) {
        $idValido = 1;
      }
      if ($nome != "") {
        $nomeValido = 1;
      }

      if ($idValido == 1 && $nomeValido == 1) {
        echo "Escolha apenas uma opção: ou ID ou Nome";
      } elseif ($idValido == 0 && $nomeValido == 0) {
        echo "Escolha uma das opções: ou ID ou Nome";
      } else {
        $sql = "DELETE FROM `disciplinas` WHERE id = '$id' || nome = '$nome'";
      
        if($conn->query($sql)) {
          echo "Disciplina excluída com sucesso!";
        } else {
          echo "Erro ao excluir disciplina.";
        }
      }
    }
  }
?>