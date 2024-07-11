<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

// print_r($_SESSION);

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
                    Vendas para o mês <?= date('m') ?>
                </div>
                <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Razão Social</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach($Entidade as $E) {?> -->
                            <tr>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint praesentium, tempore quas dolore quis iste molestias ullam distinctio eaque corporis est beatae earum consequuntur nisi neque non dolorem nihil velit!
                                
                            </tr>
                            <!-- <?php } ?> -->
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
                <p><strong>Data de Venda:</strong> <span id="modalDataVenda"></span></p>
                <p><strong>Data Prevista:</strong> <span id="modalDataPrevista"></span></p>
                <p><strong>Preço:</strong> <span id="modalPreco"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php require_once 'controladoresEntidade/footer.php'; ?>