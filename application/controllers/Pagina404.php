<?php

class Pagina404 extends MY_Controller {

	public function index()
	{
        $this->load->view('estruturas/menu');
        $this->load->view('estruturas/404');
        $this->load->view('estruturas/footer');
	}

}
