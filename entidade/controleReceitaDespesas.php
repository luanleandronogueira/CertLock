<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$ReceitasDespesas = new ReceitasDespesas;

$Receitas = $ReceitasDespesas->chamaReceitaDespesa('R', $_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);
$Despesas = $ReceitasDespesas->chamaReceitaDespesa('D', $_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);

echo '<pre>';
print_r($Receitas);
echo '</pre>';

echo '<pre>';
print_r($Despesas);
echo '</pre>';

// echo '<pre>';
//  print_r($_SESSION);
// echo '</pre>';
?>

<div class="container mt-3">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    Cadastrar Despesas
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-6 mt-3">
                            <form action="" method="post">
                                <label for="">Receita:</label>
                                <input class="form-control" type="text"></br>
                                <input class="form-control" type="number"></br>
                                <input class="form-control" type="date"></br>
                                <input type="hidden" value="R" name="">
                                <button class="btn btn-success" type="submit">Registrar</button>
                            </form>
                        </div>

                        <div class="col-xl-6 mt-3">
                            <form action="" method="post">
                                <label for="">Despesas:</label>
                                <input class="form-control" type="text"></br>
                                <input class="form-control" type="number"></br>
                                <input class="form-control" type="date"></br>
                                <input type="hidden" value="D" name="">
                                <button class="btn btn-warning" type="submit">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-4 col-xl-4 mt-4 mb-5">
            <div class="card">
                <div class="card-header">
                    Receita
                </div>
                <div class="card-body">
                    <?php foreach ($Receitas as $Receita) { ?>
                        <span><?= $Receita['titulo_receita_despesa'] ?> = <strong><?=$Receita['valor_receita_despesa'] ?></strong></span></br>
                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                    <span>Total: <?= $Receitas[0]['total_valor_receita_despesa'] ?></span>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-4 col-xl-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Despesas
                </div>
                <div class="card-body">
                    <?php foreach ($Despesas as $Despesa) { ?>
                        <span><?= $Despesa['titulo_receita_despesa'] ?> = <strong><?=$Despesa['valor_receita_despesa'] ?></strong></span></br>
                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                    <span>Total: <?= $Despesas[0]['total_valor_receita_despesa'] ?></span>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-4 col-xl-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Movimentação Total Mês Atual:
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>





















<?php require_once 'controladoresEntidade/footer.php'; ?>