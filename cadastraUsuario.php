<?php 

include 'controladores/controller.php';
include 'provedores/Classes.php';

$Entidades = new Entidades;

$Entidade = $Entidades->chamaEntidadeAtivas();

//print_r($Entidade);

?>

<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'cadastraUsuario.php';
        }
</script>


<div class="container mt-3">
    <div class="row">

        <!-- Card -->
        <div class="col-md-12 col-sm-12 col-12 col-xl-12">

        <?php if (isset($_GET['status']) AND isset($_GET['status']) == 'sucesso') { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 Entidade <strong> <?= $_GET['nomeEntidade'] ?></strong> cadastrada com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php } ?>

        <?php if (isset($_GET['condicao']) AND isset($_GET['condicao']) == 'falhou') { ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Entidade <strong> <?= $_GET['nomeEntidade'] ?></strong> já foi cadastrada anteriormente!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php } ?>

            <div class="card">
                <div class="card-header">
                    Cadastrar um Usuário
                </div>
                <div class="card-body">
                    
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="RadioPf">
                        <label class="form-check-label" for="RadioPf1">Pessoa Física (PF)</label> |

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="RadioPj" >
                        <label class="form-check-label" for="RadioPj1">Pessoa Jurídica (PJ)</label>
                        <hr>

                        <h6 class="card-title text-center">Dados do Usuário Administrador</h6>

                        <div id="PJ" class="form-section" >
                            <form action="provedores/CadastraUsuario.php" method="post">
                                    <div class="row">

                                        <div class="col-md-6 col-sm-12 col-lg-12 col-xl-12">
                                            <label for="">Nome da Empresa:</label>
                                            <select class="form-control" required type="text" name="nome_empresa_entidade" id="nome_empresa_entidade">
                                            
                                                <?php foreach($Entidade as $E) { ?>
                                                    <option value="<?=$E['id_entidade'] ?>"><?=$E['nome_empresa_entidade'] ?> - <?=$E['cnpj_entidade'] ?></option>
                                                <?php } ?>

                                            </select>
                                            
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                            <label for="">CPF:</label>
                                            <input class="form-control" required type="text"  name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-9 col-xl-9">
                                            <label for="">E-mail:</label>
                                            <input class="form-control" required type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-12 col-xl-12">
                                            <label for="">Nome Completo:</label>
                                            <input class="form-control" required type="text" name="" id="">
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
                            <form action="provedores/CadastraEntidade.php" method="post">
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                        <label for="">CPF:</label>
                                        <input class="form-control" required type="number" name="cpf_entidade_pf" id="cpf_entidade_pf">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-10 col-xl-10">
                                        <label for="">Nome Completo:</label>
                                        <input class="form-control" required type="text" name="nome_entidade_pf" id="nome_entidade_pf">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                        <label for="">Email:</label>
                                        <input class="form-control" required type="text" name="email_entidade_pf" id="email_entidade_pf">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                        <label for="">Contato:</label>
                                        <input class="form-control" required  type="number" name="contato_entidade_pf" id="contato_entidade_pf">
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
</div>











<?php include 'controladores/footer.php' ?>