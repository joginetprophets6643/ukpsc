<?php defined('BASEPATH') OR exit('No direct script access allowed');







class Dashboard extends My_Controller {







	public function __construct(){



		parent::__construct();



		auth_check(); // check login auth



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