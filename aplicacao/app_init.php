<?php
session_start();
include 'valida_login.php';

?>
<h1>Seja Bem Vindo, <?php echo $_SESSION['usuario']; ?></h1>
<h2><a href="logout.php">SAIR</a></h2>
