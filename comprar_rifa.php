<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rifas do Sertão</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/slides.css" type="text/css">
</head>

<body>


    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a class="logo-text" href="./index.html">Rifas do Sertão</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./blog.html">Sorteios</a></li>
                        <li><a href="./blog.html">Formas Pagamento</a></li>
                        <li><a href="./contact.html">Contato</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Honda POP 100</h2>
                        </div>
                        <p>
                            <strong>Modelo:</strong> HONDA POP 100 97CC<br>
                            <strong>Ano: </strong>2010<br>
                            <strong>Quilometragem: </strong>49000<br>
                            <strong>Cilindrada: </strong>100<br>
                        </p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" ">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                            <!-- Full-width images with number and caption text -->
                            <div class="mySlides ">
                                <div class="numbertext">1 / 5</div>
                                <img src="img/pop100/1.jpg" style="width:100%">
                                <div class="text">Imagem</div>
                            </div>

                            <div class="mySlides ">
                                <div class="numbertext">2 / 5</div>
                                <img src="img/pop100/2.jpg" style="width:100%">
                                <div class="text">Imagem</div>
                            </div>

                            <div class="mySlides ">
                                <div class="numbertext">3 / 5</div>
                                <img src="img/pop100/3.jpg" style="width:100%">
                                <div class="text">Imagem</div>
                            </div>
                            <div class="mySlides ">
                                <div class="numbertext">4 / 5</div>
                                <img src="img/pop100/4.jpg" style="width:100%">
                                <div class="text">Imagem</div>
                            </div>
                            <div class="mySlides ">
                                <div class="numbertext">5 / 5</div>
                                <img src="img/pop100/5.jpg" style="width:100%">
                                <div class="text">Imagem</div>
                            </div>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            <span class="dot" onclick="currentSlide(4)"></span>
                            <span class="dot" onclick="currentSlide(5)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="homepage-about spad section" style="padding-top: 0;">
            <div class="row">
                <div class="offset-lg-4 offset-xs-4 col-lg-4 col-xs-4 text-center">

                    <span class="badge legenda-texto badge-info">Disponível</span>
                    <span class="badge legenda-texto badge-danger">Comprado</span>
                    <span class="badge legenda-texto badge-warning">Reservado</span>

                </div>
            </div>
        <br>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xs-10 offset-lg-1 text-center">
                    <div class="noselect col-lg-8 offset-lg-2 col-xs-8 offset-xs-2">
                    <?php $cont = 0; for( $i = 0; $i < 1000; $i++) { ?>

                        <?php if ( $i > 52 && $i < 112 ) {
                            echo "<div class='numero-sorteio noselect comprado' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        } else {
                            echo "<div class='numero-sorteio noselect disponivel' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        }
                        ?>
                    <?php } ?>
                 </div>
            </div>
    </section>
    <!-- Home Page About Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item">
                        <div class="footer-logo logo">
                             <a class="logo-text" href="./index.html">Rifas do Sertão</a>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <h5>Contato</h5>
                        <ul>
                             <li><img src="img/phone.png" alt="">+55 (XX)XXXXX-XXXX</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row pt-1">
                    <div class="col-lg-12 ">
                        <div class="small text-white text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Desenvolvido por <a href="#" target="_blank">@siqueiragn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/slides.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>