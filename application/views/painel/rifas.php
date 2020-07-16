

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/rifas');?>" method="GET">

                    <div class="col-lg-10 col-xs-10 offset-lg-1 offset-xs-1 text-center">

                        <div class="form-group btn-grid">

                            <div class="col-lg-4 col-xs-4">
                                <a href="<?php echo site_url('/rifas/criar');?>" class="primary-btn btn-sm sm-padding">Novo sorteio</a>
                            </div>

                            <div class="col-lg-4 col-xs-4">
                                <select name="status" id="status" class="form-control input-sm" tabindex="1">
                                    <option value="1" <?php if ($this->input->get('status') == "1") echo "selected"; ?>>ATIVOS</option>
                                    <option value="0" <?php if ($this->input->get('status') == "0") echo "selected"; ?>>INATIVOS</option>
                                    <option value="T" <?php if ($this->input->get('status') == "T") echo "selected"; ?>>TODOS</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-xs-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                <?php if ($this->input->get()) { ?>
                                    <a href="<?php echo site_url($this->router->class.'/listar/' . $this->uri->segment(3)); ?>" class="btn btn-info">
                                        <i class="fa fa-times"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        
                        </div>
                        <table class="table">
                            <th>Ações</th>
                            <th>Nome</th>
                            <th>Data Sorteio</th>
                        <?php foreach ($objetos as $objeto) { ?>

                        <tr>
                            <td>
                                <a href="<?php echo site_url('/rifas/sortear/' . $objeto->id);?>" class="btn-info btn-sm sm-padding">Sortear</a>
                                <a href="<?php echo site_url('/centenas/listar/' . $objeto->id);?>" class="btn-success btn-sm sm-padding">Ver números</a>
                                <a href="<?php echo site_url('/rifas/consultar/' . $objeto->id);?>" class="btn-success btn-sm sm-padding">Consultar</a>
                                <a href="<?php echo site_url('/rifas/editar/' . $objeto->id);?>" class="btn-danger btn-sm sm-padding">Editar</a>
                                <?php if ($objeto->ativo == 1) { ?>
                                <a href="<?php echo site_url('/rifas/desativar/' . $objeto->id);?>" class="btn-warning btn-sm sm-padding">Desativar <i class="fa fa-lock"></i></a>
                                <?php } else { ?>
                                    <a href="<?php echo site_url('/rifas/habilitar/' . $objeto->id);?>" class="btn-warning btn-sm sm-padding">Ativar <i class="fa fa-unlock"></i></a>
                                <?php } ?>
                            </td>
                            <td><?php echo $objeto->nome;?></td>
                            <td><?php echo $objeto->sorteio;?></td>
                        </tr>
                        <?php } ?>
                        </table>

                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>



    </script>



