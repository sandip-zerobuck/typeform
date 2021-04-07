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

    $this->load->model('Typeform_model');
  }
  
  public function index()
  {   
    $this->load->view('typeform/index');
  }


  public function store()
  {
      $this->load->model('Typeform_model');
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

            $insert_id = $this->Typeform_model->storeForm('form_master',$insert_data);

            $welcome_data = [
                   'form_master_id'=>$insert_id,
                   'details'=>$post_data['welcome_data']['details'],
                   'button_text'=>$post_data['welcome_data']['button_text']
                ];

            $is_success = $this->Typeform_model->storeWelcomeAndEdnData('welcome_screen',$welcome_data);

            $end_data = [
                   'form_master_id'=>$insert_id,
                   'details'=>$post_data['end_data']['details'],
                   'button_text'=>$post_data['end_data']['button_text']
                ];
            $is_success = $this->Typeform_model->storeWelcomeAndEdnData('end_screen',$end_data);
             
              for ($i=0; $i < count($post_data['data']); $i++) { 

                $data = [
                        'name'=>$post_data['data'][$i]['name'],
                        'value'=>$post_data['data'][$i]['value'],
                        'required_field'=>$post_data['data'][$i]['required_field']
                    ];

                  // Content Insert 
                   if ($post_data['data'][$i]['type'] == 'short-text') 
                    {
                        $is_success = $this->Typeform_model->formCreateInsert('short_text',$data,$insert_id,'short_text');

                    }elseif ($post_data['data'][$i]['type'] == 'long-text') {

                        $is_success = $this->Typeform_model->formCreateInsert('long_text',$data,$insert_id,'long_text');

                    }elseif ($post_data['data'][$i]['type'] == 'yesorno-text') {
                         
                          $is_success = $this->Typeform_model->formCreateInsert('yesorno_text',$data,$insert_id,'yesorno_text');
                    }
                    // End Content Insert
              }

              if( $is_success ) {
                      echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully','data'=>md5($insert_id)]);
              }else{
                  echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
              }

        }

  }

  /* Update Form */

  public function edit($access_token)
  {
      $data['result'] = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);
      $data['welcome_screen'] = $this->crud->get_one_row('welcome_screen',['form_master_id'=>$data['result']->id]);
      $data['end_screen'] = $this->crud->get_one_row('end_screen',['form_master_id'=>$data['result']->id]);
      $this->load->view('typeform/edit',$data);
  }

  public function editdata($access_token)
  {

      if (!empty($access_token)) 
      {

        $result = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);

        if (!empty($result)) {

          $content = '';

          $form = $this->crud->get_with_where('form_create',['form_master_id'=>$result->id]);

          if (!empty($form)) 
          {

            $no = 1;
            $total = count($form);
            foreach ($form as $key => $value) 
            {
              
                if ($value->type == 'short_text') 
                {

                  $short_text = $this->crud->get_one_row('short_text',['id'=>$value->content_id]);

                  $short_checked = '';
                  if ($short_text->required_field == 'yes') {
                    $short_checked = 'checked';
                  }else{
                    $short_checked = '';
                  }

                  $content .= '<div class="filed-question-box filed_counter_'.$no.'" data-counter="'.$no.'" data-type="short-text" data-edit="yes" data-edit_id="'.$short_text->id.'">';
                  $content .= '<i class="box-icon icon-bubble-dots3 text-danger"></i>';
                  $content .= '<b class="box-text">Short Text</b>';
                  $content .= '<button class="btn btn-danger pull-right remove-box" data-counter="'.$no.'" data-edit="yes" data-id="'.$short_text->id.'" data-type="short-text"><i class="icon-trash-alt"></i> Delete</button>';
                  $content .= '<hr>';

                  $content .= '<b>Required :</b>';
                  $content .= '<label class="switch"> <input type="checkbox" name="required-value'.$no.'" class="required-value'.$no.'" '.$short_checked.'  value="yes" > <span class="slider round"></span> </label>';

                  $content .= '<br><input type="text" class="form-control text-value'.$no.'" placeholder="Your question here" name="" value="'.$short_text->name.'"><br>';

                  $content .= '<input type="text" class="form-control text-placeholder'.$no.'" placeholder="Type your answer here..." value="'.$short_text->value.'">';

                  $content .= '</div>';

                }elseif ($value->type == 'long_text') {

                    $long_text = $this->crud->get_one_row('long_text',['id'=>$value->content_id]);

                    
                    $long_checked = '';
                    if ($long_text->required_field == 'yes') {
                      $long_checked = 'checked';
                    }else{
                      $long_checked = '';
                    }

                    $content .= '<div class="filed-question-box filed_counter_'.$no.'" data-counter="'.$no.'" data-type="long-text" data-edit="yes" data-edit_id="'.$long_text->id.'">';
                    $content .= '<i class="box-icon icon-bubble-lines4 text-success"></i>';
                    $content .= '<b class="box-text">Long Text</b>';
                    $content .= '<button class="btn btn-danger pull-right remove-box" data-counter="'.$no.'" data-edit="yes" data-id="'.$short_text->id.'" data-type="long-text"><i class="icon-trash-alt"></i> Delete</button>';
                    $content .= '<hr>';

                    $content .= '<b>Required :</b>';
                    $content .= '<label class="switch"> <input type="checkbox" name="required-value'.$no.'" class="required-value'.$no.'" '.$long_checked.' value="yes" > <span class="slider round"></span> </label>';

                    $content .= '<br><input type="text" class="form-control text-value'.$no.'" placeholder="Your question here" name="" value="'.$long_text->name.'"><br>';

                    $content .= '<input type="text" class="form-control text-placeholder'.$no.'" placeholder="Type your answer here..." value="'.$long_text->value.'">';

                    $content .= '</div>';

                }elseif ($value->type == 'yesorno_text') {


                    $yesorno_text = $this->crud->get_one_row('yesorno_text',['id'=>$value->content_id]);

                    $yesorno_checked = '';
                    if ($yesorno_text->required_field == 'yes') {
                      $yesorno_checked = 'checked';
                    }else{
                      $yesorno_checked = '';
                    }


                    $content .= '<div class="filed-question-box filed_counter_'.$no.'" data-counter="'.$no.'" data-type="yesorno-text" data-edit="yes" data-edit_id="'.$yesorno_text->id.'">';
                    $content .= '<i class="icon-check text-success"></i> <i class="icon-x text-danger"></i>';
                    $content .= '<b class="box-text">Yes or No</b>';
                    $content .= '<button class="btn btn-danger pull-right remove-box" data-counter="'.$no.'" data-edit="yes" data-id="'.$short_text->id.'" data-type="yesorno-text"><i class="icon-trash-alt"></i> Delete</button>';
                    $content .= '<hr>';

                    $content .= '<b>Required :</b>';
                    $content .= '<label class="switch"> <input type="checkbox" name="required-value'.$no.'" class="required-value'.$no.'" '.$yesorno_checked.' value="yes" > <span class="slider round"></span> </label>';

                    $content .= '<br><input type="text" class="form-control text-value'.$no.'" placeholder="Your question here" name="" value="'.$yesorno_text->name.'"><br>';

                    $content .= '<input type="text" class="form-control text-placeholder'.$no.'" placeholder="Type your answer here..." value="'.$yesorno_text->value.'">';

                    $content .= '</div>';
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

  public function update()
  {
      $this->load->model('Typeform_model');
      $post_data = $this->input->post();

      $this->form_validation->set_rules('name','Name','required|trim');

      if( !$this->form_validation->run() ) {
            echo json_encode(['statuscode'=>false,'msg'=>validation_error()]);
        } else {

            $is_success = $this->crud->update('form_master',['name'=>$post_data['name']],['id'=>$post_data['id']]);

            $welcome_data = [
                   'details'=>$post_data['welcome_data']['details'],
                   'button_text'=>$post_data['welcome_data']['button_text']
                ];

            $is_success = $this->Typeform_model->updateWelcomeAndEdnData('welcome_screen',$welcome_data,['id'=>$post_data['welcome_data']['id']]);

            $end_data = [
                   'details'=>$post_data['end_data']['details'],
                   'button_text'=>$post_data['end_data']['button_text']
                ];
            $is_success = $this->Typeform_model->updateWelcomeAndEdnData('end_screen',$end_data,['id'=>$post_data['welcome_data']['id']]);

            if (!empty($post_data['deleteId'])) 
            {
                for ($d=0; $d < count($post_data['deleteId']); $d++) { 

                      if ($post_data['deleteId'][$d]['type'] == 'short-text') 
                      {
                          $is_success = $this->Typeform_model->deleteFormData('short_text',$post_data['deleteId'][$d]['id']);
                      }elseif ($post_data['deleteId'][$d]['type'] == 'long-text') {
                          $is_success = $this->Typeform_model->deleteFormData('long_text',$post_data['deleteId'][$d]['id']);
                      }elseif ($post_data['deleteId'][$d]['type'] == 'yesorno-text') {
                          $is_success = $this->Typeform_model->deleteFormData('yesorno_text',$post_data['deleteId'][$d]['id']);
                      }
                }
            }

                            

      for ($i=0; $i < count($post_data['data']); $i++) 
      {

          $data = [
                    'name'=>$post_data['data'][$i]['name'],
                    'value'=>$post_data['data'][$i]['value'],
                    'required_field'=>$post_data['data'][$i]['required_field']
                ]; 


         if ($post_data['data'][$i]['type'] == 'short-text') 
          {
              if ($post_data['data'][$i]['edit'] == 'yes') {
                $is_success = $this->Typeform_model->formUpdateData('short_text',$data,['id'=>$post_data['data'][$i]['edit_id']]);
              }elseif ($post_data['data'][$i]['edit'] == 'no'){
                  $is_success = $this->Typeform_model->formCreateInsert('short_text',$data,$post_data['id'],'short_text');
              }

          }elseif ($post_data['data'][$i]['type'] == 'long-text') {

              if ($post_data['data'][$i]['edit'] == 'yes') {
                $is_success = $this->Typeform_model->formUpdateData('long_text',$data,['id'=>$post_data['data'][$i]['edit_id']]);
              }elseif ($post_data['data'][$i]['edit'] == 'no'){
                $is_success = $this->Typeform_model->formCreateInsert('long_text',$data,$post_data['id'],'short_text');
              }

          }elseif ($post_data['data'][$i]['type'] == 'yesorno-text') {

              if ($post_data['data'][$i]['edit'] == 'yes') {
                $is_success = $this->Typeform_model->formUpdateData('yesorno_text',$data,['id'=>$post_data['data'][$i]['edit_id']]);
              }elseif ($post_data['data'][$i]['edit'] == 'no'){
                $is_success = $this->Typeform_model->formCreateInsert('yesorno_text',$data,$post_data['id'],'short_text');

              }

          }
                 
      }

        if( $is_success ) {
                echo json_encode(['statuscode'=>true,'msg'=>'Recourd edit successfully','data'=>md5($post_data['id'])]);
        }else{
            echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
        }

    }

  }

  public function view($access_token)
  { 
      $data['result'] = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);
      $this->load->view('typeform/view',$data);
  }

  public function viewform($access_token)
  {

      if (!empty($access_token)) 
      {

        $result = $this->crud->get_one_row('form_master',['access_token'=>$access_token]);

        if (!empty($result)) {

          $welcome_result = $this->crud->get_one_row('welcome_screen',['form_master_id'=>$result->id]);

          if (!empty($welcome_result)) {
            $content = '<div id="name" class="is-visible next_lable0 next_lable"><center> <h1> '.$welcome_result->details.' </h1> <button class="btn-start" data-from="1" data-to="0" data-type="welcome" data-required="no">'.$welcome_result->button_text.'</button></center>  </div> <input type="hidden" id="form-id" value="'.$result->id.'"> ';
          }

          

          $form = $this->crud->get_with_where('form_create',['form_master_id'=>$result->id]);

          if (!empty($form)) 
          {

            $no = 1;
            $total = count($form);
            foreach ($form as $key => $value) 
            {
              
                if ($value->type == 'short_text') 
                {

                  $short_text = $this->crud->get_one_row('short_text',['id'=>$value->content_id]);
                
                  $content .= '<div class="next_lable next_lable'.$no.'" data-counter="'.$no.'" data-type="'.$value->type.'" data-name="'.$short_text->name.'">';
                  $content .= '<center>';
                  $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$short_text->name.'</h1>';
                  $content .= '<input type="text" class="short_text_input short_text_value'.$no.'" value="" placeholder="'.$short_text->value.'"  ><br><br>';
                  $content .= '<button class="btn-start" data-from="'.($no+1).'" data-to="'.($no).'" data-type="'.$value->type.'" data-required="'.$short_text->required_field.'">Next</button>';
                  $content .= '</center>';
                  $content .= '</div>';

                }elseif ($value->type == 'long_text') {


                    $long_text = $this->crud->get_one_row('long_text',['id'=>$value->content_id]);
                    $content .= '<div class="next_lable next_lable'.$no.'" data-counter="'.$no.'" data-type="'.$value->type.'" data-name="'.$long_text->name.'">';
                    $content .= '<center>';
                    $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$long_text->name.'</h1>';
                    
                    // $content .= '<input type="text" class="long_text_input long_text_value'.$no.'" value="" placeholder="'.$long_text->value.'"><br><br>';

                    $content .= '<textarea class="long_text_input long_text_value'.$no.'" value="" placeholder="'.$long_text->value.'"></textarea><br>';

                    $content .= '<button class="btn-start" data-from="'.($no+1).'" data-to="'.($no).'" data-required="'.$value->type.'" data-required="'.$long_text->required_field.'">Next</button>';
                    $content .= '</center>';
                    $content .= '</div>';
                }elseif ($value->type == 'yesorno_text') {


                    $yesorno_text = $this->crud->get_one_row('yesorno_text',['id'=>$value->content_id]);

                    $content .= '<div class="next_lable next_lable'.$no.'" data-counter="'.$no.'" data-type="'.$value->type.'" data-name="'.$yesorno_text->name.'">';
                    $content .= '<center>';
                    $content .= '<h1 class="label-heading"> <span class="question-no">'.$no.'.</span> '.$yesorno_text->name.'</h1>';
                    $content .= '<p>'.$yesorno_text->value.'</p>';

                
                    $content .= '<button type="button" class="btn_choose_sent bg_btn_chose_success">';
                    $content .= '<input type="radio" name="yesorno_text_value'.$no.'" class="yesorno_text_value'.$no.'" checked value="yes" />Yes';
                    $content .= '</button>';

                     $content .= '<button type="button" class="btn_choose_sent bg_btn_chose_danger">';
                    $content .= '<input type="radio" name="yesorno_text_value'.$no.'" class="yesorno_text_value'.$no.'" value="no" />No';
                    $content .= '</button>';

                    $content .= '<br><br>';

                    $content .= '<button class="btn-start" data-from="'.($no+1).'" data-to="'.($no).'" data-required="'.$value->type.'" data-required="'.$yesorno_text->required_field.'">Next</button>';
                    $content .= '</center>';
                    $content .= '</div>';
                }

                $no++;
            }

            $content .= '<div id="name" class="error-msg hidden"><center> <b class="text-danger text-error"></b></center></div>';

            $end_result = $this->crud->get_one_row('end_screen',['form_master_id'=>$result->id]);

            if (!empty($end_result)) {

              $content .= '<div id="name" class="next_lable'.($total+1).' next_lable"><center> <h1> '.$end_result->details.' </h1> <button class="btn-submit">'.$end_result->button_text.'</button></center>  </div>';
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

  public function storeUserResponse()
  {
      $this->load->model('Typeform_model');
      $post_data = $this->input->post();

      $this->form_validation->set_rules('id','Id','required|trim');

      if( !$this->form_validation->run() ) {
            echo json_encode(['statuscode'=>false,'msg'=>validation_error()]);
        } else {

              $insert_data = [
                   'form_master_id'=>$post_data['id'],
                   'created_at'=>date("Y-m-d H:i:s")
                ];

            $insert_id = $this->Typeform_model->storeUserResponse('response_master',$insert_data,$post_data['id']);
             

              for ($i=0; $i < count($post_data['data']); $i++) { 

                $data = [
                        'response_master_id'=>$insert_id,
                        'name'=>$post_data['data'][$i]['name'],
                        'value'=>$post_data['data'][$i]['value'],
                        'type'=>$post_data['data'][$i]['type'],
                    ];

                $is_success = $this->Typeform_model->storeUserResponseDetails('user_response',$data);
               
              }

              if( $is_success ) {
                      echo json_encode(['statuscode'=>true,'msg'=>'Recourd insert successfully']);
              }else{
                  echo json_encode(['statuscode'=>false,'msg'=>'Something went wrong! Please try again.']);
              }

        }

  }

  public function delete($access_token)
  {
      if( !is_null($access_token) ) {

        $is_success = $this->crud->delete('form_master',['access_token' => $access_token]);
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

  public function response($access_token)
  {
      $data['result'] = $this->crud->get_with_where('response_master',['access_token'=>$access_token],$select = '*','id', 'DESC');
      $this->load->view('typeform/response',$data);
  }

  public function response_details($id)
  {
      if (!empty($id)) 
      {

          $result = $this->crud->get_with_where('user_response',['response_master_id'=>$id]);

          $read = $this->crud->update('response_master',['read_mark'=>'read'],['id'=>$id]);

          if (!empty($result)) {
              
              $content = '';

              foreach ($result as $key => $value) {
                  
                  if ($value->type == 'short_text') 
                  {
                      
                    $content .= '<div>';
                    $content .= '<b>'.$value->name.'</b>';
                    $content .= '<hr class="hr-response">';
                    $content .= '<p>'.$value->value.'</p>';
                    $content .= '</div>';

                  }elseif ($value->type == 'long_text') {
                      $content .= '<div>';
                      $content .= '<b>'.$value->name.'</b>';
                      $content .= '<hr class="hr-response">';
                      $content .= '<p>'.$value->value.'</p>';
                      $content .= '</div>';
                  }elseif ($value->type == 'yesorno_text') {
                      $content .= '<div>';
                      $content .= '<b>'.$value->name.'</b>';
                      $content .= '<hr class="hr-response">';
                      $content .= '<p>'.$value->value.'</p>';
                      $content .= '</div>';
                  }

              }

              echo json_encode(['statuscode' => true,'msg' => 'Data load success.','data'=>$content]);

          }else{
              echo json_encode([
                'statuscode' => false,'msg' => 'Something went wrong. Please try again.'
              ]);
          }

      }
  }

  public function deleteRespponse($id)
  {
      if( !is_null($id) ) {

        $is_success = $this->crud->delete('response_master',['id' => $id]);
        if( $is_success ) {

          echo json_encode([
            'statuscode' => true,
            'msg' => 'Record deleted successfully'
          ]);
        } else {
          echo json_encode([
            'statuscode' => false,
            'msg' => 'Something went wrong. Please try again.'
          ]);
        }
      } else {
        echo json_encode([
          'statuscode' => false,
          'msg' => 'Direct access to this URL is not allowed'
        ]);
      }
  }


}

?>