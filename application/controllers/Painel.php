<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends My_Controller {


	public function index()
	{
        redirect($this->router->class . '/login');
	}

	public function login() {

	    if ( $this->nativesession->get('autenticado') ) {
	        redirect( $this->router->class . '/home');
        } else {

            $this->load->view('estruturas/menu');
            $this->load->view($this->router->class . '/login');
            $this->load->view('estruturas/footer');
        }

    }

    public function checkLogin() {


	    if ( $this->input->post() ) {

            $this->load->model('usuario');

            $login = $this->usuario->login( $this->input->post('usuario'), $this->input->post('senha') );
            if ( $login->num_rows() > 0 ) {
                $this->nativesession->set('autenticado', true);
                $this->nativesession->set('usuario', $login->row()->login);
                redirect( $this->router->class . '/home');
            } else {
                redirect( $this->router->class . '/login?login=error');
            }
         }
    }

    public function home() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->view('estruturas/menu_adm');

            $fileList = glob( $this->dados_globais['caminho_logs'] . '*' );

//Loop through the array that glob returned.
            foreach($fileList as $filename){
                $handle = fopen($filename, 'r+');
                $caminho = explode("logs/", $filename);

                $caminho[1] = str_replace('.txt', "", $caminho[1]);
                $nome = substr($caminho[1], 6, 2);
                $nome .= '/' . substr($caminho[1], 4, 2);
                $nome .= '/' . substr($caminho[1], 0, 4);
                if ( $nome != 'ht/x./inde') 
                    @$dados[] = array($nome, (1 * fread($handle, 512)) );
                fclose($handle);
            }

            $data['dados'] = json_encode($dados);

            $this->load->view($this->router->class . '/home', $data);
            $this->load->view('estruturas/footer_adm');

        } else {
            redirect( $this->router->class . '/login?login=error');
        }

    }

    public function rifas() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('rifa');

            $data['objetos'] = $this->rifa->getAll()->result();


            $this->load->view('estruturas/menu_adm', $data);
            $this->load->view($this->router->class . '/rifas');
            $this->load->view('estruturas/footer_adm');

        } else {
            redirect( $this->router->class . '/login?login=error');
        }
    }
}
