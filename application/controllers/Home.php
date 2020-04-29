<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {


	public function index()
	{

        $this->load->model('rifa');
        $data['objetos'] = $this->rifa->getByID( 9 )->result();

        $this->load->view('estruturas/menu');
		$this->load->view($this->router->class . '/home', $data);
		$this->load->view('estruturas/footer');
	}
}
