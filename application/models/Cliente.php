<?php

class Cliente extends CI_Model  {

    var $table 	    = 'clientes';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByIdGanhador( $codigo ) {

        return $this->db->query("SELECT a.nome, a.telefone, b.numero FROM CLIENTES A INNER JOIN CENTENAS B ON A.ID = B.CLIENTE WHERE A.ID = $codigo");
    }

    function verificarExistente( $nome, $telefone ) {

        return $this->db->query("SELECT * FROM CLIENTES WHERE LOWER(nome) = LOWER('$nome') and telefone = '$telefone'");
    }


    function getAll() {

        return $this->db->select('*')
                        ->get($this->table);

    }

    function salvar( $nome, $telefone ) {

        $data = array(
            'nome'             => $nome,
            'telefone'         => $telefone,
        );

        $this->db->insert($this->table, $data);

    }

}

?>