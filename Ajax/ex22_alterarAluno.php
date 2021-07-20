<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "dawnoitefaeterj";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
      die("Conexão com erro: " . $conn->connect_error);
    }

    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $cpf = $_GET["cpf"];
    $matricula = $_GET["matricula"];
    $uf = $_GET["uf"];
    $cidade = $_GET["cidade"];

    $sql = "UPDATE alunos SET `nome`='$nome', `email`='$email', `matricula`='$matricula', `UF`='$uf', `cidade`='$cidade' WHERE `CPF`='$cpf'";
    
    $result = $conn->query($sql);
    if($result) {
      echo ("Aluno $nome alterado com sucesso");
    } else {
      echo ("Erro!");
    }    
}
?>