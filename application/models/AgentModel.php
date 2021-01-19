<?php 
class AgentModel extends CI_Model {
    public function getAgentGridData($store_id,$searchValue,$rowperpage,$row,$columnName,$columnSortOrder){
        
        $this->db->select('*');
        $this->db->from('agents');
        $this->db->where("store_id",$store_id);
        if($searchValue !='')
		{
            $this->db->where("(agent_name LIKE '%".$searchValue."%' OR agent_id LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
     
    }
    public function getCountAgentGrid($store_id,$searchValue){
        $this->db->select('*');
        $this->db->from('agents');
        $this->db->where("store_id",$store_id);
        if($searchValue !='')
		{
            $this->db->where("(agent_name LIKE '%".$searchValue."%' OR agent_id LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
        return $this->db->get()->num_rows();;
    }
    
   
    public function addAgentByAdmin($data){
        $this->db->insert('agents',$data);
        return true;
    }

    public function updateAgent($id,$data){
        $this->db->where('id', $id);
        $this->db->update('agents', $data);
        return true;

    }

    public function deleteAgent($id){
        $this->db->query("DELETE FROM agents where id = $id");
        $this->db->query("DELETE FROM agent_cat_target_setting_mapping where agent_id = $id");
        $this->db->query("DELETE FROM agent_target_setting where agent_id = $id");
        return true;
    }

    public function getAgentByID($id){
        $this->db->select('*');
        $this->db->from('agents');
        $this->db->where('id', $id);
        
        return $this->db->get()->result();
    }
    
    public function getAgentIDByStoreID($store_id){
        
		$this->db->select('agent_id');
		$this->db->from('agents');
		$this->db->where('store_id', $store_id);
		$this->db->order_by("id","desc");
		return $this->db->get()->result();
    }

    public function getAgentTargetGridData($agent_id,$store_id,$columnName,$columnSortOrder,$rowperpage,$row){
        $this->db->select('*');
        $this->db->from('agent_target_setting');
        $this->db->where("agent_id",$agent_id);
        $this->db->where("store_id",$store_id);
        if($rowperpage != -1)  
        {  
            $this->db->limit($rowperpage, $row);  
        } 
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function  getCountAgentTargetGridData($agent_id,$store_id,$columnName,$columnSortOrder){
        $this->db->select('*');
        $this->db->from('agent_target_setting');
        $this->db->where("agent_id",$agent_id);
        $this->db->where("store_id",$store_id);
        
        return $this->db->get()->num_rows();;
    }

    public function AgentTargetinsert($insertData){
        $this->db->insert('agent_target_setting',$insertData);
        return true;
    }

    public function AgentExcelExport($store_id,$searchValue){
        $this->db->select('*');
        $this->db->from('agents');
        $this->db->where("store_id",$store_id);
        if($searchValue !='')
		{
            $this->db->where("(agent_name LIKE '%".$searchValue."%' OR agent_id LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
       
        $query = $this->db->get()->result_array();
        return $query; 
    }

}
?>