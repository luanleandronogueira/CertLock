<?php 

session_start();
include "../../provedores/Classes.php";

$Item = new Itens;

if (!empty($_POST)){

    extract($_POST);

    $Item->inserirItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $id_entidade_item_preco);

    header("Location: ../cadastrarItens.php?status=sucesso&&cadastrarItens");


} else {

    header("Location: ../index.php?&&cadastrarItens");
    die();


}