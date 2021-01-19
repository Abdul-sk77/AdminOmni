<?php 
class CategoryModel extends CI_Model {
    public function getTargetCatMappingGridData($id,$row,$rowperpage,$columnName,$columnSortOrder,$searchValue){
        
        $this->db->select('*');
        $this->db->from('target_setting_category_mapping');
        $this->db->where("target_setting_id",$id);
       
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getCountTargetCatMappingGrid($id){
        $this->db->select('*');
        $this->db->from('target_setting_category_mapping');
        $this->db->where("target_setting_id",$id);
        return $this->db->get()->num_rows();
    }
    
    public function getTargetSettingByID($target_setting_id){
        $this->db->select('*');
        $this->db->from('target_setting_category_mapping');
        $this->db->where("target_setting_id",$target_setting_id);
        return $this->db->get()->result();
    }

   

    public function addTargetCategorySetting($insertData){
        $this->db->insert('target_setting_category_mapping',$insertData);
        return true;
    }

    public function deleteTargetCatMApping($id){
        $this->db->where('id', $id);
        $this->db->delete('target_setting_category_mapping');
    } 

    public function getActiveCategory(){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where("status",1);
        return $this->db->get()->result();
    }

    public function getActiveSubCategory(){
        $this->db->select('*');
        $this->db->from('subcategory');
        $this->db->where("status",1);
        return $this->db->get()->result();
    }
    public function getproductline(){
        $this->db->select('*');
        $this->db->from('productline');
        $this->db->where("status",1);
        return $this->db->get()->result();
    }
    public function getSubCatByCatID($category_id){
        $this->db->select('id,sub_category_name');
        $this->db->from('subcategory');
        $this->db->where(["category_id"=>$category_id,'status'=>1]);
        return $this->db->get()->result();
    }
    public function getAgentTargetSettingByID($target_setting_id,$store_id,$agent_id){
        $this->db->select('*');
        $this->db->from('agent_cat_target_setting_mapping');
        $this->db->where("target_setting_id",$target_setting_id);
        $this->db->where("store_id",$store_id);
        $this->db->where("agent_id",$agent_id);
        return $this->db->get()->result();
    }

    public function addAgentTargetCategorySetting($insertData)
    {
        $this->db->insert('agent_cat_target_setting_mapping',$insertData);
        return true;
    }
       
    public function getAgentTargetCategorySetting($id,$agent_id,$rowperpage, $row,$columnName,$columnSortOrder){
        $this->db->select("*");
        $this->db->from("agent_cat_target_setting_mapping");
        $this->db->where("target_setting_id",$id);
        $this->db->where("agent_id",$agent_id);
        if($rowperpage != -1)  
            {  
                $this->db->limit($rowperpage, $row);  
            }  
        $this->db->order_by($columnName,$columnSortOrder);
        return $this->db->get()->result();
    }
    
    public function getCountAgentTargetCategorySetting($id,$agent_id){
        $this->db->select("*");
        $this->db->from("agent_cat_target_setting_mapping");
        $this->db->where("target_setting_id",$id);
        $this->db->where("agent_id",$agent_id);
       
        return $this->db->get()->num_rows();

    }

    public function deleteAgentTargetCat($id){
        $this->db->where('id', $id);
        $this->db->delete('agent_cat_target_setting_mapping');
    }
    




}
?>