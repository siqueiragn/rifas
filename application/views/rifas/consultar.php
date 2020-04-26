

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><?php echo $objeto->nome;?></h2>
                        </div>
                        <p>
                            <?php echo $objeto->descricao; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" ">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                            <?php
                            $CI =& get_instance();
                            $CI->load->model('imagem');
                            $imagens = $CI->imagem->getByItemID($objeto->id);

                            foreach ($imagens->result() as $indice=>$imagem) { ?>
                                <!-- Full-width images with number and caption text -->
                                <div class="mySlides ">
                                    <div class="numbertext"><?php echo $indice+1;?> / <?php echo $imagens->num_rows();?></div>
                                    <img src="<?php echo site_url("assets/img/{$objeto->id}/{$imagem->caminho}");?>" style="width:100%">
                                    <div class="text"></div>
                                </div>

                            <?php } ?>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            <?php foreach ($imagens->result() as $indice=>$imagem) { ?>

                                <span class="dot" onclick="currentSlide(<?php echo $indice+1;?>)"></span>

                            <?php } ?>
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

                        <?php if ( in_array($i, $comprados ) ) {
                            echo "<div data-toggle='popover' data-trigger='hover' data-content='{$textos[$i]}' class='numero-sorteio noselect comprado' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        } else if ( in_array($i, $reservados) )  {
                            echo "<div data-toggle='popover' data-trigger='hover' data-content='{$textos[$i]}' class='numero-sorteio noselect reservado' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        } else {
                            echo "<div class='numero-sorteio noselect disponivel' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        }
                        ?>
                    <?php } ?>
                 </div>
            </div>
    </section>
    <!-- Home Page About Section End -->