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
	public function consultar() {

        $this->load->model('rifa');

        $data['objeto'] = $this->rifa->getByID( $this->uri->segment(3) )->row();

        $this->load->model('centena');

        $centenas = $this->centena->getByItemID( $this->uri->segment(3) );

        $data['reservados'] = array();
        $data['comprados'] = array();

        if ( $centenas->num_rows() > 0 ) {

            foreach ($centenas->result() as $indice=>$centena) {

                if ( $centena->status == 1) {
                    $data['reservados'][] = $centena->numero;
                    $data['textos'][$centena->numero] = 'Reservado por ' . $centena->nome;
                } else if ( $centena->status == 2) {
                    $data['comprados'][] = $centena->numero;
                    $data['textos'][$centena->numero] = 'Comprado por ' . $centena->nome;

                } else {
                     continue;
                }

            }

        }


        $this->load->view('estruturas/menu');
        $this->load->view($this->router->class . '/consultar', $data);
        $this->load->view('estruturas/footer');
    }

    public function metodoPagamento() {


	    if ( $this->input->post() ) {
	        echo pre($this->input->post()); exit;
        }
    }

    public function criar() {

	    if ( $this->nativesession->get('autenticado') ) {
            $this->load->view('estruturas/menu_adm');
            $this->load->view($this->router->class . '/criar');
            $this->load->view('estruturas/footer_adm');
        } else {
	        redirect();
        }

    }
    public function editar() {


        if ( $this->nativesession->get('autenticado') ) {
            $this->load->model('rifa');

            $data['objeto'] = $this->rifa->getByID( $this->uri->segment(3) )->row();

            $this->load->model('imagem');

            $data['imagens'] = $this->imagem->getByItemID( $this->uri->segment(3) );

            //$this->load->model('centena');

            //$centenas = $this->centena->getByItemID( $this->uri->segment(3) );

            $this->load->view('estruturas/menu_adm');
            $this->load->view($this->router->class . '/editar', $data);
            $this->load->view('estruturas/footer_adm');
        } else {
	        redirect();
        }

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

    public function db_editar() {

        if ( $this->nativesession->get('autenticado') ) {

            if ($this->input->post()) {
                $id = $this->input->get('id');
                // todo salvar atualizações
                // todo criar thumbnail imagens
                // todo remover imagens
                
                exit;
            }

        }

    }
}
