

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-xs-12">
                    Listando todos os comprovantes enviados por <?php echo $cliente->nome;?> (<?php echo $cliente->telefone;?>)
                </div>
                <div class="col-lg-12 col-xs-12 text-center">

                    <table class="table">
                        <th>Download</th>
                        <th>Enviado em</th>
                        <th>Sorteio</th>
                        <?php

                         foreach ($comprovantes as $objeto) { ?>

                            <tr>
                                <td>
                                    <a target="_blank" href="<?php echo site_url($this->router->class . "/download_comprovante?cliente={$objeto->cliente}&comprovante={$objeto->id}.{$objeto->extensao}");?>" class="btn btn-primary"><i class="fa fa-download"></i></a>
                                </td>
                                <td><?php echo $objeto->enviado;?></td>
                                <td><a href="<?php echo site_url('/rifas/consultar/' . $objeto->item_rifado);?>" class="btn-primary btn-sm sm-padding">Ver Sorteio</a></td>
                                <!--                                <td><?php /*echo $status;*/?></td> -->

                               </tr>
                        <?php } ?>
                    </table>

                </div>

            </div>
        </div>
    </section>
