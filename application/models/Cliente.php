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