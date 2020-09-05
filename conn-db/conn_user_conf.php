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
    echo 'excluir';
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
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Nome
                                        <div id="hide_Buttons_Nome" class="hide_Buttons" style="margin-left: auto;">
                                            <img class="usr_btn" src="../img/check.png" alt="ok" onclick="aprova('input_Nome', 'hide_Buttons_Nome', 'nome')">
                                            <img class="usr_btn" src="../img/delete.png" alt="cancela" onclick="cancela('input_Nome', 'hide_Buttons_Nome')">
                                        </div>
                                    </span>
                                    <input id="input_Nome" class="form-control" style="color: black!important;" placeholder="<?php echo $line[1] ?>"></input>
                                </div>
                                <!-- FIM Nome -->
                                <!-- Sobrenome -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Sobrenome
                                        <div id="hide_Buttons_Sobrenome" class="hide_Buttons" style="margin-left: auto;">
                                            <img class="usr_btn" src="../img/check.png" alt="ok" onclick="aprova('input_Sobrenome', 'hide_Buttons_Sobrenome', 'sobrenome')">
                                            <img class="usr_btn" src="../img/delete.png" alt="cancela" onclick="cancela('input_Sobrenome', 'hide_Buttons_Sobrenome')">
                                        </div>
                                    </span>

                                    <input id="input_Sobrenome" class="form-control" style="color: black!important;" placeholder="<?php echo $line[2] ?>"></input>
                                </div>
                                <!-- FIM Sobrenome -->
                                <!-- Email -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Email
                                        <div id="hide_Buttons_Email" class="hide_Buttons" style="margin-left: auto;">
                                            <img class="usr_btn" src="../img/check.png" alt="ok" onclick="aprova('input_Email', 'hide_Buttons_Email', 'email')">
                                            <img class="usr_btn" src="../img/delete.png" alt="cancela" onclick="cancela('input_Email', 'hide_Buttons_Email')">
                                        </div>
                                    </span>

                                    <input id="input_Email" class="form-control" style="color: black!important;" placeholder="<?php echo $line[3] ?>"></input>
                                </div>
                                <!-- FIM Email -->
                                <!-- Usuario -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Usuario
                                        <div id="hide_Buttons_Usuario" class="hide_Buttons" style="margin-left: auto;">
                                            <img class="usr_btn" src="../img/check.png" alt="ok" onclick="aprova('input_Usuario', 'hide_Buttons_Usuario', 'usuario')">
                                            <img class="usr_btn" src="../img/delete.png" alt="cancela" onclick="cancela('input_Usuario', 'hide_Buttons_Usuario')">
                                        </div>
                                    </span>

                                    <input id="input_Usuario" class="form-control" style="color: black!important;" placeholder="<?php echo $line[4] ?>"></input>
                                </div>
                                <!-- FIM Usuario -->
                                <!-- Senha -->
                                <div>
                                    <span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Senha
                                        <div id="hide_Buttons_Senha" class="hide_Buttons" style="margin-left: auto;">
                                            <img class="usr_btn" src="../img/check.png" alt="ok" onclick="aprova('input_Senha', 'hide_Buttons_Senha', 'senha')">
                                            <img class="usr_btn" src="../img/delete.png" alt="cancela" onclick="cancela('input_Senha', 'hide_Buttons_Senha')">
                                        </div>
                                    </span>

                                    <input id="input_Senha" class="form-control" style="color: black!important;" placeholder="Senha"></input>
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
    $novo_valor = $_POST['novo_Valor'];
    $nome_Campo = $_POST['nome_Campo'];
    $nome_user = $_POST['nome_user'];
    include_once 'conexao.php';
    try {
        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );

        if ($nome_Campo == 'senha') {
            $query_tb_local = "UPDATE `tb_user` SET `senha` = md5('$novo_valor') WHERE `usuario`= '$nome_user'";

            $statement = $conexao->prepare($query_tb_local);
    
            $statement->execute();
            $_SESSION['sucesso_alteracao'] = true;
        } elseif ($nome_Campo == 'email') {
            $query_tb_usr_nivel = "SELECT * FROM `tb_user` WHERE `email`= '$novo_valor'";

            $statement = $conexao->prepare($query_tb_usr_nivel);

            $statement->execute();

            $result_tb_usr_nivel = $statement->fetchall(PDO::FETCH_NUM);
            $usr_nivel_cont = $statement->rowCount();
        } elseif ($nome_Campo == 'usuario') {
            $query_tb_usr_nivel = "SELECT * FROM `tb_user` WHERE `usuario`= '$novo_valor'";

            $statement = $conexao->prepare($query_tb_usr_nivel);

            $statement->execute();

            $result_tb_usr_nivel = $statement->fetchall(PDO::FETCH_NUM);
            $usr_nivel_cont = $statement->rowCount();
        }
        if($usr_nivel_cont > 0){
            $_SESSION['erro_alteracao'] = true;
        }elseif($usr_nivel_cont == 0 && $nome_Campo != 'senha'){
            $query_tb_local = "UPDATE `tb_user` SET `$nome_Campo` = '$novo_valor' WHERE `usuario`= '$nome_user'";

            $statement = $conexao->prepare($query_tb_local);
    
            $statement->execute();
            $_SESSION['sucesso_alteracao'] = true;
        }
echo $usr_nivel_cont;
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
    unset($_SESSION['conn_excluir_user']);
    unset($_SESSION['conn_editar_user']);
    unset($_SESSION['conn_nivel_user']);
    unset($_SESSION['conn_edit_value']);
}
