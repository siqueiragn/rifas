<?php

class Rifa extends CI_Model  {

    var $table 	    = 'item_rifado';

    function getByID( $codigo ) {

        return $this->db->select('*')
                        ->where("id = $codigo")
                        ->get($this->table);

    }

    function getByIDView( $codigo, $user ) {

        return $this->db->select('*')
                        ->where("ucpOwn = $user and ID = $codigo")
                        ->get($this->table)->result();

    }

    function getByCharacterID( $codigo ) {

        return $this->db->select('*')
                        ->where("ID = $codigo")
                        ->get($this->table);

    }

    function getByIDToUser( $codigo, $username ) {

        return $this->db->select('*')
                        ->where("ucpOwn = $codigo")
                        ->get($this->table);

    }

    function salvar( $nome, $origem, $idade, $skin, $sexo, $nascimento, $status, $historia, $questao1, $questao2, $idUsuario, $stamp ) {

        $data = array(
            'Username'         => $nome,
            'Origin'           => $origem,
            'Age'              => $idade,
            'Skin'             => $skin,
            'Gender'           => $sexo,
            'Birthdate'        => $nascimento,
            'STATUS'           => $status,
            'ucpOwn'           => $idUsuario,
            'CreateDate'       => $stamp,
            'historia'         => $historia,
            'questao1'         => $questao1,
            'questao2'         => $questao2
        );

        $this->db->insert($this->table, $data);

    }


    function reenviar_aplicacao( $codigo, $nome, $origem, $idade, $skin, $sexo, $nascimento, $status, $historia, $questao1, $questao2, $idUsuario, $stamp ) {

        $data = array(
            'Username'         => $nome,
            'Origin'           => $origem,
            'Age'              => $idade,
            'Skin'             => $skin,
            'Gender'           => $sexo,
            'Birthdate'        => $nascimento,
            'STATUS'           => $status,
            'ucpOwn'           => $idUsuario,
            'CreateDate'       => $stamp,
            'historia'         => $historia,
            'questao1'         => $questao1,
            'questao2'         => $questao2,
            'motivoRecusa'     => '',
            'avaliadoPor'      => '',
        );

        $this->db->where('ID', $codigo);
        $this->db->update($this->table, $data);

    }
    function aprovar( $codigo, $usuario ) {

        $data = array(
            'avaliadoPor'    => $usuario,
            'motivoRecusa'   => '',
            'STATUS'         => 1,
        );

        $this->db->where('ID', $codigo);
        $this->db->update($this->table, $data);

    }

    function recusar( $codigo, $motivo, $usuario ) {

        $data = array(
            'avaliadoPor'    => $usuario,
            'motivoRecusa'   => $motivo,
            'STATUS'         => 2,
        );

        $this->db->where('ID', $codigo);
        $this->db->update($this->table, $data);

    }

    function getAllByUsername( $Charactername ) {

            return $this->db->select('*')
                            ->where("username = '$Charactername'")
                            ->order_by('ID')
                            ->get($this->table);

    }
    function getAllByUserID( $userID ) {

            return $this->db->select('*')
                            ->where("ucpOwn = '$userID'")
                            ->order_by('ID')
                            ->get($this->table);

    }

    function getAllWaiting() {

        return $this->db->query("SELECT a.ID, a.Username, b.uNome FROM accounts a INNER JOIN ucp_users b ON a.ucpOwn = b.uID WHERE a.STATUS = 0 ORDER BY a.ID");

    }

}

?>