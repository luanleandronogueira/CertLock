<?php 

include 'Classes.php';

if (!empty($_POST)){

    $status_entidade = 'A';
   
    if(isset($_POST['btn_submit_pj'])){

        $Entidades = new Entidades;

        extract($_POST);

        $contagem = $Entidades->verificaEntidade($cnpj_entidade);

        if($contagem['total'] == 0) {

            //print_r($contagem);

            $Entidades->inserirEntidade($cnpj_entidade, ucwords($nome_empresa_entidade), $contato_entidade, ucfirst($logradouro_entidade), $numero_entidade, ucfirst($bairro_entidade), ucwords($cidade_entidade), mb_strtoupper($uf_entidade), $cep_entidade, mb_strtolower($email_entidade), $status_entidade);

            header("Location: ../cadastraEntidade.php?status=sucesso&&nomeEntidade={$nome_empresa_entidade}&&CadastraEntidade");

        } else {
            
            //print_r($contagem);
            header("Location: ../cadastraEntidade.php?condicao=falhou&&nomeEntidade={$nome_empresa_entidade}&&CadastraEntidade");

        }

        

    } elseif (isset($_POST['btn_submit_pf'])){

        $Entidade_pf = new Entidades_pf;

        extract($_POST);

        //print_r($_POST);

        $contagem = $Entidade_pf->verificaEntidadePF($cpf_entidade_pf);

        if($contagem['total'] == 0) {

            $Entidade_pf->inserirEntidadePf($cpf_entidade_pf, ucwords($nome_entidade_pf), $email_entidade_pf, $contato_entidade_pf, $status_entidade);
            header("Location: ../cadastraEntidade.php?status=sucesso&&nomeEntidade={$nome_entidade_pf}&&CadastraEntidade");  

        } else {

            header("Location: ../cadastraEntidade.php?condicao=falhou&&nomeEntidade={$nome_entidade_pf}&&CadastraEntidade");

        }
    
    
    } else {

        header("Location: ../index.php?&&CadastraEntidade");
        die();

    }

} else {


    header("Location: ../index.php?&&CadastraEntidade");
    die();

}