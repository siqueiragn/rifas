

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/listar');?>" method="GET">

                    <div class="btn-grid">
                        <div class="col-lg-5 col-xs-5">
                            <input type="text" name="nome" value="<?php echo $this->input->get('nome');?>" class="form-control" placeholder="NOME">
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <input type="text" name="telefone" value="<?php echo $this->input->get('telefone');?>" class="form-control mascara-telefone" placeholder="TELEFONE">
                        </div>
                        <div class="col-lg-2 col-xs-2">
                            <select name="status" id="status" class="form-control input-sm" tabindex="1">
                                <option value="1" <?php if ($this->input->get('status') == "1") echo "selected";?> >Reservado</option>
                                <option value="2" <?php if ($this->input->get('status') == "2") echo "selected";?> >Comprado</option>
                                <option value="3" <?php if ($this->input->get('status') == "3") echo "selected";?> >Recusado</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-xs-2">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            <?php if ($this->input->get()) { ?>
                                <a href="<?php echo site_url($this->router->class.'/listar'); ?>" class="btn btn-info">
                                    <i class="fa fa-times"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>


                </form>
                    <div class="col-lg-12 col-xs-12 text-center">

                        <table class="table">
                            <th>Ações</th>
                            <th>Número</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                           <!-- <th>Status</th>-->
                            <th>Adquirido</th>
                            <?php

                             foreach ($objetos as $objeto) {

                                switch ($objeto->status) {
                                    case 1:
                                        $status = 'Reservado';
                                    break;
                                    case 2:
                                        $status = 'Pago';
                                    break;
                                    default:
                                        $status = 'Não aprovado';
                                    break;
                                }
                                ?>

                                <tr>
                                    <td>
                                        <?php if ( $objeto->status != 2 ) { ?>
                                        <a href="<?php echo site_url('/centenas/aprovar/' . $objeto->id);?>" class="btn-success btn-sm sm-padding">Aprovar</a>
                                            <?php if ( $objeto->status != 3) { ?>
                                                <a href="<?php echo site_url('/centenas/recusar/' . $objeto->id);?>" class="btn-danger btn-sm sm-padding">Recusar</a>
                                            <?php } ?>
                                        <?php } ?>

                                        <?php if ( $objeto->comprovante != '' ) { ?>
                                        <a href="<?php echo site_url('/centenas/comprovantes/' . $objeto->cliente_id);?>" class="btn-success btn-sm sm-padding">Comprovantes</a>
                                        <?php } ?>
                                        <a href="<?php echo site_url('/rifas/consultar/' . $objeto->rifa_id);?>" class="btn-primary btn-sm sm-padding">Ver Sorteio</a>
                                    </td>
                                    <td><?php echo str_pad($objeto->numero, 3, '00', STR_PAD_LEFT);?></td>
                                    <td><?php echo $objeto->nome;?></td>
                                    <td><?php echo $objeto->telefone;?></td>
                                    <!--                                <td><?php /*echo $status;*/?></td> -->

                                    <td><?php echo $objeto->adquirido;?></td>
                                  </tr>
                            <?php } ?>
                        </table>

                    </div>

            </div>
        </div>
    </section>
