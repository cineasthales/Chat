<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Conversa
 * 
 * Carrega, atualiza e envia mensagens para o banco de dados.
 * 
 * @author Thales Castro     
 * 
 */

class Conversa extends CI_Controller {
    
    /*
     * Index
     * 
     * Se usuário não estiver logado, redirecionar para a controller de login.
     * Se estiver logado, carregar a controller Inicio.
     * 
     */

    public function index() {
        if (!$this->session->logado) {
            redirect('home');
        } else {
            redirect('inicio');
        }
    }

    /*
     * Atualiza a página do chat 
     * 
     * Carrega as mensagens do banco de dados em que tenha o id dos dois interlocutores.
     * Esta função é chamada via javascript com timer.
     * 
     */

    public function atualizachat() {
        $this->load->model('Mensagens_Model', 'mensagens');
        $id2 = $this->session->id2;
        $dados['mensagens'] = $this->mensagens->selectChat($this->session->id, $id2, $id2, $this->session->id);
        $this->load->view('chat_view1', $dados);
    }
    
    /*
     * Atualiza a página de arquivos
     * 
     * Carrega os arquivos do banco de dados em que tenha o id dos dois interlocutores.
     * Esta função é chamada via javascript com timer.
     * 
     */

    public function atualizaarq() {
        $this->load->model('Arquivos_Model', 'arquivos');
        $id2 = $this->session->id2;
        $dados['arquivos'] = $this->arquivos->selectArq($this->session->id, $id2, $id2, $this->session->id);
        $this->load->view('chat_view3', $dados);
    }
    
    /*
     * Carrega uma conversa privada
     * 
     * Se usuário estiver logado, carrega mensagens e arquivos do banco de dados
     * que tenham o id dos dois interlocutores, mandando para as views.
     * Se não estiver logado, redirecionar para a controller de login. 
     * 
     * @param int $id2 armazena o id do receptor das mensaagens e arquivos.
     * 
     */

    public function com($id2) {
        if ($this->session->logado) {
            $this->load->model('Mensagens_Model', 'mensagens');
            $this->load->model('Arquivos_Model', 'arquivos');
            $dados['id2'] = $id2;
            $this->session->set_userdata($dados);
            $dados['mensagens'] = $this->mensagens->selectChat($this->session->id, $id2, $id2, $this->session->id);
            $dados['arquivos'] = $this->arquivos->selectArq($this->session->id, $id2, $id2, $this->session->id);
            $this->load->view('inc/header');
            $this->load->view('inc/nav');
            $this->load->view('chat_top');
            $this->load->view('chat_view1', $dados);
            $this->load->view('chat_view2');
            $this->load->view('chat_view3', $dados);
            $this->load->view('chat_view4');
            $this->load->view('inc/footer');
        } else {
            redirect('home');
        }
    }
    
    /*
     * Envia uma mensagem para o banco de dados
     * 
     * Recupera o corpo da mensagem por post do form, bem como os ids de
     * quem a envia e de quem a recebe. Insere a mensagem no
     * banco de dados. Redireciona para a página da conversa privada. 
     * 
     * @param int $id2 armazena o id do receptor das mensaagens.
     * 
     */    

    public function enviar($id2) {
        $dados['corpo'] = $this->input->post('mensagem');
        $dados['usuario1_id'] = $this->session->id;
        $dados['usuario2_id'] = $id2;
        $this->load->model('Mensagens_Model', 'mensagens');
        $this->mensagens->insert($dados);
        redirect('conversa/com/' . $id2);
    }
    
    /*
     * Registra o envio de um arquivo no banco de dados e envia-o para o servidor
     * 
     * Recupera o arquivo do formulário, bem como os ids de
     * quem o envia e de quem o recebe. Salva o arquivo no servidor.
     * Insere a existência do arquivo no banco de dados.
     * Redireciona para a página da conversa privada. 
     * 
     * @param int $id2 armazena o id do receptor dos arquivos.
     * 
     */  

    public function enviarArq($id2) {
        $this->load->model('Arquivos_Model', 'arquivos');
        $dados['usuario1_id'] = $this->session->id;
        $dados['usuario2_id'] = $id2;

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
            $this->arquivos->insert($dados);
        }
        redirect('conversa/com/' . $id2);
    }

}
