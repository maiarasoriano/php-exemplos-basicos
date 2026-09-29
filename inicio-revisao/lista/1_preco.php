<?php
// Variáveis
$preco = 50.00;
$quantidade = 5;

$valor_total = $preco * $quantidade;

// Verificação e aplicação do desconto
$desconto = 0;
if ($valor_total >= 200.00) {
    $desconto = $valor_total * 0.10;
}

$valor_final = $valor_total - $desconto;

// Exibição dos resultados formatados
echo "--- Resumo da Compra ---\n";
echo "Preço unitário: R$ " . number_format($preco, 2, ',', '.') . "\n";
echo "Quantidade: " . $quantidade . "\n";
echo "Valor total inicial: R$ " . number_format($valor_total, 2, ',', '.') . "\n";

if ($desconto > 0) {
    echo "Desconto aplicado (10%): R$ " . number_format($desconto, 2, ',', '.') . "\n";
} else {
    echo "Desconto aplicado: R$ 0,00 (Não elegível para desconto)\n";
}

echo "Valor final a pagar: R$ " . number_format($valor_final, 2, ',', '.') . "\n";
echo "------------------------\n";
?>
