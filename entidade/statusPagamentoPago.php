<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$Pagamentos = new Vendas;

$StatusPagamento = $Pagamentos->vendasStatus($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);

// echo '<pre>';
// print_r($StatusPagamento);
// echo '</pre>';

?>

<div class="container">
    <div class="row">
        <h5 class="text-center mt-3">Analisar Pagamentos</h5>
        <div class="mt-4">
            <div class="card">
                <div class="card-header">
                    <em>Status dos Pagamentos</em>
                </div>
                <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código:</th>
                                <th>Status Pagamento do Custo:</th>
                                <th>Pagamento Cliente:</th>
                                <th>Comprovante</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($StatusPagamento as $Status) { ?>
                                <tr>
                                    <td><?= $Status['id_venda'] ?></td>
                                    <td>#<?= $Status['codigo_venda'] ?></td>
                                    <td><span class="text-success"><strong><em><?= $Status['status_custo_venda'] ?></em></strong></span></td>
                                    <td>
                                        <?php if ($Status['status_pg_cliente_venda'] == "PAGO") { ?>
                                            <span class="text-success"><strong><em><?= $Status['status_pg_cliente_venda'] ?></em></strong></span>
                                        <?php } else { ?>
                                            <span class="text-danger"><strong><em><?= $Status['status_pg_cliente_venda'] ?></em></strong></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($Status['comprovante_pagamento'])){?>
                                        <a href="<?= $Status['comprovante_pagamento'] ?>" target="_blank" rel="Comprovante de Pagamento">
                                            <span class="badge text-bg-secondary"><strong>Visualizar</strong></span>
                                        </a>
                                        <?php } else { ?>
                                            <span class="text-danger"><strong>Sem comprovante</strong></span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <button type="button" class="badge text-bg-primary" data-bs-toggle="modal" data-bs-target="#<?= $Status['id_venda'] ?>exampleModal">
                                            Atualizar Status/Comprovante
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="<?= $Status['id_venda'] ?>exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Código da Venda #<?= $Status['codigo_venda'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="provedoresEntidade/AtualizarStatus.php" enctype="multipart/form-data" method="post">
                                                            <input type="hidden" name="id_venda" value="<?= $Status['id_venda'] ?>">
                                                            <input type="hidden" name="codigo_venda" value="<?= $Status['codigo_venda'] ?>">

                                                            <label for="">Status Pagamento do Custo:</label>
                                                            <select class="form-control" name="status_custo_venda" id="">
                                                                <option value="PAGO">PAGO</option>
                                                                <option value="ABERTO">ABERTO</option>
                                                                <option value="NA">NÃO EMITIDO</option>
                                                            </select></br>

                                                            <label for="">Pagamento do Cliente:</label>
                                                            <select class="form-control" name="status_pg_cliente_venda" id="">
                                                                <option value="PAGO">PAGO</option>
                                                                <option value="ABERTO">ABERTO</option>
                                                                <option value="NA">NÃO EMITIDO</option>
                                                            </select></br>

                                                            <div class="form-check">
                                                                <input onchange="liberaComprovante(<?= $Status['id_venda'] ?>)" class="form-check-input" type="checkbox" value="" id="atualizaComprovante_<?= $Status['id_venda'] ?>">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Deseja atualizar ou inserir um comprovante?
                                                                </label>
                                                            </div></br>

                                                            <label for="">Inserir Comprovate: </label>
                                                            <input type="file" id="campoComprovante_<?= $Status['id_venda'] ?>" disabled class="form-control" name="comprovante">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'controladoresEntidade/footer.php'; ?>