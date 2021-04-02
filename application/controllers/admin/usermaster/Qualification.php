<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qualification extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->base_url = BASE_URL_ADMIN.'usermaster/qualification';

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

		$this->load->view(ADMIN_VIEW.'usermaster/qualification/index');
	}

	public function datatable()
	{
		$this->load->library('datatables');
        $this->datatables->select('id, name, status');
        $this->datatables->from('qualification');

        $data = json_decode($this->datatables->generate("json"), true);
        # loop through each item and set param identifier

        $row = [];
        $temp_row = [];
        $no=1;
        foreach ($data['data'] as $key => $value) {
        	$temp_row['id'] = $no;
        	$temp_row['name'] = $value['name'];

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
            $temp_row['action'] = '<a class="p-5" href="'.BASE_URL_ADMIN.'usermaster/qualification/edit/'.$value['id'].'"><i class="icon-pencil3"></i> Edit</a><br><br>';
            $temp_row['action'] .= '<a class="p-5 delete text-danger" href="'.BASE_URL_ADMIN.'usermaster/qualification/delete/'.$value['id'].'"><i class="icon-trash"></i> Delete</a>';

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
		$this->load->view(ADMIN_VIEW.'usermaster/qualification/add');
	}

	
    public function store()
    {



        $this->form_validation->set_rules('name','Name','required|trim|is_unique[qualification.name]');



        if( !$this->form_validation->run() ) {
            $this->add();

            
        } else {
        	$post_data = $this->input->post();
            $is_success = $this->crud->insert('qualification',$post_data);

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

			$is_success = $this->crud->delete('qualification',['id' => $id]);
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
			$data['result'] = $this->crud->get_one_row('qualification',['id' => $id]);
			$this->load->view(ADMIN_VIEW.'usermaster/qualification/edit',$data);
		} else {
			$this->session->set_flashdata('response','error');
			$this->session->set_flashdata('error','Direct access to this URL is not allowed');
			redirect($this->base_url);
		}
	}

	public function update()
	{
		$post_data = $this->input->post();
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('status','Status','required');

		if( !$this->form_validation->run() ) {
			$this->edit($post_data['id']);
		} else {
			
           
			$is_success = $this->crud->update('qualification',$post_data,['id' => $post_data['id']]);

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