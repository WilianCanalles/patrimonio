<?php
if (!isset($_SESSION)) {
    session_start();
}
$emp_principal = $_SESSION['emp_principal'];
if (isset($_POST['verifica']) && $_POST['verifica'] == 'extra') {
    $_SESSION['conn_extra'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'altera') {
    $_SESSION['conn_extra1'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'altera_itens') {
    $_SESSION['conn_extra2'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'empresa') {
    $_SESSION['conn_extra_empresa'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'fabricante') {
    $_SESSION['conn_extra_fabricante'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'fornecedor') {
    $_SESSION['conn_extra_fornecedor'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'local') {
    $_SESSION['conn_extra_local'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'modelo') {
    $_SESSION['conn_extra_modelo'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'tipo') {
    $_SESSION['conn_extra_tipo'] = true;
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

                            <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                            <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('equipamento')"></span>

                            <input type="hidden" id="equipamento1" value="<?php echo $line['tipo_equipamento'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['tipo_equipamento'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('modelo')"></span>

                            <input type="hidden" id="modelo1" value="<?php echo $line['modelo_equipamento'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['modelo_equipamento'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fabricante<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('fabricante')"></span>

                            <input type="hidden" id="fabricante1" value="<?php echo $line['fabricante'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fabricante'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Série<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('serie')"></span>

                            <input type="hidden" id="serie1" value="<?php echo $line['num_serie'] ?>">
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

                            <input type="hidden" id="nota1" value="<?php echo $line['nota_fiscal'] ?>">
                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['nota_fiscal'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Data da Compra<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableEditavel" onclick="altera('data')"></span>

                            <input type="hidden" id="data1" value="<?php echo $line['data_compra'] ?>">
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

                            <input type="hidden" id="informacao1" value="<?php echo $line['informacoes'] ?>">
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
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
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

                                <input id="extra_cod" type="number" min="1" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['extra_cod'] ?>">
                            </div>

                        </section>

                    <?php
                    } elseif ($campo == 'equipamento') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo</span>

                                <input type="hidden" id="equipamento1" value="<?php echo $line['extra_cod'] ?>">
                                <select name="equipamento" class="form-control" id="equipamento">
                                    <option value="" disabled selected><?php echo $line['tipo_equipamento'] ?></option>
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
                                    <option value="" disabled selected><?php echo $line['modelo_equipamento'] ?></option>
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
                                    <option value="" disabled selected><?php echo $line['fabricante'] ?></option>
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
                                    <option value="" disabled selected><?php echo $line['empresa'] ?></option>
                                    <?php foreach ($result_tb_subEmp as $line1) { ?>

                                        <option value="<?php echo $line1[1] ?>"><?php echo $line1[2] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </section>

                    <?php } elseif ($campo == 'local') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Local</span>

                                <select name="local" class="form-control" id="local">
                                    <option value="" disabled selected><?php echo $line['local'] ?></option>
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
                                    <option value="" disabled selected><?php echo $line['fornecedor'] ?></option>
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

                                <input class="form-control" onclick="ajaxdata()" name="data" type="text" id="inputData" inputmode="numeric" placeholder="<?php echo $line['data_compra'] ?>">

                            </div>
                        </section>

                    <?php } elseif ($campo == 'situacao') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Situação</span>

                                <select name="situacao" class="form-control" id="situacao">
                                    <option value="" disabled selected><?php echo $line['situacao'] ?></option>
                                    <option value="Operacional">Operacional</option>
                                    <option value="Sem Uso">Sem Uso</option>
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
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra2'])) {
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

                                <input id="extra_cod" type="number" min="1" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['extra_cod'] ?>">
                            </div>

                        </section>

                    <?php
                    } elseif ($campo == 'equipamento') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo</span>

                                <input type="hidden" id="equipamento1" value="<?php echo $line['extra_cod'] ?>">
                                <input id="equipamento" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['tipo_equipamento'] ?>">
                            </div>
                        </section>

                    <?php } elseif ($campo == 'modelo') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo</span>

                                <input id="modelo" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['modelo_equipamento'] ?>">
                            </div>
                        </section>

                    <?php } elseif ($campo == 'fabricante') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fabricante</span>
                                <input id="fabricante" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['fabricante'] ?>">
                            </div>
                        </section>


                    <?php } elseif ($campo == 'empresa') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Empresa</span>
                                <input id="empresa" class="form-control" style="color: black!important; height: auto;" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['empresa'] ?>">

                            </div>
                        </section>

                    <?php } elseif ($campo == 'local') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Local</span>

                                <input id="local" class="form-control" style="color: black!important; height: auto;" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['local'] ?>">

                            </div>
                        </section>

                    <?php } elseif ($campo == 'fornecedor') {
                    ?>
                        <section class="col-lg-8 ">
                            <div>
                                <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fornecedor</span>

                                <input id="fornecedor" class="form-control" style="color: black!important; height: auto;" class="form-control" style="color: black!important; height: auto;" placeholder="<?php echo $line['fornecedor'] ?>">

                            </div>
                        </section>

         
                    <?php }  
                    ?>
         

                <?php } ?>
            </div>

        </div>


    <?php
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra_empresa'])) {
    //$codigo = $_POST['cod'];
    //$campo = $_POST['campo'];
    include_once 'conn_db.php';
    //print_r($result_tb_modelo_equipamento);
    ?>
    <div class="container">
        <div class="row">
            <?php foreach ($result_tb_subEmp as $line) { ?>
                <section class="col-lg-4 " style="padding-bottom: 15px; border-bottom:black 1px solid">
                    <div style="text-align: center;">
                        <img style="height: 70px;" src="../img/itens.png">
                    </div>

                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('empresa','codigo')"></span>

                        <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                        <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Empresa<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('empresa','empresa')"></span>

                        <input type="hidden" id="empresa1" value="<?php echo $line['empresa'] ?>">
                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['empresa'] ?></span>
                    </div>

                </section>
            <?php } ?>
        </div>
    </div>
    <?php
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra_fabricante'])) {
    //$codigo = $_POST['cod'];
    //$campo = $_POST['campo'];
    include_once 'conn_db.php';
    //print_r($result_tb_modelo_equipamento);
?>
    <div class="container">
        <div class="row">
            <?php foreach ($result_tb_fabricante as $line) { ?>
                <section class="col-lg-4 " style="padding-bottom: 15px; border-bottom:black 1px solid">
                    <div style="text-align: center;">
                        <img style="height: 70px;" src="../img/itens.png">
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('fabricante','codigo')"></span>

                        <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                        <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fabricante<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('fabricante','fabricante')"></span>

                        <input type="hidden" id="fabricante1" value="<?php echo $line['fabricante'] ?>">
                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fabricante'] ?></span>
                    </div>

                </section>
            <?php } ?>
        </div>
    </div>
<?php
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra_fornecedor'])) {
    //$codigo = $_POST['cod'];
    //$campo = $_POST['campo'];
    include_once 'conn_db.php';
    //print_r($result_tb_modelo_equipamento);
?>
    <div class="container">
        <div class="row">
            <?php foreach ($result_tb_fornecedor as $line) { ?>
                <section class="col-lg-4 " style="padding-bottom: 15px; border-bottom:black 1px solid">
                    <div style="text-align: center;">
                        <img style="height: 70px;" src="../img/itens.png">
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('fornecedor','codigo')"></span>

                        <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                        <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fornecedor<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('fornecedor','fornecedor')"></span>

                        <input type="hidden" id="fornecedor1" value="<?php echo $line['fornecedor'] ?>">
                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fornecedor'] ?></span>
                    </div>

                </section>
            <?php } ?>
        </div>
    </div>
<?php
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra_local'])) {
    //$codigo = $_POST['cod'];
    //$campo = $_POST['campo'];
    include_once 'conn_db.php';
    //print_r($result_tb_modelo_equipamento);
?>
    <div class="container">
        <div class="row">
            <?php foreach ($result_tb_local as $line) { ?>
                <section class="col-lg-4 " style="padding-bottom: 15px; border-bottom:black 1px solid">
                    <div style="text-align: center;">
                        <img style="height: 70px;" src="../img/itens.png">
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('local','codigo')"></span>

                        <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                        <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Local<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('local','local')"></span>

                        <input type="hidden" id="local1" value="<?php echo $line['local'] ?>">
                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['local'] ?></span>
                    </div>

                </section>
            <?php } ?>
        </div>
    </div>
<?php
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra_modelo'])) {
    //$codigo = $_POST['cod'];
    //$campo = $_POST['campo'];
    include_once 'conn_db.php';
    //print_r($result_tb_modelo_equipamento);
?>
    <div class="container">
        <div class="row">
            <?php foreach ($result_tb_modelo_equipamento as $line) { ?>
                <section class="col-lg-4 " style="padding-bottom: 15px; border-bottom:black 1px solid">
                    <div style="text-align: center;">
                        <img style="height: 70px;" src="../img/itens.png">
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('modelo','codigo')"></span>

                        <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                        <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('modelo','modelo')"></span>

                        <input type="hidden" id="modelo1" value="<?php echo $line['modelo_equipamento'] ?>">
                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['modelo_equipamento'] ?></span>
                    </div>

                </section>
            <?php } ?>
        </div>
    </div>
<?php
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
} elseif (isset($_SESSION['conn_extra_tipo'])) {
    //$codigo = $_POST['cod'];
    //$campo = $_POST['campo'];
    include_once 'conn_db.php';
    //print_r($result_tb_modelo_equipamento);
?>
    <div class="container">
        <div class="row">
            <?php foreach ($result_tb_tipo_equipamento as $line) { ?>
                <section class="col-lg-4 " style="padding-bottom: 15px; border-bottom:black 1px solid">
                    <div style="text-align: center;">
                        <img style="height: 70px;" src="../img/itens.png">
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('equipamento','codigo')"></span>

                        <input type="hidden" id="codigo1" value="<?php echo $line['extra_cod'] ?>">
                        <span id="codigo" class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
                    </div>
                    <div>
                        <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo<img class="usr_btn_gestao" src="../img/pen.png" alt="lapis" data-toggle="modal" data-target="#ModalScrollableItens" data-dismiss="modal" onclick="altera_itens('equipamento','equipamento')"></span>

                        <input type="hidden" id="equipamento1" value="<?php echo $line['tipo_equipamento'] ?>">
                        <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['tipo_equipamento'] ?></span>
                    </div>

                </section>
            <?php } ?>
        </div>
    </div>
<?php
    unset($_SESSION['conn_extra']);
    unset($_SESSION['conn_extra1']);
    unset($_SESSION['conn_extra2']);
    unset($_SESSION['conn_extra_empresa']);
    unset($_SESSION['conn_extra_fabricante']);
    unset($_SESSION['conn_extra_fornecedor']);
    unset($_SESSION['conn_extra_local']);
    unset($_SESSION['conn_extra_modelo']);
    unset($_SESSION['conn_extra_tipo']);
}
