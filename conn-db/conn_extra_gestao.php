<?php
if (!isset($_SESSION)) {
    session_start();
}
$emp_principal = $_SESSION['emp_principal'];
if (isset($_POST['verifica']) && $_POST['verifica'] == 'extra') {
    $_SESSION['conn_extra'] = true;
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
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Fabricane</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fabricante'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Série</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['num_serie'] ?></span>
                        </div>

                    </section>

                    <section class="col-lg-4 ">
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Empresa</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['empresa'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Local</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['local'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Forncedor</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['fornecedor'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Nota Fiscal</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['nota_fiscal'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Data da Compra</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['data_compra'] ?></span>
                        </div>
                    </section>
                    <section class="col-lg-4 ">
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Situação</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['situacao'] ?></span>
                        </div>
                        <div>
                            <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Informacões</span>

                            <span class="form-control" style="color: black!important; height: auto;"><?php echo $line['informacoes'] ?></span>
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
}