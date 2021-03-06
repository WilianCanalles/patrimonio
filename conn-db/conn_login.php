<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: ../sign-in.php');
    unset($_SESSION['conn_login']);
    exit();
}



function conectar()
{
    include_once 'conexao.php';
    try {

        $conexao = new PDO(
            "mysql:host=$host; dbname=$dbname",
            "$user",
            "$pass"
        );

        $query = "select email, usuario, b.`codigo`, b.`empresa`, nivel_User from `tb_user` INNER JOIN `tb_empresa` AS b ON `tb_user`.`emp_Principal` = b.`codigo` where (email = :email AND senha = md5(:senha)) OR (usuario = :email AND senha = md5(:senha))";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':senha', $_POST['senha']);

        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        print_r($stmt);
        return $user;
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }
}
$usuario = conectar();
echo '<pre>';
print_r($usuario);
echo '</pre>';
$_SESSION['usuario'] = ucfirst($usuario['usuario']);
$_SESSION['empresa'] = $usuario['empresa'];
$_SESSION['emp_principal'] = $usuario['codigo'];
$_SESSION['nivel_Permissao'] = $usuario['nivel_User'];
header('Location:../aplicacao/pag_inicial.php?menu=0');
exit();
/*--if (!empty($teste)) {
    $_SESSION["sessiontime"] = time() + 60;/* 900s = 15m */
/*--    $_SESSION['usuario'] = ucfirst($teste['usuario']);
    header('Location:../aplicacao/pag_inicial.php?menu=0');
    exit();
} else {
    $_SESSION['login_wrong'] = true;
    header('Location: ../sign-in.php');
    exit();
}--*/
