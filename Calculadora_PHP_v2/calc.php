<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
</head>
<body style="font-family: 'Trebuchet MS', sans-serif; background: darkslategrey; color: #eee;">
  <section style="width: 100%; text-align: center; padding: 20px;">
    <form action="calc.php" method="POST"
      style="padding: 20px; width: 350px; margin: 0 auto; border: 2px solid #eee; border-radius: 10px;">
      <h1 style="font-size: 2.5em;">Calculadora</h1>
      <br>
      <label for="number1">Primeiro número:</label>
      <br>
      <input style="padding: 5px; border-radius: 5px;" type="text" name="number1" id="number1">
      <br><br>
      <label for="number2">Segundo número:</label>
      <br>
      <input style="padding: 5px; border-radius: 5px;" type="text" name="number2" id="number2">
      <br>
      <h4>Operação:</h4>
      <select name="operation" id="sel" style="padding: 5px; border-radius: 5px; font-size: 1em;">
        <option name="operation"></option>
        <option name="operation" value="sum">Soma</option>
        <option name="operation" value="sub">Subtração</option>
        <option name="operation" value="mult">Multiplicação</option>
        <option name="operation" value="div">Divisão</option>
        <option name="operation" value="perc">Porcentagem</option>
        <option name="operation" value="exp">Exponenciação</option>
        <option name="operation" value="root">Raiz Quadrada</option>
        <option name="operation" value="divOne">1/x</option>
      </select>
      <br><br>
      <button
        style="cursor: pointer; border-radius: 5px; padding: 15px; border:none; background: lightsalmon; color: #111; font-size: 1.2em; font-weight: 600;"
        type="submit">Calcular</button>
    </form>
  </section>
</body>
</html>

<?php
setlocale (LC_ALL, 'pt_BR');
echo '<section style="width: 100%; text-align: center; padding: 20px;">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $validNumber1 = 0;
  $validNumber2 = 0;
  $validOperation = 0;
  $operator = "";
  $result = 0;
  $result_2 = 0;

  $number1=$_POST["number1"];
  $number2=$_POST["number2"];
  $operation=$_POST["operation"];

  if (is_numeric($number1)) {
    $validNumber1 = 1;
  } else {
      echo "Preencha o primeiro campo com um valor numérico<br><br>";
  }
   if (is_numeric($number2)) {
    $validNumber2 = 1;
  } else {
      echo "Preencha o segundo campo com um valor numérico<br><br>";
  }
  if(!ctype_alpha($operation)) {
    echo "Escolha um operação<br><br>";
  } else {
      $validOperation = 1;
  }

  function sum (float $num1, float $num2) {
    return $num1 + $num2;
  }
  function subt (float $num1, float $num2) {
    return $num1 - $num2;
  }
  function multip (float $num1, float $num2) {
    return $num1 * $num2;
  }
  function div (float $num1, float $num2) {
    return $num1 / $num2;
  }
  function exponent (float $num1, float $num2) {
    return pow($num1, $num2);
  }
  function percent (float $num1, float $num2) {
    return ($num1 * $num2) / 100;
  }
  function squareRoot (float $num) {
    return sqrt($num);
  }
  function divOne (float $num) {
    return 1 / $num;
  }

  if ($validNumber1 != 1 || $validNumber2 != 1 || $validOperation != 1) {
    echo "<p>Formulário com erro, preencha novamente</p>";
  } else {

    switch($operation) {
      case "sum":
        $result = sum($number1, $number2);
        $operator = "+";
        break;
      case "sub":
        $result = subt($number1, $number2);
        $operator = "-";
        break;
      case "div":
        if($number2==0) {
          $result = "inexistente";
        } else {
            $result = div($number1, $number2);
        }
        $operator = "/";
        break;
      case "mult":
        $result = multip($number1, $number2);
        $operator = "*";
        break;
      case "exp":
        $result = exponent($number1, $number2);
        $operator = "^";
        break;
      case "perc":
        $result = percent($number1, $number2);
        break;
      case "root":
        $result = squareRoot($number1);
        $result2 = squareRoot($number2);
        break;
      case "divOne":
        $result = divOne($number1);
        $result2 = divOne($number2);
        break;
    }
    
    if ($operation=="perc") {
      echo "$number2% de $number1 = $result";
    } elseif ($operation=="root") {
      echo "Raiz quadrada de $number1 = $result<br><br>Raiz quadrada de $number2 = $result2";
    } elseif ($operation=="divOne") {
      echo "1/$number1 = $result<br><br>1/$number2 = $result2";
    } else {
      echo "$number1 $operator $number2 = $result";
    }
  }   
} 
?>