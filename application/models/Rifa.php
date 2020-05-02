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
        return $this->db->query("select a.id, a.nome, a.descricao, a.sorteio, a.valor, b.id as id_imagem, b.extensao from item_rifado a inner join imagens b on a.id = b.item_rifado where b.id in (select min(id) from imagens group by item_rifado) and a.cliente_ganhador is null");
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