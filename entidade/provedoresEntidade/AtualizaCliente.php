<?php 
include "../../provedores/Classes.php";

$ClienteCnpj = new ClientesPj;
$ClienteCpf = new ClientesPf;

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['btn_submit_pj'])){

        $ClienteCnpj->atualizaCliente($_POST);
        header("Location: ../clienteCnpj.php?cnpj={$_POST['cnpj_cliente_pj']}&&status=sucesso&&AtualizarClienteCnpj");

    } else if (isset($_POST['btn_submit_pf'])) {

        $ClienteCpf->atualizaCliente($_POST);
        header("Location: ../clienteCpf.php?cpf={$_POST['cpf_cliente_pf']}&&status=sucesso&&AtualizarClienteCpf");

    } else {
        header("Location: ../index.php");
        session_destroy();
        die();
    }

} else {

    header("Location: ../index.php");
    session_destroy();
    die();
}


?>