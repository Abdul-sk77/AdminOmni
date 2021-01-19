<?php 
class BannerModel extends CI_Model {
    public function getHomeBannersGridData($searchValue, $rowperpage, $row, $columnName,$columnSortOrder){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where("title !=",'NULL');
        if($searchValue !='')
		{
            $this->db->where("(title LIKE '%".$searchValue."%' )", NULL, FALSE);
        } 
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
    } 

    public function getCountOfHomeBannersGrid($searchValue){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where("title !=",'NULL');
        if($searchValue !='')
		{
            $this->db->where("(title LIKE '%".$searchValue."%' )", NULL, FALSE);
        } 
        return $this->db->get()->num_rows();;
    }
    
    public function addHomeBanner($data){
     $this->db->insert('feature_home_combine',$data);
        return true;
    }

    public function updateHomeBannerRecord($home_bann_id,$data){
        $this->db->where('id', $home_bann_id);
        $this->db->update('feature_home_combine', $data);
        return true;

    }
    public function getHomeBannerByID($id){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where('id', $id);
        return $this->db->get()->result();
    }
   
    public function deleteHomeBannner($id){
        $this->db->where('id', $id);
        $this->db->delete('feature_home_combine');
    }
    
  
    

}
?>