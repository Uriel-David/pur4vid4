<?php

    session_start();

    $conexao = new PDO("mysql:host=localhost;dbname=pur4vid4_produtos", "root", "");

    $select = $conexao -> prepare("SELECT * FROM produtos");
    $select -> execute();
    $fetch = $select -> fetchAll();

    if (!isset($_POST['modeloPrancha'])) {
        $modelo = "";
    } else {
        $modelo = $_POST['modeloPrancha'];
    }

    if (!isset($_POST['tamanhoPrancha'])) {
        $tamanhoPrancha = "";
    } else {
        $tamanhoPrancha = $_POST['tamanhoPrancha'];
    }

    if (!isset($_POST['addExtra1'])) {
        $addExtra1 = "";
    } else {
        $addExtra1 = $_POST['addExtra1'];
    }

    if (!isset($_POST['addExtra2'])) {
        $addExtra2 = "";
    } else {
        $addExtra2 = $_POST['addExtra2'];
    }

    if (!isset($_POST['addExtra3'])) {
        $addExtra3 = "";
    } else {
        $addExtra3 = $_POST['addExtra3'];
    }

    if (!isset($_POST['addExtra4'])) {
        $addExtra4 = "";
    } else {
        $addExtra4 = $_POST['addExtra4'];
    }

    $modeloCliente = "";
    $idModelo = 0;
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
            $idModelo = $produtos['id'];
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

    if (!isset($_SESSION['itens'])) {
        $_SESSION['itens'] = array();
    }

    if (isset($_POST['add']) && $_POST['add'] == 'carrinho') {
        if (!isset($_SESSION['itens'][$idModelo])) {
            $_SESSION['itens'][$idModelo] = 1;
        } else {
            $_SESSION['itens'][$idModelo] += 1;
        }
    }

    if (count($_SESSION['itens']) == 0) {
        echo 'Carrinho Vazio...';
    } else {
        foreach ($_SESSION['itens'] as $idModelo => $quantidade) {
            $select = $conexao -> prepare("SELECT * FROM produtos WHERE id=?");
            $select -> bindParam(1, $idModelo);
            $select -> execute();
            $fetch = $select -> fetchAll();

            $valorTotalCarrinho = $quantidade * $fetch[0]['preco'];
            echo
                "Nome: ".$fetch[0]['nome']."<br />
                Preço: ".number_format($fetch[0]['preco'], 2, ",", ".")."<br />
                Quantidade: ".$quantidade."<br />
                Total: ".number_format($valorTotalCarrinho, 2, ",", ".").'<br />
                <a href="remover.php?remover=carrinho&id='.$idModelo.'">Remover</a>
                <hr />';

        }
    }
