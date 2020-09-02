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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/jquery.mask.min.js"></script>

	<script type="text/javascript" src="../js/jquery-3.5.0.js"></script>
	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../js/js_cadastro.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>

<body>
	<section>
		<form method="post" action="../conn-db/conn_gravar_db.php" class="">
			<div class="container">
				<div class="row" style="justify-content: center">
					<div class="col-md-8 ">
						<!--ocultar linha-->
						<div class="row">
							<div class="col-md-8 form-group">
								<?php include '../conn-db/conn_db.php'; ?>
								<!-- Label -->
								<label for="inputEmail">Cadastro de Empresa</label>
								<!-- Fim Label -->
								<!-- Input -->
								<input type="hidden" name="tabela" value="empresa">
								<input name="cad_empresa" class="form-control" name="cad_empresa" type="text" id="inputEmpresa" placeholder="Nome da Empresa" required>
								<!-- Fim Input -->
							</div>
							<div class="col-md-4 form-group align-self-end">
								<!-- Botao -->
								<input class="btn" type="submit" value="Cadastrar Empresa"></input>
								<!-- Fim Botao -->

							</div>

						</div>
					</div>


				</div>

			</div>

		</form>


	</section>
	<section>
		<form method="post" action="../conn-db/conn_gravar_db.php" class="">
			<div class="container">
				<div class="row" style="justify-content: center">
					<div class="col-md-8 ">
						<!--ocultar linha-->
						<div class="row">
							<div class="col-md-8 form-group">
								<?php include '../conn-db/conn_db.php'; ?>

								<!-- Label -->
								<label for="inputEmail">Cadastro de Fabricante</label>
								<!-- Fim Label -->
								<!-- Input -->
								<input type="hidden" name="tabela" value="fabricante">
								<input name="cad_fabricante" class="form-control" name="cad_fabricante" type="text" id="inputFabricante" placeholder="Fabricante" required>
								<!-- Fim Input -->
							</div>
							<div class="col-md-4 form-group align-self-end">
								<!-- Botao -->
								<input class="btn " type="submit" value="Cadastrar Fabricante"></input>
								<!-- Fim Botao -->

							</div>

						</div>
					</div>


				</div>

			</div>

		</form>


	</section>
	<section>
		<form method="post" action="../conn-db/conn_gravar_db.php" class="">
			<div class="container">
				<div class="row" style="justify-content: center">
					<div class="col-md-8 ">
						<!--ocultar linha-->
						<div class="row">
							<div class="col-md-8 form-group">
								<?php include '../conn-db/conn_db.php'; ?>

								<!-- Label -->
								<label for="inputEmail">Cadastro de Fornecedor</label>
								<!-- Fim Label -->
								<!-- Input -->
								<input type="hidden" name="tabela" value="compra">
								<input name="cad_fornecedor" class="form-control" name="cad_fornecedor" type="text" id="inputFornecedor" placeholder="Local de Fornecedor" required>
								<!-- Fim Input -->
							</div>
							<div class="col-md-4 form-group align-self-end">
								<!-- Botao -->
								<input class="btn " type="submit" value="Cadastrar Fornecedor"></input>
								<!-- Fim Botao -->

							</div>

						</div>
					</div>


				</div>

			</div>

		</form>


	</section>
	<section>
		<form method="post" action="../conn-db/conn_gravar_db.php" class="">
			<div class="container">
				<div class="row" style="justify-content: center">
					<div class="col-md-8 ">
						<!--ocultar linha-->
						<div class="row">
							<div class="col-md-8 form-group">
								<?php include '../conn-db/conn_db.php'; ?>

								<!-- Label -->
								<label for="inputEmail">Cadastro de Local</label>
								<!-- Fim Label -->
								<!-- Input -->
								<input type="hidden" name="tabela" value="local">
								<input name="cad_local" class="form-control" name="cad_local" type="text" id="inputLocal" placeholder="Cadastro de Local" required>
								<!-- Fim Input -->
							</div>
							<div class="col-md-4 form-group align-self-end">
								<!-- Botao -->
								<input class="btn " type="submit" value="Cadastrar Local"></input>
								<!-- Fim Botao -->

							</div>

						</div>
					</div>


				</div>

			</div>

		</form>


	</section>
	<section>
		<form method="post" action="../conn-db/conn_gravar_db.php" class="">
			<div class="container">
				<div class="row" style="justify-content: center">
					<div class="col-md-8 ">
						<!--ocultar linha-->
						<div class="row">
							<div class="col-md-8 form-group">
								<?php include '../conn-db/conn_db.php'; ?>

								<!-- Label -->
								<label for="inputEmail">Cadastro de Modelo de Equipamento</label>
								<!-- Fim Label -->
								<!-- Input -->
								<input type="hidden" name="tabela" value="modelo">
								<input name="cad_modelo" class="form-control" name="cad_modelo" type="text" id="inputModelo" placeholder="Modelo Equip." required>
								<!-- Fim Input -->
							</div>
							<div class="col-md-4 form-group align-self-end">
								<!-- Botao -->
								<input class="btn " type="submit" value="Cadastrar Modelo Equip."></input>
								<!-- Fim Botao -->

							</div>

						</div>
					</div>


				</div>

			</div>

		</form>


	</section>
	<section>
		<form method="post" action="../conn-db/conn_gravar_db.php" class="">
			<div class="container">
				<div class="row" style="justify-content: center">
					<div class="col-md-8 ">
						<!--ocultar linha-->
						<div class="row">
							<div class="col-md-8 form-group">
								<?php include '../conn-db/conn_db.php'; ?>

								<!-- Label -->
								<label for="inputEmail">Cadastro de Tipo Equipamento</label>
								<!-- Fim Label -->
								<!-- Input -->
								<input type="hidden" name="tabela" value="tipo">
								<input name="cad_tipo" class="form-control" name="cad_tipo" type="text" id="inputTipo" placeholder="Tipo do Equip." required>
								<!-- Fim Input -->
							</div>
							<div class="col-md-4 form-group align-self-end">
								<!-- Botao -->
								<input class="btn " type="submit" value="Cadastrar Tipo do Equip."></input>
								<!-- Fim Botao -->

							</div>

						</div>
					</div>


				</div>

			</div>

		</form>


	</section>
	<section>
		<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalScrollableTitle">Lista de Dispositivos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span style="color: #6c757d !important" aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<div id="dados"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" id="fabricante" onclick="buscar('fabricante')">Fabricante</button>
						<button class="btn btn-secondary" id="fornecedor" onclick="buscar('fornecedor')">Fornecedor</button>
						<button class="btn btn-secondary" id="local" onclick="buscar('local')">Local</button>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" id="empresa" onclick="buscar('empresa')">Empresa</button>
						<button class="btn btn-secondary" id="modelo" onclick="buscar('modelo')">Modelo</button>
						<button class="btn btn-secondary" id="tipo" onclick="buscar('tipo')">Tipo</button>
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>

		<div style="text-align: center;">
			<p class="display-4" style="margin-top: 20px">Lista de Itens Cadastrados</p>

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" style="margin-bottom: 20px" onclick="buscar('primeiro')">
				Abrir Lista
			</button>
		</div>
	</section>
</body>

</html>

<script>
	function buscar(tabela_pesq) {
		//alert(palavra);
		//O método $.ajax(); é o responsável pela requisição
		$.ajax({
			//Configurações
			type: 'POST', //Método que está sendo utilizado.
			dataType: 'html', //É o tipo de dado que a página vai retornar.
			url: '../obj/modal-itens.php', //Indica a página que está sendo solicitada.
			//função que vai ser executada assim que a requisição for enviada
			beforeSend: function() {
				$("#dados").html("Carregando...");
			},
			data: {
				tabela: tabela_pesq
			}, //Dados para consulta
			//função que será executada quando a solicitação for finalizada.
			success: function(msg) {
				$("#dados").html(msg);
			}
		});
	}
</script>