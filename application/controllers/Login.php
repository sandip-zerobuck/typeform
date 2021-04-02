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
		$data['covid_india'] = $this->crud->get_one_row('covid_update',['id'=>'1']); 
    	$data['covid_world'] = $this->crud->get_one_row('covid_update',['id'=>'2']);
		$this->load->view('login',$data);
	}

	public function authenticate()
	{

		$this->form_validation->set_rules('mobile','Mobile Number','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');


		if( !$this->form_validation->run() ) {
			$this->index();
		} else {
			$post_data = $this->input->post();

			$user_id = $this->crud->authenticate_user($post_data['mobile'], $post_data['password']);

			if ($user_id) 
			{
				$checkactive = $this->crud->get_with_where('usermaster',['id' => $user_id,'status'=>'1','active'=>'1']);

				if (!empty($checkactive)) 
				{
					$this->session->set_userdata('user_id',$user_id);
					$this->session->set_userdata('user_name',$checkactive[0]->firstname);
	                $this->session->set_flashdata('response','success');
	    		    $this->session->set_flashdata('error','Login Success..');

	    		    if (!empty($user_id)) 
	    		    {
	    		    	$check_login = $this->crud->get_one_row('current_user_login',['user_id'=>$user_id,'at_date'=>date('d-m-Y')]);
	    		    	if (!empty($check_login)) 
	    		    	{
	    		    		$is_success = $this->crud->update('current_user_login',['login_status'=>'1','status'=>'1'],['user_id'=>$user_id,'at_date'=>date('d-m-Y')]);
	    		    	}else
	    		    	{
	    		    		$is_success = $this->crud->insert('current_user_login',['user_id'=>$user_id,'at_date'=>date('d-m-Y'),'ip_address'=>$this->input->ip_address(),'login_status'=>'1','status'=>'1']);
	    		    	}
	    		    }


	    		    // // Level Refer...
	    		    // $is_check = $this->crud->get_one_row('usermaster',['id'=>$user_id]);
	    		    // if (!empty($is_check)) 
	    		    // {
	    		    // 	if ($is_check->refer_status == 0) 
	    		    // 	{
	    		    // 		$refs = $this->crud->get_all('usermaster');
	    		    // 		$refer_status =  $this->crud->getRefs($refs,$user_id, $is_check->refercode);

				       //    if ($refer_status == true) 
				       //    {
				       //       $this->crud->update('usermaster',['refer_status'=>1],['id' => $user_id]);
				       //    }
	    		    // 	}
	    		    // }

	    		    redirect(BASE_URL.'index');
				}else{

					$setemail = $this->crud->get_with_where('usermaster',['id' => $user_id,'status'=>'1','active'=>'0']);

					$otp = rand(99999,999999);
                	$otp_data['otp_active'] = $otp;
                	$is_success = $this->crud->update('usermaster',$otp_data,['mobile' => $setemail[0]->mobile]);

                	if ($is_success) 
                	{
                		$send_sms = $this->crud->send_sms(SMS_USERNAME,SMS_PASSWORD,SMS_SENDERID,$otp.SMS_OTP, "91".$setemail[0]->mobile);

						$this->session->set_flashdata('response','error');
						$this->session->set_flashdata('error','Your Account Not Verify..');
						$this->session->set_userdata('otp_mobile',$setemail[0]->mobile);
		                redirect(BASE_URL.'Active');
                	}
				}

				
			}else {
					$this->session->set_flashdata('response','error');
					$this->session->set_flashdata('error','Mobile Number and password does not match!');

					redirect($this->base_url);
				}

		}


	}



	public function logout()
	{

		$is_success = $this->crud->update('current_user_login',['login_status'=>'0'],['user_id'=>$this->session->userdata('user_id')]);

		if ($is_success) 
		{
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_name');

			$this->session->set_flashdata('response','error');
			$this->session->set_flashdata('error','Logged out successfully!');

			redirect($this->base_url);
		}
	}
}




?>