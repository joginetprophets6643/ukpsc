<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        auth_check(); // check login auth

        $this->rbac->check_module_access();

        $this->load->model('admin/Master_model', 'Master_model');
        $this->load->model('admin/Master_model', 'master_model');
 
        $this->load->model('admin/location_model', 'location_model');
        $this->load->model('admin/Exam_model', 'Exam_model');
        $this->load->model('admin/auth_model', 'auth_model');
    }
    public function quetion_paper_add(){
        // echo '123456';exit;
        $this->rbac->check_operation_access();

        if ($this->input->post()) {
            $data = [
                'sub_name' => ucfirst($this->input->post('sub_name')),

                'sub_name_hindi' => ucfirst($this->input->post('sub_name_hindi')),

                'sub_code' => ucfirst($this->input->post('sub_code')),

                'created_at' => date('Y-m-d h:m:s'),

                'status' => 1,

                'created_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);

            $result = $this->master_model->add_subject($data);

            $this->session->set_flashdata('success', 'Subject has been added successfully<br/>(विषय सफलतापूर्वक जोड़ दिया गया है)');

            redirect(base_url('admin/master/que_list'));

        } else {
            
            $data['title'] = 'Add Subject';
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/master/quetion_paper_add', $data);
            $this->load->view('admin/includes/_footer', $data);
            
        }
    }
    

    public function exam_add()
    {
        // $this->rbac->check_operation_access();
        if ($this->input->post()) {
            
            $data = [
                'exam_name' => ucfirst($this->input->post('exam_name')),
                'exam_hindi_name' => ucfirst($this->input->post('exam_hindi_name')),
                'advertise_name' => ucfirst($this->input->post('advertise_name')),
                'no_of_cand' => ucfirst($this->input->post('no_of_cand')),
                'start_date_exam' => ucfirst($this->input->post('start_date_exam')),
                'end_date_exam' => ucfirst($this->input->post('end_date_exam')),
                'created_at' => date('d-m-Y '),
                'status' => 1,
                'created_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];            

            $data = $this->security->xss_clean($data);
            // echo '<pre>'; print_r($data); die();
            $result = $this->master_model->add_exam($data);
            $this->session->set_flashdata('success', 'Exam has been added successfully<br/>(परीक्षा सफलतापूर्वक जोड़ दी गई है)');
            redirect(base_url('admin/master/exam_list'));
        } else {
            $data['title'] = 'Add Exam';

            $this->load->view('admin/includes/_header', $data);

            $this->load->view('admin/master/exam_add', $data);

            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function datatable_json(){

        $admin_id = $this->session->userdata('admin_id');  
        $array = array('ci_subject.created_by' => $admin_id);
        $records['data'] = $this->db->select('*')
                               ->from('ci_subject')
                               ->join('ci_exam_master', 'ci_exam_master.id = ci_subject.exam_id')
                               ->where($array)
                               ->order_by("ci_subject.id", "desc")->get()->result_array();
        
        $data = [];
        $i = 0;

        foreach ($records['data'] as $row) {
            $data[] = [
                ++$i,

                $row['exam_name'] ? $row['exam_name'] : '',

                $row['sub_name'] ? $row['sub_name'] : '',

                $row['sub_name_hindi'] ? $row['sub_name_hindi'] : '',

                $row['sub_code'] ? $row['sub_code'] : '',

                // '<span class="btn btn-xs btn-success" title="status">' . $row['status'] . '<span>',

                // '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/quetion_paper_edit/' . urlencrypt($row['id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>

                '<a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url('admin/master/quetion_paper_del/' . urlencrypt($row['id'])) .
                '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
            ];
        }

        $records['data'] = $data;
        // echo '<pre>';print_r($records);exit;
        // echo '<pre>';echo json_encode($records);exit;
        echo json_encode($records);
    }

      public function datatable_json_exam(){

        $array = array('created_by' => $this->session->userdata('admin_id'));
        $records['data'] = $this->db
            ->select('*')
            ->from('ci_exam_master')
            ->where($array)
            ->order_by('id','desc')
            ->get()
            ->result_array();
        $data = [];

        $i = 0;

        foreach ($records['data'] as $row) {
            $data[] = [
                ++$i,

                $row['exam_name'] ? $row['exam_name'] : '',
                $row['exam_hindi_name'] ? $row['exam_hindi_name'] : '',
                $row['advertise_name']? $row['advertise_name'] : '',
                $row['no_of_cand']? $row['no_of_cand'] : '',
                $row['start_date_exam']? $row['start_date_exam'] : '',
                $row['end_date_exam']? $row['end_date_exam'] : '',
                '<a title="Edit"  class="update btn btn-sm btn-success" href="' . base_url('admin/master/addSubjectNew/' . urlencrypt($row['id'])) . '"> <i class="fa fa-plus"></i></a>
                <a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/view_all_subjectNew/' . urlencrypt($row['id'])) . '"> <i class="fa fa-eye"></i></a>',
                '<a title="Edit"  class="update btn btn-sm btn-warning" href="' . base_url('admin/master/exam_edit/' . urlencrypt($row['id'])) . '"> <i class="fa fa-pencil-square-o"></i></a>
                <a title="Delete" class="delete btn btn-sm btn-danger" href="' .
                base_url('admin/master/exam_del/' . urlencrypt($row['id'])) .
                '" onclick="return confirm(\'Do you want to delete ?\nक्या आपको यकीन है?\')" > <i class="fa fa-trash-o"></i></a>',
                
            ];
        }

        $records['data'] = $data;

        echo json_encode($records);
    }



    public function que_list()
    {
        $this->rbac->check_operation_access();
        $data['title'] = '';
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/master/quetion_paper_list', $data);
        $this->load->view('admin/includes/_footer');
    }
    public function exam_list()
    {
    
        $data['title'] = 'User Activity Log';
        $this->load->view('admin/includes/_header');
        $this->load->view('admin/master/exam_list', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function quetion_paper_edit($id)
    {
        $this->rbac->check_operation_access();

        if ($this->input->post()) {
           
            $data = [
                'sub_name' => ucfirst($this->input->post('sub_name')),

                'sub_name_hindi' => ucfirst($this->input->post('sub_name_hindi')),

                'sub_code' => ucfirst($this->input->post('sub_code')),

                'created_at' => date('Y-m-d h:m:s'),

                'status' => 1,

                'updated_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);

            // $result = $this->master_model->edit_subject_data($data, $id);

            $result = $this->db->update('ci_subject', $data)->where('id', $id);

            // print_r($result);
            // die();

            $this->session->set_flashdata('success', 'Subject has been added successfully<br/विषय सफलतापूर्वक जोड़ दिया गया है>');

            redirect(base_url('admin/master/quetion_paper_list'));
        } else {
            $data['subject'] = $this->master_model->get_subject_by_id(urldecrypt($id));

            $data['title'] = 'Edit Subject';

            $this->load->view('admin/includes/_header', $data);

            $this->load->view('admin/master/quetion_paper_edit', $data);

            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function exam_edit($id)
    {
        // $this->rbac->check_operation_access();

        if ($this->input->post()) {
           
            $data = [
            'exam_name' => ucfirst($this->input->post('exam_name')),
            'exam_hindi_name' => ucfirst($this->input->post('exam_hindi_name')),
            'advertise_name' => ucfirst($this->input->post('advertise_name')),
            'no_of_cand' => ucfirst($this->input->post('no_of_cand')),
            'start_date_exam' => ucfirst($this->input->post('start_date_exam')),
            'end_date_exam' => ucfirst($this->input->post('end_date_exam')),
            'updated_at' => date('d-m-Y'),
            'status' => 1,
            'updated_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
            ];

            $data = $this->security->xss_clean($data);
           
            $result = $this->master_model->edit_exam($data,urldecrypt($id));

            $this->session->set_flashdata('success', 'Exam has been added successfully<br/>परीक्षा सफलतापूर्वक जोड़ दी गई है');

            redirect(base_url('admin/master/exam_list'));
        } else {

            $data['admin'] = $this->master_model->get_exam_by_id(urldecrypt($id));
            $data['title'] = 'Edit Exam';
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/master/exam_edit', $data);
            $this->load->view('admin/includes/_footer', $data);
        }
    }
    public function quetion_paper_del($id)
    {
        $this->rbac->check_operation_access();

        $this->db->delete('ci_subject', ['id' => urldecrypt($id)]);

        $this->session->set_flashdata('success', 'Deleted Successfully!<br/>सफलतापूर्वक हटा दिया गया!');

        redirect(base_url('admin/master/que_list'));
    } 

     public function exam_del($id)
    {
        // $this->rbac->check_operation_access();

        $this->db->delete('ci_exam_master', ['id' => urldecrypt($id)]);

        $this->session->set_flashdata('success', 'Deleted Successfully!<br/>सफलतापूर्वक हटा दिया गया!');

        redirect(base_url('admin/master/exam_list'));
    }


    // public function exam_schedule(){

    //     print_r("hi"); die();   

    // }
    public function app_of_candidate() {
        // $this->rbac->check_operation_access();

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
       
        // $array_total_sum = array_sum($data['info'][0]['number_of_can']);
        // echo '<pre>';print_r($data);exit;
        $this->load->view('admin/exam/candidate_app_list', $data);
    }

    public function candidate_add() {

        if ($this->input->post()) {
            
            $state = $this->input->post('state');
            $state_array = implode(",",$state);
            
            $district_code = $this->input->post('district_code');
            $district_code_array = implode(",",$district_code);
            
            $city = $this->input->post('city');
            $city_array = implode(",",$city);
            
            $city_code = $this->input->post('city_code');
            $city_code_array = implode(",",$city_code);
            
            $sub_name = $this->input->post('sub_name');
            $sub_name_array = implode(",",$sub_name);
            
            $number_of_can = $this->input->post('number_of_can');
            $number_of_can_array = implode(",",$number_of_can);
            
            // echo '<pre>';
            // print_r($state_array);
            // exit;
            $data = array(
                'exam_name' => $this->input->post('exam_name'),
                'state' => $state_array,                
                'city' => $city_array,
                'district_code' => $district_code_array,
                'city_code' => $city_code_array,                
                'sub_name' => $sub_name_array,
                'number_of_can' => $number_of_can_array,                
                'created_by' => $this->session->userdata('admin_id'),
                'created_at' => date('d-m-Y : h:m:s'),
            );
            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_application_cand($data);

            $this->session->set_flashdata('success', ' Add successfully!<br>सफलतापूर्वक जोड़ें!');

            redirect(base_url('admin/master/app_of_candidate'), 'refresh');
        } else {

            // $data['subject'] = $this->Master_model->get_subject();
            $data['subject'] = $this->Master_model->get_subject();
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();
            // echo '<pre>';print_r($data['subject']); die();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/exam/candidate_add', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    public function candidate_edit($id) {

        if ($this->input->post()) {

            $district_code = $this->input->post('district_code');
            $district_code_array = implode(",",$district_code);

            $city_code = $this->input->post('city_code');
            $city_code_array = implode(",",$city_code);

            $number_of_can = $this->input->post('number_of_can');
            $number_of_can_array = implode(",",$number_of_can);
            
            $data = array(
                'number_of_can' => $number_of_can_array,
                // 'exam_name' =>  $this->input->post('exam_name'),
                // 'state' => $this->input->post('state'),
                'district_code' => $district_code_array,
                'city_code' => $city_code_array,
                'updated_by' => $this->session->userdata('admin_id'),
                'updated_at' => date('d-m-Y : h:m:s'),
            );

            $data = $this->security->xss_clean($data);
            // print_r($data); die();
            $result = $this->Exam_model->edit_candi($data, urldecrypt($id));

            $this->session->set_flashdata('success', 'Updated successfully!<br/>सफलतापूर्वक अपडेट किया गया!');

            redirect(base_url('admin/master/app_of_candidate'), 'refresh');
        } else {

            $data['admin'] = $this->Exam_model->get_data_candidate(urldecrypt($id));
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();
            
            $number_of_can = $data['admin']['number_of_can'];
            $number_of_can_array = explode(",",$number_of_can);

            $state = $data['admin']['state'];
            $state_array = explode(",",$state);

            $city = $data['admin']['city'];
            $city_array = explode(",",$city);

            $district_code = $data['admin']['district_code'];
            $district_code_array = explode(",",$district_code);

            $city_code = $data['admin']['city_code'];
            $city_code_array = explode(",",$city_code);



            foreach ($number_of_can_array as $k=>$value1){
                $subjectId = $number_of_can_array[$k];
                $sub_info[$k]['number_of_can_array'] = $number_of_can_array[$k]; 
                $sub_info[$k]['state_array'] = $state_array[$k]; 
                $sub_info[$k]['city_array'] = $city_array[$k];
                $sub_info[$k]['district_code_array'] = $district_code_array[$k]; 
                $sub_info[$k]['city_code_array'] = $city_code_array[$k]; 
            }


            // echo '<pre>';print_r($sub_info); die();
            $sub_info['sub_info'] = $sub_info;
            $this->load->view('admin/includes/_header',$sub_info);
            $this->load->view('admin/exam/candidate_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }
    
    
    public function candidate_view($id) {

            $data['admin'] = $this->Exam_model->get_data_candidate(urldecrypt($id));
            $data['states'] = $this->location_model->get_states();
            $data['role'] = $this->auth_model->get_auth_dd();
            $data['exam'] = $this->Master_model->get_exam();
            
            $number_of_can = $data['admin']['number_of_can'];
            $number_of_can_array = explode(",",$number_of_can);

            $state = $data['admin']['state'];
            $state_array = explode(",",$state);

            $city = $data['admin']['city'];
            $city_array = explode(",",$city);

            $district_code = $data['admin']['district_code'];
            $district_code_array = explode(",",$district_code);

            $city_code = $data['admin']['city_code'];
            $city_code_array = explode(",",$city_code);



            foreach ($number_of_can_array as $k=>$value1){
                $subjectId = $number_of_can_array[$k];
                $sub_info[$k]['number_of_can_array'] = $number_of_can_array[$k]; 
                $sub_info[$k]['state_array'] = $state_array[$k]; 
                $sub_info[$k]['city_array'] = $city_array[$k];
                $sub_info[$k]['district_code_array'] = $district_code_array[$k]; 
                $sub_info[$k]['city_code_array'] = $city_code_array[$k]; 
            }


            // echo '<pre>';print_r($sub_info); die();
            $sub_info['sub_info'] = $sub_info;
            $this->load->view('admin/includes/_header',$sub_info);
            $this->load->view('admin/exam/candidate_view', $data);
            $this->load->view('admin/includes/_footer');
       
    }

    public function candiate_del($id) {

        // $this->rbac->check_operation_access();

        $this->db->delete('ci_candidate_app', array('id' => urldecrypt($id)));

        $this->session->set_flashdata('success', 'Deleted Successfully!<br/सफलतापूर्वक हटा दिया गया!>');

        redirect(base_url('admin/master/app_of_candidate'));
    }

     public function invt_list() {
        // $this->rbac->check_operation_access();

        $data['title'] = 'Invitation and Schedule List';

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/exam/invitation_list_index', $data);

        $this->load->view('admin/includes/_footer', $data);
    }

    public function invitation_list_data() {

        $data['info'] = $this->Exam_model->get_all_invites();

        // echo '<pre>';print_r($data);exit;

        $this->load->view('admin/exam/invitation_list', $data);
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

       public function date_sheet_del($id) {

        // $this->rbac->check_operation_access();

        $this->db->delete('ci_exam_invitation', array('id' => urldecrypt($id)));

        $this->session->set_flashdata('success', 'Deleted Successfully!<br/सफलतापूर्वक हटा दिया गया!>');

        redirect(base_url('admin/master/invt_list'));
    }

     public function invitation_add() {

        // $this->rbac->check_operation_access();
        
        if ($this->input->post()) {

            $sub_name = $this->input->post('sub_name') ? implode(',', $this->input->post('sub_name')) : "";
            //$exam_name = $this->input->post('exam_name') ? implode(',', $this->input->post('exam_name')) : "";
            $no_candidate = $this->input->post('no_candidate') ? implode(',', $this->input->post('no_candidate')) : "";
            $shft_exam = $this->input->post('shft_exam') ? implode(',', $this->input->post('shft_exam')) : "";
            $date_exam = $this->input->post('date_exam') ? implode(',', $this->input->post('date_exam')) : "";
            $time_exam = $this->input->post('time_exam') ? implode(',', $this->input->post('time_exam')) : "";
            if($this->input->post('subjectline') == ''){

                $subjectline = $this->input->post('exam_name');
                $subjectline_name_array = $this->Exam_model->subjectline_name($subjectline);
                $subjectline = $subjectline_name_array[0]->exam_name.'('.$subjectline_name_array[0]->exam_hindi_name.')';

            }else{
                $subjectline = $this->input->post('subjectline');
            }
            $data = array(
                'speedpost' => $this->input->post('speedpost'),
                'subjectline' => $subjectline,
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


            // echo '<pre>';print_r($data);die;
            $data = $this->security->xss_clean($data);
            $result = $this->Exam_model->add_invitation($data);

            $this->session->set_flashdata('success', 'create exam schedule successful<br/>परीक्षा कार्यक्रम सफल बनाएं');

            redirect(base_url('admin/master/invt_list'), 'refresh');
        } else {

            $data['subject'] = $this->Master_model->get_subject();


            $data['exam'] = $this->Master_model->get_exam();
            // echo '<pre>'; print_r($data['subject']); die();
            $this->load->view('admin/includes/_header');

            $this->load->view('admin/exam/invitation_add', $data);

            $this->load->view('admin/includes/_footer');
        }
    }


    // 22-09-2022 add new Code
    public function addSubjectNew($id){
        $exam_name = $this->master_model->get_exam_by_id(urldecrypt($id));
        $data['id'] = urldecrypt($id);
        $exam_name = $exam_name['exam_name'];
        $data['exam_name'] = $exam_name;

        $data['title'] = 'Add Subject For '.$exam_name;

       $this->load->view('admin/includes/_header', $data);
       $this->load->view('admin/master/add_subject_for_examname', $data);
       $this->load->view('admin/includes/_footer', $data);
}
public function view_all_subjectNew($id){
        $exam_name = $this->master_model->get_exam_by_id(urldecrypt($id));
        $data['id'] = urldecrypt($id);
      
        $exam_name = $exam_name['exam_name'];
        $data['exam_name'] = $exam_name;
        $data['title'] = 'Subject List In '.$exam_name;
        $subjectList = $this->master_model->get_subject_new_by_id(urldecrypt($id));
        $data['subjectList'] = $subjectList;
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/master/all_subject_for_exam_list', $data);
        $this->load->view('admin/includes/_footer', $data);
}

public function addsubjectforexam()
{
   // $this->rbac->check_operation_access();

   if ($this->input->post()) {
       $data = [
           'exam_id' => ucfirst($this->input->post('exam_id')),
           'sub_name' => ucfirst($this->input->post('sub_name')),
           'sub_name_hindi' => ucfirst($this->input->post('sub_name_hindi')),
           'sub_code' => ucfirst($this->input->post('sub_code')),
           'created_at' => date('Y-m-d h:m:s'),
           'status' => 1,
           'created_by' => $this->session->userdata('admin_id') != '' ? $this->session->userdata('admin_id') : 0,
       ];
     
       $data = $this->security->xss_clean($data);
    
       $subject_id = $this->input->post('subject_id');
      
       if($subject_id)
       {
        $result = $this->master_model->edit_subjectNew($data,$subject_id);
       }
       else
       {
        $result = $this->master_model->add_subjectNew($data);
       }
       // $result = $this->master_model->add_subject($data);
       

       $this->session->set_flashdata('success', 'Subject has been added successfully<br/>(विषय सफलतापूर्वक जोड़ दिया गया है)');
    //    'admin/master/view_all_subjectNew/'. urlencrypt($id)
       redirect(base_url('admin/master/view_all_subjectNew/'. urlencrypt($this->input->post('exam_id'))));
   }
}
public function edit_subject_new($sub_id,$exam_id)
{
  $subject_id = urldecrypt($sub_id);
  $exam_id = urldecrypt($exam_id);

  $exam_name = $this->master_model->get_exam_by_id($exam_id);
  $data['id'] = $exam_id;
  $exam_name = $exam_name['exam_name'];
  $data['exam_name'] = $exam_name;
  $data['title'] = 'Edit Subject For '.$exam_name;
  $data['sub_id'] = $subject_id;

  $subject = $this->master_model->edit_subject_new_by_id($subject_id);
  $data['subject'] = $subject;
//   print_r($data);
//   exit;
 $this->load->view('admin/includes/_header', $data);
 $this->load->view('admin/master/add_subject_for_examname', $data);
 $this->load->view('admin/includes/_footer', $data);
  
}

public function getSubjectNameNew() {

    if(isset($_GET['exam_id']))
    {
        $id = $_GET['exam_id'];
        $subjectList = $this->master_model->get_subject_new_by_id(urldecrypt($id));
        print_r($subjectList);
    }
}



}
?>    

