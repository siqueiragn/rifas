

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

                        <div class="section-title">
                            <h5>Valor do número R$<?php echo $objeto->valor;?></h5>
                            <h5><i class="fa fa-calendar"></i> Sorteio ocorre dia <?php echo $objeto->sorteio;?></h5>
                        </div>
                    </div>
                    <?php

                    if ( $objeto->cliente_ganhador != '') {
                        $marcar = false;
                        $CI =& get_instance();
                        $CI->load->model('cliente');

                        $ganhador = $CI->cliente->getByIdGanhador($objeto->cliente_ganhador)->row();
                        ?>

                        <div class="about-text">
                            <div class="section-title">
                                <h5>O sorteio foi vencido por <?php echo $ganhador->nome;?> <br>Número Sorteado: <?php echo $ganhador->numero;?></h5>
                            </div>
                        </div>
                    <?php } else {
                        $marcar = true;
                    } ?>
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
                                    <img class="w-100 d-block" src="<?php echo $this->dados_globais['caminho_externo_upload'] . "{$objeto->id}/{$imagem->id}.{$imagem->extensao}";?>" >
                                </div>

                            <?php } ?>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div class="hidden">
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
                <div class="offset-lg-2 offset-xs-2 col-lg-8 col-xs-8 text-center">

                    <span class="badge legenda-texto badge-dark">Todos</span>
                    <span class="badge legenda-texto badge-disponivel">Disponível</span>
                    <span class="badge legenda-texto badge-comprado">Comprado</span>
                    <span class="badge legenda-texto badge-reservado">Reservado</span>
                    <span class="badge legenda-texto badge-selecionado">Meus números</span>

                    <input id="meus_numeros" type="hidden">
                </div>
            </div>
        <br>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xs-10 offset-lg-1 text-center">
                    <div id="erro-buscar" style="100%"></div>
                    <div class="noselect col-lg-8 offset-lg-2 col-xs-8 offset-xs-2">

                    <?php $cont = 0; for( $i = 0; $i < 1000; $i++) { ?>

                        <?php if ( in_array($i, $comprados ) ) {
                            echo "<div data-toggle='popover' data-trigger='hover' data-content='{$textos[$i]}' class='" . ($marcar ? "numero-sorteio" : "numero-sorteado") . " noselect comprado' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        } else if ( in_array($i, $reservados) )  {
                            echo "<div data-toggle='popover' data-trigger='hover' data-content='{$textos[$i]}' class='" . ($marcar ? "numero-sorteio" : "numero-sorteado") . " noselect reservado' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        } else {
                            echo "<div class='" . ($marcar ? "numero-sorteio" : "numero-sorteado") . " noselect disponivel' id='numero-$i'>" . str_pad($i, 3, '00', STR_PAD_LEFT) . "</div>";
                        }
                        ?>
                    <?php } ?>
                 </div>
            </div>
    </section>

    <?php if ($marcar ) { ?>
    <div class="finalizar-compra hidden fixed-right-bottom text-right">

        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_compra">Reservar Números</button>

    </div>
    <!-- Home Page About Section End -->


    <form action="<?php echo site_url($this->router->class . '/metodoPagamento/'. $objeto->id);?>" id="form"  method="POST">
    <div class="modal fade" id="modal_compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informe seus dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <label style="color: red;" class="col-lg-12 col-xs-12" id="erros-submit"></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-12 col-xs-12 display-numeros" for=""></label>
                        <input type="hidden" name="numeros" id="numeros">
                    </div>
                    <div class="row">
                        <label for="" class="col-lg-12 col-xs-12">Nome Completo</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <input type="text" name="nome_completo" id="nome_form" class="form-control input-sm" tabindex="1" required>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-lg-12 col-xs-12">Telefone</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <input type="text" name="telefone" class="form-control mascara-telefone input-sm" tabindex="1" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="validar($('#form'))" class="btn btn-primary">Comprar</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php } ?>


    <div class="modal fade" id="modal_buscar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buscar meus números</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="" class="col-lg-12 col-xs-12">Telefone</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <input type="text" id="telefone_buscar" class="form-control mascara-telefone input-sm" tabindex="1">
                            <input type="hidden" id="rifa" value="<?php echo $this->uri->segment(3);?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12" id="erro_label">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="buscar_numeros_consulta('<?php echo site_url($this->router->class . '/consultar_numeros');?>');" class="btn btn-primary">Consultar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
