<?php 
class TargetSettingModel extends CI_Model {
    public function getTargetSettingGridData($store_id,$row,$rowperpage,$columnName,$columnSortOrder){
        $this->db->select('*');
        $this->db->from('target_setting');
        $this->db->where("store_id",$store_id);
       
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getCountTargetSettingGrid($store_id){
        $this->db->select('*');
        $this->db->from('target_setting');
        $this->db->where("store_id",$store_id);
        return $this->db->get()->num_rows();;
    }
    




}
?>