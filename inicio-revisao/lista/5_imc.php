<?php

// Definição da função para calcular o IMC
function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura);
    return $imc;
}

// Variáveis
$meu_peso = 68.0;
$minha_altura = 1.52;

$imc_calculado = calcularIMC($meu_peso, $minha_altura);

// Estrutura para determinar a classificação
if ($imc_calculado < 18.5) {
    $classificacao = "Abaixo do peso";
} elseif ($imc_calculado >= 18.5 && $imc_calculado < 25.0) {
    $classificacao = "Peso normal";
} elseif ($imc_calculado >= 25.0 && $imc_calculado < 30.0) {
    $classificacao = "Sobrepeso";
} else {
    $classificacao = "Obesidade";
}

// 4. Exibição dos resultados formatados
echo "--- Calculadora de IMC ---\n";
echo "Peso fornecido: " . $meu_peso . " kg\n";
echo "Altura fornecida: " . $minha_altura . " m\n";
echo "--------------------------\n";
echo "IMC calculado: " . number_format($imc_calculado, 1, ',', '.') . "\n";
echo "Classificação: " . $classificacao . "\n";
echo "--------------------------\n";

?>
