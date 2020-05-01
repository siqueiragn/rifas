<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centenas extends My_Controller {


	public function index()
	{
        redirect($this->router->class . '/listar');
	}


	public function listar() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('centena');

            $cliente    = $this->input->get('nome');
            $telefone   = preg_replace("/[^0-9]/", '', $this->input->get('telefone'));
            $status     = $this->input->get('status') ? $this->input->get('status') : 1;

            $data['objetos'] = $this->centena->getAllJoinClient($cliente, $telefone, $status)->result();

            $this->load->view('estruturas/menu_adm');
            $this->load->view($this->router->class . '/listar', $data);
            $this->load->view('estruturas/footer_adm');

        }

    }

    public function aprovar() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('centena');
            $this->centena->aprovar($this->uri->segment(3));

            redirect( $this->router->class . '/listar');
        } else {
            redirect();
        }
    }

    public function recusar() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('centena');
            $this->centena->recusar($this->uri->segment(3));

            redirect( $this->router->class . '/listar');
        } else {
            redirect();
        }
    }

    public function comprovantes() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('cliente');
            $data['cliente'] = $this->cliente->getByID( $this->uri->segment(3) )->row();

            if ( $data['cliente']->id > 0) {
                $this->load->model('comprovante');
                $data['comprovantes'] = $this->comprovante->getByClientID($this->uri->segment(3))->result();


                $this->load->view('estruturas/menu_adm');
                $this->load->view($this->router->class . '/comprovantes', $data);
                $this->load->view('estruturas/footer_adm');
            } else {
                redirect();
            }
        } else {
            redirect();
        }
    }

    public function download_comprovante()
    {

        $arquivo     = $this->input->get('comprovante');
        $cliente     = $this->input->get('cliente');
        $base        = $this->dados_globais['caminho_upload_img'] . 'comprovantes';

        $local_file     = "$base/$cliente/$arquivo";
        $download_file  = $arquivo;

        // set the download rate limit (=> 20,5 kb/s)
        $download_rate = 200.5;
        if(file_exists($local_file) && is_file($local_file))
        {
            header('Cache-control: private');
            header('Content-Type: application/octet-stream');
            header('Content-Length: '.filesize($local_file));
            header('Content-Disposition: filename='.$download_file);

            flush();
            $file = fopen($local_file, "r");
            while(!feof($file))
            {
                // send the current file part to the browser
                print fread($file, round($download_rate * 1024));
                // flush the content to the browser
                flush();
                // sleep one second
                sleep(1);
            }
            fclose($file);}
        else {
            die('Arquivo não existente');
        }

    }



}
