<?php class MY_Controller extends CI_Controller
{

    public $dados_globais;

    function __construct()
    {
        parent::__construct();
        $c = get_instance();

        $this->dados_globais['caminho_upload']          = getcwd() . '/assets/img/rifas/';
        $this->dados_globais['caminho_upload_img']      = getcwd() . '/assets/img/';
        $this->dados_globais['caminho_externo_upload']  = site_url( '/assets/img/rifas/');
        $this->dados_globais['caminho_externo_img']     = site_url( '/assets/img/');
        $this->dados_globais['whatsapp']                = '5587999660592';
        $this->dados_globais['whatsapp_formatado']      = '+55 (87) 9 9966-0592';
        $this->dados_globais['instagram_formatado']     = '@rifassdosertao';
        $this->dados_globais['email_formatado']         = 'contato@rifasdosertao.com.br';


        function pre( $content ) {
            echo "<pre>";
            print_r($content);
            echo "</pre>";

        }
    }

}

?>