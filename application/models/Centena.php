<?php

class Centena extends CI_Model  {

    var $table 	    = 'centenas';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByItemID( $codigo ) {

        return $this->db->query("SELECT * FROM $this->table A LEFT JOIN clientes B ON A.cliente = B.id WHERE item_rifado = $codigo");

    }

    function getAllJoinClient( $cliente = null, $telefone = null, $status = null) {
        $sql = "SELECT DISTINCT d.cliente AS comprovante, a.id, a.numero, a.status, a.adquirido, b.id AS cliente_id, b.nome, b.telefone, c.id as rifa_id, c.nome as rifa_nome from centenas a left join clientes b on a.cliente = b.id left join item_rifado c on a.item_rifado = c.id left join comprovantes d on d.cliente = b.id  where c.cliente_ganhador is null";

        if ( $cliente != null ) {
            $sql .= " AND LOWER(b.nome) LIKE LOWER('%$cliente%') ";
        }

        if ( $telefone != null ) {
            $sql .= " AND b.telefone = '$telefone' ";
        }

        if ( $status ) {
            $sql .= " AND a.status = $status";
        }
        return $this->db->query( $sql );
    }

    function getByTelefone($telefone, $pendente = false) {

        $sql = "select distinct  a.id, a.numero, a.status, a.adquirido, b.id as cliente_id, b.nome, b.telefone, c.id as rifa_id, c.nome as rifa_nome from centenas a left join clientes b on a.cliente = b.id left join item_rifado c on a.item_rifado = c.id  where b.telefone = '$telefone' and  c.cliente_ganhador is null ";
        if ( $pendente ) {
            $sql .= "  and c.id   not in (select item_rifado from comprovantes)";
        }
        return $this->db->query($sql);

    }

    function buscar_telefone($telefone, $rifa) {

        $sql = "select a.numero from centenas a left join clientes b on a.cliente = b.id left join item_rifado c on a.item_rifado = c.id  where b.telefone = '$telefone' and  a.item_rifado = $rifa ";

        return $this->db->query($sql);

    }

    function aprovar($id) {
        $data = array(
            'status'          => 2
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }


    function recusar($id) {
        $data = array(
            'status'          => 3
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }


    function verificar_disponibilidade($rifa, $numero) {
        return $this->db->query("SELECT * FROM $this->table WHERE item_rifado = $rifa and numero = $numero AND status <> 2");
    }

    function reservar( $numero, $cliente, $item_rifado, $adquirido ) {

        $data = array(
            'numero'           => $numero,
            'cliente'          => $cliente,
            'item_rifado'      => $item_rifado,
            'adquirido'        => $adquirido,
            'status'           => 1,
        );

        $this->db->insert($this->table, $data);

    }


}

?>