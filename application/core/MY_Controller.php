<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	protected $data = array();


	public function __construct(){

		parent::__construct();

		$this->data['perms'] = $this->check_perms();
		$this->data['check_login'] = $this->check_login();

	}


	public function render($page){

		if ($this->session->userdata('user_id')) {

			$user_id = $this->session->userdata('user_id');

			if (!$user_id == null && !$user_id == '') {

				$this->load->model('users_model');
	 			$this->data['profile'] = $this->users_model->user($user_id);
			}
		}

		$this->data['categories'] = $this->locals_model->get_categories();
		// Guardar a pagina atual no array da data para puder adicionar o script do mapa apenas na home e no only_map
		$this->data['page'] = $page;

		$this->load->view('header', $this->data);

		if ($page != 'home') {
			$this->load->view('header_show', $this->data);
		}

		$this->load->view($page, $this->data);
		$this->load->view('footer', $this->data);

	}


	public function check_perms(){

		$perms = $this->session->userdata('permissions');

        if($perms){

			return $perms;
		}
	}


	public function check_login(){

		$user_id = $this->session->userdata('user_id');
		$logged_in = false;

        if($user_id){
        	$logged_in = true;
        }

        return $logged_in;
	}

}
