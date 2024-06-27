<?php 
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$entidade = new Entidades;

$Entidade = $entidade->chamaEntidadeId($_SESSION['id_entidade_usuario_adm_pj']);

?>

<div class="mb-3">
    <div class="container" >
        <div class="row">
            <div class="mt-4" >
                <h5><?=$_SESSION['nome_usuario_adm_pj'] ?></h5>
                <span>Empresa: <?=$Entidade['nome_empresa_entidade'] ?></span></br>
                <span>CNPJ: <?=$Entidade['cnpj_entidade']?></span></br>
            </div>
            <hr class="mt-2">
        </div>
    </div>
</div>



<div class="container">
    <div class="row">

    <h4 >Ações Rápidas</h4>
    
    <div class="col-xl-3 col-lg-3 mt-3">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title">Cadastrar um Novo Cliente</h6>
          </div>
          <div class="card-body">
            <p class="card-text">Cadastre um novo cliente e aumente suas vendas.</p>
            <a href="cadastrarCliente.php" class="btn btn-primary">+ Cadastrar</a>
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3 mt-3">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title">Registrar Venda</h6>
          </div>
          <div class="card-body">
            <p class="card-text">Aqui você pode registrar as suas novas vendas.</p>
            <!-- <a href="#" class="btn btn-primary">+ Registrar Venda</a> -->
          </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3 mt-3">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title">Controle de Financeiro</h6>
          </div>
          <div class="card-body">
            <p class="card-text">Acompanhe todos as suas receitas e despesas</p>
            <!-- <a href="#" class="btn btn-primary">+ Acompanhar </a> -->
          </div>
        </div>
    </div>

    <!-- <div class="col-xl-3 col-lg-3 mt-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    </div> -->

    </div>
</div>







<?php 

require_once 'controladoresEntidade/footer.php';

?>