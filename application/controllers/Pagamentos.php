<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rifas extends My_Controller {


	public function index()
	{
        redirect($this->router->class . '/listar');
	}


	public function listar() {


        $this->load->model('rifa');

        $data['objetos'] = $this->rifa->getAll()->result();

        $this->load->view('estruturas/menu');
        $this->load->view($this->router->class . '/listar', $data);
        $this->load->view('estruturas/footer');

    }
    public function db_criar() {

	    if ( $this->nativesession->get('autenticado') ) {
            if ($this->input->post()) {

                $nome      = $this->input->post('nome');
                $descricao = $this->input->post('descricao');
                $sorteio   = $this->input->post('sorteio');
                $valor     = $this->input->post('valor');


                $this->load->model('rifa');
                $this->rifa->salvar($nome, $descricao, $sorteio, $valor);
                $idRifa = $this->db->insert_id();


                $this->load->model('imagem');
                foreach ($_FILES['arquivos']['tmp_name'] as $i=>$tmp) {
                    $temp = explode(".", $_FILES["arquivos"]["name"][$i]); // extensão

                    $this->imagem->salvar( $temp[1], $idRifa );
                    $idImagem = $this->db->insert_id();
                    if ( !is_dir($this->dados_globais['caminho_upload'] . "$idRifa") ) {
                        mkdir($this->dados_globais['caminho_upload'] . "$idRifa", 0777, true );
                    }
                    move_uploaded_file($tmp, $this->dados_globais['caminho_upload'] . "$idRifa/$idImagem." . $temp[1] );
                }

                redirect( 'painel/rifas' );

            }
        } else {
	        redirect();
        }

    }

}
