<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';
  
  function validarCodigoBarra($codigoBarra){
    if (is_numeric($codigoBarra)) {
      $result = 1;
    } else{
      echo "Insira um Código de Barras (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }

  $codigobarra = $_GET["codigobarra"];

  if(validarCodigoBarra($codigobarra) === 1) {
    $sql = "UPDATE produtos set `codigobarra`='$codigobarra', `ativo`='0' WHERE codigobarra=$codigobarra";

    $result = $conn->query($sql);
    
    echo "<div id='det'>";
    if($result) {
      echo "Produto excluído com sucesso.";
    } else {
        echo "Erro ao excluir Produto.";
      } 
  } 
}
?>