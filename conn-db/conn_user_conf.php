<?php
session_start();
//print_r($_POST);

if (isset($_POST['verifica']) && $_POST['verifica'] == 'excluir') {
    $_SESSION['conn_excluir_user'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'editar') {
    $_SESSION['conn_editar_user'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'nivel') {
    $_SESSION['conn_nivel_user'] = true;
}

if (isset($_SESSION['conn_excluir_user'])) {
    echo 'excluir';
    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
} elseif (isset($_SESSION['conn_editar_user'])) {
    echo 'idit';
    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
} elseif (isset($_SESSION['conn_nivel_user'])) {
    $usuario = $_POST['user'];
    echo $usuario;
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );

        $query_tb_empresa = "SELECT * FROM `tb_user` WHERE `usuario`= '$usuario'";

        $statement = $conexao->prepare($query_tb_empresa);
    
        $statement->execute();
    
        $result_tb_empresa = $statement->fetchall(PDO::FETCH_NUM);

        if(($result_tb_empresa[0][6])=='0'){
echo 'passou';
            $query_tb_local = "UPDATE `tb_user` SET `nivel_User` = '1' WHERE `usuario`= '$usuario'";

            $statement = $conexao->prepare($query_tb_local);
    
            $statement->execute();

        }elseif(($result_tb_empresa[0][6])=='1'){

            echo 'passou';
            $query_tb_local = "UPDATE `tb_user` SET `nivel_User` = '0' WHERE `usuario`= '$usuario'";

            $statement = $conexao->prepare($query_tb_local);
    
            $statement->execute();

        }
 /*       echo "<pre>";
    print_r($result_tb_empresa[0][6]);
    echo "</pre>";*/

    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }

    echo 'nivel';
    
    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
}
