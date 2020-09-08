<?php
session_start();

if (isset($_POST['tabela']) && $_POST['tabela'] == 'fabricante') {
    $_SESSION['conn_envio_fabricante'] = true;
} elseif (isset($_POST['tabela']) && $_POST['tabela'] == 'empresa') {
    $_SESSION['conn_envio_empresa'] = true;
} elseif (isset($_POST['tabela']) && $_POST['tabela'] == 'compra') {
    $_SESSION['conn_envio_compra'] = true;
} elseif (isset($_POST['tabela']) && $_POST['tabela'] == 'modelo') {
    $_SESSION['conn_envio_modelo'] = true;
} elseif (isset($_POST['tabela']) && $_POST['tabela'] == 'tipo') {
    $_SESSION['conn_envio_tipo'] = true;
} elseif (isset($_POST['tabela']) && $_POST['tabela'] == 'cadastrar') {
    $_SESSION['conn_envio_equip'] = true;
} elseif (isset($_POST['tabela']) && $_POST['tabela'] == 'local') {
    $_SESSION['conn_envio_local'] = true;
}

$equipamento = $_POST['equipamento'];
$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];
$empresa = $_POST['empresa'];
$fornecedor = $_POST['fornecedor'];
$emp_principal = $_SESSION['emp_principal'];

