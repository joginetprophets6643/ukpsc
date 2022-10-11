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
    $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
    $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
    $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
    $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0   ]['candidates']) : [];
    $data['exam_id_new'] = $id;
    $this->load->view('admin/allocation/allocation_list', $data);
    }  
    public function allocation_list_datacopy($id) {
        $state_name = '';
        $city_name = '';
        $grade_name = '';
    
        // $records['data'] = $this->Allocation_Model->get_all_registration_data($state_name, $city_name, $grade_name);
        $records1['info'] = $this->Allocation_Model->get_data_for_allocation($id);
        $date_exam = isset($records1['info'][0]['date_exam']) ? explode(",",$records1['info'][0]['date_exam']) : [];
        $shft_exam = isset($records1['info'][0]['shft_exam']) ? explode(",",$records1['info'][0]['shft_exam']) : [];
        $no_candidate = isset($records1['info'][0]['no_candidate']) ? explode(",",$records1['info'][0]['no_candidate']) : [];
        $data = [];
        $i = 1;
        foreach ($records1['info'] as $row) {
               $getCenterCode = getCenterCode( $row['school_id'],$row['id']);
               $getCenterCode =isset($getCenterCode)?$getCenterCode:'';
               $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']);

                $row['school_name'] = ''.$row['school_name'].'<input  type="text" id="school_id_new'.$i.'" name="school_id_new'.$i.'" value="'.$row['school_id'].'">';
                $row['exam_center_code'] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="exam_center_code'.$i.'" name="exam_center_code" value="'.$getCenterCode.'">';
                $row['button']='<button class="btn btn-success" onclick="formdataSubmit('.$i.')"> Submit</button>';
                $row['candidateassign']   = [];
               foreach ($no_candidate as $key => $value) { 
                $candiValue = isset($candidateNo[$key])?$candidateNo[$key]:'';
                    $row['candidateassign'][] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="candidate_value_school_id_new'.$i.$key.'" value="'.$candiValue.'">';
                  }
                $data[] = [
                    ++$i,
              
                    '<input   type="text" id="candidate_value_count'.$i.'" value="'.count($no_candidate).'"><input  type="text" id="admin_id'.$i.'" name="admin_id" value="'.$row['admin_id'].'"><input type="text" id="exam_id" name="exam_id" value="'.$row['id'].'">',
                    $row['school_name']? $row['school_name'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $row['exam_center_code']? $row['exam_center_code'] : '',
                    $row['candidateassign']? $row['candidateassign'] : '',
                    $row['button']? $row['button'] : '',
                   
                 
                    
                   
                ];
            
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
    }  
    public function allocation_list_datacopy1() {
       
        $district = isset($_GET['state_id'])? $_GET['state_id']:0;
        $exam_id = isset($_GET['exam_id'])? $_GET['exam_id']:0;
        $city_name = isset($_GET['city_name'])? $_GET['city_name']:0;
        $grade_name = isset($_GET['grade_name'])? $_GET['grade_name']:0;
        // $records['data'] = $this->Allocation_Model->get_all_registration_data($state_name, $city_name, $grade_name,$id);
        $records1['info'] = $this->Allocation_Model->get_data_for_allocationforFilters($exam_id,5236);
        // print_r($records1['info']);
        // die();
        $date_exam = isset($records1['info'][0]['date_exam']) ? explode(",",$records1['info'][0]['date_exam']) : [];
        $shft_exam = isset($records1['info'][0]['shft_exam']) ? explode(",",$records1['info'][0]['shft_exam']) : [];
        $no_candidate = isset($records1['info'][0]['no_candidate']) ? explode(",",$records1['info'][0]['no_candidate']) : [];
        $data = [];
        $i = 1;
        foreach ($records1['info'] as $row) {
               $getCenterCode = getCenterCode( $row['school_id'],$row['id']);
               $getCenterCode =isset($getCenterCode)?$getCenterCode:'';
               $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']);

                $row['school_name'] = ''.$row['school_name'].'<input  type="text" id="school_id_new'.$i.'" name="school_id_new'.$i.'" value="'.$row['school_id'].'">';
                $row['exam_center_code'] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="exam_center_code'.$i.'" name="exam_center_code" value="'.$getCenterCode.'">';
                $row['button']='<button class="btn btn-success" onclick="formdataSubmit('.$i.')"> Submit</button>';
                $row['candidateassign']   = [];
               foreach ($no_candidate as $key => $value) { 
                $candiValue = isset($candidateNo[$key])?$candidateNo[$key]:'';
                    $row['candidateassign'][] = '<input type="text" onkeypress="return onlyNumberKey(event)" id="candidate_value_school_id_new'.$i.$key.'" value="'.$candiValue.'">';
                  }
                $data[] = [
                    ++$i,
              
                    '<input   type="text" id="candidate_value_count'.$i.'" value="'.count($no_candidate).'"><input  type="text" id="admin_id'.$i.'" name="admin_id" value="'.$row['admin_id'].'"><input type="text" id="exam_id" name="exam_id" value="'.$row['id'].'">',
                    $row['school_name']? $row['school_name'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $row['exam_center_code']? $row['exam_center_code'] : '',
                    $row['candidateassign']? $row['candidateassign'] : '',
                    $row['button']? $row['button'] : '',
                   
                 
                    
                   
                ];
            
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
    }  


    // / End Login Jogi.. i will work later...
    public function newChanges() {
        $exam_id = $_GET['exam_id'];
        $id = empty($_GET['state_id'])?'':$_GET['state_id'];
        $state_name = $id!==''?get_district_name($id):''; 
        $district_id = empty($_GET['district_id'])?'':$_GET['district_id'];
        $city_name = $district_id!==''?get_subcity_name($district_id):'';
        $grade_name = empty($_GET['grade_id'])?'':$_GET['grade_id'];
        $data['info'] = $this->Allocation_Model->get_data_for_allocationforFilters($exam_id,$state_name, $city_name, $grade_name);
        $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
        $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
        $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
        $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0]['candidates']) : [];
        $data['exam_id_new'] = $exam_id;
        $this->load->view('admin/allocation/allocation_list', $data);
    }


    public function allocation_send_list_data() {

      $admin_id = $this->session->userdata('admin_id'); 

    $data['info'] = $this->Allocation_Model->get_data_for_allocation_update();
    //   print_r($data['info']); die();
        $this->load->view('admin/allocation/allocation_send_list', $data);
    }
     public function save() {
        $data =[
            'school_id'=>isset($_GET['school_id'])?$_GET['school_id']:0,
            'exam_id'=> isset($_GET['exam_id'])?$_GET['exam_id']:0,
            'exam_center_code'=>isset($_GET['exam_center_code'])?$_GET['exam_center_code']:0,
            'admin_id'=>isset($_GET['admin_id'])?$_GET['admin_id']:0,
            'candidate_array'=>isset($_GET['candidate_array'])?implode(",",$_GET['candidate_array']): "",
            'status'=>1
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


    public function allocationTest() {
        
        $examid = $this->uri->segment(4);
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Invitation and Schedule List';
        $data['exam_id'] = urldecrypt($examid);
        $this->db->from('ci_exam_invitation');
        $this->db->where('ci_exam_invitation.id',$data['exam_id']);
        $query = $this->db->get();
        $examName = $query->row_array();
        $data['examName'] = $examName['subjectline'];
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/exam/invt_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

      // Some changes in methods
      public function allocation_send() {
        $data['title'] = 'Exam Allocation List';
        $data['data'] = $this->Allocation_Model->get_all_recived_invites();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/examListForAllocationForSend', $data);
        $this->load->view('admin/includes/_footer', $data);
    }
    public function allocation_send_to_user($id)
    {
        $data['id'] = urldecrypt($id);
        $data['states'] = $this->location_model->get_states();
        $data['title'] = 'Allocation  List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/allocation/allocation_send_to_user_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    public function allocation_list_data_send_to_user_list($id) {
        $admin_id = $this->session->userdata('admin_id'); 
        $data['info'] = $this->Allocation_Model->get_data_for_allocation($id);
        $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
        $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
        $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
        $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0   ]['candidates']) : [];
        $data['hideselectbutton'] = 'ok';
        $this->load->view('admin/allocation/allocation_list_send_to_user', $data);
        }  


        public function send_allocation_to_user() {

            if(isset($_GET['exam_id']) && isset($_GET['school_ids'])){
                    $school_ids = $_GET['school_ids'];
                    $exam_id = $_GET['exam_id'];
                    $check = $this->Allocation_Model->sendAllocationForUser($school_ids,$exam_id);

            }
        }

        public function allocationDatatoUserOnChange() {
            $exam_id = $_GET['exam_id'];
            $id = empty($_GET['state_id'])?'':$_GET['state_id'];
            $state_name = $id!==''?get_district_name($id):''; 
            $district_id = empty($_GET['district_id'])?'':$_GET['district_id'];
            $city_name = $district_id!==''?get_subcity_name($district_id):'';
            $grade_name = empty($_GET['grade_id'])?'':$_GET['grade_id'];
            $data['info'] = $this->Allocation_Model->get_data_for_allocationforFilters($exam_id,$state_name, $city_name, $grade_name);
            $data['date_exam'] = isset($data['info'][0]['date_exam']) ? explode(",",$data['info'][0]['date_exam']) : [];
            $data['shft_exam'] = isset($data['info'][0]['shft_exam']) ? explode(",",$data['info'][0]['shft_exam']) : [];
            $data['no_candidate'] = isset($data['info'][0]['no_candidate']) ? explode(",",$data['info'][0]['no_candidate']) : [];
            $data['candidates'] = isset($data['info'][0]['candidates']) ? explode(",",$data['info'][0]['candidates']) : [];
            $data['exam_id_new'] = $exam_id;
            $data['hideselectbutton'] = 'notok';
            // $this->load->view('admin/allocation/allocation_list', $data);
            $this->load->view('admin/allocation/allocation_list_send_to_user', $data);
        }

        public function allocation_master() {
            // echo 'here';
            $data['title'] = 'Exam List for Allocation Master';
            $data['data'] = $this->Allocation_Model->get_all_recived_invites();
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/allocation/allocationMasterForExamList', $data);
            $this->load->view('admin/includes/_footer', $data);
        }

        public function school_list_exam_for_allocation($exam_id){
            $exam_id = urldecrypt($exam_id);
     
            $data['info'] = $this->Allocation_Model->getSchoolListForAllocationExam($exam_id);
            //  print_r($data); die();
             foreach ($data['info'] as $key => $d) {
                 $data[$key]['exam_date_new'] = explode(",",$d['exam_date']);
                 $data[$key]['exam_shift_new'] = explode(",",$d['exam_shift']);
                 $data[$key]['present_candidate_new'] = explode(",",$d['present_candidate']);
                 $data[$key]['absent_candidate_new'] = explode(",",$d['absent_candidate']);
                //  $data[$key]['centerCode'] = getCenterCode( $d['school_id'],$exam_id); 
                //  $data[$key]['examination_center_name'] = getCenterCode( $d['school_id']); 
             }
             $data['title'] = 'Allocation Matser List';
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/allocation/markAttendanceListForExamination', $data);
            $this->load->view('admin/includes/_footer', $data);
            // print_r($data); die();

        }
    
}
