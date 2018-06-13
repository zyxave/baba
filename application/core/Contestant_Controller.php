<?php
class Contestant_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_session();
	}

	// function controller harus lowercase

	private function check_session()
	{
		if(isset($_SESSION['login_id']))
		{
			/* 
			check double device login
			*/
			$this->load->model('contestant_model');

			$tokenValid = $this->contestant_model->checkToken($_SESSION['login_id'],$_SESSION['token']);
			if(!$tokenValid)
			{
				session_destroy();
				redirect(base_url() . 'login');
			}
		}
		else if(isset($_SESSION['admin_id']))
		{
			redirect(base_url() . 'admin/login');
		}
		else
		{
			redirect(base_url() . 'login');
		}
	}
}
?>