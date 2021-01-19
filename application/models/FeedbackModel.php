<?php 
class FeedbackModel extends CI_Model {
    public function feedbackGridData($role_type,$searchValue,$rowperpage, $row,$store_id_filter,$logged_in_id,$columnName,$columnSortOrder){
        $this->db->select('*');
        $this->db->from('feedback');
        if($searchValue !='')
		{
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR emp_id LIKE '%".$searchValue."%' OR store_id LIKE '%".$searchValue."%' OR rating LIKE '%".$searchValue."%' OR feedback_date LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        if($rowperpage != -1)  
        {  
            $this->db->limit($rowperpage, $row);  
        } 
        if(isset($store_id_filter) && $store_id_filter!=""){
            $this->db->where_in('store_id', $store_id_filter);
        }
        if($role_type == 2){
            $this->db->where('store_id', $logged_in_id);
        } 
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getCountFeedbackGrid($role_type,$searchValue,$store_id_filter,$logged_in_id){
        $this->db->select('*');
        $this->db->from('feedback');
        if($searchValue !='')
		{
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR emp_id LIKE '%".$searchValue."%' OR store_id LIKE '%".$searchValue."%' OR rating LIKE '%".$searchValue."%' OR feedback_date LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        if(isset($store_id_filter) && $store_id_filter!=""){
            $this->db->where_in('store_id', $store_id_filter);
        }
        if($role_type == 2){
            $this->db->where('store_id', $logged_in_id);
        } 
        return $this->db->get()->num_rows();
    }

    public function getFeedbackDataByID($id){
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('id', $id);
        
        return $this->db->get()->result();
    }
   
    public function feedbackExcelExport($searchValue){
        $this->db->select('*');
        $this->db->from('feedback');
        if($searchValue !='')
		{
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR emp_id LIKE '%".$searchValue."%' OR store_id LIKE '%".$searchValue."%' OR rating LIKE '%".$searchValue."%' OR feedback_date LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
       
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function smFeedbackExcelExport($searchValue,$store_id){
        $this->db->select('*');
        $this->db->from('feedback');
        if($searchValue !='' && $searchValue !='undefined')
		{
            $this->db->where("(first_name LIKE '%".$searchValue."%' OR last_name LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%' OR emp_id LIKE '%".$searchValue."%' OR store_id LIKE '%".$searchValue."%' OR rating LIKE '%".$searchValue."%' OR feedback_date LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        $this->db->where('store_id', $store_id);
        $query = $this->db->get()->result_array();
        return $query;
    }
  
    

}
?>