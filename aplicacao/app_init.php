<?php
session_start();
include 'valida_login.php';

if ( isset( $_SESSION["sessiontime"] ) ) { 
	if ($_SESSION["sessiontime"] < time() ) { 
        session_unset('sessiontime');
        $_SESSION['no_sessiontime'] = true;
        header('Location: ../sign-in.php');
	exit();
	} else {
		echo 'Logado ainda!';
		//Seta mais tempo 60 segundos
		$_SESSION["sessiontime"] = time() + 60;
	}
} else { 
	session_unset('sessiontime');
	header('Location: ../sign-in.php');
	exit();
}
?>
<h1>Seja Bem Vindo, <?php echo $_SESSION['usuario']; ?></h1>
<h2><a href="logout.php">SAIR</a></h2>
