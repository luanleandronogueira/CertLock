<?php 

session_start();
include "../../provedores/Classes.php";

$Vendas = new Vendas;

header('Content-Type: application/json');

if(!empty($_GET)){

    $HistoricoVendas = $Vendas->chamaHistoricoVendas($_GET['id_usuario'], $_GET['id_entidade'], $_GET['dataIncial'], $_GET['dataFinal']);

    // echo '<pre>';
    // print_r($HistoricoVendas);
    // echo '</pre>';

    if($HistoricoVendas){

        echo json_encode($HistoricoVendas);

    } else {

        $historicoVenda = ['error' => 'VAZIO'];
        echo json_encode($historicoVenda);

    }

} else {
    
    echo json_encode(['error' => 'Identificador inválido']);

}