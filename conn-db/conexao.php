<?php
session_start();

print_r($_POST);



function conectar()
{
	$host = 'localhost';
	$dbname = 'patrimonix';
	$user = 'root';
	$pass = '';
	try {

		$conexao = new PDO(
			"mysql:host=$host;dbname=$dbname",
			"$user",
			"$pass"
		);
		
		$query = "select * from tb_user where (email = :email and senha = :senha) or (usuario = :email and senha = :senha) ";

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

print_r( conectar());
