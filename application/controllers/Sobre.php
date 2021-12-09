<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//seta a model
		$this->load->model('categorias_model', 'modelcategorias');
		$this->load->model('usuarios_model', 'modelusuarios');
		//acessa o model e seta os dados em uma variavel
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index()
	{
		$this->load->helper('funcoes');

		//setando os dados na variavel a ser mandada pra view
		$dados['categorias'] = $this->categorias;
		$dados['autores'] = $this->modelusuarios->listar_autores();

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Sobre nós';
		$dados['subtitulo'] = 'Conheça nossa equipe' ;

		
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/sobrenos');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}


	public function autores($id, $slug= null){
		$this->load->helper('funcoes');

		//setando os dados na variavel a ser mandada pra view
		$dados['categorias'] = $this->categorias;
		$dados['autores'] = $this->modelusuarios->listar_autor($id, $slug);

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Sobre Nós';
		$dados['subtitulo'] = 'Autor' ;

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/autor');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
