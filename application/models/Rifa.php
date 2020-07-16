<?php

class Rifa extends CI_Model  {

    var $table 	    = 'item_rifado';

    function getByID( $codigo, $ativo = false ) {

        if ( $ativo ) {
            return $this->db->select('*')
                ->where("id = $codigo")
                ->where("ativo = 1")
                ->get($this->table);
        } else {
            return $this->db->select('*')
                ->where("id = $codigo")
                ->get($this->table);
        }

    }
    function getLastInsert( ) {

        return $this->db->select('*')
                        ->order_by('id desc')
                        ->get($this->table);

    }

    function getCarousel( $status = false ) {
        if ( $status ) {
            return $this->db->query("select a.id, a.nome, a.descricao, a.sorteio, a.valor, b.id as id_imagem, b.extensao from item_rifado a inner join imagem_slider b on a.id = b.item_rifado where a.cliente_ganhador is null and a.ativo = 1");
        } else {
            return $this->db->query("select a.id, a.nome, a.descricao, a.sorteio, a.valor, b.id as id_imagem, b.extensao from item_rifado a inner join imagem_slider b on a.id = b.item_rifado where a.cliente_ganhador is null");
        }
    }


    function getAll( $status = false ) {

        if ( $status ) {
            return $this->db->select('*')
                ->where("ativo = 1")
                ->get($this->table);
        } else {
            return $this->db->select('*')
                ->get($this->table);
        }

    }

    function getByStatus( $status = null ) {


        $sql = "select * from item_rifado";
        if ( $status == '1' ) {
            $sql .= " where ativo = 1";
        } else if ( $status == '0' ) {
            $sql .= " where ativo = 0 or ativo is null";
        } else {
            $sql .= " where 1 = '1'";
        }
        return $this->db->query($sql);

    }

    function salvar( $nome, $descricao, $sorteio, $valor, $qtd_centena ) {

        $data = array(
            'nome'             => $nome,
            'descricao'        => $descricao,
            'sorteio'          => $sorteio,
            'valor'            => $valor,
            'qtd_centena'      => $qtd_centena,
            'ativo'            => 1,
        );

        $this->db->insert($this->table, $data);

    }

    function atualizar($id, $nome, $descricao, $sorteio, $valor, $qtd_centena ) {

        $data = array(
            'id'          => $id,
            'nome'        => $nome,
            'descricao'   => $descricao,
            'sorteio'     => $sorteio,
            'valor'       => $valor,
            'qtd_centena' => $qtd_centena,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function alterar_status($id, $status ) {

        $data = array(
            'id'          => $id,
            'ativo'       => $status,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }



    function atualizar_sorteio( $sorteio, $centena, $cliente ) {

        $data = array(
            'centena'          => $centena,
            'cliente_ganhador' => $cliente,
        );

        $this->db->where('id', $sorteio);
        $this->db->update($this->table, $data);
    }

}

?>