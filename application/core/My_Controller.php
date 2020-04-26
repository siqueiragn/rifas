<?php class MY_Controller extends CI_Controller
{

    public $dados_globais;

    function __construct()
    {
        parent::__construct();
        $c = get_instance();

        function pre( $content ) {
            echo "<pre>";
            print_r($content);
            echo "</pre>";

        }
    }

}

?>