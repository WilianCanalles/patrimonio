<!DOCTYPE html>
<? require_once "../vendor/autoload.php"?>
<html>

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="obj/footer.css"/>

  
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

  <title>Nosso Patrimonio</title>
  <link rel="icon" href="img/Phoenix-Patrimonial.png">
</head>

<body>
  <!-- Cabecalho -->
  <section>
    <div class="container">
      <div class="row  border-end">
        <div class="col-md-12 ">
          <div id="carousel-menu" class="carousel" data-ride="carousel">
            <div class="carousel-inner">
              <!--Inner -->

              <div class="carousel-item active">
                <img src="https://source.unsplash.com/WLUHO9A_xik/1110x500">
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1110x500">
              </div>

            </div>
            <a href="#carousel-menu" class="carousel-control-prev" data-slide="prev">
              <i class="fas fa-angle-left fa-3x"></i>
            </a>

            <a href="#carousel-menu" class="carousel-control-next" data-slide="next">
              <i class="fas fa-angle-right fa-3x"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fim Cabecalho -->

  <!-- barra de menu -->
  <?php include 'obj/navbar_menu.php' ?>
  <!-- fim barra de menu -->

  <!--Informacoes do site-->

  <!-- Primeira informacao -->
  <section>
    <div class="container">
      <div class="row" style="border-bottom: 1px solid black; padding: 30px 0px 50px 0px">

        <!-- Container imagens -->
        <div class="col-md-6">
          <div id="carousel-info" class="carousel" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://source.unsplash.com/random/1110x500" class="img-fluid">
                <div class="carousel-caption">
                  <h1>Teste</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1110x500" class="img-fluid">
                <div class="carousel-caption">
                  <h1>Teste1</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1110x500" class="img-fluid">
                <div class="carousel-caption">
                  <h1>Teste2</h1>
                </div>
              </div>
            </div>
            <a href="#carousel-info" class="carousel-control-prev" data-slide="prev">
              <i class="fas fa-angle-left fa-3x"></i>
            </a>

            <a href="#carousel-info" class="carousel-control-next" data-slide="next">
              <i class="fas fa-angle-right fa-3x"></i>
            </a>
          </div>
        </div>
        <!-- Fim container Imagens -->
        <!-- Container texto -->
        <div class="col-md-6 align-self-center">

          <div>
            <h1 class="display-4">Facilidade ao controlar seus patrimonios.</h1>
            <p>
              Essa aplicacao foi desenvolvida com ideia de auxiliar e facilitar o cadastro dos patrimonios e manter seus controles.
            </p>

          </div>
        </div>
        <!-- Fim do Container texto-->

      </div>
  </section>
  <!-- Fim da primeira informacao-->
  <!-- Segunda informacao -->
  <section>
    <div class="container">
      <div class="row" style="padding: 30px 0px 50px 0px">
        <!-- Container texto -->
        <div class="col-md-6 align-self-center">

          <div>
            <h1 class="display-4">Pesquisa fácil.</h1>
            <p>
              O controle é feito a partir de codigos de barras, podendo fazer a leitura direto de seu celular. 
            </p>

          </div>
        </div>
        <!-- Fim do Container texto-->
        <!-- Container imagens -->
        <div class="col-md-6">
          <div id="carousel-info2" class="carousel" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://source.unsplash.com/random/1110x500" class="img-fluid">
                <div class="carousel-caption">
                  <h1>Teste</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1110x500" class="img-fluid">
                <div class="carousel-caption">
                  <h1>Teste1</h1>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/1110x500" class="img-fluid">
                <div class="carousel-caption">
                  <h1>Teste2</h1>
                </div>
              </div>
            </div>
            <a href="#carousel-info2" class="carousel-control-prev" data-slide="prev">
              <i class="fas fa-angle-left fa-3x"></i>
            </a>

            <a href="#carousel-info2" class="carousel-control-next" data-slide="next">
              <i class="fas fa-angle-right fa-3x"></i>
            </a>
          </div>
        </div>
        <!-- Fim container Imagens -->
      </div>
  </section>
  <!-- Fim da segunda informacao-->

  <!-- Fim Informacoes do site-->
  <!-- Rodape -->

    <?php include 'obj/footer-menu.php'?>

  <!-- Fim rodape -->
</body>

</html>