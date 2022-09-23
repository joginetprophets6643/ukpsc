<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends CI_Model {

    public function add_register_data($data) {
        $admin_id = $this->session->userdata('admin_id');
        $this->db->insert('ci_exam_registration', $data);
        
        return true;
        // $this->db->where('admin_id', $admin_id);
        // $this->db->update('ci_exam_registration', $data);
        // return true;
    }

    // getting register details
    public function get_user_detail_register($admin_id,$exam_id){
        $admin_id = $this->session->userdata('admin_id');
        
        $this->db->where('admin_id',$admin_id);
        $this->db->where('ref_id',$exam_id);
        $this->db->from('ci_exam_registration');
        $this->db->order_by('ci_exam_registration.id', 'desc');

        $query = $this->db->get();
        $result = $query->result_array();
        
        if(!empty($result)){
            // echo 'asd';
            // exit;
            // return $query->result_array();
            $this->db->where('admin_id',$admin_id);
            $this->db->from('ci_admin');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;

        }else{
            // echo '123456789';
            // exit;
            $this->db->where('admin_id',$admin_id);
            $this->db->from('ci_admin');
            $query = $this->db->get();
            $result = $query->result_array();
            $data = [
                'admin_id' => $admin_id,                
                'ref_id' => $exam_id,                
            ];
            $this->db->update('ci_exam_registration', $data);
            return $result;
        }
    }

    public function generatedistrict($district){
		// echo $city_id;exit;
		if($district!='')
			$query = $this->db->query("SELECT ci_cities.name from ci_cities where id = $district");
		else
			$query = $this->db->query("SELECT ci_cities.name from ci_cities where id = 1");
		
		return $query->result();
	}
    public function generateukpscid($city_id){
		// echo $city_id;exit;
		if($city_id!='')
			$query = $this->db->query("SELECT subcityname from ci_sub_cities where id = $city_id");
		else
			$query = $this->db->query("SELECT subcityname from ci_sub_cities where id = 1");
		
		return $query->result();
	}
    // getting exam details
    public function get_exam_detail($exam_id) {
        $admin_id = $this->session->userdata('admin_id');
        
        $this->db->where('id',$exam_id);
        $this->db->from('ci_exam_invitation');
        $this->db->order_by('ci_exam_invitation.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        return $query->result_array();
    }
    
    public function add_examination_register($data) {
        // echo $data['ref_id']; exit;
        $ref_id = $data['ref_id'];
        $admin_id = $this->session->userdata('admin_id');
        $this->db->where('admin_id', $admin_id);
        $this->db->where('ref_id', $ref_id);
        $this->db->update('ci_exam_registration', $data);
        // echo $this->db->last_query();
        // exit;
        return true;
    }

    public function get_registration_data($id) {
        $query = $this->db->get_where('ci_exam_registration',
                array('id' => $id));
        // echo $this->db->last_query();
        return $result = $query->row_array();
    }  
    public function get_registration_data_preview($id) {
        $query = $this->db->get_where('ci_exam_registration',
                array('admin_id' => $id));
        // echo $this->db->last_query();
        return $result = $query->row_array();
    }
    
    public function get_registration_preview($id,$ref_id) {
        $query = $this->db->get_where('ci_exam_registration', array('admin_id' => $id, 'ref_id' => $ref_id));
        // echo $this->db->last_query();
        return $result = $query->row_array();
    }

    public function get_registration_data1($id) {
        $query = $this->db->get_where('ci_exam_registration',
                array('id' => $id));
        return $result = $query->row_array();
    }

    public function add_edit_step_data($data, $admin_id) {
        $this->db->where('admin_id', $admin_id);
        
        $this->db->update('ci_exam_registration', $data);
        return true;
    }
    
    public function add_edit_step_update($data, $admin_id) {

        $id = $this->session->userdata('admin_id');
        $this->db->select('*');
        $this->db->from('ci_exam_registration');
        $this->db->where('admin_id', $id);
        $this->db->where('ref_id', $data['ref_id']);
        $q = $this->db->get();
        $result = $q->result_array();
        if(!empty($result)){
            // echo "Given Array is not empty please wait <br>";exit;
            $this->db->where('admin_id', $admin_id);
            $this->db->where('ref_id', $data['ref_id']);
            $this->db->update('ci_exam_registration', $data);
            // echo $this->db->last_query();exit;
            return true;
        }else {
            // echo '<pre>';print_r($data);exit;
            $this->db->insert('ci_exam_registration', $data);
            return true;
        }
            
        
        // if(empty($empty_array))
            
        // echo '<pre>';print_r( $q->result_array());exit;

        // $this->db->where('admin_id', $admin_id);
        // $this->db->where('ref_id', $data['ref_id']);
        // $this->db->update('ci_exam_registration', $data);
        // return true;
    }

    public function edit_reg_data($data) {

        $this->db->where('id', $id);
        $this->db->update('ci_exam_registration', $data);
        return true;
    }


    public function get_user_email() {

        $this->db->select('email');
        $this->db->from('ci_admin');
        $this->db->where('admin_role_id', 6);
        $q = $this->db->get();
        // echo $this->db->last_query();
        return $q->result_array();
    }

    function get_all_concent() {

        // echo $state_name;
        $this->db->from('ci_exam_registration');

        if ($this->session->userdata('filter_state') != '') {
            $this->db->where('ci_exam_registration.state ',
                    $this->session->userdata('filter_state'));
        }
        if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
            $this->db->where('ci_exam_registration.district ',
                    $this->session->userdata('filter_district'));
        }

        if ($this->session->userdata('filter_status') != '') {
            $this->db->where('ci_exam_registration.file_movement ',
                    $this->session->userdata('filter_status'));
        }

        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_exam_registration.file_movement !=', 1);
//        }
//         if ($admin_role_id == 3 || $admin_role_id == 4) {
//             $this->db->where('ci_exam_registration.state',
//                     $this->session->userdata('state_id'));
// //            $this->db->where('ci_exam_registration.file_movement !=', 1);
//         }
//         if ($admin_role_id == 5) {
//             $this->db->where('ci_exam_registration.district',
//                     $this->session->userdata('district_id'));
// //            $this->db->where('ci_exam_registration.file_movement !=', 1);
//         }
        if ($admin_role_id == 6) {
            $this->db->where('ci_exam_registration.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');

        // $this->db->where('status','1');

        $this->db->order_by('ci_exam_registration.id', 'desc');

        $query = $this->db->get();
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
            
        }
        // echo '<pre>';print_r($module); die();
        return $module;
    }
    
    function get_all_concent_both($state_name, $city_name, $grade_name) {

        // echo $state_name;
        $this->db->from('ci_exam_registration');

        if ($city_name != '' && $state_name != '' ) {

            $this->db->where('ci_exam_registration.district', $state_name);
            $this->db->where('ci_exam_registration.city', $city_name);
        }

        if ($state_name != '' || $state_name = '') {
            
            $this->db->where('ci_exam_registration.district', $state_name);
        }
        
        
        if ($grade_name != '') {

            $this->db->where('ci_exam_registration.ranking_admin', $grade_name);
        }

        // if ($this->session->userdata('filter_state') != '' && $this->session->userdata('filter_district') != '') {
        //     $this->db->where('ci_exam_registration.district ',
        //             $this->session->userdata('filter_district'));
        // }

        // if ($this->session->userdata('filter_status') != '') {
        //     $this->db->where('ci_exam_registration.file_movement ',
        //             $this->session->userdata('filter_status'));
        // }

        $admin_role_id = $this->session->userdata('admin_role_id');
//        if ($admin_role_id == 1 || $admin_role_id == 2) {
//            
//            $this->db->where('ci_exam_registration.file_movement !=', 1);
//        }
//         if ($admin_role_id == 3 || $admin_role_id == 4) {
//             $this->db->where('ci_exam_registration.state',
//                     $this->session->userdata('state_id'));
// //            $this->db->where('ci_exam_registration.file_movement !=', 1);
//         }
//         if ($admin_role_id == 5) {
//             $this->db->where('ci_exam_registration.district',
//                     $this->session->userdata('district_id'));
// //            $this->db->where('ci_exam_registration.file_movement !=', 1);
//         }
        if ($admin_role_id == 6) {
            $this->db->where('ci_exam_registration.created_by',
                    $this->session->userdata('admin_id'));
        }
        // End Filter data as per user role


        $filterData = $this->session->userdata('filter_keyword');

        // $this->db->where('status','1');

        $this->db->order_by('ci_exam_registration.id', 'desc');

        $query = $this->db->get();
        // echo '<pre>';print_r($query->result_array());die;
        // echo $this->db->last_query();
        $module = array();

        if ($query->num_rows() > 0) {
            $module = $query->result_array();
            
        }
        // echo '<pre>';print_r($module); die();
        return $module;
    }

    public function add_action_admn($data, $id, $dataUpdate) {
        $this->db->trans_start();
        $this->db->insert('ci_consent_remarks', $data);
        /// Update file_movement status
        $this->db->where('id', $id);
        $this->db->update('ci_exam_registration', $dataUpdate);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        }
    }
	

    // public function get_permanent_by_id($id) {
    // $query = $this->db->get_where('ci_certificate_permanent',
    // array('id' => $id));
    // return $result = $query->row_array();
    // }
	
	 public function get_all_active_consent() {
        $admin_id = $this->session->userdata('admin_id');
        $this->db->where('ci_exam_invitation.invite_sent','1');
        $this->db->where('admin_id',$admin_id);
        $this->db->from('ci_exam_invitation');
        $this->db->join(' ci_exam_registration', ' ci_exam_registration.ref_id = ci_exam_invitation.id');
        $this->db->order_by('ci_exam_invitation.id', 'desc');
   
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_all_data_consent($ref_id) {
    
        $ref_id = isset($ref_id)?$ref_id:0;
      
        $admin_id = $this->session->userdata('admin_id');
       
        // // echo $examinationid;exit;
        // $this->db->where('invite_sent','1');
        // $this->db->where('id','1');
        // // $this->db->where('id',$examinationid);
        // $this->db->from('ci_exam_invitation');
        // $this->db->order_by('ci_exam_invitation.id', 'desc');

        // $this->db->select('*');   
        // // $this->db->select('ci_exam_invitation.*, ci_exam_registration.* '); 
        // $this->db->from('ci_exam_invitation');
        // $this->db->join('ci_exam_registration', 'ci_exam_invitation.ref_id = ci_exam_registration.ref_id');
        // $query = $this->db->get();
        // echo '<pre>';
        // print_r($this->db->last_query());   
        // echo '<hr/>';
        // print_r($query);
        // $query = $this->db->query("SELECT  FROM `ci_exam_invitation` as cie left JOIN `ci_exam_registration` as cir ON cie.`id` = cir.`ref_id` where cie.`invite_sent` = '1'");
        $query = $this->db->query("SELECT cie.id as cieid, cie.speedpost as ciespeedpost, cie.subjectline as ciesubjectline, cie.startdate as ciestartdate, cie.enddate as cieenddate, cir.admin_id as ciradminid , cir.consents_signstamp_status as circonsents_signstamp_status  FROM `ci_exam_invitation` as cie left JOIN `ci_exam_registration` as cir ON cie.`id` = cir.`ref_id` where cir.`invite_sent` = '1' and cie.id=$ref_id and cir.admin_id=$admin_id");

        // SELECT cie.id as cieid, cie.speedpost as ciespeedpost, cie.subjectline as ciesubjectline, cie.startdate as ciestartdate, cie.enddate as cieenddate, cir.admin_id as ciradminid , cir.consents_signstamp_status as circonsents_signstamp_status FROM `ci_exam_invitation` as cie left JOIN `ci_exam_registration` as cir ON cie.`id` = cir.`ref_id` where cie.id =2 and cir.admin_id=328;
        // $query = $this->db->query("SELECT * FROM `ci_exam_invitation` where `ci_exam_invitation`.`invite_sent` = '1'");
        // $query = $this->db->query("SELECT ciei.id,cier.ref_id  FROM `ci_exam_invitation` as ciei JOIN `ci_exam_registration` as cier ON `ci_exam_invitation`.`id` = `ci_exam_registration`.`ref_id` where `ci_exam_invitation`.`invite_sent` = '1'");
        // echo '<hr/>';
       
        return $query->result_array();
    }
	 public function get_examination_form($examinationid) {
        $admin_id = $this->session->userdata('admin_id');
        $this->db->where('invite_sent','1');
        $this->db->where('id',$examinationid);
        $this->db->from('ci_exam_invitation');
        $this->db->order_by('ci_exam_invitation.id', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }
public function get_all_active_consent_reg() {
        $admin_id = $this->session->userdata('admin_id');
        $this->db->where('admin_id',$admin_id );
        $this->db->from('ci_exam_registration');
        $this->db->order_by('ci_exam_registration.id', 'desc');
   
        $query = $this->db->get();
        return $query->result_array();
    }


    // public function get_all_active_consent() {
    //     $admin_id = $this->session->userdata('admin_id');
    //     $this->db->select('ci_exam_invitation.*, ci_exam_registration.* ');
    //     $this->db->from('ci_exam_invitation');
    //     $this->db->join('ci_exam_registration',
    //             'ci_exam_registration.admin_id =ci_exam_invitation.id');
    //     // $this->db->where('ci_exam_registration.admin_id', $admin_id);
    //     $this->db->where('invite_sent','1');
    //     $this->db->order_by('ci_exam_registration.admin_id', 'asc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
public function get_all_recieved_consent() {
           // $admin_id = $this->session->userdata('admin_id');
        $this->db->from('ci_invite_return');
        // $this->db->where('last_id',$admin_id);
       
        $query = $this->db->get();

        // $this->db->last_query();
        return $query->result_array();
    }

	
	
    // function get_all_active_consent() {

    //     $this->db->from('ci_exam_registration');

    //    -----------------------------------------------------------------------
    //     Filter data as per user role
    //     $admin_role_id = $this->session->userdata('admin_role_id');

    //     End Filter data as per user role

    //     $filterData = $this->session->userdata('filter_keyword');
    //     if ($filterData != '') {
    //         $this->db->group_start();
    //         $this->db->like('ci_exam_registration.district',
    //                 $filterData);
    //         $this->db->or_like('ci_exam_registration.address1',
    //                 $filterData);
    //         $this->db->or_like('ci_exam_registration.city', $filterData);

    //         $this->db->group_end();
    //     }
    //     $this->db->where('status_admin', 'Active');

    //     $this->db->order_by('ci_exam_registration.id', 'desc');

    //     $query = $this->db->get();
    //     echo $this->db->last_query();
    //     $module = array();

    //     if ($query->num_rows() > 0) {
    //         $module = $query->result_array();
    //     }
    //    print_r($module); die();
    //     return $module;
    // }

    public function get_remarks_by_consent_id($id) {
        $this->db->select('ci_consent_remarks.*, ci_admin.* ');
        $this->db->from('ci_consent_remarks');
        $this->db->join('ci_admin',
                'ci_admin.admin_id =ci_consent_remarks.created_by');
        $this->db->where('ci_consent_remarks.id', $id);
        $this->db->order_by('ci_consent_remarks.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

//     public function add_provisional($json_data) {
//             $this->db->insert('ci_certificate_provisional', $json_data);
//             if ($this->db->affected_rows() > 0) {
//             return true;
//             } else {
//             return false;
//             }
// }



    /* get data */

    public function getData($table_name = false, $sel_col = false,
            $con = array(), $id = false) {
        $query = $this->db->select($sel_col)->from($table_name)->where($con)->get();
        // echo $this->db->last_query();
        if ($id) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    function change_status() {
        $this->db->set('is_active', $this->input->post('status'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('ci_certificate_provisional');
        // ECHO $this->db->last_query();
    }

    public function get_consent_file_name_by_id($fileName, $id) {
        $this->db->select($fileName);
        $this->db->from('ci_exam_registration');
        $this->db->where('id', $id);
        // $this->db->order_by(' id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

}
