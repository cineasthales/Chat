<?php

/*
 * Classe Usuarios_Model
 * 
 * Contém os comandos SQL ou do CodeIgniter para consulta e manipulação da
 * tabela usuario do banco de dados.
 * 
 * @author Thales Castro
 * 
 */

class Usuarios_Model extends CI_Model {
    
    /*
     * Seleção
     * 
     * Seleciona todos os usuários registrados no banco de dados,
     * ordenando por nome.
     * 
     * @return resultado da consulta no banco de dados.
     * 
     */

    public function select() {
        $sql = "SELECT * FROM usuario ORDER BY nome";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*
     * Encontra Login
     * 
     * Busca uma combinação de e-mail e senha registrados no banco de dados.
     * 
     * @return resultado da consulta no banco de dados.
     * 
     */
    
    public function findlogin($email, $senha) {
        $sql = "SELECT * FROM usuario WHERE email=? AND senha=?";
        $query = $this->db->query($sql, array($email, $senha));
        return $query->row();
    }
}
