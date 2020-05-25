<?php
if (!isset($_SESSION)) {
    session_start();
}
//print_r($_SESSION);
$emp_principal = $_SESSION['emp_principal'];
include_once 'conexao.php';
try {
    $conexao = new PDO(
        "mysql:host=$host; dbname=$dbname",
        "$user",
        "$pass"
    );
    $query_tb_empresa = "SELECT * FROM tb_empresa WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_empresa);

    $statement->execute();

    $result_tb_empresa = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_subEmp = "SELECT * FROM tb_subempresa WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_subEmp);

    $statement->execute();

    $result_tb_subEmp = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    // Equipamento
    $query_tb_equipamento = "SELECT `tb_equipamento`.`codigo`,
    `tb_tipo_equipamento`.`tipo_equipamento`, 
    `tb_modelo_equipamento`.`modelo_equipamento`, 
    `tb_fabricante`.`fabricante`,
    `num_serie`,
    a.`empresa`,
    `tb_loc_aquisicao`.`loc_aquisicao`,
    `nota_fiscal`,
    `data_compra`,
    `informacoes`,
    `perifericos`
    FROM `tb_equipamento`
    INNER JOIN `tb_subempresa` AS a ON `tb_equipamento`.`empresa` = a.`codigo`
    INNER JOIN `tb_tipo_equipamento` ON `tb_equipamento`.`tipo_equipamento` = `tb_tipo_equipamento`.`codigo`
    INNER JOIN `tb_modelo_equipamento` ON `tb_equipamento`.`modelo_equipamento` = `tb_modelo_equipamento`.`codigo`
    INNER JOIN `tb_fabricante` ON `tb_equipamento`.`fabricante` = `tb_fabricante`.`codigo`
    INNER JOIN `tb_loc_aquisicao` ON `tb_equipamento`.`loc_aquisicao` = `tb_loc_aquisicao`.`codigo`
    
    
    WHERE `tb_equipamento`.`emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_equipamento);

    $statement->execute();

    $result_tb_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_fabricante = "SELECT * FROM tb_fabricante WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_fabricante);

    $statement->execute();

    $result_tb_fabricante = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_loc_aquisicao = "SELECT * FROM tb_loc_aquisicao WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_loc_aquisicao);

    $statement->execute();

    $result_tb_loc_aquisicao = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_modelo_equipamento = "SELECT * FROM tb_modelo_equipamento WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_modelo_equipamento);

    $statement->execute();

    $result_tb_modelo_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_tipo_equipamento = "SELECT * FROM tb_tipo_equipamento WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_tipo_equipamento);

    $statement->execute();

    $result_tb_tipo_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
