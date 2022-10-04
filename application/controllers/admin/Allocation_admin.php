<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_admin extends MY_Controller {

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
    public function allocation_list($id) {
        // $this->rbac->check_operation_access();
        $data['id'] = urldecrypt($id);
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_list_data($id) {
 
    $admin_id = $this->session->userdata('admin_id'); 
 
    $data['info'] = $this->Allocation_Model->get_data_for_allocation($id);
    // print_r($data); die();
    $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
    $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
    $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
    $dataAllocate['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0   ]['candidates']) : [];
    $this->load->view('admin/allocation/allocation_list', $data);
    }    
    public function allocation_send() {
        // $this->rbac->check_operation_access();
        
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_send_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_send_list_data() {

      $admin_id = $this->session->userdata('admin_id'); 

    $data['info'] = $this->Allocation_Model->get_data_for_allocation();
    //   print_r($data['info']); die();
        $this->load->view('admin/allocation/allocation_send_list', $data);
    }
     public function save() {
        $data =[
            'school_id'=>isset($_GET['school_id'])?$_GET['school_id']:0,
            'exam_id'=> isset($_GET['exam_id'])?$_GET['exam_id']:0,
            'exam_center_code'=>isset($_GET['exam_center_code'])?$_GET['exam_center_code']:0,
            'admin_id'=>isset($_GET['admin_id'])?$_GET['admin_id']:0,
            'candidate_array'=>isset($_GET['candidate_array'])?implode(",",$_GET['candidate_array']): ""
        ];
        $check = $this->Allocation_Model->insertForAllocation($data);
        echo $check;
        die();

    }
	public function examList() {

        $data['title'] = 'Exam List for Allocation';
        $data['data'] = $this->Allocation_Model->get_all_recived_invites();
        $this->load->view('admin/includes/_header', $data);
    
        $this->load->view('admin/allocation/examListForAllocation', $data);
    
        $this->load->view('admin/includes/_footer', $data);
    }
    
    public function get_all_recived_invites(){
    
        $admin_id = $this->session->userdata('admin_id');
        $this->db->from('ci_exam_invitation');
        $this->db->where('invt_recieved','1');
        $this->db->where('created_by',$admin_id);
        $this->db->order_by('id','desc');
        $q = $this->db->get()->result_array();
        return $q;
    }

}
