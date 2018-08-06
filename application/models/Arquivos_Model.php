<?php

/*
 * Classe Arquivos_Model
 * 
 * Contém os comandos SQL ou do CodeIgniter para consulta e manipulação da
 * tabela arquivo do banco de dados.
 * 
 * @author Thales Castro
 * 
 */

class Arquivos_Model extends CI_Model {

    /*
     * Seleção de Arquivos
     * 
     * Seleciona todos os arquivos registrados no banco de dados em conversas
     * privadas entre dois usuários (user1 e user2).
     * 
     * @param int $id1 identificação do primeiro usuário
     * @param int $id2 identificação do segundo usuário
     * @param int $id2 identificação do segundo usuário
     * @param int $id1 identificação do primeiro usuário
     * @return resultado da consulta no banco de dados.
     * 
     */
    
    public function selectArq($id1, $id2, $id2, $id1) {
        $sql = "SELECT a.*, u1.apelido AS user1, u2.apelido AS user2 ";
        $sql .= "FROM arquivo a ";
        $sql .= "INNER JOIN usuario u1 ON a.usuario1_id = u1.id ";
        $sql .= "INNER JOIN usuario u2 ON a.usuario2_id = u2.id ";
        $sql .= "WHERE usuario1_id =? AND usuario2_id =? ";
        $sql .= "OR (usuario1_id =? AND usuario2_id =?) ";
        $sql .= "ORDER BY a.id";
        $query = $this->db->query($sql, array($id1, $id2, $id2, $id1));
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

    public function insert($arquivo) {
        return $this->db->insert('arquivo', $arquivo);
    }

}
