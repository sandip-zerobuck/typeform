<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typeform extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->base_url = BASE_URL.'typeform';

    if( !$this->crud->is_login_user() ) {
      redirect(BASE_URL.'login');
    }
  }
  
  public function index()
  {   
    $this->load->view('typeform/index');
  }

}

?>