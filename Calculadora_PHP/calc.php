<?php
setlocale (LC_ALL, 'pt_BR');
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
  $aValido = 0;
  $bValido = 0;

  $a=$_POST["a"];
  $b=$_POST["b"];
  $op=$_POST["operacao"];

  if ($a != "") {
      $aValido = 1;
  } else {
      echo "Entre com o primeiro número";
      echo "<br>";
  }
   if ($b != "") {
    $bValido = 1;
  } else {
    echo "Entre com o segundo número";
    echo "<br>";
}
    if ($aValido != 1 or $bValido != 1) {
        echo "<p>Formulário com erro, preencha novamente</p>";
        echo "<br>";
    } else {
      if($op=="soma") {
        $result = $a + $b;
       } elseif($op=="subtracao") {
         $result = $a - $b;
       } elseif($op=="divisao") {
          if($b==0) {
            $result = "inexistente";
          }
          else {
            $result = $a / $b;
          }
       } else {
        $result = $a * $b;
       }
      echo "O resultado da $op entre $a e $b é $result.";
      echo "<br><br>";
    }  
} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<section>
<form action="calc.html" method="POST" style="width: 200px; text-align: center; padding: 20px;">
    <button style="cursor: pointer;" type="submit">Voltar</button>
  </form>
</section>
</body>
</html>