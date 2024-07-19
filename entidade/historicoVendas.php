<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-xl-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Consulte o Histórico de Vendas
                </div>
                <div class="card-body">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <label for="">Data Inicial</label>
                        <input class="form-control" type="date">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <label for="">Data Final</label>
                        <input class="form-control" type="date">
                    </div></br>
                    <div class="col-xl-6">
                        <button class="btn btn-secondary" type="submit">Consultar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


















<?php

require_once 'controladoresEntidade/footer.php';

?>