<?php
session_start();
include '../provedores/Classes.php';
verificaSessao();
include_once 'controladoresEntidade/controller.php';

$Clientes_pj = new ClientesPj;
$Clientes_pf = new ClientesPf;

$PF = $Clientes_pf->ChamaCliente($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);
$PJ = $Clientes_pj->ChamaCliente($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);


// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// echo '<pre>';
// print_r($PJ);
// echo '</pre>';

?>
<div class="container mt-4">
    <div class="row">
        <center class="mb-3">
            <h5>Ver meus Clientes</h5>
            <hr>
        </center>
        <div>
            <div class="card">
                <div class="card-header">
                    <em>Clientes Pessoa Jurídica</em>
                </div>
                <div class="card-body">
                <table class="table table-striped sua-tabela" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome:</th>
                                <th>CNPJ:</th>
                                <th>Contato:</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($PJ as $clientePJ) { ?>
                                <td><?=$clientePJ['id_cliente_pj']?></td>
                                <td><?=$clientePJ['nome_cliente_pj']?></td>
                                <td><?=$clientePJ['cnpj_cliente_pj']?></td>
                                <td><?=$clientePJ['contato_cliente_pj']?></td>
                                <td><a href="clienteCnpj.php?cnpj=<?=$clientePJ['cnpj_cliente_pj']?>">Detalhar</a></td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <em>Clientes Pessoa Física</em>
                </div>
                <div class="card-body">
                    <table class="table table-striped sua-tabela" id="myTable1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome:</th>
                                <th>CPF:</th>
                                <th>Contato:</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($PF as $clientePF) { ?>
                                <td><?=$clientePF['id_cliente_pf']?></td>
                                <td><?=$clientePF['nome_cliente_pf']?></td>
                                <td><?=$clientePF['cpf_cliente_pf']?></td>
                                <td><?=$clientePF['contato_cliente_pf']?></td>
                                <td><a href="clienteCpf.php?cpf=<?=$clientePF['cpf_cliente_pf']?>">Detalhar</a></td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'controladoresEntidade/footer.php'; ?>