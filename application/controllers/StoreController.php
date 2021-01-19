<?php 

class StoreController extends CI_Controller 
{
  
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
		 parent::__construct();
         $this->load->library('session');
        //  $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->model('StoreManagerModel');
         $this->load->model('TargetSettingModel');
        if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
            $this->session->set_flashdata('message','Please login and try again.');
            header("Location: ".base_url('/'));
            exit();
        }
      

    }

    public function index()   // store manager index
    {
        $this->load->view("backend/layout");
        $this->load->view("backend/sm_header");
        $this->load->view('backend/pages/agent-target');  // dashboard load
       
    }

    public function storeManager()   // store manager for admin
    {
     
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
		$this->load->view('backend/pages/admin/store-manager');
    }
    public function getHistoryGridData(){
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
		$searchValue = @$_POST['search']['value']; // Search value
		$storeData['store_manager_history'] = $this->StoreManagerModel->getSMHistoryGridData($row,$rowperpage,$columnName,$columnSortOrder,$searchValue);
        $data = array();
        $totalRecord =0;
		foreach($storeData['store_manager_history'] as $value)
		{
            if($value['field_name'] == 'Status'){
                if($value['field_old_value'] == "1"){
                    $value['field_old_value'] ="Active";
                }else{
                    $value['field_old_value'] ="Deactive";
                }
                if($value['field_new_value'] == "1"){
                    $value['field_new_value'] ="Active";
                }else{
                    $value['field_new_value'] ="Deactive";
                }
            }
           $data[] = $value;
        }
        $totalRecord = $this->StoreManagerModel->getCountSMHistoryGrid($searchValue);
		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        ); 
       echo json_encode($response); 
    }
    public function getStoreManagerGridData(){
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
		$searchValue = @$_POST['search']['value']; // Search value
		$storeData['store_manager'] = $this->StoreManagerModel->getSMGridData($row,$rowperpage,$columnName,$columnSortOrder,$searchValue);
        $data = array();
        $totalRecord =0;
		foreach($storeData['store_manager'] as $value)
		{
           $data[] = $value;
        }
        $totalRecord = $this->StoreManagerModel->getCountSMGrid($searchValue);
		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        ); 
       echo json_encode($response);
    }
    public function getViewStoremanager(){

        $id =@$_GET['id'];
        $storeData['store_manager'] = $this->StoreManagerModel->getViewSMForEdit($id);
        $headerData = "Store Manager Details";
        $this->load->view('backend/layout');
        $this->load->view('backend/header',$headerData);
        $this->load->view('backend/pages/admin/store-manager-details',$storeData);
    }
    public function getViewStoremanagerForEdit(){
        $id =@$_GET['id'];
        $storeData['store_manager'] = $this->StoreManagerModel->getViewSMForEdit($id);
        
        $data = array();
		foreach($storeData['store_manager'] as $value)
		{
            $data[] = $value;
        }
        echo json_encode(array('status'=>'true','message'=>'Store manager retrive successfully.','data'=>$data));
    }
    public function storeTargetSetting(){
         // dashboard load
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/store-target-setting'); 
    }
    public function editstoreManager(){
        $id =@$_POST['unique_id'];
        $new_managername  = $this->input->post('edit_store_manager_name');
        $new_store_id = $this->input->post('edit_store_id');
        $new_description = $this->input->post('edit_description');
        $new_status = $this->input->post('edit_status');

        $new_contact_person = $this->input->post('edit_contact_person');
        $new_email = $this->input->post('edit_email1');
        $new_phone = $this->input->post('edit_phone1');
        $new_pincode = $this->input->post('edit_pin_code');
        $new_address = $this->input->post('edit_address');
        $new_country = htmlentities($this->input->post('edit_country'));
        $new_state = htmlentities($this->input->post('edit_state'));
        $new_city = htmlentities($this->input->post('edit_city'));

        $new_store_manager_id = $this->input->post('edit_store_manager_id');
        $new_region = $this->input->post('edit_region');
        
        $history =array();
        $store_manager_id_unique;
        $email_unique2;
        $existing_data = $this->StoreManagerModel->getViewSMForEdit($id);
       
        if($existing_data[0]->{'store_id'} == $new_store_id){
            $this->form_validation->set_rules('edit_store_id', 'Store ID', 'required');
            
        }else{
            $this->form_validation->set_rules('edit_store_id', 'Store ID', 'required|is_unique[storemanager.store_id]');
        }
        if($existing_data[0]->{'store_manager_id'} == $new_store_manager_id){
            $this->form_validation->set_rules('edit_store_manager_id', 'Store Manager ID', 'required');
            
        }else{
            $this->form_validation->set_rules('edit_store_manager_id', 'Store Manager ID', 'required|is_unique[storemanager.store_manager_id]');
        }
        if($existing_data[0]->{'email'} == $new_email){
            $this->form_validation->set_rules('edit_email1', 'Email', 'required');
        }else{
            $this->form_validation->set_rules('edit_email1', 'Email', 'required|is_unique[storemanager.email]');
        }
        $this->form_validation->set_rules('edit_store_manager_name', 'Store Manager Name', 'required');
        $this->form_validation->set_rules('edit_contact_person','Contact Person','required');
        $this->form_validation->set_rules('edit_phone1','Phone','required');
       
        $this->form_validation->set_rules('edit_region','Region','required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $insertData = [
                'managername' =>$new_managername,
                'store_manager_id'=>$new_store_manager_id,
                'store_id'=>$new_store_id,
                'description' => $new_description,
                'contact_person' => $new_contact_person,
                'phone' => $new_phone,
                'email' => $new_email,
                'pincode' => $new_pincode,
                'address' => $new_address,
                'country' => $new_country,
                'state' => $new_state,
                'city' => $new_city,
                'region' => $new_region,
                'status' => $new_status,
                'updated_by' => $this->session->userdata('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
            $this->StoreManagerModel->updateSM($id,$insertData);
            $i=0;
            if($existing_data[0]->{'managername'} != $new_managername){
                $history[$i] = array(  
                    'field_name' => 'Store Manager Name',  
                    'field_old_value' =>$existing_data[0]->{'managername'},
                    'field_new_value' => $new_managername,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'store_id'} != $new_store_id){
                $history[$i] = array(  
                    'field_name' => 'Store ID',  
                    'field_old_value' =>$existing_data[0]->{'store_id'},
                    'field_new_value' => $new_store_id,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'description'} != $new_description){
                $history[$i] = array(  
                    'field_name' => 'Description',  
                    'field_old_value' =>$existing_data[0]->{'description'},
                    'field_new_value' => $new_description,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'status'} != $new_status){
                $history[$i] = array(  
                    'field_name' => 'Status',  
                    'field_old_value' =>$existing_data[0]->{'status'},
                    'field_new_value' => $new_status,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'contact_person'} != $new_contact_person){
                $history[$i] = array(  
                    'field_name' => 'Contact Person',  
                    'field_old_value' =>$existing_data[0]->{'contact_person'},
                    'field_new_value' => $new_contact_person,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'phone'} != $new_phone){
                $history[$i] = array(  
                    'field_name' => 'Phone',  
                    'field_old_value' =>$existing_data[0]->{'phone'},
                    'field_new_value' => $new_contact_person,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'email'} != $new_email){
                $history[$i] = array(  
                    'field_name' => 'Email',  
                    'field_old_value' =>$existing_data[0]->{'email'},
                    'field_new_value' => $new_email,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'pincode'} != $new_pincode){
                $history[$i] = array(  
                    'field_name' => 'Pin Code',  
                    'field_old_value' =>$existing_data[0]->{'pincode'},
                    'field_new_value' => $new_pincode,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'country'} != $new_country){
                $history[$i] = array(  
                    'field_name' => 'Country',  
                    'field_old_value' =>$existing_data[0]->{'country'},
                    'field_new_value' => $new_country,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'address'} != $new_address){
                $history[$i] = array(  
                    'field_name' => 'Address',  
                    'field_old_value' =>$existing_data[0]->{'address'},
                    'field_new_value' => $new_address,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'state'} != $new_state){
                $history[$i] = array(  
                    'field_name' => 'State',  
                    'field_old_value' =>$existing_data[0]->{'state'},
                    'field_new_value' => $new_state,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'city'} != $new_city){
                $history[$i] = array(  
                    'field_name' => 'City',  
                    'field_old_value' =>$existing_data[0]->{'city'},
                    'field_new_value' => $new_city,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            } 
            if($existing_data[0]->{'store_manager_id'} != $new_store_manager_id){
                $history[$i] = array(  
                    'field_name' => 'Store Manager Id',  
                    'field_old_value' =>$existing_data[0]->{'store_manager_id'},
                    'field_new_value' => $new_store_manager_id,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            }
            if($existing_data[0]->{'region'} != $new_region){
                $history[$i] = array(  
                    'field_name' => 'Region',  
                    'field_old_value' =>$existing_data[0]->{'region'},
                    'field_new_value' => $new_region,
                    'store_id' => $id,
                    'field_updated_at' =>date('y-m-d h:m:s')
                ); 
                $i++; 
            } 
            if($i > 0){
                $this->StoreManagerModel->insertHistory($history);
            }
           
            $output = array('status'=>true,'errors'=>'','msg'=>'Store manager updated successfully.');
        }
        echo json_encode($output); 
    }
    public function addStoreManager(){
        
        $this->form_validation->set_rules('store_manager_name', 'Store Manager Name', 'required');
        $this->form_validation->set_rules('store_id', 'Store ID', 'required|is_unique[storemanager.store_id]');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required'); 
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[storemanager.email]');
        
        $this->form_validation->set_rules('region', 'Region', 'required');

        $this->form_validation->set_rules('store_manager_id', 'Store Manager ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
       
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            
            $password = $this->input->post('password');
            $encrypt_password = md5($password);
            
            $insertData = [
                'managername' => $this->input->post('store_manager_name'),
                'store_id' => $this->input->post('store_id'),
                'store_manager_id'=> $this->input->post('store_manager_id'),
                'description' => $this->input->post('description'),
                'contact_person' => $this->input->post('contact_person'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'pincode' => $this->input->post('pin_code'),
                'address' => $this->input->post('address'),
                'country' => htmlentities($this->input->post('country')),
                'state' => htmlentities($this->input->post('state')),
                'city' => htmlentities($this->input->post('city')),
                'region' => $this->input->post('region'),
                'password' => $encrypt_password ,
                'status' => $this->input->post('status'),
                'created_by' =>$this->session->userdata('fullname'),
            ];
            $this->StoreManagerModel->addStoreManager($insertData);
            $output = array('status'=>true,'errors'=>'','msg'=>'Store manager created successfully.');
        }
        echo json_encode($output);
    }
  
    public function DeactivateStoremanager(){
        $id = @$_POST['id'];
        $this->StoreManagerModel->deactiveStoreManager($id);
        $history[] = array(  
            'field_name' => 'Status',  
            'field_old_value' =>"1",
            'field_new_value' =>"0",
            'store_id' => $id,
            'field_updated_at' =>date('y-m-d h:m:s')
        ); 
        $this->StoreManagerModel->insertHistory($history);
        echo json_encode(array('status'=>'true','message'=>'Store manager deactivated successfully.'));
    }

    public function ActiveStoremanager(){
        $id =@$_POST['id'];
        $this->StoreManagerModel->activeStoreManager($id);
        $history[] = array(  
            'field_name' => 'Status',  
            'field_old_value' =>"0",
            'field_new_value' =>"1",
            'store_id' => $id,
            'field_updated_at' =>date('y-m-d h:m:s')
        ); 
        $this->StoreManagerModel->insertHistory($history);
        echo json_encode(array('status'=>'true','message'=>'Store manager activated successfully.'));
    }

    public function HarddeleteStoremanager(){
        $id =@$_POST['id'];
        $store_id = @$_POST['store_id'];
        $this->StoreManagerModel->deleteSMWithRelatedData($id,$store_id);
        
        echo json_encode(array('status'=>'true','message'=>'Store manager deleted successfully.'));
    }
    public function exportCSV(){
        $searchValue = @$_GET['searchValue'];
        // create file name
        $fileName = 'StoreManagerData-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $header = array("ID","Store Id","Store Manager Id","Manager Name","Description","Contact Person","Phone No.", "Email", "Pincode", "Address", "Country", "State", "City", "Region", "Status");
        $column = 0;

        foreach($header as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
       
        $excel_row = 2;
        $status ="";
        $usersData = $this->StoreManagerModel->storeExcelExport($searchValue);
        foreach($usersData as $key=>$line)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['store_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['store_manager_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['managername']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['description']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['contact_person']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $line['phone']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $line['email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $line['pincode']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $line['address']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $line['country']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $line['state']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $line['city']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $line['region']);
            if( $line['status'] == "1"){
                $status = "Active";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row,$status);
            }else{
                $status = "Inactive";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row,$status);
            }
        $excel_row++;
        }
        
        $filename = "storemanager". date("Y-m-d-H-i-s").".csv";
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
		$objWriter->save('php://output');
       
    }
    public function resetPassword(){
        $id =@$_GET['id'];
        $this->form_validation->set_rules('edit_password1','Password','required');
        $this->form_validation->set_rules('edit_cpassword1','New Password','required');
        
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
        
            $edit_password =$this->input->post('edit_password1');
            $insertData = [
               
                'password' => md5($edit_password),
                'updated_by' => $this->session->userdata('fullname'),
                'updated_at' => date('y-m-d h:m:s'),
            ];
            // $mail = new PHPMailer(true);
            
            // $me = "Priyanka";
            

            // $emailData['content'] = 'Hi ' . $me. ',<br/> <br/> You are receiving this email because we have received a password reset request for your account. ';
            // //$from = 'Lawyerapp@gmail.com' 
            // //<br/> <a href="'.$base_url.'?key='.$new_date.'&id='.$id.'">'.$base_url.'activation/'.$activation.'key='.$new_date.'&id='.$id.'</a>;
            
            // $emailData['subject'] = "Password Change Request for fabindia";
            // $emailData['email'] = "priyanka.chimkar@nanostuffs.com";
            // $emailData['name'] = "Priyanka chimkar";
            // $emailData['template'] = 'reset-password';
            // $isMailSent = sendEmailCommonPhpMailer($emailData);
           
            $this->StoreManagerModel->updateSM($id,$insertData);
            $history[] = array(  
                'field_name' => 'Password',  
                'field_old_value' =>"*****",
                'field_new_value' =>"*****",
                'store_id' => $id,
                'field_updated_at' =>date('y-m-d h:m:s')
            ); 
            $this->StoreManagerModel->insertHistory($history);
            $output = array('status'=>true,'errors'=>'','msg'=>'Password reset successfully.');
        }
        echo json_encode($output); 
    }
    public function storeSetTargetSetting(){
         $insertData = [
                'target_date' => $this->input->post('Target_Date'),
                'total_sale_value' => $this->input->post('Total_Sales_Value'),
                'total_units_sold' => $this->input->post('Total_Units_Sold'),
                'store_id' => $this->input->post('store_id'),
                'user_id' =>  $this->session->userdata("user_id"),
                'created_by' => $this->session->userdata('fullname'),
            ];
        $this->StoreManagerModel->smTargetSet($insertData); 
        $output = array('status'=>true,'errors'=>'','msg'=>'Target set sucessfully.');
        
        echo json_encode($output);
    }
    public function storeSetTargetGridData(){
        $store_id =@$_POST['id'];
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
        $searchValue = @$_POST['search']['value']; // Search value
        $targetData['set_target']  = $this->TargetSettingModel->getTargetSettingGridData($store_id,$row,$rowperpage,$columnName,$columnSortOrder);
       $data = array();
        $totalRecord =0;
		foreach($targetData['set_target'] as $value)
		{
            $data[] = $value;
        }
        $totalRecord = $this->TargetSettingModel->getCountTargetSettingGrid($store_id);
        
		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        );
       echo json_encode($response);
    }

    public function importStore(){
       
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel1 = new PHPExcel();
        if(isset($_FILES["file"]["name"]))
		{
           
			$path = $_FILES["file"]["tmp_name"];
			
			$fileType = 'Excel2007';
			$objReader = PHPExcel_IOFactory::createReader($fileType);
			$objPHPExcel = $objReader->load($path);
			
			$csvcolumnimport = array();
			
				for($i=0;$i<=14;$i++){		
					$csvcolumnimport[$i] = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($i,1)->getValue();			
				}
			
			 $checkcolumn =array('Store Manager Name','Store ID','Description','Satus','Contact Person','Phone','Email','Pin Code','Country','Address','State','City','Store Manager ID','Region','Password');

             $highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();
             $success_record =0;
             $error_record =0;
			 for($row=2; $row<=$highestRow; $row++)
				{
                    $store_id = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $row)->getValue();
                    $store_manager_id =  $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $row)->getValue();
                    $email = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $row)->getValue();
                    $is_unique_record = $this->StoreManagerModel->storeIdUnique($store_id,$store_manager_id,$email);
                    // print_r($is_unique_record);
                    if($is_unique_record == 0){
                        $excel_status = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $row)->getValue();
                        if($excel_status == "Active"){
                            $status =1;
                        }else{
                            $status =0;
                        }
                        $data = array(
                            'managername' => $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $row)->getValue(),
                            'store_id' => $store_id,
                            'description' => $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $row)->getValue(),
                            'status' => $status,
                            
                            'contact_person' => $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $row)->getValue(),
                            'phone' => $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $row)->getValue(),
                            'email' => $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $row)->getValue(),
                            'pincode' =>$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $row)->getValue(),
                            'country' => htmlentities($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $row)->getValue()),
                            'address' =>$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $row)->getValue(),
                            'state' => htmlentities($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $row)->getValue()),
                            'city' => htmlentities($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11, $row)->getValue()),
                            'store_manager_id'=> $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $row)->getValue(),
                            'region' =>$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13, $row)->getValue(),
                            'password' =>md5($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14, $row)->getValue()),
                            'created_by' =>$this->session->userdata('fullname'),
                            
                            
                        );
                        $success_record++;
                        $this->StoreManagerModel->addStoreManager($data);
                    }else{
                        $error_record++;
                    }
                    
					
				}
                $highestRow = $highestRow-1;
                $data1['success_record'] =$success_record;
                $data1['error_record']=$error_record;
                $output = array('status'=>true,'errors'=>'','message'=>'Excel Upload .','data'=>$data1);
                echo json_encode($output);
                // $this->session->set_flashdata('message',$success_record.' Store created successfully.'<br>.$error_record.'Store not created, because they dont have unique store id or email or store manager id');
                // redirect('admin/store-manager','refresh');
		}
		else{
				// $this->session->set_flashdata('message',' Unable to create store,some data missing.');
				// redirect('admin/store-manager','refresh');
		}
    }



}
