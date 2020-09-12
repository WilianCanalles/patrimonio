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
    $query_tb_equipamento = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
    FROM `tb_equipamento` AS EE 
    LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
    LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
    LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
    LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
    LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
    LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
    WHERE EE.`emp_Principal` = $emp_principal
    ORDER BY EE.`extra_cod` ASC";
 

    $statement = $conexao->prepare($query_tb_equipamento);

    $statement->execute();

    $result_tb_equipamento = $statement->fetchall();
    $num_total = $statement->rowCount();


    //==========================================================
    $query_tb_fabricante = "SELECT * FROM tb_fabricante WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_fabricante);

    $statement->execute();

    $result_tb_fabricante = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_fornecedor = "SELECT * FROM tb_fornecedor WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_fornecedor);

    $statement->execute();

    $result_tb_fornecedor = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_local = "SELECT * FROM tb_local WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_local);

    $statement->execute();

    $result_tb_local = $statement->fetchall(PDO::FETCH_NUM);
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
    $query_tb_user_equipamento = "SELECT * FROM tb_user WHERE `emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_user_equipamento);

    $statement->execute();

    $result_tb_user_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
