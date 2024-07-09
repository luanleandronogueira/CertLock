<?php
session_start();

include '../provedores/Classes.php';
include_once 'controladoresEntidade/controller.php';

?>

<div class="container mt-3">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Realizar Nova Venda
                </div>
                <div class="card-body">

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" id="identificador" placeholder="Digite CPF/CNPJ:" aria-label="Input group example" aria-describedby="btnGroupAddon"></br>
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
                                            <input class="form-control" required  type="text" name="contato_cliente_pf" id="contato_cliente_pf">
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


<?php

require_once 'controladoresEntidade/footer.php';

?>