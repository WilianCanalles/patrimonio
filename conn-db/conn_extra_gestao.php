<?php
if (!isset($_SESSION)) {
    session_start();
}
$emp_principal = $_SESSION['emp_principal'];
if (isset($_POST['verifica']) && $_POST['verifica'] == 'extra') {
    $_SESSION['conn_extra'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'altera') {
    $_SESSION['conn_extra1'] = true;
}

if (isset($_SESSION['conn_extra'])) {
    $codigo = $_POST['cod'];
    include_once 'conexao.php';

    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $query_tb_equipamento = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
    FROM `tb_equipamento` AS EE 
    LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
    LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
    LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
    LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
    LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
    LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
    WHERE EE.`emp_Principal` = $emp_principal AND EE.`extra_cod` = $codigo";

        $statement = $conexao->prepare($query_tb_equipamento);

        $statement->execute();

        $result_tb_equipamento = $statement->fetchall();
?>
        <div class="container">
            <div class="row">
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
                    <section class="col-lg-4 ">
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('codigo')"></span>

                            <input type="hidden" id="extra_cod1" value="<?php echo $line['extra_cod'] ?>">
                            <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('tipo')"></span>

                            <input type="hidden" id="tipo_equipamento1" value="<?php echo $line['tipo_equipamento'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['tipo_equipamento'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('modelo')"></span>

                            <input type="hidden" id="modelo_equipamento1" value="<?php echo $line['modelo_equipamento'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['modelo_equipamento'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fabricante<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('fabricante')"></span>

                            <input type="hidden" id="fabricante1" value="<?php echo $line['fabricante'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fabricante'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Série<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('serie')"></span>

                            <input type="hidden" id="num_serie1" value="<?php echo $line['num_serie'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['num_serie'] ?></span>
                        </div>

                    </section>

                    <section class="col-lg-4 ">
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Empresa<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('empresa')"></span>

                            <input type="hidden" id="empresa1" value="<?php echo $line['empresa'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['empresa'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Local<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('local')"></span>

                            <input type="hidden" id="local1" value="<?php echo $line['local'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['local'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fornecedor<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('fornecedor')"></span>

                            <input type="hidden" id="fornecedor1" value="<?php echo $line['fornecedor'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fornecedor'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Nota Fiscal<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('nota')"></span>

                            <input type="hidden" id="nota_fiscal1" value="<?php echo $line['nota_fiscal'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['nota_fiscal'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Data da Compra<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('data')"></span>

                            <input type="hidden" id="data_compra1" value="<?php echo $line['data_compra'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['data_compra'] ?></span>
                        </div>
                    </section>
                    <section class="col-lg-4 ">
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Situação<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('situacao')"></span>

                            <input type="hidden" id="situacao1" value="<?php echo $line['situacao'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['situacao'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Informacões<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('informacao')"></span>

                            <input type="hidden" id="informacoes1" value="<?php echo $line['informacoes'] ?>">
                            <span class="form-control" style="color: black!important; overflow: auto;height: 200px;"><?php echo $line['informacoes'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Periférico</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['perifericos'] ?></span>
                        </div>
                    </section>
                <?php } ?>
            </div>
        </div>
    <?php
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_extra']);
} elseif (isset($_SESSION['conn_extra1'])) {
    $codigo = $_POST['cod'];
    $campo = $_POST['campo'];
    include_once 'conexao.php';

    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $query_tb_equipamento = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
    FROM `tb_equipamento` AS EE 
    LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
    LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
    LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
    LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
    LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
    LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
    WHERE EE.`emp_Principal` = $emp_principal AND EE.`extra_cod` = $codigo";

        $statement = $conexao->prepare($query_tb_equipamento);

        $statement->execute();

        $result_tb_equipamento = $statement->fetchall();
    ?>

        <div class="container">
            <div class="row" style="justify-content: center;">
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
                    <?php include 'conn_db.php';
                    if ($campo == 'codigo') {
                    ?>
                        <section class="col-lg-8 ">

                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código</span>

                                <input id="extra_cod" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['extra_cod'] ?>">
                            </div>

                        </section>

                    <?php
                    } elseif ($campo == 'tipo') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo</span>

                                <input type="hidden" id="equipamento1" value="<?php echo $line['extra_cod'] ?>">
                                <select name="equipamento" class="form-control" id="equipamento">

                                    <?php foreach ($result_tb_tipo_equipamento as $line1) { ?>
                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'modelo') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo</span>

                                <select name="modelo" class="form-control" id="modelo">

                                    <?php foreach ($result_tb_modelo_equipamento as $line1) { ?>
                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'fabricante') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fabricante</span>
                                <select name="fabricante" class="form-control" id="fabricante">
                                    <?php foreach ($result_tb_fabricante as $line1) { ?>
                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'serie') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Série</span>

                                <input id="serie" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['num_serie'] ?>">

                            </div>
                        </section>

                    <?php } elseif ($campo == 'empresa') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Empresa</span>
                                <select name="empresa" class="form-control" id="empresa">

                                    <?php foreach ($result_tb_subEmp as $line1) { ?>
                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php                                 } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'local') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Local</span>

                                <select name="local" class="form-control" id="local">

                                    <?php foreach ($result_tb_local as $line1) { ?>
                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'fornecedor') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fornecedor</span>

                                <select name="fornecedor" class="form-control" id="fornecedor">

                                    <?php foreach ($result_tb_fornecedor as $line1) { ?>
                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'nota') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Nota Fiscal</span>

                                <input id="nota" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['nota_fiscal'] ?>">


                            </div>
                        </section>

                    <?php } elseif ($campo == 'data') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Data da Compra</span>

                                <input id="inputData" type="text" inputmode="numeric" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['data_compra'] ?>">

                            </div>
                        </section>

                    <?php } elseif ($campo == 'situacao') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Situação</span>

                                <select name="situacao" class="form-control" id="situacao">
                                    <option value="Operacional">Operacional</option>
                                    <option value="Sem_Uso">Sem Uso</option>
                                    <option value="Sucateado">Sucateado</option>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'informacao') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Informacões</span>

                                <textarea id="informacoes" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['informacoes'] ?>" rows="5"></textarea>

                            </div>
                        </section>

                    <?php } ?>


                <?php } ?>
            </div>
        </div>
    <?php
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_extra']);
}
