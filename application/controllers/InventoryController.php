<?php


class InventoryController extends  CI_Controller{
    public function index(){
        
        $this->load->view('backend/layout');
        $this->load->view('backend/header');
        $this->load->view('backend/pages/admin/inventory');  // category load
    }
}

