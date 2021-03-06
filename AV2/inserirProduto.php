<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';

  include 'funcoesValidacao.php';
  
  function validarIdDuplicado($id, $conn) {
    $sqlID = "SELECT id FROM produtos WHERE id = $id";
    $result = $conn->query($sqlID);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;
}
  function validarCodigoBarraDuplicado($codigoBarra, $conn) {
    $sqlCod = "SELECT codigobarra FROM produtos WHERE codigobarra = $codigoBarra";
    $result = $conn->query($sqlCod);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;
  }
  
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

  $sqlCat = "SELECT * FROM categorias WHERE id = $categoria";
  $resultCat = $conn->query($sqlCat);
  $linha = mysqli_fetch_assoc($resultCat);
  $catNome = $linha["nome"];

  if (validarID($id) != 1 || validarNome($nome) != 1 || validarCodigoBarra($codigobarra) != 1 || validarFabricante($fabricante) != 1 || validarTipo($tipo) != 1 || validarPreco($preco) != 1 || validarQt($qt) != 1 || validarPeso($peso) != 1 || validarDescricao($descricao) != 1 || validarLinkImg($linkimg) != 1 || validarData($data) != 1 || validarAtivo($ativo) != 1) {
    echo "Preencha todos os campos com valores válidos.<br><br>";  
  } elseif(validarIdDuplicado($id, $conn) == 1) {
    echo "ID já existe!<br><br>";
  } elseif(validarCodigoBarraDuplicado($codigobarra, $conn) == 1) {
    echo "Código de Barra já existe!<br><br>";
  } else {
      $sql = "Insert into produtos (`id`, `codigobarra`, `nome`, `fabricante`, `categoria`, `tipo`, `preco`, `qt`, `peso`, `descricao`, `linkimg`, `data`, `ativo`) VALUES ('$id', '$codigobarra', '$nome', '$fabricante', '$catNome', '$tipo', '$preco', '$qt', '$peso', '$descricao', '$linkimg', '$data', '$ativo')";
    }

  $result = $conn->query($sql);

  if($result) {
    echo "Produto $nome inserido com sucesso.";
  } else {
      echo "Erro ao inserir Produto.";
    } 
}

?>