<?php

$preco = 50;
$quantidade = 5;

$total = $preco * $quantidade;

if ($total >= 200) {
    $total = $total * 0.90;
}

echo "Valor final: R$ " . $total;

?>