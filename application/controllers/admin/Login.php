<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->base_url = BASE_URL_ADMIN.'login';

		if($this->uri->segment(3) != 'logout') {
			if( $this->crud->is_login() ) {
				redirect(BASE_URL_ADMIN.'dashboard');
			}
		}
	}
	
	public function index()
	{
		$this->load->view(ADMIN_VIEW.'login');
	}

	public function authenticate()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if( !$this->form_validation->run() ) {
			$this->index();
		} else {
			$post_data = $this->input->post();
			$users_row = $this->crud->authenticate($post_data['username'], $post_data['password']);

			if(!empty($users_row)) {
				$admin_id = $users_row[0]->id;
				$this->session->set_userdata('admin_id',$admin_id);
				$this->session->set_userdata('admin_username', $post_data['username']);
				$this->session->set_userdata('admin_type', $users_row[0]->type);
				redirect(BASE_URL_ADMIN.'dashboard');
			} else {
				$this->session->set_flashdata('error','Username and password does not match!');
				redirect($this->base_url);
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_username');

		$this->session->set_flashdata('response','success');
		$this->session->set_flashdata('error','Logged out successfully!');

		redirect($this->base_url);
	}
}

?>