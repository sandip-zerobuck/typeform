<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->base_url = BASE_URL_ADMIN.'dashboard/';

		$this->backup_status();

		if( !$this->crud->is_login() ) {
			redirect(BASE_URL_ADMIN.'login');
		}
	}
	
	public function index()
	{

		// Ads Alert Count....
		$data['image_alert'] = $this->crud->countrow('imagemaster',["alert_status"=>1]);
		$data['link_alert'] = $this->crud->countrow('linkmaster',["alert_status"=>1]);
		$data['applink_alert'] = $this->crud->countrow('applinkmaster',["alert_status"=>1]);
		$data['video_alert'] = $this->crud->countrow('videomaster',["alert_status"=>1]);



		// Coin Rate :

		$data['coin_rate'] = $this->crud->get_one_row('coin_rate',['id'=>1]);

		// Total User Count ....
		$data['user'] = $this->crud->countrow('usermaster');
		$data['activeuser'] = $this->crud->countrow('usermaster',["status"=>1]);
		$data['inactiveuser'] = $this->crud->countrow('usermaster',["status"=>0]);

		$check = $this->crud->get_with_where('usermaster',["status"=>0]);


		// Total Merchant User Count ....
		$data['m_user'] = $this->crud->countrow('merchant_user');
		$data['activem_user'] = $this->crud->countrow('merchant_user',["status"=>1]);
		$data['inactivem_user'] = $this->crud->countrow('merchant_user',["status"=>0]);

		// Total Ads  User Count ....
		$data['ads_user'] = $this->crud->countrow('ads_user');
		$data['activeads_user'] = $this->crud->countrow('ads_user',["status"=>1]);
		$data['inactiveads_user'] = $this->crud->countrow('ads_user',["status"=>0]);

		//Product....
		$data['product'] = $this->crud->countrow('products',["status"=>1]);
		$data['category'] = $this->crud->countrow('products_category',["status"=>1]);
		$data['sub_category'] = $this->crud->countrow('products_subcategory',["status"=>1]);

		// Camping Master
		// Active Image..
		$data['image'] = $this->crud->countrow('imagemaster',["status"=>1]);
		$data['image_complated'] = $this->crud->countrow('imagemaster',["status"=>0,"click"=>0]);
		// Active Image..
		$data['link'] = $this->crud->countrow('linkmaster',["status"=>1]);
		$data['link_complated'] = $this->crud->countrow('linkmaster',["status"=>0,"click"=>0]);
		// Active Image..
		$data['video'] = $this->crud->countrow('videomaster',["status"=>1]);
		$data['video_complated'] = $this->crud->countrow('videomaster',["status"=>0,"click"=>0]);
		// Active App Link
		$data['applink'] = $this->crud->countrow('applinkmaster',["status"=>1]);
		$data['applink_complated'] = $this->crud->countrow('applinkmaster',["status"=>0,"click"=>0]);


		// Report Image And Link And Video
		$data['image_total'] = $this->crud->get_with_where('report',['status_for_click'=>'1']);
        $data['video_total'] = $this->crud->get_with_where('report',['status_for_click'=>'2']);
        $data['link_total'] = $this->crud->get_with_where('report',['status_for_click'=>'3']);


        // User Balance.....
        $data['admin_balance'] = $this->crud->get_with_where('admin_balance',['id'=>'1']);

        // Admin Credit Balance in User Account..

        $data['user_credit_balance'] = $this->crud->get_one_row('admin_balance',['id'=>'1']);

        $data['user_balance'] = $this->crud->get_all('usermaster');

        $data['merchant_balance'] = $this->crud->get_all('merchant_user');



        // Product Count..
		$data['product'] = $this->crud->countrow('products');
		$data['product_inactive'] = $this->crud->countrow('products',["status"=>0]);
		$data['product_active'] = $this->crud->countrow('products',["status"=>1]);

		// Ordre..
		$data['order'] = $this->crud->countrow('order_master');
		$data['product_pending'] = $this->crud->countrow('order_master',["status"=>2]);

		$data['product_dilivered'] = $this->crud->countrow('order_master',["status"=>4]);


		// Merchant Request.....
		$data['merchant_request'] = $this->crud->countrow('admin_wallet');
		$data['activemerchant_request'] = $this->crud->countrow('admin_wallet',["status"=>1]);
		$data['inactivemerchant_request'] = $this->crud->countrow('admin_wallet',["status"=>0]);

		// Merchant Return  Request.....
		$data['return_request'] = $this->crud->countrow('return_request');
		$data['activereturn_request'] = $this->crud->countrow('return_request',["status"=>1]);
		$data['inactivereturn_request'] = $this->crud->countrow('return_request',["status"=>0]);

		// Ads Request...

		// Merchant Return  Request.....
		$data['Image_ads_request'] = $this->crud->countrow('imagemaster',['ads_user_status'=>1]);
		$data['video_ads_request'] = $this->crud->countrow('videomaster',["ads_user_status"=>1]);
		$data['Link_ads_request'] = $this->crud->countrow('linkmaster',["ads_user_status"=>1]);


		// Visitor count....


		

		$current_date = date("Y-m-d");

		// Today Login....

		for ($i=0; $i < 10; $i++) 
		{ 
			${'todaylogin'.$i} = date('d-m-Y', strtotime('-'.$i.' day', strtotime($current_date)));
			$data['todaylogin'.$i.'_visitor'] = $this->crud->countrow('current_user_login',["at_date"=>${'todaylogin'.$i}]);
		}



		for ($i=1; $i < 26; $i++) 
		{ 
			${'Previous'.$i} = date('Y-m-d', strtotime('-'.$i.' day', strtotime($current_date)));
			$data['previous'.$i.'_visitor'] = $this->crud->countrow('visitor',["date"=>${'Previous'.$i}]);

			$data['user'.$i.'_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>1,"date"=>${'Previous'.$i}]);

			$data['ads_user'.$i.'_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>2,"date"=>${'Previous'.$i}]);

			$data['merchant_user'.$i.'_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>3,"date"=>${'Previous'.$i}]);
		}

		$data['today_visitor'] = $this->crud->countrow('visitor',["date"=>$current_date]);
		
		$data['total_visitor'] = $this->crud->countrow('visitor',["status"=>1]);
		// New User Visitor.....

		$data['user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>1,"date"=>$current_date]);
		// Adsuser

		$data['ads_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>2,"date"=>$current_date]);
		// Merchant ...

		$data['merchant_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>3,"date"=>$current_date]);

		$data['total_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>1,"status"=>1]);
		$data['total_ads_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>2,"status"=>1]);
		$data['total_merchant_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>3,"status"=>1]);

		$this->load->view(ADMIN_VIEW.'dashboard',$data);
	}

	// Today Login...

	public function todaylogin_user()
	{
		$current_date = date("Y-m-d");
		for ($i=1; $i < 11; $i++) 
		{ 
			${'todaylogin'.$i} = date('d-m-Y', strtotime('-'.$i.' day', strtotime($current_date)));
			$data['todaylogin'.$i.'_visitor'] = $this->crud->countrow('current_user_login',["at_date"=>${'todaylogin'.$i}]);
		}

		echo $this->load->view(ADMIN_VIEW.'visitor_todaylogin',$data, true);
	}

	public function get_live_visitor()
	{
		$current_date = date("Y-m-d");

		for ($i=1; $i < 26; $i++) 
		{ 
			${'Previous'.$i} = date('Y-m-d', strtotime('-'.$i.' day', strtotime($current_date)));
			$data['previous'.$i.'_visitor'] = $this->crud->countrow('visitor',["date"=>${'Previous'.$i}]);
		}
		$data['today_visitor'] = $this->crud->countrow('visitor',["date"=>$current_date]);
		
		echo $this->load->view(ADMIN_VIEW.'visitor',$data, true);
	}

	public function get_newuser_visitor()
	{
		$current_date = date("Y-m-d");

		for ($i=1; $i < 26; $i++) 
		{ 
			${'Previous'.$i} = date('Y-m-d', strtotime('-'.$i.' day', strtotime($current_date)));
			$data['user'.$i.'_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>1,"date"=>${'Previous'.$i}]);
		}

		

		
		$data['user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>1,"date"=>$current_date]);
		echo $this->load->view(ADMIN_VIEW.'visitor_user',$data, true);
	}

	public function get_new_ads_user_visitor()
	{
		$current_date = date("Y-m-d");

		for ($i=1; $i < 26; $i++) 
		{ 
			${'Previous'.$i} = date('Y-m-d', strtotime('-'.$i.' day', strtotime($current_date)));

			$data['ads_user'.$i.'_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>2,"date"=>${'Previous'.$i}]);
		}

		


		
		$data['ads_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>2,"date"=>$current_date]);

		echo $this->load->view(ADMIN_VIEW.'visitor_ads_user',$data, true);
	}

	public function get_new_merchant_user_visitor()
	{
		$current_date = date("Y-m-d");

		for ($i=1; $i < 26; $i++) 
		{ 
			${'Previous'.$i} = date('Y-m-d', strtotime('-'.$i.' day', strtotime($current_date)));

			$data['merchant_user'.$i.'_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>3,"date"=>${'Previous'.$i}]);
		}

		$data['merchant_user_visitor'] = $this->crud->countrow('newuser_visitor',["user_type"=>3,"date"=>$current_date]);
		echo $this->load->view(ADMIN_VIEW.'visitor_merchant_user',$data, true);
	}

	public function changepassword()
	{
		$data['id'] = $this->session->userdata('admin_id');
		$this->load->view(ADMIN_VIEW.'changepassword',$data);
	}

	public function updatepassword()
	{
		$post_data = $this->input->post();
		$this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('cpassword','Comfirm Password','required|trim|matches[password]');

        if( !$this->form_validation->run() ) 
        {
            $this->changepassword();
        } else 
        {
        	$post_data['password'] = md5($post_data['password']);
        	unset($post_data['cpassword']);	

        	$is_success = $this->crud->update('users',$post_data,['id' => $post_data['id']]);

			if( $is_success ) {
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('error','Password Change successfully');
				redirect($this->base_url.'changepassword');
			} else {
				$this->session->set_flashdata('response','error');
				$this->session->set_flashdata('error','Something went wrong! Please try again.');
				redirect($this->base_url.'changepassword');
			}
        }
	}

	public function update_coinrate()
	{
		$post_data = $this->input->post();
		$this->form_validation->set_rules('image','Image','required|trim|numeric');
		$this->form_validation->set_rules('link','Link','required|trim|numeric');
		$this->form_validation->set_rules('video','Video','required|trim|numeric');

        if( !$this->form_validation->run() ) 
        {
            $this->dashboard();
        } else 
        {

        	$is_success = $this->crud->update('coin_rate',$post_data,['id' => $post_data['id']]);

        	$is_success = $this->crud->update_all('imagemaster',['coin'=>$post_data['image']]);
        	$is_success = $this->crud->update_all('linkmaster',['coin'=>$post_data['link']]);
        	$is_success = $this->crud->update_all('videomaster',['coin'=>$post_data['video']]);

			if( $is_success ) {
				$this->session->set_flashdata('response','success');
				$this->session->set_flashdata('error','Recourd Update successfully');
				redirect($this->base_url);
			} else {
				$this->session->set_flashdata('response','error');
				$this->session->set_flashdata('error','Something went wrong! Please try again.');
				redirect($this->base_url);
			}
        }
	}


	public function database_backup()
	{
		if($this->crud->is_login() ) {

		$this->load->dbutil();
		$table = array(
		'admin_balance',
		'admin_module',
		'admin_wallet',
		'ads',
		'ads_date',
		'ads_request',
		'ads_user',
		'bannerads_charge',
		'cart',
		'checkdata',
		'clickrate',
		'coin_rate',
		'coin_rate_date',
		'company_info',
		'database_backup',
		'deal_coming_soon',
		'deal_product',
		'delivery_charge',
		'discount',
		'google_ads',
		'imagemaster',
		'linkmaster',
		'merchant_category',
		'merchant_commission_history',
		'merchant_pay_history',
		'merchant_pay_offline',
		'merchant_shop_ratting',
		'merchant_user',
		'merchat_wallet',
		'module',
		'm_commission',
		'm_discount',
		'm_discount_user',
		'm_user_discount',
		'm_user_merchant',
		'newuser_visitor',
		'non_user_details',
		'notification',
		'notifications',
		'offile_method',
		'orderproductmaster',
		'order_master',
		'pincode_charge',
		'products',
		'products_category',
		'products_subcategory',
		'product_image',
		'product_location',
		'qualification',
		'referbonus',
		'report',
		'return_request',
		'send_mail',
		'shop_banner',
		'signupbonus',
		'slider',
		'splash_screen',
		'temp_orderdata',
		'transfer_charge',
		'usermaster',
		'users',
		'videomaster',
		'visitor',
		'walletmaster');

		$prefs = array(
			'tables'      => $table,
		    'format'      => 'zip',             
		    'filename'    => 'mycoinst_db.sql'
		    );


		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'.'Date_'. date("d-m-Y").'Time_'.date("H-i-s").'.zip';
		$save = 'db/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 


		$this->load->helper('download');
		force_download($db_name, $backup);

		}
	}

	public function backup_status()
	{
		if( $this->crud->is_login() ) {

		$date = date('Y-m-d');
		$check = $this->crud->get_one_row('database_backup',['b_date'=>$date,'status'=>1]);

		if (empty($check)) 
		{
			 $this->session->set_flashdata('response','danger');
             $this->session->set_flashdata('error','Wait auto Database Backup Proccess.....');

             
			 $is_success = $this->crud->insert('database_backup',['b_date'=>$date]);

			 if ($is_success) 
			 {	$this->database_backup();
			 	$this->session->set_flashdata('response','success');
             	$this->session->set_flashdata('error','Database Backup Success...');
			 }

		}else
		{
			$this->session->set_flashdata('response','danger');
            $this->session->set_flashdata('error','Auto Backup Already Store in Server...');
		}

	}

	}
}
