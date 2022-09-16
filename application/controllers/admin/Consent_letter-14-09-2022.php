<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consent_letter extends MY_Controller {

    public function __construct() {

        parent::__construct();
        auth_check(); // check login auth
        $this->load->model('admin/admin_model', 'admin_model');
        $this->load->model('admin/location_model', 'location_model');
        $this->load->model('admin/Certificate_model', 'Certificate_model');
        $this->load->helper('date');
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    /*Permanent Code Starts Here*/
    public function consent_list() {
        // $this->rbac->check_operation_access();
        $data['states'] = $this->location_model->get_states();
        $data['districts'] = $this->location_model->get_sub_citys();
        // echo '<pre>'; print_r($data); die();
        $data['title'] = 'Consent Letter List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/consent_letter/consent_letter_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }


    public function cosent_list_data() {
        if((isset($_GET['district_id'])) && (!isset($_GET['state_id']))){
        // if (isset($_GET['state_id'])){
            
            $city_name = '';
            $grade_name = '';
            $id = $_GET['state_id'];
            $state_name = get_district_name($id); 
            $data['info'] = $this->Certificate_model->get_all_concent_both($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            $this->load->view('admin/consent_letter/consent_letter_list', $data);

        }else if(isset($_GET['district_id'])){
        // }else if(isset($_GET['district_id'])){
        // if((isset($_GET['district_id'])) && (!isset($_GET['district_id']))){

            //$state_name = '';
            // $grade_name = '';
            
            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade']; 
            // echo $state_name; exit;
            $data['info'] = $this->Certificate_model->get_all_concent_both($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            $this->load->view('admin/consent_letter/consent_letter_list', $data);
        
        }else if(isset($_GET['grade_id'])){

            $state_id = $_GET['state_id'];
            $state_name = get_district_name($state_id);
            $district_id = $_GET['district_id'];
            $city_name = get_subcity_name($district_id);
            $grade_name = $_GET['grade'];
            // $grade_name = get_subcity_name($id); 
            // echo $grade_name; exit;
            $data['info'] = $this->Certificate_model->get_all_concent_both($state_name, $city_name, $grade_name);
            // echo '<pre>'; print_r($data); die();
            
            $this->load->view('admin/consent_letter/consent_letter_list', $data);


        }else{

            $state_name = '';
            $city_name = '';
            $grade_name = '';
            $data['info'] = $this->Certificate_model->get_all_concent_both($state_name, $city_name, $grade_name);
            $this->load->view('admin/consent_letter/consent_letter_list', $data);
        }
        // exit;
        
        
        // $data['info'] = $this->Certificate_model->get_all_concent($state_name);
        // echo '<pre>'; print_r($data); die();

       
    }
    
    
    // public function get_search_cities() {
    //     $id = $_GET['state_id'];
    //     $state_name = get_district_name($id); 
    //     echo $state_name;exit;
    // }


 public function grade_list() {
        $this->rbac->check_operation_access();
     
        $data['title'] = 'Consent Letter List';
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/consent_letter/grade_letter_index', $data);
        $this->load->view('admin/includes/_footer', $data);
    }

    
	
	public function grade_list_data() {
        $data['info'] = $this->Certificate_model->get_all_concent();
        $this->load->view('admin/consent_letter/grade_list', $data);
    }



public function consent_add() {
        // $this->rbac->check_operation_access();
        $admin_id = $this->session->userdata['admin_id'];

    if ($this->input->post('submit')) {

                $data = [
                    'school_registration_number' => $this->test_input($this->input->post('school_registration')),
                    'address' => $this->test_input($this->input->post('address')),
                    'admin_id' => $this->session->userdata('admin_id'),
                    'school_name' => $this->input->post('school_name'),
                    'landmark' => $this->input->post('landmark'),
                    'district' => $this->input->post('district'),
                    'city' => $this->input->post('city'),
                ];
                
                $data = $this->security->xss_clean($data);
                // print_r($data1); die();

                $result = $this->Certificate_model->add_register_data($data);
                if ($result) {
                    // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                    redirect(base_url('admin/step2'));
         
                }
       
        } else {
            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            // echo '<pre>';
            // print_r($data);exit;
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent',$data);
            $this->load->view('admin/includes/_footer');
        }
    }

public function consent_add_1() {
        $admin_id = $this->session->userdata['admin_id'];

    if ($this->input->post('submit')) {

                $data = [
                   'principal_name' => $this->input->post('principal_name'),
                    'pri_mobile' => $this->input->post('pri_mobile'),
                    'email' => $this->input->post('email'),
                    'whats_num' => $this->input->post('whats_num'),
                ];
                
                $data = $this->security->xss_clean($data);
                // print_r($data1); die();

                $result = $this->Certificate_model->add_edit_step_data($data,$admin_id);

                if ($result) {
                    // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                    redirect(base_url('admin/step3'));
         
                }
       
        } else {
            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent1',$data);
            $this->load->view('admin/includes/_footer');
        }
    }
	

      public function consent_add_2() {
        // $this->rbac->check_operation_access();
        $admin_id = $this->session->userdata['admin_id'];
        // print_r($admin_id); die();

    if ($this->input->post('submit')) {

                $data = [
                   'super_name' => $this->input->post('super_name'),
                    'super_design' => $this->input->post('super_design'),
                    'super_mobile' => $this->input->post('super_mobile'),
                    'super_email' => $this->input->post('super_email'),
                    'super_whatspp' => $this->input->post('super_whatspp'),
                   
                ];
                
                $data = $this->security->xss_clean($data);
                $result = $this->Certificate_model->add_edit_step_data($data,$admin_id);
                if ($result) {
                    // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                    redirect(base_url('admin/step4'));
         
                }
       
        } else {
            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            $data['user'] = $this->admin_model->get_old_data($admin_id);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent2',$data);
            $this->load->view('admin/includes/_footer');
        }
    }
    public function consent_add_3() {
        // $this->rbac->check_operation_access();
        $admin_id = $this->session->userdata['admin_id'];
        // print_r($admin_id); die();

    if ($this->input->post('submit')) {

                $data = [
                   'no_room' => $this->input->post('no_room'),
                    'no_sheet' => $this->input->post('no_sheet'),
                    'max_allocate_candidate' => $this->input->post('max_allocate_candidate'),
                    'furniture_avail' => $this->input->post('furniture_avail'),
                    'elec_avail' => $this->input->post('elec_avail'),
                    'gen_avai' => $this->input->post('gen_avai'),
                    'wash_rrom' => $this->input->post('wash_rrom'),
                    'clock_room' => $this->input->post('clock_room'),
                    'vehicle_avail' => $this->input->post('vehicle_avail'),
                    'staff_suffi' => $this->input->post('staff_suffi'),
                    'ukpsc_exxma' => $this->input->post('ukpsc_exxma'),
                    'debar' => $this->input->post('debar'),
                    'bras_Seal' => $this->input->post('bras_Seal'),
                    'remark_if' => $this->input->post('remark_if'),
                                     
                ];
                
                $data = $this->security->xss_clean($data);
                $result = $this->Certificate_model->add_edit_step_data($data,$admin_id);
                if ($result) {
                    // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                    redirect(base_url('admin/step5'));
         
                }
       
        } else {
            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            $data['user'] = $this->admin_model->get_old_data($admin_id);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent3',$data);
            $this->load->view('admin/includes/_footer');
        }
    }
     public function consent_add_4() {
        // $this->rbac->check_operation_access();
        $admin_id = $this->session->userdata['admin_id'];
        // print_r($admin_id); die();

    if ($this->input->post('submit')) {

                $data = [
                   'acc_holder_name' => $this->input->post('acc_holder_name'),
                    'ban_name' => $this->input->post('ban_name'),
                    'branch_name' => $this->input->post('branch_name'),
                    'ifsc' => $this->input->post('ifsc'),
                    'acc_num' => $this->input->post('acc_num'),
                    'acc_num_con' => $this->input->post('acc_num_con'),
                                                       
                ];
                
                $data = $this->security->xss_clean($data);
                $result = $this->Certificate_model->add_edit_step_data($data,$admin_id);
                if ($result) {
                    // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                    redirect(base_url('admin/step6'));
         
                }
       
        } else {
            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            $data['user'] = $this->admin_model->get_old_data($admin_id);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent4',$data);
            $this->load->view('admin/includes/_footer');
        }
    }
       public function consent_add_5() {

        $admin_id = $this->session->userdata['admin_id'];
    
         if (!empty($_FILES['fileName1']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName1']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName1')) {

                        $uploadData = $this->upload->data();
                        $fileName1 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName1 = '';
                    }
                } else {

                    $fileName1 = '';
                }
                if (!empty($_FILES['fileName2']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName2']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName2')) {

                        $uploadData = $this->upload->data();
                        $fileName2 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName2 = '';
                    }
                } else {

                    $fileName2 = '';
                }
                 if (!empty($_FILES['fileName3']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName3']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName3')) {

                        $uploadData = $this->upload->data();
                        $fileName3 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName3 = '';
                    }
                } else {

                    $fileName3 = '';
                }
                 if (!empty($_FILES['fileName4']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName4']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName4')) {

                        $uploadData = $this->upload->data();
                        $fileName4 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName4 = '';
                    }
                } else {

                    $fileName4 = '';
                }
                  if (!empty($_FILES['fileName5']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName5']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName5')) {

                        $uploadData = $this->upload->data();
                        $fileName5 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName5 = '';
                    }
                } else {

                    $fileName5 = '';
                }

                  if (!empty($_FILES['fileName6']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName6']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName6')) {

                        $uploadData = $this->upload->data();
                        $fileName6 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName6 = '';
                    }
                } else {

                    $fileName6 = '';
                }

    if ($this->input->post('submit')) {
         $file_movement = $this->input->post('submit') == 'Submit' ? "2" : "1";

                $data = [
                    'fileName1' => $fileName6,
                    'fileName2' => $fileName2,
                    'fileName3' => $fileName3,
                    'fileName4' => $fileName4,
                    'fileName5' => $fileName5,
                    'fileName6' => $fileName6,
                    'file_movement' => $file_movement,
                    'created_at' => date('d-m-Y : h:m:s'),
                    'created_by' => $this->session->userdata('admin_id'),                                     
                ];
                
                $data = $this->security->xss_clean($data);
                // print_r($data); die();
                $result = $this->Certificate_model->add_edit_step_data($data,$admin_id);
                if ($result) {
                    // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                    redirect(base_url('admin/step7'));
         
                }
       
        } else {
             $data['admin'] = $this->Certificate_model->get_registration_data($admin_id);
            // print_r($data['admin'] ); die();
            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent5',$data);
            $this->load->view('admin/includes/_footer');
        }
    }

    public function consent_add_6() {
        $admin_id = $this->session->userdata['admin_id'];
    if ($this->input->post('submit')) {

                $data = [
                   'acc_holder_name' => $this->input->post('acc_holder_name'),
                    'ban_name' => $this->input->post('ban_name'),
                   ];
                
                $data = $this->security->xss_clean($data);
                $result = $this->Certificate_model->add_edit_step_data($data,$admin_id);
                // if ($result) {
                //     // $this->session->set_flashdata('success', 'Request for "Consent Letter" has been add successfully!');
                //     redirect(base_url('admin/consent_letter/consent_add_5'));
         
                // }
       
        } else {

            $data['admin'] = $this->admin_model->get_user_detail($admin_id);
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent6',$data);
            $this->load->view('admin/includes/_footer');
        }
    }

	  public function down_form($id) {

        $data['id'] = ($id);
        $data['admin'] = $this->Certificate_model->get_registration_data_preview($id);
        // print_r( $data['admin'] ); die;
        $data['states'] = $this->location_model->get_states();
        // $data['states'] = $this->location_model->get_all_cities();
                           
        $this->load->view('admin/includes/_header2');
        $this->load->view('admin/consent_letter/consent_letter_preview', $data);
        // $this->load->view('admin/includes/_footer');
    }
    
     public function preview_form($id) {

        $data['id'] = ($id);
        $data['admin'] = $this->Certificate_model->get_registration_data1(urldecrypt($id))  ;
        // print_r( $data['admin'] ); die;
        $data['states'] = $this->location_model->get_states();
                           
        $this->load->view('admin/includes/_header2');
        $this->load->view('admin/consent_letter/consent_letter_preview', $data);
        // $this->load->view('admin/includes/_footer');
    }
	
	
	
	
    public function edit_consent($id) {

        $this->rbac->check_operation_access(); // check opration permission

        if ($this->input->post('submit')) {

       
            if ($this->form_validation->run() == FALSE) {

                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/consent_letter/edit_consent/' . ($id)),'refresh');
            } else {

               
                if (!empty($_FILES['fileName1']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName1']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName1')) {

                        $uploadData = $this->upload->data();
                        $fileName1 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName1 = '';
                    }
                } else {

                    $fileName1 = '';
                }
                if (!empty($_FILES['fileName2']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName2']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName2')) {

                        $uploadData = $this->upload->data();
                        $fileName2 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName2 = '';
                    }
                } else {

                    $fileName2 = '';
                }
                 if (!empty($_FILES['fileName3']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName3']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName3')) {

                        $uploadData = $this->upload->data();
                        $fileName3 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName3 = '';
                    }
                } else {

                    $fileName3 = '';
                }
                 if (!empty($_FILES['fileName4']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName4']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName4')) {

                        $uploadData = $this->upload->data();
                        $fileName4 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName4 = '';
                    }
                } else {

                    $fileName4 = '';
                }
                  if (!empty($_FILES['fileName5']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName5']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName5')) {

                        $uploadData = $this->upload->data();
                        $fileName5 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName5 = '';
                    }
                } else {

                    $fileName5 = '';
                }

                  if (!empty($_FILES['fileName6']['name'])) {

                    $config['upload_path'] = 'uploads/consent_data/';
                    $config['allowed_types'] ='jpeg|jpg|pdf';
                    $config['file_name'] = time() . '-' . $_FILES['fileName6']['name'];
                    $config['max_size'] = 1024 * 1024;

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileName6')) {

                        $uploadData = $this->upload->data();
                        $fileName6 = $uploadData['file_name'];
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', $error['error']);
                        $fileName6 = '';
                    }
                } else {

                    $fileName6 = '';
                }



                $data = array(
                     'school_registration_number' => $this->test_input($this->input->post('school_registration_number')),
                    'address' => $this->test_input($this->input->post('address')),
                    'admin_id' => $this->session->userdata('admin_id'),
                    'school_name' => $this->input->post('school_name'),
                    'landmark' => $this->input->post('landmark'),
                    'district' => $this->input->post('district'),
                    'city' => $this->input->post('city'),
                    'principal_name' => $this->input->post('principal_name'),
                    'pri_mobile' => $this->input->post('pri_mobile'),
                    'email' => $this->input->post('email'),
                    'whats_num' => $this->input->post('whats_num'),
                    'total_class_number' => $this->input->post('total_class_number'),
                    'class_sitting_capacity' => $this->input->post('class_sitting_capacity'),
                    'max_num_student' => $this->input->post('max_num_student'),
                    'furniture_avail' => $this->input->post('furniture_avail'),
                    'elec_avail' => $this->input->post('elec_avail'),
                    'gen_avai' => $this->input->post('gen_avai'),
                    'wash_rrom' => $this->input->post('wash_rrom'),
                    'clock_room' => $this->input->post('clock_room'),
                    'vehicle_avail' => $this->input->post('vehicle_avail'),
                    'staff_suffi' => $this->input->post('staff_suffi'),
                    'ukpsc_exxma' => $this->input->post('ukpsc_exxma'),
                    'debar' => $this->input->post('debar'),
                    'bras_Seal' => $this->input->post('bras_Seal'),
                    'suggetions' => $this->input->post('suggetions'),
                    'exam_center_hindi' => $this->input->post('exam_center_hindi'),
                    'exam_center_eng' => $this->input->post('exam_center_eng'),
                    'acc_holder_name' => $this->input->post('acc_holder_name'),
                    'ban_name' => $this->input->post('ban_name'),
                    'branch_name' => $this->input->post('branch_name'),
                    'ifsc' => $this->input->post('ifsc'),
                    'date' => $this->input->post('date'),
                    'ifsc' => $this->input->post('ifsc'),
                    'place' => $this->input->post('place'),
                    'fileName1' => $fileName1,
                    'fileName2' => $fileName2,
                    'fileName3' => $fileName3,
                    'fileName4' => $fileName4,
                    'fileName5' => $fileName5,
                    'fileName6' => $fileName6,
                    'last_ip' => $this->input->ip_address(),
                    // 'file_movement' => @$file_movement,
                    'last_ip' => $this->input->ip_address(),
                    'updated_at' => date('d-m-Y : h:m:s'),
                    'updated_by' => $this->session->userdata('admin_id')
                );
                $data = $this->security->xss_clean($data);

                $result = $this->Certificate_model->edit_reg_data($data,
                        urldecrypt($id));
                //               die;
                if ($result) {

                    $this->session->set_flashdata('success',
                            'User has been updated successfully!');
                    redirect(base_url('admin/consent_letter/consent_list'),
                            'refresh');
                }
            }
        } else {

            $data['id'] = ($id);
            $data['admin'] = $this->Certificate_model->get_registration_data($id);
            // print_r($data['admin']); die();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent_letter_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }
    public function permanent_preview($id) {

        $this->rbac->check_operation_access(); // check opration permission

        $this->load->view('admin/includes/_header');
        // $this->load->view('admin/consent_letter/consent_letter_preview', $data);
        $this->load->view('admin/consent_letter/consent_letter_preview');
        $this->load->view('admin/includes/_footer');
    }

    
  

    public function add_remark_concent($id) {

        if ($this->input->post('submit')) {
            $action = $this->input->post('ranking_admin') . '/' . $this->input->post('admin_role_id') . '/' . now();
            $actiontaken = $this->input->post('ranking_admin');
            $data_id = $this->db->select('*')->from('ci_exam_registration')->where('id',$id)->get()->row('id');
            $data = [
                'id' => $this->input->post('id'),
                'admin_role_id' => $this->input->post('admin_role_id'),
                'admin_role_ranking' => $action,
                'ranking_admin' => $this->input->post('ranking_admin'),
                'status_admin' => $this->input->post('status_admin'),
                'admin_date' => $this->input->post('admin_date'),
                'remard_admin' => $this->input->post('remard_admin'),
                'last_ip' => $this->input->ip_address(),
                'created_at' => date('d-m-Y : h:m:s'),
                'created_by' => $this->session->userdata('admin_id'),
            ];

            $dataUpdate = [
                'id' =>$data_id,
                'ranking_admin' => $this->input->post('ranking_admin'),
                'status_admin' => $this->input->post('status_admin'),
                'admin_date' => $this->input->post('admin_date'),
                'remard_admin' => $this->input->post('remard_admin'),
                'updated_at' => date('d-m-Y : h:m:s'),
                'updated_by' => $this->session->userdata('admin_id'),
            ];

            // $this->db->where(['id' => $id])->update('ci_certificate_permanent', $up_arr);
            $data = $this->security->xss_clean($data);
            $dataUpdate = $this->security->xss_clean($dataUpdate);
             
             // print_r($dataUpdate); die();
            $admin_role_id = $this->input->post('admin_role_id');
            $result = $this->Certificate_model->add_action_admn($data,$id,$dataUpdate);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Status Updated Successfully !! ');
                redirect(base_url('admin/consent_letter/consent_list'), 'refresh');
            }
        } else {
            $id = $id;
            $data['id'] = $id;
            $data['admin'] = $this->Certificate_model->get_registration_data1($id);
            $data['remarks'] = $this->Certificate_model->get_remarks_by_consent_id($id);
            $data['states'] = $this->location_model->get_states();

            $this->load->view('admin/includes/_header');
            $this->load->view('admin/consent_letter/consent_admin_remark', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

     public function file_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|pdf|csv';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
    public function output_file($file, $name, $mime_type = '') {
        /*
          This function takes a path to a file to output ($file),  the filename that the browser will see ($name) and  the MIME type of the file ($mime_type, optional).
         */

        //Check the file premission
        //if(!is_readable($file)) die('File not found or inaccessible!');

        $size = filesize($file);
        $name = rawurldecode($name);

        /* Figure out the MIME type | Check in array */
        $known_mime_types = array(
            "pdf" => "application/pdf",
            "txt" => "text/plain",
            "html" => "text/html",
            "htm" => "text/html",
            "exe" => "application/octet-stream",
            "zip" => "application/zip",
            "doc" => "application/msword",
            "xls" => "application/vnd.ms-excel",
            "ppt" => "application/vnd.ms-powerpoint",
            "gif" => "image/gif",
            "png" => "image/png",
            "jpeg" => "image/jpg",
            "jpg" => "image/jpg",
            "php" => "text/plain"
        );

        if ($mime_type == '') {
            $file_extension = strtolower(substr(strrchr($file, "."), 1));
            if (array_key_exists($file_extension, $known_mime_types)) {
                $mime_type = $known_mime_types[$file_extension];
            } else {
                $mime_type = "application/force-download";
            };
        };

        //turn off output buffering to decrease cpu usage
        @ob_end_clean();

        // required for IE, otherwise Content-Disposition may be ignored
        if (ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');

        header('Content-Type: ' . $mime_type);
        header('Content-Disposition: attachment; filename="' . $name . '"');
        header("Content-Transfer-Encoding: binary");
        header('Accept-Ranges: bytes');

        /* The three lines below basically make the 
          download non-cacheable */
        header("Cache-control: private");
        header('Pragma: private');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        // multipart-download and download resuming support
        if (isset($_SERVER['HTTP_RANGE'])) {
            list($a, $range) = explode("=", $_SERVER['HTTP_RANGE'], 2);
            list($range) = explode(",", $range, 2);
            list($range, $range_end) = explode("-", $range);
            $range = intval($range);
            if (!$range_end) {
                $range_end = $size - 1;
            } else {
                $range_end = intval($range_end);
            }

            $new_length = $range_end - $range + 1;
            header("HTTP/1.1 206 Partial Content");
            header("Content-Length: $new_length");
            header("Content-Range: bytes $range-$range_end/$size");
        } else {
            $new_length = $size;
            header("Content-Length: " . $size);
        }

        /* Will output the file itself */
        $chunksize = 1 * (1024 * 1024); //you may want to change this
        $bytes_send = 0;
        if ($file = fopen($file, 'r')) {
            if (isset($_SERVER['HTTP_RANGE']))
                fseek($file, $range);

            while (!feof($file) &&
            (!connection_aborted()) &&
            ($bytes_send < $new_length)
            ) {
                $buffer = fread($file, $chunksize);
                print($buffer); //echo($buffer); // can also possible
                flush();
                $bytes_send += strlen($buffer);
            }
            fclose($file);
        } else
        //If no permissiion
            die('Error - can not open file.');
        //die
        die();
    }

    public function downolad_consent_pdf($folder, $fileName, $id) {
        $id = urldecrypt($id);
        $result = $this->Certificate_model->get_consent_file_name_by_id($fileName,
                $id);
        //print_r( $result); die;
        //Set the time out
        set_time_limit(0);

        //path to the file
        if (isset($result[0]) && $result[0]->$fileName != '') {
            $file_path = FCPATH . 'uploads/' . $folder . '/' . $result[0]->$fileName;

            // print_r($file_path); die();

            //Call the download function with file path,file name and file type
            if (file_exists($file_path)) {

                // $this->output_file($file_path, $fileName . '.jpg',
                //         'image/jpg');
                $this->output_file($file_path, $fileName . '.pdf',
                        'application/pdf');
                $data['msg'] = "File downloaded successfully";
            } else {
                $data['msg'] = "No Physical File found";
            }
        } else {
            $data['msg'] = "No File uploded for this option";
        }
        echo $data['msg'];
    }
   
    public function update_grade(){

        $val=$this->input->get('val');
        $rel=$this->input->get('rel');
        // print_r($val); die();

        $add = array('ranking_admin'=> $val);

        // $result = $this->db->update('ci_exam_registration',$add)->where('id',$rel);
        $result =  $this->db->where('id',$rel)->update('ci_exam_registration', $add);
        if($result){
            $this->session->set_flashdata('Sucess','Grade Updated Successfully');
        }
    }
    public function update_status(){

        $val=$this->input->get('val');
        $rel=$this->input->get('rel');
 
        $add = array('status_admin'=> $val);

        // $result = $this->db->update('ci_exam_registration',$add)->where('id',$rel);
        $result =  $this->db->where('id',$rel)->update('ci_exam_registration', $add);
        if($result){
            $this->session->set_flashdata('Sucess','Status Updated Successfully');
        }
    }

}
