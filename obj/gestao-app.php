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


	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">

</head>
<script>
	function extras(cod) {
		$(document).ready(function() {

			$.ajax({
				url: "../conn-db/conn_extra_gestao.php",
				method: "POST",
				data: {
					verifica: 'extra',
					cod: cod
				},
				success: function(data) {
					document.getElementById("result").innerHTML = data;

				}
			});

		});

	}

	function altera(campo_edit) {
		id = document.getElementById('codigo').innerHTML;
		//alert(campo_edit);
		$(document).ready(function() {

			$.ajax({
				url: "../conn-db/conn_extra_gestao.php",
				method: "POST",
				data: {
					verifica: 'altera',
					cod: id,
					campo: campo_edit
				},
				success: function(data) {
					document.getElementById("result1").innerHTML = data;

				}
			});

		});
	}

	function aprova() {

		$(document).ready(function() {
			verifica_Campo_Codigo = document.getElementById("codigo").value;
			verifica_Campo_Tipo = document.getElementById("equipamento").value;
			verifica_Campo_Modelo = document.getElementById("modelo").value;
			verifica_Campo_Fabricante = document.getElementById("fabricante").value;
			verifica_Campo_Serie = document.getElementById("serie").value;
			verifica_Campo_Empresa = document.getElementById("empresa").value;
			verifica_Campo_Local = document.getElementById("local").value;
			verifica_Campo_Fornecedor = document.getElementById("fornecedor").value;
			verifica_Campo_Nota = document.getElementById("nota").value;
			verifica_Campo_Data = document.getElementById("inputData").value;
			verifica_Campo_Situacao = document.getElementById("situacao").value;
			verifica_Campo_Informacao = document.getElementById("informacoes").value;

			//alert(campo_Alterar);
			//alert(verifica_Campo);
			cancela();
			$.ajax({
				url: "../conn-db/conn_user_conf.php",
				method: "POST",
				data: {
					verifica: 'editar_user',
					novo_Nome: verifica_Campo_Nome,
					novo_Sobrenome: verifica_Campo_Sobrenome,
					novo_Email: verifica_Campo_Email,
					novo_Usuario: verifica_Campo_Usuario,
					novo_Senha: verifica_Campo_Senha,
					nome_user: usuario
				},

				success: function(data) {
					//document.getElementById('result1').innerHTML = data;
					//$('#result1').html(data);
					location.reload();
				}
			});
		})

	}

	function cancela() {

		$(document).ready(function() {
			document.getElementById('input_Nome').value = '';
			document.getElementById('input_Sobrenome').value = '';
			document.getElementById('input_Email').value = '';
			document.getElementById('input_Usuario').value = '';
			document.getElementById('input_Senha').value = '';
			$("#hide_Buttons_Div").addClass("hide_Buttons");
		})

	}
	$(document).ready(function() {

		document.addEventListener('keyup', pegaClick);


		function pegaClick() {
			campo_Codigo = document.getElementById("empresa1").value;
			verifica_Campo_Codigo = document.getElementById("extra_cod").value;
			verifica_Campo_Tipo = document.getElementById("equipamento").value;
			verifica_Campo_Modelo = document.getElementById("modelo").value;
			verifica_Campo_Fabricante = document.getElementById("fabricante").value;
			verifica_Campo_Serie = document.getElementById("serie").value;
			verifica_Campo_Empresa = document.getElementById("empresa").value;
			verifica_Campo_Local = document.getElementById("local").value;
			verifica_Campo_Fornecedor = document.getElementById("fornecedor").value;
			verifica_Campo_Nota = document.getElementById("nota").value;
			verifica_Campo_Data = document.getElementById("inputData").value;
			verifica_Campo_Situacao = document.getElementById("situacao").value;
			verifica_Campo_Informacao = document.getElementById("informacoes").value;
			console.log(verifica_Campo_Codigo, verifica_Campo_Tipo, verifica_Campo_Modelo, verifica_Campo_Fabricante, verifica_Campo_Serie, verifica_Campo_Empresa, verifica_Campo_Local, verifica_Campo_Fornecedor, verifica_Campo_Nota, verifica_Campo_Data, verifica_Campo_Situacao, verifica_Campo_Informacao);
			alert(campo_Codigo);
			if ((verifica_Campo_Codigo != '') || (verifica_Campo_Tipo != '') || (verifica_Campo_Modelo != '') || (verifica_Campo_Fabricante != '') || (verifica_Campo_Serie != '')(verifica_Campo_Empresa != '') || (verifica_Campo_Local != '') || (verifica_Campo_Fornecedor != '') || (verifica_Campo_Nota != '') || (verifica_Campo_Data != '')(verifica_Campo_Situacao != '') || (verifica_Campo_Informacao != '')) {
				$("#hide_Buttons_Div").removeClass("hide_Buttons");
			} else if ((verifica_Campo_Codigo == '') || (verifica_Campo_Tipo == '') || (verifica_Campo_Modelo == '') || (verifica_Campo_Fabricante == '') || (verifica_Campo_Serie == '')(verifica_Campo_Empresa == '') || (verifica_Campo_Local == '') || (verifica_Campo_Fornecedor == '') || (verifica_Campo_Nota == '') || (verifica_Campo_Data == '')(verifica_Campo_Situacao == '') || (verifica_Campo_Informacao == '')) {
				$("#hide_Buttons_Div").addClass("hide_Buttons");
			}

			//tecla = String.fromCharCode(event.keyCode);
			//alert('passou');
		}
	});
