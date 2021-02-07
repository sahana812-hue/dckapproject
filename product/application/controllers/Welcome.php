<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
   
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{ 
		//$this->add();
		$this->load->view('welcome_message');
	}
	public function add()
	{
		$this->load->view('register');
	}
	/*public function login()
	{
		$this->load->view('login');
	}*/
	public function loginuser()
	{
		$this->load->view('loginuser');
	}


	
  
    public function signin_validation()  
    {  
        $this->load->helper('security');  
        $this->load->library('form_validation');   
  
    
        $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');  
        $this->form_validation->set_rules('password', 'Password:', 'required|trim');  
  
//        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');  
  
        //$this->form_validation->set_message('is_unique', 'username already exists');  
  
    if ($this->form_validation->run())  
        {  
            echo "<h6>Welcome, you are logged in.</h6>"; 
           
            
            $data = array(  
                'username' => $this->input->post('username'),  
                'currently_logged_in' => 1,
                );    
                    $this->session->set_userdata($data);  
                redirect('Welcome/data');   
         }   
            else {  
            
            //echo "Welcome, you are not logged in.";  
            $this->load->view('loginuser');  
        }  
    } 
    public function data()  
    {  
        if ($this->session->userdata('currently_logged_in'))   
        {     $user_id = $this->session->userdata('username');
            $this->load->model('Login_model');
            //$data['records']=$this->Login_model->select_product($user_id);  
            $rec  =$this->Login_model->select_product($user_id); 
         
         $data['hprod'] =$this->Login_model->product_details($rec->cust_id);  
         
            //$data[''] = $this->Login_model->getData();   

            $this->load->view('data_list',$data);  
        } else {  
            redirect('Welcome/invalid');  
        }  
    }  
    public function invalid()  
    {  
        $this->load->view('invalid');  
    }  

    public function reg_validation()  
    {  
        $this->load->library('form_validation');  
  
        $this->form_validation->set_rules('reg_name', 'Name', 'required|trim|min_length[4]|is_unique[customer.name]');  
  
        $this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email|trim');  
        $this->form_validation->set_rules('reg_pwd', 'Password', 'required|min_length[4]|trim');  
  
        $this->form_validation->set_rules('reg_cpwd', 'Confirm Password', 'required|trim|matches[reg_pwd]');  
  
        $this->form_validation->set_message('is_unique', 'username already exists');  
        
  
    if ($this->form_validation->run())  
        {  
            
            if($this->reg_model())
            {
                ?><script>confirm("You are registered.Please login to check product available");</script><?php  
            
                $this->load->view('welcome_message');  
            }else{
                ?><script>confirm("NOT Inserted.Please register again.");</script><?php  
                $this->load->view('welcome_message');
            }
            
         }else {  
                
                ?><script>//confirm("Fill all details to register");</script><?php  
              
                $this->load->view('register');
                //$this->form_validation->resetpostdata();
                //redirect(current_url());
              
        }  
    } 
    public function reg_model(){

        $this->load->model('reg_model');  
        if ($this->reg_model->reg_insert())  
        {  
                
            return true;  
        } else {  
            //$this->form_validation->set_message('validation', 'NOT INSERTED');  
            return false;  
            
        }  
    }
  
    public function validation()  
    {  
        $this->load->model('login_model');  
  
        if ($this->login_model->log_in_correctly())  
        {  
            
            return true;  
        } else {  
            $this->form_validation->set_message('validation', 'Incorrect username/password.');  
            return false;  
        }  
    }  

    public function intest(){
        $user_id = $this->session->userdata('username');
        $this->load->model('Login_model'); 
        $rec  =$this->Login_model->select_product($user_id); 
       // print_r($rec);
        foreach($rec as $key => $val){
            $data[$key]=$val;
        }
        if (isset($_POST['reg_prod'])){
            //print_r($_POST);
            foreach($_POST as $key => $val){
                $data[$key]=$val;
            }
            
            
            $this->Login_model->insert_prod_db($data);
           // print_r($_POST['ls_prod']);
        }
        redirect('Welcome/data');  

      
    }
    public function ajax_prod_details(){
    
      $this->load->helper('url');
       $project =  $this->input->post('prod_id');

       $project_description = $this->config->item($project, 'product_list_description');
       echo  $project_description;
     
    }
  
}
