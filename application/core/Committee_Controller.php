<?php
class Committee_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_session();
	}

	// function controller harus lowercase

	private function check_session()
	{
		if(isset($_SESSION['admin_id']))
		{
			/* 
			TODO: check double device login
			*/
		}
		else if(isset($_SESSION['login_id']))
		{
			redirect(base_url() . 'contestant');
		}
		else
		{
			redirect(base_url());
		}
	}
}
?>