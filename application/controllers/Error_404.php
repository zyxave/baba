<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_404 extends CI_Controller {

	public function index()
	{
        $this->load->view('info/notfound');
	}
}
