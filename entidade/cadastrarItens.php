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
                                        <input type="number" name="custo_item_preco" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                    <label for="">Preço de Venda:</label>
                                    <div class="input-group">
                                        <div class="input-group-text" id="btnGroupAddon">R$</div>
                                        <input type="number" name="preco_venda_item_preco" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                    </div>
                                </div>

                                <input type="hidden" value="<?=$_SESSION['id_entidade_usuario_adm_pj']?>">

                                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                </div>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>







<?php require_once 'controladoresEntidade/footer.php'; ?>