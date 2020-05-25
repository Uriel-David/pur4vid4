<?php

    session_start();

    if (isset($_GET['remover']) && $_GET['id']) {
        $idModelo = $_GET['id'];
        unset($_SESSION['itens'][$idModelo]);
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=paginaCarrinho.php">';
    }
