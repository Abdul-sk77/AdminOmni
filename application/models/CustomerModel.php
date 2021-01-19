<?php 
class CustomerModel extends CI_Model {
    public function getCustomerGridData($searchValue,$row,$rowperpage,$columnName,$columnSortOrder){
         
        $this->db->select('*');
        $this->db->from('customer_details');
        if($searchValue !='')
		{
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR phone_no LIKE '%".$searchValue."%' OR news_letter_subscription LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
     
    }
    public function getCountCustomerGrid($searchValue){
        $this->db->select('*');
        $this->db->from('customer_details');
        {
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR phone_no LIKE '%".$searchValue."%' OR news_letter_subscription LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        return $this->db->get()->num_rows();
    }

    public function getCustomerDataByID($id){
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('id', $id);
        
        return $this->db->get()->result();
    }
    public function getOrderDetailsAsPerCustomer($id,$searchValue,$rowperpage, $row,$columnName,$columnSortOrder){
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where('cust_id',$id);
        if($searchValue !='')
		{
            $this->db->where("(order_id LIKE '%".$searchValue."%' OR agent_id LIKE '%".$searchValue."%' OR bill_amount LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getCountOrderDetails($id,$searchValue){
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where('cust_id',$id);
        if($searchValue !='')
		{
            $this->db->where("(order_id LIKE '%".$searchValue."%' OR agent_id LIKE '%".$searchValue."%' OR bill_amount LIKE '%".$searchValue."%' OR order_status LIKE '%".$searchValue."%' OR current_order_status LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        
        return $this->db->get()->num_rows();
    }

    public function CustomerExcelExport($searchValue){
        $this->db->select('*');
        $this->db->from('customer_details');
        if($searchValue !='')
		{
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR phone_no LIKE '%".$searchValue."%' OR news_letter_subscription LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
       
        $query = $this->db->get()->result_array();
        return $query;
    
    }
    

}
?>