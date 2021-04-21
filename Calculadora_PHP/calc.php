<?php
setlocale (LC_ALL, 'pt_BR');
include './calc.html';
echo '<section style="width: 100%; text-align: center; padding: 20px;">';
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
  
  $aValido = 0;
  $bValido = 0;
  $opValido = 0;
  $sinal = "";
  $result = 0;

  $a=$_POST["a"];
  $b=$_POST["b"];
  $op=$_POST["operacao"];

  if (is_numeric($a)) {
    $aValido = 1;
  } else {
      echo "Preencha o primeiro número<br><br>";
  }
   if (is_numeric($b)) {
    $bValido = 1;
  } else {
      echo "Preencha o segundo número<br><br>";
  }
  if(!ctype_alpha($op)) {
    echo "Escolha um operação<br><br>";
  } else {
      $opValido = 1;
  }

  function soma (float $num1, float $num2) {
    return $num1 + $num2;
  }
  function subtracao (float $num1, float $num2) {
    return $num1 - $num2;
  }
  function multiplicacao (float $num1, float $num2) {
    return $num1 * $num2;
  }
  function divisao (float $num1, float $num2) {
    return $num1 / $num2;
  }

  if ($aValido != 1 || $bValido != 1 || $opValido != 1) {
    echo "<p>Formulário com erro, preencha novamente</p>";
  } else {
      if($op=="soma") {
        $result = soma($a, $b);
        $sinal = "+";
      } elseif($op=="sub") {
          $result = subtracao($a, $b);
          $sinal = "-";
      } elseif($op=="div") {
          if($b==0) {
            $result = "inexistente";
            $sinal = "/";
          } else {
              $result = divisao($a, $b);
              $sinal = "/";
          }
      } else {
          $result = multiplicacao($a, $b);
          $sinal = "*";
      }
      echo "O resultado de $a $sinal $b = $result";
  }   
} 
?>