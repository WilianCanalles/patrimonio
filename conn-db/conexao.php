<?php
session_start();


if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../sign-in.php');
	exit();
}
print_r($_POST);



function conectar()
{
	/*
	$host = 'localhost';
	$dbname = 'patrimonix';
	$user = 'root';
	$pass = '';
	*/
	///*
	$host = 'localhost';
	$dbname = 'id9571112_patrimonix';
	$user = 'id9571112_admpatrimonix';
	$pass = 'p@tr1m0n1x';
	//*/
	try {

		$conexao = new PDO(
			"mysql:host=$host;dbname=$dbname",
			"$user",
			"$pass"
		);
		
		$query = "select * from tb_user where (email = :email AND senha = md5(:senha)) OR (usuario = :email AND senha = md5(:senha)) ";

		$stmt = $conexao->prepare($query);

		$stmt->bindValue(':email', $_POST['email']);
		$stmt->bindValue(':senha', $_POST['senha']);

		$stmt->execute();

		$user = $stmt->fetch(\PDO::FETCH_ASSOC);
		
		return $user;

	} catch (PDOException $e) {
		echo '<p>' . $e->getMessage() . '</p>';
	}
}

$teste = conectar();
print_r($teste);
if(!empty($teste)) {
	$_SESSION['usuario'] = ucfirst($teste['usuario']);
	header('Location:../aplicacao/app_init.php');
	exit();
} else {
	$_SESSION['login_wrong'] = true;
	header('Location: ../sign-in.php');
	exit();
}