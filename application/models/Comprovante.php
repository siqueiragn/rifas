<?php

class Comprovante extends CI_Model  {

    var $table 	    = 'comprovantes';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByClientID( $codigo ) {

        return $this->db->select('*')
                        ->where("cliente = $codigo")
                        ->order_by('id desc')
                        ->get($this->table);

    }

    function salvar( $extensao, $cliente, $status, $item_rifado, $envio ) {

        $data = array(
            'extensao'     => $extensao,
            'cliente'      => $cliente,
            'status'       => $status,
            'item_rifado'  => $item_rifado,
            'enviado'      => $envio,
        );

        $this->db->insert($this->table, $data);

    }


}

?>