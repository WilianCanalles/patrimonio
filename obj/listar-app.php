<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Nosso Patrimonio</title>
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
	<script>
		function marcar() {

			var perifericos = periferico_S.value;
			var n = perifericos.length;
			if (n == 0) { //valida se o campo data esta vazio caso esteja o campo é preenchido com a data atual do servidor
				alert('Insira um valor valido');
				/*document.getElementById('inputData').value = date;
				return true;*/
			} else {
				alert(perifericos);
				var teste = 'terfsd';
				return;
				//perif_value.push(perifericos);
			}

		}
		$(document).ready(function() {
			
			$("#check_disable").click(function() {
				if ($(this).is(":checked")) {
					$('#tex_div').hide();
					$("#periferico_S").attr("readonly", true); //Desabilitar campo 

				} else {
					$('#tex_div').show();
					$("#periferico_S").attr("readonly", false); //habilitar campo 
				}
			})

		})
	</script>

</head>

<body>
	<section>
		<form method="post" action="" name="form12" class="">
			<div class="container">
				<div class="row">
					<div class="col-md-6 ">
						<!--ocultar linha-->

						<div class="form-group">
							<!-- Label -->
							<label for="inputEmail">Equipamento</label>
							<!-- Fim label-->
							<!-- Select-->
							<select name="equipamento" class="form-control" id="equipamento">
								<option>Teste</option>
							</select>
							<!-- Fim Select-->
							<!-- Label -->
							<label for="inputEmail">Modelo</label>
							<!-- Fim label-->
							<!-- Select-->
							<select name="modelo" class="form-control" id="modelo">
								<option>Teste</option>
							</select>
							<!-- Fim Select-->
							<!-- Label -->
							<label for="inputEmail">Fabricante</label>
							<!-- Fim label-->
							<!-- Select-->
							<select name="fabricante" class="form-control" id="fabricante">
								<option>Teste</option>
							</select>
							<!-- Fim Select-->
							<!-- Label -->
							<label for="inputEmail">N° de Série</label>
							<!-- Fim Label -->
							<!-- Input -->
							<input name="serie" class="form-control" name="serie" type="text" id="inputSerie" placeholder="Série do Produto" required>
							<!-- Fim Input -->
							<!-- Label -->
							<label for="inputEmail">Empresa</label>
							<!-- Fim label-->
							<!-- Select-->
							<select name="empresa" class="form-control" id="empresa">
								<option>Teste</option>
							</select>
							<!-- Fim Select-->
							<!-- Label -->
							<label for="inputEmail">Local de Aquisição</label>
							<!-- Fim label-->
							<!-- Select-->
							<select name="aquisicao" class="form-control" id="aquisição">
								<option>Teste</option>
							</select>
							<!-- Fim Select-->
							<!-- Label -->
							<label for="inputEmail">Nota Fiscal</label>
							<!-- Fim Label -->
							<!-- Input -->
							<input class="form-control" name="nota-fiscal" type="text" id="inputNFe" placeholder="Nota da Compra">
							<!-- Fim Input -->
							<!-- Label -->
							<label for="inputEmail">Data da Compra</label>
							<!-- Fim Label -->
							<!-- Input -->
							<input class="form-control" name="data" type="text" id="inputData" inputmode="numeric" placeholder="<?php echo date("d/m/Y") ?>">
							<!-- Fim Input -->
							<!-- Msg Erro -->
							<div class="bg-danger " id="div-erro" style="text-align: center;display: none; margin: 10px 0px; padding:15px 0px">
								<span id="msg_data" style="font-weight: bold"></span>
							</div>
							<!-- Fim Msg Erro -->
							<!-- Mensagem -->
							<label for="informacoes">Informação</label>
							<textarea class="form-control" id="msg_informacoes" name="info" rows="3"></textarea>
							<!-- Fim Mensagem -->

						</div>

					</div>
					<div class="col-md-6 ">
						<input type="checkbox" id="check_disable">sadasda</input>
						<div class="row form-group" style="margin:auto; border: 1px solid black">

							<!-- Input -->
							<input class="col-10 form-control" name="periferico" type="text" id="periferico_S" placeholder="Periférico">
							<!-- Fim Input -->
							<div class="col-2 mt-2 d-flex justify-content-between padding_ex_sm">
								<?php
								$perif_value = [];
								?>
								<i class="fas fa-check-square fa-lg text-success" onclick="marcar()"></i>

							</div>
							<?php
							$variavelphp = "<script>document.write(teste)</script>";
							echo "Olá $variavelphp";
							
							print_r($perif_value);

							?>
							<?php

							include '../conn-db/conn_db.php'; //separar o campo componentes em array
							foreach ($result as $line) { ?>
								<div id="tex_div">
									<?php
									echo "<pre>"; //separar dados do campo onde tem |
									print_r(explode('|', ($line[0])));
									echo "</pre>";
									?>
									<i class="fas fa-trash-alt fa-lg text-danger"></i>
								</div>

							<?php } ?>


						</div>

					</div>

				</div>
				<!-- Botao -->
				<input class="btn " onclick="return validar()" type="submit" value="Cadastrar" style="margin: 10px 0px"></input>
				<!-- Fim Botao -->
			</div>

		</form>


	</section>
</body>

</html>