<?php
    include 'conexao.php';

    $sql = "SELECT * FROM categorias";

    $resultado = $conn->query($sql);

    $categorias = array();
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        $categorias[] = $categoria;
    }
    print json_encode($categorias);
?>
