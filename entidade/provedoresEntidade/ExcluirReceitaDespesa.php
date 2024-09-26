<?php 
session_start();
include "../../provedores/Classes.php";

$ReceitasDespesas = new ReceitasDespesas;

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET') {

    if(!empty($_GET)){

        $ReceitasDespesas->excluirReceitaDespesa(trim($_GET['id']));
        header("Location: ../controleReceitaDespesas.php?statusE=sucesso");

    } else {

        header("Location: ../controleReceitaDespesas.php?statusF=falhou");
    }

} else {

    session_destroy();
    header("Location: Sair.php");
}
