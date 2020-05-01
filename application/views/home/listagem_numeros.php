<section class="homepage-about section">
    <div class="container">
        <div class="area-comprovantes text-center">

            <?php
            $rifaAtual = $centenas[0]->rifa_id;
            foreach ($centenas as $i=>$linha) { ?>

                <?php if ($i == 0 || $linha->rifa_id != $rifaAtual) { ?>

                    <?php if ($i == 0 ) {?>
                        <div class="form-group">
                            <h5><?php echo "$linha->nome - $linha->rifa_nome";?></h5>
                            <button class="btn-primary btn" onclick="preparar_dados_envio(<?php echo $linha->cliente_id;?>, <?php echo $linha->rifa_id;?>)">Enviar Comprovante <i class="fa fa-cloud-upload"></i></button>
                            <a target='_blank' href='https://api.whatsapp.com/send?phone=<?php echo $this->dados_globais['whatsapp'] ;?>&text=Ol%C3%A1%2C%20meu%20nome%20%C3%A9%20<?php echo urlencode($linha->nome) ;?>.'  class="btn btn-success" >Enviar Comprovante <i class="fa fa-whatsapp"></i></a>
                        </div>
                        <div class="form-group">
                            <table class='table'>
                            <tr>
                                <th>Número</th>
                                <th>Adquirido</th>
                            </tr>
                    <?php }

                    if ( $linha->rifa_id != $rifaAtual ) { ?>
                        </table></div>
                        <div class="form-group">
                            <h5><?php echo "$linha->nome - $linha->rifa_nome";?></h5>
                            <button class="btn-primary btn" onclick="preparar_dados_envio(<?php echo $linha->cliente_id;?>, <?php echo $linha->rifa_id;?>)">Enviar Comprovante <i class="fa fa-cloud-upload"></i></button>
                            <a target='_blank' href='https://api.whatsapp.com/send?phone=<?php echo $this->dados_globais['whatsapp'] ;?>&text=Ol%C3%A1%2C%20meu%20nome%20%C3%A9%20<?php echo urlencode($linha->nome) ;?>.'  class="btn btn-success" >Enviar Comprovante <i class="fa fa-whatsapp"></i></a>
                        </div>
                        <div class="form-group"><table class='table'>
                                <tr>
                                <th>Número</th>
                                <th>Adquirido</th>
                                </tr>
                    <?php }
                    $rifaAtual = $linha->rifa_id;
                    ?>

                <?php } ?>

                <tr>
                    <td><?php echo str_pad($linha->numero, 3, '00', STR_PAD_LEFT);?></td>
                    <td><?php echo $linha->adquirido;?></td>
                 </tr>
            <?php } ?>

                </table>
            </div>
        </div>

    </div>

</section>

<form action="<?php echo site_url('rifas/enviar_comprovantes');?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            Anexe os comprovantes abaixo, formatos permitidos: .jpeg, .jpg, .png, .pdf
                        </div>
                        <div class="col-lg-12 col-xs-12">
                            <input type="file" name="comprovantes[]" class="form-control input-sm" multiple tabindex="1">
                            <input type="hidden" name="rifa" id="rifa">
                            <input type="hidden" name="cliente" id="cliente">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Enviar Comprovante</button>
                </div>
            </div>
        </div>
    </div>
</form>
