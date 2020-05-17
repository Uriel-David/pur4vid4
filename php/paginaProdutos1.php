<?php

$modelo = $_POST['modeloPranca'];
$tamanhoPrancha = $_POST['tamanhoPrancha'];
$addExtra1 = $_POST['addExtra1'];
$addExtra2 = $_POST['addExtra2'];
$addExtra3 = $_POST['addExtra3'];
$addExtra4 = $_POST['addExtra4'];

$modeloCliente = "";

if ($modelo == "modelo1" && $tamanhoPrancha == "5'8") {
    $modeloCliente = "modelo1 - 5'8";
} elseif ($modelo == "modelo1" && $tamanhoPrancha == "5'9") {
    $modeloCliente = "modelo1 - 5'9";
} elseif ($modelo == "modelo1" && $tamanhoPrancha == "5'9") {
    $modeloCliente = "modelo1 - 5'9";
} elseif ($modelo == "modelo1" && $tamanhoPrancha == "6'0") {
    $modeloCliente = "modelo1 - 6'0";
}


