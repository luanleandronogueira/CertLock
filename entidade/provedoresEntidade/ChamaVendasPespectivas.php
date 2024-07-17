<?php 
session_start();
include "../../provedores/Classes.php";

header('Content-Type: application/json');

if(!empty($_SESSION)) {
    $VendasPespectivas = new Vendas_Pespectivas;
    $Vendas = $VendasPespectivas->ChamaVendasPespectivas($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);


    // echo '<pre>';
    // print_r($Vendas);
    // echo '</pre>';

    
    // Converter os dados para o formato esperado pelo FullCalendar
    $eventos = array();
    foreach($Vendas as $venda) {
        $eventos[] = array(
            'id' => $venda['id_venda_pespectiva'],
            'title' => $venda['item_venda_pespectiva'],
            'start' => $venda['data_prevista_venda_pespectiva'],
            'end' => $venda['data_prevista_venda_pespectiva'],
            'extendedProps' => array(
                'ultimaVenda' => $venda['data_venda_pespectiva'],
                'preco' => $venda['preco_venda_pespectiva'],
                'cliente' => $venda['nome_venda_pespectiva'],
                'telefone' => $venda['telefone_venda_pespectiva']
            )
        );
    }
    
    echo json_encode($eventos);
} else {
    header("Location: ../index.php");
    session_destroy();
    die();
}
?>
