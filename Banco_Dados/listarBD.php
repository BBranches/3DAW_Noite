<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leitura Banco de Dados</title>
</head>
<body style="font-family: 'Trebuchet MS', sans-serif; background: darkslategrey; color: #eee;">
  <section style="width: 100%; text-align: center; padding: 20px;">
    <form action="listarBD.php?listar=alunos"  method="POST"
      style="width: 850px; margin: 0 auto;">
      <h1 style="font-size: 2.5em;">Leitura Banco de Dados</h1>
  
        <input style="cursor: pointer; border-radius: 5px; padding: 15px; border:none; background: lightsalmon; color: #111; font-size: 1.2em; font-weight: 600;" type="submit" name="op" value="Listar Alunos" >
    </form>
  </section>
</body>
</html>
<?php
setlocale (LC_ALL, 'pt_BR');
echo '<section style="width: 100%; text-align: center; padding: 20px;">';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "faeterj3dawnoite";

        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        if ($conn->connect_error) {
            die("Conexão com erro: " . $conn->connect_error);
        }
    $sql = "SELECT * FROM ALUNOS";
    $result = $conn->query($sql);
    echo '<table style="padding: 20px; width: 850px; margin: 0 auto; border: 2px solid #eee; border-radius: 10px;">';
    echo "<tr>";
    echo "<th>ID</th><th>Nome</th><th>Email</th><th>Matricula</th>";
    while ($linha = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> " . $linha["id"] . "</td>";
        echo "<td> " . $linha["nome"] . "</td>";
        echo "<td> " . $linha["email"] . "</td>";
        echo "<td> " . $linha["matricula"] . "</td>";
        echo "<br>";
        echo "<tr>";
    }
    echo "</table>";
}
?>