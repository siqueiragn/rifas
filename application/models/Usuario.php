<?php

class Usuario extends CI_Model  {

    var $table 	    = 'administrador';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function login( $user, $pass ) {
        return $this->db->select('*')
            ->where("login = '$user'")
            ->where("senha = '$pass'")
            ->get($this->table);
    }

    function getByItemID( $codigo ) {

        return $this->db->query("SELECT * FROM $this->table A LEFT JOIN clientes B ON A.cliente = B.id WHERE item_rifado = $codigo");

    }

}

?>