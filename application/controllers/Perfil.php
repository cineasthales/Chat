<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Perfil
 * 
 * Mostra a tela com o perfil do usuário logado.
 * 
 * @author Thales Castro     
 * 
 */

class Perfil extends CI_Controller {
    
    /*
     * Index
     * 
     * Se usuário não estiver logado, carregar as views corrrespondentes ao login. 
     * Se estiver logado, carregas as views com o perfil do usuário logado.
     * 
     */

    public function index() {
        if (!$this->session->logado) {
            redirect('home');
        } else {
            $this->load->view('inc/header');
            $this->load->view('inc/nav');
            $this->load->view('perfil_view');
            $this->load->view('inc/footer');
        }
    }

}
