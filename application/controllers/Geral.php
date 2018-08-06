<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Geral
 * 
 * Carrega, atualiza e envia mensagens para o banco de dados em uma conversa coletiva.
 * 
 * @author Thales Castro     
 * 
 */

class Geral extends CI_Controller {

    /*
     * Index
     * 
     * Se usuário estiver logado, carregar todas as mensagens e arquivos da
     * comversa coletiva e manda os dados para as views. 
     * Se usuário não estiver logado, redirecionar para a controller de login.
     * 
     */
    
    public function index() {
        if ($this->session->logado) {
            $this->load->model('Geral_Model', 'geral');
            $this->load->model('ArquivosGeral_Model', 'arquivosgeral');
            $dados['geral'] = $this->geral->select();
            $dados['arquivosgeral'] = $this->arquivosgeral->select();
            $this->load->view('inc/header');
            $this->load->view('inc/nav');
            $this->load->view('chat_top');
            $this->load->view('geral_view1', $dados);
            $this->load->view('geral_view2');
            $this->load->view('geral_view3', $dados);
            $this->load->view('geral_view4');
            $this->load->view('inc/footer');
        } else {
            redirect('home');
        }
    }
    
    /*
     * Atualiza a página do chat 
     * 
     * Carrega do banco de dados as mensagens da conversa coletiva.
     * Esta função é chamada via javascript com timer.
     * 
     */

    public function atualizachat() {
        $this->load->model('Geral_Model', 'geral');
        $dados['geral'] = $this->geral->select();        
        $this->load->view('geral_view1', $dados);
    }
    
    /*
     * Atualiza a página dos arquivos
     * 
     * Carrega do banco de dados os arquivos da conversa coletiva.
     * Esta função é chamada via javascript com timer.
     * 
     */

    public function atualizaarq() {
        $this->load->model('ArquivosGeral_Model', 'arquivosgeral');
        $dados['arquivosgeral'] = $this->arquivosgeral->select();
        $this->load->view('geral_view3', $dados);
    }
    
    /*
     * Envia uma mensagem para o banco de dados
     * 
     * Recupera o corpo da mensagem por post do form, bem como o id de
     * quem a envia. Insere a mensagem no banco de dados.
     * Redireciona para a página da conversa coletiva. 
     * 
     */   

    public function enviar() {
        $dados['corpo'] = $this->input->post('mensagem');
        $dados['usuario_id'] = $this->session->id;
        $this->load->model('Geral_Model', 'geral');
        $this->geral->insert($dados);
        redirect('geral');
    }
    
    /*
     * Registra o envio de um arquivo no banco de dados e envia-o para o servidor
     * 
     * Recupera o arquivo do formulário, bem como o id de
     * quem o envia. Salva o arquivo no servidor. Insere a existência do
     * arquivo no banco de dados. Redireciona para a página da conversa coletiva.
     *      
     */

    public function enviarArq() {
        $this->load->model('ArquivosGeral_Model', 'arquivosgeral');
        $dados['usuario_id'] = $this->session->id;

        // diretório de armazenamento dos arquivos no servidor
        $config['upload_path'] = './upload/';
        // tipos de arquivos permitidos
        $config['allowed_types'] = 'gif|jpg|png|txt|doc|docx|pdf|zip|rar';
        // tamanho máximo de arquivo igual a zero é sem limite de tamanho
        $config['max_size'] = 0;
        // largura máxima de arquivo (imagem) igual a zero é sem limite de tamanho
        $config['max_width'] = 0;
        // altura máxima de arquivo (imagem) igual a zero é sem limite de tamanho
        $config['max_height'] = 0;

        // carrega a biblioteca upload de arquivo com a configuração desejada
        $this->load->library('upload', $config);

        // se o arquivo foi carregado para o servidor
        if ($this->upload->do_upload('arquivo')) {
            $arquivo = $this->upload->data();
            $dados['nome'] = $arquivo['file_name'];
            // registra no banco de dados a existência do arquivo no servidor
            $this->arquivosgeral->insert($dados);
        }
        redirect('geral');
    }

}
