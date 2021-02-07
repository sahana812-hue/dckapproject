<?php  
  
class reg_model extends CI_Model {  
  
    public function reg_insert() {  
  
        $data = array(
            'name' => $this->input->post('reg_name'),
            'email' => $this->input->post('reg_email'),
            'password' => $this->input->post('reg_pwd'),
            'addr' => $this->input->post('reg_addr'),
        );
       
          
        return $this->db->insert('customer', $data);
  
        if ($query->num_rows() == 1)  
        {  echo 'insert';
            //return true;  
        } else {  

            echo 'not insert';
            //return false;  
        }  
  
    }  
  
      
}  
?>  