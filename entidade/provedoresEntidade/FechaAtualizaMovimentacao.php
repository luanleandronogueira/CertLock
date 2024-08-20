<?php
session_start();
include "../../provedores/Classes.php";
echo '<pre>';
print_r($_POST);
echo '</pre>';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $Movimentacao = new Movimentacao;
    extract($_POST);

    if ($data_mensal_movimentacao) {

        $consultaMovimentacao = $Movimentacao->consultaMovimentacao($data_mensal_movimentacao, $id_usuario_movimentacao, $id_entidade_movimentacao);

        if ($consultaMovimentacao['RESULT'] > 0) {

            $Movimentacao->atualizarMovimentacao($id_usuario_movimentacao, $id_entidade_movimentacao, $data_atualizacao_movimentacao, $receita_movimentacao, $despesa_movimentacao, $soma_movimentacao, $lucro_prejuizo_movimentacao);

            print_r($consultaMovimentacao);
        } else {

            $Movimentacao->inserirMovimentacao($id_usuario_movimentacao, $id_entidade_movimentacao, $data_mensal_movimentacao, $data_atualizacao_movimentacao, $receita_movimentacao, $despesa_movimentacao, $soma_movimentacao, $lucro_prejuizo_movimentacao);
        }

    } else {
        header("Location: ../index.php");
        session_destroy();
        die();
    }

    header("Location: ../controleReceitaDespesas.php?statusRD=sucesso&&FechaAtualizaMovimentacao");

} else {
    header("Location: ../index.php");
    session_destroy();
    die();
}
