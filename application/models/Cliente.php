<?php

class Cliente extends CI_Model  {

    var $table 	    = 'clientes';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByIdGanhador( $codigo ) {

        return $this->db->query("select a.nome, a.telefone, b.numero from clientes a inner join centenas b on a.id = b.cliente where a.id = $codigo");
    }

    function verificarExistente( $nome, $telefone ) {

        return $this->db->query("select * from clientes where lower(nome) = lower('$nome') and telefone = '$telefone'");
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