<?php 
class FeaturedCategoryModel extends CI_Model {
    public function getFeaturedGridData($searchValue,$rowperpage,$row,$columnName,$columnSortOrder){
        
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where("title",'NULL');
        if($searchValue !='')
		{
            $this->db->where("(feature_category_name LIKE '%".$searchValue."%' OR description LIKE '%".$searchValue."%'  OR product_category_name LIKE '%".$searchValue."%'  OR product_sub_category_name LIKE '%".$searchValue."%'  OR product_line_name LIKE '%".$searchValue."%' )", NULL, FALSE);
        } 
        if($rowperpage != -1)  
			{  
				$this->db->limit($rowperpage, $row);  
			}  
        $this->db->order_by($columnName,$columnSortOrder);
        $query = $this->db->get()->result_array();
        return $query;
     
    } 

    public function getCountFeaturedGrid($searchValue){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where("title",'NULL');
        if($searchValue !='')
		{
            $this->db->where("(feature_category_name LIKE '%".$searchValue."%' OR description LIKE '%".$searchValue."%'  OR product_category_name LIKE '%".$searchValue."%'  OR product_sub_category_name LIKE '%".$searchValue."%'  OR product_line_name LIKE '%".$searchValue."%' )", NULL, FALSE);
        } 
        return $this->db->get()->num_rows();;
    }
    
    public function addFeaturedCategory($data){
     $this->db->insert('feature_home_combine',$data);
        return true;
    }

    public function updateFeaturedCategory($featured_category_id,$data){
        $this->db->where('id', $featured_category_id);
        $this->db->update('feature_home_combine', $data);
        return true;

    }

    public function deleteFeaturedCat($id){
        $this->db->where('id', $id);
        $this->db->delete('feature_home_combine');
    }
    

    public function getFeaturedCategoryByID($id){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where('id', $id);
        
        return $this->db->get()->result();
    }

    public function FeaturedExcelExport($searchValue){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where("title",'NULL');
        if($searchValue !='')
		{
            $this->db->where("(feature_category_name LIKE '%".$searchValue."%' OR description LIKE '%".$searchValue."%'  OR product_category_name LIKE '%".$searchValue."%'  OR product_sub_category_name LIKE '%".$searchValue."%'  OR product_line_name LIKE '%".$searchValue."%' )", NULL, FALSE);
        } 
		
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function HomeBannerExcelExport($searchValue){
        $this->db->select('*');
        $this->db->from('feature_home_combine');
        $this->db->where("title !=",'NULL');
        if($searchValue !='')
		{
            $this->db->where("(title LIKE '%".$searchValue."%')", NULL, FALSE);
        } 
		
        $query = $this->db->get()->result_array();
        return $query;
    }
    

}
?>