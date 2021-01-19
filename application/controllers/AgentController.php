<?php 
class AgentController extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('AgentModel');
        // $this->load->model('TargetSettingModel');
       if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
           $this->session->set_flashdata('message','Please login and try again.');
           header("Location: ".base_url('/'));
           exit();
       }

    }

    public function index()
    {
       
       $this->load->view('backend/layout');
       $this->load->view('backend/sm_header');  // dashboard load
       $this->load->view('backend/pages/agents');  // dashboard load
    }
    public function getSmAgentGridData(){
        $store_id = $this->session->userdata("store_id");
        $draw = @$_POST['draw'];
        $row = @$_POST['start'];
        $rowperpage = @$_POST['length']; // Rows display per page
        $columnIndex = @$_POST['order'][0]['column']; // Column index
        $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
        $searchValue = @$_POST['search']['value']; // Search value
        $agentData['agents'] = $this->AgentModel->getAgentGridData($store_id,$searchValue,$rowperpage,$row,$columnName,$columnSortOrder);
        $data = array();
        $totalRecord =0;
        foreach($agentData['agents'] as $value)
        {
            $data[] = $value;
        }
        
        $totalREcord = $this->AgentModel->getCountAgentGrid($store_id,$searchValue);
        $response = array(
            "draw" =>intval($draw),
            "iTotalRecords" => $totalRecord ,
            "iTotalDisplayRecords" => $totalRecord,
            "aaData" => $data
        );
        echo json_encode($response);
    }
    public function agentSession(){
       
        $this->load->view("backend/layout");
        $this->load->view("backend/sm_header");
        $this->load->view("backend/pages/agent-sessions");
    }

    public function adminAgentSession(){
        $this->load->view("backend/layout");
        $this->load->view("backend/header");
        $this->load->view("backend/pages/admin/agent-sessions");
       
    }
    public function addAdminAgent(){
        $this->form_validation->set_rules('agent_name', 'agent Name', 'required');
        $this->form_validation->set_rules('agent_id', 'Agent ID', 'required|is_unique[agents.agent_id]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $user_id = $this->session->userdata("user_id");
            $role_type =  $this->session->userdata("role_type");
            $agnt_id =  $this->input->post('agnt_id');
            $store_id =@$_GET['store_id'];
            $password = $this->input->post('password');
            
            $data  = array(
                'agent_name' => $this->input->post('agent_name'),
                'agent_id' => $this->input->post('agent_id'),
                'user_id' => $user_id,
                'role_type' =>$role_type,
                'store_id'=>$store_id,
                'password' =>$password,
                'status'=> $this->input->post('status'),
                'created_by'=>$this->session->userdata("fullname"),
            );
            if(empty($agnt_id)){
                $this->AgentModel->addAgentByAdmin($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Agent created successfully.');
            }
        }
        echo json_encode($output);
    }
    public function addAgent(){
        $this->form_validation->set_rules('agent_name', 'agent Name', 'required');
        $this->form_validation->set_rules('agent_id', 'Agent ID', 'required|is_unique[agents.agent_id]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $user_id = $this->session->userdata("user_id");
            $role_type =  $this->session->userdata("role_type");
            $agnt_id =  $this->input->post('agnt_id');
            $store_id = $this->session->userdata("store_id");
            $data  = array(
                'agent_name' => $this->input->post('agent_name'),
                'agent_id' => $this->input->post('agent_id'),
                'user_id' => $user_id,
                'role_type' =>$role_type,
                'store_id'=>$store_id,
                'password' =>$this->input->post('password'),
                'status'=> $this->input->post('status'),
                'created_by'=>$this->session->userdata("fullname"),
            );
            if(empty($agnt_id)){
                $this->AgentModel->addAgentByAdmin($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Agent created successfully.');
            }
        }
        echo json_encode($output);
        exit();
    }
    public function getAgentById($agent_id){
        $this->security = \Config\Services::security();
        $id = $agent_id;
        $builder = $this->db->table('agents');
        $agentData = $builder->where(['id'=>$id])->get()->getResult();
        echo json_encode(
            array(
                'status'=>true,
                'data'=>$agentData,
                'csrfName' => $this->security->getCSRFTokenName(),
                'csrfHash' => $this->security->getCSRFHash()
            )
        );
    }
    
    public function AdminAgentDelete(){
        
        $id =@$_POST['id'];
        $this->AgentModel->deleteAgent($id);
		echo json_encode(array('status'=>'true','message'=>'Agent deleted successfully.'));
    }
    public function getAdminsAgentGridData(){
        $user_id = $this->session->userdata("user_id");
        $store_id = @$_GET['store_id'];
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
		$searchValue = @$_POST['search']['value']; // Search value
       
        $agentData['agents'] =$this->AgentModel->getAgentGridData($store_id,$searchValue,$rowperpage,$row,$columnName,$columnSortOrder);
        $data = array();
        $totalRecord =0;
        foreach($agentData['agents'] as $value)
		{
            $data[] = $value;
        }
        $totalRecord = $this->AgentModel->getCountAgentGrid($store_id,$searchValue);

		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        );
       echo json_encode($response);
       
    }
    public function getAgentViewdData(){
        $id =@$_GET['id'];
        $agentData = $this->AgentModel->getAgentByID($id);
        echo json_encode(
            array(
                'status'=>true,
                'data'=>$agentData
            )
        );
    }
    public function AdminAgentActive(){
        $id =@$_POST['id'];
        $data = [
            'status' => 1,
            'updated_by' => $this->session->userdata('fullname'),
            'updated_at' => date('y-m-d h:m:s'),
        ];
        $this->AgentModel->updateAgent($id,$data);
        
        echo json_encode(array('status'=>'true','message'=>'Agents Deactivated successfully!'));
    }
    public function AdminAgentDeactive(){
        $id =@$_POST['id'];
        $data = [
            'status' => 0,
            'updated_by' => $this->session->userdata('fullname'),
            'updated_at' => date('y-m-d h:m:s'),
        ];
        $this->AgentModel->updateAgent($id,$data);
        echo json_encode(array('status'=>'true','message'=>'Agents Activated successfully!'));
    }
    public function agentSetTargetSetting(){
        $this->form_validation->set_rules('target_date', 'agent Name', 'required');
        $this->form_validation->set_rules('Total_Sales_Value', 'Agent ID', 'required|is_unique[agents.agent_id]');
        $this->form_validation->set_rules('Total_Units_Sold', 'Password', 'required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $insertData = [
                'target_date' => $this->input->post('Target_Date'),
                'total_sale_value' => $this->input->post('Total_Sales_Value'),
                'total_units_sold' => $this->input->post('Total_Units_Sold'),
                'store_id' => $this->input->post('store_id'),
                'user_id' =>  $this->session->userdata("user_id"),
                'agent_id' =>   $this->input->post("agent_id"),
                'created_by' => $this->session->userdata('fullname'),
            ];
            $this->AgentModel->AgentTargetinsert($insertData);
            $output = array('status'=>true,'errors'=>'','msg'=>'Agent Target Set Sucessfully.');
        }
        echo json_encode($output);
    }
    public function agentSetTargetGridData(){
        $agent_id =@$_POST['id'];
        $store_id =@$_POST['store_id'];
        $user_id =@$_POST['user_id'];
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
		$searchValue = @$_POST['search']['value']; // Search value
        $targetData['set_target'] = $this->AgentModel->getAgentTargetGridData($agent_id,$store_id,$columnName,$columnSortOrder,$rowperpage,$row); 
        $data = array();
        $totalRecord =0;
		foreach($targetData['set_target'] as $value)
		{
            $data[] = $value;
        }
        $totalRecord =$this->AgentModel->getCountAgentTargetGridData($agent_id,$store_id,$columnName,$columnSortOrder); 
       
		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        );
       echo json_encode($response);
    }

    public function agentExportToExcel(){
        $searchValue = @$_GET['searchValue'];
        $store_id = $this->session->userdata("store_id");
        // create file name
        $fileName = 'Agent-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $header = array("ID","Store ID","Agent ID","Agent Name","Status");
        $column = 0;

        foreach($header as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
    
        $excel_row = 2;
        $status ="";
        $usersData = $this->AgentModel->AgentExcelExport($store_id,$searchValue);
        foreach($usersData as $key=>$line)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['store_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['agent_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['agent_name']);
           
            if( $line['status'] == "1"){
                $status = "Active";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row,$status);
            }else{
                $status = "Inactive";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row,$status);
            }
            $excel_row++;
        }
    
        $filename = "agent". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
}
