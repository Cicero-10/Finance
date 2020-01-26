<?php 
    session_start();
    $id_usuario = $_SESSION["id"];
    echo $id_usuario;
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Finance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css/form-style.css">

</head>

<body>
    <!-- MultiStep Form -->
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 class="px-3"><strong>Sua conta está ativa</strong></h2>
                    <p class="px-3">Agora, precisamos adicionar algumas informações.</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="post" action="../controller/EtapasController.php" enctype="multipart/form-data">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><span data-feather="sun" class="account"></span><strong>Boas Vindas</strong></li>
                                    <li id="personal"><span data-feather="trending-up" class="personal"></span><strong>Receitas</strong></li>
                                    <li id="payment"><span data-feather="trending-down" class="payment"></span><strong>Despesas</strong></li>
                                    <li id="confirm"><span data-feather="check" class="confirm"></span><strong>Concluir</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset class="py-3">
                                    <div class="form-card py-5 mb-5">
                                        <h6 class="text-dark">Estamos felizes em ter você aqui conosco. Desenvolvemos uma plataforma onde você possa ter uma gerenciamento completo da sua vida financeira. Podemos prosseguir?</h6>
                                    </div>
                                    <span class="next btn btn-custom">Sim, vamos lá</span>
                                </fieldset>
                                <fieldset class="px-lg-5">
                                    <div class="form-card py-5 mb-4">
                                        <h2 class="fs-title">Receitas</h2>
                                        <div class="row py-5">
                                            <div class="col-lg-6">
                                                <label>Insira o valor</label>
                                                <input type="text" class="form-control input" name="valor_rec" placeholder="R$0,00">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Data</label>
                                                <input type="date" class="form-control input" name="data_rec" value='<?php echo date("Y-m-d"); ?>'>
                                            </div>
                                        </div>
                                        <!-- fim row -->
                                        <div class="row mt-3">
                                            <div class="col-lg-8 ">
                                                <input type="text" class="form-control input" placeholder="Nome da receita" name="nome_rec">
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="status_rec" value="Recebido">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Já recebeu?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fim row -->
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <label>Categoia</label>

                                                <select class="form-control " name="tipo_rec">
                                                    <option value="Salario">Salário</option>
                                                    <option value="Outros">Outros</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Anexar documento</label>
                                                <br>
                                                <span data-feather="paperclip" class="doc-file"></span>
                                                <input type="file" class="form-control custom-file" name="doc_rec">
                                            </div>

                                        </div>
                                        <!-- fim row -->
                                    </div>
                                    <span class="previous btn btn-outline-secondary">Voltar</span>
                                    <span class="next btn btn-custom">Próximo</span>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card py-5 mb-4">
                                        <h2 class="fs-title">Despesas</h2>
                                        <div class="row py-5">
                                            <div class="col-lg-6">
                                                <label>Insira o valor</label>
                                                <input type="text" class="form-control input" name="valor_desp" placeholder="R$0,00">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Data de vencimento</label>
                                                <input type="date" class="form-control input" name="vencimento_desp" value='<?php echo date("Y-m-d"); ?>'>
                                            </div>
                                        </div>
                                        <!-- fim row -->
                                        <div class="row mt-3">
                                            <div class="col-lg-8 ">
                                                <input type="text" class="form-control input" placeholder="Nome da despesa" name="nome_desp">
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="status_desp" value="Pago">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Já pagou?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fim row -->
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <label>Categoia</label>
                                                <select class="form-control" name="categoria_desp">
                                                    <option value="Casa">Casa</option>
                                                    <option value="Carro">Carro</option>
                                                    <option value="Agua">Água</option>
                                                    <option value="Energia">Energia</option>
                                                    <option value="Internet">Internet</option>
                                                    <option value="Cartao C.">Cartão de crádito</option>
                                                    <option value="Alimentacao">Alimentação</option>
                                                    <option value="Lazer">Lazer</option>
                                                    <option value="Educacao">Educação</option>
                                                    <option value="Roupa">Roupa</option>
                                                    <option value="Saude">Saude</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Anexar documento</label>
                                                <br>
                                                <span data-feather="paperclip" id="image"></span>
                                                <input type="file" class="form-control" name="doc_desp" id="myfile" style="display: none;">
                                            </div>

                                        </div>
                                        <!-- fim row -->
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="tipo_desp" value="Despesa Fixa">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Despesa Fixa
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="check" name="fin_desp">
                                                    <label class="form-check-label" for="gridCheck">
                                                       Despesa Financiada
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row col-lg-12" id="opcao">
                                                <div class="col-lg-6 mt-3" >
                                                    <label>N. de parcelas</label>
                                                    <input type="text" class="form-control input" name="qtd_parc_desp">
                                                </div>
                                                <div class="col-lg-6 mt-3" id="opcao">
                                                    <label>N. de parcelas pagas</label>
                                                    <input type="text" class="form-control input" name="qtd_parc_pg_desp">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fim row -->
                                    </div>
                                    <span class="previous btn btn-outline-secondary">Voltar</span>
                                    <span class="next btn btn-custom">Próximo</span>
                                </fieldset>
                                <fieldset class="px-lg-5 py-lg-5">
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Sucesso!</h2>
                                        <br>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="../vendor/img/checks.png" class="fit-image"> </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="text-center">
                                                <h5>Seus dados foram salvos</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="next btn btn-custom mt-5">Continuar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.MultiStep Form -->
    <!-- Bootstrap core JavaScript
         ================================================== -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/js/bootstrap.min.js"></script>
    <script src="../vendor/js/form.js"></script>


    <!-- Ícones -->
    <script src="https://use.fontawesome.com/354501cf3b.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    <script type="text/javascript">
        $('.doc-file').click(function(){
            $('.custom-file').click()
        });
         $('#image').click(function(){
            $('#myfile').click()
        })

        $("#check").click(function(){
    
        if($(this).val()=="true"){
            $("#opcao").css("visibility","hidden");
            $(this).val("false");
            }
            else{
                $("#opcao").css("visibility","visible");
                $(this).val("true");
            }
        });
    </script>

</body>

</html>