if (isset($_SESSION['conn_envio_equip'])) {
    if (!(($equipamento == '----') || ($modelo == '----') || ($fabricante == '----') || ($empresa == '----') || ($fornecedor == '----'))) {
        include_once 'conexao.php';
        try {
            $conexao = new PDO(
                "mysql:host=$host; dbname=$dbname",
                "$user",
                "$pass"
            );
            $equipamento = $_POST['equipamento'];
            $modelo = $_POST['modelo'];
            $fabricante = $_POST['fabricante'];
            $serie = $_POST['serie'];
            $empresa = $_POST['empresa'];
            $fornecedor = $_POST['fornecedor'];
            $local = $_POST['local'];
            $situacao = $_POST['situacao'];
            $nota_fiscal = $_POST['notafiscal'];
            $data = $_POST['data'];
            $info = $_POST['info'];

            $query_tb_max = "SELECT max(extra_cod) FROM `tb_equipamento` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);

            $query_tb_equipamento = "INSERT INTO `tb_equipamento` (`codigo`, `extra_cod`, `tipo_equipamento`, `modelo_equipamento`, `local`, `fabricante`, `num_serie`, `empresa`, `fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `emp_Principal`) VALUES ('','$insert_in','$equipamento','$modelo','$local','$fabricante','$serie', '$empresa','$fornecedor','$nota_fiscal','$data','$situacao','$info','$emp_principal')";

            $statement = $conexao->prepare($query_tb_equipamento);

            $statement->execute();
        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    } else {
        $_SESSION['err_falta_itens'] = true;
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=4");
} elseif (isset($_SESSION['conn_envio_empresa'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'empresa';
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $empresa = $_POST['cad_empresa'];
        $empresa = (str_replace("'", "`", $empresa));
        echo $empresa;
        $query_tb = "SELECT * FROM `tb_subempresa` WHERE `empresa` = '$empresa'";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

        $result_tb = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb);
        $num_row1 = $statement2->rowCount();
        if ($num_row1 > 0) {
            $_SESSION['err_add_item'] = true;
        } else if ($num_row1 == 0) {
            $query_tb_max = "SELECT max(extra_cod) FROM `tb_subempresa` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);
            $query_tb_empresa = "INSERT INTO `tb_subempresa` VALUES ('','$insert_in','$empresa','$emp_principal')";
            
            $statement = $conexao->prepare($query_tb_empresa);

            $statement->execute();
            echo '<pre>';
            print_r('normal' . $position);
            echo '</pre>';
            echo ('++' . $insert_in);
            $_SESSION['add_item'] = true;
        }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=3");
} elseif (isset($_SESSION['conn_envio_compra'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'compra';
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $fornecedor = $_POST['cad_fornecedor'];

        $query_tb = "SELECT * FROM `tb_fornecedor` WHERE `emp_principal` = '$emp_principal' AND `fornecedor` = '$fornecedor'";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

        $result_tb = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb);
        $num_row1 = $statement2->rowCount();
        if ($num_row1 > 0) {
            $_SESSION['err_add_item'] = true;
        } else if ($num_row1 == 0) {
            $query_tb_max = "SELECT max(extra_cod) FROM `tb_fornecedor` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);

        $query_tb_fornecedor = "INSERT INTO `tb_fornecedor`VALUES ('','$insert_in','$fornecedor','$emp_principal')";

        $statement = $conexao->prepare($query_tb_fornecedor);

        $statement->execute();
        $_SESSION['add_item'] = true;
    }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=3");
} elseif (isset($_SESSION['conn_envio_modelo'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'modelo';
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $modelo = $_POST['cad_modelo'];

        $query_tb = "SELECT * FROM `tb_modelo_equipamento` WHERE `emp_principal` = '$emp_principal' AND `modelo_equipamento` = '$modelo'";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

        $result_tb = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb);
        $num_row1 = $statement2->rowCount();
        if ($num_row1 > 0) {
            $_SESSION['err_add_item'] = true;
        } else if ($num_row1 == 0) {
            $query_tb_max = "SELECT max(extra_cod) FROM `tb_modelo_equipamento` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);

        $query_tb_modelo = "INSERT INTO `tb_modelo_equipamento`VALUES ('','$insert_in','$modelo','$emp_principal')";

        $statement = $conexao->prepare($query_tb_modelo);

        $statement->execute();
        $_SESSION['add_item'] = true;
    }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=3");
} elseif (isset($_SESSION['conn_envio_tipo'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'tipo';
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $tipo = $_POST['cad_tipo'];

        $query_tb = "SELECT * FROM `tb_tipo_equipamento` WHERE `emp_principal` = '$emp_principal' AND `tipo_equipamento` = '$tipo'";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

        $result_tb = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb);
        $num_row1 = $statement2->rowCount();
        if ($num_row1 > 0) {
            $_SESSION['err_add_item'] = true;
        } else if ($num_row1 == 0) {
            $query_tb_max = "SELECT max(extra_cod) FROM `tb_tipo_equipamento` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);

        $query_tb_tipo = "INSERT INTO `tb_tipo_equipamento`VALUES ('','$insert_in','$tipo','$emp_principal')";

        $statement = $conexao->prepare($query_tb_tipo);

        $statement->execute();
        $_SESSION['add_item'] = true;
    }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=3");
} elseif (isset($_SESSION['conn_envio_fabricante'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'fabricante';
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $fabricante = $_POST['cad_fabricante'];

        $query_tb = "SELECT * FROM `tb_fabricante` WHERE `emp_principal` = '$emp_principal' AND `fabricante` = '$fabricante'";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

        $result_tb = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb);
        $num_row1 = $statement2->rowCount();
        if ($num_row1 > 0) {
            $_SESSION['err_add_item'] = true;
        } else if ($num_row1 == 0) {
            $query_tb_max = "SELECT max(extra_cod) FROM `tb_fabricante` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);

        $query_tb_fabricante = "INSERT INTO `tb_fabricante` VALUES ('','$insert_in','$fabricante','$emp_principal')";

        $statement = $conexao->prepare($query_tb_fabricante);

        $statement->execute();
        $_SESSION['add_item'] = true;
    }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=3");
} elseif (isset($_SESSION['conn_envio_local'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo 'local';
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $local = $_POST['cad_local'];

        $query_tb = "SELECT * FROM `tb_local` WHERE `emp_principal` = '$emp_principal' AND `local` = '$local'";

        $statement2 = $conexao->prepare($query_tb);

        $statement2->execute();

        $result_tb = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb);
        $num_row1 = $statement2->rowCount();
        if ($num_row1 > 0) {
            $_SESSION['err_add_item'] = true;
        } else if ($num_row1 == 0) {
            $query_tb_max = "SELECT max(extra_cod) FROM `tb_local` WHERE `emp_principal` = '$emp_principal'";
            $statement = $conexao->prepare($query_tb_max);

            $statement->execute();
            $result_tb_max = $statement->fetchall(PDO::FETCH_NUM);
            $position = ($result_tb_max[0][0]);
            $insert_in = ($result_tb_max[0][0]) + 1;
            echo '<pre>';
            print_r('normal ' . $position);
            echo '</pre>';
            echo ('++ ' . $insert_in);

        $query_tb_local = "INSERT INTO `tb_local` VALUES ('','$insert_in','$local','$emp_principal')";

        $statement = $conexao->prepare($query_tb_local);

        $statement->execute();
        $_SESSION['add_item'] = true;
    }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_envio_equip']);
    unset($_SESSION['conn_envio_fabricante']);
    unset($_SESSION['conn_envio_tipo']);
    unset($_SESSION['conn_envio_modelo']);
    unset($_SESSION['conn_envio_compra']);
    unset($_SESSION['conn_envio_empresa']);
    unset($_SESSION['conn_envio_local']);
    header("location: ../aplicacao/pag_inicial.php?menu=3");
}
