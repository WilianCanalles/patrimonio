<!doctype html>
<html>

<head>
    <title>SelectPure example</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>


<!-- Principal -->
<section>

<div class="row" id="userscroll" style="overflow: auto; text-align: center">
    <?php include '../conn-db/conn_db.php';
    /*echo '<pre>';
print_r($result_tb_equipamento);
echo '</pre>';*/ ?>
    <?php foreach ($result_tb_equipamento as $line) {
        if ($line['nota_fiscal'] == '') {
            $line['nota_fiscal'] = 'Não Informado';
        };
        if ($line['informacoes'] == '') {
            $line['informacoes'] = 'Não Informado';
        };
        if ($line['perifericos'] == '') {
            $line['perifericos'] = 'Nenhum vinculo';
        };
    ?>
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div>
                <img src="../img/periferico.png" style="width: 100px;" alt="icone">
            </div>
            <div>
                <div class="input-group" style="display: block!important;">
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código</span>

                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo</span>

                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['tipo_equipamento'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo</span>

                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['modelo_equipamento'] ?></span>
                    </div>
                </div>
            </div>

            <div class="border_smaler" style="padding: 10px 0;">
                <img class="usr_btn" src="../img/plus.png" alt="Sinal_Mais" data-toggle="modal" data-target="#ModalScrollablePeriferico" onclick="periferico('<?php echo $line['extra_cod'] ?>')">
              
            </div>
        </div>
    <?php } ?>
</div>

</section>
<!-- Principal -->

</body>

</html>