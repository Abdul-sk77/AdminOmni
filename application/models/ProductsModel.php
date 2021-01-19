<?php

class ProductsModel extends CI_Model{
    protected $table = "product_catalogue";
    protected $allowedFields = ['product_category_id','product_sub_category_id','product_line_id','product_name','product_qty','product_mrp','product_sku','product_web_mrp','product_code','create_by','updated_by'];
    protected $primaryKey = 'id';

    public function getProductLinesByCatSubCat($category_id,$subcat_id){
        $this->db->select('*');
        $this->db->from('productline');
        $this->db->where(["status"=>1,"category_id"=>$category_id,"sub_category_id" => $subcat_id]);
        return $this->db->get()->result();
    }
       
    public function getProductCatalogue(){
        $this->db->select('*');
        $this->db->from('productline');
        // $this->db->where("status",1);
        return $this->db->get()->result();
    }
}