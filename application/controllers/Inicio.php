<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Inicio
 * 
 * Mostra a tela de início para o usuário logado, com lista
 * de amigos para conversar.
 * 
 * @author Thales Castro     
 * 
 */

class Inicio extends CI_Controller {

    /*
     * Index
     * 
     * Se usuário estiver logado, carregar todos os usuários do banco de dados
     * e mandá-los para a view de início. 
     * Se não estiver logado, redirecionar para a controller de login.
     * 
     */
    
    public function index() {
        if ($this->session->logado) {
            $this->load->model('Usuarios_Model', 'usuarios');
            $dados['usuarios'] = $this->usuarios->select(); 
            $this->load->view('inc/header');
            $this->load->view('inc/nav');
            $this->load->view('inicio_view', $dados);
            $this->load->view('inc/footer');
        } else {
            redirect('home');
        }
    }
    
}
