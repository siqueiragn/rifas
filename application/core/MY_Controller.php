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


        function pre( $content ) {
            echo "<pre>";
            print_r($content);
            echo "</pre>";

        }
    }

}

?>