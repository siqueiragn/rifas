<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rifas extends My_Controller {


	public function index()
	{
        redirect($this->router->class . '/listar');
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

    public function db_criar() {

	    if ( $this->nativesession->get('autenticado') ) {
            if ($this->input->post()) {
                echo pre($this->input->post());
            }
        } else {
	        redirect();
        }

    }
}
