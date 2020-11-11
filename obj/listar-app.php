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
    <script src="../js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Modal features -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: 2px;
        }

        ::-webkit-scrollbar-thumb {
            background: #25252538;
        }
    </style>
    <style type="text/css" media="print">
        body {
            visibility: hidden;
            background: white;

        }

        .modal-body {
            visibility: initial;
        }
    </style>
</head>

<body>
    <?php include '../conn-db/conn_pages.php' ?>
    <?php if ($num_paginas == 0) { ?>

        <div class="container">
            <div style="margin: 10% 5%;">
                <p class="display-1">Inventário Vazio</p>
                <p class="h1">Volte após realizar o primeiro cadastro</p>
            </div>
        </div>
    <?php  } else if ($num_paginas > 0) { ?>

        <div class="container">
            <?php include 'alert.php'; ?>
            <div style="justify-content: center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="pag_inicial.php?menu=1&pagina=0" aria-label="Previous">
                                &laquo;
                            </a>
                        </li>
                        <?php

                        for ($i = 0; $i < $num_paginas; $i++) {
                            $estilo = "";
                            if ($pagina == (($i) * $itens_por_pagina))
                                $estilo = "active";
                        ?>
                            <li class="<?php echo $estilo; ?> page-item"><a class="page-link" href="pag_inicial.php?menu=1&pagina=<?php echo ($i * $itens_por_pagina); ?>"><?php echo ($i + 1); ?></a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="pag_inicial.php?menu=1&pagina=<?php echo (($i - 1) * $itens_por_pagina); ?>" aria-label="Next">
                                &raquo;
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="col-lg-12">
                    <h1>Equipamentos</h1>
                    <div class="">
                        <div class="row">
                            <?php if ($num > 0) {
                                foreach ($result_tb_equipamento2 as $lista_itens) {
                                    if ($lista_itens['nota_fiscal'] == '') {
                                        $lista_itens['nota_fiscal'] = 'Não Informado';
                                    }
                                    if ($lista_itens['informacoes'] == '') {
                                        $lista_itens['informacoes'] = 'Não Informado';
                                    }
                                    if ($lista_itens['perifericos'] == '') {
                                        $lista_itens['perifericos'] = 'Nenhum vinculo';
                                    }
                            ?>
                                    <div class="form-group col-lg-4">
                                        <label class="input-group-text" for="codigo">Código</label>
                                        <a id="codinput" class="input-group-text inputgroup-bg"><?php echo $lista_itens['extra_cod']; ?></a>
                                        <label class="input-group-text" for="tipo">Tipo</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['tipo_equipamento']; ?></a>
                                        <label class="input-group-text" for="modelo">Modelo</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['modelo_equipamento']; ?></a>
                                        <label class="input-group-text" for="fabricante">Fabricante</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['fabricante']; ?></a>
                                        <label class="input-group-text" for="serie">N° Serie</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['num_serie']; ?></a>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label class="input-group-text" for="empresa">Empresa</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['empresa']; ?></a>
                                        <label class="input-group-text" for="fornecedor">Fornecedor</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['fornecedor']; ?></a>
                                        <label class="input-group-text" for="nf">Nota Fiscal</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['nota_fiscal']; ?></a>
                                        <label class="input-group-text" for="local">Local</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['local']; ?></a>
                                        <label class="input-group-text" for="situacao">Situação</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['situacao']; ?></a>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label class="input-group-text" for="data">Data Compra</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['data_compra']; ?></a>
                                        <label class="input-group-text" for="info">Informações</label>
                                        <a class="input-group-text inputgroup-bg" style="white-space: normal;"><?php echo $lista_itens['informacoes']; ?></a>
                                        <label class="input-group-text" for="periferico">Periferico</label>
                                        <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['perifericos']; ?></a>
                                    </div>
                                <?php }
                                ?>
                        </div>
                    </div>

                <?php } ?>
                </div>
            </div>
            <!--<div style="justify-content: center;text-align: center;">
            <svg id="barcode"></svg>
        </div>-->
            <div>
                <section>
                    <div class="modal fade" id="exampleModalScrollablepesq" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div style="margin:auto;" class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Pesquisa Avançada</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span style="color: #6c757d !important" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="search_text" id="search_text" placeholder="Pesquisa Avançada" class="form-control" />
                                            </div>
                                        </div>
                                        <div id="result"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="value" value="0">

                                    <button type="button" id="btn_on-off" class="btn btn-primary">
                                        Scanner <span id="on-off" class="badge badge-danger">OFF</span>
                                    </button>
                                </div>

                                <div id="scan-video" class="modal-body  ocultarvideo">
                                    <?php
                                    include("../barcode/ler.html");
                                    ?>

                                    <div id="video_scan" style="text-align: center;"></div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" onclick="location.href = '../barcode/ler.html';"></button>-->

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="text-align: center;">
                        <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollablepesq" style="margin-bottom: 15px" value="Avançada &#x1f50d;"></input>
                    </div>
                    <div style="text-align: center;">


                    </div>
                </section>
                <section>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollableprint" style="white-space: normal; padding: 0;border-radius: 1.25rem; position: fixed; right: 0.5em; bottom:65px;"><img src="../img/print.png" style="width: 51px;" onclick="print_barcode()"></button>


                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable-barcode" style="white-space: normal; padding: 0;border-radius: 1.25rem; position: fixed; right: 0.5em; bottom: 0.5em;">
                        <svg width="1em" style="width: auto; height: 50px; color: black;" height="1em" viewBox="0 0 16 16" class="bi bi-upc" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                        </svg>
                    </button>
                    <?php
                    include 'modal_gestao.php';
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalScrollable-barcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Barcode</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="align-self: center;">
                                    <svg id="barcode"></svg>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal -->
                    <!-- Modal Impressao -->
                    <div class="modal fade" id="exampleModalScrollableprint" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Selecione Barcode</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <?php include("../conn-db/conn_barcode.php");?>
                                 <svg id="barcode_print"></svg>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal Impressao -->
                </section>
            </div>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>

    <script>
        $("#btn_on-off").click(function() {

            $("#scan-video").toggleClass("ocultarvideo");
            if ($('#on-off').hasClass('badge-success')) {
                document.getElementById('on-off').innerText = "OFF";
                $('#on-off').addClass('badge-danger');
                $('#on-off').removeClass('badge-success');
            } else if ($('#on-off').hasClass('badge-danger')) {
                document.getElementById('on-off').innerText = "ON";
                $('#on-off').addClass('badge-success');
                $('#on-off').removeClass('badge-danger');
            }
        });
    </script>


    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "../conn-db/conn_search.php",
                    method: "POST",
                    data: {
                        query: query,
                        valor: 'pesq'
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function() {

                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }


            });
        });
    </script>

    <script>
        var teste = document.getElementById('codinput').innerText;
        // alert (teste.innerText);
        JsBarcode("#barcode", teste, {
            background: "#ccffff00",
            width: 4,

            fontSize: 15,
            marginTop: 25,
            //text: " " codigo sem numero
        });

        function print_barcode(barcode_select) {
             
            for(i = 0; i < 5; i++){
JsBarcode("#barcode_print", barcode_select, {
                background: "#ccffff00",
                width: 4,

                fontSize: 15,
                marginTop: 25,
                //text: " " codigo sem numero
            });

            }
            
        }
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>