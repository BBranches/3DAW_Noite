<?php
setlocale (LC_ALL, 'pt_BR');
include ("./calc.html");
echo '<section style="width: 100%; text-align: center; padding: 20px;">';
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
  
  $aValido = 0;
  $bValido = 0;

  $a=$_POST["a"];
  $b=$_POST["b"];
  $op=$_POST["operacao"];

  if ($a != "") {
    $aValido = 1;
  } else {
    echo "Preencha o primeiro número<br><br>";
  }
   if ($b != "") {
    $bValido = 1;
  } else {
    echo "Preencha o segundo número<br><br>";
  }
  if ($aValido != 1 or $bValido != 1) {
    echo "<p>Formulário com erro, preencha novamente</p>";
    } else {
        if($op=="Soma") {
          $result = $a + $b;
        } elseif($op=="Subtração") {
          $result = $a - $b;
        } elseif($op=="Divisão") {
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
    }   
} 
?>