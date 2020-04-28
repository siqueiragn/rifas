

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/checkLogin');?>" method="POST">

                    <div class="col-lg-6 col-xs-10 offset-lg-3 offset-xs-1">
                        <div class="form-group">
                            <label for="">Usuário</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" tabindex="1" name="usuario" id="usuario">
                        </div>
                        <div class="form-group">
                            <label for="">Senha</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-sm" tabindex="1" name="senha" id="pass">
                        </div>
                        <?php if ($this->input->get('login') == 'error') { ?>
                        <div class="form-group text-center">
                            <span class="alert alert-danger">Usuário/Senha incorretos, verifique!</span>
                        </div>
                        <?php } ?>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" tabindex="1">Login</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>



    </script>



