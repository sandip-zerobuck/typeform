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

  public function view($access_token)
  { 
      $data['result'] = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);
      $this->load->view('typeform/view',$data);
  }

  public function store()
  {
      $post_data = $this->input->post();

      $this->form_validation->set_rules('name','Name','required|trim');

      if( !$this->form_validation->run() ) {
            echo json_encode(['statuscode'=>false,'msg'=>validation_error()]);
        } else {

              $insert_data = [
                   'name'=>$post_data['name'],
                   'user_id'=>$this->session->userdata('userid'),
                   'created_at'=>date("Y-m-d H:i:s")
                ];

            $is_success = $this->crud->insert('form_master',$insert_data);
            $insert_id = $this->db->insert_id();

            $is_success = $this->crud->update('form_master',['access_token'=>md5($insert_id)],['id'=>$insert_id]);
             

              for ($i=0; $i < count($post_data['data']); $i++) { 

               if ($post_data['data'][$i]['type'] == 'short-text') 
                {
                  $short_text = [
                        'name'=>$post_data['data'][$i]['value']['short_text_value']
                    ];

                    $is_success = $this->crud->insert('short_text',$short_text);
                    $short_insert_id = $this->db->insert_id();

                    if ($is_success) 
                    {
                        $form_create_short = [
                          'form_master_id'=>$insert_id,
                          'type'=> 'short_text',
                          'short_text_id'=> $short_insert_id
                          ];

                        $is_success = $this->crud->insert('form_create',$form_create_short);
                    }
                }else{

                      $long_text = [
                          'name'=>$post_data['data'][$i]['value']['long_text_value']
                      ];

                      $is_success = $this->crud->insert('long_text',$long_text);
                      $long_insert_id = $this->db->insert_id();

                      if ($is_success) 
                      {
                          $form_create_long = [
                            'form_master_id'=>$insert_id,
                            'type'=> 'long_text',
                            'long_text_id'=> $long_insert_id
                            ];

                          $is_success = $this->crud->insert('form_create',$form_create_long);
                      }

                }
               
              }

              if( $is_success ) {
                      echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully']);
              }else{
                  echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
              }

        }

  }

  public function viewform($access_token)
  {

      if (!empty($access_token)) 
      {

        $result = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);

        if (!empty($result)) {

          $content = '<label id="name" class="is-visible next_lable0 next_lable"><center> <h1> Welcome to the zerobuck </h1> <button class="btn-start" onclick="next(1,0)">Start</button></center>  </label>';

          $form = $this->crud->get_with_where('form_create',['form_master_id'=>$result->id]);

          if (!empty($form)) 
          {

            $no = 1;
            $total = count($form);
            foreach ($form as $key => $value) 
            {
              
                if ($value->type == 'short_text') 
                {

                  $short_text = $this->crud->get_one_row('short_text',['id'=>$value->short_text_id]);
                
                  $content .= '<label class="next_lable next_lable'.$no.'">';
                  $content .= '<center>';
                  $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$short_text->name.'</h1>';
                  $content .= '<input type="text" class="short_text_input" value="" placeholder="Type your answer here..."><br><br>';
                  $content .= '<button class="btn-start" onclick="next('.$no.','.($no-1).')">Next</button></center>';
                  $content .= '</center>';

                  $content .= '<button class="prev" onclick="next(1,0)"><i class="fa fa-arrow-up" style="font-size:20px"></i></button>';
                  $content .= '<button class="next" onclick="next(1,2)"><i class="fa fa-arrow-down" style="font-size:20px"></i></button>';
                  $content .= '</lable>';

                }elseif ($value->type == 'long_text') {


                    $long_text = $this->crud->get_one_row('long_text',['id'=>$value->long_text_id]);
                    
                    $content .= '<label class="next_lable">';
                    $content .= '<center>';
                    $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$long_text->name.'</h1>';
                    $content .= '<input type="text" class="long_text_input" value="" placeholder="Type your answer here...">';
                    $content .= '<button class="btn-start">Next</button></center>';
                    $content .= '</center>';
                    $content .= '</lable>';
                }

                $no++;
            }
              
          }

          echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully','data'=>$content,'total'=>$total]);
        }else{
          echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
        }

        
      }else{
        echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
      }
  }

}

?>