<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rifas extends My_Controller {


	public function index()
	{
        redirect($this->router->class . '/listar');
	}


	public function listar() {


        $this->load->model('rifa');

        $data['objetos'] = $this->rifa->getAll( true )->result();

        $this->load->view('estruturas/menu');
        $this->load->view($this->router->class . '/listar', $data);
        $this->load->view('estruturas/footer');

    }
	public function consultar() {

        $this->load->model('rifa');

        $data['objeto'] = $this->rifa->getByID( $this->uri->segment(3), true )->row();

        if ( $data['objeto'] ) {

            $this->load->model('centena');

            $centenas = $this->centena->getByItemID($this->uri->segment(3));

            $data['reservados'] = array();
            $data['comprados'] = array();

            if ($centenas->num_rows() > 0) {

                foreach ($centenas->result() as $indice => $centena) {

                    if ($centena->status == 1) {
                        $data['reservados'][] = $centena->numero;
                        $data['textos'][$centena->numero] = 'Reservado por ' . $centena->nome;
                    } else if ($centena->status == 2) {
                        $data['comprados'][] = $centena->numero;
                        $data['textos'][$centena->numero] = 'Comprado por ' . $centena->nome;

                    } else {
                        continue;
                    }

                }

            }

            $this->load->view('estruturas/menu');
            $this->load->view($this->router->class . '/consultar', $data);
            $this->load->view('home/pagamentos');
            $this->load->view('estruturas/footer');
        } else {
            redirect();
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

            $data['slider'] = $this->imagem->buscar_slider( $this->uri->segment(3) );

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

                $nome        = $this->input->post('nome');
                $descricao   = $this->input->post('descricao');
                $sorteio     = $this->input->post('sorteio');
                $valor       = $this->input->post('valor');
                $qtd_centena = $this->input->post('qtd_centenas');


                $this->load->model('rifa');
                $this->rifa->salvar($nome, $descricao, $sorteio, $valor, $qtd_centena);
                $idRifa = $this->db->insert_id();


                $this->load->model('imagem');
                if ( file_exists($_FILES['logo']['tmp_name']) ) {

                    $temp = explode(".", $_FILES["logo"]["name"]); // extensão

                    $this->imagem->salvar_slider( $temp[1], $idRifa );
                    if ( !is_dir($this->dados_globais['caminho_upload'] . "$idRifa") ) {
                        mkdir($this->dados_globais['caminho_upload'] . "$idRifa", 0777, true );
                    }
                    move_uploaded_file($_FLES['logo']['tmp_name'], $this->dados_globais['caminho_upload'] . "$idRifa/logo_rifa." . $temp[1] );

                }

                foreach ($_FILES['arquivos']['tmp_name'] as $i=>$tmp) {

                    if ( file_exists($tmp) ) {
                        $temp = explode(".", $_FILES["arquivos"]["name"][$i]); // extensão

                        $this->imagem->salvar( $temp[1], $idRifa );
                        $idImagem = $this->db->insert_id();
                        if ( !is_dir($this->dados_globais['caminho_upload'] . "$idRifa") ) {
                            mkdir($this->dados_globais['caminho_upload'] . "$idRifa", 0777, true );
                        }
                        move_uploaded_file($tmp, $this->dados_globais['caminho_upload'] . "$idRifa/$idImagem." . $temp[1] );
                    }
                }

                redirect( 'painel/rifas' );

            }
        } else {
	        redirect();
        }

    }

    public function sortear()
    {

        if ($this->nativesession->get('autenticado')) {

            $this->load->model('rifa');
            $data['objeto'] = $this->rifa->getByID( $this->uri->segment(3) )->row();


            $this->load->view('estruturas/menu_adm');
            $this->load->view($this->router->class . '/sortear', $data);
            $this->load->view('estruturas/footer_adm');

        }

    }

    public function consultar_centena() {

        if ($this->nativesession->get('autenticado') && $this->input->get()) {

            $centena = $this->input->get('centena');
            $sorteio = $this->input->get('sorteio');

            $this->load->model('centena');

            $resultado = $this->centena->verificar_pagos( $sorteio, $centena );
            if ( $resultado->num_rows() == 0) {

                echo "N{QUEBRA}Essa centena não foi adquirida ou o pagamento não foi confirmado!";

            } else {
                $this->load->model('cliente');
                $numero = $resultado->row();
                $cliente = $this->cliente->getByID($numero->cliente)->row();

                echo "S{QUEBRA}$cliente->nome{QUEBRA}$cliente->telefone{QUEBRA}$cliente->id{QUEBRA}$numero->id";
            }
        }

    }

    public function db_sortear() {

        if ($this->nativesession->get('autenticado') && $this->input->post()) {

            $centena    = $this->input->post('centena');
            $sorteio    = $this->input->post('sorteio');
            $cliente    = $this->input->post('cliente_id');
            $centena_id = $this->input->post('centena_id');

            $this->load->model('rifa');
            $this->rifa->atualizar_sorteio( $sorteio, $centena_id, $cliente );
            redirect( "rifas/consultar/$sorteio" );
        }
        redirect( );

    }

    public function db_editar() {

        if ( $this->nativesession->get('autenticado') ) {

            if ($this->input->post()) {
                $rifa        = $this->input->get('id');
                $nome        = $this->input->post('nome');
                $descricao   = $this->input->post('descricao');
                $sorteio     = $this->input->post('sorteio');
                $valor       = $this->input->post('valor');
                $qtd_centena = $this->input->post('qtd_centenas');


                $this->load->model('rifa');
                $this->rifa->atualizar($rifa, $nome, $descricao, $sorteio, $valor, $qtd_centena);

                $this->load->model('imagem');

                if ( file_exists($_FILES['logo']['tmp_name']) ) {

                    $logo = $this->imagem->buscar_slider($rifa);


                    if ( $logo->num_rows() > 0 ) {

                        $temp = explode(".", $_FILES["logo"]["name"]);

                        $idSlider = $this->input->post('id_slider');
                        $this->imagem->atualizar_slider( $idSlider, $temp[1], $rifa);

                    } else {
                        $temp = explode(".", $_FILES["logo"]["name"]); // extensão

                        $this->imagem->salvar_slider($temp[1], $rifa);
                    }


                    if (!is_dir($this->dados_globais['caminho_upload'] . "$rifa")) {
                        mkdir($this->dados_globais['caminho_upload'] . "$rifa", 0777, true);
                    }
                    move_uploaded_file($_FILES['logo']['tmp_name'], $this->dados_globais['caminho_upload'] . "$rifa/logo_rifa." . $temp[1]);

                }

                if ( $this->input->post('remover_imagem')) {
                    foreach ( $this->input->post('remover_imagem') as $indice=>$id) {

                        $imagem = $this->imagem->getByID($id)->row();
                        unlink( $this->dados_globais['caminho_upload_img'] . "/rifas/{$rifa}/{$id}.{$imagem->extensao}");
                        $this->imagem->remover($id);
                    }
                }

                foreach ($_FILES['arquivos']['tmp_name'] as $i=>$tmp) {

                    if ( file_exists($tmp) ) {
                        $temp = explode(".", $_FILES["arquivos"]["name"][$i]); // extensão

                        $this->imagem->salvar( $temp[1], $rifa );
                        $idImagem = $this->db->insert_id();
                        if ( !is_dir($this->dados_globais['caminho_upload'] . "$rifa") ) {
                            mkdir($this->dados_globais['caminho_upload'] . "$rifa", 0777, true );
                        }
                        move_uploaded_file($tmp, $this->dados_globais['caminho_upload'] . "$rifa/$idImagem." . $temp[1] );
                    }
                }

                redirect( 'painel/rifas' );

            }

        }

    }


    public function metodoPagamento() {


        if ( $this->input->post() && $this->uri->segment(3) != '' ) {

            $this->load->model('rifa');

            $data['rifa']          = $this->rifa->getByID($this->uri->segment(3))->row();
            $data['numeros']       = explode(",", $this->input->post('numeros'));
            $data['nome_completo'] = $this->input->post('nome_completo');
            $data['telefone']      = $this->input->post('telefone');
            $telefone_limpo        = preg_replace("/[^0-9]/", '', $data['telefone']);

            $this->load->model('cliente');
            $cliente = $this->cliente->verificarExistente($data['nome_completo'], $telefone_limpo)->row();
            if ( $cliente ) {
                $data['cliente'] = $cliente->id;
            } else {
                $this->cliente->salvar($data['nome_completo'], $telefone_limpo);
                $data['cliente'] = $this->db->insert_id();

            }


            $this->load->view('estruturas/menu');
            $this->load->view($this->router->class . '/pagamento', $data);
            $this->load->view( 'home/pagamentos');
            $this->load->view('estruturas/footer');
        }
    }

    public function reservar() {

	    if ( $this->input->post()) {

	        $numeros  = explode(",", $this->input->post('numeros'));
	        $rifa     = $this->input->post('rifa');
	        $nome     = $this->input->post('nome_completo');
	        $telefone = $this->input->post('telefone');
	        $cliente  = $this->input->post('cliente');

            $numerosComErros = array();
            $numerosReservados = array();
	        $this->load->model('centena');
	        foreach($numeros as $numero) {
                if ( $this->centena->verificar_disponibilidade($rifa, $numero)->num_rows() == 0) {

                    $this->centena->reservar($numero, $cliente, $rifa, date('d/m/Y H:i:s'));
                    array_push($numerosReservados, $numero);

                } else {
                    array_push($numerosComErros, $numero);
                }
	        }

	        if ( count($numerosComErros) ) {
                echo "Ocorreu um problema, os seguintes números já foram reservados: " . implode(", ", $numerosComErros) . '<br>';
            }

            if ( count($numerosComErros) == count($numeros) ) {
	            echo "Nenhum número pode ser reservado!<br>";
            } else {
                echo "Reserva realizada com sucesso para os seguintes números: " . implode(", ", $numerosReservados) . ", envie seu comprovante de pagamento anexando-o abaixo ou via Whatsapp!<br>";
                echo "<button type=\"button\" class=\"btn btn-primary\"  data-toggle=\"modal\" data-target=\"#modal_compra\">Enviar Comprovante <i class=\"fa fa-cloud-upload\"></i></button>";
                echo "<a target='_blank' href='https://api.whatsapp.com/send?phone=" . $this->dados_globais['whatsapp'] . "&text=Ol%C3%A1%2C%20meu%20nome%20%C3%A9%20" . urlencode($nome) . "'  class=\"btn btn-success\" >Enviar Comprovante <i class=\"fa fa-whatsapp\"></i></a>";
            }

        }

    }

    public function habilitar() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('rifa');

            $this->rifa->alterar_status($this->uri->segment(3), 1);

            redirect( 'painel/rifas/'  );
        } else {
            redirect();
        }
    }

    public function desativar() {

        if ( $this->nativesession->get('autenticado') ) {

            $this->load->model('rifa');

            $this->rifa->alterar_status($this->uri->segment(3), 0);

            redirect( 'painel/rifas/' );
        } else {
            redirect();
        }
    }

    public function enviar_comprovantes() {


	    $cliente = $this->input->post('cliente');
	    $item_rifado = $this->input->post('rifa');
        $this->load->model('comprovante');

        $permitidas = array('jpg', 'png', 'jpeg', 'pdf');
        foreach ($_FILES['comprovantes']['tmp_name'] as $i=>$tmp) {
            $temp = explode(".", $_FILES["comprovantes"]["name"][$i]); // extensão

            if ( in_array( mb_strtolower($temp[1]), $permitidas) ) {
                $this->comprovante->salvar($temp[1], $cliente, 0, $item_rifado, date('d/m/Y H:i:s'));
                $id = $this->db->insert_id();
                if (!is_dir($this->dados_globais['caminho_upload_img'] . "comprovantes/$cliente")) {
                    mkdir($this->dados_globais['caminho_upload_img'] . "comprovantes/$cliente", 0777, true);
                }
                move_uploaded_file($tmp, $this->dados_globais['caminho_upload_img'] . "comprovantes/$cliente/$id." . $temp[1] );
            }

        }

        redirect($this->router->class . '/consultar/' . $item_rifado);


    }

    function consultar_numeros() {

	    if ( $this->input->post()) {
            $this->load->model('centena');
            $centenas = $this->centena->buscar_telefone($this->input->post('telefone'), $this->input->post('rifa'))->result();
            $aux = array();
            foreach ($centenas as $linha) {
                array_push($aux, $linha->numero);
            }

            if ( count($centenas) > 0) {

                echo implode(",", $aux);
            } else {
                echo "N";
            }
        }
    }
}
