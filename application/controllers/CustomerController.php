<?php


    class CustomerController extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            // $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('CustomerModel');
            // $this->load->model('TargetSettingModel');
            if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
                $this->session->set_flashdata('message','Please login and try again.');
                header("Location: ".base_url('/'));
                exit();
            }
    
        }
        public function index(){
            
            $this->load->view('backend/layout');
            $this->load->view('backend/header');
            $this->load->view('backend/pages/admin/customers');

        }
        public function getCustomerData(){
            $draw = @$_POST['draw'];
            $row = @$_POST['start'];
            $rowperpage = @$_POST['length']; // Rows display per page
            $columnIndex = @$_POST['order'][0]['column']; // Column index
            $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
            $searchValue = @$_POST['search']['value']; // Search value
            
            if($columnName = "fullname"){
                $columnName = "first_name";
            }
            $custData['cust'] = $this->CustomerModel->getCustomerGridData($searchValue,$row,$rowperpage,$columnName,$columnSortOrder);
            $data = array();
            $finalData =array();
            foreach($custData['cust'] as $value)
            {
                $data['id'] = $value['id'];
                $data['fullname'] = $value['first_name']." ".$value['last_name'];
                $data['email'] = $value['email'];
                $data['phone_no'] = $value['phone_no'];
                $data['news_letter_subscription'] = $value['news_letter_subscription'];
                $finalData[] =$data;
            }
    
            $totalRecord =$this->CustomerModel->getCountCustomerGrid($searchValue);
            $response = array(
                "draw" =>intval($draw),
                "iTotalRecords" => $totalRecord ,
                "iTotalDisplayRecords" => $totalRecord,
                "aaData" =>  $finalData
            );
           echo json_encode($response);
        }

        public function getCustomerByID(){
            $id =@$_GET['id'];
            $customerData['cust'] = $this->CustomerModel->getCustomerDataByID($id);
            $data = array();
            $totalRecord =0;
            foreach( $customerData['cust'] as $value)
            {
                $data[] = $value;
            }
            echo json_encode(array('status'=>'true','message'=>'Customer details','data'=>$data));
        }

        public function getOrderDetailsAsPerCustomer(){
            $id = @$_POST['id'];
            $draw = @$_POST['draw'];
            $row = @$_POST['start'];
            $rowperpage = @$_POST['length']; // Rows display per page
            $columnIndex = @$_POST['order'][0]['column']; // Column index
            $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
            $searchValue = @$_POST['search']['value']; // Search value
           
            $orderData['order'] = $this->CustomerModel->getOrderDetailsAsPerCustomer($id,$searchValue,$rowperpage, $row,$columnName,$columnSortOrder);
            $data = array();
            foreach($orderData['order'] as $value)
            {
                $data[] = $value;
            }
          
            $totalRecord =$this->CustomerModel->getCountOrderDetails($id,$searchValue);
            
            $response = array(
                "draw" =>intval($draw),
                "iTotalRecords" => $totalRecord ,
                "iTotalDisplayRecords" => $totalRecord,
                "aaData" => $data
            );
           echo json_encode($response);
        }

        public function CustomerexportCSV(){
            $searchValue = @$_GET['searchValue'];
            // create file name
            $fileName = 'Customers-'.time().'.xlsx';  
            // load excel library
            $this->load->library('excel');
            //$listInfo = $this->export->exportList();
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            // set Header
            $header = array("ID","Customer Name","Customer Email","Customer Mobile No","Gender","News Letter");
            $column = 0;

            foreach($header as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
        
            $excel_row = 2;
            $status ="";
            $usersData = $this->CustomerModel->CustomerExcelExport($searchValue);
            foreach($usersData as $key=>$line)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
                $fullname = $line['first_name'] . $line['last_name'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $fullname);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['email']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['phone_no']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['gender']);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['news_letter_subscription']);
                
                $excel_row++;
            }
        
            $filename = "customer". date("Y-m-d-H-i-s").".csv";
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
            $objWriter->save('php://output');
       
        }
    }