

    <!-- Home Page About Section Begin -->
    <section class="homepage-about spad section">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-xs-10">
                    <h4 class="">Olá <strong><?php echo $nome_completo;?></strong>, confirme os detalhes da sua compra:</h3>
                </div>
                <br>
                <div class="col-lg-10 col-xs-10">
                    Números adquiridos: <?php echo implode(", ", $numeros);?></>
                </div>
                <div class="col-lg-10 col-xs-10">
                    Telefone para contato: <?php echo $telefone;?>
                </div>
                <div class="col-lg-10 col-xs-10 pt-5">
                    <label class="total"> Total: R$ <?php echo str_replace(",", ".", $rifa->valor) * count($numeros);?></label>
                </div>

                <div class="col-lg-10 col-xs-10">
                    <input type="hidden" class="" id="rifa" value="<?php echo $rifa->id;?>">
                    <input type="hidden" class="" id="numeros" value="<?php echo implode(", ", $numeros);?>">
                    <input type="hidden" class="" id="nome_completo" value="<?php echo $nome_completo;?>">
                    <input type="hidden" class="" id="telefone" value="<?php echo $telefone;?>">
                    <input type="hidden" class="" id="cliente" value="<?php echo $cliente;?>">

                    <button type="button" class="btn btn-success"  onclick="efetuar_reserva(this, '<?php echo site_url($this->router->class . '/reservar');?>')">Finalizar Reserva</button>
                </div>

                <div id="area-retorno" class="col-lg-10 col-xs-10">

                </div>
            </div>

        </div>

    </section>
    <section class="text-center">

        <div class="payment-area text-center">

            <div class="payment-method">
                <img class="payment-method-img" src="<?php echo $this->dados_globais['caminho_externo_img'] . "banks/nubank.png";?>" >
                <label class="payment-method-text">NuConta - 260</label>
                <label class="payment-method-text">Titular: Fulano Teste da Silva</label>
                <label class="payment-method-text">CPF: 000.000.000-00</label>
                <label class="payment-method-text">Agência: 0001</label>
                <label class="payment-method-text">Conta: 123456789</label>
                <label class="payment-method-text">Tipo: Conta Corrente</label>
            </div>
            <div class="payment-method">
                <img class="payment-method-img" src="<?php echo $this->dados_globais['caminho_externo_img'] . "banks/bradesco.jpg";?>" >
                <label class="payment-method-text">Bradesco - 237</label>
                <label class="payment-method-text">Titular: Fulano Teste da Silva</label>
                <label class="payment-method-text">CPF: 000.000.000-00</label>
                <label class="payment-method-text">Agência: 0000</label>
                <label class="payment-method-text">Conta: 00000-1</label>
                <label class="payment-method-text">Tipo: Conta Corrente</label>
            </div>
            <div class="payment-method">
                <img class="payment-method-img" src="<?php echo $this->dados_globais['caminho_externo_img'] . "banks/bancodobrasil.png";?>" >
                <label class="payment-method-text">Banco do Brasil - 1</label>
                <label class="payment-method-text">Titular: Fulano Teste da Silva</label>
                <label class="payment-method-text">CPF: 000.000.000-00</label>
                <label class="payment-method-text">Agência: 0000-5</label>
                <label class="payment-method-text">Conta: 00000</label>
                <label class="payment-method-text">Tipo: Conta Corrente</label>
            </div>
            <div class="payment-method">
                <img class="payment-method-img" src="<?php echo $this->dados_globais['caminho_externo_img'] . "banks/picpay.png";?>" >
                <label class="payment-method-text">@fulanosilva</label>
                <label class="payment-method-text">Titular: Fulano Teste da Silva</label>
                <label class="payment-method-text">&nbsp;</label>
                <label class="payment-method-text">&nbsp;</label>
                <label class="payment-method-text">&nbsp;</label>
                <label class="payment-method-text">&nbsp;</label>
            </div>

        </div>
    </section>

    <form action="<?php echo site_url($this->router->class . '/enviar_comprovantes');?>" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modal_compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                Anexe os comprovantes abaixo, formatos permitidos: .jpeg, .jpg, .png, .pdf
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <input type="file" name="comprovantes[]" id="comprovantes[]" class="form-control input-sm" multiple tabindex="1">
                                <input type="hidden" name="rifa" value="<?php echo $rifa->id;?>">
                                <input type="hidden" name="cliente" value="<?php echo $cliente;?>">
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
