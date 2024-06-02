<?php 

include 'controladores/controller.php';

?>


<div class="container mt-3">
    <div class="row">

        <!-- Card -->
        <div class="col-md-12 col-sm-12 col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    Cadastrar nova entidade
                </div>
                <div class="card-body">
                    
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="RadioPf">
                        <label class="form-check-label" for="RadioPf">Pessoa Física (PF)</label> |

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="RadioPj" >
                        <label class="form-check-label" for="RadioPj">Pessoa Jurídica (PJ)</label>
                        <hr>

                        <h6 class="card-title text-center">Dados da Entidade</h6>

                        <div id="PJ" class="form-section" >
                            <form action="" method="post">
                                    <div class="row">

                                        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                            <label for="">CNPJ: </label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                            <label for="">Nome da Empresa:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
                                            <label for="">Logradouro:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-1 col-xl-1">
                                            <label for="">Número:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-3 col-xl-3">
                                            <label for="">Bairro:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                                            <label for="">Cidade:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                            <label for="">UF:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-lg-2 col-xl-2">
                                            <label for="">CEP:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                                            <label for="">Email:</label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div>

                                        </div>

                                    </div>
                                </form>
                        </div>
                            

                        <div id="PF" class="form-section mt-4">
                            <form action="" method="post">

                                <span class="bg-danger">CRIAR FORM PARA PF</span>

                            </form>
                        </div>
                        


                </div>
            </div>
        </div>
        

    </div>
</div>


















<?php include 'controladores/footer.php' ?>