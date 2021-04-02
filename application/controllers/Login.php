<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->base_url = BASE_URL.'login';

		if($this->uri->segment(2) != 'logout') {
			if( $this->crud->is_login_user() ) {
				redirect(BASE_URL.'index');
			}
		}
		
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function authenticate()
	{

		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if( !$this->form_validation->run() ) {
			$this->index();
		} else {
			$post_data = $this->input->post();

			$user_id = $this->crud->authenticate_user($post_data['username'], $post_data['password']);

			if ($user_id) 
			{
				$this->session->set_userdata('userid',$user_id);
				$this->session->set_userdata('username',$post_data['username']);
                $this->session->set_flashdata('response','success');
    		    $this->session->set_flashdata('error','Login Success..');
    		    redirect(BASE_URL.'index');
			}else {
					$this->session->set_flashdata('response','error');
					$this->session->set_flashdata('error','Username and password does not match!');

					redirect($this->base_url);
				}

		}


	}



	public function logout()
	{


		if ($is_success) 
		{
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('response','error');
			$this->session->set_flashdata('error','Logged out successfully!');

			redirect($this->base_url);
		}
	}
}




?>