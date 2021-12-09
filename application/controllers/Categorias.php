<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//seta a model
		$this->load->model('categorias_model', 'modelcategorias');
		//acessa o model e seta os dados em uma variavel
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index($id, $nome, $pular = null, $post_por_pagina = null)
	{
		$this->load->helper('funcoes');

		//model de publicacos
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		
		//Paginação
		$this->load->library('pagination');

		$config['base_url'] = base_url("categoria/".$id."/".$nome);
		$config['total_rows'] = $this->modelpublicacoes->contarFront($id);
		$post_por_pagina = 5;
		$config['per_page'] = $post_por_pagina;

		$this->pagination->initialize($config);
		$dados['links_paginacao'] = $this->pagination->create_links();

		$this->postagens = $this->modelpublicacoes->categoria_pub($id, $pular, $post_por_pagina);

		//setando os dados na variavel a ser mandada pra view
		$dados['categorias'] = $this->categorias;
		$dados['postagens'] = $this->postagens;

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Categorias';
		$dados['subtitulo'] = '' ;
		$dados['subtitulo_db'] = $this->modelcategorias->listar_titulo($id);

		
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/categoria');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
