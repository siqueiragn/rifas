<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {


	public function index()
	{

        $this->load->model('rifa');
        $data['objeto'] = $this->rifa->getLastInsert( )->row();

        $this->load->view('estruturas/menu');
		$this->load->view($this->router->class . '/home', $data);
		$this->load->view('estruturas/footer');
	}

	public function pagamentos() {

        $this->load->view('estruturas/menu');
        $this->load->view($this->router->class . '/cliente_area');
        $this->load->view($this->router->class . '/pagamentos');
        $this->load->view('estruturas/footer');

    }

    public function buscar_numeros() {

	    if ( $this->input->post()) {

	        $telefone = $this->input->post('telefone');

	        $this->load->model('centena');
	        $data['centenas'] = $this->centena->getByTelefone($telefone, true)->result();

	        if ( count($data['centenas']) > 0 ) {

                $this->load->view($this->router->class . '/listagem_numeros', $data);

            } else {
	            echo "<h5 class='text-center'>Sem resultados encontrados para esse telefone!</h5>";
            }

        }

    }
}
