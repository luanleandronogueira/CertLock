<?php 

session_start();
include "../../provedores/Classes.php";

if(!empty($_POST)){

    $Venda = new Vendas;
    $precoVenda = floatval(str_replace(',', '.', $_POST['preco_vendido_venda'])) - floatval(str_replace(',', '.', $_POST['desconto_venda']));

    extract($_POST);
    if(isset($btn_submit_pf)){

        echo '<pre>';
            print_r($_POST) ;
            echo 'Esse é PF';
        echo '</pre>';

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
        print_r($data);

        echo $modalidade_validade;

        if($modalidade_validade === 'ANO') {

            echo $data[0] . '</br>';
            echo $data_prevista = strval($data[0]) + strval($tempo_validade);

        }

        $dadosValidade = [];

        // $Venda->inserirVenda($dados);



    } else {

        echo '<pre>';
            print_r($_POST);
            echo 'Esse é PJ';
        echo '</pre>';

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

        if($modalidade_validade) {

            if(trim($modalidade_validade) === 'ANO') {

                echo $data[0] . '</br>';
                $data_prevista = strval($data[0]) + strval($tempo_validade); 
                echo $data_prevista_venda_pespectiva =  $data_prevista . '-'.$data[1] . '-' . $data[2];

            } else if(trim($modalidade_validade) === 'MES') {

                if($data[1] === '12') {

                    echo $data[1] = '01';
                    echo '</br>';
                    $data_prevista = strval($data[1]) + strval($tempo_validade);
                    echo $data_prevista = $data_prevista - 1;
                    // implementar o ano e o mes for 12

                } else {

                    echo $data[1] . '</br>';
                    echo $data_prevista = strval($data[1]) + strval($tempo_validade);
                    // verificar se a soma do meses for maior que 12
                }


                // $dadosValidade = [
                    
                //     'id_usuario_venda_pespectiva' => ,
                //     'id_entidade_venda_pespectiva' => ,
                //     'id_produto_venda_pespectiva'  => ,
                //     'data_venda_pespectiva' => ,
                //     'item_venda_pespectiva' => ,
                //     'preco_venda_pespectiva' => ,
                //     'data_prevista_venda_pespectiva' => ,
                // ];

            } 
        }
        // $Venda->inserirVenda($dados);

    }


} else {


}