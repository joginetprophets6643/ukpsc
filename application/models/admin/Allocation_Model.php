<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_Model extends CI_Model {

   
      public function add_date_sheet($data) {

        $this->db->insert('ci_examination', $data);
         return true;
    }    

    public function get_data_for_allocation1() {

        $this->db->select('*');
        $this->db->where('invt_recieved', '1');
        $this->db->from('ci_exam_registration');
          
        $this->db->order_by(' id', 'asc');
        // echo $this->db->last_query();
        $query = $this->db->get();
        return $query->result_array();

    }    
     public function get_data_for_allocation() {

        $this->db->select('*');
        $this->db->from('ci_exam_registration');
        $this->db->join('ci_invite_return', 'ci_invite_return.ref_id = ci_exam_registration.ref_id');
        $this->db->join('ci_exam_invitation', 'ci_exam_invitation.id = ci_exam_registration.ref_id');
        // $this->db->join('ci_invite_return','ci_invite_return.id =ci_exam_invitation.created_by');
        $this->db->where('ci_exam_invitation.created_by',
        $this->session->userdata('admin_id'));
        $this->db->order_by('ci_exam_registration.admin_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();

    }

      public function get_data_for_allocation_user() {

        $this->db->select('*');
        $this->db->from('ci_invite_return');
        // $this->db->join('ci_invite_return', 'ci_invite_return.ref_id = ci_exam_registration.ref_id');
        // $this->db->join('ci_exam_invitation', 'ci_exam_invitation.id = ci_exam_registration.ref_id');
        // $this->db->join('ci_invite_return','ci_invite_return.id =ci_exam_invitation.created_by');
        // $this->db->where('ci_exam_invitation.created_by',
        // $this->session->userdata('admin_id'));
        // $this->db->order_by('ci_exam_registration.admin_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();

    }

    




}
