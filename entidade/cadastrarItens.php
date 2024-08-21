<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$entidade = new Entidades;

$Entidade = $entidade->chamaEntidadeId($_SESSION['id_entidade_usuario_adm_pj']);

?>

<div class="container mt-3">
    <div class="row">
        <?php if (isset($_GET['status']) and isset($_GET['status']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Item <strong>cadastrado com sucesso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>
        <!-- Card -->
        <div class="col-md-12 col-sm-12 col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    Cadastrar um Novo Item
                </div>
                <div class="card-body">
                    <form action="provedoresEntidade/CadastrarItens.php" method="post">
                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                <label for="">Nome Item:</label>
                                <input class="form-control" required type="text" name="modelo_item_preco">
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2 ">
                                <label for="">Preço de Custo:</label>
                                <div class="input-group">
                                    <div class="input-group-text" id="btnGroupAddon">R$</div>
                                    <input type="text" name="custo_item_preco" class="form-control money" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                <label for="">Preço de Venda:</label>
                                <div class="input-group">
                                    <div class="input-group-text" id="btnGroupAddon">R$</div>
                                    <input type="text" id="currency-input" name="preco_venda_item_preco" class="form-control money" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                <label for="">Validade do item:</label>
                                <input class="form-control" required type="text" name="validade_item_preco">
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2 mt-2 float-xl-end">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria_validade_item_preco" value="MES">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <strong>Meses</strong>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="categoria_validade_item_preco" value="ANO" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <strong>Ano</strong>
                                    </label>
                                </div>
                            </div></br>

                            <input type="hidden" name="id_entidade_item_preco" value="<?= $_SESSION['id_entidade_usuario_adm_pj'] ?>">

                            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 mt-3">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#currency-input').mask('000.000.000.000.000,00', {
            reverse: true
        });
    });
</script>


<?php require_once 'controladoresEntidade/footer.php'; ?>