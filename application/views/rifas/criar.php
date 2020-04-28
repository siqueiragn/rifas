

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/db_criar');?>" method="POST" enctype="multipart/form-data">

                    <div class="col-lg-6 col-xs-10 offset-lg-3 offset-xs-1">
                        <div class="form-group">
                            <label for="">Nome do item a ser rifado</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" tabindex="1" name="nome" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="">Descrição</label>
                        </div>
                        <div class="form-group">
                            <textarea name="descricao" id="descricao"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Data do Sorteio</label>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4 col-xs-8" style="padding: 0;">
                            <input type="text" class="form-control mascara-data datepicker input-sm" tabindex="1" name="sorteio" id="sorteio">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <h5>Imagens</h5>
                        </div>

                        <hr>

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
                            <button type="submit" class="btn btn-success" tabindex="1">Criar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>