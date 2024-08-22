<?php
session_start();
include '../provedores/Classes.php';
verificaSessao();
include_once 'controladoresEntidade/controller.php';

$ClientePJ = new ClientesPj;

$Cliente = $ClientePJ->BuscaCliente($_GET['cnpj']);

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
                    <div id="PJ">
                        <form action="provedoresEntidade/AtualizaCliente.php" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                    <label for="">Nome do Responsável</label>
                                    <input class="form-control" value="<?= $Cliente['responsavel_cliente_pj'] ?>" name="responsavel_cliente_pj" required type="text">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                    <label for="">Telefone do Responsável</label>
                                    <input class="form-control" value="<?= $Cliente['telefone_cliente_pj'] ?>" name="telefone_cliente_pj" required type="text"><br>
                                </div>

                                <hr>

                                <h6 class="card-title text-center">Dados da Empresa</h6>
                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                    <label for="">CNPJ: </label>
                                    <input class="form-control" value="<?= $Cliente['cnpj_cliente_pj'] ?>" required type="number" onblur="verificarCampoCNPJ();" name="cnpj_cliente_pj" id="cnpj_entidade">
                                    <small><em><span id="mensagemOff"></span></em></small>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                                    <label for="">Nome da Empresa:</label>
                                    <input class="form-control" value="<?= $Cliente['nome_cliente_pj'] ?>" required type="text" name="nome_cliente_pj" id="nome_empresa_entidade">

                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                    <label for="">Contato:</label>
                                    <input class="form-control" value="<?= $Cliente['contato_cliente_pj'] ?>" required type="text" name="contato_cliente_pj" id="contato_entidade">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                    <label for="">Logradouro:</label>
                                    <input class="form-control" value="<?= $Cliente['logradouro_cliente_pj'] ?>" required type="text" name="logradouro_cliente_pj" id="logradouro_entidade">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-1 col-xl-1">
                                    <label for="">Número:</label>
                                    <input class="form-control" value="<?= $Cliente['numero_cliente_pj'] ?>" required type="text" name="numero_cliente_pj" id="numero_entidade">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                    <label for="">Bairro:</label>
                                    <input class="form-control" value="<?= $Cliente['bairro_cliente_pj'] ?>" required type="text" name="bairro_cliente_pj" id="bairro_entidade">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                    <label for="">Cidade:</label>
                                    <input class="form-control" value="<?= $Cliente['cidade_cliente_pj'] ?>" required type="text" name="cidade_cliente_pj" id="cidade_entidade">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                    <label for="">UF:</label>
                                    <input class="form-control" value="<?= $Cliente['uf_cliente_pj'] ?>" required required type="text" name="uf_cliente_pj" id="uf_entidade">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                    <label for="">CEP:</label>
                                    <input class="form-control" value="<?= $Cliente['cep_cliente_pj'] ?>" required type="text" name="cep_cliente_pj" id="cep_entidade">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                                    <label for="">Email:</label>
                                    <input class="form-control" value="<?= $Cliente['email_cliente_pj'] ?>" required type="text" name="email_cliente_pj" id="email_entidade">
                                </div>

                                <input type="hidden" name="id_cliente_pj" value="<?= $Cliente['id_cliente_pj'] ?>">

                                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                    <button class="btn btn-primary" name="btn_submit_pj" id="btn_submit_pj" type="submit">Atualizar Dados</button>
                                </div>
                                <div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'controladoresEntidade/footer.php'; ?>