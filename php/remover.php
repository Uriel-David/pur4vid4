<?php
    // inicia a sessão na pagina
    session_start();

    // identifica se houver o click no botão de remover o item selecionado será removido do carrinho
    if (isset($_GET['remover']) && $_GET['id']) {
        $idModelo = $_GET['id'];
        unset($_SESSION['itens'][$idModelo]);
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=../templates/carrinho.php">';
    }
    // fim do bloco
