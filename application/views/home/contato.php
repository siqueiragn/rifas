<section class="homepage-about spad section">
    <div class="container">

        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="contact-item">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $this->dados_globais['whatsapp'] . "&text=";?>"  class="btn btn-success" ><i class="fa fa-whatsapp"></i> Mensagem Whatsapp </a>
            </div>
            <div class="contact-item">
                <a target="_blank" href="https://chat.whatsapp.com/IGGp0TcXpcU7ICUixQ8Cgt"  class="btn btn-success" ><i class="fa fa-whatsapp"></i> Grupo Whatsapp </a>
            </div>
            <div class="contact-item">
                <a target="_blank" href="https://t.me/rifasdosertao"  class="btn btn-telegram" ><i class="fa fa-telegram"> Grupo Telegram </i></a>
            </div>
            <div class="contact-item">
                <a target="_blank" href="https://www.instagram.com/rifassdosertao"  class="btn btn-danger" ><i class="fa fa-instagram"></i> <?php echo $this->dados_globais['instagram_formatado'];?> </a>
            </div>
            <div class="contact-item">
                <a class="btn btn-primary" class="custom-link" href="mailto:<?php echo $this->dados_globais['email_formatado'];?>"><i class="fa fa-envelope-o"></i> <?php echo $this->dados_globais['email_formatado'];?> </a>
            </div>
        </div>


    </div>

</section>