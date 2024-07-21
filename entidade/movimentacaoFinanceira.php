<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$movimentacaoFinanceira = new Vendas;

$movimentacao = $movimentacaoFinanceira->chamaMovimentacaoVendasMes($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj'], '2024-07-01', '2024-07-30');

// echo '<pre>';

// print_r($movimentacao);

// echo '</pre>';

?>

<div class="container mt-3">
    <div class="col-12 col-xl-12 col-sm-12 col-md-12 col-lg-12 mt-2">
        <div class="card">
            <div class="card-header">
                Consulte o período
            </div>
            <div class="card-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <label for="">Data Inicial</label>
                    <input class="form-control" required id="dataInicial" type="date">
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <label for="">Data Final</label>
                    <input class="form-control" required id="dataFinal" type="date">
                </div></br>

                <input type="hidden" id="id_usuario" value="<?= $_SESSION['id_usuario_adm_pj'] ?>">
                <input type="hidden" id="id_entidade" value="<?= $_SESSION['id_entidade_usuario_adm_pj'] ?>">

                <div class="col-xl-6">
                    <button class="btn btn-secondary" onclick="MovimentacaoFinanceira()" type="submit">Consultar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="movimentacao" class="row form-section mb-5">
        <div class="mt-3">
            <div class="card">
                <div class="card-header">Movimentação Financeira</div>
                <div class="card-body">
                    <div id="movimentacaoSucesso" class="form-section">

                    </div>
                    <div id="movimentacaoVazia" class="form-section">
                        <center>
                            <h5>Não há movimentações financeiras no período informado</h5>
                            <img src="../assets/imagens/movimentacaoErro.png" width="400px" height="400px">
                        </center>
                    </div>
                </div>
                <div id="movimentacaoMonetaria" class="card-footer text-muted form-section2">
                    <strong>TOTAL DA MOVIMENTAÇÃO MENSAL</strong></br>
                    <strong>Custo:</strong> <span id="custo"></span> <strong>Descontos:</strong> <span id="desconto"></span> <strong>Venda:</strong> <span id="venda"></span>
                    <strong>LUCRO:</strong> <span id="lucro"></span> 
                </div>
            </div>
        </div>
    </div>
</div>


















<?php require_once 'controladoresEntidade/footer.php'; ?>