<?php 
session_start();
include "../../provedores/Classes.php";

$entidade = new Entidades;
$Entidade = $entidade->chamaEntidadeId($_SESSION['id_entidade_usuario_adm_pj']);

if(!empty($_POST)){

    if(isset($_POST['btn_submit_pj'])) {

        $ClientePj = new ClientesPj;
        extract($_POST);
        $consulta = $ClientePj->consultaCliente($cnpj_cliente_pj);

        if($consulta['total'] == 0) {

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

            header("Location: ../cadastrarCliente.php?disponibilidade=Existente&&Cliente{$cnpj_cliente_pj}&&CadastrarCliente"); 

        }

        

    } else if (isset($_POST['btn_submit_pf'])) {

        $ClientePf = new ClientesPf;
        extract($_POST);
        $consulta = $ClientePf->consultaCliente($cpf_cliente_pf);

        //var_dump($consulta);

        if($consulta['total'] == 0) {

            $dados = [

                'cpf_cliente_pf' => $cpf_cliente_pf,
                'nome_cliente_pf' => $nome_cliente_pf,
                'email_cliente_pf' => $email_cliente_pf,
                'contato_cliente_pf' => $contato_cliente_pf,
                'id_usuario_cliente_pf' => $_SESSION['id_usuario_adm_pj'],
                'entidade_cliente_pf' => $Entidade['id_entidade']
            ];
    
            $ClientePf->inserirCliente($dados);
            header("Location: ../cadastrarCliente.php?status=sucesso&&CadastrarCliente");

            echo 'Executou a inserção';

        } else {

            header("Location: ../cadastrarCliente.php?disponibilidade=Existente&&Cliente{$cpf_cliente_pf}&&CadastrarCliente");

        }

    } else {

        header("Location: index.php?ErroAqui");
        die();
    }
    


} else {

    //echo 'caiu aqui';
    header("Location: index.php?ErroAqui");
    die();

}

?>