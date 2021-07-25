<?php
function validarID($id){
    if (is_numeric($id)) {
      $result = 1;
    } else{
      echo "Insira um ID (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }

  function validarCodigoBarra($codigoBarra){
    if (is_numeric($codigoBarra)) {
      $result = 1;
    } else{
      echo "Insira um Código de Barras (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }
  function validarNome($nome){
    if ($nome == "") {
      echo "Preencha com o Nome do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarFabricante($fabricante){
    if ($fabricante == "") {
      echo "Preencha com o Fabricante do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarCategoria($categoria){
    if ($categoria == "") {
      echo "Preencha com a Categoria do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarTipo($tipo){
    if ($tipo == "") {
      echo "Preencha com o Tipo do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarPreco($preco){
    if (is_numeric($preco)) {
      $result = 1;
    } else{
      echo "Insira um Preço válido.<br><br>";
      $result = 0;
    }
      return $result;
  }
  function validarQt($qt){
   if (is_numeric($qt)) {
      $result = 1;
    } else{
      echo "Insira a Quantidade em Estoque (numérica) válida.<br><br>";
      $result = 0;
    }
      return $result;
  }
  function validarPeso($peso){
    if (is_numeric($peso)) {
      $result = 1;
    } else{
      echo "Insira um Peso em gramas (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }
  function validarDescricao($descricao){
    if ($descricao == "") {
      echo "Preencha com a Descrição do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarLinkImg($linkImg){
    if ($linkImg == "") {
      echo "Preencha com o Link da Imagem do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarData($data){
    if ($data == "") {
      echo "Preencha com a Data de Inclusão do Produto.<br><br>";
      return 0;
    } 
      return 1;
  }
  function validarAtivo($ativo){
    if ($ativo == "") {
      echo "Preencha se o Produto está Ativo ou não.<br><br>";
      return 0;
    } elseif ($ativo == 0) {
      echo "O produto não ficará ativo.<br><br>";
    }
      return 1;
  }
  ?>