<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Home
 * 
 * Mostra a interface gráfica de login da aplicação, inicia e destrói a sessão.
 * 
 * @author Thales Castro     
 * 
 */

class Home extends CI_Controller {
    
    /*
     * Index
     * 
     * Se usuário não estiver logado, carregar as views corrrespondentes ao login. 
     * Se estiver logado, redirecionar para a controller Inicio.
     * 
     */

    public function index() {
        if (!$this->session->logado) {
            $this->load->view('inc/header');
            $this->load->view('home_view');
            $this->load->view('inc/footer');
        } else {
            redirect('inicio');
        }
    }
    
    /*
     * Logar
     * 
     * Recupera dados do formulário de login. Verifica se os dados estão
     * no banco de dados. Define as variáveis de sessão. Redireciona para a
     * controller Inicio.
     * 
     */

    public function logar() {
        $this->load->model('Usuarios_Model', 'usuarios');
        $email = $this->input->post('logemail');
        $senha = $this->input->post('logsenha');
        $verifica = $this->usuarios->findlogin($email, $senha);

        if (isset($verifica)) {
            $sessao['id'] = $verifica->id;
            $sessao['apelido'] = $verifica->apelido;
            $sessao['nome'] = $verifica->nome;
            $sessao['email'] = $verifica->email;
            $sessao['logado'] = true;
            $this->session->set_userdata($sessao);
        }
        redirect('inicio');
    }
    
    /*
     * Sair
     * 
     * Destrói a sessão e redireciona para a controller de login.
     * 
     */

    public function sair() {
        $this->session->sess_destroy();
        redirect('home');
    }

}
