<?php

session_start();
include "../../provedores/Classes.php";

if (!empty($_POST)) {

    $Venda = new Vendas;
    $VendaPespectiva = new Vendas_Pespectivas;
    $ReceitasDespesas = new ReceitasDespesas;

    $precoVenda = floatval(str_replace(',', '.', $_POST['preco_vendido_venda'])) - floatval(str_replace(',', '.', $_POST['desconto_venda']));

    echo $id_usuario_venda = isset($_POST['id_usuario_venda']) ? $_POST['id_usuario_venda'] : null;
    echo $id_entidade_venda = isset($_POST['id_entidade_venda']) ? $_POST['id_entidade_venda'] : null;


    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    extract($_POST);

    if(!empty($preco_alterado_venda)){

        echo $precoVenda = $preco_alterado_venda;

    }

    if (isset($btn_submit_pf) || isset($btn_submit_pj)) {

        $dados = [

            'id_usuario_venda' => $id_usuario_venda,
            'id_entidade_venda' => $id_entidade_venda,
            'id_produto_venda' => $id_produto_venda,
            'data_venda' => $data_venda,
            'codigo_venda' => $codigo_venda,
            'nome_cliente_venda' => $nome_cliente_venda,
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
                

                if ($id_usuario_venda && $id_entidade_venda) {
                    $VendaPespectiva->inserirVendaPespectiva($dadosValidade);
                } else {
                    echo "Erro: id_usuario_venda ou id_entidade_venda estão nulos.";
                }

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

                // $VendaPespectiva->inserirVendaPespectiva($dadosValidade);
            }
        }

        //Separando as string de mês e ano
        $data_mensal_anual = explode("-", $data_venda);
        $data_mensal_receita_despesa = $data_mensal_anual[0] . "-" . $data_mensal_anual[1];

        // aqui insere a venda;
        // $Venda->inserirVenda($dados);

        $tituloCliente = $item_produto_venda . " - " . $nome_cliente_venda;

        // inserir Receita
        // $ReceitasDespesas->inserirReceitaDespesa($id_usuario_venda, $id_entidade_venda, $tituloCliente, 'R', $precoVenda, $data_venda, $data_mensal_receita_despesa);

        // inserir Despesas
        // $ReceitasDespesas->inserirReceitaDespesa($id_usuario_venda, $id_entidade_venda, $tituloCliente, 'D', $preco_custo_venda, $data_venda, $data_mensal_receita_despesa);

        // header('Location: ../registrarVenda.php?status=sucesso');

    } else {

        session_destroy();
        header('Location: ../index.php');
        die();
    }
} else {

    session_destroy();
    header('Location: ../index.php');
    die();
}
