<?php 
class StoreManagerModel extends CI_Model {
    public function getSMGridData($row,$rowperpage,$columnName,$columnSortOrder,$searchValue){
        $this->db->select('*');
	    $this->db->from('storemanager');
        if($searchValue !='')
		{
            $this->db->or_like('managername', $searchValue);
            $this->db->or_like('store_id', $searchValue);
            $this->db->or_like('store_manager_id', $searchValue);
            $this->db->or_like('updated_at', $searchValue);
        }  
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getCountSMGrid($searchValue){
        $this->db->select('*');
	    $this->db->from('storemanager');
        if($searchValue !='')
		{
            $this->db->or_like('managername', $searchValue);
            $this->db->or_like('store_id', $searchValue);
            $this->db->or_like('store_manager_id', $searchValue);
            $this->db->or_like('updated_at', $searchValue);
        }  
        return $this->db->get()->num_rows();
    }
    public function getSMHistoryGridData($row,$rowperpage,$columnName,$columnSortOrder,$searchValue){
        $this->db->select('*');
	    $this->db->from('storemanager_history');
        if($searchValue !='')
		{
            $this->db->or_like('field_name', $searchValue);
            $this->db->or_like('field_old_value', $searchValue);
            $this->db->or_like('field_new_value', $searchValue);
            $this->db->or_like('field_updated_at', $searchValue);
        }  
        $this->db->limit(10);  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getCountSMHistoryGrid($searchValue){
        $this->db->select('*');
        $this->db->from('storemanager_history');
        $this->db->limit(10);  
        
        if($searchValue !='')
		{
            $this->db->or_like('field_name', $searchValue);
            $this->db->or_like('field_old_value', $searchValue);
            $this->db->or_like('field_new_value', $searchValue);
            $this->db->or_like('field_updated_at', $searchValue);
        }  
        return $this->db->get()->num_rows();
    }
    public function addStoreManager($insertData)
    {
        $this->db->insert('storemanager',$insertData);
        return true;
    }

    public function deactiveStoreManager($id){
        $data = array(
            'status' => 0,
            'updated_by' => $this->session->userdata('fullname'),
            'updated_at' => date('y-m-d h:m:s'),
        );
        $this->db->where('id', $id);
        $this->db->update('storemanager', $data);
        return true;
    }

    public function activeStoreManager($id){
        $respinse ="";
        $data = array(
            'status' => 1,
            'updated_by' => $this->session->userdata('fullname'),
            'updated_at' => date('y-m-d h:m:s'),
        );
        $this->db->where('id', $id);
        $this->db->update('storemanager', $data);
        return true;
    }

    public function deleteSMWithRelatedData($id,$store_id){
        $this->db->query("DELETE FROM storemanager where id = '$id'");
        $this->db->query("DELETE FROM storemanager_history where store_id = '$id'");
        $this->db->query("DELETE FROM agents where store_id = '$store_id'");
        $this->db->query("DELETE FROM agent_target_setting where store_id = '$store_id'");
        $this->db->query("DELETE FROM agent_cat_target_setting_mapping where store_id = '$store_id'");
        $this->db->query("DELETE FROM target_setting where store_id = '$id'");
        $this->db->query("DELETE FROM target_setting_category_mapping where store_manager_id = '$id'");
        return true;
    }

    public function getViewSMForEdit($id){
        $this->db->select('*');
        $this->db->from('storemanager');
        $this->db->where('id', $id);
        
        return $this->db->get()->result();
    }

    public function updateSM($id,$insertData){
        $this->db->where('id', $id);
        $this->db->update('storemanager',$insertData);
        return true;
    }

    public function smTargetSet($insertData){
        $this->db->insert('target_setting',$insertData);
        return true;
    }

    public function getStoreIDS(){
        $this->db->select('store_id');
        $this->db->from('storemanager');
        $this->db->order_by("id","desc");
        return $this->db->get()->result();
    }

    public function insertHistory($history){
        
        $this->db->insert_batch('storemanager_history',$history);
        return true;
    }

    public function storeExcelExport($searchValue){
        $this->db->select('*');
	    $this->db->from('storemanager');
        if($searchValue !='')
		{
            $this->db->or_like('managername', $searchValue);
            $this->db->or_like('store_id', $searchValue);
            $this->db->or_like('store_manager_id', $searchValue);
            $this->db->or_like('updated_at', $searchValue);
        }  
      
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function storeIdUnique($store_id,$store_manager_id,$email){
        $this->db->select('*');
        $this->db->from('storemanager');
        $this->db->where('store_id', $store_id);
        $this->db->or_where('store_manager_id', $store_manager_id);
        $this->db->or_where('email', $email);
        return $this->db->get()->num_rows();
    }

    




}
?>