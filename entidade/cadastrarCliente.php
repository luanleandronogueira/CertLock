<?php 
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$entidade = new Entidades;

$Entidade = $entidade->chamaEntidadeId($_SESSION['id_entidade_usuario_adm_pj'])

?>
<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'cadastrarCliente.php';
        }
</script>

    <main class="mt-4">

        <div class="container">
            <div class="row">
            <?php if (isset($_GET['status']) AND isset($_GET['status']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
               Cliente <strong>cadastrado com sucesso!</strong> <a href="registrarVenda.php">REGISTRAR NOVA UMA VENDA</a> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php } ?>

            <?php if (isset($_GET['disponibilidade']) AND isset($_GET['disponibilidade']) == 'Existente') { ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Cliente <strong>já Cadastrado Anteriormente!</strong> <a href="">REGISTRAR NOVA UMA VENDA</a> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php } ?>
                <div class="card">
                    <div class="card-header">
                        Cadastrar novo Cliente
                    </div>
                    <div class="card-body">
        
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="RadioPf">
                            <label class="form-check-label" for="RadioPf">Pessoa Física (PF)</label> |
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="RadioPj" >
                            <label class="form-check-label" for="RadioPj">Pessoa Jurídica (PJ)</label>
                            <hr>
                            <h6 class="card-title text-center">Dados da Responsável</h6>
                            <div id="PJ" class="form-section" >
                                <form action="provedoresEntidade/CadastrarCliente.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                                <label for="">Nome do Responsável</label>                                            
                                                <input class="form-control" name="responsavel_cliente_pj" required type="text">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                                <label for="">Telefone do Responsável</label>                                            
                                                <input class="form-control" name="telefone_cliente_pj" required type="text"><br>
                                            </div>

                                            <hr>

                                            <h6 class="card-title text-center">Dados da Empresa</h6>
                                            <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                                <label for="">CNPJ: </label>
                                                <input class="form-control" required type="number" onblur="verificarCampoCNPJ()" name="cnpj_cliente_pj" id="cnpj_entidade">
                                                <small><em><span id="mensagemOff"></span></em></small>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                                                <label for="">Nome da Empresa:</label>
                                                <input class="form-control" required type="text" name="nome_cliente_pj" id="nome_empresa_entidade">
        
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                                <label for="">Contato:</label>
                                                <input class="form-control" required type="text"  name="contato_cliente_pj" id="contato_entidade">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                                <label for="">Logradouro:</label>
                                                <input class="form-control" required type="text" name="logradouro_cliente_pj" id="logradouro_entidade">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-1 col-xl-1">
                                                <label for="">Número:</label>
                                                <input class="form-control" required type="text" name="numero_cliente_pj" id="numero_entidade">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                                <label for="">Bairro:</label>
                                                <input class="form-control" required type="text" name="bairro_cliente_pj" id="bairro_entidade">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                                <label for="">Cidade:</label>
                                                <input class="form-control" required type="text" name="cidade_cliente_pj" id="cidade_entidade">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                                <label for="">UF:</label>
                                                <input class="form-control" required required type="text" name="uf_cliente_pj" id="uf_entidade">
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                                <label for="">CEP:</label>
                                                <input class="form-control" required type="text" name="cep_cliente_pj" id="cep_entidade">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                                                <label for="">Email:</label>
                                                <input class="form-control" required type="text" name="email_cliente_pj" id="email_entidade">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                                <button class="btn btn-primary" name="btn_submit_pj"  id="btn_submit_pj" type="submit">Cadastrar</button>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
        
                            <div id="PF" class="form-section mt-4">
                                <form action="provedoresEntidade/CadastrarCliente.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                            <label for="">CPF:</label>
                                            <input class="form-control" required type="number" name="cpf_cliente_pf" id="cpf_entidade_pf">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-10 col-xl-10">
                                            <label for="">Nome Completo:</label>
                                            <input class="form-control" required type="text" name="nome_cliente_pf" id="nome_entidade_pf">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                            <label for="">Email:</label>
                                            <input class="form-control" required type="text" name="email_cliente_pf" id="email_entidade_pf">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                            <label for="">Contato:</label>
                                            <input class="form-control" required  type="number" name="contato_cliente_pf" id="contato_entidade_pf">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                                            <button class="btn btn-primary" name="btn_submit_pf" id="btn_submit_pf" type="submit">Cadastrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
        
                    </div>
                </div>
        </div>
        </div>
    </main>

<?php 

require_once 'controladoresEntidade/footer.php';

?>