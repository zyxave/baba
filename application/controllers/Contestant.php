<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contestant extends Contestant_Controller{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('contestant_model');
	}

	public function index()
	{
        $status = $this->contestant_model->getStatusTim($_SESSION['login_id']);
        $this->data['status'] = $status;
		//$this->load->view('contestant/contestant_home');
        $this->data['pengumuman']=1;
        $this->data['home'] = true;      
		$this->render_view('contestant/contestant','contestant/mastercontestant');
        
	}

    public function profile()
    {
        $this->data['tim'] = $this->contestant_model->getDataTim($_SESSION['login_id'], $_SESSION['id_kompetisi']);
        $this->data['anggota'] = $this->contestant_model->getDataAnggota($_SESSION['login_id']);
        $this->render_view('contestant/team_profile','contestant/mastercontestant');
    }

    public function payment()
    {
        $status = $this->contestant_model->getStatusTim($_SESSION['login_id']);
        $this->data['status'] = $status;
        $this->data['payment'] = 1;

        $this->load->model('registration_model');
        $this->data['unpaidTeams'] = $this->registration_model->getUnpaidTeams($_SESSION['login_id'], $_SESSION['id_kompetisi']);

        $this->render_view('contestant/payment','contestant/mastercontestant');
    }

    public function confirm_payment()
    {
        if($this->input->post('confirmPayment'))
        {
            //$this->form_validation->set_rules("keterangan", "Keterangan", 'trim|max_length[50]');
            $err = 0;
            if ($_FILES['fotoTransfer']["error"] > 0)
            {
                $err = 1;
            }
            else
            {
                if ($_FILES["fotoTransfer"]["size"] > (1024 * 1024)) {
                    $err = 1;
                }
                if ($_FILES["fotoTransfer"]["type"] != "image/jpeg" && $_FILES["fotoTransfer"]["type"] != "image/jpg" && $_FILES["fotoTransfer"]["type"] != "image/png") {
                    $err = 1;
                }
            }

            //$this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

            //if ($this->form_validation->run() == FALSE || isset($error))
            if($err == 1)
            {
                    //$this->data['fotoError'] = $error;
                /*$this->data['errors']*/
                $_SESSION['errors'] = "Konfirmasi Pembayaran Gagal. Mohon upload foto bukti transfer sesuai kriteria.";
                $this->session->mark_as_flash('errors');
                /*$status = $this->contestant_model->getStatusTim($_SESSION['login_id']);
                $this->data['status'] = $status;
                $this->render_view('contestant/payment','contestant/master_contestant');*/
                redirect(base_url() . 'contestant/payment');

            }
            else
            {
                //upload bukti transfer
                $config['upload_path'] = 'asset/images/transfer/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1024'; // dalam KB
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('fotoTransfer');

                $uploaded = $this->upload->data();
                $buktiTransfer = "asset/images/transfer/" . $uploaded['file_name'];

                $this->load->model('registration_model');
                $this->registration_model->confirmPayment($_SESSION['login_id'], $buktiTransfer);

                $_SESSION['confirmationMessage'] = "Anda telah mengirimkan foto bukti transfer";
                $this->session->mark_as_flash('confirmationMessage');
                redirect(base_url() . 'contestant/payment');
            }

        }
        else
        {
            redirect(base_url(). 'contestant');
        }
    }

    public function change_password(){
        if($this->input->post('btnChange') !== NULL)
        {
            $this->form_validation->set_rules('oldpassword', "Password Lama", 'required|min_length[5]');
            $this->form_validation->set_rules('password', "Password Baru", 'required|min_length[5]');
            $this->form_validation->set_rules('repeatPassword', "Ulang Password Baru", 'required|matches[password]|min_length[5]');

            $this->form_validation->set_message('required','{field} harus diisi');
            $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
            $this->form_validation->set_message('matches','{field} harus sama dengan {param}');

            //$this->load->model(competition_model);
            $password = $this->input->post('oldpassword');
            $newpassword = $this->input->post('password');
            $loginid = $_SESSION['login_id'];


            $hasil = $this->contestant_model->cekpassword($loginid, $password);

            if($hasil !== NULL)
            {
                if ($this->form_validation->run() == FALSE)
                {
                    /*$_SESSION['passwordFailed']="Password harus minimal 5 huruf";
                    $this->session->mark_as_flash('passwordFailed');
                    redirect(base_url(). 'contestant/change_password');*/
                   // $this->data['error'] = true;
                   // $this->render_view('contestant/change_password','contestant/mastercontestant');

                    $_SESSION['error'] = "Ulang password tidak sama";
                    $this->session->mark_as_flash('error');
                    redirect(base_url(). 'contestant/change_password');
                }
                else{
                    $this->contestant_model->changePassword($loginid,$newpassword);
                    $_SESSION['succeed'] = "Password berhasil diganti";
                    $this->session->mark_as_flash('succeed');
                    redirect(base_url(). 'contestant/change_password');
                }
            }
            else
            {
                $_SESSION['passwordFailed'] = "Password Anda Saat Ini Salah";
                $this->session->mark_as_flash('passwordFailed');
                redirect(base_url(). 'contestant/change_password');
            }
        }
        else
        {
            $this->render_view('contestant/change_password','contestant/mastercontestant');
        }
    }

    public function add_reserve_member()
    {
        redirect(base_url() . 'error');
        if($this->input->post('addReserve') === null)
        {
            $this->render_view('contestant/add_reserve','contestant/mastercontestant');
        }
        else
        {
            $this->form_validation->set_rules("name", "Nama", 'trim|required|max_length[50]');
            $this->form_validation->set_rules("phone", "Nomor HP" , 'trim|required|numeric|callback__valid_phone');
            $this->form_validation->set_rules("email" , "Email" , 'required|valid_email');
            $this->form_validation->set_rules("grade" , "Kelas" , 'required');
            $this->form_validation->set_rules("allergy" , "Alergi"  , 'trim|max_length[150]');
            $this->form_validation->set_rules("vegetarian", "Status Vegetarian"  , 'required');

            $this->form_validation->set_message('required','{field} harus diisi');
            $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
            $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

            $maxImageSize = 500* 1024; // in bytes
            //var_dump($_FILES['student_card']);
            $photoErrors = $this->checkStudentCard($_FILES['student_card'],$maxImageSize);

            if ($this->form_validation->run() === FALSE || !empty($photoErrors))
            {
                if(!empty($photoErrors))
                {
                    $this->data['photoErrors'] = $photoErrors;
                }
                $this->render_view('contestant/add_reserve','contestant/mastercontestant');
            }
            else
            {
                $this->alreadyHasReserveMember();

                $nama = $this->input->post('name' );
                $hp = $this->input->post('phone');
                $email = $this->input->post('email' );
                $alamat = "-";
                $kelas = $this->input->post('grade');
                $alergi = $this->input->post('allergy' );
                $vegetarian = $this->input->post('vegetarian');

                $config['upload_path'] = 'asset/images/kartu/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '500'; // dalam KB
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                $this->upload->do_upload('student_card');
                $hasilUpload = $this->upload->data();
                $kartu_pelajar = "asset/images/kartu/" . $hasilUpload['file_name'];
                $id_tim = $_SESSION['login_id'];

                $this->load->model('registration_model');
                $this->registration_model->setMember($nama, $kelas, $alamat, $email, $kartu_pelajar, $id_tim, $alergi, $vegetarian, $hp, 'cadangan');

                $_SESSION['addReserveSucceed'] = true;
                $this->session->mark_as_flash('addReserveSucceed');
                redirect(base_url('contestant/profile'));
            }
        }
    }

    private function checkStudentCard($imageFiles, $maxSize)
    {
        $errorMessage = array();
        if($imageFiles['error'] > 0) {
            $errorMessage[] = "Foto Kartu Pelajar Gagal Diupload";
        }
        else
        {
            if($imageFiles["size"] > $maxSize)
                $errorMessage[] = "Foto Kartu Pelajar melebihi " . ($maxSize/1024) . " KB";

            $fileType = $imageFiles['type'];
            if( $fileType !== "image/jpeg" && $fileType !== "image/png" && $fileType !== "image/jpeg" )
                $errorMessage[] = "Foto Kartu Pelajar harus dalam format .jpg atau .png";
        }
        //var_dump($errorMessage);
        //die();
        return $errorMessage;
    }

    private function alreadyHasReserveMember()
    {
        if($this->contestant_model->hasReserveMember($_SESSION['login_id']))
        {
            redirect(base_url('contestant/profile'));
        }

    }

    public function edit_profile($contestantId)
    {
        $profile = $this->contestant_model->getProfile($contestantId);
        if($profile === null)
        {
            redirect(base_url() . 'contestant/profile');
        }
        $this->data['profile'] = $profile;
        $this->render_view('contestant/edit_profile','contestant/mastercontestant');
    }

    public function update_profile()
    {
        if($this->input->post('editProfile') === null)
        {
            redirect(base_url() . 'contestant/profile');
        }

        $this->form_validation->set_rules('email', "Email", 'required|valid_email');
        $this->form_validation->set_rules('hp', "No. HP", 'trim|required|numeric|callback__valid_phone');
        $this->form_validation->set_rules('vegetarian', "Vegetarian", 'required');
        $this->form_validation->set_rules('ukuran_baju', "ukuran_baju", 'required');
        $this->form_validation->set_rules('alergi', "Alergi", 'trim');

        $this->form_validation->set_message('valid_email','{field} harus dalam format yang sesuai');
        $studentCard = null;
        if(!empty($_FILES['fotoKartu']['name']))
        {
            $maxImageSize = 500* 1024; // in bytes
            $photoErrors = $this->checkStudentCard($_FILES['fotoKartu'],$maxImageSize);
            $studentCard = true;
        }

        $contestantId = $this->input->post('contestantId');

        if($this->form_validation->run() == false || !empty($photoErrors))
        {
            if(!empty($photoErrors))
            {
                $this->data['photoErrors'] = $photoErrors;
            }
            $this->data['profile'] = $this->contestant_model->getProfile($contestantId);
            $this->render_view('contestant/edit_profile','contestant/mastercontestant');
        }
        else
        {
            $email = $this->input->post('email');
            $hp = $this->input->post('hp');
            $alergi = $this->input->post('alergi');
            $vegetarian = $this->input->post('vegetarian');
            $ukuran_baju = $this->input->post('ukuran_baju');

            if($studentCard !== null)
            {
                $config['upload_path'] = 'asset/images/kartu/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '500'; // dalam KB
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                $this->upload->do_upload('fotoKartu');
                $hasilUpload = $this->upload->data();
                $studentCard = "asset/images/kartu/" . $hasilUpload['file_name'];
            }

            $this->contestant_model->updateProfile($contestantId, $email, $hp, $alergi, $vegetarian, $studentCard,$ukuran_baju);
            $_SESSION['editProfileSucceed'] = true;
            $this->session->mark_as_flash('editProfileSucceed');
            redirect(base_url('contestant/profile'));
        }
    }


    /* CODE INI TIDAK DIMAKSUDKAN UNTUK DI CALL LANGSUNG DARI URL YANG DIMASUKKAN LWT BROWSER*/
    public function _valid_phone($phoneNum)
    {
        if(preg_match('/08[1235789]{1}[1-9]{1}[0-9]{6,9}/',$phoneNum))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_valid_phone','{field} harus dalam format yang sesuai');
            return FALSE;
        }
    }

    /* DON'T ADD CODE BELOW THIS*/
}

?>