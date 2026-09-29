<?php

function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura);
    return $imc;
}

$peso = 70;
$altura = 1.75;

$imc = calcularIMC($peso, $altura);

echo "IMC: $imc<br>";

if ($imc < 18.5) {
    echo "Abaixo do peso";
} elseif ($imc < 25) {
    echo "Peso normal";
} elseif ($imc < 30) {
    echo "Sobrepeso";
} else {
    echo "Obesidade";
}

?>