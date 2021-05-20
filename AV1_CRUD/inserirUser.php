<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Inserir Usuário por Arquivo</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
</head>

<body>
  <header id="header">  
    <!--MENU-->
    <nav class="nav" id="nav">
      <ul class="lista">
        <li><a id="home" href="index.html">Home</a></li>
        <li><a class="btnMenu active" href="inserirUser.php">Inserir Usuário</a></li>
        <li><a class="btnMenu" href="listarUser">Buscar Usuário</a></li>
        <li><a class="btnMenu" href="alterarUser.php">Alterar Usuário</a></li>
        <li><a class="btnMenu" href="excluirUser.php">Excluir Usuário</a></li>
      </ul>
    </nav>
  </header>	
  
  <section>
    <form class="usuario" action="inserirUser.php" method="POST" enctype="multipart/form-data">
      <h1>Upload Arquivo Usuário</h1>
      <br><br>
      <h4>Formato dos dados:</h4>
      <p>id;nome;email;senha;tipo</p>
      <p>id;nome;email;senha;tipo</p>
      <p>...</p>
      <br><br>
      <label for="file">Arquivo .csv:</label><input type="file" name="file">
      <br>
      <input class="btn btninsert" type="submit" name=submit value="Enviar">
    </form>
    <br><br>
  </section>
</body>
</html>

<?php
  setlocale (LC_ALL, 'pt_BR');
  echo '<section>';
  if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["submit"]))) {
    include 'connect.php';
    $sql = 0;
    $includeUser = 0;
    $erro = 0;

    $arquivo = $_FILES["file"]["tmp_name"];
    $nome = $_FILES["file"]["name"];

    $ext = explode(".",$nome);
    $extensao = end($ext);

    if($extensao != "csv"){
      echo "extensão inválida";
    } else {
      $arquivoR = fopen($arquivo, 'r') or die("Não abriu o arquivo!");
      fgets($arquivoR);

      while(($dados = fgetcsv($arquivoR, 1000, ";")) !== false) {
        $id = $dados[0];
        $nome = $dados[1];
        $email = $dados[2];
        $senha = $dados[3];
        $tipo = $dados[4];
         

        $result = $conn->query ("INSERT INTO usuarios (id,nome,email,senha,tipo) VALUES ($id,'$nome','$email','$senha','$tipo')");
          
        if($result) {
          $includeUser++; 
        } else {
          $erro++;
        }
      }
      fclose($arquivoR);
     }
      
    if($includeUser == 0 && $erro > 0) {
      echo "Erro ao inserir usuários!";
    } elseif($includeUser == 1) {
      echo "Usuário inserido com sucesso.";
    } else {
      echo "Usuários inseridos com sucesso.";
    }
  }
?>

