<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

$Vendas = new Vendas;
$Venda_Usuario = $Vendas->chamaVendaPorId($_SESSION['id_usuario_adm_pj'], $_SESSION['id_entidade_usuario_adm_pj']);

echo '<pre>';
print_r($Venda_Usuario);
echo '</pre>';

?>


<div class="container mt-3">
    <div class="row">
        <div class="col-12 mt-3">
            <h5>Histórico do Cliente: ###</h5>
            <hr>
            <div class="card">
                <div class="card-header">Histórico do Cliente</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos debitis aliquam odio iste, error dolorem possimus accusantium recusandae veritatis aut tenetur. Excepturi facilis itaque esse repellat vel debitis minima animi.
                    <hr>
                    <strong><span>Vendas Realizadas a esse cliente:</span></strong>
                </div>
            </div>
        </div>
    </div>
</div>










<?php require_once 'controladoresEntidade/footer.php'; ?>