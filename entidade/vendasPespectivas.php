<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';
$anomanipulada = date('Y') + 1;
$VendasPespectivas = new Vendas_Pespectivas;

$Vendas = $VendasPespectivas->ChamaVendasPespectivasMes($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj'], date('m'), date('Y'));



// echo '<pre>';
// print_r($Vendas);
// echo '</pre>';
?>

<div class="container mt-5">
    <div class="row">
        <center class="mb-3">
            <h5>Acompanhe todas as suas vendas em pespectiva</h5>
            <hr>
        </center>
        <div class="col-6 col-xl-8 col-lg-8 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">Projeção de Vendas</div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-4 col-lg-4 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    Vendas feitas e em pespectiva para o mês <?= date('m') ?>
                </div>
                <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Razão Social</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($Vendas as $V) {?>
                            <tr>
                                <td><?=$V['id_venda_pespectiva']?></td>
                                <td><?=$V['nome_venda_pespectiva']?></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal" id="eventModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Conteúdo do Modal -->
                <p><strong>Item:</strong> <span id="modalItem"></span></p>
                <p><strong>Cliente: </strong> <span id="modalCliente"></span></p>
                <p><strong>Contato: </strong> <span id="modalTelefone"></span></p>
                <p><strong>Ultima Venda Desde Item: </strong> <span id="ultimaVenda"></span></p>
                <p><strong>Data da Proxima Venda:</strong> <span id="modalDataVenda"></span></p>
                <p><strong>Valor da Venda:</strong> <span id="modalPreco"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <a href="registrarVendaPespectiva.php?nome=<?=$V['nome_venda_pespectiva']?>" class="btn btn-primary">Ir para Venda</a>
            </div>
        </div>
    </div>
</div>


<?php require_once 'controladoresEntidade/footer.php'; ?>