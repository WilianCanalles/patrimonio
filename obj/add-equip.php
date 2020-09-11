<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PATRIMONIX</title>
    <link rel="icon" href="../img/Phoenix-Patrimonial.png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Bootstrap core JavaScript -->

    <script type="text/javascript" src="../js/jquery-3.5.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/jquery.mask.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">


</head>

<body>
    <?php include 'alert.php'; ?>
    <section>
        <form method="post" action="../conn-db/conn_gravar_db.php" name="form12" class="">
            <div class="container">
                <div class="row" style="justify-content: center">
                    <div class="col-md-8 ">
                        <!-- Mensagem de erro -->
                        <?php
                        if (isset($_SESSION['err_falta_itens'])) :
                        ?>
                            <div class="bg-warning" style="text-align: center; margin-top: 10px; padding:15px 0px">
                                <span style="font-weight: bold">Warning: Cadastre itens antes de cadastrar equipamento.</span>
                            </div>
                        <?php
                        endif;
                        unset($_SESSION['err_falta_itens']);
                        ?>
                        <!-- Fim Mensagem erro -->
                        <!--ocultar linha-->

                        <div class="form-group">
                            <?php include '../conn-db/conn_db.php'; ?>
                            <!-- Label -->
                            <label for="inputEmail">Equipamento</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="equipamento" class="form-control" id="equipamento">
                                <?php if ($result_tb_tipo_equipamento == NULL) { ?>
                                    <option>----</option>
                                <?php } else { ?>
                                    <?php foreach ($result_tb_tipo_equipamento as $line) { ?>
                                        <option value="<?php echo $line[1] ?>"><?php echo $line[2] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <!-- Fim Select-->
                            <!-- Label -->
                            <label for="inputEmail">Modelo</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="modelo" class="form-control" id="modelo">
                                <?php if (!$result_tb_modelo_equipamento) { ?>
                                    <option>----</option>
                                <?php } else { ?>
                                    <?php foreach ($result_tb_modelo_equipamento as $line) { ?>
                                        <option value="<?php echo $line[1] ?>"><?php echo $line[2] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <!-- Fim Select-->
                            <!-- Label -->
                            <label for="inputEmail">Fabricante</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="fabricante" class="form-control" id="fabricante">
                                <?php if (!$result_tb_fabricante) { ?>
                                    <option>----</option>
                                <?php } else { ?>
                                    <?php foreach ($result_tb_fabricante as $line) { ?>
                                        <option value="<?php echo $line[1] ?>"><?php echo $line[2] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <!-- Fim Select-->
                            <!-- Label -->
                            <label for="inputEmail">N° de Série</label>
                            <!-- Fim Label -->
                            <!-- Input -->
                            <input name="serie" class="form-control" name="serie" type="text" id="inputSerie" placeholder="Série do Produto" required>
                            <!-- Fim Input -->
                            <!-- Label -->
                            <label for="inputEmail">Empresa</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="empresa" class="form-control" id="empresa">
                                <?php if (!$result_tb_subEmp) { ?>
                                    <option>----</option>
                                <?php } else { ?>
                                    <?php foreach ($result_tb_subEmp as $line) { ?>
                                        <option value="<?php echo $line[1] ?>"><?php echo $line[2] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <!-- Fim Select-->
                            <!-- Label -->
                            <label for="inputEmail">Local / Setor</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="local" class="form-control" id="local">
                                <?php if ($result_tb_local == NULL) { ?>
                                    <option>----</option>
                                <?php } else { ?>
                                    <?php foreach ($result_tb_local as $line) { ?>
                                        <option value="<?php echo $line[1] ?>"><?php echo $line[2] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <!-- Fim Select-->
                            <!-- Label -->
                            <label for="inputEmail">Fornecedor</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="fornecedor" class="form-control" id="fornecedor">
                                <?php if ($result_tb_fornecedor == NULL) { ?>
                                    <option>----</option>
                                <?php } else { ?>
                                    <?php foreach ($result_tb_fornecedor as $line) { ?>
                                        <option value="<?php echo $line[1] ?>"><?php echo $line[2] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <!-- Fim Select-->
                            <!-- Label -->
                            <label for="inputEmail">Nota Fiscal</label>
                            <!-- Fim Label -->
                            <!-- Input -->
                            <input class="form-control" name="notafiscal" type="text" id="inputNFe" placeholder="Nota da Compra">
                            <!-- Fim Input -->
                            <!-- Label -->
                            <label for="inputEmail">Data da Compra</label>
                            <!-- Fim Label -->
                            <!-- Input -->
                            <input class="form-control" name="data" type="text" id="inputData" inputmode="numeric" placeholder="<?php echo date("d/m/Y") ?>">
                            <!-- Fim Input -->
                            <!-- Msg Erro -->


                            <!-- Mensagem de Master Unico -->

                            <div id="msg_data" class="animated bg-danger" style="color:honeydew; text-align: center;display: none; margin: 10px 0px; padding:15px 0px">
                                <span style="font-weight: bold"></span>
                            </div>

                            <!-- Fim Mensagem de Master Unico -->


                            <!-- Fim Msg Erro -->
                            <!-- Label -->
                            <label for="inputEmail">Situação</label>
                            <!-- Fim label-->
                            <!-- Select-->
                            <select name="situacao" class="form-control" id="situacao">
                                <option value="Operacional">Operacional</option>
                                <option value="Sem_Uso">Sem Uso</option>
                                <option value="Sucateado">Sucateado</option>
                            </select>
                            <!-- Fim Select-->
                            <!-- Mensagem -->
                            <label for="informacoes">Informação</label>
                            <textarea class="form-control" id="msg_informacoes" name="info" rows="3"></textarea>
                            <!-- Fim Mensagem -->
                            <!-- Input -->
                            <input type="hidden" name="tabela" value="cadastrar">
                            <!-- Fim Input -->
                        </div>
                        <!-- Botao -->
                        <input class="btn " onclick="return validar()" type="submit" value="Cadastrar" style="margin: 10px 0px"></input>
                        <!-- Fim Botao -->
                    </div>


                </div>

            </div>

        </form>

    </section>

</body>
<script>
    $(document).ready(function() {
        $("#inputData").mask("00/00/0000");
    })

    display = document.getElementById("msg_data").style.display;

    function validar() {

        var nome = form12.data.value;
        var n = nome.length;
        var today = new Date();
        var date = String(today.getDate()).padStart(2, '0') + '/' + String(today.getMonth() + 1).padStart(2, '0') + '/' + today.getFullYear(); //Retorna data do servidor

        if (n == 0) { //valida se o campo data esta vazio caso esteja o campo é preenchido com a data atual do servidor

            document.getElementById('inputData').value = date;
            return true;
        }
        if (n > 0 && n <= 8) { //valida se o campo data esta preenchido conforme a mascara 00/00/0000
            document.getElementById("msg_data").innerHTML = "Digite ano completo";

            form12.data.focus();

            document.getElementById("msg_data").style.display = "Block"; //faz aparecer a mensagem de erro.

            return false;
        }

    }
</script>

</html>