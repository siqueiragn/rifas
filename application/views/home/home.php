
    <!-- Home Page About Section Begin -->
    <section class="homepage-about section" style="margin-top: 97px;">
        <div class="container-carousel">
            <div class="row">

                <?php if ($objetos->num_rows() > 0 ) {?>

                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-pause="false" style="width: 100%; ">

                    <div class="carousel-inner">
                        <?php
                        foreach ($objetos->result() as $indice=>$linha) { ?>
                            <!-- Full-width images with number and caption text -->
                            <div class="carousel-item <?php if ($indice == 0) { echo "active"; } ?>">
                                <img class="d-block w-100 carousel-img" src="<?php echo $this->dados_globais['caminho_externo_upload'] . "{$linha->id}/logo_rifa.{$linha->extensao}";?>">
                                <div class="about-text-carousel">
                                    <div class="section-title">
                                        <?php echo $linha->nome;?>
                                    </div>
                                    <?php /*echo $linha->descricao; */?>

                                    <a href="<?php echo site_url('/rifas/consultar/' . $linha->id);?>" class="round-shaped-btn primary-btn">Participar</a>
                                </div>
                            </div>


                        <?php } ?>

                    </div>
                </div>

            </div>

            <?php } else { ?>
                <h5 style="margin: auto; padding: 300px;" class="text-center">Sem sorteios disponíveis!</h5>
            <?php } ?>
        </div>
    </section>
    <!-- Home Page About Section End -->