<?php  
  
class Login_model extends CI_Model {  
    public function select_product($user_name){
        //echo $user_name;
        
        $this->db->select('cust_id');
        $this->db->where('name',$user_name);
        $qry = $this->db->get('customer');

        

        /*$this->db->select('prod_id')->from('orders');
        $this->db->where('`cust_id` IN (SELECT `cust_id` FROM `customer` where `cust_id`="$user_id")', NULL, FALSE);
        $qry = $this->db->get();*/
        
       
        return $qry->row();
    }
    public function product_details($ct){
     
        $this->db->select('prod_id');
        $this->db->where('cust_id',$ct);
        $qry_product = $this->db->get('orders');
        return $qry_product->result();
    }
    public function log_in_correctly() {  
        
        $this->db->where('name', $this->input->post('username'));  
        $this->db->where('password', $this->input->post('password'));  
        $query = $this->db->get('customer');  
        

        if ($query->num_rows() == 1)  
        {  
            return true;  
        } else {  
            return false;  
        }  
  
    }  
  public function insert_prod_db($st){
      //print_r($st);
     // echo $this->input->post('cust_id');
      $people = array("cust_id", "reg_prod");
      foreach($st as $k => $v){
          if(!in_array($k,$people )){echo $v.'<br>';
            $data = array(
                'cust_id'=>$st['cust_id'],
                'prod_id'=>$v
            );
            //print_r($data);
            $this->db->insert('orders',$data);
            }

      }
      
   

  }
      
}  
?>  