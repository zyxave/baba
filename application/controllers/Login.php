<?php

/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/09/2015
 * Time: 19:06
 */
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contestant_model');
    }


    private function redirect_unauthorized_login()
    {
        if(isset($_SESSION['login_id']))
        {
            redirect(base_url() . 'contestant');
        }
        else if(isset($_SESSION['admin_id']))
        {
            if($_SESSION['admin_jabatan'] === 'sekretariat')
            {
                redirect(base_url() . 'admin/sekretariat');
            }
            else if ($_SESSION['admin_jabatan'] === 'soal')
            {
                redirect(base_url() . 'admin/soal');
            }
        }
    }

    public function index()
    {
        $this->redirect_unauthorized_login();
        if(isset($_SESSION['logoutMessage']))
        {
            $this->data['logoutMessage'] = $_SESSION['logoutMessage'];
            session_destroy();
        }
        $this->data['pageTitle'] = "LOGIN - ILPC UBAYA 2018";
        $this->render_view('info/login','info/masterlogin');
    }

    public function do_login()
    {
        $this->redirect_unauthorized_login();
        if($this->input->post('btnLogin') !== NULL)
        {
            $this->load->model(competition_model);
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $idKompetisi = $this->competition_model->getOpenCompetitionId();
            $hasil = $this->contestant_model->login($username, $password, $idKompetisi);

            if($hasil !== NULL)
            {
                $_SESSION['id_kompetisi'] = $hasil['id_kompetisi'];
                $_SESSION['login_id'] = $hasil['id'];
                $_SESSION['login_nama'] = $hasil['nama'];
                $_SESSION['login_username'] = $username;
                $_SESSION['token'] = $hasil['token'];
                redirect(base_url() . 'contestant');
            }
            else
            {
                $_SESSION['loginFailed'] = "Your username or password is incorrect";
                $this->session->mark_as_flash('loginFailed');
                redirect(base_url(). 'login');
            }
        }
        else
        {
            redirect(base_url() . 'login');
        }
    }

    private function set_login_validation()
    {
        //$this->form_
    }

    public function do_logout()
    {
        if(isset($_SESSION['admin_id']))
        {
            if($_SESSION['admin_jabatan'] === 'sekretariat')
            {
                redirect(base_url() . 'admin/sekretariat');
            }
            else if ($_SESSION['admin_jabatan'] === 'soal')
            {
                redirect(base_url() . 'admin/soal');

            }
        }
        else if(isset($_SESSION['login_id']))
        {
            unset($_SESSION['id_kompetisi']);
            unset($_SESSION['login_id']);
            unset($_SESSION['login_nama']);
            unset($_SESSION['login_username']);
            unset($_SESSION['token']);
            unset($_SESSION['kontes']);
            //$this->session->sess_destroy();
            //session_destroy();
            $_SESSION['logoutMessage'] = "You're successfully logged out";
            $this->session->mark_as_flash('logoutMessage');
            redirect(base_url());
            //$this->render_view('main/teamlogin',NULL);
        }
        else
        {
            redirect(base_url());
        }
    }

    public function change_password(){
        /*$this->redirect_unauthorized_login();*/
        $this->form_validation->set_rules('password', "Password", 'required|min_length[5]');
        $this->form_validation->set_rules('conf_password', "Confirm Password", 'required|matches[password]|min_length[5]');
        if($this->input->post('btnChange') !== NULL)
        {
            $this->load->model(competition_model);
            $password = $this->input->post('password');
            $newpassword = $this->input->post('newpassword');
            $repassword = $this->input->post('repassword');
            $loginid = $_SESSION['login_id'];

            $hasil = $this->contestant_model->cekpassword($loginid, $password);

            if($hasil !== NULL)
            {
                    $this->contestant_model->changepassword($loginid,$repassword);
                    redirect(base_url() . 'contestant');
            }
            else
            {
                $_SESSION['passwordFailed'] = "Your password is incorrect";
                $this->session->mark_as_flash('changefailed');
                redirect(base_url(). 'login/change_password');
            }
        }
        else
        {
            redirect(base_url() . 'login/change_password');
        }
    }
}
?>