

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/checkLogin');?>" method="POST">

                    <div class="col-lg-10 col-xs-10 offset-lg-1 offset-xs-1">
                        <div class="form-group">
                            <label for="">Bem-vindo ao seu painel, <?php echo $this->nativesession->get('usuario');?>!</label>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>



    </script>



