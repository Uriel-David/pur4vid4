<?php

$conexao = new PDO("mysql:host=localhost;dbname=pur4vid4_produtos", "root", "");

$select = $conexao -> prepare("SELECT * FROM produtos");
$select -> execute();
$fetch = $select -> fetchAll();

$modelo = $_POST['modeloPrancha'];
$tamanhoPrancha = $_POST['tamanhoPrancha'];
$addExtra1 = $_POST['addExtra1'];
$addExtra2 = $_POST['addExtra2'];
$addExtra3 = $_POST['addExtra3'];
$addExtra4 = $_POST['addExtra4'];

$modeloCliente = "";
$valorTotalProduto = 0;
$modeloClienteExtra1 = " + addExtra1";
$modeloClienteExtra2 = " + addExtra2";
$modeloClienteExtra3 = " + addExtra3";
$modeloClienteExtra4 = " + addExtra4";

if ($modelo == "modelo1" && $tamanhoPrancha == "5'8") {
    $modeloCliente = "modelo1 - 5'8";
} elseif ($modelo == "modelo1" && $tamanhoPrancha == "5'9") {
    $modeloCliente = "modelo1 - 5'9";
} elseif ($modelo == "modelo1" && $tamanhoPrancha == "6'0") {
    $modeloCliente = "modelo1 - 6'0";
}

foreach ($fetch as $produtos) {
    if ($produtos['nome'] == $modeloCliente) {
        $valorTotalProduto += $produtos['preco'];
    }

    if ($produtos['nome'] == $addExtra1) {
        $valorTotalProduto += $produtos['preco'];
        $modeloCliente = $modeloCliente.$modeloClienteExtra1;
    }

    if ($produtos['nome'] == $addExtra2) {
        $valorTotalProduto += $produtos['preco'];
        $modeloCliente = $modeloCliente.$modeloClienteExtra2;
    }

    if ($produtos['nome'] == $addExtra3) {
        $valorTotalProduto += $produtos['preco'];
        $modeloCliente = $modeloCliente.$modeloClienteExtra3;
    }

    if ($produtos['nome'] == $addExtra4) {
        $valorTotalProduto += $produtos['preco'];
        $modeloCliente = $modeloCliente.$modeloClienteExtra4;
    }
}

header("Location: ../php/carrinho.php"); // verificar problema de redirecionamento