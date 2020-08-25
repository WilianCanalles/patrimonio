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

	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">




</head>
<style>
	::-webkit-scrollbar {
		width: 2px;
	}

	::-webkit-scrollbar-thumb {
		background: #25252538;
	}

	.input-group-text {
		background-color: white !important;
		border: 1px solid white !important;
		border-bottom: 1px solid #e5e5e5 !important;
	}
</style>

<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-5" style="align-self: center;">
					<section>
						<div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalScrollableTitle">Usuarios</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span style="color: #6c757d !important" aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body container">
										<div class="row" id="userscroll" style="overflow: auto; text-align: center">
											<div class="col-sm-4">
												<div>
													<img src="../img/ico_user2.png" alt="icone">
												</div>
												<div>
													<div>
														<label>Nome_User</label>
													</div>
													<div>
														<label>Nivel_USer</label>
													</div>
												</div>
												<div>
													<img class="usr_btn" src="../img/key.png" alt="chave">
													<img class="usr_btn" src="../img/pen.png" alt="lapis">
													<img class="usr_btn" src="../img/trash1.png" alt="lixeira">
												</div>
											</div>
											<div class="col-sm-4">
												<div>
													<img src="../img/ico_user2.png" alt="icone">
												</div>
												<div>
													<div>
														<label>Nome_User</label>
													</div>
													<div>
														<label>Nivel_USer</label>
													</div>
												</div>
												<div>
													<img class="usr_btn" src="../img/key.png" alt="chave">
													<img class="usr_btn" src="../img/pen.png" alt="lapis">
													<img class="usr_btn" src="../img/trash1.png" alt="lixeira">
												</div>
											</div>
											<div class="col-sm-4">
												<div>
													<img src="../img/ico_user2.png" alt="icone">
												</div>
												<div>
													<div>
														<label>Nome_User</label>
													</div>
													<div>
														<label>Nivel_USer</label>
													</div>
												</div>
												<div>
													<img class="usr_btn" src="../img/key.png" alt="chave">
													<img class="usr_btn" src="../img/pen.png" alt="lapis">
													<img class="usr_btn" src="../img/trash1.png" alt="lixeira">
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>

						<div style="text-align: center;">
							<p class="display-4" style="margin-top: 20px">Lista de Usuarios</p>

							<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable1" style="margin-bottom: 20px" value="Abrir Lista">
							</input>
							<input type="button" class="btn btn-danger" style="margin-bottom: 20px" value="Deletar conta Principal">
							</input>
						</div>
					</section>

				</div>
				<div class="col-md-7 ">
					<div>
						<label class="h2" style="font-weight: 350;">Cadastro de Usuarios</label>
						<form method="post" action="conn-db/conn_new_user.php" style="align-self: center;">
							<div class="form-group">
								<!-- Label -->
								<label for="inputEmail">Nome</label>
								<!-- Fim label-->
								<!-- Input-->
								<input class="form-control" name="nome" type="text" id="inputNome" placeholder="Nome" required autofocus="">
								<!-- Fim input-->
							</div>

							<div class="form-group">
								<!-- Label -->
								<label for="inputSenha">Sobrenome</label>
								<!-- Fim label-->
								<!-- Input-->
								<input class="form-control" name="sobrenome" type="text" id="inputSobrenome" placeholder="Sobrenome" required autofocus="">
								<!-- Fim input-->
							</div>

							<div class="form-group">
								<!-- Label -->
								<label for="inputSenha">Email</label>
								<!-- Fim label-->
								<!-- Input-->
								<input class="form-control" name="email" type="text" id="inputEmail" placeholder="Email" required autofocus="">
								<!-- Fim input-->
							</div>

							<div class="form-group">
								<!-- Label -->
								<label for="inputSenha">Usuario</label>
								<!-- Fim label-->
								<!-- Input-->
								<input class="form-control" name="usuario" type="text" id="inputUsuario" placeholder="Usuario" required autofocus="">
								<!-- Fim input-->
							</div>

							<div class="form-group">
								<!-- Label -->
								<label for="inputSenha">Senha</label>
								<!-- Fim label-->
								<!-- Input-->
								<input class="form-control" name="senha" type="text" id="inputSenha" placeholder="Senha" required autofocus="">
								<!-- Fim input-->
							</div>

							<div class="btn-middle-up">
								<input class="btn btn-lg btn-primary" disabled type="submit" value="Cadastrar"></input>
							</div>
							<!-- Fim botão -->

							<!-- Mensagem de Fim de sessao -->
							<?php
							if (isset($_SESSION['have_user'])) :
							?>
								<div class="bg-danger" style="text-align: center; margin-top: 10px; padding:15px 0px">
									<span style="font-weight: bold">Usuario e/ou E-mail ja possui cadastro.</br>Verifique os dados inseridos e tente novamente</span>
								</div>
							<?php
							endif;
							unset($_SESSION['have_user']);
							?>
							<!-- Fim Mensagem de Fim de sessao -->

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>