<?php 
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$Itens = new Itens;

$item = $Itens->chamaItens($_SESSION['id_entidade_usuario_adm_pj']);

// echo '<pre>';
// print_r($item);
// echo '</pre>';

?>

        <div class="container mt-3">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            Itens de Venda Cadastrados
                        </div>
                        <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Modelo</th>
                                <th>Custo</th>
                                <th>Preço Venda</th>
                                <th>Editar</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($item as $i) { ?>
                            <tr>
                            
                                <td><?= $i['id_item_preco']?></td>
                                <td><?= $i['modelo_item_preco']?></td>
                                <td><?= $i['custo_item_preco']?></td>
                                <td><?= $i['preco_venda_item_preco']?></td>
                                <td>
                                    <button type="button" class="badge text-bg-secondary" data-bs-toggle="modal" data-bs-target="#<?=$i['id_item_preco']?>staticBackdrop">
                                    Editar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?=$i['id_item_preco']?>staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?=$i['id_item_preco']?>staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="<?=$i['id_item_preco']?>staticBackdropLabel">Atualizar Item</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="provedoresEntidade/AtualizarItens.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-lg-12 col-xl-12">
                                                        <label for="">Nome Item:</label>
                                                        <input class="form-control" value="<?=$i['modelo_item_preco']?>" required type="text" name="modelo_item_preco">
                                                    </div>

                                                    <div class="col-md-6 col-sm-12 col-lg-12 col-xl-12 ">
                                                        <label for="">Preço de Custo:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text" id="btnGroupAddon">R$</div>
                                                            <input type="text" name="custo_item_preco" value="<?=$i['custo_item_preco']?>" class="form-control money" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12 col-lg-12 col-xl-12">
                                                        <label for="">Preço de Venda:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text" id="btnGroupAddon">R$</div>
                                                            <input type="text" id="currency-input" 
                                                            value="<?=$i['preco_venda_item_preco']?>" name="preco_venda_item_preco" class="form-control money" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="id_item_preco" value="<?=$i['id_item_preco']?>">

                                                    <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                                        <button class="btn btn-primary" type="submit">Atualizar</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>   
                            </tr>
                        <?php }?>

                        </tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>






<?php require_once 'controladoresEntidade/footer.php'; ?>