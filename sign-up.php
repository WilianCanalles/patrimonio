<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="obj/footer.css" />

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <title>PATRIMONIX</title>
    <link rel="icon" href="img/Phoenix-Patrimonial.png">
</head>

<body>
    <?php include 'obj/navbar_menu.php' ?>
    <div class="container align-sign">
        <div class="row align-sign">
            <form method="post" action="conn-db/conn_new_user.php" class="container bg-opc-sign" style="align-self: center;">
                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">

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
                            <input class="form-control" name="senha" type="text" id="inputSenha" placeholder="Senha" style=" -webkit-text-security: disc;" required autofocus="">
                            <!-- Fim input-->
                        </div>

                        <div class="form-group">
                            <!-- Label -->
                            <label for="inputSenha">Empresa</label>
                            <!-- Fim label-->
                            <!-- Input-->
                            <input class="form-control" name="empresa" type="text" id="inputEmpresa" placeholder="Empresa" required autofocus="">
                            <!-- Fim input-->
                        </div>
                    </div>
                </div>
                <input type="hidden" name="new_user" value="novo">
                <div class="btn-middle-up">
                    <input class="btn btn-lg btn-primary" type="submit" value="Inscrever-se"></input>
                </div>
                <!-- Fim botão -->
                <?php include 'obj/alert.php' ?>
            </form>
        </div>
    </div>
    <!-- Rodape -->

    <?php include 'obj/footer-menu.php' ?>

    <!-- Fim rodape -->
</body>

</html>