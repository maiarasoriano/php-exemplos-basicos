<?php

// Variáveis
$mediafinal = 7.5;
$faltas = 12;

// Estrutura condicional com o operador lógico &&
if ($mediafinal >= 6.0 && $faltas <= 15) {
    $resultado = "Aprovado(a)";
} else {
    $resultado = "Reprovado(a)";
}

// Exibição do resultado formatado
echo "--- Relatório do Aluno ---\n";
echo "Média Final: " . number_format($mediafinal, 1, ',', '.') . "\n";
echo "Total de Faltas: " . $faltas . "\n";
echo "O aluno(a) está: " . $resultado . "\n";
echo "--------------------------\n";
?>