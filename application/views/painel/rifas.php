

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/checkLogin');?>" method="POST">

                    <div class="col-lg-10 col-xs-10 offset-lg-1 offset-xs-1 text-center">

                        <div class="form-group">

                        <a href="<?php echo site_url('/rifas/criar');?>" class="primary-btn btn-sm sm-padding">Novo sorteio</a>
                        
                        </div>
                        <table class="table">
                            <th>Ações</th>
                            <th>Nome</th>
                            <th>Data Sorteio</th>
                        <?php foreach ($objetos as $objeto) { ?>

                        <tr>
                            <td><a href="<?php echo site_url('/rifas/consultar/' . $objeto->id);?>" class="primary-btn btn-sm sm-padding">Editar</a></td>
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



