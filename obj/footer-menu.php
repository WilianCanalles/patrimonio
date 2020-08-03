<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<style>
    a.top {
        padding-top: 70px;
    }

    a.top span {
        position: absolute;
        top: 0;
        left: 50%;
        width: 24px;
        height: 24px;
        margin-left: -12px;
        border-right: 1.5px solid #fff;
        border-top: 1.5px solid #fff;
        -webkit-transform: rotateZ(-45deg);
        transform: rotateZ(-45deg);
        -webkit-animation: sdb 1.5s infinite;
        animation: sdb 1.5s infinite;
        box-sizing: border-box;
    }

    .tp-disp-none {
        display: none;
    }

    @-webkit-keyframes sdb {
        0% {
            -webkit-transform: rotateY(0) rotateZ(-45deg) translate(0, 0);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            -webkit-transform: rotateY(720deg) rotateZ(-45deg) translate(5px, -5px);
            opacity: 0;
        }
    }

    @keyframes sdb {
        0% {
            transform: rotateY(0) rotateZ(-45deg) translate(0, 0);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            transform: rotateY(720deg) rotateZ(-45deg) translate(5px, -5px);
            opacity: 0;
        }
    }
</style>

<body>
    <!-- SCROLL -->
    <section id="tpds" class="topo tp-disp-none">
        <a class="top" href="#"><span class="go-top"></span></a>
    </section>
    <!-- FIM SCROLL -->
    <!-- Rodape -->
    <footer>
        <div class="container foot">
            <div class="row">
                <!-- Logo jogo -->
                <div class="col-md-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 justificar">
                                <a href="index.html" class="navbar-brand">
                                    <img src="img/Phoenix-Patrimonial-White.png" width="75">
                                </a>
                            </div>
                            <div class="col-md-12 justificar">
                                <span>PATRIMONIX</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim logo jogo -->
                <!-- Links -->
                <div class="col-md-3 alinhamento">
                    <h4>company</h4>
                    <ul class="navbar-nav">
                        <li><a href="sobre.php">Sobre</a></li>
                    </ul>
                </div>

                <div class="col-md-3 alinhamento">
                    <h4>links uteis</h4>
                    <ul class="navbar-nav">
                        <li><a href="">Ajuda</a></li>
                    </ul>
                </div>
                <!-- Fim do link -->
                <!-- Redes Sociais -->
                <div class="col-md-3 alinhamento ">
                    <ul class="d-inline-block mQ-es-s">
                        <!-- mQ-es-s -->
                        <li>
                            <!-- Media Query Extra Small and Small -->
                            <i class="fab fa-facebook"></i>
                        </li>
                        <li>
                            <i class="fab fa-twitter"></i>
                        </li>
                        <li>
                            <i class="fab fa-instagram"></i>
                        </li>
                    </ul>
                </div>
                <!-- Fim redes sociais -->
            </div>
        </div>
    </footer>
    <!-- Fim do Rodape -->
</body>
<script>
    $(function() {
        $('.go-top').click(function() {
            $('html, body').animate({
                scrollTop: $('body').offset().top
            }, 'slow');

            return false;
        });
    });
    $("html, body").scroll(function() {

        if ($("body").scrollTop() < 5) {
            $("#tpds").addClass("tp-disp-none");
        } else {
            $("#tpds").removeClass("tp-disp-none");
        }
    });
</script>

</html>