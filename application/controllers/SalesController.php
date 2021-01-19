<?php ;
class SalesController extends CI_Controller
{   
  
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
		 parent::__construct();
         $this->load->library('session');
        //  $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->model('StoreManagerModel');
         $this->load->model('OrderDetailsModel');
         $this->load->model('AgentModel');

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
        $this->load->view('backend/pages/admin/sales',$store_id);
    }
    public function smSales(){
        $store_id =$this->session->userdata('store_id');
        $agent_id['agent_id'] = $this->AgentModel->getAgentIDByStoreID($store_id);
        $this->load->view('backend/layout');
        $this->load->view('backend/sm_header');
        $this->load->view('backend/pages/sales',$agent_id);
    }
    public function getAllOrderDetails(){
        $draw = @$_POST['draw'];
		$row = @$_POST['start'];
		$rowperpage = @$_POST['length']; // Rows display per page
		$columnIndex = @$_POST['order'][0]['column']; // Column index
		$columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
        $searchValue = @$_POST['search']['value']; // Search value
        $store_id_filter = @$_POST['store_id_filter'];
        $year_filter = @$_POST['year_filter'];
        $month_filter = @$_POST['month_filter'];
        $role_type = $this->session->userdata('role_type');
        $agent_id_filter = @$_POST['agent_filter'];
        $login_store_id = $this->session->userdata('store_id');
       
        $saleData['order'] = $this->OrderDetailsModel->getSaleGrid($login_store_id,$agent_id_filter,$role_type,$store_id_filter,$year_filter,$month_filter,$searchValue,$rowperpage, $row,$columnName,$columnSortOrder); 
        $data = array();
		foreach($saleData['order'] as $value)
		{
            $data[] = $value;
        }

      
        $totalRecord =$this->OrderDetailsModel->getCountSaleGrid($login_store_id,$agent_id_filter,$role_type,$store_id_filter,$year_filter,$month_filter,$searchValue);
        
		$response = array(
			"draw" =>intval($draw),
			"iTotalRecords" => $totalRecord ,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data
        );
       echo json_encode($response);
    }

    // for admin
    public function sales(){
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/sales'); 
    }

    public function netSale(){
        $store_id['store_id'] = $this->StoreManagerModel->getStoreIDS();
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/net-sale',$store_id);  // net sales load for admin
    }

    public function netSaleCalData(){
        $store_id_filter = @$_POST['store_id_filter'];
        $year_filter = @$_POST['year_filter'];
        $month_filter = @$_POST['month_filter'];
        $last_year = date('Y', strtotime(date('Y-m')." -1 month"));
        $last_month = date('m', strtotime(date('Y-m')." -1 month"));
        $lastMonthNetSale = $this->OrderDetailsModel->getetSaleOfLastMonth($store_id_filter,$last_year,$last_month,$year_filter);
      
        $current_date = date('Y-m-d', strtotime(date('Y-m-d')));
        $month_start = date('Y-m-d', strtotime('first day of this month', time()));
        
        $mtdNetSAleValue = $this->OrderDetailsModel->getmtdNetSale($current_date,$month_start,$store_id_filter);
        
        $response = array(
			"mtdNetSaleValue" => $mtdNetSAleValue[0]->bill_amount,
			"lastMonthNetSale" => $lastMonthNetSale[0]->bill_amount
        );
       echo json_encode($response);
    }
    public function SalesexportCSV(){
        $searchValue = @$_GET['searchValue'];
        // create file name
        $fileName = 'Sales-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        
                    
        $header = array("ID","Order Id","Bill Amount","Customer Email","Customer Phone No.","Order Date","Order Status","Current Order Status");
        $column = 0;

        foreach($header as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
    
        $excel_row = 2;
        $status ="";
        $usersData = $this->OrderDetailsModel->SaleExcelExport($searchValue);
        foreach($usersData as $key=>$line)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['order_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['bill_amount']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['customer_email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['customer_phone_no']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['order_date']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $line['order_status']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $line['current_order_status']);
            $excel_row++;
        }
    
        $filename = "sales". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    public function smSaleExportToExcel(){
        $searchValue = @$_GET['searchValue'];
         $store_id =$this->session->userdata('store_id');
        // create file name
        $fileName = 'SMSales-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        
                    
        $header = array("ID","Order Id","Bill Amount","Customer Email","Customer Phone No.","Order Date","Order Status","Current Order Status");
        $column = 0;

        foreach($header as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
    
        $excel_row = 2;
        $status ="";
        $usersData = $this->OrderDetailsModel->SmSaleExcelExport($searchValue,$store_id);
        foreach($usersData as $key=>$line)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $line['id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $line['order_id']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $line['bill_amount']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $line['customer_email']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $line['customer_phone_no']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $line['order_date']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $line['order_status']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $line['current_order_status']);
            $excel_row++;
        }
    
        $filename = "smSales". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }


}
