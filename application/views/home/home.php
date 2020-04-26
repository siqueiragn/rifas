
    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <?php foreach ($objetos as $objeto) { ?>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><?php echo $objeto->nome;?></h2>
                        </div>
                        <p>
                           <?php echo $objeto->descricao; ?>
                        </p>
                        <a href="<?php echo site_url('/rifas/consultar/' . $objeto->id);?>" class="primary-btn">Comprar um número</a>
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
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Home Page About Section End -->