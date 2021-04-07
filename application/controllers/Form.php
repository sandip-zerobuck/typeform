<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->base_url = BASE_URL.'form';

  }
  
  public function index($access_token)
  { 

    $data['result'] = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);
    $this->load->view('form',$data);
  }

  

  

}

?>