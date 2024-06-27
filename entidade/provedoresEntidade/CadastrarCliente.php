<?php 
session_start();
include "../../provedores/Classes.php";

$ClientePj = new ClientesPj;
$entidade = new Entidades;
$Entidade = $entidade->chamaEntidadeId($_SESSION['id_entidade_usuario_adm_pj']);

echo '<pre>';
    print_r($_GET);
echo '</pre>';

if(!empty($_POST)){

    extract($_POST);

    $dados = [

        'responsavel_cliente_pj' => $responsavel_cliente_pj,
        'telefone_cliente_pj' => $telefone_cliente_pj,
        'cnpj_cliente_pj' => $cnpj_cliente_pj,
        'nome_cliente_pj' => $nome_cliente_pj,
        'contato_cliente_pj' => $contato_cliente_pj,
        'logradouro_cliente_pj' => $logradouro_cliente_pj,
        'numero_cliente_pj' => $numero_cliente_pj,
        'bairro_cliente_pj' => $bairro_cliente_pj,
        'cidade_cliente_pj' => $cidade_cliente_pj,
        'uf_cliente_pj' => $uf_cliente_pj,
        'cep_cliente_pj' => $cep_cliente_pj,
        'email_cliente_pj' => $email_cliente_pj,
        'id_usuario_cliente_pj' => $_SESSION['id_usuario_adm_pj'],
        'entidade_cliente_pj' => $Entidade['id_entidade']

    ];

    $ClientePj->inserirCliente($dados);
    header("Location: ../cadastrarCliente.php?status=sucesso&&CadastrarCliente");


} else {

    echo 'caiu aqui';
    //header("Location: index.php?ErroAqui");
    die();

}

?>