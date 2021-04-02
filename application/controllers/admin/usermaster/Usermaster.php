<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Usermaster extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->base_url = BASE_URL_ADMIN.'usermaster/usermaster/';

        if( !$this->crud->is_login() ) {
            redirect(BASE_URL_ADMIN.'login');
        }

        $is_allowed = $this->crud->is_admin_authorized(USERMASTER);
        if(!$is_allowed) {
            $this->session->set_flashdata('response','error');
            $this->session->set_flashdata('error','You are not authorized to access this module.');
            redirect(BASE_URL_ADMIN);
        }
    }

    public function index()
    {
        $data['country'] = $this->crud->get_with_where('countrymaster',['status'=>1]);
        // $data['state'] = $this->crud->get_with_where('statemaster',['status'=>1]);
        // $data['district'] = $this->crud->get_with_where('districtmaster',['status'=>1]);
        // $data['city'] = $this->crud->get_with_where('citymaster',['status'=>1]);
        // $data['area'] = $this->crud->get_with_where('areamaster',['status'=>1]);
        // $data['pincode'] = $this->crud->get_with_where('pincodemaster',['status'=>1]);
        $this->load->view(ADMIN_VIEW.'usermaster/usermaster/index',$data);
    }


    public function datatable()
    {
        $this->load->library('datatables');
        $this->db->order_by("um.id", "desc");
        $this->datatables->select('
            um.id as id, 
            um.firstname as firstname,
            um.lastname as lastname, 
            um.gender as gender, 
            um.mobile as mobile, 
            um.email as email, 
            um.password as password, 
            um.dob as dob, 
            um.qulification as qulification, 
            um.address as address,  
            um.refercode as refercode,  
            um.ip_address as ip_address,  
            um.invitedcode as invitedcode,
            um.created_date as created_date,  
            um.status as status,
            um.otp_active as otp_active,
            um.otp as otp,
            co.name as country, 
            sm.name as state, 
            dm.name as district, 
            cm.name as city, 
            am.name as area,
            pm.pincode as pincode
            ');
        $this->datatables->join('pincodemaster pm','um.pincode_id = pm.id');
        $this->datatables->join('countrymaster co','pm.country_id = co.id');
        $this->datatables->join('statemaster sm','pm.state_id = sm.id');
        $this->datatables->join('districtmaster dm','pm.district_id = dm.id');
        $this->datatables->join('citymaster cm','pm.city_id = cm.id');
        $this->datatables->join('areamaster am','pm.area_id = am.id');

        $this->datatables->from('usermaster um');

        $data = json_decode($this->datatables->generate("json"), true);
        # loop through each item and set param identifier

        $row = [];
        $temp_row = [];

        $data['user'] = $this->crud->countrow('usermaster');
        $no=$data['user'];
        foreach ($data['data'] as $key => $value) {

            $temp_row['id'] = '<lable class="label label-danger">'.$no.'</lable>';
    
            $temp_row['name'] = '<div style="width:200px;">
                                    <b>First Name : </b>'.$value['firstname'].'<br>
                                    <b>Last Name : </b>'.$value['lastname'].'<br>
                                    <b>Gender : </b>'.$value['gender'].'<br>
                                    <b>DOB : </b>'.$value['dob'].'<br>
                                    <b>Email : </b>'.$value['email'].'<br>
                                    <b>Mobile : </b>'.$value['mobile'].'<br>
                                    <b>Qulification : </b>'.$value['qulification'].'<br>
                                    <b>Password : </b>'.base64_decode($value['password']).'<br>
                                 </div>';


            $temp_row['location'] = '<div style="width:120px;">
                                    <b>Country : </b>'.$value['country'].'<br>
                                    <b>State : </b>'.$value['state'].'<br>
                                    <b>District : </b>'.$value['district'].'<br>
                                    <b>Taluka : </b>'.$value['city'].'<br>
                                    <b>City : </b>'.$value['area'].'<br>
                                    <b>Pincode : </b>'.$value['pincode'].'<br>
                                    <b>Address : </b>'.$value['address'].'<br>
                                 </div>';

            $temp_row['userinfo'] = '<div style="width:150px;">
                                    <b>Refre Code : </b>'.$value['refercode'].'<br>
                                    <b>Invited code : </b>'.$value['invitedcode'].'<br>
                                    <b>Ip Address : </b>'.$value['ip_address'].'<br>
                                    <b>OTP : </b>'.$value['otp_active'].'<br>
                                    <b>Forgot OTP : </b>'.$value['otp'].'<br><br>


                                    <a class="p-5" href="'.BASE_URL_ADMIN.'usermaster/usermaster/referfriend/'.$value['invitedcode'].'">
            <lable class="label label-danger">
            <i class="icon-list-unordered"></i> Refer Friend list </label></a>
                                 </div>';


            

            $inactive = '';
            $active = '';
            if( $value['status'] == 0 ) {
                $text = 'Inactive';
                $class = 'label label-danger';
            } elseif( $value['status'] == 1 )  {
                $text = 'Active';
                $class = 'label label-success';
            }

           

            $temp_row['status'] = '<label class="'.$class.'">'.$text.'</label>';
            $temp_row['action'] = '<div style="width:90px;"><a class="p-5" href="'.BASE_URL_ADMIN.'usermaster/usermaster/edit/'.$value['id'].'"><i class="icon-pencil3"></i> Edit</a><br><br>';

            $temp_row['action'] .= '<a class="p-5 text-success" href="'.BASE_URL_ADMIN.'usermaster/usermaster/addcoin/'.$value['id'].'"><i class="icon-plus-circle2"></i> Add Coin</a><br><br>';

            $temp_row['action'] .= '<a class="p-5 delete text-danger" href="'.BASE_URL_ADMIN.'usermaster/usermaster/delete/'.$value['id'].'"><i class="icon-trash"></i> Delete</a></div>';

            $row[] = $temp_row;

            $no--;

        }   

        echo json_encode([
            'draw' => $data['draw'],
            'recordsTotal' => $data['recordsTotal'],
            'recordsFiltered' => $data['recordsFiltered'],
            'data' => $row
        ]);
    }

    public function referfriend()
    {
        $data['country'] = $this->crud->get_with_where('countrymaster',['status'=>1]);
        // $data['state'] = $this->crud->get_with_where('statemaster',['status'=>1]);
        // $data['district'] = $this->crud->get_with_where('districtmaster',['status'=>1]);
        // $data['city'] = $this->crud->get_with_where('citymaster',['status'=>1]);
        // $data['area'] = $this->crud->get_with_where('areamaster',['status'=>1]);
        // $data['pincode'] = $this->crud->get_with_where('pincodemaster',['status'=>1]);
        $this->load->view(ADMIN_VIEW.'usermaster/usermaster/referfriend',$data);
    }


    public function datatablerefer($invitedcode)
    {
        if( !is_null($invitedcode) ) 
        {

        $this->load->library('datatables');
        $this->datatables->select('
            um.id as id, 
            um.firstname as firstname,
            um.lastname as lastname, 
            um.mobile as mobile,
            um.invitedcode as invitedcode,
            um.status as status,
            co.name as country, 
            sm.name as state, 
            dm.name as district,
            cm.name as city, 
            am.name as area,
            pm.pincode as pincode
            ');

        

        $this->datatables->join('countrymaster co','um.country_id = co.id');
        $this->datatables->join('statemaster sm','um.state_id = sm.id');
        $this->datatables->join('districtmaster dm','um.district_id = dm.id');
        $this->datatables->join('citymaster cm','um.city_id = cm.id');
        $this->datatables->join('areamaster am','um.area_id = am.id');
        $this->datatables->join('pincodemaster pm','um.pincode_id = pm.id');

        $where = [
            "um.refercode"=>$invitedcode
        ];
        $this->datatables->where($where);
        $this->datatables->from('usermaster um');


        $data = json_decode($this->datatables->generate("json"), true);
        # loop through each item and set param identifier

        $row = [];
        $temp_row = [];
        $no=1;
        foreach ($data['data'] as $key => $value) {

            $temp_row['id'] = '<lable class="label label-danger">'.$no.'</lable>';
        

            $temp_row['name'] = '<div style="width:200px;">
                                    <b>First Name : </b>'.$value['firstname'].'<br>
                                    <b>Last Name : </b>'.$value['lastname'].'<br>
                                    <b>Mobile : </b>'.$value['mobile'].'<br>
                                    <a class="p-5" href="'.BASE_URL_ADMIN.'usermaster/usermaster/referfriend/'.$value['invitedcode'].'">
            <lable class="label label-danger">
            <i class="icon-list-unordered"></i> Refer Friend list </label></a>
                                 </div>';

            $temp_row['location'] = '<div style="width:120px;">
                                    <b>Country : </b>'.$value['country'].'<br>
                                    <b>State : </b>'.$value['state'].'<br>
                                    <b>District : </b>'.$value['district'].'<br>
                                    <b>City : </b>'.$value['city'].'<br>
                                    <b>Area : </b>'.$value['area'].'<br>
                                    <b>Pincode : </b>'.$value['pincode'].'<br>
                                 </div>';

            

            $inactive = '';
            $active = '';
            if( $value['status'] == 0 ) {
                $text = 'Inactive';
                $class = 'label label-danger';
            } elseif( $value['status'] == 1 )  {
                $text = 'Active';
                $class = 'label label-success';
            }

            $no++;

            $temp_row['status'] = '<label class="'.$class.'">'.$text.'</label>';
            $row[] = $temp_row;
        }   

        echo json_encode([
            'draw' => $data['draw'],
            'recordsTotal' => $data['recordsTotal'],
            'recordsFiltered' => $data['recordsFiltered'],
            'data' => $row
        ]);

        }else{
            $this->load->view(ADMIN_VIEW.'usermaster/usermaster/');
        }
    }


    public function add()
    {
            
        $data['country'] = $this->crud->get_selected_fields('countrymaster','id,name');
        $this->load->view(ADMIN_VIEW.'campingmaster/linkmaster/add',$data);
    }

    public function fetch_state()
    {
        if($this->input->post('country_id'))
        {
            $id = $this->input->post('country_id');
            $city = $this->crud->get_selected_fields('statemaster','id,name',['country_id' => $id]);

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
            $city = $this->crud->get_selected_fields('areamaster','id,name',['city_id' => $id]);
            echo '<option value="">Select Area</option>';
            foreach ($city as $key => $value) {
                echo '<option value="'.$value->id.'">'.$value->name.'</option>'.$id;
            }
        }
    }

    
    public function store()
    {
        // echo "<pre>";print_r($this->input->post());die;
        $this->form_validation->set_rules('country_id','Country','required|trim');
        $this->form_validation->set_rules('link','Link','required|trim');
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('coin','Coin','required');
        $this->form_validation->set_rules('click','Click','required');
        $this->form_validation->set_rules('timer','Timer','required');
        $this->form_validation->set_rules('status','Status','required');


         
        if( !$this->form_validation->run() ) {
            $this->add();
        } else {

            $post_data = $this->input->post();
            $is_success = $this->crud->insert('linkmaster',$post_data);

                if( $is_success ) {
                $this->session->set_flashdata('response','success');
                $this->session->set_flashdata('error','Record added successfully');
                redirect($this->base_url);
            } else {
                $this->session->set_flashdata('response','error');
                $this->session->set_flashdata('error','Something went wrong! Please try again.');
                redirect($this->base_url.'add');
            }
        }
    }

    public function delete($id = null)
    {
        if( !is_null($id) ) {

            $is_success = $this->crud->delete('usermaster',['id' => $id]);
            if( $is_success ) {
                echo json_encode([
                    'response' => true,
                    'status' => 'success',
                    'error' => 'Record deleted successfully'
                ]);
            } else {
                echo json_encode([
                    'response' => false,
                    'status' => 'error',
                    'error' => 'Something went wrong. Please try again.'
                ]);
            }
        } else {
            echo json_encode([
                'response' => false,
                'status' => 'error',
                'error' => 'Direct access to this URL is not allowed'
            ]);
        }
    }

    public function edit($id = null)
    {
        if( !empty($id) ) {
            $data['country'] = $this->crud->get_with_where('countrymaster',['status'=>1]);
            $data['state'] = $this->crud->get_with_where('statemaster',['status'=>1]);
            $data['result'] = $this->crud->get_one_row('usermaster',['id' => $id]);

            $data['qulification'] = $this->crud->get_with_where('qualification',['status'=>1]);

            $this->load->view(ADMIN_VIEW.'usermaster/usermaster/edit',$data);
        } else {
            $this->session->set_flashdata('response','error');
            $this->session->set_flashdata('error','Direct access to this URL is not allowed');
            redirect($this->base_url);
        }
    }

     public function update()
    {



        $post_data = $this->input->post();
        
        $this->form_validation->set_rules('firstname','Firstname','required|trim');
        $this->form_validation->set_rules('lastname','Lastname','required');
        $this->form_validation->set_rules('mobile','Mobile','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('dob','Dob','required');
        $this->form_validation->set_rules('qulification','Qulification','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('invitedcode','Invitedcode','required');

        $pincode = $this->crud->get_with_where('pincodemaster',['id' => $post_data['pincode_id']]);

        $this->form_validation->set_rules('status','Status','required');



        if( !$this->form_validation->run() ) {
            $this->edit($post_data['id']);


        } else {



            $post_data['country_id'] = $pincode[0]->country_id;
            $post_data['state_id'] = $pincode[0]->state_id;
            $post_data['city_id'] = $pincode[0]->city_id;
            $post_data['area_id'] = $pincode[0]->area_id;

            
            
            $is_success = $this->crud->update('usermaster',$post_data,['id' => $post_data['id']]);

            if( $is_success ) {
                $this->session->set_flashdata('response','success');
                $this->session->set_flashdata('error','Record update successfully');
                redirect($this->base_url);
            } else {
                $this->session->set_flashdata('response','error');
                $this->session->set_flashdata('error','Something went wrong! Please try again.');
                redirect($this->base_url.'edit/'.$post_data['id']);
            }
        }
    }

    // Add Coin in User

    public function addcoin($id)
    {
        if ($id) 
        {
            $data['result'] = $this->crud->get_one_row('usermaster',['id'=>$id]);
            $this->load->view(ADMIN_VIEW.'usermaster/usermaster/addcoin',$data);
        }else
        {
            redirect($this->base_url);
        }
    }

    public function addcoinuser()
    {
        $post_data = $this->input->post();

        $this->form_validation->set_rules('coin','Coin','required|trim|numeric');
        $this->form_validation->set_rules('description','Description','required|trim');

        $admin_credit_balance = $this->crud->get_one_row('admin_balance',['id'=>1]);
        

        if( !$this->form_validation->run() ) {
            $this->addcoin($post_data['userid']);
        } else {

                $post_data['credit_debit'] = '1';
                $post_data['created_at'] = date('Y-m-d h:i:s a', time());
            
                $is_success = $this->crud->insert('walletmaster',$post_data);

                if( $is_success ) {

                    $check_balance = $this->crud->get_one_row('usermaster',['id'=>$post_data['userid']]);
                    $total_balance = $check_balance->wallet_balance + $post_data['coin'];
                    $update_data = $this->crud->update('usermaster',['wallet_balance'=>$total_balance],['id'=>$post_data['userid']]);

                    $admin_credit = $admin_credit_balance->user_credit_balance + $post_data['coin'];
                    $admin_update = $this->crud->update('admin_balance',['user_credit_balance'=>$admin_credit],['id'=>1]);

                $this->session->set_flashdata('response','success');
                $this->session->set_flashdata('error','Record added successfully');
                redirect($this->base_url);
            } else {
                $this->session->set_flashdata('response','error');
                $this->session->set_flashdata('error','Something went wrong! Please try again.');
                redirect($this->base_url.'add');
            }
        }
    }


    public function export_excel_running()
    {
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID'); 
        $sheet->setCellValue('B1', 'Firstname'); 
        $sheet->setCellValue('C1', 'Lastname'); 
        $sheet->setCellValue('D1', 'Mobile'); 
        $sheet->setCellValue('E1', 'Email'); 
        $sheet->setCellValue('F1', 'Password'); 
        $sheet->setCellValue('G1', 'IP address'); 
        $sheet->setCellValue('H1', 'Wallet Balance'); 
        $sheet->setCellValue('I1', 'DOB'); 
        $sheet->setCellValue('J1', 'Qualification'); 
        $sheet->setCellValue('K1', 'Gender'); 
        $sheet->setCellValue('L1', 'Total Refer'); 
        $sheet->setCellValue('M1', 'Country'); 
        $sheet->setCellValue('N1', 'State'); 
        $sheet->setCellValue('O1', 'District');
        $sheet->setCellValue('P1', 'Taluka');
        $sheet->setCellValue('Q1', 'City');
        $sheet->setCellValue('R1', 'Pincode');
        $sheet->setCellValue('S1', 'Address');

        $sheet->getColumnDimension('A')->setWidth(18);

        $sheet->getColumnDimension('A')->setWidth(18);
        $sheet->getColumnDimension('B')->setWidth(18);
        $sheet->getColumnDimension('C')->setWidth(18);
        $sheet->getColumnDimension('D')->setWidth(18);
        $sheet->getColumnDimension('E')->setWidth(18);
        $sheet->getColumnDimension('F')->setWidth(18);
        $sheet->getColumnDimension('G')->setWidth(18);
        $sheet->getColumnDimension('H')->setWidth(18);
        $sheet->getColumnDimension('I')->setWidth(18);
        $sheet->getColumnDimension('J')->setWidth(18);
        $sheet->getColumnDimension('K')->setWidth(18);
        $sheet->getColumnDimension('L')->setWidth(18);
        $sheet->getColumnDimension('M')->setWidth(18);
        $sheet->getColumnDimension('N')->setWidth(18);
        $sheet->getColumnDimension('O')->setWidth(18);
        $sheet->getColumnDimension('P')->setWidth(18);
        $sheet->getColumnDimension('Q')->setWidth(18);
        $sheet->getColumnDimension('R')->setWidth(18);
        $sheet->getColumnDimension('S')->setWidth(40);


        $data  = $this->crud->get_all('usermaster');

        $i = 3;
        if(!empty($data) && is_array($data)) 
        {
            foreach ($data as $key => $value) 
            {
                $sheet->setCellValue('A'.$i, $value->id);
                $sheet->setCellValue('B'.$i, $value->firstname);
                $sheet->setCellValue('C'.$i, $value->lastname);
                $sheet->setCellValue('D'.$i, $value->mobile);
                $sheet->setCellValue('E'.$i, $value->email);
                $sheet->setCellValue('F'.$i, base64_decode($value->password));
                $sheet->setCellValue('G'.$i, $value->ip_address);
                $sheet->setCellValue('H'.$i, $value->wallet_balance);
                $sheet->setCellValue('I'.$i, $value->dob);
                $sheet->setCellValue('J'.$i, $value->qulification);
                $sheet->setCellValue('K'.$i, $value->gender);
                $total_refer = $this->crud->countrow('usermaster',['refercode'=>$value->invitedcode]);
                $sheet->setCellValue('L'.$i, $total_refer);
                $country = $this->crud->get_one_row('countrymaster',['id' => $value->country_id]);
                $sheet->setCellValue('M'.$i, $country->name);
                $state = $this->crud->get_one_row('statemaster',['id' => $value->state_id]);
                $sheet->setCellValue('N'.$i, $state->name);
                $district = $this->crud->get_one_row('districtmaster',['id' => $value->district_id]);
                $sheet->setCellValue('O'.$i, $district->name);
                $city = $this->crud->get_one_row('citymaster',['id' => $value->city_id]);
                $sheet->setCellValue('P'.$i, $city->name);
                $area = $this->crud->get_one_row('areamaster',['id' => $value->area_id]);
                $sheet->setCellValue('Q'.$i, $area->name);
                $pincode = $this->crud->get_one_row('pincodemaster',['id' => $value->pincode_id]);
                $sheet->setCellValue('R'.$i, $pincode->pincode);
                $sheet->setCellValue('S'.$i, $value->address);

                $i++;
            }
        }
        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'usermaster_'.date('Y_m_d_h_i_s'); // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');  // download file 

        exit();

    }
}

?>