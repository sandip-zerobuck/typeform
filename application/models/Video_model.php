 <?php

class Video_model extends CI_Model
{
	
    
    public function get_selected_limit($table,$select,$where = null)
    {
        $this->db->select($select);

        if( !is_null($where) ) {
          $this->db->where($where);
        }

        $this->db->limit(9);
        
        $query = $this->db->get($table);

        if( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return false;
    }

}

?>