<?php 

include 'provedores/Classes.php';
include 'controladores/controller.php';

$Entidades = new Entidades;
$Entidades_pf = new Entidades_pf;

$Entidade = $Entidades->chamaEntidade();
$Entidade_pf = $Entidades_pf->chamaEntidadePf();

// echo '<pre>';
//     print_r($_SESSION);
// echo '</pre>';

?>

<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'analisaEntidade.php';
        }
</script>

<div class="container mt-3">
    <div class="row">

        <h6 class="display-6">Analisar Entidades</h6></br>

        <div class="col-md-12 col-sm-12 col-12 col-xl-12 mt-4">

        <?php if (isset($_GET['status']) AND isset($_GET['status']) == 'atualizado') { ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
                Entidade <strong> <?= $_GET['nomeEntidade'] ?></strong> atualizado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php } ?>

        
            <div class="card">
                <div class="card-header">
                    <em>Empresas com CNPJ</em>
                </div>
                <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Status</th>
                                <th>Ver Dados Completos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($Entidade as $E) {?>
                            <tr>
                                <td><?=$E['id_entidade']?></td>
                                <td><?=$E['nome_empresa_entidade']?></td>
                                <td><?=$E['cnpj_entidade']?></td>
                                <td><?=$E['status_entidade']?></td>
                                <!-- Editar dados da entidade -->
                                <td>
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge text-bg-secondary" data-bs-toggle="modal" data-bs-target="#<?=$E['id_entidade']?>exampleModal">
                                        Detalhar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?=$E['id_entidade']?>exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$E['nome_empresa_entidade']?> - <?=$E['cnpj_entidade']?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="provedores/EditarEntidade.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                                    <label for="">CNPJ: </label>
                                                    <input class="form-control" required type="number" value="<?=$E['cnpj_entidade']?>" readonly onblur="verificarCampoCNPJ()" name="cnpj_entidade" id="cnpj_entidade">
                                                    <small><em><span id="mensagemOff"></span></em></small>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                                                    <label for="">Nome da Empresa:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['nome_empresa_entidade']?>" name="nome_empresa_entidade" id="nome_empresa_entidade">
                                                </div>

                                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                                    <label for="">Contato:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['contato_entidade']?>" name="contato_entidade" id="contato_entidade">
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                                    <label for="">Logradouro:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['logradouro_entidade']?>" name="logradouro_entidade" id="logradouro_entidade">
                                                </div>

                                                <div class="col-md-6 col-sm-12 col-lg-1 col-xl-1">
                                                    <label for="">Número:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['numero_entidade']?>" name="numero_entidade" id="numero_entidade">
                                                </div>

                                                <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                                    <label for="">Bairro:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['bairro_entidade']?>" name="bairro_entidade" id="bairro_entidade">
                                                </div>

                                                <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                                    <label for="">Cidade:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['cidade_entidade']?>" name="cidade_entidade" id="cidade_entidade">
                                                </div>

                                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                                    <label for="">UF:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['uf_entidade']?>" name="uf_entidade" id="uf_entidade">
                                                </div>

                                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                                    <label for="">CEP:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['cep_entidade']?>" name="cep_entidade" id="cep_entidade">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                                                    <label for="">Email:</label>
                                                    <input class="form-control"  type="text" value="<?=$E['email_entidade']?>" name="email_entidade" id="email_entidade">
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                                    <label for="">Status:</label>
                                                    <select class="form-control" name="status_entidade" id="">
                                                        <option value="A">Ativo</option>
                                                        <option value="I">Inativar</option>
                                                    </select>
                                                </div>
                                                
                                            </div>    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" name="btn_editar_pj" class="btn btn-primary">Atualizar</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>

                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <em>Usuários PF</em>
                </div>
                <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Usuário</th>
                                    <th>CPF</th>
                                    <th>Status</th>
                                    <th>Ver Dados Completos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Entidade_pf as $Epf) {?>
                                <tr>
                                    <td><?=$Epf['id_entidade_pf']?></td>
                                    <td><?=$Epf['nome_entidade_pf']?></td>
                                    <td><?=$Epf['cpf_entidade_pf']?></td>
                                    <td><?=$Epf['status_entidade_pf']?></td>
                                    <td>
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge text-bg-secondary" data-bs-toggle="modal" data-bs-target="#<?=$Epf['id_entidade_pf']?>exampleModal">
                                        Detalhar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?=$Epf['id_entidade_pf']?>exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$Epf['nome_entidade_pf']?> - <?=$Epf['cpf_entidade_pf']?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="provedores/EditarEntidade.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                                    <label for="">CPF:</label>
                                                    <input class="form-control" readonly value="<?=$Epf['cpf_entidade_pf']?>" type="number" name="cpf_entidade_pf" id="cpf_entidade_pf">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-10 col-xl-10">
                                                    <label for="">Nome Completo:</label>
                                                    <input class="form-control" value="<?=$Epf['nome_entidade_pf']?>" type="text" name="nome_entidade_pf" id="nome_entidade_pf">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                                    <label for="">Email:</label>
                                                    <input class="form-control" value="<?=$Epf['email_entidade_pf']?>" type="text" name="email_entidade_pf" id="email_entidade_pf">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                                    <label for="">Contato:</label>
                                                    <input class="form-control" value="<?=$Epf['contato_entidade_pf'] ?>" type="number" name="contato_entidade_pf" id="contato_entidade_pf">
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                                    <label for="">Status:</label>
                                                    <select class="form-control" name="status_entidade" id="">
                                                        <option value="A">Ativo</option>
                                                        <option value="I">Inativar</option>
                                                    </select>
                                                </div>
                                                
                                            </div>    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" name="btn_editar_pf" class="btn btn-primary">Atualizar</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>

                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

        
<?php include 'controladores/footer.php' ?>