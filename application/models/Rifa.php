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

}

?>