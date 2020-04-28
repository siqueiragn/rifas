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

        $data['reservados'] = null;
        $data['comprados'] = null;

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
}
