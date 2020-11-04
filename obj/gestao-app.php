<!DOCTYPE html>
<html lang="pt-br">

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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Modal features -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">

</head>

<style>
	::-webkit-scrollbar {
		width: 0px;
	}

	::-webkit-scrollbar-thumb {
		background: #25252538;
	}
</style>

<body>
	<?php include '../conn-db/conn_pages.php'; ?>
	<?php if ($num_paginas == 0) { ?>

		<div class="container">
			<div style="margin: 10% 5%;">
				<p class="display-1">Inventário Vazio</p>
				<p class="h1">Volte após realizar o primeiro cadastro</p>
			</div>
		</div>
	<?php  } else if ($num_paginas > 0) { ?>
		<section>
		</section>
		<section>
			<div class="container">
				<div class="row">
				<?php include 'alert.php'; ?>
					<div class="col-sm-4 ">

						<input class="btn btn-lg btn_gestao btn-block" type="submit" value="Equipamento" onclick="navegar_Equip('0')">

					</div>
					<div class="col-sm-4 ">

						<input class="btn btn-lg btn_gestao btn-block" type="submit" value="Itens" onclick="navegar_Equip('1')">

					</div>
					<div class="col-sm-4 ">

						<input class="btn btn-lg btn_gestao btn-block" type="submit" value="Perifericos" onclick="navegar_Equip('2')">

					</div>


					<div class="col-sm-12 ">

						<?php
						include 'modal_gestao.php';
						?>

					</div>
				</div>
			</div>
			</div>
		</section>
	<?php }
	if (!isset($_GET['teste'])) { ?>
		<script>
			var url_atual = window.location.href;
			location.href = (url_atual + '&' + 'teste=' + '0');
		</script>

	<?php }
	if ($_GET['teste'] == 0) {
		include 'gestao-app-equip.php';
	} elseif ($_GET['teste'] == 1) {
		include 'gestao-app-itens.php';
	} elseif ($_GET['teste'] == 2) {
		include 'gestao-app-periferico.php';
	}
	?>
	<script>
		function busca() {
			haha = $("#teste").val();
			str = haha.replace(/\s/g, '');
			console.log((str).length);
			document.getElementById('teste').value = str;

			//console.log(str.mask("00/00/0000"));
		}

		function navegar_Equip(pag) {

			var url_atual = window.location.href;
			//alert(url_atual);
			location.href = ('pag_inicial.php?menu=2&pagina=0' + '&' + 'teste=' + pag);
		}
	</script>
</body>

</html>