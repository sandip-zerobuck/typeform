<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->base_url = BASE_URL_ADMIN.'subadmin';

		if( !$this->crud->is_login() ) {
			redirect(BASE_URL_ADMIN.'login');
		}

        if($this->session->userdata('admin_type') != 'admin') { 
            $this->session->set_flashdata('response','error');
            $this->session->set_flashdata('error','You are not authorized to access this module.');
            redirect(BASE_URL_ADMIN);
        }
	}

	public function index()
	{

		$this->load->view(ADMIN_VIEW.'subadmin/index');
	}

	public function datatable()
	{
		$this->load->library('datatables');

        $this->db->where('type','subadmin');
		$this->datatables->select('id,username,status');
        $this->datatables->from('users');

        $data = json_decode($this->datatables->generate("json"), true);
        # loop through each item and set param identifier

        $row = [];
        $temp_row = [];
        $no=1;
        foreach ($data['data'] as $key => $value) {
        	$temp_row['id'] = '<lable class="label label-danger">'.$no.'</lable>';

        	$temp_row['username'] = $value['username'];
        	

        	

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
           /* $temp_row['action'] = '<a class="p-5" href="'.BASE_URL_ADMIN.'subadmin/index/edit/'.$value['id'].'"><i class="icon-pencil3"></i></a>';*/
            $temp_row['action'] = '<a class="p-5 delete" href="'.BASE_URL_ADMIN.'subadmin/index/delete/'.$value['id'].'"><i class="icon-trash"></i></a>';

            $row[] = $temp_row;

        }	

       	echo json_encode([
       		'draw' => $data['draw'],
       		'recordsTotal' => $data['recordsTotal'],
       		'recordsFiltered' => $data['recordsFiltered'],
       		'data' => $row
       	]);
	}

	public function add()
	{
		$data['module'] = $this->crud->get_with_where('module',['status'=>'1']);
		$this->load->view(ADMIN_VIEW.'subadmin/add',$data);
	}

	
    public function store()
    {
    	$post_data = $this->input->post();

        $this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required');
        /*$this->form_validation->set_rules('module','Module','required');*/

        if( !$this->form_validation->run() ) {
            $this->add();
        } else {
        	
        	$post_data['password'] = md5($post_data['password']);
            $module_id = $post_data['module'];
            unset($post_data['module']);

            /*print_r($module_id); die();*/
            $is_success = $this->crud->insert('users',$post_data);
            $admin_id = $this->db->insert_id();

            foreach ($module_id as $key => $value) 
            {
                
                
                $data = array('admin_id'=>$admin_id, "module_id"=>$value);
                $this->crud->insert('admin_module',$data);
            }


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

			$is_success = $this->crud->delete('users',['id' => $id]);
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
            $data['module'] = $this->crud->get_with_where('module',['status'=>'1']);
            $data['admin_module'] = $this->crud->get_with_where('admin_module',['admin_id'=>$id]);
			$data['result'] = $this->crud->get_one_row('users',['id' => $id]);
			$this->load->view(ADMIN_VIEW.'subadmin/edit',$data);
		} else {
			$this->session->set_flashdata('response','error');
			$this->session->set_flashdata('error','Direct access to this URL is not allowed');
			redirect($this->base_url);
		}
	}

	public function update()
	{
		$post_data = $this->input->post();
		$this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('name','Mobile','required');
        $this->form_validation->set_rules('email','Email','required');

		if( !$this->form_validation->run() ) {
			$this->edit($post_data['id']);
		} else {
			
           $post_data['password'] = base64_encode($post_data['password']);

			$is_success = $this->crud->update('ads_user',$post_data,['id' => $post_data['id']]);

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
}

?>