<?php 

class CategoryController extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
         $this->load->library('session');
        //  $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         $this->load->model('CategoryModel');
        //  $this->load->model('TargetSettingModel');
        if(empty($this->session->userdata('is_loggedIn')) && $this->session->userdata('is_loggedIn')  != 1){
            $this->session->set_flashdata('message','Please login and try again.');
            header("Location: ".base_url('/'));
            exit();
        }
    }

    public function category()
    {
        $data['category'] =  $this->CategoryModel->getActiveCategory();
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/category', $data);  // category load
        
    }

    public function subCategory()
    {
        $catData['categories'] = $this->CategoryModel->getActiveCategory();
        $catData['sub_categories'] = $this->CategoryModel->getActiveSubCategory();
        
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/sub-category', $catData);  // subcategory load
    }

    public function addCategory()
    {


        $db = \Config\Database::connect();
        $builder = $db->table('category');

        if ($this->request->getMethod() !== 'post') {
            return header("Location:" . base_url('/admin/category'));
        }

        $validated = $this->validate([
            'category' => ['required', 'is_unique[category.category_name,id,{category_id}]'],
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validated) {
            $time = date("d-m-Y") . "-" . time();
            $category_id = $this->input->post('category_id');
            $category_old_img = $this->input->post('category_old_img');
            $category_img = $this->request->getFile('category_img');
            $category_name = $this->input->post('category');
            $description = $this->input->post('description');
            $status = $this->input->post('status');

            if($this->request->getFile('category_img')->getClientName() != '') {
                $newFilename = "category_" . $time . "." . $category_img->getClientExtension();
                $category_img->move(FCPATH . 'public/uploads/category/', $newFilename);
            }else{
                $newFilename = $category_old_img;
            }
            $data = array(
                'category_name' => $category_name,
                'image' => $newFilename,
                'description' => $description,
                'attachment' => $newFilename,
                'status' => $status,
                'created_by' => 1
            );

            if (empty($category_id)) {
                $builder->insert($data);
                $output = array('status' => true, 'errors' => '', 'msg' => 'Successfully inserted.');
            } else {
                $builder->where(['id' => $category_id])->update($data);
                $output = array('status' => true, 'errors' => '', 'msg' => 'Successfully updated.');
            }
        } else {
            $output = array('status' => false, 'errors' => $this->validator->listErrors());
        }

        echo json_encode($output);
    }

    public function deleteCategory($id)
    {
        $builder = $this->db->table('category');
        $data = [
            'status' => 0,
        ];
        $builder->where('id', $id);
        $builder->update($data);
        $this->session->setFlashdata('delete_msg', "Successfully deleted!!");
        return $this->response->redirect(base_url('/admin/category'));
    }

    // get category

    public function getCategory($category_id)
    {
        $this->security = \Config\Services::security();
        $id = $category_id;
        $builder = $this->db->table('category');
        $categoryData = $builder->where(["id" => $id, 'status' => 1])->get()->getResult();
        echo json_encode(
            array(
                'status' => true,
                'data' => $categoryData,
                'csrfName' => $this->security->getCSRFTokenName(),
                'csrfHash' => $this->security->getCSRFHash()
            )
        );
    }

    // get sub category data
    public function getSubCategory($category_id)
    {
        $id = $category_id;
        $builder = $this->db->table('subcategory');
        $categoryData = $builder->where(["id" => $id, 'status' => 1])->get()->getResult();
        echo json_encode(
            array(
                'status' => true,
                'data' => $categoryData,
                'csrfName' => $this->security->getCSRFTokenName(),
                'csrfHash' => $this->security->getCSRFHash()
            )
        );
    }

    // add sub category
    public function addSubcategory()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subcategory');

        if ($this->request->getMethod() !== 'post') {
            return header("Location:" . base_url('/admin/category'));
        }

        $validated = $this->validate([
            'sub_category' => ['required','is_unique[subcategory.sub_category_name,id,{subcategory_id}]'],  // ,'is_unique[subcategory.sub_category_name,id,{id}]'
            'category' => 'required',
        ]);


        if ($validated) {
            $time = date("d-m-Y") . "-" . time();
            $sub_category_id = $this->input->post('subcategory_id');
            $sub_category_old_img = $this->input->post('sub_category_old_img');
            $sub_category_img = $this->request->getFile('sub_category_img');
            $category = $this->input->post('category');
            $sub_category = $this->input->post('sub_category');
            $status = $this->input->post('status');
            $description = $this->input->post('description');

//            $newFilename = '';
            if ($this->request->getFile('sub_category_img')->getClientName() != '') {
                $newFilename = "subcategory_" . $time . "." . $sub_category_img->getClientExtension();
                $sub_category_img->move(FCPATH . 'public/uploads/sub_category/', $newFilename);

            } else {
                $newFilename = $sub_category_old_img;
            }


            $data = array(
                'sub_category_name' => $sub_category,
                'category_id' => $category,
                'attachment' => $newFilename,
                'description' => $description,
                'status' => $status,
                'created_by' => 1
            );

            if (empty($sub_category_id)) {
                $builder->insert($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Successfully inserted.');
            } else {
                $builder->where(['id' => $sub_category_id])->update($data);
                $output = array('status'=>true,'errors'=>'','msg'=>'Successfully updated.');
            }

        } else {
            $output = array('status'=>false,'errors'=>$this->validator->listErrors());
        }
         echo json_encode($output);
    }

    // delete sub category

    public function deleteSubCategory($id)
    {
        $builder = $this->db->table('subcategory');
        $data = [
            'status' => 0,
        ];
        $builder->where('id', $id);
        $builder->update($data);
        $this->session->setFlashdata('delete_msg', "Successfully deleted!!");
        return $this->response->redirect(base_url('/admin/sub-category'));
    }

    public function getSubcategoryByCatID(){
        $category_id = $this->input->post('category_id');
        $subcategory = $this->CategoryModel->getSubCatByCatID($category_id);
        if(isset($subcategory) && count($subcategory) > 0){
                $html = "<option value=''>Please select subcatgory</option>";
            foreach ($subcategory as $scategory){
                $html .= "<option value='".$scategory->id."'>$scategory->sub_category_name</option>";
            }
        }else{
            $html = "<option value=''>No category found</option>";
        }

        echo json_encode(array('status'=>true,'data'=>$html));
    }
    public function setTargetcatMappingApp()
    {
        $this->form_validation->set_rules('Category_id', 'Category ID', 'required');
        $this->form_validation->set_rules('catSale', 'Category Sale', 'required');
        $this->form_validation->set_rules('CatUnitSold', 'Category Unit Sold', 'required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $target_setting_id = $this->input->post('target_setting_id');
            $sum_of_sale_value= $this->input->post('catSale');
            $sum_of_sold_value= $this->input->post('CatUnitSold');
            $total_sale= $this->input->post('totalSale');
            $total_sold_unit = $this->input->post('totalSold');
            $old_builder = $this->CategoryModel->getTargetSettingByID($target_setting_id);
            foreach($old_builder as $value)
            {
                $sum_of_sale_value += $value->category_sale_value;
                $sum_of_sold_value += $value->category_unit_sold;
            } 
            // print_r($sum_of_sale_value);
            // die;
            if( ( ($sum_of_sale_value > $total_sale) || ($sum_of_sold_value > $total_sold_unit)) || (($sum_of_sale_value>$total_sale) && ($sum_of_sold_value>$total_sold_unit)) ){
                if($sum_of_sale_value > $total_sale){
                    $output = array('status'=>false,'errors'=>"Total sale value limit for these target is exceeded, Please enter valid value.",'msg'=>"Total sale value limit for these target is exceeded, Please enter valid value.");
                }else if($sum_of_sold_value > $total_sold_unit){
                    $output = array('status'=>false,'errors'=>"Total sold unit limit for these target is exceeded, Please enter valid value.",'msg'=>"Total sold unit limit for these target is exceeded, Please enter valid value.");
                }else{
                    $output = array('status'=>false,'errors'=>"Total sale value and Total sold unit limit for these target is exceeded, Please enter valid value.",'msg'=>"Total sale value and Total sold unit limit for these target is exceeded, Please enter valid value.");
                }
            }else{
                $insertData = [
                    'store_manager_id' => $this->input->post('store_id'),
                    'target_setting_id' => $target_setting_id,
                    'category_id' => $this->input->post('Category_id'),
                    'category_value' => $this->input->post('Category_value'),
                    'category_sale_value' => $this->input->post('catSale'),
                    'category_unit_sold' => $this->input->post('CatUnitSold'),
                    'user_id' => $this->session->userdata("user_id"),
                    'created_by' =>  $this->session->userdata('fullname'),
                ];
               
                $this->CategoryModel->addTargetCategorySetting($insertData);
                
                $output = array('status'=>true,'errors'=>'','msg'=>'Category set for target sucessfully.');
            }
        }  
        
        echo json_encode($output);
        exit();
    }
    public function getSetTargetcatMappingData(){
        $id =@$_POST['target_id'];
        $draw = @$_POST['draw'];
        $row = @$_POST['start'];
        $rowperpage = @$_POST['length']; // Rows display per page
        $columnIndex = @$_POST['order'][0]['column']; // Column index
        $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
        $searchValue = @$_POST['search']['value']; // Search value
        $targetCatData['set_target_cat'] = $this->CategoryModel->getTargetCatMappingGridData($id,$row,$rowperpage,$columnName,$columnSortOrder,$searchValue);
        
        $data = array();
        $totalRecord =0;
        foreach($targetCatData['set_target_cat'] as $value)
        {
        
            $data[] = $value;
        }
        $totalRecord = $this->CategoryModel->getCountTargetCatMappingGrid($id);
        
        $response = array(
            "draw" =>intval($draw),
            "iTotalRecords" => $totalRecord ,
            "iTotalDisplayRecords" => $totalRecord,
            "aaData" => $data
        );
        echo json_encode($response);

    }
    public function SetTargetcatMappingDelete(){
         
        $id =@$_POST['id'];
        $this->CategoryModel->deleteTargetCatMApping($id);
		echo json_encode(array('status'=>'true','message'=>'Deleted successfully!'));
    }
    public function setAgentTargetcatMappingApp()
    {
        
        $this->form_validation->set_rules('Category_id', 'Category ID', 'required');
        $this->form_validation->set_rules('catSale', 'Category Sale', 'required');
        $this->form_validation->set_rules('CatUnitSold', 'Category Unit Sold', 'required');
        if($this->form_validation->run() == FALSE){
            $output = array('status'=>false,'errors'=>validation_errors(),'msg'=>"");
        }else {
            $target_setting_id = $this->input->post('target_setting_id');
            $store_id = $this->input->post('store_id');
            $agent_id = $this->input->post('agent_id');
            $sum_of_sale_value= $this->input->post('catSale');
            $sum_of_sold_value= $this->input->post('CatUnitSold');
            $total_sale= $this->input->post('totalSale');
            $total_sold_unit = $this->input->post('totalSold');
            $old_builder = $this->CategoryModel->getAgentTargetSettingByID($target_setting_id,$store_id,$agent_id);
            foreach($old_builder as $value)
            {
                $sum_of_sale_value += $value->category_sale_value;
                $sum_of_sold_value += $value->category_unit_sold;
            } 
            if( ( ($sum_of_sale_value > $total_sale) || ($sum_of_sold_value > $total_sold_unit)) || (($sum_of_sale_value>$total_sale) && ($sum_of_sold_value>$total_sold_unit)) ){
                if($sum_of_sale_value > $total_sale){
                    $output = array('status'=>false,'errors'=>"Total sale value limit for these target is exceeded, Plese enter valid value.",'msg'=>"Total sale value limit for these target is exceeded, Plese enter valid value.");
                }else if($sum_of_sold_value > $total_sold_unit){
                    $output = array('status'=>false,'errors'=>"Total sold unit limit for these target is exceeded, Plese enter valid value.",'msg'=>"Total sold unit limit for these target is exceeded, Plese enter valid value.");
                }else{
                    $output = array('status'=>false,'errors'=>"Total sale value and Total sold unit limit for these target is exceeded, Plese enter valid value.",'msg'=>"Total sale value and Total sold unit limit for these target is exceeded, Plese enter valid value.");
                }
            }else{
                $insertData = [
                    'store_id' => $this->input->post('store_id'),
                    'agent_id' => $this->input->post('agent_id'),
                    'target_setting_id' => $target_setting_id,
                    'category_id' => $this->input->post('Category_id'),
                    'category_value' => $this->input->post('Category_value'),
                    'category_sale_value' => $this->input->post('catSale'),
                    'category_unit_sold' => $this->input->post('CatUnitSold'),
                    'user_id' => $this->session->userdata("user_id"),
                    'created_by' =>  $this->session->userdata('fullname'),
                ];
                $this->CategoryModel->addAgentTargetCategorySetting($insertData);
                $output = array('status'=>true,'errors'=>'','msg'=>'Category set for target sucessfully.');
            }
          
        }
        echo json_encode($output);
    }
    public function getAgentSetTargetcatMappingData(){
        $id =@$_POST['target_id'];
        $agent_id =@$_POST['agent_id'];
        $draw = @$_POST['draw'];
        $row = @$_POST['start'];
        $rowperpage = @$_POST['length']; // Rows display per page
        $columnIndex = @$_POST['order'][0]['column']; // Column index
        $columnName = @$_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = @$_POST['order'][0]['dir']; // asc or desc
        $searchValue = @$_POST['search']['value']; // Search value
        
        $targetCatData['set_target_cat'] = $this->CategoryModel->getAgentTargetCategorySetting($id,$agent_id,$rowperpage, $row,$columnName,$columnSortOrder);
        $data = array();
        foreach($targetCatData['set_target_cat'] as $value)
        {
            $data[] = $value;
        }
        
        $totalRecord = $this->CategoryModel->getCountAgentTargetCategorySetting($id,$agent_id);
        $response = array(
            "draw" =>intval($draw),
            "iTotalRecords" => $totalRecord ,
            "iTotalDisplayRecords" => $totalRecord,
            "aaData" => $data
        );
        echo json_encode($response);

    }
    public function agentSetTargetcatMappingDelete(){
        $id =@$_POST['id'];
        $this->db->query("DELETE FROM agent_cat_target_setting_mapping where id = $id");
		echo json_encode(array('status'=>'true','message'=>'Deleted successfully!'));
    }

}
