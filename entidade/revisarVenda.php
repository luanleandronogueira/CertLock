<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

extract($_POST);
$item_v = explode('-', $item_venda);

print_r($item_v);
?>

<?php if (isset($_POST['btn_submit_pf'])) { ?>
    <!-- Validar se é PF -->
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Revise sua Venda para Pessoa Física
                    </div>
                    <div class="card-body">
                        <form action="provedoresEntidade/RegistrarVenda.php" method="post">
                            <strong>Cliente:</strong> <?= $_POST['nome_cliente_pf'] . '<strong> CPF: </strong>' . $_POST['cpf_cliente_pf'] ?></br>
                            <strong>Data da Venda:</strong> <?= $_POST['data_venda'] ?>
                            <hr>
                            <strong>Item a ser vendido:</strong> <?= $item_v[2] ?></br>
                            <strong>Preço de Venda: </strong> <?= $item_v[1] ?></br>
                            <strong>Código da Venda:</strong> <?= $_POST['codigo_venda'] ?>
                            <hr>
                            Deseja dar Algum Desconto?
                            <div class="col-3 col-xl-3 col-lg-3">
                                <input class="form-control money" name="desconto_venda" type="text">
                                <small><em>digite o valor do desconto. Ex: 20,00</em></small>
                            </div>
                            <input type="hidden" name="id_usuario_venda" value="<?= $id_usuario_cliente_pf ?>">
                            <input type="hidden" name="id_entidade_venda" value="<?= $entidade_cliente_pf ?>">
                            <input type="hidden" name="id_produto_venda" value="<?= $item_v[0] ?>">
                            <input type="hidden" name="data_venda" value="<?= $_POST['data_venda'] ?>">
                            <input type="hidden" name="codigo_venda" value="<?= $_POST['codigo_venda'] ?>">
                            <input type="hidden" name="preco_vendido_venda" value="<?= $item_v[1] ?>">
                            <input type="hidden" name="item_produto_venda" value="<?= $item_v[2] ?>">
                            <input type="hidden" name="preco_custo_venda" value="<?= $item_v[3] ?>">
                            <input type="hidden" name="tempo_validade" value="<?=$item_v[4]?>">
                            <input type="hidden" name="modalidade_validade" value="<?=$item_v[5]?>">

                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                <button class="btn btn-primary" name="btn_submit_pf" id="btn_submit_pf" type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Validar se é pj -->
<?php } else { ?>

    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Revise sua Venda
                    </div>
                    <div class="card-body">
                        <form action="provedoresEntidade/RegistrarVenda.php" method="post">
                            <strong>Responsável:</strong> <?= $_POST['responsavel_cliente_pj'] ?></br>
                            <strong>Empresa:</strong> <?= $_POST['nome_cliente_pj'] . '<strong> CNPJ: </strong>' . $_POST['cnpj_cliente_pj'] ?></br>
                            <strong>Data da Venda:</strong> <?= $_POST['data_venda'] ?>
                            <hr>
                            <strong>Item a ser vendido:</strong> <?= $item_v[2] ?></br>
                            <strong>Preço de Venda: </strong> <?= $item_v[1] ?></br>
                            <strong>Código da Venda:</strong> <?= $_POST['codigo_venda'] ?>
                            <hr>
                            Deseja dar Algum Desconto?
                            <div class="col-3 col-xl-3 col-lg-3">
                                <input class="form-control money" name="desconto_venda" type="text">
                                <small><em>digite o valor do desconto. Ex: 20,00</em></small>
                            </div>
                            <input type="hidden" name="id_usuario_venda" value="<?= $id_usuario_cliente_pj ?>">
                            <input type="hidden" name="id_entidade_venda" value="<?= $entidade_cliente_pj ?>">
                            <input type="hidden" name="id_produto_venda" value="<?= $item_v[0] ?>">
                            <input type="hidden" name="data_venda" value="<?= $_POST['data_venda'] ?>">
                            <input type="hidden" name="codigo_venda" value="<?= $_POST['codigo_venda'] ?>">
                            <input type="hidden" name="preco_vendido_venda" value="<?= $item_v[1] ?>">
                            <input type="hidden" name="item_produto_venda" value="<?= $item_v[2] ?>">
                            <input type="hidden" name="preco_custo_venda" value="<?= $item_v[3] ?>">
                            <input type="hidden" name="tempo_validade" value="<?= $item_v[4] ?>">
                            <input type="hidden" name="modalidade_validade" value="<?= $item_v[5] ?>">


                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                <button class="btn btn-primary" name="btn_submit_pj" id="btn_submit_pj" type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php } ?>




<?php require_once 'controladoresEntidade/footer.php'; ?>