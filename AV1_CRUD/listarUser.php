<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buscar Usuário</title>
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
      <label for="perfil">Perfil:</label>
      <input type="text" name="perfil" id="perfil">
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
    $perfil = $_POST["perfil"];
    $nome = $_POST["nome"];

    $perfilValido = 0;
    $nomeValido = 0;

    include 'connect.php';
    $sql = 0;

    if ($op == "Listar Todos Usuários") {
      $sql = "SELECT * FROM usuarios";
    } elseif ($op == "Buscar Usuário") {
        if ($perfil != "") {
          $perfilValido = 1;
        }
        if ($nome != "") {
          $nomeValido = 1;
        }

        if ($perfilValido == 1 && $nomeValido == 1) {
          echo "Escolha apenas uma opção: ou Perfil ou Nome";
          echo "<br>";
        } elseif ($perfilValido == 0 && $nomeValido == 0) {
          echo "Escolha uma das opções: ou perfil ou Nome";
          echo "<br>";
        } else {
          $sql = "SELECT * FROM usuarios WHERE perfil = '$perfil' || nome = '$nome'";
        }
    }

    $result = $conn->query($sql);
    if($result) {
      echo "<table>";
      echo "<tr>";
      echo "<th>Nome</th><th>E-mail</th><th>Senha</th><th>Tipo</th><th>Perfil</th>";
      echo "<br>";
      while ($linha = $result->fetch_assoc()) {
        echo "<tr><tr><tr>";
        echo "<td> " . $linha["nome"] . "</td>";
        echo "<td> " . $linha["email"] . "</td>";
        echo "<td> " . $linha["senha"] . "</td>";
        echo "<td> " . $linha["tipo"] . "</td>";
        echo "<td> " . $linha["perfil"] . "</td>";
        echo "<br>";
        echo "<tr>";
      }
      echo "</table>";
    } else {
        echo "Erro ao buscar usuário";
      }
  }
?>