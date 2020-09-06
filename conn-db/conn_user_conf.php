<?php
session_start();
//print_r($_POST);
$emp_principal = $_SESSION['emp_principal'];

if (isset($_POST['verifica']) && $_POST['verifica'] == 'excluir') {
    $_SESSION['conn_excluir_user'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'editar') {
    $_SESSION['conn_editar_user'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'nivel') {
    $_SESSION['conn_nivel_user'] = true;
} elseif (isset($_POST['verifica']) && $_POST['verifica'] == 'editar_user') {
    $_SESSION['conn_edit_value'] = true;
}

if (isset($_SESSION['conn_excluir_user'])) {
    //echo 'excluir';

    $usuario = $_POST['user'];
    // echo $usuario;
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $query_tb_usr_nivel = "SELECT * FROM `tb_user` WHERE `nivel_User` = '1' AND `emp_Principal` = '$emp_principal'";

        $statement = $conexao->prepare($query_tb_usr_nivel);

        $statement->execute();

        $result_tb_usr_nivel = $statement->fetchall(PDO::FETCH_NUM);
        $usr_nivel_cont = $statement->rowCount();

        if ($usr_nivel_cont > 1 || $result_tb_usr_nivel[0][4] != $usuario) {

            $query_tb_user = "DELETE FROM `tb_user` WHERE `usuario`= '$usuario'";

            $statement = $conexao->prepare($query_tb_user);

            $statement->execute();

            $result_tb_user = $statement->fetchall(PDO::FETCH_NUM);
            $_SESSION['exclusao_user'] = true;
        } else if ($usr_nivel_cont == 1) {
            $_SESSION['master_Unico'] = true;
        }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }

    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
    unset($_SESSION['conn_edit_value']);
} elseif (isset($_SESSION['conn_editar_user'])) {
    $usuario = $_POST['user'];
    // echo $usuario;
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

        /* echo "<pre>";
     print_r($result_tb_empresa[0]);
     echo "</pre>";*/
    ?>
        <div class="modal-body container">
            <div class="row" id="userscroll" style="overflow: auto; text-align: center; justify-content: center;">

                <?php foreach ($result_tb_empresa as $line) {
                    if ($line[6] == 0) {
                        $nivel = "Operador";
                    } elseif ($line[6] == 1) {
                        $nivel = "Master";
                    } ?>
                    <div class="col-sm-10" style="text-align: -webkit-center;">
                        <div>
                            <img src="../img/ico_user2.png" alt="icone">
                        </div>
                        <div>
                            <div class="input-group" style="display: block!important;">
                                <!-- Nome -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Nome</span>
                                    <input id="input_Nome" class="form-control" style="color: black!important;" placeholder="<?php echo $line[1] ?>"></input>
                                </div>
                                <!-- FIM Nome -->
                                <!-- Sobrenome -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Sobrenome</span>

                                    <input id="input_Sobrenome" class="form-control" style="color: black!important;" placeholder="<?php echo $line[2] ?>"></input>
                                </div>
                                <!-- FIM Sobrenome -->
                                <!-- Email -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Email</span>

                                    <input id="input_Email" class="form-control" style="color: black!important;" placeholder="<?php echo $line[3] ?>"></input>
                                </div>
                                <!-- FIM Email -->
                                <!-- Usuario -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Usuario</span>

                                    <input id="input_Usuario" class="form-control" style="color: black!important;" placeholder="<?php echo $line[4] ?>"></input>
                                </div>
                                <!-- FIM Usuario -->
                                <!-- Senha -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Senha</span>

                                    <input id="input_Senha" 
                                    class="form-control" style="color: black!important; -webkit-text-security: disc;" placeholder="Senha"></input>
                                </div>
                                <!-- FIM Senha -->
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    <?php
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }

    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
    unset($_SESSION['conn_edit_value']);
} elseif (isset($_SESSION['conn_nivel_user'])) {
    $usuario = $_POST['user'];
    // echo $usuario;
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );
        $query_tb_usr_nivel = "SELECT * FROM `tb_user` WHERE `nivel_User` = '1' AND `emp_Principal` = '$emp_principal'";

        $statement = $conexao->prepare($query_tb_usr_nivel);

        $statement->execute();

        $result_tb_usr_nivel = $statement->fetchall(PDO::FETCH_NUM);
        $usr_nivel_cont = $statement->rowCount();

        if ($usr_nivel_cont > 1 || $result_tb_usr_nivel[0][4] != $usuario) {
            $query_tb_user = "SELECT * FROM `tb_user` WHERE `usuario`= '$usuario'";

            $statement = $conexao->prepare($query_tb_user);

            $statement->execute();

            $result_tb_user = $statement->fetchall(PDO::FETCH_NUM);

            if (($result_tb_user[0][6]) == '0') {
                $query_tb_local = "UPDATE `tb_user` SET `nivel_User` = '1' WHERE `usuario`= '$usuario'";

                $statement = $conexao->prepare($query_tb_local);

                $statement->execute();
            } elseif (($result_tb_user[0][6]) == '1') {
                $query_tb_local = "UPDATE `tb_user` SET `nivel_User` = '0' WHERE `usuario`= '$usuario'";

                $statement = $conexao->prepare($query_tb_local);

                $statement->execute();
            }

            //  echo 'nivel';
            $_SESSION['nivel_usr'] = true;
        } else if ($usr_nivel_cont == 1) {
            $_SESSION['master_Unico'] = true;
        }
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }

    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
    unset($_SESSION['conn_edit_value']);
} elseif (isset($_SESSION['conn_edit_value'])) {

    $novo_Nome = $_POST['novo_Nome'];
    $novo_Sobrenome = $_POST['novo_Sobrenome'];
    $email = $_POST['novo_Email'];
    $novo_Usuario = $_POST['novo_Usuario'];
    $novo_Senha = $_POST['novo_Senha'];
    $nome_user = $_POST['nome_user'];
    // Remove os caracteres ilegais, caso tenha
    $novo_Email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Valida o e-mail
    if (filter_var($novo_Email, FILTER_VALIDATE_EMAIL) || $novo_Email=='') {
        include_once 'conexao.php';
        try {
            $conexao = new PDO(
                "mysql:host=$host; dbname=$dbname",
                "$user",
                "$pass"
            );

            if ($novo_Email != '' || $novo_Usuario != '') {
                
                $query_tb_usr_nivel = "SELECT * FROM `tb_user` WHERE `usuario`= '$novo_Usuario' OR `email`= '$novo_Email'";

                $statement = $conexao->prepare($query_tb_usr_nivel);

                $statement->execute();

                $result_tb_usr_nivel = $statement->fetchall(PDO::FETCH_NUM);
                $usr_nivel_cont = $statement->rowCount();
            } elseif ($novo_Email == '' || $novo_Usuario == '') {
                $usr_nivel_cont = 0;
            }
            if ($usr_nivel_cont > 0) {
                $_SESSION['erro_alteracao'] = true;
            } elseif ($usr_nivel_cont == 0) {
                if ($novo_Nome != '') {
                    $query_tb_local = "UPDATE `tb_user` SET `nome` = '$novo_Nome' WHERE `usuario`= '$nome_user'";

                    $statement = $conexao->prepare($query_tb_local);

                    $statement->execute();
                    $_SESSION['sucesso_alteracao'] = true;
                }
                if ($novo_Sobrenome != '') {
                    $query_tb_local = "UPDATE `tb_user` SET `sobrenome` = '$novo_Sobrenome' WHERE `usuario`= '$nome_user'";

                    $statement = $conexao->prepare($query_tb_local);

                    $statement->execute();
                    $_SESSION['sucesso_alteracao'] = true;
                }
                if ($novo_Email != '') {
                    $query_tb_local = "UPDATE `tb_user` SET `email` = '$novo_Email' WHERE `usuario`= '$nome_user'";

                    $statement = $conexao->prepare($query_tb_local);

                    $statement->execute();
                    $_SESSION['sucesso_alteracao'] = true;
                }
                if ($novo_Usuario != '') {
                    $query_tb_local = "UPDATE `tb_user` SET `usuario` = '$novo_Usuario' WHERE `usuario`= '$nome_user'";

                    $statement = $conexao->prepare($query_tb_local);

                    $statement->execute();
                    $_SESSION['sucesso_alteracao'] = true;
                }
                if ($novo_Senha != '') {
                    $query_tb_local = "UPDATE `tb_user` SET `senha` = md5('$novo_Senha') WHERE `usuario`= '$nome_user'";

                    $statement = $conexao->prepare($query_tb_local);

                    $statement->execute();
                    $_SESSION['sucesso_alteracao'] = true;
                }
            }
        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
        unset($_SESSION['conn_excluir_user']);
        unset($_SESSION['conn_editar_user']);
        unset($_SESSION['conn_nivel_user']);
        unset($_SESSION['conn_edit_value']);
    } else {
        $_SESSION['err_email'] = true;
    }
}
