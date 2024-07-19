<?php 

session_start();
include "../../provedores/Classes.php";

$Vendas = new Vendas;

// Aceitar csv ou texto 
header('Content-Type: text/csv; charset=utf-8');  

// Nome arquivo
header('Content-Disposition: attachment; filename=historico_venda.csv');

// Gravar no buffer
$resultado = fopen("php://output", 'w');

if(!empty($_GET)){

    $HistoricoVendas = $Vendas->chamaHistoricoVendas($_GET['id_usuario'], $_GET['id_entidade'], $_GET['dataIncial'], $_GET['dataFinal']);

    $cabecalho = ['Codigo da Venda', 'Cliente', 'Item de Venda',  mb_convert_encoding('Preço de Venda', "ISO-8859-1", "UTF-8"),  'Data da Venda'];

    // echo '<pre>';
    // print_r($HistoricoVendas);
    // echo '</pre>';

    extract($HistoricoVendas);

    if($HistoricoVendas) {
        fputcsv($resultado, $cabecalho, ';');
    
        foreach($HistoricoVendas as $venda) {
            $Linhas_Historico = [
                'codigo_venda' => $venda['codigo_venda'] ?? '',
                'nome_cliente_venda' => mb_convert_encoding($venda['nome_cliente_venda'] ?? '', "ISO-8859-1", "UTF-8"),
                'item_produto_venda' => mb_convert_encoding($venda['item_produto_venda'] ?? '', "ISO-8859-1", "UTF-8"),
                'preco_vendido_venda' => $venda['preco_vendido_venda'] ?? '',
                'data_venda' => $venda['data_venda'] ?? '',
            ];
    
            fputcsv($resultado, $Linhas_Historico, ';');
        }
        fclose($resultado);

    } else {

        $historicoVenda = ['error' => 'VAZIO'];
        // echo json_encode($historicoVenda);

    }

} else {
    
    echo json_encode(['error' => 'Identificador inválido']);

}