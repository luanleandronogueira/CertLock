<?php
session_start();
include '../provedores/Classes.php';
verificaSessao();
include_once 'controladoresEntidade/controller.php';

$ClientePF = new ClientesPf;
$Cliente = $ClientePF->BuscaCliente($_GET['cpf']);

// echo '<pre>';
// print_r($Cliente);
// echo '</pre>';
?>

<div class="container mt-3">
    <div class="row">
        <div>
            <?php if (isset($_GET['status']) and isset($_GET['status']) == 'sucesso') { ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Dados <strong>atualizado com sucesso!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php } ?>
            <div class="card">
                <div class="card-header">
                    Cliente
                </div>
                <div class="card-body">
                    <form action="provedoresEntidade/AtualizaCliente.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                <label for="">CPF:</label>
                                <input class="form-control" value="<?= $Cliente['cpf_cliente_pf'] ?>" required type="number" name="cpf_cliente_pf" id="cpf_entidade_pf">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-10 col-xl-10">
                                <label for="">Nome Completo:</label>
                                <input class="form-control" value="<?= $Cliente['nome_cliente_pf'] ?>" required type="text" name="nome_cliente_pf" id="nome_entidade_pf">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                <label for="">Email:</label>
                                <input class="form-control" value="<?= $Cliente['email_cliente_pf'] ?>" required type="text" name="email_cliente_pf" id="email_entidade_pf">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                <label for="">Contato:</label>
                                <input class="form-control" value="<?= $Cliente['contato_cliente_pf'] ?>" required type="number" name="contato_cliente_pf" id="contato_entidade_pf">
                            </div>

                            <input type="hidden" name="id_cliente_pf" value="<?=$Cliente['id_cliente_pf']?>">

                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                <button class="btn btn-primary" name="btn_submit_pf" id="btn_submit_pf" type="submit">Atualizar Dados</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

















<?php require_once 'controladoresEntidade/footer.php'; ?>