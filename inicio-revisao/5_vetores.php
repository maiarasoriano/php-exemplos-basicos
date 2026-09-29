<?php

// Vetor (array simples - "1 linha")
$frutas = ["Maça", "Banana", "Uva"];

// Exibindo os valores com laço
foreach ($frutas as $indice => $fruta) {
    echo "Posição $indice: $fruta <br>";
}

// Array (Linhas e colunas)

$matriz = [
    ["Max Verstappen", "Oscar Piastri", "Lando Norris"],
    ["Charles Leclerc", "Lewis Hamilton", "George Russel"],
    ["Fernando Alonso", "Carlos Sainz", "Gabriel Bortoleto"]
];

echo "<br><br>";
echo "Lista de pilotos de F1 (Dica: O 1° é o melhor.) <br><br>";

// Exibindo os valores da Matriz
foreach ($matriz as $linha) {
    foreach ($linha as $piloto) {
        echo $piloto . " | ";
    }
echo "<br>";
}