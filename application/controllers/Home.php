<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//seta a model
		$this->load->model('categorias_model', 'modelcategorias');
		//acessa o model e seta os dados em uma variavel
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index()
	{
		$this->load->helper('funcoes');
		//model de publicacos
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$this->postagens = $this->modelpublicacoes->destaques_home();

		//setando os dados na variavel a ser mandada pra view
		$dados['categorias'] = $this->categorias;
		$dados['postagens'] = $this->postagens;

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Página inicial';
		$dados['subtitulo'] = 'Postagens recentes' ;

		
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/home');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
