<?php 

    class FeaturedController extends CI_Controller{

       
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            // $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('CategoryModel');
            $this->load->model('FeaturedCategoryModel');
            if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
                $this->session->set_flashdata('message','Please login and try again.');
                header("Location: ".base_url('/'));
                exit();
            }
        }

        public function index(){
            $builder = $this->CategoryModel->getActiveCategory();
            $viewData['categories'] = $builder;
            $this->load->view("backend/layout");
            $this->load->view("backend/header");
            $this->load->view('backend/pages/admin/featured-category',$viewData);
           
        }
      
        public function addFeatureCat(){
            $this->form_validation->set_rules('featured_category','Featured Category','required');
            $this->form_validation->set_rules('product_category','Product Category','required');
            $this->form_validation->set_rules('description','Description','required');
            $this->form_validation->set_rules('product_sub_category','Product Sub Category','required');
            $this->form_validation->set_rules('product_line','Product Line','required');
            $this->form_validation->set_rules('status','Status','required');
            
           
            if($this->form_validation->run() == FALSE){
                $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
            }else {
                $time = date("d-m-Y") . "-" . time();
                $feature_category_name = $this->input->post('featured_category');
                $product_cat_name = @$_GET['product_cat_name'];
                $product_category_id =  $this->input->post('product_category');
                $product_sub_category_id = $this->input->post('product_sub_category');
                $product_sub_category_name = @$_GET['product_sub_cat_name'];
                $product_line_id =  $this->input->post('product_line');
                $product_line_name = @$_GET['product_line_name'];
                $description = $this->input->post('description');
                $status = $this->input->post('status');
                $featured_img = $_FILES["file"];
                
                if ($_FILES["file"]["name"] != '') {
                  
                    $newFilename = "feature_cat_" . $time . "_NaN_".$_FILES["file"]["name"];;
                    move_uploaded_file(FCPATH . 'public/uploads/featuredCat/', $newFilename);
                    // $image_url = "https://adminomni.herokuapp.com/" . 'public/uploads/featuredCat/'. $newFilename;
                } 

                $data = array(
                    'feature_category_name' => $feature_category_name,
                    'image_name' => $newFilename,
                    // 'image_url' => $image_url,
                    'product_category_id'=>$product_category_id,
                    'product_category_name' => $product_cat_name,
                    'product_sub_category_id' => $product_sub_category_id,
                    'product_sub_category_name' =>$product_sub_category_name,
                    'product_line_name' => $product_line_name,
                    'product_line_id' => $product_line_id,
                    'description' => $description,
                    'status' => $status,
                    'title' => "NULL",
                    'user_id' =>  $this->session->userdata("user_id"),
                    'created_by' =>  $this->session->userdata('fullname'),
                );
                
                $this->FeaturedCategoryModel->addFeaturedCategory($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Featured category created successfully..');
                

            }
            echo json_encode($output);
        }
        public function getFeatureCatGridData(){
            $draw = @$_POST['draw'];
            $row = @$_POST['start'];
            $rowperpage = @$_POST['length']; // Rows display per page
            $columnIndex = @$_POST['order'][0]['column']; // Column index
            $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
            $searchValue = @$_POST['search']['value']; // Search value
            $featureCatData['feature_cat'] = $this->FeaturedCategoryModel->getFeaturedGridData($searchValue,$rowperpage,$row,$columnName,$columnSortOrder);
           
            $data = array();
            $totalRecord =0;
            foreach($featureCatData['feature_cat'] as $value)
            {
                $value['final_image'] = substr($value['image_name'], strpos($value['image_name'], "_NaN_") + 5); 
                $data[] = $value;
            }
            
            $totalRecord = $this->FeaturedCategoryModel->getCountFeaturedGrid($searchValue);
            $response = array(
                "draw" =>intval($draw),
                "iTotalRecords" => $totalRecord ,
                "iTotalDisplayRecords" => $totalRecord,
                "aaData" => $data
            );
           echo json_encode($response);    
        }
        public function deleteFeatureCat(){
            $id =@$_POST['id'];
            $this->FeaturedCategoryModel->deleteFeaturedCat($id);
            echo json_encode(array('status'=>'true','message'=>'Featured category deleted successfully.'));
        }
        public function getFeatureCatId(){
            $id =@$_GET['feature_cat_id'];
            $featureCatData['features'] = $this->FeaturedCategoryModel->getFeaturedCategoryByID($id);
            $data = array();
            $totalRecord =0;
            foreach($featureCatData['features'] as $value)
            {
                $data[] = $value;
            }
            echo json_encode(array('status'=>'true','message'=>'',$data));
        }
        public function  updateFeatureCat(){
            $this->form_validation->set_rules('edit_featured_category','Featured Category','required');
            $this->form_validation->set_rules('edit_product_category','Product Category','required');
            $this->form_validation->set_rules('edit_description','Description','required');
            $this->form_validation->set_rules('edit_product_sub_category','Product Sub Category','required');
            $this->form_validation->set_rules('edit_product_line','Product Line','required');
            $this->form_validation->set_rules('edit_status','Status','required');
            
           
            if($this->form_validation->run() == FALSE){
                $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
            }else {
            
                $match =0;
                $time = date("d-m-Y") . "-" . time();
                $feature_category_name = $this->input->post('edit_featured_category');
                $product_cat_name = @$_GET['product_cat_name'];
                $product_category_id =  $this->input->post('edit_product_category');
                $product_sub_category_id = $this->input->post('edit_product_sub_category');
                $product_sub_category_name = @$_GET['product_sub_cat_name'];
                $product_line_id =  $this->input->post('edit_product_line');
                $product_line_name = @$_GET['product_line_name'];
                $description = $this->input->post('edit_description');
                $status = $this->input->post('edit_status');
                $featured_img =  $_FILES["edit_file"];

                $featured_category_id = $this->input->post('edit_featured_category_id');
                if ($_FILES["edit_file"]["name"] != '') {
                    $featureCatfile['file'] = $this->db->table('feature_home_combine')->where('id', $featured_category_id)->get()->getResult();
                    $final_image = substr($featureCatfile['file'][0]->image_name, strpos($featureCatfile['file'][0]->image_name, "_NaN_") + 5); 
                    if($final_image == $_FILES["edit_file"]["name"]){
                        $match = 1;
                    }else{
                        $match = 0;
                        $newFilename = "feature_cat_". $time . "_NaN_".$_FILES["edit_file"]["name"]->getClientName();
                        $featured_img->move_uploaded_file(FCPATH . 'public/uploads/featuredCat/', $newFilename);
                        // $image_url = FCPATH . 'public/uploads/featuredCat/'. $newFilename;
                    }
                
                }else{
                    $match = 1;
                }
                if($match == "1"){
                    $data = array(
                        'feature_category_name' => $feature_category_name,
                        'product_category_id'=>$product_category_id,
                        'product_category_name' => $product_cat_name,
                        'product_sub_category_id' => $product_sub_category_id,
                        'product_sub_category_name' =>$product_sub_category_name,
                        'product_line_name' => $product_line_name,
                        'product_line_id' => $product_line_id,
                        'description' => $description,
                        'status' => $status,
                        'updated_by' =>  $this->session->userdata('fullname'),
                        'updated_at' => date('y-m-d h:m:s'),
                    );
                }else{
                    $data = array(
                        'feature_category_name' => $feature_category_name,
                        'image_name' => $newFilename,
                        // 'image_url' => $image_url,
                        'product_category_id'=>$product_category_id,
                        'product_category_name' => $product_cat_name,
                        'product_sub_category_id' => $product_sub_category_id,
                        'product_sub_category_name' =>$product_sub_category_name,
                        'product_line_name' => $product_line_name,
                        'product_line_id' => $product_line_id,
                        'description' => $description,
                        'status' => $status,
                        'updated_by' =>  $this->session->userdata('fullname'),
                        'updated_at' => date('y-m-d h:m:s'),
                    );
                }
                
                $this->FeaturedCategoryModel->updateFeaturedCategory($featured_category_id,$data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Featured category updated successfully.');
                

            } 
            echo json_encode($output);
        }

        public function FeaturedexportCSV(){
            $searchValue = @$_GET['searchValue'];
            // create file name
            $fileName = 'FeaturedCategory-'.time().'.xlsx';  
            // load excel library
            $this->load->library('excel');
            //$listInfo = $this->export->exportList();
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            // set Header
            $header = array("ID","Image","Featured Category","Description","Category","Sub Category", "Product Line", "Status");
            $column = 0;

            foreach($header as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
        
            $excel_row = 2;
            $status ="";
            $usersData = $this->FeaturedCategoryModel->FeaturedExcelExport($searchValue);
            foreach($usersData as $key=>$line)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['image_name']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['feature_category_name']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['description']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['product_category_name']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['product_sub_category_name']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $line['product_line_name']);
               
                if( $line['status'] == "1"){
                    $status = "Active";
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row,$status);
                }else{
                    $status = "Inactive";
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row,$status);
                }
                $excel_row++;
            }
        
            $filename = "featuredcategory". date("Y-m-d-H-i-s").".csv";
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
            $objWriter->save('php://output');
       
        }

        
        public function HomeBannerexportCSV(){
            $searchValue = @$_GET['searchValue'];
            // create file name
            $fileName = 'HomeBanner-'.time().'.xlsx';  
            // load excel library
            $this->load->library('excel');
            //$listInfo = $this->export->exportList();
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            // set Header
            $header = array("ID","Image","Title","Status");
            $column = 0;

            foreach($header as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
        
            $excel_row = 2;
            $status ="";
            $usersData = $this->FeaturedCategoryModel->HomeBannerExcelExport($searchValue);
            foreach($usersData as $key=>$line)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['image_name']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['title']);
               
               
                if( $line['status'] == "1"){
                    $status = "Active";
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row,$status);
                }else{
                    $status = "Inactive";
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row,$status);
                }
                $excel_row++;
            }
        
            $filename = "homebanner". date("Y-m-d-H-i-s").".csv";
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
            $objWriter->save('php://output');
       
        }
        
        
    }