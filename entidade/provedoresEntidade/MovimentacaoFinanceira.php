<?php 

session_start();
include "../../provedores/Classes.php";

$movimentacaoFinanceira = new Vendas;

header('Content-Type: application/json');

if(!empty($_GET)){

    $movimentcao = $movimentacaoFinanceira->chamaMovimentacaoVendasMes($_GET['id_usuario'], $_GET['id_entidade'], $_GET['dataIncial'], $_GET['dataFinal']);

    // echo '<pre>';
    // print_r($HistoricoVendas);
    // echo '</pre>';

    if($movimentcao){

        echo json_encode($movimentcao);

    } else {

        $movimentcao = ['error' => 'VAZIO'];
        echo json_encode($movimentcao);

    }

} else {
    
    echo json_encode(['error' => 'Identificador inválido']);

}