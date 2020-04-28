<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends My_Controller {


	public function index()
	{
        redirect($this->router->class . '/login');
	}

	public function login() {

	    if ( false ) {
	        redirect( $this->router->class . '/listar');
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
                echo "Autenticado!";
                $this->nativesession->set('autenticado', true);
                $this->nativesession->set('usuario', $login->row()->login);
                redirect( $this->router->class . '/home');
            } else {
                redirect( $this->router->class . '/login?login=error');
            }
            echo pre($this->input->post()); exit;
        }
    }

    public function home() {

        $this->load->view('estruturas/menu_adm');
        $this->load->view($this->router->class . '/home');
        $this->load->view('estruturas/footer_adm');

    }

    public function rifas() {

	    $this->load->model('rifa');

        $data['objetos'] = $this->rifa->getAll()->result();


        $this->load->view('estruturas/menu_adm', $data);
        $this->load->view($this->router->class . '/rifas');
        $this->load->view('estruturas/footer_adm');
    }
}
