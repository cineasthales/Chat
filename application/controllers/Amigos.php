<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Amigos
 * 
 * Carrega todos os usuários que estão cadastrados no banco de dados. 
 * 
 * @author Thales Castro
 * 
 */

class Amigos extends CI_Controller {

    /*
     * Index
     * 
     * Se usuário não estiver logado, redirecionar para a controller de login.
     * Se estiver logado, carregar todos os usuários do banco de dados e mandar
     * para a view com a lista de amigos.
     * 
     */
    
    public function index() {
        if (!$this->session->logado) {
            redirect('home');
        } else {
            $this->load->model('Usuarios_Model', 'usuarios');
            $dados['usuarios'] = $this->usuarios->select();
            $this->load->view('inc/header');
            $this->load->view('inc/nav');
            $this->load->view('amigos_view', $dados);
            $this->load->view('inc/footer');
        }
    }

}
