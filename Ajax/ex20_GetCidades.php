<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3dawnoite";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexão com erro: " . $conn->connect_error);
    }

    $estado = $_GET['estado'];

    $query = "SELECT * FROM estado WHERE uf='$estado'";
    $result = $conn->query($query);
    $linha = $result->fetch_assoc();
    $idEstado = $linha["id"];

    $query2 = "SELECT * FROM cidade WHERE estado=$idEstado";
    $result2 = $conn->query($query2);

    $cidades = array();
    while ($cidade = mysqli_fetch_assoc($result2))
    {
         $cidades[] = $cidade;
    }
    print json_encode($cidades);
}
?>
