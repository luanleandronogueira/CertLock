<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$ReceitasDespesas = new ReceitasDespesas;

$Receitas = $ReceitasDespesas->chamaReceitaDespesa('R', $_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);
$Despesas = $ReceitasDespesas->chamaReceitaDespesa('D', $_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);

$DespesasSomadas = $Despesas[0]['total_valor_receita_despesa'];
$ReceitasSomadas = $Receitas[0]['total_valor_receita_despesa'];

$SomaValores = $DespesasSomadas + $ReceitasSomadas;
$Lucratividade = $ReceitasSomadas - $DespesasSomadas;

// Formata os valores APENAS para exibição
$DespesasSomadasFormatado = number_format($DespesasSomadas, 2, ',', '.');
$ReceitasSomadasFormatado = number_format($ReceitasSomadas, 2, ',', '.');
$LucratividadeFormatado = number_format($Lucratividade, 2, ',', '.');
$SomaValoresFormatado = number_format($SomaValores, 2, ',', '.');
// echo '<pre>';
// print_r($Receitas);
// echo '</pre>';

// echo '<pre>';
// print_r($Despesas);
// echo '</pre>';

// echo '<pre>';
//  print_r($_SESSION);
// echo '</pre>';
?>

<div class="container mt-3">
    <div class="row">
        <?php if (isset($_GET['status']) and isset($_GET['status']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                O <strong>registro</strong> foi efetuado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>
        <div class="col-md-12 col-sm-12 col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    Cadastrar Despesas
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-6 mt-3">
                            <form action="provedoresEntidade/CadastraReceitaDespesa.php" method="post">
                                <label for="">Receita:</label>
                                <input type="hidden" value="<?= $_SESSION['id_usuario_adm_pj'] ?>" name="id_usuario_receita_despesa">
                                <input type="hidden" value="<?= $_SESSION['id_entidade_usuario_adm_pj'] ?>" name="id_entidade_receita_despesa">
                                <input class="form-control" required name="titulo_receita_despesa" type="text"></br>
                                <label for="">Valor:</label>
                                <input class="form-control money" required name="valor_receita_despesa" type="text"></br>
                                <input class="form-control" required name="data_receita_despesa" type="date"></br>
                                <input type="hidden" value="R" required name="categoria_receita_despesa">
                                <button class="btn btn-success" type="submit">Registrar</button>
                            </form>
                        </div>

                        <div class="col-xl-6 mt-3">
                            <form action="provedoresEntidade/CadastraReceitaDespesa.php" method="post">
                                <label for="">Despesas:</label>
                                <input type="hidden" value="<?= $_SESSION['id_usuario_adm_pj'] ?>" name="id_usuario_receita_despesa">
                                <input type="hidden" value="<?= $_SESSION['id_entidade_usuario_adm_pj'] ?>" name="id_entidade_receita_despesa">
                                <input class="form-control" required name="titulo_receita_despesa" type="text"></br>
                                <label for="">Valor:</label>
                                <input class="form-control money" required name="valor_receita_despesa" type="text"></br>
                                <input class="form-control" required name="data_receita_despesa" type="date"></br>
                                <input type="hidden" value="D" required name="categoria_receita_despesa">
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
                        <span><?= $Receita['titulo_receita_despesa'] ?> = <strong><?= $Receita['valor_receita_despesa'] ?></strong></span></br>
                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                    <span>Total: <?= number_format($Receitas[0]['total_valor_receita_despesa'], 2, ',', '.') ?></span>
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
                        <span><?= $Despesa['titulo_receita_despesa'] ?> = <strong><?= $Despesa['valor_receita_despesa'] ?></strong></span></br>
                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                    <span>Total: <?= number_format($Despesas[0]['total_valor_receita_despesa'], 2, ',', '.')?></span>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-4 col-xl-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Movimentação Total Mês Atual:
                </div>
                <div class="card-body">
                    <span><strong>Receitas: </strong> <?= $ReceitasSomadasFormatado ?></span></br>
                    <span><strong>Despesas: </strong> <?= $DespesasSomadasFormatado ?></span></br></br>

                    <span><strong>Total Movimentado: </strong> <?= $SomaValoresFormatado ?></span></br>
                    <span><strong>Lucro/Prejuízo: </strong> <?= $LucratividadeFormatado ?></span></br>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'controladoresEntidade/footer.php'; ?>