<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/12/2015
 * Time: 11:31
 */
class Forgot_password extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('contestant_model','contestantModel');
        $this->load->model('competition_model', 'competitionModel');
    }

    public function index()
    {
        $this->data['pageTitle'] = 'ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('password/lupa_password','info/masterlogin');
    }

    // create link untuk reset pass
    public function reset()
    {
        if($this->input->post('btnResetPass') === NULL)
        {
            redirect(base_url() . 'forgot_password');
        }

        $_SESSION['resetPasswordMessage'] = "Apabila username yang anda masukkan benar, kami akan mengirimkan link reset password ke alamat e-mail ketua kelompok anda";
        $this->session->mark_as_flash('resetPasswordMessage');

        $username = $this->input->post('username');
        $competitionId = $this->competitionModel->getOpenCompetitionId();
        $teamId = $this->contestantModel->getIdTim($username, $competitionId);

        if($teamId === null)
            redirect(base_url() . 'login');

        if(!$this->contestantModel->checkResetPasswordLimit($teamId))
        {
            $_SESSION['resetLimitExceeded'] = true;
            $this->session->mark_as_flash('resetLimitExceeded');
            redirect(base_url() .'forgot_password/limit_exceeded');
        }

        $reset = $this->contestantModel->createResetPasswordLink($teamId,$competitionId);

        if($reset !== false)
        {
            $this->send_reset_link($reset['email'], $reset['token']);
        }

        redirect(base_url() . 'login');
    }

    private function send_reset_link($address, $token)
    {
        $sendgrid = new SendGrid('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');

        $textMessage = "Anda menerima e-mail ini karena anda memohon untuk reset password akun ILPC UBAYA 2018 ( http://ilpc.ifubaya.com ).

        Silahkan mengunjungi halaman berikut ini dan masukkan password baru anda.\n
        http://ilpc.ifubaya.com/forgot_password/verify_reset/" . $token .
        "
        Halaman di atas akan kadaluarsa 2 jam sejak permintaan dilakukan.

        Apabila anda tidak melakukan permintaan reset ini, silahkan hubungi panitia ILPC 2018 ( http://ilpc.ifubaya.com/contact )


        Salam,
        Panitia Sistem Informasi ILPC 2018";

        $textHtml = '<html><head></head>
<body>
<pre style="font-size:11pt">

Anda menerima e-mail ini karena anda memohon untuk reset password akun <a href="http://ilpc.ifubaya.com">ILPC UBAYA 2018</a>.

Silahkan mengunjungi link berikut ini untuk memasukkan password baru anda.
<a href="' . base_url() . 'forgot_password/verify_reset/' . $token . '">Reset Password</a>

Link di atas akan kadaluarsa 2 jam sejak permintaan dilakukan.


Apabila anda tidak pernah meminta reset password ini, silahkan hubungi <a href="http://ilpc.ifubaya.com/contact">panitia ILPC 2018</a>


Salam,
Panitia Sistem Informasi ILPC 2018

Gedung TC 2.1 Universitas Surabaya
Jl. Raya Kali Rungkut, Surabaya

</pre>
</body></html>';

        $email = new SendGrid\Email();
        $email
            ->addTo($address)
            ->setFrom('forgot-password@ifubaya.com')
            ->setSubject('[ILPC 2018] Permintaan Reset Password')
            ->setText($textMessage)
            ->setHtml($textHtml);
        ;
        $sendgrid->send($email);

    }

    public function verify_reset($token)
    {
        $result = $this->contestantModel->verifyResetToken($token);
        $teamId = $result['id_tim'];
        if($result !== false)
        {
            $this->data['teamId'] = $teamId;
            $this->data['token'] = $result['token'];

            $this->render_view('password/password_baru', 'info/masterlogin');
        }
        else
        {
            //$this->render_view('password/invalid_reset_request', 'main/master_public_nonavbar');
            redirect(base_url() . 'error');
        }
    }

    public function limit_exceeded()
    {
        if(!isset($_SESSION['resetLimitExceeded']))
            redirect(base_url() . 'forgot_password');

        $this->render_view('password/reset_overkuota', 'info/masterlogin');
    }

    public function change_password()
    {
        if($this->input->post('btnChangePassword') === NULL)
            redirect(base_url() . '/login');

        $this->form_validation->set_rules('newPassword', "Password", 'required|min_length[7]');
        $this->form_validation->set_rules('repeatNewPassword', "Ulang Password", 'required|matches[newPassword]|min_length[7]');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['teamId'] = $this->input->post('id');
            $this->data['token'] = $this->input->post('token');
            $this->render_view('password/password_baru', 'info/masterlogin');
        }
        else
        {
            $password = $this->input->post('newPassword');
            $teamId = $this->input->post('id');
            $token = $this->input->post('token');

            if(! $this->contestantModel->saveNewPassword($teamId, $token, $password))
            {
                $this->render_view('password/reset_request_salah', 'info/masterlogin');
            }
            else
            {
                $_SESSION['resetSucceed'] = "Reset Password berhasil dilakukan, Silahkan login dengan password anda yang baru";
                $this->session->mark_as_flash('resetSucceed');
                redirect(base_url() . 'login');
            }
        }
    }
}
?>