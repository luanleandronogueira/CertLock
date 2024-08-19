<?php
session_start();
include "../../provedores/Classes.php";

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ReceitasDespesas = new ReceitasDespesas;

    extract($_POST);

    $titulo_receita_despesa = strtoupper($titulo_receita_despesa);

    $data_mensal_anual = explode("-", $data_receita_despesa);
    $data_mensal_receita_despesa = $data_mensal_anual[0] . "-" . $data_mensal_anual[1];

    // $valor = floatval(str_replace(',', '.', $valor_receita_despesa));
    $valor = floatval(str_replace(',', '.', str_replace('.', '', $valor_receita_despesa)));

    $ReceitasDespesas->inserirReceitaDespesa($id_usuario_receita_despesa, $id_entidade_receita_despesa, $titulo_receita_despesa, $categoria_receita_despesa, $valor, $data_receita_despesa, $data_mensal_receita_despesa);

    header('Location: ../controleReceitaDespesas.php?status=sucesso');

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

}
