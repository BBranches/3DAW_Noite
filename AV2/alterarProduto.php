<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';

  include 'funcoesValidacao.php';

  $id = $_GET["id"];
  $codigobarra = $_GET["codigobarra"];
  $nome = $_GET["nome"];
  $fabricante = $_GET["fabricante"];
  $categoria = $_GET["categoria"];
  $tipo = $_GET["tipo"];
  $preco = $_GET["preco"];
  $qt = $_GET["qt"];
  $peso = $_GET["peso"];
  $descricao = $_GET["descricao"]; 
  $linkimg = $_GET["linkimg"];
  $data = $_GET["data"];
  $ativo = $_GET["ativo"];

  $sql = 0;
  $sqlCat = 0;

  $sqlCat = "SELECT * FROM categorias";
  $resultCat = $conn->query($sqlCat);
  $linha = mysqli_fetch_assoc($resultCat);
  $catNome = $linha["nome"];
  
  if (validarID($id) != 1 || validarNome($nome) != 1 || validarCodigoBarra($codigobarra) != 1 || validarFabricante($fabricante) != 1 || validarTipo($tipo) != 1 || validarPreco($preco) != 1 || validarQt($qt) != 1 || validarPeso($peso) != 1 || validarDescricao($descricao) != 1 || validarLinkImg($linkimg) != 1 || validarData($data) != 1 || validarAtivo($ativo) != 1) {
    echo "Preencha todos os campos com valores válidos.<br><br>";  
  } else {
      $sql = "UPDATE produtos set `id`='$id', `codigobarra`='$codigobarra', `nome`='$nome', `fabricante`='$fabricante', `categoria`='$catNome', `tipo`='$tipo', `preco`='$preco', `qt`='$qt', `peso`='$peso', `descricao`='$descricao', `linkimg`='$linkimg', `data`='$data', `ativo`='$ativo' WHERE `id`=$id";
  }

  $result = $conn->query($sql);

  if($result) {
    echo "Produto $nome alterado com sucesso.";
  } else {
      echo "Erro ao alterar Produto.";
    }  
}
?>