<?php 
class FeedbackController extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('StoreManagerModel');
        $this->load->model('FeedbackModel');
        if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
            $this->session->set_flashdata('message','Please login and try again.');
            header("Location: ".base_url('/'));
            exit();
        }
    }
    public function index()
    {
        $store_id['store_id'] = $this->StoreManagerModel->getStoreIDS();
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/feedback',$store_id);
       
    }
    public function smFeedback(){
        
        $this->load->view('backend/layout');
        $this->load->view('backend/sm_header');
        $this->load->view('backend/pages/feedback');  
    }
    public function getFeedbackGridData(){
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
        $searchValue = @$_POST['search']['value']; // Search value
        $store_id_filter =@$_POST['store_id_filter'];
        $role_type = $this->session->userdata('role_type');
        $logged_in_id = $this->session->userdata('store_id');
        
        $feedbackData['data'] = $this->FeedbackModel->feedbackGridData($role_type,$searchValue,$rowperpage, $row,$store_id_filter,$logged_in_id,$columnName,$columnSortOrder);
        $data = array();
        
		foreach($feedbackData['data'] as $value)
		{
           $data[] = $value;
        }
        
        $totalRecord =$this->FeedbackModel->getCountFeedbackGrid($role_type,$searchValue,$store_id_filter,$logged_in_id);
		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        );
       echo json_encode($response);
    }
    public function getFeedbackDetailsByID(){
        $feedback_id = @$_GET['feedback_id'];
        $feedbackDeatils['details'] = $this->FeedbackModel->getFeedbackDataByID($feedback_id);
        $data = array();
		foreach($feedbackDeatils['details'] as $value)
		{
            $data[] = $value;
        }
        echo json_encode(array('status'=>'true','message'=>'feedback details!','data'=>$data));
    }

    public function FeedbackexportCSV(){
        $searchValue = @$_GET['searchValue'];
        // create file name
        $fileName = 'Feedback-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        
                    
        $header = array("Sr.No","Store Id","Emp Id","First Name","Last Name","Email","Rating","Feedback Date");
        $column = 0;

        foreach($header as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
    
        $excel_row = 2;
        $status ="";
        $usersData = $this->FeedbackModel->feedbackExcelExport($searchValue);
        foreach($usersData as $key=>$line)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['store_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['emp_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['first_name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['last_name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $line['rating']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $line['feedback_date']);
            $excel_row++;
        }
    
        $filename = "feedback". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');

    echo json_encode(array('status'=>'true','message'=>'feedback details!','data'=>$data));
}

public function smFeedbackExportToExcel(){
    $searchValue = @$_GET['searchValue'];
    $store_id = $this->session->userdata('store_id');
    // create file name
    $fileName = 'SMFeedback-'.time().'.xlsx';  
    // load excel library
    $this->load->library('excel');
    //$listInfo = $this->export->exportList();
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    // set Header
    
                
    $header = array("Sr.No","Store Id","Emp Id","First Name","Last Name","Email","Rating","Feedback Date");
    $column = 0;

    foreach($header as $field)
    {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
        $column++;
    }

    $excel_row = 2;
    $status ="";
    $usersData = $this->FeedbackModel->smFeedbackExcelExport($searchValue,$store_id);
    foreach($usersData as $key=>$line)
    {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['store_id']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['emp_id']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['first_name']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['last_name']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['email']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $line['rating']);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $line['feedback_date']);
        $excel_row++;
    }

    $filename = "smfeedback". date("Y-m-d-H-i-s").".csv";
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter->save('php://output');
}
}
