<?php

// Variáveis
$notas = [7.5, 8.0, 5.0, 9.8, 4.8];
$soma = 0;
$total_alunos = count($notas);

// Laço para percorrer as notas e somá-las
foreach ($notas as $nota) {
    $soma += $nota;
}

// Cálculos estatísticos
$media_turma = $soma / $total_alunos;
$maior_nota = max($notas);
$menor_nota = min($notas);

// Exibição dos resultados formatados
echo "--- Estatísticas da Turma ---\n";
echo "Notas dos alunos: " . implode(" | ", $notas) . "\n";
echo "Quantidade de alunos: " . $total_alunos . "\n";
echo "-----------------------------\n";
echo "Média da Turma: " . number_format($media_turma, 1, ',', '.') . "\n";
echo "Maior Nota: " . number_format($maior_nota, 1, ',', '.') . "\n";
echo "Menor Nota: " . number_format($menor_nota, 1, ',', '.') . "\n";
echo "-----------------------------\n";
?>
