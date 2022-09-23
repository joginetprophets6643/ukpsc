<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Examshedule_schedule extends MY_Controller {

    public function __construct() {



        parent::__construct();

        auth_check(); // check login auth

        $this->load->model('admin/admin_model', 'admin_model');

        $this->load->model('admin/location_model', 'location_model');

        $this->load->model('admin/Exam_model', 'Exam_model');

        $this->load->model('admin/Master_model', 'Master_model');

        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->model('admin/auth_model', 'auth_model');

        $this->load->helper('date');
    }

    function test_input($data) {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    public function date_sheetlist() {

        $this->rbac->check_operation_access();

        $data['title'] = 'DateSheet List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/date_sheet_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invt_list() {


        $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/invitation_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invitation_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/exam/invitation_list', $data);
    }

    public function datesheet_list_data() {

        $data['info'] = $this->Exam_model->get_all_examsheet();

        $this->load->view('admin/exam/date_sheet_list', $data);
    }

    public function date_sheet_list_add() {

        // $this->rbac->check_operation_access();

        if ($this->input->post()) {

            $exam_name = $this->input->post('exam_name');

            for ($i = 0; $i < count($exam_name); $i++) {

                $data = array(
                    'exam_name' => ucfirst($exam_name[$i]),
                    'sub_name' => $this->input->post('sub_name')[$i],
                    'no_candidate' => $this->input->post('no_candidate')[$i],
                    'shft_exam' => $this->input->post('shft_exam')[$i],
                    'date_exam' => $this->input->post('date_exam')[$i],
                    'time_exam' => $this->input->post('time_exam')[$i],
                    'created_by' => $this->session->userdata('admin_id')[$i],
                    // 'ip_address' => $this->input->ip_address(),
                    'created_at' => date('d-m-Y : h:m:s'),
                    'created_by' => $this->session->userdata('admin_id'),
                );

                $data = $this->security->xss_clean($data);

                $result = $this->Exam_model->add_date_sheet($data);
            }



            $this->session->set_flashdata('success', ' Add successfully!');

            redirect(base_url('admin/examshedule_schedule/date_sheetlist'), 'refresh');
        } else {



            $data['subject'] = $this->Master_model->get_subject();

            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/date_sheet_list_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    // public function invitation_add() {
    //     // $this->rbac->check_operation_access();
    //     if ($this->input->post()) {
    //         $speedpost = $this->input->post('speedpost') ? implode(',', $this->input->post('speedpost')) : "";
    //         $subjectline = $this->input->post('subjectline') ? implode(',', $this->input->post('subjectline')) : "";
    //         $startdate = $this->input->post('startdate') ? implode(',', $this->input->post('startdate')) : "";
    //         $enddate = $this->input->post('enddate') ? implode(',', $this->input->post('enddate')) : "";
    //         $exam_name = $this->input->post('exam_name');
    //         for ($i = 0; $i < count($exam_name); $i++) {
    //             $data = array(
    //                 'exam_name' => ucfirst($exam_name[$i]),
    //                 'speedpost' =>  $speedpost,
    //                 'subjectline' => $subjectline,
    //                 'startdate' => $startdate ,
    //                 'enddate' => $enddate,
    //                 'sub_name' => $this->input->post('sub_name')[$i],
    //                 'no_candidate' => $this->input->post('no_candidate')[$i],
    //                 'shft_exam' => $this->input->post('shft_exam')[$i],
    //                 'date_exam' => $this->input->post('date_exam')[$i],
    //                 'time_exam' => $this->input->post('time_exam')[$i],
    //                 'created_by' => $this->session->userdata('admin_id')[$i],
    //                 // 'ip_address' => $this->input->ip_address(),
    //                 'created_at' => date('d-m-Y : h:m:s'),
    //                 'created_by' => $this->session->userdata('admin_id'),
    //             );
    //             $data = $this->security->xss_clean($data);
    //             print_r($data); die();
    //             $result = $this->Exam_model->add_invitation($data);
    //         }
    //         $this->session->set_flashdata('success', ' Add successfully!');
    //         redirect(base_url('admin/examshedule_schedule/invt_list'), 'refresh');
    //     } else {
    //         $data['subject'] = $this->Master_model->get_subject();
    //         $this->load->view('admin/includes/_header');
    //         $this->load->view('admin/exam/invitation_add', $data);
    //         $this->load->view('admin/includes/_footer');
    //     }
    // }

    public function invitation_add() {

        // $this->rbac->check_operation_access();

        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";

            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $this->input->post('subjectline'),
                'startdate' => $this->input->post('startdate'),
                'enddate' => $this->input->post('enddate'),
                'exam_name' => $this->input->post('exam_name'),
                'sub_name' => $sub_name,
                // 'exam_name' => $exam_name,
                'no_candidate' => $no_candidate,
                'shft_exam' => $shft_exam,
                'date_exam' => $date_exam,
                'time_exam' => $time_exam,
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );

            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_invitation($data);

            $this->session->set_flashdata('success', ' Add successfully!');

            redirect(base_url('admin/examshedule_schedule/invt_list'), 'refresh');
        } else {

            $data['subject'] = $this->Master_model->get_subject();

            $data['exam'] = $this->Master_model->get_exam();
            // print_r($data['exam']); die();
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/invitation_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    public function invitation_preview($id) {

        $data['id'] = ($id);
        $data['admin'] = $this->Exam_model->get_invitation_data(urldecrypt($id));
        // print_r( $data['admin'] ); die;
        $data['states'] = $this->location_model->get_states();

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/invitation_preview', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function consent_letter_preview($id) {

        $data['id'] = ($id);
        $data['admin'] = $this->Exam_model->get_invitation_data(urldecrypt($id));
        // print_r( $data['admin'] ); die;
        $data['states'] = $this->location_model->get_states();

        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/consent_letter_preview', $data);
        $this->load->view('admin/includes/_footer');
    }

    // public function send_invitation($id){
    // $data['id'] = ($id);
    // $data['info'] = $this->Exam_model->get_all_registration_data();
    // $data['states'] = $this->location_model->get_states();
    // $this->load->view('admin/includes/_header');
    // $this->load->view('admin/exam/invitation_user_list', $data);
    // $this->load->view('admin/includes/_footer');
    // }


    public function send_invitation() {

       
        $data['states'] = $this->location_model->get_states();
         
        $data['title'] = 'Invitation and Schedule List';

        // $this->db->update('ci_exam_registration', ['invite_sent'=> "2"])->where('id',$id);
  
      
        $this->load->view('admin/includes/_header', $data);
        
        $this->load->view('admin/exam/invt_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }


    // 21-09-2022 New Functoin Add 
    public function districtWiseCountOfStudents()
    {
        if(isset($_GET['state_id']) && isset($_GET['district_id']))
        {
            $id = $_GET['state_id'];
            $state_name = get_district_name($id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $districtWiseCountOfStudents = $this->Exam_model->getTotalCountinDistrict($state_name,$city_name);
            echo $districtWiseCountOfStudents;
            exit;

        }
    }
    public function totalCountSchoolWise()
    {
        if(isset($_GET['school_ids']))
        {
            $ids = $_GET['school_ids'];
            $SchoolWiseCounts = $this->Exam_model->getTotalCountinSchoolWise($ids);
            echo $SchoolWiseCounts;
            exit;

        }
    }
    // End Login Jogi..
    public function inv_list_data_for_mail() {

        
        // $data['info'] = $this->Exam_model->get_all_registration_data();
    
        // echo '<pre>'; print_r($data['info']);

        // $this->load->view('admin/exam/invitation_user_list', $data);
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){
         
            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            // echo 'if'.$state_name."==".$city_name."==".$grade_name; exit;
            $data['data'] = $this->Exam_model->get_all_search_registration_data($state_name, $city_name, $grade_name);
           
            
            
        }else if(isset($_GET['district_id'])){
         
            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            // echo 'elseif1'.$state_name."==".$city_name."==".$grade_name; exit;
            $data['data'] = $this->Exam_model->get_all_search_registration_data($state_name, $city_name, $grade_name);
            
           
           
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else if(isset($_GET['grade_id'])){
           
            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            // $grade_name = get_subcity_name($id); 
            // echo 'elseif2'.$state_name."==".$city_name."==".$grade_name; exit;
            // echo $grade_name; exit;
            $data['data'] = $this->Exam_model->get_all_search_registration_data($state_name, $city_name, $grade_name);
            
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else{
          
            $state_name = '';
            $city_name = '';
            $grade_name = '';
            // echo 'else'.$state_name."==".$city_name."==".$grade_name; exit;
            $data['data'] = $this->Exam_model->get_all_search_registration_data($state_name, $city_name, $grade_name);
            
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
        }    


        // echo '<pre>'; print_r($records); die();
        $array = array('created_by' => $this->session->userdata('admin_id'));
        // $records['data'] = $this->db
        //     ->select('*')
        //     ->from('ci_exam_master')
        //     ->where($array)
        //     ->order_by('id','desc')
        //     ->get()
        //     ->result_array();
        // $records['data'] = $this->Exam_model->get_all_registration_data();
        // $data = [];
        // echo '<pre>'; print_r($records['data']);
        // die;
        // $i = 0;

        // foreach ($records['data'] as $row) {
        //     if($row['school_name'] != ''){
        //         $data[] = [
        //             ++$i,

        //             $row['school_name'] ? $row['school_name'] : '',
        //             $row['district'] ? $row['district'] : '',
        //             $row['city']? $row['city'] : '',
        //             $row['principal_name']? $row['principal_name'] : '',
        //             $row['pri_mobile']? $row['pri_mobile'] : '',
        //             $row['ranking_admin']? $row['ranking_admin'] : '',
        //             $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
        //             $row['id']? $row['id'] : '',
        //             '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['ref_id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
        //             <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
        //             base_url('admin/master/exam_del/' . urlencrypt($row['ref_id'])) .
        //             '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
        //         ];
        //     }
        // }

        // $data['data'] = $records1['data'] = $data;      
        // echo '<pre>';print_r($data['totalcountindistricts']);die;  
        // echo json_encode($records1);

        $this->load->view('admin/exam/sending_invitations', $data);
    }


    public function inv_all_data_for_mail() {
        
        // echo '<pre>'; print_r($records); die();
        $array = array('created_by' => $this->session->userdata('admin_id'));
        // $records['data'] = $this->db
        //     ->select('*')
        //     ->from('ci_exam_master')
        //     ->where($array)
        //     ->order_by('id','desc')
        //     ->get()
        //     ->result_array();
        $state_name = '';
        $city_name = '';
        $grade_name = '';
        $records['data'] = $this->Exam_model->get_all_registration_data($state_name, $city_name, $grade_name);
        $data = [];
        // echo '<pre>'; print_r($records['data']);
        // die;
        $i = 0;

        foreach ($records['data'] as $row) {
            if($row['school_name'] != ''){
                // echo $row['invt_recieved']."=".$row['invite_sent'];
                // exit;
                if($row['invt_recieved']==0 && $row['invite_sent']==1)
                {
                    $action =   'Pending';
                }
                elseif ($row['invt_recieved']==1 && $row['invite_sent']==1) {
                    $action =   'Done';
                }
                else{
                    $action =   '<input type="checkbox" id="a" class="send_email_ids" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                    <a title="Send Invitations" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>';
               
                }

                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = $row['max_allocate_candidate'];
                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $action,
                ];
            }
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
    }


    public function date_sheet_list_edit($id) {

        $subject = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";

        if ($this->input->post('submit')) {


            $data = array(
                'exam_name' => $this->input->post('exam_name'),
                'sub_name' => $subject,
                'no_candidate' => $this->input->post('no_candidate'),
                'shft_exam' => $this->input->post('shft_exam'),
                'date_exam' => $this->input->post('date_exam'),
                'time_exam' => $this->input->post('time_exam'),
                'updated_at' => date('d-m-Y : h:m:s'),
                'updated_by' => $this->session->userdata('admin_id')
            );
            $data = $this->security->xss_clean($data);

            $result = $this->Exam_model->edit_date_sheet($data, $id);

            if ($result) {

                $this->session->set_flashdata('success',
                        'Updated successfully!');
                redirect(base_url('admin/examshedule_schedule/date_sheetlist'),
                        'refresh');
            }
            // }
        } else {


            $data['id'] = ($id);
            $data['user'] = $this->Exam_model->get_datesheet_id($id);
            $data['subject'] = $this->Master_model->get_subject();
            // print_r($data['user']); die();
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/date_sheet_list_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    public function date_sheet_del($id) {

        // $this->rbac->check_operation_access();

        $this->db->delete('ci_exam_invitation', array('id' => urldecrypt($id)));

        $this->session->set_flashdata('success', 'Deleted Successfully!(सफलतापूर्वक हटा दिया गया!)');

        redirect(base_url('admin/examshedule_schedule/create_letter'));
    }
    
    public function date_sheet_edit($id) {
        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            // $id = $this->uri->segment(4);
            // $new_id = urldecrypt($id);
            // echo $new_id;exit;
            
            $user_id = $this->input->post('user_id');
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                // 'subjectline' => $this->input->post('subjectline'),
                // 'startdate' => $this->input->post('startdate'),
                // 'enddate' => $this->input->post('enddate'),
                // 'exam_name' => $this->input->post('exam_name'),
                // 'sub_name' => $sub_name,
                // 'exam_name' => $exam_name,
                // 'no_candidate' => $no_candidate,
                // 'shft_exam' => $shft_exam,
                // 'date_exam' => $date_exam,
                // 'time_exam' => $time_exam,
                'name_designation_mobile' => $this->input->post('name_designation_mobile'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );
            echo '<pre>';print_r($data);exit;
            // $data = $this->security->xss_clean($data);
            // $result = $this->Exam_model->add_invitation($data);
            $result = $this->Exam_model->update_invitation($data,$user_id);

            $this->session->set_flashdata('success', ' Add successfully!(सफलतापूर्वक जोड़ें!)');

            redirect(base_url('admin/examshedule_schedule/create_letter'), 'refresh');
        } else {

            $id = $this->uri->segment(4);
            $new_id = urldecrypt($id);

            $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
            // echo '<pre>';print_r($data); die();
            
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/create_letter_edit', $data);

            $this->load->view('admin/includes/_footer');
        }
    }




    public function date_sheet_update() {
        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            // $id = $this->uri->segment(4);
            // $new_id = urldecrypt($id);
            // echo $new_id;exit;
            
            $user_id = $this->input->post('user_id');
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                // 'subjectline' => $this->input->post('subjectline'),
                // 'startdate' => $this->input->post('startdate'),
                // 'enddate' => $this->input->post('enddate'),
                // 'exam_name' => $this->input->post('exam_name'),
                // 'sub_name' => $sub_name,
                // 'exam_name' => $exam_name,
                // 'no_candidate' => $no_candidate,
                // 'shft_exam' => $shft_exam,
                // 'date_exam' => $date_exam,
                // 'time_exam' => $time_exam,
                'name_designation_mobile' => $this->input->post('name_designation_mobile'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );
            // echo '<pre>';print_r($data);exit;
            // $data = $this->security->xss_clean($data);
            // $result = $this->Exam_model->add_invitation($data);
            $result = $this->Exam_model->update_invitation($data,$user_id);

            $this->session->set_flashdata('success', ' Update successfully!(अपडेट सफलतापूर्वक हो गया)');

            redirect(base_url('admin/examshedule_schedule/create_letter'), 'refresh');
        }
    }

    public function app_of_candidate() {
        $this->rbac->check_operation_access();

        $data['title'] = 'Applications of Candidate';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/candidate_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function candidate_list_data() {

        $query = $this->db->query('SELECT sum(number_of_can) FROM (ci_candidate_app )');
        $data['total'] = ($query->result_array());
        $a = ($data['total'][0]);
        $data['total'] = ($a['sum(number_of_can)']);

        $data['info'] = $this->Exam_model->get_all_candidate_data();

        $this->load->view('admin/exam/candidate_app_list', $data);
    }

    public function candidate_add() {

        if ($this->input->post()) {

            $data = array(
                'number_of_can' => $this->input->post('number_of_can'),
                'state' => $this->input->post('state'),
                'exam_name' => $this->input->post('exam_name'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
            );

            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_application_cand($data);

            $this->session->set_flashdata('success', ' Add successfully!');

            redirect(base_url('admin/examshedule_schedule/app_of_candidate'), 'refresh');
        } else {

            // $data['subject'] = $this->Master_model->get_subject();
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();

            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/candidate_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    public function candidate_edit($id) {

        if ($this->input->post()) {

            $data = array(
                'number_of_can' => $this->input->post('number_of_can'),
                // 'exam_name' =>  $this->input->post('exam_name'),
                // 'state' => $this->input->post('state'),
                'updated_by' => $this->session->userdata('admin_id'),
                'updated_at' => date('d-m-Y : h:m:s'),
            );

            $data = $this->security->xss_clean($data);
            // print_r($data); die();
            $result = $this->Exam_model->edit_candi($data, urldecrypt($id));

            $this->session->set_flashdata('success', ' Updated successfully!');

            redirect(base_url('admin/examshedule_schedule/app_of_candidate'), 'refresh');
        } else {

            $data['admin'] = $this->Exam_model->get_data_candidate(urldecrypt($id));
            // print_r($data['admin']); die();
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();

            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/candidate_edit', $data);

            $this->load->view('admin/includes/_footer');
        }
    }

    public function candiate_del($id) {

        // $this->rbac->check_operation_access();

        $this->db->delete('ci_candidate_app', array('id' => urldecrypt($id)));

        $this->session->set_flashdata('success', 'Deleted Successfully!');

        redirect(base_url('admin/examshedule_schedule/app_of_candidate'));
    }

    public function fetch_examname_data($id) {

        $query = $this->db->query("SELECT * from ci_exam_master where status=1
		and id=" . $id);
        $data = $query->row_array();

        echo json_encode($data);

        // $no = $data['no_of_cand'];
        // $start_date_exam = $data['start_date_exam'];
        // $end_date_exam = $data['end_date_exam'];
        // return json_encode '<p>'.$no.' </p>';
        // return json_encode '<p>'.$start_date_exam.' </p>';
        // return json_encode '<p>'.$end_date_exam.' </p>';
    }

    public function send_invitation_user_all() {

        $ids = $this->input->get('data');
     
        $send_consent_id = $this->input->get('send_consent_id');
        
        $new_id = urldecrypt($send_consent_id); 
       
        $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
        echo '<pre>';
        echo '<br/>';
        echo $data['exam'][0]['subjectline'];
        echo '<br/>';
        echo $data['exam'][0]['speedpost'];
        echo '<br/>';
        echo $data['exam'][0]['startdate'];
        echo '<br/>';
        echo $data['exam'][0]['enddate'];
        echo '<br/>';
        echo $data['exam'][0]['name_designation_mobile'];
        echo '<br/>';

        if(!empty($ids)){
            foreach ($ids as $id) {
                $arr = [
                    'exam_name' => $data['exam'][0]['subjectline'],
                    'ref_id' => $new_id,
                    'invite_sent' => '1',
                    'invt_recieved' => '0'
                ];
                $this->db->where(['id' => $id])->update('ci_exam_registration', $arr);
                // print_r($id);
                // $this->db->update('ci_exam_registration', ['invite_sent' => '1']);
                // $this->db->update('ci_exam_registration', ['invt_recieved' => '0']);
                // $this->db->update('ci_exam_invitation', ['invite_sent' => '1']);
                // $this->db->where('id', $id);
            }


            $i = 0;
            foreach ($ids as $id) {

                $data[$i] = $this->Exam_model->get_all_invites_ids($id);  

                foreach($data[$i] as $email => $value){
                    $emails[$i] = $value['email'];
                    $emails[$i] = $value['principal_name'];
                }

                $i++;
            }
        
            $i = 0;
            foreach ($ids as $id) {

                $data['user_data'][$i] = $this->Exam_model->get_all_invites_ids($id); 
                $i++;
            }


        
            foreach($data['user_data'] as $value){
                foreach($value as $singledata){
                    echo '<pre>';
                    echo $singledata['school_name'];
                    echo '<br/>';
                    echo $singledata['address'];
                    echo '<br/>';
                    echo $singledata['landmark'];
                    echo '<br/>';
                    echo $singledata['principal_name'];
                    echo '<br/>';
                    echo $singledata['pri_mobile'];
                    echo '<br/>';
                    echo $singledata['email'];
                    echo '<br/>';

                }
            }
            // echo '<pre>';
            // // print_r($emails);
            // print_r($data);
            // $string_version = implode(',', $emails);
            // echo '<br/>';
            // echo $string_version;
             
            //sending welcome email to user
            $this->load->helper('email_helper');

            $mail_data = array(
                'fullname' => 'jogi'.' '.'-'.'KV School',
                'email' => 'jogi.amu@gmail.com',
                'verification_link' => base_url('admin/auth/verify').'/'.md5(rand(0,1000))
            );

            // $to = $data['email'];
            $to = 'jugendra.singh@netprophetsglobal.com';

            $email = $this->mailer->mail_template($to,'exam-schedule',$mail_data);
            

                if($email){
                    $this->session->set_flashdata('success', 'Email send');	
                    $this->load->view('admin/exam/send_letter_list_index', $data);
                }	
                else{
                    echo 'Email Error';
                }
            // exit;

        
        
        }else{
            
            $id = $this->input->get('id');
            
            // $this->db->where('ci_exam_registrationid', $id);
            $arr = [
                'exam_name' => $data['exam'][0]['subjectline'],
                'ref_id' => $new_id,
                'invite_sent' => '1',
                'invt_recieved' => '0'
            ];
            $this->db->where(['id' => $id])->update('ci_exam_registration', $arr);
            // $this->db->where(['id' => $id])->update('ci_exam_registration', ['ref_id' => $new_id]);
            // $this->db->where(['id' => $id])->update('ci_exam_registration', ['invite_sent' => '1']);
            // $this->db->where(['id' => $id])->update('ci_exam_registration', ['invt_recieved' => '0']);
            // $this->db->update('ci_exam_invitation', ['invite_sent' => '1']);
           
            
            $data['user_data'] = $this->Exam_model->get_all_invites_ids($id); 

            echo '<pre>';
            // print_r($data['user_data'][0]);
            echo '<br/>';
            echo $school_name = $data['user_data'][0]['school_name'];
            echo '<br/>';
            echo $address = $data['user_data'][0]['address'];
            echo '<br/>';
            echo $landmark = $data['user_data'][0]['landmark'];
            echo '<br/>';
            echo $principal_name = $data['user_data'][0]['principal_name'];
            echo '<br/>';
            echo $pri_mobile = $data['user_data'][0]['pri_mobile'];
            echo '<br/>';
            echo $user_email = $data['user_data'][0]['email'];
            echo '<br/>';

            //sending welcome email to user
            $this->load->helper('email_helper');

            $mail_data = array(
                'fullname' => 'jogi'.' '.'-'.'KV School',
                'email' => 'jogi.amu@gmail.com',
                'verification_link' => base_url('admin/auth/verify').'/'.md5(rand(0,1000))
            );

            // $to = $data['email'];
            $to = 'jugendra.singh@netprophetsglobal.com';

            $email = $this->mailer->mail_template($to,'exam-schedule',$mail_data);

            // exit;
        }
        
        // $send_consent_id = $this->input->get('send_consent_id');
        // echo $send_consent_id.'<br/>';
        
        // exit;
        
        

    }

    public function send_invitation_user($id) {
       
        $user = $this->db->select('admin_id')->from('ci_exam_registration')->where('id', $id)->get()->row('admin_id');
        // print_r($user); die();
        $data_id = array(
            'last_id' => $user,
            'invite_sent' => '1'
        );

        $result = $this->db->update('ci_exam_invitation', $data_id);

        $up_arr = array('invite_sent' => "1");

        $result = $this->db->where(['id' => $id])->update('ci_exam_registration', $up_arr);

        $this->session->set_flashdata('success', ' Sent Invitation successfully!');
        redirect(base_url('admin/examshedule_schedule/send_invitation'), 'refresh');
    }

    public function update_check_box() {
        print_r('hi');
    }

    //  public function invitation_reply($id){
    //  $data['id'] = ($id);
    //     $data['admin'] = $this->Exam_model->get_invitation_data(urldecrypt($id))  ;
    //     // print_r( $data['admin'] ); die;
    //     $data['states'] = $this->location_model->get_states();
    //     $this->load->view('admin/includes/_header');
    //     $this->load->view('admin/exam/invitation_reply', $data);
    //     $this->load->view('admin/includes/_footer');
    // }

    public function invitation_reply($id) {

        $admin_id=$this->session->userdata('admin_id');
        // echo $id;exit;
        // print_r($admin_id); die();
        // print_r($this->input->post()); die();

        if ($this->input->post()) {
            $ref_id = urldecrypt($id);
        
            $examselect = !empty($this->input->post('examselect')) ? $this->input->post('examselect') : "";
           
            $sub_name = !empty($this->input->post('sub_name')) ? $this->input->post('sub_name') : "";
            $date_exam = !empty($this->input->post('date_exam')) ? $this->input->post('date_exam') : "";
            $shft_exam = !empty($this->input->post('shft_exam')) ? $this->input->post('shft_exam') : "";
            $time_exam = !empty( $this->input->post('time_exam')) ? $this->input->post('time_exam') : "";
            
            $cand_no = !empty($this->input->post('cand_no')) ? $this->input->post('cand_no') : "";

            $inserted_id = array();
           
            foreach ($examselect as $key => $value) {   
                               
                $data = array(
                    'ref_id'        =>  $ref_id,
                    'examselect'    =>  $value,
                    'sub_name_re'   =>  !empty($sub_name) ? $sub_name[$value] : '',
                    'date_exam_re'     =>  !empty($date_exam) ? $date_exam[$value] : '',
                    'shft_exam'     =>  !empty($shft_exam) ? $shft_exam[$value] : '',
                    'time_exam'     =>  !empty($time_exam) ? $time_exam[$value] : '',
                    'cand_no'       =>  !empty($cand_no) ? $cand_no[$value] : '',
                    'created_by'    =>  $this->session->userdata('admin_id'),
                    'created_at'    =>  date('d-m-Y : h:m:s'),
                    'created_by'    =>  $this->session->userdata('admin_id'),
                );
                  $dataUpdate = array(
                'invt_recieved' => '1'
            );
            $dataUpdate2 = array(
                'invt_recieved' => '1',
                'ref_id' =>$ref_id
            );
        

            

            $this->db->where('admin_id', $admin_id);
            $this->db->update('ci_exam_registration', $dataUpdate2);
            // echo $this->db->last_query(); die();
            $this->db->update('ci_exam_invitation', $dataUpdate);
            $inserted_id[$value] = $this->Exam_model->insertData('ci_invite_return', $data);
              
            }
     
            $this->session->set_flashdata('success', ' Sent successfully!');

            redirect(base_url('admin/consent_active/consent_active_list'), 'refresh');
        } else {

           
            $data['id'] = ($id);

            $data['admin'] = $this->Exam_model->get_invitation_data(urldecrypt($id));
         
            $data['states'] = $this->location_model->get_states();
            // echo 'here';
            // echo '<prev>';
            // print_r($data);
            // exit;

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/invitation_reply', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

//      public function invitation_reply_back() {
//        $examselect = $this->input->post('examselect') ? implode(',', $this->input->post('examselect')) : "";
//         $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
//         $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
//         $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
//         $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
//         if ($this->input->post()) {
//             $data = array(
//                     'examselect' => $examselect,
//                     'sub_name' => $sub_name,
//                     'date_exam' => $date_exam,
//                     'shft_exam' => $shft_exam,
//                     'time_exam' => $time_exam,
//                     'created_by' => $this->session->userdata('admin_id'),
//                     'created_at' => date('d-m-Y : h:m:s'),
//                     'created_by' => $this->session->userdata('admin_id'),
//                 );
//             $dataUpdate = array(
//                 'invt_recieved' => '1'
//             );
//                 $data = $this->security->xss_clean($data);
//                 $result = $this->Exam_model->add_return_invitation($data,$dataUpdate,$id );
//             $this->session->set_flashdata('success', ' Sent successfully!');
//             redirect(base_url('admin/consent_active/consent_active_list'), 'refresh');
//     }
// }

    public function invitation_sent_list() {


        // $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/invt_sent_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invitation_sent_list_data() {


        // $data['info'] = $this->Exam_model->get_all_recived_invites();

        // echo '<pre>'; print_r($data['info']); die();

        // $this->load->view('admin/exam/invitation_sent_list', $data);
        // $data['info'] = $this->Exam_model->get_all_recived_invites();
        $state_name = $city_name = $grade_name = "";
        $records['data'] = $this->Exam_model->get_all_recived_invites($state_name,$city_name,$grade_name);
        $data = [];
        // echo '<pre>'; print_r($records['data']);
        // die;
        $i = 0;

        foreach ($records['data'] as $row) {
            // if($row['school_name'] != ''){

                $array_value_sum = $row['no_candidate'];
                  $array = explode(',', $array_value_sum);
                  $total_sum = array_sum($array);
                  $row['total_sum'] =  $total_sum;
                  $row['startdate'] =  date("d-m-Y", strtotime($row['startdate']));
                  $row['enddate'] =  date("d-m-Y", strtotime($row['enddate']));

                // $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                // $row['max_allocate_candidate'] = '<input style="height: 1px;width: 1px;" type="checkbox" id="a" id="sum_value" name="sum_value" class="checkbox-item sum" rel="'.$row['max_allocate_candidate'].'"> '.$row['max_allocate_candidate'].'';
                $data[] = [
                    ++$i,

                    $row['subjectline'] ? $row['subjectline'] : '',
                    $row['total_sum'] ? $row['total_sum'] : '',
                    $row['startdate']? $row['startdate'] : '',
                    $row['enddate']? $row['enddate'] : '',
                    '<a href="' . base_url('admin/examshedule_schedule/consent_recieved_by_user_list/' . urlencrypt($row['id'])) .'?total_number='.$total_sum. '" title="Consent Recieved" class="btn btn-success consent_recieved btn-xs mr5"><i class="fa fa-eye"></i></a>
                     <a href="' . base_url('admin/examshedule_schedule/consent_not_recieved_by_user_list/' . urlencrypt($row['id'])) .'?total_number='.$total_sum. '" title="Consent Not Recieved" class="btn btn-danger consent_not_recieved btn-xs mr5"><i class="fa fa-eye"></i></a>',
                ];
            // }
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
    }

    public function consent_recieved_by_user_list() {
        // urldecrypt($id)
        $id = urldecrypt($this->uri->segment(4));
         
        // $this->rbac->check_operation_access();
        
        $data['states'] = $this->location_model->get_states();
         
        $data['title'] = 'Recieved Consent';
        $data['id'] = $id;
    
        $this->load->view('admin/includes/_header', $data);
       
        $this->load->view('admin/exam/invt_recived_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function consent_recieved_by_user_data() {

        $data['info'] = $this->Exam_model->get_consent_recved_data();
        
        // print_r($data['info']); die();
        $this->load->view('admin/exam/consnt_recievd_list', $data);
    }
    
    public function consent_recieved_list($id) {
       
        // $data['info'] = $this->Exam_model->get_consent_recved_data();
        // print_r($data['info']); die();
        // $this->load->view('admin/exam/consnt_recievd_list', $data);
     
        $state_name = $city_name = $grade_name = '';
        $records['data'][1] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name,$id);

        $data = [];
        
        // echo '<pre>'; print_r($records['data'][1][0]);
        // die;
        
        $i = 0;

        foreach ($records['data'][1][1] as $row) {
          
            if($row['school_name'] != ''){
                
                if($row['invt_recieved']==0 && $row['invite_sent']==1)
                {
                    $action =   'Pending';
                }
                elseif ($row['invt_recieved']==1 && $row['invite_sent']==1) {
                    $action =   'Recieved';
                }
                else{
                    $action =   '<input type="checkbox" id="a" class="send_email_ids" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                    <a title="Send Invitations" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>';
               
                }

                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = '<input style="height: 1px;width: 1px;" type="checkbox" id="a" id="sum_value" name="sum_value" class="checkbox-item sum" rel="'.$row['max_allocate_candidate'].'"> '.$row['max_allocate_candidate'].'';
                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $action,
                ];
            }
        }

        $records1['data'] = $data;        
        $records1['data'] = $data;        
        echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
    }

    public function consent_recieved_search(){
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){

            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($records); die();
            
        }else if(isset($_GET['district_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            // echo $state_name; exit;
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else if(isset($_GET['grade_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            // $grade_name = get_subcity_name($id); 
            // echo $grade_name; exit;
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else{

            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $data['data'] = $this->Exam_model->get_consent_recved_data($state_name, $city_name, $grade_name);
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
        }

        $array = array('created_by' => $this->session->userdata('admin_id'));
        // $records['data'] = $this->db
        //     ->select('*')
        //     ->from('ci_exam_master')
        //     ->where($array)
        //     ->order_by('id','desc')
        //     ->get()
        //     ->result_array();
        // $records['data'] = $this->Exam_model->get_all_registration_data();
        // $data = [];
        // echo '<pre>'; print_r($records['data']);
        // die;
        // $i = 0;
        // echo '<pre>'; print_r($records['data'][1]); die();
        // foreach ($records['data'][1] as $row) {
        //     if($row['school_name'] != ''){
        //         $data[] = [
        //             ++$i,

        //             $row['school_name'] ? $row['school_name'] : '',
        //             $row['district'] ? $row['district'] : '',
        //             $row['city']? $row['city'] : '',
        //             $row['principal_name']? $row['principal_name'] : '',
        //             $row['pri_mobile']? $row['pri_mobile'] : '',
        //             $row['ranking_admin']? $row['ranking_admin'] : '',
        //             $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
        //             $row['id']? $row['id'] : '',
        //             '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['ref_id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
        //             <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
        //             base_url('admin/master/exam_del/' . urlencrypt($row['ref_id'])) .
        //             '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
        //         ];
        //     }
        // }
        // $data['count1'] = $records['data'][0];
        // $data['data1'] = $data;    
        // echo '<pre>'; print_r($data); die();    
        // echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
        $data['count'] = $data['data'][0];
        $data['main_data'] = $data['data'][1];
        // echo '<pre>'; print_r($data['main_data']); die();    
        $this->load->view('admin/exam/consent_recieved_search', $data);
    }




    public function consent_not_recieved_by_user_list() {
    //    echo ('hi'); die();
        // $this->rbac->check_operation_access();
        $id = urldecrypt($this->uri->segment(4));
        $data['states'] = $this->location_model->get_states();
        
        $data['title'] = 'Recieved Not Consent';
        $data['id'] = $id;
        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/invt_not_recived_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }


    public function inv_list_search_for_mail() {

        // $data['info'] = $this->Exam_model->get_all_registration_data();

        // echo '<pre>'; print_r($data['info']);

        // $this->load->view('admin/exam/invitation_user_list', $data);
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){

            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            echo '<pre>'; print_r($records); die();
            
        }else if(isset($_GET['district_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            // echo $state_name; exit;
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else if(isset($_GET['grade_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            // $grade_name = get_subcity_name($id); 
            // echo $grade_name; exit;
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else{

            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
        }    


        // echo '<pre>'; print_r($records['data']); die();
        $array = array('created_by' => $this->session->userdata('admin_id'));
        // $records['data'] = $this->db
        //     ->select('*')
        //     ->from('ci_exam_master')
        //     ->where($array)
        //     ->order_by('id','desc')
        //     ->get()
        //     ->result_array();
        // $records['data'] = $this->Exam_model->get_all_registration_data();
        $data = [];
        // echo '<pre>'; print_r($records['data']);
        // die;
        $i = 0;

        foreach ($records['data'] as $row) {
            if($row['school_name'] != ''){
                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['pri_mobile']? $row['pri_mobile'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    $row['id']? $row['id'] : '',
                    '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['ref_id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
                    <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                    base_url('admin/master/exam_del/' . urlencrypt($row['ref_id'])) .
                    '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
                ];
            }
        }

        $data['data'] = $records1['data'] = $data;        
        // echo json_encode($records1);
        $this->load->view('admin/exam/sending_invitations', $data);
    }

    public function consent_notrecieved_search() {
        // echo '<pre>'; echo 123456;exit;
        // $data['info'] = $this->Exam_model->get_all_registration_data();

        // echo '<pre>'; print_r($data['info']);

        // $this->load->view('admin/exam/invitation_user_list', $data);
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){

            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($records); die();
            
        }else if(isset($_GET['district_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            // echo $state_name; exit;
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else if(isset($_GET['grade_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            // $grade_name = get_subcity_name($id); 
            // echo $grade_name; exit;
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
            
        }else{

            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $data['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name);
            // $this->load->view('admin/consent_letter/consent_letter_list', $data);
        }    

        // // echo '<pre>'; print_r($records['data']); die();
        // // echo '<pre>'; print_r($records); die();
        // $array = array('created_by' => $this->session->userdata('admin_id'));
        // // $records['data'] = $this->db
        // //     ->select('*')
        // //     ->from('ci_exam_master')
        // //     ->where($array)
        // //     ->order_by('id','desc')
        // //     ->get()
        // //     ->result_array();
        // // $records['data'] = $this->Exam_model->get_all_registration_data();
        // $data = [];
        // // echo '<pre>'; print_r($records['data']);
        // // die;
        // $i = 0;

        // foreach ($records['data'] as $row) {
        //     if($row['school_name'] != ''){
        //         $data[] = [
        //             ++$i,

        //             $row['school_name'] ? $row['school_name'] : '',
        //             $row['district'] ? $row['district'] : '',
        //             $row['city']? $row['city'] : '',
        //             $row['principal_name']? $row['principal_name'] : '',
        //             $row['pri_mobile']? $row['pri_mobile'] : '',
        //             $row['ranking_admin']? $row['ranking_admin'] : '',
        //             $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
        //             $row['id']? $row['id'] : '',
        //             '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['ref_id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
        //             <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
        //             base_url('admin/master/exam_del/' . urlencrypt($row['ref_id'])) .
        //             '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
        //         ];
        //     }
        // }

        // $data['data'] = $records1['data'] = $data;        
        // echo json_encode($records1);
        $data['count'] = $data['data'][0];
        $data['main_data'] = $data['data'][1];
        $this->load->view('admin/exam/consent_not_recieved', $data);
    }

    public function consent_notrecieved_by_user_data($id) {

      
        $data['states'] = $this->location_model->get_states();

        $state_name = $city_name = $grade_name = '';
        $records['data'] = $this->Exam_model->get_consent_not_recved_data($state_name, $city_name, $grade_name,$id);
        $data = [];
        // echo '<pre>'; print_r($records['data'][1]);
        // die;
        $i = 0;

        foreach ($records['data'][1] as $row) {
            if($row['school_name'] != ''){

                $row['principal_name'] = '<h4 class="m0 mb5">'.$row['principal_name'] .'</h4>'.'<small class="text-muted">'.$row['pri_mobile'].'</small><br/>'.'<small class="text-muted">'.$row['email'].'</small>';
                $row['max_allocate_candidate'] = '<input style="height: 1px;width: 1px;" type="checkbox" id="a" id="sum_value" name="sum_value" class="checkbox-item sum" rel="'.$row['max_allocate_candidate'].'"> '.$row['max_allocate_candidate'].'';
                $data[] = [
                    ++$i,

                    $row['school_name'] ? $row['school_name'] : '',
                    $row['district'] ? $row['district'] : '',
                    $row['city']? $row['city'] : '',
                    $row['principal_name']? $row['principal_name'] : '',
                    $row['ranking_admin']? $row['ranking_admin'] : '',
                    $row['max_allocate_candidate']? $row['max_allocate_candidate'] : '',
                    '<input type="checkbox" id="a" class="send_email_ids" name="send_email_ids" rel="'.$row['id'].'" value="'.$row['id'].'">
                    <a title="Send Invitations" class="btn btn-success btn-xs mr5" onClick="single_send_invitations('.$row['id'].')"> <i class="fa fa-paper-plane-o"></i></a>',
                ];
            }
        }

        $records1['data'] = $data;        
        echo json_encode($records1);
        // $this->load->view('admin/exam/sending_invitations', $data);
    }

    // public function view_recieved_consent(){
    //     // $ref_id = urldecrypt($id);
    //     // print_r($ref_id); die();
    //     //  $examselect = $this->input->post('examselect') ? implode(',', $this->input->post('examselect')) : "";
    //     // $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
    //     // $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
    //     // $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
    //     // $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
    // //     if ($this->input->post()) {
    // //         $data = array(
    // //                 'ref_id' => $ref_id ,
    // //                 'examselect' => $examselect,
    // //                 'sub_name' => $sub_name,
    // //                 'date_exam' => $date_exam,
    // //                 'shft_exam' => $shft_exam,
    // //                 'time_exam' => $time_exam,
    // //                 'created_by' => $this->session->userdata('admin_id'),
    // //                 'created_at' => date('d-m-Y : h:m:s'),
    // //                 'created_by' => $this->session->userdata('admin_id'),
    // //             );
    // //         $dataUpdate = array(
    // //             'invt_recieved' => '1'
    // //         ); 
    // //         $dataUpdate2 = array(
    // //             'invt_recieved' => '1'
    // //         );
    // //             $data = $this->security->xss_clean($data);
    // //             $result = $this->Exam_model->add_return_invitation($data,$dataUpdate,$dataUpdate2);
    // //         $this->session->set_flashdata('success', ' Sent successfully!');
    // //         redirect(base_url('admin/consent_active/consent_active_list'), 'refresh');
    // // }else{
    //             // $data['id'] = urldecrypt($id);
    //             $data['admin'] = $this->Exam_model->get_return_data();  
    //             // print_r($data['admin']); die();
    //             $data['states'] = $this->location_model->get_states();
    //             $this->load->view('admin/includes/_header');
    //             $this->load->view('admin/exam/invitation_recieved_user', $data);
    //             $this->load->view('admin/includes/_footer');
    //         }



    public function view_recieved_consent($id) {
       
        $data['info'] = $this->Exam_model->get_return_data(urldecrypt($id));
        // print_r($data['info']); die();
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/exam/invitation_recieved_user', $data);
        $this->load->view('admin/includes/_footer');
    }

      public function create_letter() {


        // $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/create_letter_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function create_letter_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();

        $this->load->view('admin/exam/create_letter_list', $data);
    }
     public function create_invt_add() {

        // $this->rbac->check_operation_access();


        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            // $id = $this->uri->segment(4);
            // $new_id = urldecrypt($id);
            // echo $new_id;exit;
            
            $user_id = $this->input->post('user_id');
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $this->input->post('subjectline'),
                // 'startdate' => $this->input->post('startdate'),
                // 'enddate' => $this->input->post('enddate'),
                // 'exam_name' => $this->input->post('exam_name'),
                // 'sub_name' => $sub_name,
                // 'exam_name' => $exam_name,
                // 'no_candidate' => $no_candidate,
                // 'shft_exam' => $shft_exam,
                // 'date_exam' => $date_exam,
                // 'time_exam' => $time_exam,
                'name_designation_mobile' => $this->input->post('name_designation_mobile'),
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            );
            // echo '<pre>';print_r($data);exit;
            // $data = $this->security->xss_clean($data);
            // $result = $this->Exam_model->add_invitation($data);
            $result = $this->Exam_model->update_invitation($data,$user_id);

            $this->session->set_flashdata('success', ' Add successfully!(सफलतापूर्वक जोड़ें!)');

            redirect(base_url('admin/examshedule_schedule/create_letter'), 'refresh');
        } else {


            $id = $this->uri->segment(4);
            $new_id = urldecrypt($id);
            // $data['subject'] = $this->Master_model->get_subject();
            // $data['exam'] = $this->Master_model->get_exam();
            // C:\xampp\htdocs\UKPSC\uk\application\models\admin\Exam_model.php
            $data['exam'] = $this->Exam_model->get_invites_byid($new_id);
            // echo '<pre>';print_r($data); die();
            
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/create_letter_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }


 public function send_consent() {


        // $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/send_letter_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function send_consent_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();
        // echo '<pre>';print_r($data);die;

        $this->load->view('admin/exam/send_letter_list', $data);
    }

    public function getSubjectNameNew() {

        if(isset($_GET['exam_id']))
        {
            $id = $_GET['exam_id'];
            $subjectList = $this->Exam_model->get_subject_new_by_id($id);
            if (count($subjectList)==0) {
                $options = '<option value="">' .' Add Subjects First'. '</option>';
            }
            else{
                $options = '<option value="">' .'Select Subject'. '</option>';
                foreach ($subjectList as $r) {
                    $options .= '<option value="' . $r['id'] . '">' . $r['sub_name'].'('.$r['sub_name_hindi'].')' . '</option>';
                }
    
            }
            
        
            echo $options;
        }
    }



}
