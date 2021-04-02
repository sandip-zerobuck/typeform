<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Inactive extends CI_Controller 
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
        $this->load->view(ADMIN_VIEW.'usermaster/usermaster/inactive',$data);
    }


    public function datatable()
    {
        $this->load->library('datatables');
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
            "um.status"=>0
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
                                    <b>Ip Address : </b>'.$value['ip_address'].'<br><br>
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

            $no++;

           $temp_row['status'] = '<label class="'.$class.'">'.$text.'</label>';
            $temp_row['action'] = '<div style="width:90px;"><a class="p-5" href="'.BASE_URL_ADMIN.'usermaster/usermaster/edit/'.$value['id'].'"><i class="icon-pencil3"></i> Edit</a><br><br>';

            $temp_row['action'] .= '<a class="p-5 text-success" href="'.BASE_URL_ADMIN.'usermaster/usermaster/addcoin/'.$value['id'].'"><i class="icon-plus-circle2"></i> Add Coin</a><br><br>';

            $temp_row['action'] .= '<a class="p-5 delete text-danger" href="'.BASE_URL_ADMIN.'usermaster/usermaster/delete/'.$value['id'].'"><i class="icon-trash"></i> Delete</a></div>';

            $row[] = $temp_row;

        }   

        echo json_encode([
            'draw' => $data['draw'],
            'recordsTotal' => $data['recordsTotal'],
            'recordsFiltered' => $data['recordsFiltered'],
            'data' => $row
        ]);
    }

    public function export_excel()
    {
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();

        $usermaster_data = $this->crud->get_with_where('usermaster',['status'=>'0']);
        $usermaster_cols = array('id','firstname','lastname','mobile','email','password','ip_address','wallet_balance','dob','qulification','gender','address','country_id','state_id','district_id','city_id','area_id','pincode_id');



        $total_cols = count($usermaster_cols);
        $total_rows = count($usermaster_data);

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
        $sheet->setCellValue('L1', 'Address'); 
        $sheet->setCellValue('M1', 'Country'); 
        $sheet->setCellValue('N1', 'State'); 
        $sheet->setCellValue('O1', 'District');
        $sheet->setCellValue('P1', 'Taluka');
        $sheet->setCellValue('Q1', 'City');
        $sheet->setCellValue('R1', 'Pincode');


        if(!empty($usermaster_data)) {

            for( $i=0; $i < $total_rows ; $i++ ) { 
                $col = 'A';
                for($j=0; $j < $total_cols; $j++) {



                    if($usermaster_cols[$j] == 'country_id') {
                        $country_id = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $countrymaster_row = $this->crud->get_one_row('countrymaster',['id' => $country_id]);
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = $countrymaster_row->name;
                    }if($usermaster_cols[$j] == 'state_id') {
                        $state_id = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $statemaster_row = $this->crud->get_one_row('statemaster',['id' => $state_id]);
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = $statemaster_row->name;
                    }if($usermaster_cols[$j] == 'district_id') {
                        $district_id = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $districtmaster_row = $this->crud->get_one_row('districtmaster',['id' => $district_id]);
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = $districtmaster_row->name;
                    }if($usermaster_cols[$j] == 'city_id') {
                        $city_id = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $citymaster_row = $this->crud->get_one_row('citymaster',['id' => $city_id]);
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = $citymaster_row->name;
                    }if($usermaster_cols[$j] == 'area_id') {
                        $area_id = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $areamaster_row = $this->crud->get_one_row('areamaster',['id' => $area_id]);
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = $areamaster_row->name;
                    }if($usermaster_cols[$j] == 'pincode_id') {
                        $pincode_id = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $pincodemaster_row = $this->crud->get_one_row('pincodemaster',['id' => $pincode_id]);
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = $pincodemaster_row->pincode;
                    }if($usermaster_cols[$j] == 'password') {
                        $password = $usermaster_data[$i]->{$usermaster_cols[$j]};
                        $usermaster_data[$i]->{$usermaster_cols[$j]} = base64_decode($password);
                    }



                    if($usermaster_cols[$j] == 'id') {
                        $sheet->setCellValue($col.($i+3), $i+1);                        
                    } else {

                        $sheet->setCellValue($col.($i+3), $usermaster_data[$i]->{$usermaster_cols[$j]});
                    }

                   $col++;
                }
            }
        }
        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'usermaster_'.date('Y_m_d_h_i_s'); // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');  // download file 

    }
    
}

?>