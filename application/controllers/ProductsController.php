<?php

class ProductsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
         $this->load->library('session');
        //  $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->model('ProductsModel');
         $this->load->model('CategoryModel');
        if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
            $this->session->set_flashdata('message','Please login and try again.');
            header("Location: ".base_url('/'));
            exit();
        }

    }

    public function products()
    {
        // $builder = $this->db->table('category')->where(["status"=>1])->get()->getResult();
        // $viewData['categories'] = $builder;
        // $products =new ProductsModel();
        // $viewData['products'] = $products->select("product_catalogue.*,category.category_name,subcategory.sub_category_name,productline.productline")
        //                 ->join("category", 'category.id = product_catalogue.product_category_id','inner')
        //                 ->join("subcategory", 'subcategory.id = product_catalogue.product_sub_category_id','left')
        //                 ->join("productline", 'productline.id = product_catalogue.product_line_id','left')
        //                 ->get()->getResult();

        
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/products');  // category load
    }

    public function productLine()
    {
        $viewData['categories'] =  $this->CategoryModel->getActiveCategory();
        $viewData['subcategory'] = $this->CategoryModel->getActiveSubCategory();
        $viewData['productlines'] =  $this->CategoryModel->getproductline();
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/productline',$viewData);  // subcategory load
        
    }
    public function updateMRP(){
        $viewData['products']= $this->ProductsModel->getProductCatalogue();
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/update-mrp', $viewData);
    }

    public function catalogueUpload(){
        $viewData['categories'] = $this->CategoryModel->getActiveCategory();
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/catelogue-upload',$viewData);
    }

    public function addProductLine(){
        $db      = \Config\Database::connect();
        $builder = $db->table('productline');

        if ($this->request->getMethod() !== 'post') {
            return header("Location:".base_url('admin/product-line'));
        }

        $validated = $this->validate([
            'product_line' => ['required'],
            'category' => 'required',
            'sub_category' => 'required'
        ]);


        if($validated) {

            $time = date("d-m-Y")."-".time() ;
            $productline_id = $this->input->post('productline_id');
            $productline_old_img = $this->input->post('productline_old_img');
            $product_line_img = $this->request->getFile('productline_img');
            $category = $this->input->post('category');
            $sub_category = $this->input->post('sub_category');
            $product_line = $this->input->post('product_line');
            $description = $this->input->post('description');
            $status = $this->input->post('status');
            if($this->request->getFile('productline_img')->getClientName() != '') {
                $newFilename = "productline_" . $time . "." . $product_line_img->getClientExtension();
                $product_line_img->move(FCPATH . 'public/uploads/productline/', $newFilename);
            }else{
                $newFilename = $productline_old_img;
            }
            $data  = array(
                'productline' => $product_line,
                'category_id' => $category,
                'sub_category_id' => $sub_category,
                'attachment' => $newFilename,
                'description' => $description,
                'status' => $status,
                'created_by' => 1
            );

            if(empty($productline_id)){
                $builder->insert($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Successfully inserted.');
            }else{
                $builder->where(['id'=>$productline_id])->update($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Successfully updated.');
            }
        }else{
           $output = array('status'=>false,'errors'=>$this->validator->listErrors());
        }


        echo json_encode($output);
    }


    public function deleteProductline($id){
        $builder = $this->db->table('productline');
        $data = [
            'status' => 0,
        ];
        $builder->where('id', $id);
        $builder->update($data);
        $this->session->setFlashdata('delete_msg', "Successfully deleted!!");
        return $this->response->redirect(base_url('/admin/product-line'));
    }

    // get productline

    public function getProductline($productline_id){
        $this->security = \Config\Services::security();
        $id = $productline_id;
        $builder = $this->db->table('productline');
        $productlineData = $builder->where(["id"=>$id])->get()->getResult();
        echo json_encode(
            array(
                'status'=>true,
                'data'=>$productlineData,
                'csrfName' => $this->security->getCSRFTokenName(),
                'csrfHash' => $this->security->getCSRFHash()
            )
        );
    }

    // get productline by category and sub category

    public function getProductlines(){
        $category_id = $this->input->post("category_id");
        $subcat_id = $this->input->post("subcat_id");
        $productlineData = $this->ProductsModel->getProductLinesByCatSubCat($category_id,$subcat_id);
        if(isset($productlineData) && count($productlineData) > 0){
            $html = "<option value=''>Please select subcatgory</option>";
            foreach ($productlineData as $productline){
                $html .= "<option value='".$productline->id."'>$productline->productline</option>";
            }
        }else{
            $html = "<option value=''>No category found</option>";
        }

        echo json_encode(array('status'=>true,'data'=>$html));
    }


    public function addProductCatelogue(){
        //        print_r($_POST);

        $builder = $this->db->table("product_catalogue");
        $validator = $this->validate([
            "product_category"=>["required"],
            "product_name" => ["required"],
            "product_qty" => ["required"],
            "product_mrp" => ["required"],
            "product_sku" => ["required","is_unique[product_catalogue.product_sku]"],
            "product_web_mrp" => ["required"],
            "status" => ["required"],
            "product_code" => ["required","is_unique[product_catalogue.product_code]"],
            "brand_name" => ["required"],
            "size" => ["required"],
            "color" => ["required"],
            "brand_description" => ["required"]
        ]);

        if($validator){
           $data = array(
                'product_category_id' => $this->input->post("product_category"),
                'product_sub_category_id' => $this->input->post("product_sub_category"),
                'product_line_id' => $this->input->post("product_line"),
                'product_name' => $this->input->post("product_name"),
                'product_qty' => $this->input->post("product_qty"),
                'product_mrp' => $this->input->post("product_mrp"),
                'product_sku' => $this->input->post("product_sku"),
                'product_web_mrp' => $this->input->post("product_web_mrp"),
                'product_code' => $this->input->post("product_code"),
                'size' => $this->input->post("size"),
                'color' => $this->input->post("color"),
                'status' => $this->input->post("status"),
                'brand_name' => $this->input->post("brand_name"),
                'brand_description' => $this->input->post("brand_description"),
                'create_by' => 1
           );

           $builder->insert($data);
           $this->session->setFlashdata("success","<div class='alert alert-success'>Successfully added product catalogue.</div>");
           return redirect()->to(base_url()."/admin/catalogue-upload");
        }else{
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        exit();
    }

    public function getProduct($product_id){
        $this->security = \Config\Services::security();
        $product_id = $product_id;
        $product_data =new ProductsModel();
        $products = $product_data->select("product_catalogue.*,category.category_name,productline.productline,subcategory.sub_category_name")->where(["product_catalogue.id"=>$product_id])->join("category","category.id = product_catalogue.product_category_id","inner")->join("subcategory","subcategory.id = product_catalogue.product_sub_category_id","left")->join("productline","productline.id = product_catalogue.product_line_id","left")->first();
        echo json_encode(
            array(
                'status'=>true,
                'data'=>$products,
                'csrfName' => $this->security->getCSRFTokenName(),
                'csrfHash' => $this->security->getCSRFHash()
            )
        );
    }
    public function updateProduct(){
        $builder = $this->db->table('product_catalogue');

        $validator = $this->validate([
            "product_category"=>[
                "required"
            ],
            "product_name" => [
                "required"
            ],
            "product_qty" => [
                "required"
            ],
            "product_mrp" => [
                "required"
            ],
            "product_sku" => [
                "required","is_unique[product_catalogue.product_sku,id,{product_id}]"
            ],
            "discount_price" => [
                "required"
            ],
            "status" => [
                "required"
            ],
            "product_code" => [
                "required","is_unique[product_catalogue.product_code,id,{product_id}]"
            ],
            "brand_name" => [
                "required"
            ],
            "size" => [
                "required"
            ],
            "color" => [
                "required"
            ],
            "brand_description" => [
                "required"
            ]
        ],[
            "product_category"=>[
                'required' => "Product category field is required"
            ],
            "product_name" => [
                'required' => "Product name field is required"
            ],
            "product_qty" => [
                'required' => "Product qty field is required"
            ],
            "product_mrp" => [
                'required' => "Product mrp field is required"
            ],
            "product_sku" => [
                'required' => "Product sku field is required",
                "is_unique" => "Product sku should be unique."
            ],
            "discount_price" => [
                'required' => "Product discount field is required"
            ],
            "status" => [
                'required' => "Product status field is required"
            ],
            "product_code" => [
                'required' => "Product code field is required",
                "is_unique" => "Prodcut code should be unique."
            ],
            "brand_name" => [
                'required' => "Product brand name field is required"
            ],
            "size" => [
                'required' => "Product size field is required"
            ],
            "color" => [
                'required' => "Product color field is required"
            ],
            "brand_description" => [
                'required' => "Product brand description field is required"
            ]
        ]);

        if($validator){
            $product_id = $this->input->post('product_id');
            $data = array(
                'product_category_id' => $this->input->post("product_category"),
                'product_sub_category_id' => $this->input->post("product_sub_category"),
                'product_line_id' => $this->input->post("product_line"),
                'product_name' => $this->input->post("product_name"),
                'product_qty' => $this->input->post("product_qty"),
                'product_mrp' => $this->input->post("product_mrp"),
                'product_sku' => $this->input->post("product_sku"),
                'product_web_mrp' => $this->input->post("discount_price"),
                'product_code' => $this->input->post("product_code"),
                'size' => $this->input->post("size"),
                'color' => $this->input->post("color"),
                'status' => $this->input->post("status"),
                'brand_name' => $this->input->post("brand_name"),
                'brand_description' => $this->input->post("brand_description"),
                'updated_by' => 1
            );

            $builder->where(['id'=>$product_id])->update($data);
            $output = array('status'=>true,'msg'=>'succesfully updated!!');

        }else{
            $output = array('status'=>false,'msg'=>$this->validator->listErrors());
        }
        echo json_encode($output);
        exit();
    }

    public function updatePrice(){

        $productModel =$this->db->table("product_catalogue");
        $product_id = $this->input->post('product_id');
        $data = array(
            'product_mrp' => $this->input->post('product_mrp'),
            'product_web_mrp' => $this->input->post('product_web_mrp'),
        );
        if($productModel->where(["id",$product_id])->update($data)){
            $output = array("status"=>true,'msg'=>"Successfully updated!!");
        }else{
            $output = array("status"=>false,'msg'=>"Something went wrong.");
        }
        echo json_encode($output);
    }
}
