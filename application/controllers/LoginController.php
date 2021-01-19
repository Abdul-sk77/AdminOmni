<?php

ini_set('display_errors', '1');
class LoginController extends CI_Controller{

   
    public function index(){
        if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
           
			$this->load->view('login');
        }else{
			
            if($this->session->userdata('role_type') == 1){
                return redirect('/admin/dashboard');
                //return redirect('/admin/dashboard')->to(base_url().'/admin/dashboard');
            }else{
                return redirect('/sm/dashboard');
                //return redirect('/sm/dashboard')->to(base_url().'/sm/dashboard');
            }
        }
    }

    public function SMLogin(){
        $this->load->view('sm_login');
    }

    public function checkLogin(){

        $login_type = $this->uri->segment(1);
        $email  = $this->input->post('email');
        $password  = md5($this->input->post('password'));
        $store_id = "";
		$role_type=null;
		
        if($login_type == 'sm'){
			
			$this->db->select('*');
			$this->db->from('storemanager');
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$getUserData = $this->db->get()->result_array();
            if(count($getUserData) > 0){
                $user_id = $getUserData[0]['id'];
                $store_id = $getUserData[0]['store_id'];
                $fullname =  $getUserData[0]['managername'];
                $email_id =  $getUserData[0]['email'];
                $role_type =  2;
            }
        }else{
			
			
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email_id', $email);
			$this->db->where('password', $password);
			$getUserData = $this->db->get()->result_array();
		
            if(count($getUserData) > 0){
                $user_id = $getUserData[0]['id'];
                $fullname =  $getUserData[0]['fullname'];
                $email_id =  $getUserData[0]['email_id'];
                $role_type =  1;
            }
        }
		
        if(isset($getUserData) && count($getUserData) > 0){
           $sessionData = array(
               'is_loggedIn' => true,
               'user_id' => $user_id,
               'store_id' =>$store_id,
               'fullname' => $fullname,
               'email_id' => $email_id,
               'role_type' => $role_type
           );

           $this->session->set_userdata($sessionData);
           if($role_type != 1){
               return redirect('/sm/dashboard');
           }
		   else{
           return redirect('/admin/dashboard');
		   }


        }else{
            if($login_type == 'sm'){
                //$this->session->markAsFlashdata('message');
                $this->session->set_flashdata('message', 'Please check username and password.');
                return redirect()->to(base_url('/sm/login'));
            }else{
                //$this->session->markAsFlashdata('message');
                $this->session->set_flashdata('message', 'Please check username and password.');
                return redirect('LoginController');
            }

        }
    }

    public function logout(){
		$this->load->library('session');
        $this->session->sess_destroy();
        
             return redirect(base_url('/'));
        // }
    }
    public function smLogout(){
       $this->load->library('session');
        $this->session->sess_destroy();
        return redirect(base_url('index.php/sm/login'));
    }
    public function updateProfile(){
       
        $validated = $this->validate([
            'edit_name' => [
                'required'
            ],
            'edit_phone' => [
                'required'
            ],
            'edit_email' =>[
                'required'
            ],
           
        ]);
       
        if($validated) {
            $id = $this->session->get('user_id');
            $updateData = [
                'fullname' => $this->request->getPost('edit_name'),
                'phone_no' => $this->request->getPost('edit_phone'),
                'email_id' => $this->request->getPost('edit_email'),
                'updated_by' => $this->session->get('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
            $builder = $this->db->table('users');
            $builder->where('id', $id);
            $builder->update($updateData);
            return redirect()->to(base_url().'/admin/dashboard');
            // $output = array('status'=>true,'errors'=>'','msg'=>'Successfully updated.');
        }else{
            $output = array('status'=>false,'errors'=>$this->validator->listErrors(),'msg'=>"");
        }
        echo json_encode($output); 
    }
}