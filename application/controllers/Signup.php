<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->base_url = BASE_URL;

        if($this->uri->segment(2) != 'logout') {
            if( $this->crud->is_login_user() ) {
                redirect(BASE_URL.'index');
            }
        }
    }
    
    public function index()
    {
            /*$data['pincode'] = $this->crud->get_with_where('pincodemaster',["status"=>1]);*/
            $data['country'] = $this->crud->get_with_where('countrymaster',['status'=>1]);
            $data['qualification'] = $this->crud->get_with_where('qualification',["status"=>1]);


            /*$join_array = [
              'areamaster am' => 'pm.area_id = am.id'
            ];
    $join_type = ['inner'];
  $data['pincode'] = $this->crud->get_with_join('pincodemaster pm', 'pm.pincode as pincode,pm.id as id,am.name as name', ["pm.status"=>'1'], $join_array, $join_type);*/


            $this->load->view('signup',$data);
    }

    public function add()
    {
        // echo $this->session->userdata('refercode'); die();
        $data['country'] = $this->crud->get_with_where('countrymaster',['status'=>1]);

        /*$data['pincode'] = $this->crud->get_all('pincodemaster');*/
        $data['qualification'] = $this->crud->get_with_where('qualification',["status"=>1]);
        $this->load->view('signup',$data);
    }

    public function store()
    {

        $post_data = $this->input->post();

        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|alpha');
        $this->form_validation->set_rules('mobile','mobile','required|trim|numeric|min_length[10]|max_length[10]|is_unique[usermaster.mobile]');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[usermaster.email]');
        $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('cpassword','Comfirm Password','required|trim|matches[password]');

        $this->form_validation->set_rules('dob','Dob','required|trim');
        $this->form_validation->set_rules('qulification','Qulification','required|trim');
        $this->form_validation->set_rules('gender','Gender','required|trim');
       
        //$this->form_validation->set_rules('address','Address','required|trim');

        $this->form_validation->set_rules('country_id','Country','required|trim');
        $this->form_validation->set_rules('state_id','State','required|trim');
        $this->form_validation->set_rules('district_id','District','required|trim');
        $this->form_validation->set_rules('city_id','Taluka','required|trim');
        $this->form_validation->set_rules('area_id','City','required|trim');
        $this->form_validation->set_rules('pincode_id','Pincode','required|trim');

        if(!empty($post_data['refercode'])) {
            $this->form_validation->set_rules('refercode','Refer Code','callback_check_refercode');
        }

        $invitedcode_n  = 'A'.mt_rand(99, 999).'R'.mt_rand(99, 999).'N';
        $check_invitecode = $this->crud->get_one_row('usermaster',['invitedcode'=>$invitedcode_n]);

        if (!empty($check_invitecode)) 
        {
            $invitedcode = 'A'.mt_rand(99, 999).'R'.mt_rand(99, 999).'N';
        }else
        {
            $invitedcode = $invitedcode_n;
        }

        $post_data['invitedcode'] = $invitedcode;


        if( !$this->form_validation->run() ) {
            $this->add();
        } else {

            $pincode = $this->crud->get_with_where('pincodemaster',['id' => $post_data['pincode_id']]);

            $post_data['created_date'] = $this->datetime;

           // $post_data['password'] = md5($post_data['password']);
            $post_data['password'] = base64_encode($post_data['password']);
            unset($post_data['cpassword']);

            unset($post_data['country_id']);
            unset($post_data['state_id']);
            unset($post_data['district_id']);
            unset($post_data['city_id']);
            unset($post_data['area_id']);

            $post_data['country_id'] = $pincode[0]->country_id;
            $post_data['state_id'] = $pincode[0]->state_id;
            $post_data['district_id'] = $pincode[0]->district_id;
            $post_data['city_id'] = $pincode[0]->city_id;
            $post_data['area_id'] = $pincode[0]->area_id;
            
            $is_success = $this->crud->insert('usermaster',$post_data);
            $userid = $this->db->insert_id();

            // Signup Bonus.....

            $signupbonus = $this->crud->get_all('signupbonus');
            $data1 = array('userid'=>$userid, "coin"=>$signupbonus[0]->coin,"balance"=>$signupbonus[0]->coin,"description"=>$signupbonus[0]->name,"credit_debit"=>'1','created_at'=>date('Y-m-d h:i:s a', time()));
            $update_balance = array('wallet_balance'=>$signupbonus[0]->coin);

            // Admin Balance...
            $admin_row = $this->crud->get_one_row('admin_balance',['id' =>'1']);
            $total_admin_balance = $signupbonus[0]->coin + $admin_row->signup_bonus;
            $admin_update = array('signup_bonus'=>$total_admin_balance);
            $this->crud->update('admin_balance',$admin_update,['id' => '1']);
                    
            // User Balance...
            $this->crud->insert('walletmaster',$data1);
            $this->crud->update('usermaster',$update_balance,['id' => $userid]);

           if( $is_success ) {


                // Visitor Count
                $current_date = date("Y-m-d");
                $visit_data = array('ip'=>$this->ip,'date'=>$current_date,'counter'=>1,'user_type'=>1,'user_id'=>$userid);
                $this->crud->insert('newuser_visitor',$visit_data);

                // Activet Mail User Email Id....

                $otp = rand(99999,999999);
                $post_data['otp_active'] = $otp;
                $is_success = $this->crud->update('usermaster',$post_data,['id' => $userid]);

                if ($is_success) 
                {
                    // OPT Set 
                    $data['otp'] = $otp;

                    // $send_sms = $this->crud->send_sms(SMS_USERNAME,SMS_PASSWORD,SMS_SENDERID,$otp.SMS_OTP, "91".$post_data['mobile']);

                    // if($send_sms == 1) {
                    $this->session->set_userdata('otp_mobile',$post_data['mobile']);
                    $this->session->set_flashdata("response","success"); 
                    $this->session->set_flashdata("error","OTP sent successfully. Check Your Mobile SMS."); 
                    redirect($this->base_url.'Active');
                    // } else {
                    //     $this->session->set_flashdata("response","error"); 
                    //     $this->session->set_flashdata("error","Error in sending Email."); 
                    //     redirect($this->base_url);
                    // }
                }
            
               $this->session->set_flashdata('response','success');
               $this->session->set_flashdata('error','Registration successfully.');
               redirect($this->base_url.'Active');
            } else {
                $this->session->set_flashdata('response','error');
                $this->session->set_flashdata('error','Something went wrong! Please try again.');
                redirect($this->base_url.'signup');
            }
        }
    }   

    // public function store()
    // {

    //     $post_data = $this->input->post();

    //     $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|alpha');
    //     $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|alpha');
    //     $this->form_validation->set_rules('mobile','mobile','required|trim|numeric|min_length[10]|max_length[10]|is_unique[usermaster.mobile]');
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usermaster.email]');
    //     $this->form_validation->set_rules('password','Password','required|trim');
    //     $this->form_validation->set_rules('cpassword','Comfirm Password','required|trim|matches[password]');

    //     $this->form_validation->set_rules('dob','Dob','required|trim');
    //     $this->form_validation->set_rules('qulification','Qulification','required|trim');
    //     $this->form_validation->set_rules('gender','Gender','required|trim');
       
    //     $this->form_validation->set_rules('address','Address','required|trim');

    //     $this->form_validation->set_rules('country_id','Country','required|trim');
    //     $this->form_validation->set_rules('state_id','State','required|trim');
    //     $this->form_validation->set_rules('district_id','District','required|trim');
    //     $this->form_validation->set_rules('city_id','Taluka','required|trim');
    //     $this->form_validation->set_rules('area_id','City','required|trim');
    //     $this->form_validation->set_rules('pincode_id','Pincode','required|trim');

    //     if(!empty($post_data['refercode'])) {
    //         $this->form_validation->set_rules('refercode','Refer Code','callback_check_refercode');
    //     }

    //     $invitedcode_n  = 'A'.mt_rand(99, 999).'R'.mt_rand(99, 999).'N';
    //     $check_invitecode = $this->crud->get_one_row('usermaster',['invitedcode'=>$invitedcode_n]);

    //     if (!empty($check_invitecode)) 
    //     {
    //         $invitedcode = 'A'.mt_rand(99, 999).'R'.mt_rand(99, 999).'N';
    //     }else
    //     {
    //         $invitedcode = $invitedcode_n;
    //     }

    //     $post_data['invitedcode'] = $invitedcode;


    //     if( !$this->form_validation->run() ) {
    //         $this->add();
    //     } else {

    //         $pincode = $this->crud->get_with_where('pincodemaster',['id' => $post_data['pincode_id']]);

    //         $post_data['created_date'] = $this->datetime;

    //        // $post_data['password'] = md5($post_data['password']);
    //         $post_data['password'] = base64_encode($post_data['password']);
    //         unset($post_data['cpassword']);

    //         unset($post_data['country_id']);
    //         unset($post_data['state_id']);
    //         unset($post_data['district_id']);
    //         unset($post_data['city_id']);
    //         unset($post_data['area_id']);

    //         $post_data['country_id'] = $pincode[0]->country_id;
    //         $post_data['state_id'] = $pincode[0]->state_id;
    //         $post_data['district_id'] = $pincode[0]->district_id;
    //         $post_data['city_id'] = $pincode[0]->city_id;
    //         $post_data['area_id'] = $pincode[0]->area_id;


    //         $post_data['active'] = '1';
            
    //         $is_success = $this->crud->insert('usermaster',$post_data);
    //         $userid = $this->db->insert_id();

    //         // Signup Bonus.....

    //         $signupbonus = $this->crud->get_all('signupbonus');
    //         $data1 = array('userid'=>$userid, "coin"=>$signupbonus[0]->coin,"balance"=>$signupbonus[0]->coin,"description"=>$signupbonus[0]->name,"credit_debit"=>'1','created_at'=>date('Y-m-d h:i:s a', time()));
    //         $update_balance = array('wallet_balance'=>$signupbonus[0]->coin);

    //         // Admin Balance...
    //         $admin_row = $this->crud->get_one_row('admin_balance',['id' =>'1']);
    //         $total_admin_balance = $signupbonus[0]->coin + $admin_row->signup_bonus;
    //         $admin_update = array('signup_bonus'=>$total_admin_balance);
    //         $this->crud->update('admin_balance',$admin_update,['id' => '1']);
                    
    //         // User Balance...
    //         $this->crud->insert('walletmaster',$data1);
    //         $this->crud->update('usermaster',$update_balance,['id' => $userid]);

    //        if( $is_success ) {


    //             // Visitor Count
    //             $current_date = date("Y-m-d");
    //             $visit_data = array('ip'=>$this->ip,'date'=>$current_date,'counter'=>1,'user_type'=>1,'user_id'=>$userid);
    //             $this->crud->insert('newuser_visitor',$visit_data);

    //             // Activet Mail User Email Id....

    //             $otp = rand(99999,999999);
    //             $post_data['otp_active'] = $otp;
    //             $is_success = $this->crud->update('usermaster',$post_data,['id' => $userid]);

    //             if ($is_success) 
    //             {
    //                 $this->session->set_flashdata('response','success');
    //                 $this->session->set_flashdata('error','Registration successfully.');
    //                 redirect($this->base_url.'Login');
    //             }
               
    //         } else {
    //             $this->session->set_flashdata('response','error');
    //             $this->session->set_flashdata('error','Something went wrong! Please try again.');
    //             redirect($this->base_url.'signup');
    //         }
    //     }
    // }

    public function referlink($code = null)
    {
       // $this->session->set_userdata('refercode',$code);
        $data['refercode'] = $code;
        $data['country'] = $this->crud->get_with_where('countrymaster',['status'=>1]);
        /*$data['pincode'] = $this->crud->get_with_where('pincodemaster',["status"=>1]);*/
        $data['qualification'] = $this->crud->get_with_where('qualification',["status"=>1]);
        $this->load->view('signup',$data);
    }

    public function check_refercode($str)
    {
        if(!$this->crud->check_exist('usermaster',['invitedcode' => $str, 'status' => 1])) {
            $this->form_validation->set_message('check_refercode', 'Refer code is not valid.');
            return false;
        }
        return true;
    }


    public function fetch_location()
    {
        if($this->input->post('pincode_id'))
        {
            $id = $this->input->post('pincode_id');

            // Check Image Click....
        $join_array = [
                'areamaster am' => 'pm.area_id = am.id',
                'citymaster cm' => 'pm.city_id = cm.id',
                'districtmaster dm' => 'pm.district_id = dm.id',
                'statemaster sm' => 'pm.state_id = sm.id',
                'countrymaster con' => 'pm.country_id = con.id',
              ];
          $join_type = ['inner'];
            $wallet_image = $this->crud->get_with_join('pincodemaster pm', 'am.name area,cm.name city,dm.name district,sm.name state,con.name country', ["pm.id"=>$id], $join_array, $join_type);

            if (!empty($wallet_image)) {
                echo "<b>Country : </b>".$wallet_image[0]->country;
                echo "<br><b>State : </b>".$wallet_image[0]->state;
                echo "<br><b>District : </b>".$wallet_image[0]->district;
                echo "<br><b>City : </b>".$wallet_image[0]->city;
                echo "<br><b>Area : </b>".$wallet_image[0]->area;
            }else{

                echo '<div class="alert alert-danger">Location Not Available</div>';
            }
    
        }
    }

    public function fetch_state()
    {
        if($this->input->post('country_id'))
        {
            $id = $this->input->post('country_id');
            $city = $this->crud->get_selected_fields('statemaster','id,name',['country_id' => $id]);

            echo '<option value="">Select State</option>';

            foreach ($city as $key => $value) {
                echo '<option value="'.$value->id.'">'.$value->name.'</option>'.$id;
            }
        }
    }

    public function fetch_city()
    {
        if($this->input->post('state_id'))
        {
            $id = $this->input->post('state_id');
            $city = $this->crud->get_selected_fields('citymaster','id,name',['state_id' => $id]);

            echo '<option value="">Select City</option>';

            foreach ($city as $key => $value) {
                echo '<option value="'.$value->id.'">'.$value->name.'</option>'.$id;
            }
        }
    }

    public function fetch_area()
    {
        if($this->input->post('city_id'))
        {
            $id = $this->input->post('city_id');
            $area = $this->crud->get_selected_fields('areamaster','id,name',['city_id' => $id]);

            echo '<option value="">Select City</option>';

            foreach ($area as $key => $value) {
                echo '<option value="'.$value->id.'">'.$value->name.'</option>'.$id;
            }
        }
    }

    public function fetch_pincode()
    {
        if($this->input->post('area_id'))
        {
            $id = $this->input->post('area_id');
            $pincode = $this->crud->get_selected_fields('pincodemaster','id,pincode',['area_id' => $id]);
            echo '<option value="">Select Pincode</option>';
            foreach ($pincode as $key => $value) {
                echo '<option value="'.$value->id.'">'.$value->pincode.'</option>'.$id;
            }
        }
    }

}

?>