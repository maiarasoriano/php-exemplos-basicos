<?php

// Função simples com retorno
function soma(int $a, int $b): int {
    return $a + $b;
}

// Exibindo resultados
echo somar (4, 8);
echo "</n></n>";

// Procedimento (Função sem retorno)
function saudacao($nome = "aluno") {
    echo "Olá, $nome! Bem-vindo(a) ao PHP. </n>";
}

// Exibindo a saudação
saudacao();
saudacao("Maria");

// Outro procedimento
function mostrarLinha() {
    echo "-------------------------------- </n>";
}

mostrarLinha();
