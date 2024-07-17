<?php

session_start();
include "../../provedores/Classes.php";

if (!empty($_POST)) {

    $Venda = new Vendas;
    $VendaPespectiva = new Vendas_Pespectivas;

    $precoVenda = floatval(str_replace(',', '.', $_POST['preco_vendido_venda'])) - floatval(str_replace(',', '.', $_POST['desconto_venda']));

    extract($_POST);

    if (isset($btn_submit_pf) || isset($btn_submit_pj)) {

        $dados = [

            'id_usuario_venda' => $id_usuario_venda,
            'id_entidade_venda' => $id_entidade_venda,
            'id_produto_venda' => $id_produto_venda,
            'data_venda' => $data_venda,
            'codigo_venda' => $codigo_venda,
            'item_produto_venda' => $item_produto_venda,
            'preco_custo_venda' => $preco_custo_venda,
            'desconto_venda' => $desconto_venda,
            'preco_vendido_venda' => $precoVenda,
            'status_custo_venda' => 'ABERTO',
            'status_pg_cliente_venda' => 'ABERTO'
        ];

        $data = explode('-', $data_venda);
        // print_r($data);        

        if ($modalidade_validade) {

            if (trim($modalidade_validade) === 'ANO') {

                $data_manipulada = new DateTime($data_venda);
                $data_manipulada->add(new DateInterval('P' . intval($tempo_validade) . 'Y'));
                $data_prevista = $data_manipulada->format('Y-m-d');
                // echo '</br>';
                // echo 'Data da venda: ' . $data_venda . '<br>';
                // echo 'Data de vencimento: ' . $data_prevista1;

                $dadosValidade = [

                    'id_usuario_venda_pespectiva' => $id_usuario_venda,
                    'id_entidade_venda_pespectiva' => $id_entidade_venda,
                    'id_produto_venda_pespectiva'  => $id_produto_venda,
                    'nome_venda_pespectiva' => $cliente_validade,
                    'telefone_venda_pespectiva' => $contato_validade,
                    'data_venda_pespectiva' => $data_venda,
                    'item_venda_pespectiva' => $item_produto_venda,
                    'preco_venda_pespectiva' => $precoVenda,
                    'data_prevista_venda_pespectiva' => $data_prevista,
                    'mes_venda_pespectiva' => date('m'),
                    'ano_venda_pespectiva' => date('Y')
                ];

                $VendaPespectiva->inserirVendaPespectiva($dadosValidade);


            } else if (trim($modalidade_validade) === 'MES') {

                $data_manipulada = new DateTime($data_venda);
                $data_manipulada->add(new DateInterval('P' . intval($tempo_validade) . 'M'));
                $data_prevista = $data_manipulada->format('Y-m-d');
                // echo '</br>';
                // echo 'Data da venda: ' . $data_venda . '<br>';
                // echo 'Data de vencimento: ' . $data_prevista1;

                $dadosValidade = [

                    'id_usuario_venda_pespectiva' => $id_usuario_venda,
                    'id_entidade_venda_pespectiva' => $id_entidade_venda,
                    'id_produto_venda_pespectiva'  => $id_produto_venda,
                    'nome_venda_pespectiva' => $cliente_validade,
                    'telefone_venda_pespectiva' => $contato_validade,
                    'data_venda_pespectiva' => $data_venda,
                    'item_venda_pespectiva' => $item_produto_venda,
                    'preco_venda_pespectiva' => $precoVenda,
                    'data_prevista_venda_pespectiva' => $data_prevista,
                ];

                $VendaPespectiva->inserirVendaPespectiva($dadosValidade);

            }
        }
        $Venda->inserirVenda($dados);

        header('Location: ../registrarVenda.php?status=sucesso');

    } else {

        session_destroy();
        header('Location: ../index.php');
        die();

    }
} else {

    
}
