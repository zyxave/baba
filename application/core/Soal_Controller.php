<?php
/**
 * User: CWR
 * Date: 20/10/2015
 * Time: 9:46
 */
class Soal_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_session();
    }

    // function controller harus lowercase

    private function check_session()
    {
        if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_jabatan']))
        {
            if($_SESSION['admin_jabatan'] != 'soal')
            {
                redirect(base_url() . 'admin/login');
            }
            /*akan datang: check double device login */
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