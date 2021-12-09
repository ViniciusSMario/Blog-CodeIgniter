<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//seta a model
		$this->load->model('categorias_model', 'modelcategorias');
		//acessa o model e seta os dados em uma variavel
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index($enviado = null)
	{
		$this->load->helper('funcoes');
		//model de publicacos

		//setando os dados na variavel a ser mandada pra view
		$dados['categorias'] = $this->categorias;

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Contato';
		$dados['subtitulo'] = 'Entre em contato';
		$dados['enviado'] = $enviado;
		
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/contato');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function enviar_mensagem(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtNome', 'Nome', 'required');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('txtMsg', 'Mensagem', 'required');


		if($this->form_validation->run()){

			$nome = $this->input->post('txtNome');
			$email = $this->input->post('txtEmail');
			$msg = $this->input->post('txtMsg');
			$ip = $this->input->ip_address();

			$this->load->library('email');
			$this->email->from($email, $nome);
			$this->email->to('email@emal.com');
			$this->email->subject('Formulário de contato - Blog CodeIgniter');
			$this->email->message(
				"
					<p><strong>Nome: </strong> $nome </p>
					<p><strong>Email: </strong> $email </p>
					<p><strong>Mensagem: </strong> $msg </p>
					<p><strong>Ip Usuário: </strong> $ip </p>
				"
			);

			if($this->email->send()){
				redirect(base_url('contato/1')); //certo
			}else{
				redirect(base_url('contato/2')); //erro
			}

		}else{
			$this->index();
		}
	}
}
