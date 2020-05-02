

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/db_editar?id=' . $objeto->id);?>" method="POST" enctype="multipart/form-data">

                    <div class="col-lg-6 col-xs-10 offset-lg-3 offset-xs-1">
                        <div class="form-group">
                            <label for="">Nome do item a ser rifado</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" tabindex="0" name="nome" id="nome" value="<?php echo $objeto->nome;?>">
                        </div>
                        <div class="form-group">
                            <label for="">Descrição</label>
                        </div>
                        <div class="form-group">
                            <textarea name="descricao" id="descricao"><?php echo $objeto->descricao;?></textarea>
                        </div>
                        <div class="form-group" style="display: inline-flex;">
                            <label class="col-lg-4 col-xs-6" style="padding: 0;" for="">Data do Sorteio</label>
                            <label class="col-lg-4 offset-lg-2 col-xs-6" style="padding: 0;" for="">Valor Rifa R$</label>
                        </div>
                        <div class="form-group" style="display: inline-flex;">
                            <div class="col-lg-4 col-xs-6" style="padding: 0;">
                                <input type="text" class="form-control mascara-data datepicker-1 input-sm" tabindex="0" name="sorteio" id="sorteio" value="<?php echo $objeto->sorteio;?>">
                            </div>
                            <div class="col-lg-4 offset-lg-2 col-xs-6" style="padding: 0;">
                                <input type="text" class="form-control mascara-percentual input-sm" tabindex="0" name="valor" id="valor" value="<?php echo $objeto->valor;?>">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <h5>Imagens</h5>
                        </div>

                        <hr>

                        <?php
                            foreach ($imagens->result() as $indice=>$imagem) { ?>
                            <div class="imagem-painel">

                            <!-- Full-width images with number and caption text -->
                                    <a target="_blank" href="<?php echo $this->dados_globais['caminho_externo_upload'] . "{$objeto->id}/{$imagem->id}.{$imagem->extensao}";?>">
                                        <img width="200" class="thumbnail" src="<?php echo $this->dados_globais['caminho_externo_upload'] . "{$objeto->id}/{$imagem->id}.{$imagem->extensao}";?>">
                                    </a>

                                    <div class="checkbox-area">
                                        <input class="checkbox-remover-imagem" type="checkbox" name="remover_imagem[]" value="<?php echo $imagem->id;?>"> Remover
                                    </div>


                            </div>
                            <?php } ?>

                        <div class="lista-arquivos">
                            <div class="form-group" id="modelo">
                                <div class="col-lg-8 col-xs-8">
                                    <input type="file" name="arquivos[]">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="clonar();"><i class="fa fa-plus"></i></button>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" tabindex="0">Atualizar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>