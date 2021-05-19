<?php
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "faeterj3dawnoite";

  $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
  if ($conn->connect_error) {
    die("Conexão com erro: " . $conn->connect_error);
  }
?>