</script>

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
					<div class="col-sm-6 ">

						<input class="btn btn-lg btn-block" type="submit" value="Gestão de Equipamento">

					</div>
					<div class="col-sm-6 ">

						<input class="btn btn-lg btn-block" type="submit" value="Gestão de Itens">

					</div>


					<div class="col-sm-12 ">

						<!-- Principal -->
						<section>

							<div class="row" id="userscroll" style="overflow: auto; text-align: center">
								<?php include '../conn-db/conn_db.php';
								/*echo '<pre>';
							print_r($result_tb_equipamento);
							echo '</pre>';*/ ?>
								<?php foreach ($result_tb_equipamento as $line) {
									if ($line['nota_fiscal'] == '') {
										$line['nota_fiscal'] = 'Não Informado';
									};
									if ($line['informacoes'] == '') {
										$line['informacoes'] = 'Não Informado';
									};
									if ($line['perifericos'] == '') {
										$line['perifericos'] = 'Nenhum vinculo';
									};
								?>
									<div class="col-md-4 border_smaler" style="text-align: -webkit-center;">
										<div>
											<img src="../img/icons_devices.png" alt="icone">
										</div>
										<div>
											<div class="input-group" style="display: block!important;">
												<div>
													<span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Código</span>

													<span class="form-control" style="color: black!important; height: auto;"><?php echo $line['extra_cod'] ?></span>
												</div>
												<div>
													<span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Tipo</span>

													<span class="form-control" style="color: black!important; height: auto;"><?php echo $line['tipo_equipamento'] ?></span>
												</div>
												<div>
													<span class="input-group-text" style="color: black!important; background-color: #e9ecef !important; border: 1px solid #d4dadf !important;">Modelo</span>

													<span class="form-control" style="color: black!important; height: auto;"><?php echo $line['modelo_equipamento'] ?></span>
												</div>
											</div>
										</div>

										<div style="padding: 10px 0;">
											<img class="usr_btn" src="../img/plus.png" alt="Sinal_Mais" data-toggle="modal" data-target="#exampleModalScrollable" onclick="extras('<?php echo $line['extra_cod'] ?>')">
											<img class="usr_btn" src="../img/trash.png" alt="lixeira">
										</div>
									</div>
								<?php } ?>
							</div>

						</section>
						<!-- Principal -->
						<!-- Modal Principal -->
						<section>

							<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalScrollableTitle">Equipamento</h5>

										</div>
										<div class="modal-body">
											<div id="result"></div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- Fim Modal Principal -->
						<!-- Modal Edicao -->
						<section>

							<div class="modal fade" id="ModalScrollableEditavel" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalScrollableTitle">Equipamento</h5>
											<div id="hide_Buttons_Div" class="hide_Buttons" style="    margin-left: auto; position: absolute; right: 18px; align-self: center;">
												<img class="usr_btn" src="../img/check.png" alt="ok" onclick="aprova()">
												<img class="usr_btn" src="../img/delete.png" alt="cancela" onclick="cancela()">
											</div>
										</div>
										<div class="modal-body">
											<div id="result1"></div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- Fim Modal Edicao -->
					</div>
				</div>
			</div>
			</div>
		</section>
	<?php } ?>
</body>

</html>