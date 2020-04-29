

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">

            <div class="text-center">
           <?php
           $CI =& get_instance();
           $CI->load->model('imagem');
           foreach ($objetos as $objeto) { ?>
            <div class="sorteios-listagem">
                     <?php  $imagem = $CI->imagem->getFirst($objeto->id); ?>


                    <?php if ($imagem) { ?>
                        <img src="<?php echo $this->dados_globais['caminho_externo_upload'] . "{$objeto->id}/{$imagem->id}.{$imagem->extensao}";?>" style="width:100%">
                    <?php } else {

                    }?>
                    <div class="about-text">
                        <div class="section-title">
                            <h4><?php echo $objeto->nome;?></h4>
                        </div>
                        <div class="section-title">
                            <?php if ($objeto->cliente_ganhador != '') { ?>
                                Sorteado dia <?php echo $objeto->sorteio;?>
                            <?php } else { ?>
                                Sorteio dia <?php echo $objeto->sorteio;?>
                            <?php } ?>
                        </div>
                        <div class="section-title">
                            <?php if ($objeto->cliente_ganhador != '') { ?>
                                <a href="<?php echo site_url('/rifas/consultar/' . $objeto->id);?>" class="btn btn-sm sm-padding btn-danger">Visualizar resultado</a>
                            <?php } else { ?>
                                <a href="<?php echo site_url('/rifas/consultar/' . $objeto->id);?>" class="btn btn-sm sm-padding primary-btn">Comprar um número</a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
            </div>
        </div>
    </section>
