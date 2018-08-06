<?php

/*
 * Classe ArquivosGeral_Model
 * 
 * Contém os comandos SQL ou do CodeIgniter para consulta e manipulação da
 * tabela arquivogeral do banco de dados.
 * 
 * @author Thales Castro
 * 
 */

class ArquivosGeral_Model extends CI_Model {
    
    /*
     * Seleção
     * 
     * Seleciona todos os arquivos da conversa coletiva registrados no banco 
     * de dados, bem como o usuário (user) que mandou cada arquivo para o servidor.
     * 
     * @return resultado da consulta no banco de dados.
     * 
     */

    public function select() {
        $sql = "SELECT ag.*, u.apelido AS user ";
        $sql .= "FROM arquivogeral ag ";
        $sql .= "INNER JOIN usuario u ON ag.usuario_id = u.id ";
        $sql .= "ORDER BY ag.id";
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

    public function insert($arquivogeral) {
        return $this->db->insert('arquivogeral', $arquivogeral);
    }

}
