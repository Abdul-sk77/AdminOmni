<?php 
class ReportModel extends CI_Model {
     public function getReportGrid($role_type,$rowperpage, $row,$columnName,$columnSortOrder,$searchValue,$month_filter,$year_filter,$agent_id_filter,$login_store_id,$store_id_filter){
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

        public function getCountReportGrid($login_store_id,$agent_id_filter,$role_type,$store_id_filter,$year_filter,$month_filter,$searchValue){
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

        public function reportsExcelExport($searchValue){
                $this->db->select('*');
                $this->db->from('order_details');
               
               
                if($searchValue !='')
                {
                        $this->db->where("(order_id LIKE '%".$searchValue."%'  OR bill_amount LIKE '%".$searchValue."%' OR customer_email LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR customer_phone_no LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%' OR order_date LIKE '%".$searchValue."%')", NULL, FALSE);
                }  
                
                $query = $this->db->get()->result_array();
                return $query;
 
        }

        public function smReportExcelExport($searchValue,$store_id){
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