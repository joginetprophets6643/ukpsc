<?php defined('BASEPATH') OR exit('No direct script access allowed');







class Dashboard extends My_Controller {


 




	public function __construct(){



		parent::__construct();



		auth_check(); // check login auth

		$this->load->model("admin/Certificate_model", "Certificate_model");
		$this->load->model('admin/Allocation_Model', 'Allocation_Model');

		$this->rbac->check_module_access();



		if($this->uri->segment(3) != '')

		$this->rbac->check_operation_access();



		$this->load->model('admin/dashboard_model', 'dashboard_model');



	}



	//--------------------------------------------------------------------------

        /*

         *  [admin_id] => 31

            [username] => superadmin

            [admin_role_id] => 1

            [admin_role] => Super Admin

            [is_supper] => 1

            [is_admin_login] => 1

         */

	public function index(){

		$data['title'] = 'Dashboard';
        $data['all_users'] = $this->dashboard_model->get_all_users();
		$data['active_users'] = $this->dashboard_model->get_active_users();
		$data['deactive_users'] = $this->dashboard_model->get_deactive_users();

		// print_r($_SESSION['admin_role_id']); die();

		// FOr Count Users
		$data["row"] = $this->Certificate_model->get_all_active_consent_reg();
		foreach ($data["row"] as $valueid){
            // echo '<pre>';
            $ref_id = $valueid['ref_id'];
            $school_id = $valueid['id'];
            
            $get_full_data = $this->Certificate_model->get_all_data_consent($ref_id);
        }
		
        $data["recieve_count"] = isset($get_full_data)?count($get_full_data):0;
		$admin_id = $this->session->userdata('admin_id'); 
		$data['allocation_recieved'] = count($this->Allocation_Model->allocationConsentRecievedByUser($admin_id));

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/dashboard/index_'.$_SESSION['admin_role_id']); //general .$_SESSION['admin_role_id'].$_SESSION['admin_role_id']
		$this->load->view('admin/includes/_footer');

	}



	//--------------------------------------------------------------------------



	public function index_1(){



		$data['all_users'] = $this->dashboard_model->get_all_users();



		$data['active_users'] = $this->dashboard_model->get_active_users();



		$data['deactive_users'] = $this->dashboard_model->get_deactive_users();



		$data['title'] = 'Dashboard';



		$this->load->view('admin/includes/_header', $data);



    	$this->load->view('admin/dashboard/index', $data);



    	$this->load->view('admin/includes/_footer');



	}







	//--------------------------------------------------------------------------



	public function index_2(){



		$data['title'] = 'Dashboard';



		$this->load->view('admin/includes/_header');



    	$this->load->view('admin/dashboard/index2');



    	$this->load->view('admin/includes/_footer');



	}







	//--------------------------------------------------------------------------



	public function index_3(){



		$data['title'] = 'Dashboard';



		$this->load->view('admin/includes/_header');



    	$this->load->view('admin/dashboard/index3');



    	$this->load->view('admin/includes/_footer');



	}





}

?>	