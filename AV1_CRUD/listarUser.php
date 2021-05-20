<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buscar Usuário</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
  <script src="https://kit.fontawesome.com/d924a7553c.js" crossorigin="anonymous"></script>
</head>

<body>
  <header id="header"> 
    <!--MENU-->
    <nav class="nav" id="nav">
      <ul class="lista">
        <li><a id="home" href="index.html">Home</a></li>
        <li><a class="btnMenu" href="inserirUser.php">Inserir Usuário</a></li>
        <li><a class="btnMenu active" href="listarUser">Buscar Usuário</a></li>
        <li><a class="btnMenu" href="alterarUser.php">Alterar Usuário</a></li>
        <li><a class="btnMenu" href="excluirUser.php">Excluir Usuário</a></li>
      </ul>
    </nav>
  </header>

  <section>
    <form action="listarUser.php"  method="POST">
      <h1>Buscar Usuário</h1>
      <br>
      <label for="id">ID:</label>
      <input type="text" name="id" id="id">
      <br>
      <h3>OU</h3>
      <br>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
      <br>
      <input class="btn" type="submit" name="op" value="Buscar Usuário">
      <br><hr/><br>
      <input class="btn" type="submit" name="op" value="Listar Todos Usuários">
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

    if ($op == "Listar Todos Usuários") {
      $sql = "SELECT * FROM usuarios";
    } elseif ($op == "Buscar Usuário") {
        if (is_numeric($id)) {
          $idValido = 1;
        } 
        if ($nome != "") {
          $nomeValido = 1;
        } 

        if ($idValido == 1 && $nomeValido == 1) {
          echo "Escolha apenas uma opção: ou ID ou Nome";
          echo "<br><br>";
        } elseif ($idValido == 0 && $nomeValido == 0) {
          echo "Escolha uma das opções: ou ID ou Nome";
          echo "<br><br>";
        } else {
          $sql = "SELECT * FROM usuarios WHERE id = '$id' || nome = '$nome'";
        }
    }
    
    $result = $conn->query($sql);
    if($result) {
      echo "<table>";
      echo "<tr>";
      echo "<th>ID</th><th>Nome</th><th>E-mail</th><th>Senha</th><th>Tipo</th>";
      echo "<br>";
      while ($linha = $result->fetch_assoc()) {
        echo "<tr><tr><tr>";
        echo "<td> " . $linha["id"] . "</td>";
        echo "<td> " . $linha["nome"] . "</td>";
        echo "<td> " . $linha["email"] . "</td>";
        echo "<td> " . $linha["senha"] . "</td>";
        echo "<td> " . $linha["tipo"] . "</td>";
        echo "<br>";
        echo "<tr>";
      }
      echo "</table>";
    } else {
        echo "Erro ao buscar usuário";
      }
  }
?>