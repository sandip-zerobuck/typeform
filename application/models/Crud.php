<?php

class Crud extends CI_Model

{

    public function check_exist($table,$where)

    {

        $this->db->select('*');

        $this->db->where($where);

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return true;

        }

        return false;

    }



    public function get_selected_fields($table,$select,$where = null)

    {

        $this->db->select($select);



        if( !is_null($where) ) {

          $this->db->where($where);

        }

        

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    // Get Select Liit



    public function get_selected_limit($table,$select,$where = null)

    {

        $this->db->select($select);



        if( !is_null($where) ) {

          $this->db->where($where);

        }



        $this->db->limit(6);

        

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }





    // Count Number of the Result ...



    public function countrow($table,$where = null)

    {

        $this->db->select('*');

        if( !is_null($where) ) {

          $this->db->where($where);

        }

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->num_rows();

        }

        return 0;

    }



    // Count Sum of row



    public function sumrow($table,$column,$column_alias,$where = null)

    {



        $this->db->select("SUM($column) as $column_alias");

        if( !is_null($where) ) {

          $this->db->where($where);

        }

        $query = $this->db->get($table)->row();



        if (!empty($query)) 

        {

            return $query;

        }

        return 0;

    }







    





// Admin Login



 public function authenticate($username,$password)

    {

        if( $this->check_exist('users',['username' => $username ]) ) {

            $db_password = $this->get_selected_fields('users','*',['username' => $username]);



            if( md5($password) == $db_password[0]->password ) {

                return $db_password;

            }

        }

        return false;

    }



    public function is_login()

    {

        if( $this->session->has_userdata('admin_id') && !empty($this->session->userdata('admin_id')) ) {

            return true;

        }

        return false;

    }



