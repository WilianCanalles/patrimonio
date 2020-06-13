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

            $query_tb_equipamento = "INSERT INTO `tb_equipamento` (`codigo`, `tipo_equipamento`, `modelo_equipamento`, `local`, `fabricante`, `num_serie`, `empresa`, `fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `emp_Principal`) VALUES ('','$equipamento','$modelo','$local','$fabricante','$serie', '$empresa','$fornecedor','$nota_fiscal','$data','$situacao','$info','$emp_principal')";

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

        $query_tb_empresa = "INSERT INTO `tb_subempresa`VALUES ('','$empresa','$emp_principal')";

        $statement = $conexao->prepare($query_tb_empresa);

        $statement->execute();
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

        $query_tb_fornecedor = "INSERT INTO `tb_fornecedor`VALUES ('','$fornecedor','$emp_principal')";

        $statement = $conexao->prepare($query_tb_fornecedor);

        $statement->execute();
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

        $query_tb_modelo = "INSERT INTO `tb_modelo_equipamento`VALUES ('','$modelo','$emp_principal')";

        $statement = $conexao->prepare($query_tb_modelo);

        $statement->execute();
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

        $query_tb_tipo = "INSERT INTO `tb_tipo_equipamento`VALUES ('','$tipo','$emp_principal')";

        $statement = $conexao->prepare($query_tb_tipo);

        $statement->execute();
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

        $query_tb_fabricante = "INSERT INTO `tb_fabricante` VALUES ('','$fabricante','$emp_principal')";

        $statement = $conexao->prepare($query_tb_fabricante);

        $statement->execute();
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

        $query_tb_local = "INSERT INTO `tb_local` VALUES ('','$local','$emp_principal')";

        $statement = $conexao->prepare($query_tb_local);

        $statement->execute();
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
