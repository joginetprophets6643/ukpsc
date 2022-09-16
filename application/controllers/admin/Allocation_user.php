<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_user extends MY_Controller {

    public function __construct() {

        parent::__construct();
        auth_check(); // check login auth
        $this->load->model('admin/admin_model', 'admin_model');
        $this->load->model('admin/location_model', 'location_model');
        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->model('admin/Allocation_Model', 'Allocation_Model');
        $this->load->helper('date');
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    /*Permanent Code Starts Here*/
    public function allocation_user_list() {
        // $this->rbac->check_operation_access();
        
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_index_user', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_list_data_user() {

    $admin_id = $this->session->userdata('admin_id'); 

    $data['info'] = $this->Allocation_Model->get_data_for_allocation_user();
    // print_r($data['info']); die();
    $this->load->view('admin/allocation/allocationn_list_user', $data);
    }    
    // public function allocation_send() {
    //     // $this->rbac->check_operation_access();
        
    //     $data['title'] = 'Allocation  List';
    //     $this->load->view('admin/includes/_header', $data);
    //     $this->load->view('admin/allocation/allocation_send_index', $data);
    //     $this->load->view('admin/includes/_footer', $data);
    // }

    // public function allocation_send_list_data() {

    //   $admin_id = $this->session->userdata('admin_id'); 
    //   // print_r($admin_id); die();
    // $data['info'] = $this->Allocation_Model->get_data_for_allocation();
    //     // die();
    //     $this->load->view('admin/allocation/allocation_send_list', $data);
    // }
	

}
