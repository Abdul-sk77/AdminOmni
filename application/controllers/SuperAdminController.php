<?php

class SuperAdminController extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
         $this->load->library('session');
        //  $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->model('UserModel');
        if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
            $this->session->set_flashdata('message','Please login and try again.');
            header("Location: ".base_url('/'));
            exit();
        }
    }

    public function index(){
        
    }
    public function getProfile(){
        $data =[];
        $user_id = $this->session->userdata('user_id');
        $getUserData = $this->UserModel->getProfileData($user_id );
        
        if(count($getUserData) > 0){
            $data['user_id'] = $getUserData[0]->id;
            $data['fullname'] =  $getUserData[0]->fullname;
            $data['email_id'] =  $getUserData[0]->email_id;
            $data['phone_no'] =  $getUserData[0]->phone_no;
        }
        echo json_encode(array("data" => $data, "status" => true));
    }

    public function updateProfile(){
        $this->form_validation->set_rules('edit_name','Name','required');
        $this->form_validation->set_rules('edit_phone','Phome','required');
        $this->form_validation->set_rules('edit_email','Email','required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $id = $this->session->userdata('user_id');
            $updateData = [
                'fullname' => $this->input->post('edit_name'),
                'phone_no' => $this->input->post('edit_phone'),
                'email_id' => $this->input->post('edit_email'),
                'updated_by' => $this->session->userdata('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
            $this->UserModel->updateProfile($id,$updateData);
            $output = array('status'=>true,'errors'=>'','msg'=>'Profile Successfully updated.');
        }
        echo json_encode($output); 
    }

    public function resetPassword(){
        $id =$this->session->userdata('user_id');
        $this->form_validation->set_rules('edit_password','Password','required');
        $this->form_validation->set_rules('edit_cpassword','Confirm Password','required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $edit_password =$this->input->post('edit_password');
            $insertData = [
               
                'password' => md5($edit_password),
                'updated_by' => $this->session->userdata('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
            
           
            $this->UserModel->updateProfile($id,$insertData);
            $output = array('status'=>true,'errors'=>'','msg'=>'Password reset successfully.');
        }
        echo json_encode($output); 
    }

    

    
}