<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->base_url = BASE_URL.'index';

    if( !$this->crud->is_login_user() ) {
      redirect(BASE_URL.'login');
    }
  }
  
  public function index()
  { 

    $data['form_master'] = $this->crud->get_all('form_master');

    $this->load->view('index',$data);
  }

  

  

}

?>