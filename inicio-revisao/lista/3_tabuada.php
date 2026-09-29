<?php

// Definição do número para a tabuada
$numero = 9;

echo "--- Tabuada do $numero ---\n";

// Estrutura de repetição 'for' de 1 a 10
for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado\n";
}

echo "--------------------\n";
?>
