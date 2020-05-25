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

    if ($modelo == "modelo1" && $tamanhoPrancha == "5'8") {

        $modeloCliente = "modelo1 - 5'8";
        if ($_POST['addExtra1'] == "addExtra1" && $modeloCliente == "modelo1 - 5'8") {
            $modeloCliente .= " c/adição: addExtra1";
        } elseif ($_POST['addExtra2'] == "addExtra2" && $modeloCliente == "modelo1 - 5'8") {
            $modeloCliente .= " c/adição: addExtra2";
        } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente == "modelo1 - 5'8") {
            $modeloCliente .= " c/adição: addExtra3";
        } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente == "modelo1 - 5'8") {
            $modeloCliente .= " c/adição: addExtra4";
        }

        if ($_POST['addExtra2'] == "addExtra2" && $modeloCliente != "modelo1 - 5'8 c/adição: addExtra2") {
            $modeloCliente .= " - addExtra2";
        } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente != "modelo1 - 5'8 c/adição: addExtra3") {
            $modeloCliente .= " - addExtra3";
        } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente != "modelo1 - 5'8 c/adição: addExtra4") {
            $modeloCliente .= " - addExtra4";
        }

    } elseif ($modelo == "modelo1" && $tamanhoPrancha == "5'9") {

        $modeloCliente = "modelo1 - 5'9";
        if ($_POST['addExtra1'] == "addExtra1" && $modeloCliente == "modelo1 - 5'9") {
            $modeloCliente .= " c/adição: addExtra1";
        } elseif ($_POST['addExtra2'] == "addExtra2" && $modeloCliente == "modelo1 - 5'9") {
            $modeloCliente .= " c/adição: addExtra2";
        } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente == "modelo1 - 5'9") {
            $modeloCliente .= " c/adição: addExtra3";
        } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente == "modelo1 - 5'9") {
            $modeloCliente .= " c/adição: addExtra4";
        }

        if ($_POST['addExtra2'] == "addExtra2") {
            $modeloCliente .= " - addExtra2";
        } elseif ($_POST['addExtra3'] == "addExtra3") {
            $modeloCliente .= " - addExtra3";
        } elseif ($_POST['addExtra4'] == "addExtra4") {
            $modeloCliente .= " - addExtra4";
        }

    } elseif ($modelo == "modelo1" && $tamanhoPrancha == "6'0") {

        $modeloCliente = "modelo1 - 6'0";
        if ($_POST['addExtra1'] == "addExtra1" && $modeloCliente == "modelo1 - 6'0") {
            $modeloCliente .= " c/adição: addExtra1";
        } elseif ($_POST['addExtra2'] == "addExtra2" && $modeloCliente == "modelo1 - 6'0") {
            $modeloCliente .= " c/adição: addExtra2";
        } elseif ($_POST['addExtra3'] == "addExtra3" && $modeloCliente == "modelo1 - 6'0") {
            $modeloCliente .= " c/adição: addExtra3";
        } elseif ($_POST['addExtra4'] == "addExtra4" && $modeloCliente == "modelo1 - 6'0") {
            $modeloCliente .= " c/adição: addExtra4";
        }

        if ($_POST['addExtra2'] == "addExtra2") {
            $modeloCliente .= " - addExtra2";
        } elseif ($_POST['addExtra3'] == "addExtra3") {
            $modeloCliente .= " - addExtra3";
        } elseif ($_POST['addExtra4'] == "addExtra4") {
            $modeloCliente .= " - addExtra4";
        }

    }

    foreach ($fetch as $produtos) {
        if ($produtos['nome'] == $modeloCliente) {
            $idModelo = $produtos['id'];
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
            $exibeProdutos = $select -> fetchAll();

            $valorTotalCarrinho = $exibeProdutos[0]['preco'] * $quantidade;
            echo
                'Nome: '.$exibeProdutos[0]['nome'].'<br />
                Preço: '.number_format($exibeProdutos[0]['preco'], 2, ",", ".").'<br />
                Quantidade: '.$quantidade.'<br />
                Total: '.number_format($valorTotalCarrinho, 2, ",", ".").'<br />
                <a href="remover.php?remover=carrinho&id='.$idModelo.'">Remover</a>
                <hr />';

        }
    }
