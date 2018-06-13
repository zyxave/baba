<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/09/2015
 * Time: 12:50
 */
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    private function redirect_unauthorized_login()
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
            redirect(base_url() . 'contestant');
        }
    }

    /**
     * hanya di call setelah verifikasi login
     */
    private function redirect_admin_home()
    {
        if($_SESSION['admin_jabatan'] === 'sekretariat')
        {
            redirect(base_url() . 'admin/sekretariat');
        }
        else if($_SESSION['admin_jabatan'] === 'soal')
        {
            redirect(base_url() . 'admin/soal');
        }
        else if($_SESSION['admin_jabatan'] === 'sistem informasi')
        {
            redirect(base_url() . 'admin/sisteminformasi');
        }
    }

    public function index()
    {
        $this->redirect_unauthorized_login();
        $this->data['pageTitle'] = "ADMIN LOGIN - ILPC UBAYA 2018";
        $this->render_view('info/admin_login',NULL);
    }

    public function do_login()
    {
        $this->redirect_unauthorized_login();
        if($this->input->post('btnLogin') !== NULL)
        {
            $this->load->model('admin_model');
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            //$hasil = $this->admin_model->isAdmin($username, $password);
            $hasil = $this->admin_model->login($username,$password);

            $url = "https://www.google.com/recaptcha/api/siteverify";
            $secretkey ="6LdySAkUAAAAAKKbcFkqTem_HmRAlxTwvOG5V2pI";
            $response = file_get_contents($url."?secret=".$secretkey."&response=".$_POST['g-recaptcha-response']."&remoteip=".
                $_SERVER['REMOTE_ADDR']);

            $captchaResponse = json_decode($response);
            if(isset($captchaResponse->success) AND $captchaResponse->success==true)
            {

                if ($hasil !== NULL)
                {
                    $_SESSION["id_kompetisi"] = $hasil['id_kompetisi'];
                    $_SESSION["admin_id"] = $hasil['id'];
                    $_SESSION["admin_nama"] = $hasil['nama'];
                    $_SESSION["admin_username"] = $username;
                    $_SESSION["admin_jabatan"] = $hasil['jabatan'];

                    $this->redirect_admin_home();
                }
                else
                {
                //$this->session->set_flashdata("error", "Your username or password is not valid");
                    $_SESSION['loginFailed'] = "Your username or password is incorrect";
                    $this->session->mark_as_flash('loginFailed');
                    redirect(base_url() . "index.php/admin");
                }

            }
            else
            {
                redirect(base_url() . 'admin/login');
            }
        }
    }

    public function do_logout()
    {
        if(isset($_SESSION['admin_id']))
        {
            unset($_SESSION['id_kompetisi']);
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_nama']);
            unset($_SESSION['admin_username']);
            unset($_SESSION['admin_jabatan']);

            $_SESSION['logoutMessage'] = "You're successfully logged out";
            $this->session->mark_as_flash('logoutMessage');
            redirect(base_url() . 'admin');
        }
        else
        {
            redirect(base_url() . 'admin/login');
        }
    }


}
?>