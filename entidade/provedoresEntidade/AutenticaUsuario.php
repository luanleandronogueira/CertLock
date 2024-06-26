<?php 
session_start();
include_once '../../provedores/Classes.php';

$conexao = new Conexao;

if(!empty($_POST)){

    if(!empty($_POST['nome_usuario'])){

        $log = trim($_POST['nome_usuario']);
        $senha = trim($_POST['senha_usuario']);

        $UsuarioPj = new UsuarioAdmPj;

        $usu = $UsuarioPj->chamaUsuario($log);

        // echo '<pre>';
        // print_r($usu);
        // echo '</pre>';

        extract($usu);

        if($status_usuario_adm_pj === 'A'){

            if(password_verify($senha, $senha_usuario_adm_pj)){

                $_SESSION = $usu;

                header('Location: ../dashboard.php');

                echo '<pre>';
                    print_r($usu);
                echo '</pre>';


            } else {


                header("Location: ../index.php?senha=incorreta");
                die();

            }



        } else if($status_usuario_adm_pj === 'B'){

            header("Location: ../index.php?usuario=bloqueado");
            die();

        }


    } else if(strlen($_POST['nome_usuario']) == 11){


        


    } else {




    }



}

