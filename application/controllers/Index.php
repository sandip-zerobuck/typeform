<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->base_url = BASE_URL.'index';

    if( !$this->crud->is_login_user() ) {
      redirect(BASE_URL.'home');
    }
    $this->load->model('Image_model');

    $current_date = date("Y-m-d");

  }
  
  public function index()
  {   

   // $is_success = $this->crud->delete('walletmaster',['coin' => 0,'description'=>'Refer Commission Income']);

    $data['draw'] = $this->crud->get_with_where('draw',['status'=>'1']);

    $data['covid_india'] = $this->crud->get_one_row('covid_update',['id'=>'1']); 
    $data['covid_world'] = $this->crud->get_one_row('covid_update',['id'=>'2']); 
    $this->load->view('index',$data);


  }

}

?>