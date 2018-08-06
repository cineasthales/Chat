<?php

/*
 * Classe Geral_Model
 * 
 * Contém os comandos SQL ou do CodeIgniter para consulta e manipulação da
 * tabela geral do banco de dados.
 * 
 * @author Thales Castro
 * 
 */

class Geral_Model extends CI_Model {
    
    /*
     * Seleção
     * 
     * Seleciona todas as mensagens da conversa coletiva registradas no banco 
     * de dados, bem como o usuário (user) que mandou cada mensagem.
     * 
     * @return resultado da consulta no banco de dados.
     * 
     */

    public function select() {
        $sql = "SELECT g.*, u.apelido AS user ";
        $sql .= "FROM geral g ";
        $sql .= "INNER JOIN usuario u ON g.usuario_id = u.id ";
        $sql .= "ORDER BY g.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*
     * Inserção
     * 
     * Recebe todos os dados por vetor e insere-os no banco de dados por comando
     * do Codeigniter.
     * 
     * @return resultado da manipulação no banco de dados.
     * 
     */

    public function insert($geral) {
        return $this->db->insert('geral', $geral);
    }

}
