<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>
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
        <li><a class="btnMenu" href="alterarUser.php">Alterar Usuário</a></li>
        <li><a class="btnMenu active" href="excluirUser.php">Excluir Usuário</a></li>
      </ul>
    </nav>
  </header>
  <section>
    <form action="excluirUser.php" method="POST" class="insertOne">
      <h1>Excluir Usuário</h1>
      <br>
      <label for="perfil">Perfil:</label>
      <input type="text" name="perfil" id="perfil">
      <br>
      <h3>OU</h3>
      <br>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
      <br>
      <input class="btn" type="submit" name="op" value="Excluir Usuário">
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

    if ($op == "Excluir Usuário") {
      if ($perfil != "") {
        $perfilValido = 1;
      }
      if ($nome != "") {
        $nomeValido = 1;
      }

      if ($perfilValido == 1 && $nomeValido == 1) {
        echo "Escolha apenas uma opção: ou ID ou Nome";
      } elseif ($perfilValido == 0 && $nomeValido == 0) {
        echo "Escolha uma das opções: ou ID ou Nome";
      } else {
        $sql = "DELETE FROM `usuarios` WHERE perfil = '$perfil' || nome = '$nome'"; 

        if($conn->query($sql)) {
          echo "Usuário excluído com sucesso!";
        } else {
          echo "Erro ao excluir usuário!";
        }
      }
    }
  }
?>