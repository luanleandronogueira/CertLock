<?php 
session_start();
include "../../provedores/Classes.php";

$Item = new Itens;

echo '<pre>';
    print_r($_POST);
echo '</pre>';

if(!empty($_POST)){

    extract($_POST);

    $Item->atualizaItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $id_item_preco);

    header("Location: ../verItens.php?status=sucesso&&AtualizarItens");


} else {

    header("Location: ../index.php");
    die();
}


