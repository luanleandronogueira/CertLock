<?php 

// echo '<pre>';

//     print_r($_POST);

// echo '</pre>';


include 'Classes.php';

if (!empty($_POST)){
   
    if(isset($_POST['btn_editar_pj'])){

        $Entidades = new Entidades();

        extract($_POST);

        $Entidades->atualizarEntidade($cnpj_entidade, $nome_empresa_entidade, $contato_entidade, $logradouro_entidade, $numero_entidade, $bairro_entidade, $cidade_entidade, $uf_entidade, $cep_entidade, $email_entidade, $status_entidade);

        header("Location: ../analisaEntidade.php?status=atualizado&&nomeEntidade={$nome_empresa_entidade}&&CadastraEntidade");
        

    } elseif (isset($_POST['btn_editar_pf'])){

        $Entidade_pf = new Entidades_pf;

        extract($_POST);

        $Entidade_pf->atualizarEntidadePf($cpf_entidade_pf, $nome_entidade_pf, $email_entidade_pf, $contato_entidade_pf, $status_entidade);
        header("Location: ../analisaEntidade.php?status=atualizado&&nomeEntidade={$nome_entidade_pf}&&CadastraEntidade");  

    
    } else {

        header("Location: ../index.php?&&CadastraEntidade");
        die();

    }

} else {


    header("Location: ../index.php?&&CadastraEntidade");
    die();

}