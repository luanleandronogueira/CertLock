<?php
session_start();
include '../provedores/Classes.php';
verificaSessao();
include_once 'controladoresEntidade/controller.php';

// print_r($_SESSION);

$Item = new Itens;
$Itens = $Item->chamaItens($_SESSION['id_entidade_usuario_adm_pj']);
$ClientePj = new ClientesPj;
$ClientePf = new ClientesPf;

if(isset($_GET['nome'])){

    $ident = $ClientePf->BuscaClienteNomePf($_GET['nome']);

    if($ident) {

        $i = $ident['cpf_cliente_pf'];

    } else {

        $ident = $ClientePj->BuscaClienteNomePj($_GET['nome']);
        $i = $ident['cnpj_cliente_pj'];

    }

    // echo $i;
}

// echo '<pre>';
//     print_r($Itens);
// echo '</pre>';
?>
<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'registrarVendaPespectiva.php';
        }
</script>

<div class="container mt-3 mb-5">
    <div class="row">
        <?php if (isset($_GET['status']) and isset($_GET['status']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Venda <strong>registrada com sucesso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Realizar Nova Venda
                </div>
                <div class="card-body">
                    <center>
                        <h4><span id="msgCliente" class="badge text-bg-success form-section">Não encontramos esse cliente, preencha os dados e ele será cadastrado</span></h4>
                    </center>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="input-group">
                            <input type="text" value="<?=$i ?>" class="form-control" id="identificador" placeholder="Digite CPF/CNPJ:" aria-label="Input group example" aria-describedby="btnGroupAddon"></br>
                            <div class="input-group-text" id="btnGroupAddon">
                                <a onclick="buscaCliente();" id="btnLupa" href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                    </svg></a>
                            </div>
                        </div>
                        <em><small><span id='msgErro'></span></small></em>
                    </div>

                    <hr>

                    <center>Dados do Cliente</center>

                    <div id="PJ" class="form-section">
                        <form action="revisarVenda.php" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                    <label for="">Nome do Responsável</label>
                                    <input class="form-control" name="responsavel_cliente_pj" id="responsavel_cliente_pj" required type="text">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                    <label for="">Telefone do Responsável</label>
                                    <input class="form-control" name="telefone_cliente_pj" id="telefone_cliente_pj" required type="text"><br>
                                </div>

                                <hr>

                                <h6 class="card-title text-center">Dados da Empresa</h6>
                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                    <label for="">CNPJ: </label>
                                    <input class="form-control" required type="number" readonly name="cnpj_cliente_pj" id="cnpj_cliente_pj">
                                    <small><em><span id="mensagemOff"></span></em></small>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                                    <label for="">Nome da Empresa:</label>
                                    <input class="form-control" required type="text" name="nome_cliente_pj" id="nome_cliente_pj">

                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                    <label for="">Contato:</label>
                                    <input class="form-control" required type="text" name="contato_cliente_pj" id="contato_cliente_pj">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                    <label for="">Logradouro:</label>
                                    <input class="form-control" required type="text" name="logradouro_cliente_pj" id="logradouro_cliente_pj">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-1 col-xl-1">
                                    <label for="">Número:</label>
                                    <input class="form-control" required type="text" name="numero_cliente_pj" id="numero_cliente_pj">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                    <label for="">Bairro:</label>
                                    <input class="form-control" required type="text" name="bairro_cliente_pj" id="bairro_cliente_pj">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                    <label for="">Cidade:</label>
                                    <input class="form-control" required type="text" name="cidade_cliente_pj" id="cidade_cliente_pj">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                    <label for="">UF:</label>
                                    <input class="form-control" required required type="text" name="uf_cliente_pj" id="uf_cliente_pj">
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                    <label for="">CEP:</label>
                                    <input class="form-control" required type="text" name="cep_cliente_pj" id="cep_cliente_pj">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                                    <label for="">Email:</label>
                                    <input class="form-control" required type="text" name="email_cliente_pj" id="email_cliente_pj">
                                </div>
                                <input type="hidden" name="entidade_cliente_pj" id="entidade_cliente_pj">
                                <input type="hidden" name="id_usuario_cliente_pj" id="id_usuario_cliente_pj">
                                <input type="hidden" name="id_cliente_pj" id="id_cliente_pj">

                                <div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <center><span>Selecione o Item de Venda</span></center><br><br>
                                <div class="col-lg-3 col-sm-12 col-xl-3 col-md-12">
                                    <label for="">Data da Venda</label>
                                    <input class="form-control" required name="data_venda" type="date">
                                </div>
                                <div class="col-lg-3 col-sm-12 col-xl-3 col-md-12">
                                    <label for="">Código da Venda</label>
                                    <input class="form-control" name="codigo_venda" type="text">
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xl-6 col-md-12">
                                    <label for="">Item de Venda</label>
                                    <select class="form-control" name="item_venda" id="">
                                        <?php foreach ($Itens as $I) { ?>

                                            <option value="<?= $I['id_item_preco'] . ' - ' . $I['preco_venda_item_preco'] . ' - ' . $I['modelo_item_preco'] . ' - ' . $I['custo_item_preco'] . ' - ' . $I['validade_item_preco'] . ' - ' . $I['categoria_validade_item_preco'] ?>"><?= $I['modelo_item_preco'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                <button class="btn btn-primary" name="btn_submit_pj" id="btn_submit_pj" type="submit">Cadastrar</button>
                            </div>
                        </form>
                    </div>

                    <div id="PF" class="form-section mt-4">
                        <form action="revisarVenda.php" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                    <label for="">CPF:</label>
                                    <input class="form-control" required type="number" name="cpf_cliente_pf" id="cpf_cliente_pf">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-10 col-xl-10">
                                    <label for="">Nome Completo:</label>
                                    <input class="form-control" required type="text" name="nome_cliente_pf" id="nome_cliente_pf">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                    <label for="">Email:</label>
                                    <input class="form-control" required type="text" name="email_cliente_pf" id="email_cliente_pf">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                    <label for="">Contato:</label>
                                    <input class="form-control" required type="text" name="contato_cliente_pf" id="contato_cliente_pf">
                                </div>
                                <input type="hidden" name="entidade_cliente_pf" id="entidade_cliente_pf">
                                <input type="hidden" name="id_usuario_cliente_pf" id="id_usuario_cliente_pf">
                                <input type="hidden" name="id_cliente_pf" id="id_cliente_pf">
                            </div>
                            <hr>
                            <div class="row">
                                <center><span>Selecione o Item de Venda</span></center><br><br>
                                <div class="col-lg-3 col-sm-12 col-xl-3 col-md-12">
                                    <label for="">Data da Venda</label>
                                    <input class="form-control" required name="data_venda" type="date">
                                </div>
                                <div class="col-lg-3 col-sm-12 col-xl-3 col-md-12">
                                    <label for="">Código da Venda</label>
                                    <input class="form-control" name="codigo_venda" type="text">
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xl-6 col-md-12">
                                    <label for="">Item de Venda</label>
                                    <select class="form-control" name="item_venda" id="">
                                        <?php foreach ($Itens as $I) { ?>

                                            <option value="<?= $I['id_item_preco'] . ' - ' . $I['preco_venda_item_preco'] . ' - ' . $I['modelo_item_preco'] . ' - ' . $I['custo_item_preco'] . ' - ' . $I['validade_item_preco'] . ' - ' . $I['categoria_validade_item_preco'] ?>"><?= $I['modelo_item_preco'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                <button class="btn btn-primary" name="btn_submit_pf" id="btn_submit_pf" type="submit">Cadastrar</button>
                            </div>
                        </form>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>


<?php

require_once 'controladoresEntidade/footer.php';

?>