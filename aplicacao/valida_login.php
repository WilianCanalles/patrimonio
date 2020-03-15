<?php

if(!$_SESSION['usuario']) {
	header('Location: ../sign-in.php');
	exit();
}


?>