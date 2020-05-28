

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/db_sortear');?>" method="POST" enctype="multipart/form-data">

                    <div class="col-lg-6 col-xs-10 offset-lg-3 offset-xs-1">
                        <div class="form-group">
                            <label for="">Informe a centena vencedora do sorteio: <?php echo $objeto->nome;?></label>
                        </div>
                        <div class="form-group" id="erro-label">
                        </div>
                        <div class="form-group">
                            <div class="col-lg-l2 col-xs-12">
                                <input type="text" class="form-control input-sm mascara-numero" name="centena" id="centena" maxlength="3" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="button" class="btn btn-success" tabindex="0" onclick="verificar_centena('<?php echo site_url( $this->router->class . '/consultar_centena' );?>', <?php echo $objeto->id;?> );">Verificar</button>
                        </div>

                        <div class="form-group" id="area-retorno"></div>

                        <div class="form-group label-retorno hidden">

                            <input type="hidden" id="cliente_id" name="cliente_id">
                            <input type="hidden" id="centena_id" name="centena_id">
                            <input type="hidden" id="sorteio" name="sorteio" value="<?php echo $this->uri->segment(3);?>">

                        </div>
                        <div class="form-group label-retorno hidden">

                            <label>Nome Completo</label>

                        </div>
                        <div class="form-group label-retorno hidden">

                            <input type="text" class="form-control input-sm" name="nome" id="nome" tabindex="1" readonly>

                        </div>
                        <div class="form-group label-retorno hidden">

                             <label>Telefone</label>

                        </div>

                        <div class="form-group label-retorno hidden">

                            <input type="text" class="form-control input-sm mascara-telefone" name="telefone" id="telefone" tabindex="1" readonly>

                        </div>
                        <div class="form-group text-center label-retorno hidden">

                            <label for="">Ao clicar nesse botão, a rifa será sorteada e encerrada. Não podendo ser adquiridos novos números.</label>

                        </div>
                        <div class="form-group text-center label-retorno hidden">

                            <button type="submit" class="btn btn-success" tabindex="0">Finalizar Sorteio</button>


                        </div>


                    </div>

                </form>
            </div>
        </div>
    </section>