<?php

    class BannersController extends CI_Controller{

       public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            // $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('BannerModel');
            // $this->load->model('OrderDetailsModel');
            if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
                $this->session->set_flashdata('message','Please login and try again.');
                header("Location: ".base_url('/'));
                exit();
            }
        }

        public function homeBanner(){
            $this->load->view('backend/layout');
            $this->load->view('backend/header');  // dashboard load
            $this->load->view('backend/pages/admin/home-banner');  // dashboard load
        }

        public function getHomeBannGridData(){
            $draw = @$_POST['draw'];
            $row = @$_POST['start'];
            $rowperpage = @$_POST['length']; // Rows display per page
            $columnIndex = @$_POST['order'][0]['column']; // Column index
            $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
            $searchValue = @$_POST['search']['value']; // Search value
            $featureCatData['feature_cat'] = $this->BannerModel->getHomeBannersGridData($searchValue, $rowperpage, $row, $columnName,$columnSortOrder);
            
            $data = array();
            $totalRecord =0;
            foreach($featureCatData['feature_cat'] as $value)
            {
                $value['final_image'] = substr($value['image_name'], strpos($value['image_name'], "_NaN_") + 5); 
                $data[] = $value;
            }
            
            $totalRecord = $this->BannerModel->getCountOfHomeBannersGrid($searchValue);
            $response = array(
                "draw" =>intval($draw),
                "iTotalRecords" => $totalRecord ,
                "iTotalDisplayRecords" => $totalRecord,
                "aaData" => $data
            );
           echo json_encode($response);    
        }

        public function addBannerImage(){
            
            $this->form_validation->set_rules('banner_image',' Upload Image','uploaded[banner_image]|mime_in[banner_image,image/jpg,image/jpeg,image/gif,image/png]|max_size[banner_image,5000]');
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('status','Status','required');
            if($this->form_validation->run() == FALSE){
                $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
            }else {
           
                $time = date("d-m-Y")."-".time() ;
                $banner_image = $_FILES["banner_image"];
                $title = $this->input->post('title');
                $status = $this->input->post('status');
                $newFilename = "banner_" . $time . "_NaN_".$_FILES["banner_image"]["name"];
                move_uploaded_file(FCPATH . 'public/uploads/homebanner/', $newFilename);
                // $image_url = "https://adminomni.herokuapp.com/" . 'public/uploads/homebanner/'. $newFilename;
                $data  = array(
                    'title' => $title,
                    // 'image_url' => $image_url,
                    'image_name' =>$newFilename,
                    'status' => $status,
                    'created_by' => $this->session->userdata('fullname'),
                    'user_id' =>  $this->session->userdata("user_id"),
                );
                $this->BannerModel->addHomeBanner($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Home banner created successfully.');
            }
            echo json_encode($output);
        }

        public function  updateHomeBanner(){
            $this->form_validation->set_rules('edit_banner_image',' Upload Image','uploaded[edit_banner_image]|mime_in[edit_banner_image,image/jpg,image/jpeg,image/gif,image/png]|max_size[edit_banner_image,5000]');
            $this->form_validation->set_rules('edit_title','Title','required');
            $this->form_validation->set_rules('edit_status','Status','required');
            if($this->form_validation->run() == FALSE){
                $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
            }else {
                $match =0;
                $time = date("d-m-Y") . "-" . time();
                $home_banner_name = $this->input->post('edit_title');
                $home_bann_id = $this->input->post('home_banner_id');
                $status = $this->input->post('edit_status');
                $featured_img = $_FILES['edit_banner_image'];
                if ($_FILES["edit_banner_image"]["name"]!= '') {
                    $featureCatfile['file'] = $this->BannerModel->getHomeBannerByID($home_bann_id);
                    $final_image = substr($featureCatfile['file'][0]->image_name, strpos($featureCatfile['file'][0]->image_name, "_NaN_") + 5); 
                    if($final_image == $_FILES["edit_banner_image"]["name"]){
                        $match = 1;
                    }else{
                        $match = 0;
                        $newFilename = "banner_" . $time . "_NaN_".$_FILES["edit_banner_image"]["name"];
                        move_uploaded_file(FCPATH . 'public/uploads/homebanner/', $newFilename);
                        // $image_url = FCPATH. 'public/uploads/homebanner/'. $newFilename;
                    }
                
                }else{
                    $match = 1;
                }
                if($match == "1"){
                    $data = array(
                        'title' => $home_banner_name,
                        'status' => $status,
                        'updated_by' =>  $this->session->userdata('fullname'),
                        'updated_at' => date('y-m-d h:m:s'),
                    );
                }else{
                    $data = array(
                        'title' => $home_banner_name,
                        'image_name' => $newFilename,
                        // 'image_url' => $image_url,
                        'status' => $status,
                        'updated_by' =>  $this->session->userdata('fullname'),
                        'updated_at' => date('y-m-d h:m:s'),
                    );
                }
                
                $this->BannerModel->updateHomeBannerRecord($home_bann_id,$data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Home banner updated successfully.');
                

            }
            echo json_encode($output);
        }
        public function homeBannerActive(){
            $id =@$_POST['id'];
            $data = [
                'status' => 0,
                'updated_by' =>  $this->session->userdata('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
           
            $this->BannerModel->updateHomeBannerRecord($id,$data);
            echo json_encode(array('status'=>'true','message'=>'Home banner deactivated successfully!'));
        }
        public function homeBannerdeactive(){
            $id =@$_POST['id'];
            $data = [
                'status' => 1,
                'updated_by' =>  $this->session->userdata('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
            $this->BannerModel->updateHomeBannerRecord($id,$data);
            echo json_encode(array('status'=>'true','message'=>'Home banner activated successfully!'));
        }
        public function deleteHomeBannerByID(){
            $id =@$_POST['id'];
            $this->BannerModel->deleteHomeBannner($id);
            echo json_encode(array('status'=>'true','message'=>'Featured category deleted successfully.'));
        }
    }