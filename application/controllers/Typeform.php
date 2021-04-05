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
                        'name'=>$post_data['data'][$i]['value']['short_text_value'],
                        'value'=>$post_data['data'][$i]['value']['short_text_placeholder'],
                        'required_field'=>$post_data['data'][$i]['value']['required_field']
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
                          'name'=>$post_data['data'][$i]['value']['long_text_value'],
                          'value'=>$post_data['data'][$i]['value']['long_text_placeholder'],
                        'required_field'=>$post_data['data'][$i]['value']['required_field']
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
                      echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully','data'=>md5($insert_id)]);
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

          $content = '<div id="name" class="is-visible next_lable0 next_lable"><center> <h1> Welcome to the zerobuck </h1> <button class="btn-start" data-from="1" data-to="0" data-type="welcome" data-required="no">Start</button></center>  </div> <input type="hidden" id="form-id" value="'.$result->id.'"> ';

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
                
                  $content .= '<div class="next_lable next_lable'.$no.'" data-counter="'.$no.'" data-type="'.$value->type.'" data-name="'.$short_text->name.'">';
                  $content .= '<center>';
                  $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$short_text->name.'</h1>';
                  $content .= '<input type="text" class="short_text_input short_text_value'.$no.'" value="" placeholder="Type your answer here..."  ><br><br>';
                  $content .= '<button class="btn-start" data-from="'.($no+1).'" data-to="'.($no).'" data-type="'.$value->type.'" data-required="'.$short_text->required_field.'">Next</button>';
                  $content .= '</center>';
                  $content .= '</div>';

                }elseif ($value->type == 'long_text') {


                    $long_text = $this->crud->get_one_row('long_text',['id'=>$value->long_text_id]);
                    $content .= '<div class="next_lable next_lable'.$no.'" data-counter="'.$no.'" data-type="'.$value->type.'" data-name="'.$long_text->name.'">';
                    $content .= '<center>';
                    $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$long_text->name.'</h1>';
                    $content .= '<input type="text" class="long_text_input long_text_value'.$no.'" value="" placeholder="Type your answer here..."><br><br>';
                    $content .= '<button class="btn-start" data-from="'.($no+1).'" data-to="'.($no).'" data-required="'.$value->type.'" data-required="'.$long_text->required_field.'">Next</button>';
                    $content .= '</center>';
                    $content .= '</div>';
                }

                $no++;
            }

            $content .= '<div id="name" class="error-msg hidden"><center> <b class="text-danger text-error"></b></center></div>';

            $content .= '<div id="name" class="next_lable'.($total+1).' next_lable"><center> <h1> Thank you so mush </h1> <button class="btn-submit">Submit</button></center>  </div>';
              
          }

          echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully','data'=>$content,'total'=>$total]);
        }else{
          echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
        }

        
      }else{
        echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
      }
  }

  public function storeUserResponse()
  {
      $post_data = $this->input->post();

      $this->form_validation->set_rules('id','Id','required|trim');

      if( !$this->form_validation->run() ) {
            echo json_encode(['statuscode'=>false,'msg'=>validation_error()]);
        } else {

              $insert_data = [
                   'form_master_id'=>$post_data['id'],
                   'created_at'=>date("Y-m-d H:i:s")
                ];

            $is_success = $this->crud->insert('response_master',$insert_data);
            $insert_id = $this->db->insert_id();

            $is_success = $this->crud->update('response_master',['access_token'=>md5($insert_id)],['id'=>$insert_id]);
             

              for ($i=0; $i < count($post_data['data']); $i++) { 

               if ($post_data['data'][$i]['type'] == 'short_text') 
                {
                  $short_data = [
                        'response_master_id'=>$insert_id,
                        'name'=>$post_data['data'][$i]['name'],
                        'value'=>$post_data['data'][$i]['value'],
                        'type'=>$post_data['data'][$i]['type'],
                    ];

                    $is_success = $this->crud->insert('user_response',$short_data);
                }elseif ($post_data['data'][$i]['type'] == 'long_text'){

                    $long_data = [
                        'response_master_id'=>$insert_id,
                        'name'=>$post_data['data'][$i]['name'],
                        'value'=>$post_data['data'][$i]['value'],
                        'type'=>$post_data['data'][$i]['type'],
                    ];
                    $is_success = $this->crud->insert('user_response',$long_data);
                }
               
              }

              if( $is_success ) {
                      echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully']);
              }else{
                  echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
              }

        }

  }

}

?>