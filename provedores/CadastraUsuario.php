<?php 

include 'Classes.php';

if (!empty($_POST)){

    if(isset($_POST['btn_submit_pj'])){

        $status_usuario_adm_pj = 'A';

        $UsuarioAdmPj = new UsuarioAdmPj;

        extract($_POST);

        $contagem  = $UsuarioAdmPj->verificaUsuario($cpf_usuario_adm_pj);

        if($contagem['total'] == 0) {

            $senha = substr($cpf_usuario_adm_pj, 0, 4);

            $senha_usuario_adm_pj = password_hash($senha, PASSWORD_DEFAULT);

            $dados = [
                'cpf_usuario_adm_pj' => $cpf_usuario_adm_pj,
                'email_usuario_adm_pj' => $email_usuario_adm_pj,
                'nome_usuario_adm_pj' => ucwords($nome_usuario_adm_pj),
                'senha_usuario_adm_pj' => $senha_usuario_adm_pj,
                'status_usuario_adm_pj' => $status_usuario_adm_pj,
                'id_entidade_usuario_adm_pj' => $id_entidade_usuario_adm_pj
            ];

            $UsuarioAdmPj->inserirUsuario($dados);
            header("Location: ../cadastraUsuario.php?status=sucesso&&nomeEntidade={$nome_usuario_adm_pj}&&CadastraUsuario");

        } else {

            header("Location: ../cadastraUsuario.php?condicao=falhou&&nomeEntidade={$nome_usuario_adm_pj}&&CadastraUsuario");
        }

    } else if (isset($_POST['btn_submit_pf'])){

        $status_usuario_adm_pf = 'A';

        $UsuarioAdmPf = new UsuarioAdmPf;

        extract($_POST);

        print_r($_POST);

        $contagem  = $UsuarioAdmPf->verificaUsuario($cpf_usuario_adm_pf);

        if($contagem['total'] == 0) {

            $senha = substr($cpf_usuario_adm_pf, 0, 4);

            $senha_usuario_adm_pf = password_hash($senha, PASSWORD_DEFAULT);

            $dados = [
                'cpf_usuario_adm_pf' => $cpf_usuario_adm_pf,
                'email_usuario_adm_pf' => $email_usuario_adm_pf,
                'nome_usuario_adm_pf' => ucwords($nome_usuario_adm_pf),
                'senha_usuario_adm_pf' => $senha_usuario_adm_pf,
                'status_usuario_adm_pf' => $status_usuario_adm_pf,
                'id_entidade_usuario_adm_pf' => $id_entidade_usuario_adm_pf
            ];

            $UsuarioAdmPf->inserirUsuario($dados);
            header("Location: ../cadastraUsuario.php?status=sucesso&&nomeEntidade={$nome_usuario_adm_pf}&&CadastraUsuario");


        } else {

            header("Location: ../cadastraUsuario.php?condicao=falhou&&nomeEntidade={$nome_usuario_adm_pf}&&CadastraUsuario");
        }


    } else {



    }


} else  {



} 
