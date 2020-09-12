<?php
session_start();
include 'valida_login.php';
/*
if (isset($_SESSION["sessiontime"])) {
	if ($_SESSION["sessiontime"] < time()) {
		session_unset('sessiontime');
		$_SESSION['no_sessiontime'] = true;
		header('Location: ../sign-in.php');
		exit();
	} else {
		//Seta mais tempo 60 segundos
		$_SESSION["sessiontime"] = time() + 60;
	}
} else {
	session_unset('sessiontime');
	header('Location: ../sign-in.php');
	exit();
}*/
?>

<!DOCTYPE html>
<html>

<head>

	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PATRIMONIX</title>
	<link rel="icon" href="../img/Phoenix-Patrimonial.png">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<!-- Bootstrap core JavaScript -->
	<script src="../js/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">

</head>

<body>

	<div class="d-flex " id="wrapper">

		<!-- Sidebar -->
		<div class="bg-opacidade " id="sidebar-wrapper">
			<div>
				<div class="sidebar-heading color-text">Seja Bem Vindo, <?php echo $_SESSION['usuario']; ?></div>
				<div class="sidebar-heading color-text">Menu</div>
				<div class="list-group list-group-flush color-text-list">
					<?php

					for ($i = 0; $i <= 5; $i++) {
						if ($i == 0) {
							$nome = 'Instruções';
						} elseif ($i == 1) {
							$nome = 'Listar Equipamentos';
						} elseif ($i == 2) {
							$nome = 'Gestao de Periférico';
						} elseif ($i == 3) {
							$nome = 'Cadastro de Itens';
						} elseif ($i == 4) {
							$nome = 'Cadastro de Equipamento';
						} elseif ($i == 5) {
							$nome = 'Gestao de Usuario';
						}
						$menu = $_GET['menu'];
						$menuselect = "";
						if ($i == $menu)
							$menuselect = "active";
					?>
						<input type="hidden" id="nivel_Valor" value="<?php echo $_SESSION['nivel_Permissao']?>">
						<input id="<?php echo ('list'.$i); ?>" type="submit" class="hover_btn <?php echo $menuselect; ?> btn list-group-item list-group-item-action" value="<?php echo ($nome); ?>" style="color:honeydew; border-bottom: 1px solid rgba(255, 255, 255, .5); background-color: #fff0;" onclick="navegar('<?php echo ($i); ?>')"></input>

					<?php  } ?>
					<a href="logout.php" class="list-group-item list-group-item-action">Sair</a>
				</div>
			</div>
		</div>

		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-md navbar-light">
				<button class="navbar-toggler" type="button" id="menu-toggle">
					<span class="navbar-toggler-icon"></span>
				</button>
			</nav>

			<!--HTML-->

			<?php
			if (isset($_GET['menu']) && $_GET['menu'] == 0) { ?>
				<div>
					<?php include '../obj/instrucao-app.php'; ?>
				</div>
			<?php
			} elseif (isset($_GET['menu']) && $_GET['menu'] == 1) { ?>
				<div>
					<?php include '../obj/listar-app.php'; ?>
				</div>
			<?php
			} elseif (isset($_GET['menu']) && $_GET['menu'] == 2) { ?>
				<div>
					<?php include '../obj/gestao-app.php'; ?>
				</div>
			<?php
			} elseif (isset($_GET['menu']) && $_GET['menu'] == 3) { ?>
				<div>
					<?php include '../obj/add-itens.php'; ?>
				</div>
			<?php
			} elseif (isset($_GET['menu']) && $_GET['menu'] == 4) { ?>
				<div>
					<?php include '../obj/add-equip.php'; ?>
				</div>
				<?php
			} elseif (isset($_GET['menu']) && $_GET['menu'] == 5) {

				if (isset($_SESSION['nivel_Permissao'])) {
					$nivel_Permissao = $_SESSION["nivel_Permissao"];
				}
				if ($nivel_Permissao == 1) {
				?>
					<div>
						<?php include '../obj/gestao_users.php'; ?>
					</div>
				<?php } elseif ($nivel_Permissao == 0) { ?>
					<div style="margin: 10% 5%;">
						<p class="display-1">Voce não possui acesso</p>
						<p class="h1">Verifique com o administrador da ferramenta</p>
					</div>
			<?php }
			} ?>

			<!-- FIM HTML -->
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Menu Toggle Script -->
	<script type="text/javascript" src="../js/toggle.js"></script>
	<!-- Fim Menu Toggle Script -->
	<script>
verifica_Valor = document.getElementById("nivel_Valor").value;
if(verifica_Valor == 0){
document.getElementById('5').disabled = true;
}		
		function navegar(local) {
			location.href = ('pag_inicial.php?menu=' + local + '&pagina=0');
			//alert (local);
		}
	</script>
</body>

</html>