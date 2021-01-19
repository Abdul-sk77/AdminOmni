<?php 
class OrderDetailsModel extends CI_Model {
        public function getDashboardCal($store_id_filter,$yesterday)
        {
                $query = $this->db->select_sum('bill_amount');
                $this->db->from('order_details');
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                }
                $this->db->where('order_date',$yesterday);
                $query = $this->db->get();
                return $query->row()->bill_amount;
        }
        public function getAgentDashboardCal($store_id,$agent_id_filter,$yesterday){
                $this->db->select_sum('bill_amount');
                $this->db->from('order_details');
                $this->db->where('store_id',$store_id);
                if(isset($agent_id_filter) && $agent_id_filter!=""){
                        $this->db->where_in('agent_id', $agent_id_filter);
                }
                $this->db->where('order_date',$yesterday);
                return $this->db->get()->row()->bill_amount;
       
        }
        
        public function getDashboardGraphCal($store_id_filter,$year_filter,$month_filter){
                $query = $this->db->select(['sum(bill_amount) as sale','MONTH(order_date) as month']);
                $this->db->from('order_details');
               
                if(isset($store_id_filter) && $store_id_filter!=""){
                        // $explode_store_id = implode(',',$store_id_filter);
                       
                        $this->db->where_in('store_id', $store_id_filter);
                }
                if(isset($year_filter) && $year_filter!=" " && $year_filter != "Select FY*"){
                        $this->db->where('YEAR(order_date) = '.$year_filter);
                }
                $this->db->group_by('MONTH(order_date)','YEAR(order_date)');
                $query = $this->db->get()->result();
                return $query;
        }
        public function getAgentDashboardGraphCal($store_id, $agent_id_filter,$year_filter,$month_filter){
                $query = $this->db->select(['sum(bill_amount) as sale','MONTH(order_date) as month']);
                $this->db->from('order_details');
                $this->db->where('store_id',$store_id);
                if(isset($agent_id_filter) && $agent_id_filter!=""){
                    $this->db->where_in('agent_id', $agent_id_filter);
                }
                if(isset($year_filter) && $year_filter!="" && $year_filter != "Select FY*"){
                    $this->db->where('YEAR(order_date) = '.$year_filter);
                }
                        $this->db->group_by('MONTH(order_date)','YEAR(order_date)');
                $query =$this->db->get()->result();
                return $query;
        }
        public function getSaleGrid($login_store_id,$agent_id_filter,$role_type,$store_id_filter,$year_filter,$month_filter,$searchValue,$rowperpage, $row,$columnName,$columnSortOrder){
                $this->db->select('*');
                $this->db->from('order_details');
                if($store_id_filter != 'undefined' && $store_id_filter !=""){
                        $implode_store_id = explode(',',$store_id_filter);
                        if (substr($implode_store_id[0], 0, strlen("undefined")) == "undefined") {
                                $implode_store_id[0] = substr($implode_store_id[0], strlen("undefined"));
                        } 
                        $this->db->where_in('store_id', $implode_store_id);
                }
                    // For sm agent sale
                if($role_type == 2){
                        $this->db->where('store_id',$login_store_id);
                        if(isset($agent_id_filter) && $agent_id_filter!=""){
                                $this->db->where_in('agent_id',$agent_id_filter);
                        }
                }
                if($year_filter != "Select FY*"){
                        $this->db->where('YEAR(order_date) = '.$year_filter);
                }
                if(isset($month_filter) && $month_filter!=""){
                        $this->db->where_in('MONTH(order_date)',$month_filter);
                }
                if($searchValue !='')
                {
                        $this->db->where("(order_id LIKE '%".$searchValue."%'  OR bill_amount LIKE '%".$searchValue."%' OR customer_email LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR customer_phone_no LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%' OR order_date LIKE '%".$searchValue."%')", NULL, FALSE);
               }  
                if($rowperpage != -1)  
                {  
                        $this->db->limit($rowperpage, $row);  
                } 
                $this->db->order_by($columnName,$columnSortOrder);
                $query = $this->db->get()->result();
                return $query;

        }

        public function getCountSaleGrid($login_store_id,$agent_id_filter,$role_type,$store_id_filter,$year_filter,$month_filter,$searchValue){
                $this->db->select('*');
                $this->db->from('order_details');
                if($store_id_filter != 'undefined' && $store_id_filter !=""){
                        $implode_store_id = explode(',',$store_id_filter);
                        if (substr($implode_store_id[0], 0, strlen("undefined")) == "undefined") {
                                $implode_store_id[0] = substr($implode_store_id[0], strlen("undefined"));
                        } 
                        $this->db->where_in('store_id', $implode_store_id);
                }
                    // For sm agent sale
                if($role_type == 2){
                        $this->db->where('store_id',$login_store_id);
                        if(isset($agent_id_filter) && $agent_id_filter!=""){
                                $this->db->where_in('agent_id',$agent_id_filter);
                        }
                }
                if($year_filter != "Select FY*"){
                        $this->db->where('YEAR(order_date) = '.$year_filter);
                }
                if(isset($month_filter) && $month_filter!=""){
                        $this->db->where_in('MONTH(order_date)',$month_filter);
                }
                if($searchValue !='')
                {
                        $this->db->where("(order_id LIKE '%".$searchValue."%'  OR bill_amount LIKE '%".$searchValue."%' OR customer_email LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR customer_phone_no LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%' OR order_date LIKE '%".$searchValue."%')", NULL, FALSE);
                }  
               
                return $this->db->get()->num_rows(); 
        }

        public function getetSaleOfLastMonth($store_id_filter,$last_year,$last_month,$year_filter){
                $this->db->select_sum('bill_amount');
                $this->db->from('order_details');
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                        $this->db->where('YEAR(order_date) = '.$last_year);
                        $this->db->where('MONTH(order_date) ='.$last_month);
                }else{
                    if($year_filter != "Select FY*"){
                        $this->db->where('YEAR(order_date) = '.$year_filter);
                        $this->db->where('MONTH(order_date) = '.$last_month);
                    }
                }
                return $this->db->get()->result();
                
        }
        public function getmtdNetSale($current_date,$month_start,$store_id_filter){
                $this->db->select_sum('bill_amount');
                $this->db->from('order_details');       
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                }
                $this->db->where('order_date >=',$month_start);
                $this->db->where('order_date <=',$current_date);
               
               
                return $this->db->get()->result();
              
        }
        public function getFtp($store_id_filter,$yesterday){
                $query = $this->db->select_sum('bill_amount');
                $this->db->from('order_details');       
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                }
                $this->db->where('order_date <=',$yesterday);
               
                $query = $this->db->get();
                return $query->row()->bill_amount;
        }
        public function getSMFtp($store_id,$agent_id_filter ,$yesterday){
                $query = $this->db->select_sum('bill_amount');
                $this->db->from('order_details');       
                if(isset($agent_id_filter) && $agent_id_filter!=""){
                        $this->db->where_in('agent_id', $agent_id_filter);
                }
                $this->db->where('store_id',$store_id);
                $this->db->where('order_date <=',$yesterday);
               
                $query = $this->db->get();
                return $query->row()->bill_amount;
        }

        public function getUTP($store_id_filter,$month,$current_year){
                $query = $this->db->select_sum('qty');
                $this->db->from('order_details');       
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                }
                $this->db->where('YEAR(order_date) = '.$current_year);
                $this->db->where('MONTH(order_date) = '.$month);
               
                $query = $this->db->get();
                return $query->row()->qty;
        }

        public function getUTPOrdercount($store_id_filter,$last_month,$current_year){
                $query = $this->db->select('*');
                $this->db->from('order_details');       
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                }
                $this->db->where('YEAR(order_date) = '.$current_year);
                $this->db->where('MONTH(order_date) = '.$last_month);
               return $this->db->get()->num_rows(); 
        }

        public function getATV($store_id_filter,$month,$year){
                $query = $this->db->select_sum('bill_amount');
                $this->db->from('order_details');       
                if(isset($store_id_filter) && $store_id_filter!=""){
                        $this->db->where_in('store_id', $store_id_filter);
                }
                $this->db->where('YEAR(order_date) = '.$year);
                $this->db->where('MONTH(order_date) = '.$month);
               
                $query = $this->db->get();
                return $query->row()->bill_amount;
        }

        public function getSmUTP($store_id,$agent_id_filter,$month,$current_year){
                $query = $this->db->select_sum('qty');
                $this->db->from('order_details');       
                if(isset($agent_id_filter) && $agent_id_filter!=""){
                        $this->db->where_in('store_id', $agent_id_filter);
                }
                $this->db->where('YEAR(order_date) = '.$current_year);
                $this->db->where('MONTH(order_date) = '.$month);
                $this->db->where('store_id',$store_id);
               
                $query = $this->db->get();
                return $query->row()->qty;
        }

        public function getSmUTPOrdercount($store_id,$agent_id_filter,$month,$current_year){
                $query = $this->db->select('*');
                $this->db->from('order_details');       
                if(isset($agent_id_filter) && $agent_id_filter!=""){
                        $this->db->where_in('store_id', $agent_id_filter);
                }
                $this->db->where('YEAR(order_date) = '.$current_year);
                $this->db->where('MONTH(order_date) = '.$month);
                $this->db->where('store_id',$store_id);
               return $this->db->get()->num_rows(); 
        }

        public function getSmATV($store_id,$agent_id_filter,$month,$year){
                $query = $this->db->select_sum('bill_amount');
                $this->db->from('order_details');       
                if(isset($agent_id_filter) && $agent_id_filter!=""){
                        $this->db->where_in('store_id', $agent_id_filter);
                }
                $this->db->where('store_id',$store_id);
                $this->db->where('YEAR(order_date) = '.$year);
                $this->db->where('MONTH(order_date) = '.$month);
               
                $query = $this->db->get();
                return $query->row()->bill_amount;
        }

        public function SaleExcelExport($searchValue){
                $this->db->select('*');
                $this->db->from('order_details');
                if($searchValue !='')
                {
                        $this->db->where("(order_id LIKE '%".$searchValue."%'  OR bill_amount LIKE '%".$searchValue."%' OR customer_email LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR customer_phone_no LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%' OR order_date LIKE '%".$searchValue."%')", NULL, FALSE);
                }  
                $query = $this->db->get()->result_array();
                return $query;

        }   

        public function SmSaleExcelExport($searchValue,$store_id){
                $this->db->select('*');
                $this->db->from('order_details');
                $this->db->where('store_id',$store_id);
                if($searchValue !='')
                {
                        $this->db->where("(order_id LIKE '%".$searchValue."%'  OR bill_amount LIKE '%".$searchValue."%' OR customer_email LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR customer_phone_no LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%' OR order_date LIKE '%".$searchValue."%')", NULL, FALSE);
                }  
                $query = $this->db->get()->result_array();
                return $query;

        }





}
?>