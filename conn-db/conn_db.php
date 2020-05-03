<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
    $query_tb_empresa = "SELECT * FROM tb_empresa";

    $statement = $conexao->prepare($query_tb_empresa);

    $statement->execute();

    $result_tb_empresa = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    // Equipamento
    $query_tb_equipamento = "SELECT * FROM tb_equipamento";

    $statement = $conexao->prepare($query_tb_equipamento);

    $statement->execute();

    $result_tb_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_fabricante = "SELECT * FROM tb_fabricante";

    $statement = $conexao->prepare($query_tb_fabricante);

    $statement->execute();

    $result_tb_fabricante = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_loc_aquisicao = "SELECT * FROM tb_loc_aquisicao";

    $statement = $conexao->prepare($query_tb_loc_aquisicao);

    $statement->execute();

    $result_tb_loc_aquisicao = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_modelo_equipamento = "SELECT * FROM tb_modelo_equipamento";

    $statement = $conexao->prepare($query_tb_modelo_equipamento);

    $statement->execute();

    $result_tb_modelo_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
    $query_tb_tipo_equipamento = "SELECT * FROM tb_tipo_equipamento";

    $statement = $conexao->prepare($query_tb_tipo_equipamento);

    $statement->execute();

    $result_tb_tipo_equipamento = $statement->fetchall(PDO::FETCH_NUM);
    //==========================================================
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
