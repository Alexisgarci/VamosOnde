<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {


	public function __construct(){

		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
	}


	public function login(){

		$this->load->view('login');
	}


	public function do_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$remember_me = $this->input->post('chkremember');

		$user = $this->users_model->user_login($username);

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }
        else{

           	if(!$user){
				$this->session->set_flashdata('msg', 'Username inválido');
				redirect('users/login', 'refresh');
			}

			if(!password_verify($password, $user['password'])){
				$this->session->set_flashdata('msg', 'Password inválida');
				redirect('users/login', 'refresh');
			}

			if ($remember_me) {
				$this->input->set_cookie('username', $username, time() + 3600);
				$this->input->set_cookie('password', $password, time() + 3600);
			}
			else{
				delete_cookie('username');
	            delete_cookie('password');
			}

			$this->session->set_userdata('user_id', $user['user_id']);
			$this->session->set_userdata('permissions', $user['permissions']);

			redirect('locals', 'location');
	    }

	}

	public function logout(){

		session_destroy();
		redirect('users/login');
	}


	public function register(){

		$this->load->view('register');
	}


	public function do_register(){

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$confirm_email = $this->input->post('confirm_email');
		$pass = $this->input->post('password');
		$confirm_pass = $this->input->post('confirm_password');

		$password_encrypted = password_hash($pass, PASSWORD_DEFAULT);

		$data = array(

			'username' => $username,
			'password' => $password_encrypted,
			'email' => $email,
			'image' => '123.jpg',
			'v_code' => '123456',
			'created' => date('Y-m-d H:i:s')
		);

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('confirm_email', 'Confirm Email', 'trim|required|valid_email|matches[email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		$this->form_validation->set_message('is_unique', 'The %s is already taken');


		if ($this->form_validation->run() == FALSE){
            $this->load->view('register');
        }
        else{
           	$this->db->insert('users', $data);
			$this->load->view('login');
        }

	}


	public function profile(){

		// Provisório: Para resolver o problema do perfil (undefined property locals_model)
		$this->load->model('locals_model');

		$user_id = $this->session->userdata('user_id');

		$this->data['profile'] = $this->users_model->user($user_id);
		$this->data['favorites'] = $this->users_model->get_favorites($user_id);

		if ($_SESSION['permissions'] == 1) {
			$this->data['local_partys'] = $this->locals_model->get_local_party($user_id);
		}

		$this->render('profile');


	}


	public function change_password(){

		if($this->input->post('change_pass')){

			$user_id = $this->session->userdata('user_id');
			$user = $this->users_model->user($user_id);

			$pass = $user['password'];

			$old_pass = $this->input->post('old_pass');
			$new_pass = $this->input->post('new_pass');
			$confirm_pass = $this->input->post('confirm_pass');
			$pass_encrypted = password_hash($new_pass, PASSWORD_DEFAULT);

			$this->form_validation->set_rules('new_pass', 'New Password', 'required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[new_pass]');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('change_pass', validation_errors());
				redirect('users/profile','refresh');
	        }
	        else{
	           	
	           	if(password_verify($old_pass, $pass)){
					$this->users_model->update_password($pass_encrypted, $user_id);
					$this->session->set_flashdata('change_pass', 'Password atualizada!');
					redirect('users/profile','refresh');
				}
				else{
					$this->session->set_flashdata('change_pass', 'Password inválida.');
					redirect('users/profile','refresh');
				}
					
		    }

		}
	}


	public function change_email(){

		if($this->input->post('change_email')){

			$user_id = $this->session->userdata('user_id');
			$new_email = $this->input->post('new_email');
			$confirm_email = $this->input->post('new_confirm_email');
			$pass_inserted = $this->input->post('change_email_password');
			$user = $this->users_model->user($user_id);
			$pass = $user['password'];

			$this->form_validation->set_rules('new_email', 'New Email', 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('new_confirm_email', 'Confirm Email', 'trim|required|valid_email|matches[new_email]');

			if ($this->form_validation->run() == FALSE){
	            $this->session->set_flashdata('change_email', validation_errors());
				redirect('users/profile','refresh');
	        }
	        else{
	           	
	           	if(password_verify($pass_inserted, $pass)){
					$this->users_model->update_email($new_email, $user_id);
					$this->session->set_flashdata('change_email', 'Email atualizado!');
					redirect('users/profile','refresh');
				}
				else{
					$this->session->set_flashdata('change_email', 'Password inválida.');
					redirect('users/profile','refresh');
				}
	        }
		}

	}


	public function delete_account(){

		if ($this->input->post('delete_account_password')) {

			$pass_inserted = $this->input->post('delete_account_password');
			$user_id = $this->session->userdata('user_id');
			$user = $this->users_model->user($user_id);
			$pass = $user['password'];

			if(password_verify($pass_inserted, $pass)){
				$this->users_model->delete_user($user_id);
				$this->session->unset_userdata('user_id');
				$this->session->set_flashdata('deleted_account', 'Conta apagada com sucesso.');
				redirect('locals/index','refresh');
			}
			else{
				$this->session->set_flashdata('delete_account', 'Password inválida.');
				redirect('users/profile','refresh');
			}
			
		}

	}


}
