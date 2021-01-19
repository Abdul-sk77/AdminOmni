<?php 
class DashboardController extends CI_Controller
{
   
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
		parent::__construct();
        $this->load->library('session');
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
        $store_id =$this->session->userdata('store_id');
       $agent_id['agent_id'] = $this->AgentModel->getAgentIDByStoreID($store_id);
        
        $this->load->view('backend/layout');
        $this->load->view('backend/sm_header');
        $this->load->view('backend/pages/dashboard',$agent_id);  // dashboard load

    }
    public function adminDashboard()
    {
		$this->db->select('store_id');
		$this->db->from('storemanager');
		$getStoreData = $this->db->get()->result();
        $store_id['store_id'] =  $getStoreData;
        $this->load->view('backend/layout',$store_id);
        $this->load->view('backend/header');
		$this->load->view('backend/pages/admin/dashboard',$store_id);
    }
    public function dashboardCal(){
       
        $store_id_filter = @$_POST['store_id_filter'];
        $year_filter = @$_POST['year_filter'];
        $month_filter = @$_POST['month_filter'];
        $yesterday = date('Y/m/d',strtotime("-1 days"));
        $current_month = date('m');
        $current_year =date('Y');
        $last_month = date('m',strtotime("-1 month"));
        $last_month_year = date('Y',strtotime("-1 month"));
        
        $tm_sum_of_item = $this->OrderDetailsModel->getUTP($store_id_filter,$current_month,$current_year); 
        $tm_order_count = $this->OrderDetailsModel->getUTPOrdercount($store_id_filter,$current_month,$current_year);
        
        $lm_sum_of_item = $this->OrderDetailsModel->getUTP($store_id_filter,$last_month,$last_month_year); 
        $lm_order_count = $this->OrderDetailsModel->getUTPOrdercount($store_id_filter,$last_month,$last_month_year);  
        
        $tm_sum_bill_amount = $this->OrderDetailsModel->getATV($store_id_filter,$current_month,$current_year);  
        $lm_sum_bill_amount = $this->OrderDetailsModel->getATV($store_id_filter,$last_month,$last_month_year); 

        $ftp_current_month_of_last_date =$this->OrderDetailsModel->getFtp($store_id_filter,$yesterday); 
        
        $final_last_day = $this->OrderDetailsModel->getDashboardCal($store_id_filter,$yesterday);
        $monthWiseData['value'] = $this->OrderDetailsModel->getDashboardGraphCal($store_id_filter,$year_filter,$month_filter);
        $utp_TM = 0;$utp_LM = 0;$atv_tm=0;$atv_lm=0;$cvg_tm =0;$cvg_lm =0;
        if($tm_order_count >0){
            $utp_TM = $tm_sum_of_item/$tm_order_count;
            $atv_tm = $tm_sum_bill_amount/ $tm_order_count;
            $cvg_tm = $tm_sum_bill_amount/$tm_sum_of_item;
        }
        if($lm_order_count >0){
            $utp_LM = $lm_sum_of_item/$lm_order_count;
            $atv_lm = $lm_sum_bill_amount/ $lm_order_count;
            $cvg_lm = $lm_sum_bill_amount/$lm_sum_of_item;
        }

        $jan =0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$des=0;
        $chartData=array();
        foreach($monthWiseData['value'] as $value)
		{
            if($value->month == '1'){
                $jan= $value->sale;
            }elseif($value->month == '2'){
                $feb= $value->sale;
            }elseif($value->month == '3'){
                $mar= $value->sale;
            }elseif($value->month == '4'){
                $apr= $value->sale;
            }elseif($value->month == '5'){
                $may= $value->sale;
            }elseif($value->month == '6'){
                $jun= $value->sale;
            }elseif($value->month == '7'){
                $jul= $value->sale;
            }elseif($value->month == '8'){
                $aug= $value->sale;
            }elseif($value->month == '9'){
                $sap= $value->sale;
            }elseif($value->month == '10'){
                $oct= $value->sale;
            }elseif($value->month == '11'){
                $nov= $value->sale;
            }elseif($value->month == '12'){
                $des= $value->sale;
            }
        }
        if($final_last_day == null){
            $final_last_day =0;
        }
        $chartData = [$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$des];
        
        $response = array(
            "utp_TM" =>$utp_TM,
            "utp_LM" =>$utp_LM,
            "atv_TM" =>$atv_tm,
            "atv_LM" =>$atv_lm,
            "cvg_TM" =>$cvg_tm,
            "cvg_LM" =>$cvg_lm,
            "last_day_sale" => $final_last_day,
            "chart_data" =>$chartData,
            "ftp_current_month_of_last_date" =>  $ftp_current_month_of_last_date
        );
       echo json_encode($response);
    }
    public function smDashboardCal(){
        $store_id =$this->session->userdata('store_id');
        $agent_id_filter = @$_POST['agent_id_filter'];
        $year_filter = @$_POST['year_filter'];
        $month_filter = @$_POST['month_filter'];
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime($today . " - 1 day"));
        $current_month = date('m');
        $current_year =date('Y');
        $last_month = date('m',strtotime("-1 month"));
        $last_month_year = date('Y',strtotime("-1 month"));
        
        $tm_sum_of_item = $this->OrderDetailsModel->getSmUTP($store_id,$agent_id_filter,$current_month,$current_year); 
        $tm_order_count = $this->OrderDetailsModel->getSmUTPOrdercount($store_id,$agent_id_filter,$current_month,$current_year);
        
        $lm_sum_of_item = $this->OrderDetailsModel->getSmUTP($store_id,$agent_id_filter,$last_month,$last_month_year); 
        $lm_order_count = $this->OrderDetailsModel->getSmUTPOrdercount($store_id,$agent_id_filter,$last_month,$last_month_year);  
        
        $tm_sum_bill_amount = $this->OrderDetailsModel->getSmATV($store_id,$agent_id_filter,$current_month,$current_year);  
        $lm_sum_bill_amount = $this->OrderDetailsModel->getSmATV($store_id,$agent_id_filter,$last_month,$last_month_year); 

       
        $ftp_current_month_of_last_date =$this->OrderDetailsModel->getSMFtp($store_id,$agent_id_filter ,$yesterday); 
        $final_last_day = $this->OrderDetailsModel->getAgentDashboardCal($store_id,$agent_id_filter,$yesterday);
        
        $monthWiseData['value'] = $this->OrderDetailsModel->getAgentDashboardGraphCal($store_id,$agent_id_filter,$year_filter,$month_filter);
       
        $utp_TM = 0;$utp_LM = 0;$atv_tm=0;$atv_lm=0;$cvg_tm =0;$cvg_lm =0;
        if($tm_order_count >0){
            $utp_TM = $tm_sum_of_item/$tm_order_count;
            $atv_tm = $tm_sum_bill_amount/ $tm_order_count;
            $cvg_tm = $tm_sum_bill_amount/$tm_sum_of_item;
        }
        if($lm_order_count >0){
            $utp_LM = $lm_sum_of_item/$lm_order_count;
            $atv_lm = $lm_sum_bill_amount/ $lm_order_count;
            $cvg_lm = $lm_sum_bill_amount/$lm_sum_of_item;
        }

        $jan =0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$des=0;
        $chartData=array();
        foreach($monthWiseData['value'] as $value)
		{
            if($value->month == '1'){
                $jan= $value->sale;
            }elseif($value->month == '2'){
                $feb= $value->sale;
            }elseif($value->month == '3'){
                $mar= $value->sale;
            }elseif($value->month == '4'){
                $apr= $value->sale;
            }elseif($value->month == '5'){
                $may= $value->sale;
            }elseif($value->month == '6'){
                $jun= $value->sale;
            }elseif($value->month == '7'){
                $jul= $value->sale;
            }elseif($value->month == '8'){
                $aug= $value->sale;
            }elseif($value->month == '9'){
                $sap= $value->sale;
            }elseif($value->month == '10'){
                $oct= $value->sale;
            }elseif($value->month == '11'){
                $nov= $value->sale;
            }elseif($value->month == '12'){
                $des= $value->sale;
            }
        }
        $chartData = [$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$des];
        if($final_last_day == null){
            $final_last_day =0;
        }
        $response = array(
            "utp_TM" =>$utp_TM,
            "utp_LM" =>$utp_LM,
            "atv_TM" =>$atv_tm,
            "atv_LM" =>$atv_lm,
            "cvg_TM" =>$cvg_tm,
            "cvg_LM" =>$cvg_lm,
            "last_day_sale" => $final_last_day,
            "chart_data" => $chartData,
            "ftm_current_month_of_last_date" => $ftp_current_month_of_last_date
            
        );
       echo json_encode($response);
    }


}
