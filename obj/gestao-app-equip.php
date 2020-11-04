
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
        <div class="col-md-4 border_smaler" style="text-align: -webkit-center;">
            <div>
                <img src="../img/icons_devices.png" alt="icone">
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

            <div style="padding: 10px 0;">
                <img class="usr_btn" src="../img/plus.png" alt="Sinal_Mais" data-toggle="modal" data-target="#exampleModalScrollable" onclick="extras('<?php echo $line['extra_cod'] ?>')">
                <img class="usr_btn" src="../img/trash.png" alt="lixeira">
            </div>
        </div>
    <?php } ?>
</div>

</section>
<!-- Principal -->
