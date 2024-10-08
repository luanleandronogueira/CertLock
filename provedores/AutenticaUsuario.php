<?php
session_start();
include 'Classes.php';
$UsuarioMaster = new UsuarioMaster;

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $login = trim($_POST['nome_usuario_master']);
    $senha = trim($_POST['senha_usuario_master']);

    if (!empty($login)) {

        $usuario_master = $UsuarioMaster->chamaUsuarioMaster(trim($login));
        // echo '<pre>';
        //     print_r($usuario_master);
        // echo '</pre>';

        if(!empty($usuario_master)){

            if($usuario_master['status_usuario_master'] === 'A'){

                if(password_verify($senha, $usuario_master['senha_usuario_master'])){

                    $_SESSION = $usuario_master;
                    header('Location: ../analisaEntidade.php');
                    //echo 'caiu aqui';

                } else {
                    
                    header("Location: ../login.php?senha=incorreta");
                    die();

                }

            } else if($usuario_master['status_usuario_master'] === 'B') {

                header("Location: ../login.php?usuario=bloqueado");
                die();
            }

        } else {

            header("Location: ../index.php?senha=incorreta");
            die();
        }
    }
} else {

    header("Location: ../sair.php");
    die();

}
