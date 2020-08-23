<?php
include("../conn-db/conexao.php");
include_once("../conn-db/conn_db.php");
// definir o numero de itens por pagina
$itens_por_pagina = 1;

// pegar a pagina atual
$pagina = intval($_GET['pagina']);

//==========================================================
// Equipamento2 LIMIT
$query_tb_equipamento2 = "SELECT `tb_equipamento`.`codigo`,
`tb_tipo_equipamento`.`tipo_equipamento`, 
`tb_modelo_equipamento`.`modelo_equipamento`, 
`tb_fabricante`.`fabricante`,
`num_serie`,
a.`empresa`,
`tb_fornecedor`.`fornecedor`,
`nota_fiscal`,
`data_compra`,
`informacoes`,
`perifericos`,
`tb_local`.`local`,
`situacao`
FROM `tb_equipamento`
INNER JOIN `tb_subempresa` AS a ON `tb_equipamento`.`empresa` = a.`codigo`
INNER JOIN `tb_tipo_equipamento` ON `tb_equipamento`.`tipo_equipamento` = `tb_tipo_equipamento`.`codigo`
INNER JOIN `tb_modelo_equipamento` ON `tb_equipamento`.`modelo_equipamento` = `tb_modelo_equipamento`.`codigo`
INNER JOIN `tb_local` ON `tb_equipamento`.`local` = `tb_local`.`codigo`
INNER JOIN `tb_fabricante` ON `tb_equipamento`.`fabricante` = `tb_fabricante`.`codigo`
INNER JOIN `tb_fornecedor` ON `tb_equipamento`.`fornecedor` = `tb_fornecedor`.`codigo`

    WHERE `tb_equipamento`.`emp_Principal` = $emp_principal
    ORDER BY `codigo` ASC
    LIMIT $pagina, $itens_por_pagina";

$statement2 = $conexao->prepare($query_tb_equipamento2);

$statement2->execute();

$result_tb_equipamento2 = $statement2->fetchall(PDO::FETCH_NUM);
$num = $statement2->rowCount();

$num_paginas = ceil($num_total / $itens_por_pagina);
?>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/jquery.mask.min.js"></script>

    <script type="text/javascript" src="../js/jquery-3.5.0.js"></script>
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/js_cadastro.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src='../js/quagga.min.js'></script>

    <!-- FontAwesome -->

    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <div class="container">
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
                        ?>
                                <div class="form-group col-lg-4">
                                    <label class="input-group-text" for="codigo">Código</label>
                                    <a id="codinput" class="input-group-text inputgroup-bg"><?php echo $lista_itens['0']; ?></a>
                                    <label class="input-group-text" for="tipo">Tipo</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['1']; ?></a>
                                    <label class="input-group-text" for="modelo">Modelo</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['2']; ?></a>
                                    <label class="input-group-text" for="fabricante">Fabricante</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['3']; ?></a>
                                    <label class="input-group-text" for="serie">N° Serie</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['4']; ?></a>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="input-group-text" for="empresa">Empresa</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['5']; ?></a>
                                    <label class="input-group-text" for="fornecedor">Fornecedor</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['6']; ?></a>
                                    <label class="input-group-text" for="nf">Nota Fiscal</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['7']; ?></a>
                                    <label class="input-group-text" for="local">Local</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['11']; ?></a>
                                    <label class="input-group-text" for="situacao">Situação</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['12']; ?></a>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="input-group-text" for="data">Data Compra</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['8']; ?></a>
                                    <label class="input-group-text" for="info">Informações</label>
                                    <a class="input-group-text inputgroup-bg" style="white-space: normal;"><?php echo $lista_itens['9']; ?></a>
                                    <label class="input-group-text" for="periferico">Periferico</label>
                                    <a class="input-group-text inputgroup-bg"><?php echo $lista_itens['10']; ?></a>
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
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                    <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" value="Avançada &#x1f50d;"></input>
                </div>
                <div style="text-align: center;">


                </div>
            </section>
            <section>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable-barcode" style="white-space: normal; padding: 0;border-radius: 1.25rem;">
                    <svg width="1em" style="width: auto; height: 50px; color: black;" height="1em" viewBox="0 0 16 16" class="bi bi-upc" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                    </svg>
                </button>

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
            </section>
        </div>
    </div>
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
                        query: query
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

    <script src="JsBarcode.all.min.js"></script>
    <script>
        var teste = document.getElementById('codinput').innerText;
        // alert (teste.innerText);
        JsBarcode("#barcode", teste, {
            background: "#ccffff00",
            width:3,
            
            fontSize: 15,
            marginTop: 25,
            //text: " " codigo sem numero
        });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>