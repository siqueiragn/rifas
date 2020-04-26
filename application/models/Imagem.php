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


}

?>