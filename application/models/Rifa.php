<?php

class Rifa extends CI_Model  {

    var $table 	    = 'item_rifado';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }
    function getLastInsert( ) {

        return $this->db->select('*')
                        ->order_by('id desc')
                        ->get($this->table);

    }

    function getCarousel() {
        return $this->db->query("select a.id, a.nome, a.descricao, a.sorteio, a.valor, b.id as id_imagem, b.extensao from item_rifado a inner join imagem_slider b on a.id = b.item_rifado where a.cliente_ganhador is null");
    }


    function getAll() {

        return $this->db->select('*')
                        ->get($this->table);

    }

    function salvar( $nome, $descricao, $sorteio, $valor ) {

        $data = array(
            'nome'             => $nome,
            'descricao'        => $descricao,
            'sorteio'          => $sorteio,
            'valor'            => $valor,
        );

        $this->db->insert($this->table, $data);

    }

    function atualizar($id, $nome, $descricao, $sorteio, $valor ) {

        $data = array(
            'id'          => $id,
            'nome'        => $nome,
            'descricao'   => $descricao,
            'sorteio'     => $sorteio,
            'valor'       => $valor,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

}

?>