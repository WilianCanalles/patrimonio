<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['tabela']) && $_POST['tabela'] == 'update_eqp') {
    $_SESSION['conn_update_equipamento'] = true;
}
$campo = $_POST['campo'];
$new_value = $_POST['value'];
$codigo = $_POST['codigo'];
$emp_principal = $_SESSION['emp_principal'];
if (isset($_SESSION['conn_update_equipamento'])) {

    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );

        if ($campo == 'codigo') {
            $query_tb = "SELECT * FROM `tb_equipamento` WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $new_value";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

            $num_row1 = $statement2->rowCount();
            if ($num_row1 == 0) {
                if($new_value == 0){
                    $_SESSION['alteracao_eqp_codigo_zero'] = true;
                }else{
                    $query_tb_equipamento = "UPDATE `tb_equipamento` SET `extra_cod`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo ";
            $_SESSION['sucesso_alteracao_eqp'] = true;
                }
            
            } else if($num_row1 > 0){
                $_SESSION['err_altera_cod'] = true;
            }
        } else if ($campo == 'equipamento') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `tipo_equipamento`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'modelo') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `modelo_equipamento`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'fabricante') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `fabricante`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'serie') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `num_serie`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'empresa') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `empresa`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'local') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `local`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'fornecedor') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `fornecedor`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'nota') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `nota_fiscal`= $new_value WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'data') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `data_compra`= '$new_value' WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'situacao') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `situacao`= '$new_value' WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        } else if ($campo == 'informacao') {
            $query_tb_equipamento = "UPDATE `tb_equipamento` SET `informacoes`= '$new_value' WHERE `emp_principal` = '$emp_principal' AND `extra_cod` = $codigo";
            $_SESSION['sucesso_alteracao_eqp'] = true;
        }

        $statement = $conexao->prepare($query_tb_equipamento);

        $statement->execute();
        
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }

    unset($_SESSION['conn_update_equipamento']);
}
