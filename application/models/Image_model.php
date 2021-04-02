 <?php

class Image_model extends CI_Model
{

    public function get_selected_limit($table,$select,$where = null)
    {
        $this->db->select($select);

        if( !is_null($where) ) {
          $this->db->where($where);
        }

        $this->db->limit(6);
        
        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return false;
    }


    public function get_with_like_limit($table,$like,$select = '*',$where = null)
    {
        $this->db->select($select);
        if(!is_null($where)) {
            $this->db->where($where);
        }

        $this->db->limit(1);

        $this->db->like($like);
        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return false;
    }

    public function get_with_like_not_limit($table,$like,$likenot,$select = '*',$where = null)
    {
        $this->db->select($select);
        if(!is_null($where)) {
            $this->db->where($where);
        }

        $this->db->limit(6);

        $this->db->like($like);
        $this->db->not_like($likenot);
        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return false;
    }

    


}

?>