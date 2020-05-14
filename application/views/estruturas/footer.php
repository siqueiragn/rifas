<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row footer-item-list ">

            <div class="col-lg-3">
                <div class="footer-title"><i class="fa fa-search"></i> &nbsp;&nbsp;&nbsp;Escolha um sorteio</div>
                <div class="footer-content">Consulte a lista de sorteios e escolha um de sua preferência</div>
            </div>
            <div class="col-lg-3">
                <div class="footer-title"><i class="fa fa-check-circle-o"></i> &nbsp;&nbsp;Compre seus números</div>
                <div class="footer-content">Você pode comprar quantos desejar, quanto maior a quantidade, maior as chances</div>
            </div>
            <div class="col-lg-3">
                <div class="footer-title"><i class="fa fa-money"></i> &nbsp;&nbsp;Realize o pagamento</div>
                <div class="footer-content">Pague através das opções disponibilizadas, ao enviar o seu comprovante você já está concorrendo</div>
            </div>
            <div class="col-lg-3">
                <div class="footer-title"><i class="fa fa-bell-o"></i> &nbsp;&nbsp;Aguarde o resultado</div>
                <div class="footer-content">O resultado é divulgado pela Loteria Federal, boa sorte!</div>
            </div>

        </div>
        <div class="row pt-4">
            <div class="col-lg-4">
                <div class="footer-item text-center">
                    <ul>
                        <li><i class="fa fa-envelope-o"></i> <a class="custom-link" href="mailto:<?php echo $this->dados_globais['email_formatado'];?>"><?php echo $this->dados_globais['email_formatado'];?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-item text-center">
                    <ul>
                        <li><i class="fa fa-instagram"></i> <a class="custom-link" href="https://www.instagram.com/rifassdosertao"><?php echo $this->dados_globais['instagram_formatado'];?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-item text-center">
                    <ul>
                        <li><i class="fa fa-whatsapp"></i> <?php echo $this->dados_globais['whatsapp_formatado'];?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row pt-1">
                <div class="col-lg-12 ">
                    <div class="small text-white text-center">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $contador = 0;
    $arquivo = $this->dados_globais['caminho_logs'] . date('Ymd') . ".txt";
    if ( file_exists( $arquivo )) {
        $handle = fopen($arquivo, 'r+');
        $data = fread($handle, 512);
    } else {
        $handle = fopen($arquivo, 'w');
        $data = 0;
    }

    $contador = $data + 1;

    fseek($handle, 0);
    fwrite($handle, $contador);
    fclose($handle);

    ?>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="<?php echo site_url('/assets/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('/assets/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.magnific-popup.min.js');?>"></script>
<script src="<?php echo site_url('/assets/js/jquery-ui.min.js');?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.nice-select.min.js');?>"></script>
<script src="<?php echo site_url('/assets/js/jquery.slicknav.js');?>"></script>
<script src="<?php echo site_url('/assets/js/slides.js');?>"></script>
<script src="<?php echo site_url('/assets/js/custom.js');?>"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?php echo site_url('/assets/js/mascaras.js');?>"></script>
<script src="<?php echo site_url('/assets/js/load-mascaras.js');?>"></script>
<script src="<?php echo site_url('/assets/js/main.js');?>"></script>
<script src="https://use.fontawesome.com/2629945dd9.js"></script>

</body>

</html>