// User Login...







    public function authenticate_user($username,$password)

    {

        if( $this->check_exist('users',['username' => $username ]) ) {

            $db_password = $this->get_selected_fields('users','id,password',['username' => $username]);

            if( md5($password) == $db_password[0]->password ) {

                return $db_password[0]->id;

            }

        }

        return false;

    }



    public function is_login_user()

    {

        if( $this->session->has_userdata('userid') && !empty($this->session->userdata('userid')) ) {

            return true;

        }

        return false;

    }



    public function insert($table, $data)
    {
        return $this->db->insert($table,$data);
    }



    public function delete($table, $where) 

    {

        return $this->db->delete($table,$where);

    }



    public function upload($filename,$path,$allowed_types)

    {

        $config['upload_path']          = $path;

        $config['allowed_types']        = $allowed_types;

        // $config['max_size']             = 100;

        // $config['max_width']            = 1024;

        // $config['max_height']           = 768;



        if( !file_exists($path) ) {

            mkdir($path);

        }



        $this->load->library('upload', $config);

        



        $response = array();

        if ( !$this->upload->do_upload($filename))

        {   

            $response['response'] = false;

            $response['error'] = $this->upload->display_errors();

        }

        else

        {

            $response['response'] = true;

            $data = $this->upload->data();

            $response['error'] = !empty($data['file_name']) ? $data['file_name'] : '';

        }

        return $response;

    }



    public function upload_with_size($filename,$path,$allowed_types,$width,$height,$size)

    {



        $config['upload_path']          = $path;

        $config['allowed_types']        = $allowed_types;

        $config['max_size']             = $size;

        $config['max_width']            = 1024000;

        $config['max_height']           = 7680000;

        $config['encrypt_name']           = TRUE;

        $config['overwrite']           = FALSE;



        if( !file_exists($path) ) {

            mkdir($path);

        }



        $this->load->library('upload', $config);

        $response = array();

        if ( !$this->upload->do_upload($filename))

        {  

            $response['response'] = false;

            $response['error'] = $this->upload->display_errors();

        }

        else

        {

            $response['response'] = true;

            $data = $this->upload->data();

            $file_name = $data['file_name'];

            $config['image_library'] = 'gd2';

            $config['source_image'] = $path.$file_name;

            $config['create_thumb'] = FALSE;

            $config['maintain_ratio'] = FALSE;

            $config['width'] = $width;

            $config['height'] = $height;

            $config['new_image'] = $path.$file_name;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            $response['error'] = $file_name;

        }

        //$params = array('gambar' => $file_name);

       // echo '<pre>'; print_r($config); die();

        return $response;

    }



    public function get_one_row($table,$where,$order_col = null, $order_by = 'DESC',$limit = null)

    {

        $this->db->select('*');

        $this->db->where($where);

        if(!is_null($limit)) {
            $this->db->limit($limit);
        }

        if(!is_null($order_col)) {
            $this->db->order_by($order_col,$order_by);
        }

        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {

            return $query->row();

        }

        return false;

    }



    public function get_one_row_not_where($table,$where = null)

    {

        $this->db->select('*');



         if( !is_null($where) ) {

            $this->db->where($where);

        }



        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {

            return $query->row();

        }

        return false;

    }



    public function get_one_column($table, $column, $where = null)

    {

        $this->db->select($column);



        if( !is_null($where) ) {

            $this->db->where($where);

        }



        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {

            $result = $query->result_array();

            $return_val = [];

            foreach ($result as $key => $value) {

                $return_val[] = $value[$column];

            }

            return $return_val;

        }

        return false;

    }



    public function update($table, $data, $where, $increment_col = []) 

    {

        if(!empty($data)) {

            $this->db->set($data);

        } 

        if(!empty($increment_col)) {

            foreach ($increment_col as $key => $value) {

                $this->db->set($key, $value, false);

            }

        }

        $this->db->where($where);

        return $this->db->update($table);



    }



    public function update_all($table, $data) 

    {

        if(!empty($data)) {

            $this->db->set($data);

        } 

        return $this->db->update($table);



    }



    public function get_with_join($table, $select, $where = null, $join_array = null, $join_type = null,$order_col = null, $order_by = 'DESC')

    {

        $this->db->select($select);



        if( !empty($where) ) {

            $this->db->where($where);

        }



        if( !empty($join_array) ) {

            $i = 0;

            foreach ($join_array as $join_table => $join_condition) {



                if( !is_null($join_type) && is_array($join_type) && (count($join_array) == count($join_type)) ) {

                    $this->db->join($join_table, $join_condition, $join_type[$i]);

                } else {

                    $this->db->join($join_table, $join_condition);

                }

                $i++;

            }

        }





        if(!is_null($order_col)) {

            $this->db->order_by($order_col,$order_by);

        }



        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    public function get_all($table) 

    {

        $this->db->select('*');

        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    public function get_with_where($table, $where, $select = '*',$order_col = null, $order_by = 'DESC',$limit = null)

    {

        $this->db->select($select);

        $this->db->where($where);

        if(!is_null($limit)) {
            $this->db->limit($limit);
        }


        if(!is_null($order_col)) {

            $this->db->order_by($order_col,$order_by);

        }



        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    public function change_balance( $user_id, $amount, $type = '1') 

    {

        if( $type == '1' ) {

            $value = "wallet+$amount";

        } else {

            $value = "wallet-$amount";

        }

        $this->db->set('wallet',$value,false);

        $this->db->where(['id' => $user_id]);

        $response = $this->db->update('usermaster');

        return $response;

    }





    // Order By Asending and Desending...



    public function get_with_where_orderby($table, $where, $order_by, $select = '*')

    {

        $this->db->select($select);

        $this->db->where($where);

       $this->db->order_by($order_by);

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    // Search Result Like ...



    public function get_with_like($table,$like,$select = '*',$where = null)

    {

        $this->db->select($select);

        if(!is_null($where)) {

            $this->db->where($where);

        }

        $this->db->like($like);

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    public function get_with_like_not($table,$like,$likenot,$select = '*',$where = null)

    {

        $this->db->select($select);

        if(!is_null($where)) {

            $this->db->where($where);

        }





        $this->db->like($like);

        $this->db->not_like($likenot);

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }





    // Limit Buy in .. Like



    public function get_with_like_limit($table,$like,$select = '*',$where = null)

    {

        $this->db->select($select);

        if(!is_null($where)) {

            $this->db->where($where);

        }

        $this->db->limit(6);

        $this->db->like($like);

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    public function get_with_like_not_limit($table,$like,$likenot,$select = '*',$where = null)

    {

        $this->db->select($select);

        if(!is_null($where)) {

            $this->db->where($where);

        }



        $this->db->limit(6);

        $this->db->like($like);

        $this->db->not_like($likenot);

        $query = $this->db->get($table);



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }







    public function get_order_by_limit($table, $order_col, $order_by, $limit, $where = null)

    {



        $this->db->select('*');



        if(!is_null($where)) {

            $this->db->where($where);

        }



        $this->db->order_by($order_col, $order_by);

        $this->db->limit($limit);

        $query = $this->db->get($table);



        if($query->num_rows() > 0) {

            return $query->result();

        }

        return false;



    }





    // Send Mail Function...



    public function send_mail($to,$subject,$message,$attachment = null) 

    {

        //Load email library 

        $config = Array(

            'protocol' => 'smtp',

            'smtp_host' => SMTP_HOST,

            'smtp_port' => SMTP_PORT,

            'smtp_user' => SMTP_FROM,

            'smtp_pass' => SMTP_PASS,

            'charset'    => 'utf-8',

            'newline'    => "\r\n",

            'mailtype' => 'html',

            'validation' => FALSE

        );

        $this->load->library('email',$config); 



        $this->email->set_newline("\r\n");  

        $this->email->from(SMTP_FROM, SMTP_USER); 

        $this->email->to($to);

        $this->email->subject($subject); 

        $this->email->message($message); 



        if( !is_null($attachment) ) {

            foreach ($attachment as $key => $value) {

                $this->email->attach($value);

            }

        }



        //Send mail 

        return $this->email->send(); 

    }





    // New All Ads Show in the ...



    public function get_with_age($table,$where,$dob,$select = '*') 

    {

        



       $query = $this->db->select($select)

              ->from($table)

              ->where($where)

              ->group_start() // Open bracket

              

                ->where(['age' => 0, 'age_max' => 0])

                ->or_group_start()

                    ->where(['age <=' => $dob, 'age_max >=' => $dob])

                ->group_end()

              

              ->group_end()

              ->get(); // Close bracket



        if( $query->num_rows() > 0 ) {

            return $query->result();

        }

        return false;

    }



    public function get_where_in($table, $where, $where_in, $select = '*')

    {

        $this->db->select($select);

        $this->db->where($where);



        if(!empty($where_in)) {

            foreach($where_in as $key => $value) {

                $this->db->where_in($key, $value);

            }

        }

        $query = $this->db->get($table);



        if($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

    }



    public function is_admin_authorized($module_name)

    {

        if($this->session->userdata('admin_type') != 'admin') {

            $module_row = $this->crud->get_one_row('module',['name' => $module_name]);

            $module_id = 0;

            if(!empty($module_row)) {

                $module_id = $module_row->id;

            }



            $is_allowed = $this->crud->check_exist('admin_module',['admin_id' => $this->session->userdata('admin_id'),'module_id' => $module_id]);

            return $is_allowed;

        }

        return true;

    }



    public function send_sms($username,$password,$senderid,$message,$mobile)

    {

            //http Url to send sms.

            $url="http://trans.saurustechnology.com/smsstatuswithid.aspx";

            $fields = array(

            'mobile' => $username,

            'pass' => $password,

            'senderid' => $senderid,

            'to' => $mobile,

            'msg' => urlencode($message)

            );



            $fields_string = '';

            foreach($fields as $key=>$value) 

            { $fields_string .= $key.'='.$value.'&'; }



            rtrim($fields_string, '&');

            //open connection



            $ch = curl_init();

            //set the url, number of POST vars, POST data

            curl_setopt($ch,CURLOPT_URL, $url);

            curl_setopt($ch,CURLOPT_POST, count($fields));

            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post

            $result = curl_exec($ch);



            //close connection

            curl_close($ch);


           return 1;
    }


    

}



?>