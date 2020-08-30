<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['new_user']) && $_POST['new_user'] == 'novo') {
    $_SESSION['conn_cad_novo'] = true;
} elseif (isset($_POST['new_user']) && $_POST['new_user'] == 'adicao') {
    $_SESSION['conn_cad_adicao'] = true;
}


$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

//print_r($_POST);
if (isset($_SESSION['conn_cad_novo'])) {
    include_once 'conexao.php';
    $empresa = $_POST["empresa"];
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );

        //==========================================================
        $query_tb_subempresa = "SELECT * FROM `tb_empresa` WHERE `empresa` = '$empresa'";

        $statement2 = $conexao->prepare($query_tb_subempresa);

        $statement2->execute();

        $result_tb_subempresa = $statement2->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb_subempresa);
        $num_row1 = $statement2->rowCount();
        echo $num_row1 . '</br>';
        //==========================================================verifica empresa'
        $query_tb_user = "SELECT * FROM `tb_user` WHERE `usuario` = '$usuario' OR `email` = '$email'";

        $statement = $conexao->prepare($query_tb_user);

        $statement->execute();

        $result_tb_user = $statement->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb_user);
        $num_row = $statement->rowCount();
        echo $num_row;

        if ($num_row1 > 0) {
            $_SESSION['company_has_account'] = true;
            header('Location: ../sign-up.php');
            exit();
        } elseif ($num_row > 0) {
            $_SESSION['have_user'] = true;
            header('Location: ../sign-up.php');
            exit();
        } elseif ($num_row == 0 && $num_row1 == 0) {

            //==========================================================
            $query_tb_empresa = "INSERT INTO `tb_empresa`VALUES ('','$empresa')";

            $statement = $conexao->prepare($query_tb_empresa);

            $statement->execute();
            //==========================================================
            $query_tb_User1 = "SELECT * FROM `tb_empresa` WHERE `empresa` = '$empresa'";

            $statement1 = $conexao->prepare($query_tb_User1);

            $statement1->execute();
            $result_tb_empresa1 = $statement1->fetchall(PDO::FETCH_NUM);
            print_r($result_tb_empresa1[0][0]);
            $emp_main = $result_tb_empresa1[0][0];

            $query_tb_empresa = "INSERT INTO `tb_user`VALUES ('','$nome','$sobrenome','$email','$usuario',md5('$senha'),'$emp_main')";

            $statement = $conexao->prepare($query_tb_empresa);

            $statement->execute();
            header('Location: ../sign-in.php');
        }
        //==========================================================
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_cad_adicao']);
    unset($_SESSION['conn_cad_novo']);
} elseif (isset($_SESSION['conn_cad_adicao'])) {
    include_once 'conexao.php';
    $empresa_add = $_SESSION["emp_principal"];
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );

        //==========================================================

        //==========================================================verifica empresa'
        $query_tb_user = "SELECT * FROM `tb_user` WHERE `usuario` = '$usuario' OR `email` = '$email'";

        $statement = $conexao->prepare($query_tb_user);

        $statement->execute();

        $result_tb_user = $statement->fetchall(PDO::FETCH_ASSOC);
        print_r($result_tb_user);
        $num_row = $statement->rowCount();
        echo $num_row;

        if ($num_row > 0) {
            $_SESSION['have_user'] = true;
            header('Location: ../aplicacao/pag_inicial.php?menu=5&pagina=0');
        } elseif ($num_row == 0) {

            $query_tb_empresa = "INSERT INTO `tb_user`VALUES ('','$nome','$sobrenome','$email','$usuario',md5('$senha'),0,'$empresa_add')";

            $statement = $conexao->prepare($query_tb_empresa);

            $statement->execute();
            /*Verifica usuario foi criado */
            $query_tb_user = "SELECT * FROM `tb_user` WHERE `usuario` = '$usuario' OR `email` = '$email'";

            $statement = $conexao->prepare($query_tb_user);

            $statement->execute();

            $result_tb_user = $statement->fetchall(PDO::FETCH_ASSOC);
            print_r($result_tb_user);
            $num_row1 = $statement->rowCount();
            echo $num_row1;
            /* Fim Verifica usuario foi criado */

            if ($num_row1 > 0) {
                $_SESSION['add_user'] = true;
            } elseif ($num_row1 == 0) {
                $_SESSION['err_add_user'] = true;
            }
            header('Location: ../aplicacao/pag_inicial.php?menu=5&pagina=0');
        }
        //==========================================================
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_cad_adicao']);
    unset($_SESSION['conn_cad_novo']);
}
