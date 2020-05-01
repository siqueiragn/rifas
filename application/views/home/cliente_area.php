<section class="homepage-about spad section">
    <div class="container">
        <div class="area-comprovantes text-center">

            <div class="col-lg-10 col-xs-10">
                Realizou algum pagamento?
                <button data-toggle="modal" data-target="#modal_compra" class="btn-primary btn">Envie seus comprovantes</button>
            </div>
            <br>


        </div>

    </div>

</section>

<form action="<?php echo site_url();?>" method="POST">
    <div class="modal fade" id="modal_compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buscar números</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-lg-12 col-xs-12 display-numeros" for=""></label>
                        <input type="hidden" name="numeros" id="numeros">
                    </div>
                    <div class="row">
                        <label for="" class="col-lg-12 col-xs-12">Telefone</label>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <input type="text" name="telefone" id="telefone" class="form-control mascara-telefone input-sm" tabindex="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="buscar_numeros(this, '<?php echo site_url($this->router->class .'/buscar_numeros');?>')">Buscar números</button>
                </div>
            </div>
        </div>
    </div>
</form>