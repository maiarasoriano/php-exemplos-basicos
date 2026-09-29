<?php

$notas = [7, 8, 6, 9, 5];

$soma = 0;
$maior = $notas[0];
$menor = $notas[0];

foreach ($notas as $nota) {
    $soma = $soma + $nota;

    if ($nota > $maior) {
        $maior = $nota;
    }

    if ($nota < $menor) {
        $menor = $nota;
    }
}

$media = $soma / 5;

echo "Média da turma: $media<br>";
echo "Maior nota: $maior<br>";
echo "Menor nota: $menor";

?>