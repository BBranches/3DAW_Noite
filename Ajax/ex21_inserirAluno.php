<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $nome = $_GET["nome"];
  $email = $_GET["email"];
  $cpf = $_GET["cpf"];
  $matricula = $_GET["matricula"];
  $uf = $_GET["uf"];
  $cidade = $_GET["cidade"];

    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "DawNoiteFaeterj";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }
    $sql = "INSERT into alunos (`id`, `nome`, `email`, `CPF`, `matricula`, `uf`, `cidade`) VALUES (null, '$nome','$email', '$cpf', '$matricula', '$uf', '$cidade')";
    $result = $conn->query($sql);
    if($result) {
      echo ("Aluno $nome inserido com sucesso");
    } else {
      echo ("Erro!");
    }
}
?>