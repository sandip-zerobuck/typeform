 <?php

class Typeform_model extends CI_Model
{
    // Form Insert 

    public function storeForm($teble,$data)
    {
        $this->crud->insert($teble,$data);
        $insert_id = $this->db->insert_id();
        $this->crud->update($teble,['access_token'=>md5($insert_id)],['id'=>$insert_id]);

        return $insert_id;
    }

    public function formCreateInsert($table,$data,$form_master_id,$type)
    {
        $this->crud->insert($table,$data);
        $insert_id = $this->db->insert_id();

        return $this->crud->insert('form_create',['form_master_id'=>$form_master_id,'type'=> $type,'content_id'=> $insert_id]);
    }

    // End  Form Insert 

    public function deleteFormData($table,$id)
    {
        $is_success = $this->crud->delete($table,['id'=>$id]);
        return $this->crud->delete('form_create',['content_id'=>$id]);
    }

    public function formUpdateData($table,$data,$where)
    {
        return $this->crud->update($table,$data,$where);
    }

    public function storeUserResponse($table,$data,$form_master_id)
    {
        $this->crud->insert($table,$data);
        $insert_id = $this->db->insert_id();
        $this->crud->update($table,['access_token'=>md5($form_master_id)],['id'=>$insert_id]);

        return $insert_id;
    }

    public function storeUserResponseDetails($table,$data)
    {
        return $this->crud->insert($table,$data);
    }

    public function storeWelcomeAndEdnData($table,$data)
    {
        return $this->crud->insert($table,$data);
    }

    public function updateWelcomeAndEdnData($table,$data,$where)
    {
        return $this->crud->update($table,$data,$where);
    }

}

?>