<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$Pagamentos = new Vendas;

$StatusPagamento = $Pagamentos->vendasStatusAberto($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);

// echo '<pre>';
// print_r($StatusPagamento);
// echo '</pre>';
?>
<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'statusPagamento.php';
        }
</script>

<div class="container mt-3">
    <div class="row">
        <?php if (isset($_GET['status']) and isset($_GET['status']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Baixa <strong>dada com sucesso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>
        <?php if (isset($_GET['formato']) and isset($_GET['formato']) == 'NA') { ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Formato não aceito, somente é aceito <strong>.JPEG, .JPG, .PDF e .PNG</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>

        <h5 class="text-center mt-3">Analisar Pagamentos</h5>
        <a href="statusPagamentoPago.php"><span class="badge text-bg-success float-end">Ver Solicitações PAGAS</span></a>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($StatusPagamento as $Status) { ?>
                                <tr>
                                    <td><?= $Status['id_venda'] ?></td>
                                    <td>#<?= $Status['codigo_venda'] ?></td>
                                    <td><span class="text-warning"><strong><em><?= $Status['status_custo_venda'] ?></em></strong></span></td>
                                    <td>
                                        <?php if ($Status['status_pg_cliente_venda'] == "PAGO") { ?>
                                            <span class="text-success"><strong><em><?= $Status['status_pg_cliente_venda'] ?></em></strong></span>
                                        <?php } else { ?>
                                            <span class="text-danger"><strong><em><?= $Status['status_pg_cliente_venda'] ?></em></strong></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button type="button" class="badge text-bg-primary" data-bs-toggle="modal" data-bs-target="#<?= $Status['id_venda'] ?>exampleModal">
                                            Atualizar Status
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
                                                                <input onchange="liberaComprovante()" class="form-check-input" type="checkbox" value="" id="atualizaComprovante">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Deseja atualizar ou inserir um comprovante?
                                                                </label>
                                                            </div></br>

                                                            <label for="">Inserir Comprovate: </label>
                                                            <input type="file" disabled class="form-control" name="comprovante" id="campoComprovante">

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