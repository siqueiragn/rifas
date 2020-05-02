<?php

class Imagem extends CI_Model  {

    var $table 	    = 'imagens';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByItemID( $codigo ) {

        return $this->db->select('*')
                        ->where("item_rifado = $codigo")
                        ->get($this->table);

    }
    function getFirst( $codigo ) {

        return $this->db->select('*')
                        ->where("item_rifado = $codigo")
                        ->order_by('id ASC')
                        ->get($this->table)->row();

    }

    function salvar( $extensao, $item_rifado ) {

        $data = array(
            'extensao'     => $extensao,
            'item_rifado'  => $item_rifado,
        );

        $this->db->insert($this->table, $data);

    }

    function remover( $id ) {
        $this->db->query( "delete from $this->table where id = $id" );
    }


}

?>