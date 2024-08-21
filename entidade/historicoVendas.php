<?php
session_start();
include '../provedores/Classes.php';
verificaSessao();
include_once 'controladoresEntidade/controller.php';

// print_r($_SESSION);

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-xl-4 col-sm-12 col-md-12 col-lg-36 mt-2">
            <div class="card">
                <div class="card-header">
                    Consulte o Histórico de Vendas
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

                    <input type="hidden" id="id_usuario" value="<?= $_SESSION['id_usuario_adm_pj']?>">
                    <input type="hidden" id="id_entidade" value="<?= $_SESSION['id_entidade_usuario_adm_pj'] ?>">

                    <div class="col-xl-6">
                        <button class="btn btn-secondary" onclick="historicoVendas()" type="submit">Consultar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="hist-vendas" class="col-12 col-xl-8 col-sm-12 col-md-12 col-lg-8 mt-2 form-section">
            <div class="card">
                <div class="card-header">
                    Consulte o Histórico de Vendas
                    <a onclick="ExportaExcel()" href="javascript:void(0);"><span class="float-end badge text-bg-success">Baixar para Excel</span></a>
                </div>
                <div class="card-body">
                    <span id="conteudoErro" class="form-section"><h5>Não há vendas nesse período!</h5></span>
                    <div id="conteudo"></div>
                </div>
            </div>
        </div>

    </div>
</div>



<?php require_once 'controladoresEntidade/footer.php'; ?>