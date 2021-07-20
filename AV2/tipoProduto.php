<?php
    include 'conexao.php';

    $categoria = $_GET['categorias'];

    $sql = "SELECT * FROM tipo WHERE categoria=$categoria";

    $resultado = $conn->query($sql);

    $tipos = array();
    while ($tipo = mysqli_fetch_assoc($resultado)) {
        $tipos[] = $tipo;
    }
    print json_encode($tipos);
?>