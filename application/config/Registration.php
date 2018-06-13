<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/09/2015
 * Time: 10:39
 */
class Registration extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
    }

    public function index()
    {
        $competitionId = $this->registration_model->getRegistrasiTersedia();
        if($competitionId === NULL)
        {
            $this->render_view('registration/pendaftaran_tutup','registration/master_registration');
        }
        else
        {
            if($this->input->post('chooseSchool'))
            {
                $_SESSION['school_id'] = $this->input->post('cboSekolah');
                redirect(base_url() . 'registration/choose_teacher');

            }
            else if($this->input->post('chooseTeacher'))
            {
                $_SESSION['teacher_id'] = $this->input->post('cboGuru');
                redirect(base_url() . 'registration/team_data');

            }
            else
            {
                //safe to unset without checking key existance
                unset($_SESSION['teacher_id']);
                unset($_SESSION['school_id']);
                //unset($_SESSION['addTeacherError']);

                $_SESSION['competition_id'] = $competitionId;
                $this->load->model('area_model');

                $this->data['daftarProvinsi'] = $this->area_model->getSemuaProvinsi();
                $this->render_view('registration/pilih_sekolah','registration/master_registration');
                //$this->load->view('registration/master_registration',$data);
            }
        }
    }

    public function choose_teacher()
    {
        if(isset($_SESSION['school_id']))
        {
            $this->data['teachers'] = $this->registration_model->getTeachers($_SESSION['school_id']);
            $this->render_view('registration/pilih_guru','registration/master_registration');
        }
        else
        {
            redirect(base_url() . 'registration');
        }
//        if($this->input->post('chooseSchool'))
//        {
            //$data['content'] = 'choose_teacher';
            //$this->load->view('registration/master_registration',$data);
//        }
//        else
//        {
//            redirect(base_url() . 'registration');
//        }
    }

    public function team_data()
    {
        if(isset($_SESSION['teacher_id']))
        {
            //unset($_SESSION['addTeacherError']);

            $this->data['enableReserved'] = 'false'; // supaya member cadangan tdk di check
            $this->render_view('registration/data_tim','registration/master_registration');

        }
        else
        {
            redirect(base_url() . 'registration');
        }
        //if($this->input->post('chooseTeacher'))
        //{
            //$data['content'] = 'team_data';
            //$this->load->view('registration/master_registration',$data);
        //}
        //else
        //{
          //  redirect(base_url() . 'registration');
        //}
    }

    /**
     * proces ajax request utk nyari daftar kabupaten/kota berdasarkan id provinsi
     * jika bukan ajax, redirect controller error
     * @param $idProvinsi
     */
    public function kabupaten($idProvinsi)
    {
        if($this->input->is_ajax_request())
        {
            $this->load->model('area_model');

            $this->data['daftarKab'] = $this->area_model->getKabupaten($idProvinsi);
            //var_dump($this->data['daftarKab']);
            $this->render_view('registration/kabupaten_list',NULL);
            //$this->render_view(NULL,'json');

        }
        else
        {
            redirect(base_url() . 'error');
        }
    }

    /**
     * process ajax request utk nyari daftar sekolah berdasarkan id kab/kota
     * jika bukan ajax, redirect controller error
     * @param $idKab
     */
    public function sekolah($idKab)
    {
        if($this->input->is_ajax_request())
        {
            $this->data['daftarSekolah'] = $this->registration_model->getSchool($idKab);

            $this->render_view('registration/daftar_sekolah',NULL);
        }
        else
        {
            redirect(base_url() . 'error');
        }
    }

    /*public function get_teacher_list() {
        $nama = $this->input->post("teacher");
        if ($nama != "") {
            $data['teacher'] = $this->register_model->getTeacher($nama, $_SESSION['school_id']);
            $this->load->view('register/teacher_list', $data);
        }
    }*/

    public function register_teacher()
    {
        if($this->input->post('add_teacher') && isset($_SESSION['school_id']))
        {
            $this->form_validation->set_rules('teachername', "Nama", 'trim|required');
            $this->form_validation->set_rules('teacheremail', "Email", 'trim|required|valid_email');
            $this->form_validation->set_rules('teachertelp', "No. Handphone", 'trim|required|callback__valid_phone');
            $this->form_validation->set_rules('vegetarian', "Status Vegetarian", 'required');
            $this->form_validation->set_rules('teacheraddress', "Alamat", 'trim|required');
            $this->form_validation->set_error_delimiters('<span class="required">', '</span>');

            $this->form_validation->set_message('required','{field} harus diisi');

            $url = "https://www.google.com/recaptcha/api/siteverify";
            $secretkey ="6LdySAkUAAAAAKKbcFkqTem_HmRAlxTwvOG5V2pI";
            $response = file_get_contents($url."?secret=".$secretkey."&response=".$_POST['g-recaptcha-response']."&remoteip=".
                $_SERVER['REMOTE_ADDR']);

            $captchaResponse = json_decode($response);

            if(isset($captchaResponse->success) AND $captchaResponse->success==true)
            {


                if ($this->form_validation->run() === FALSE)
                {
                    $this->data['error'] = true;
                    //$this->render_view('registration/choose_teacher','registration/master_registration');
                    $this->choose_teacher();
                    //$_SESSION['addTeacherError'] = true;
                    //$_SESSION['errors'] = validation_errors();
                    //redirect(base_url() . 'registration/choose_teacher');
                }
                else
                {
                    $teachername = $this->input->post('teachername');
                    $teacheremail = $this->input->post('teacheremail');
                    $teachertelp = $this->input->post('teachertelp');
                    $teacheraddress = $this->input->post('teacheraddress');
                    $teacherallergy = $this->input->post('teacherallergy');
                    $teachervegetarian = $this->input->post('vegetarian');

                    $idGuru = $this->registration_model->setTeacher($teachername, $teacheremail, $teachertelp, $teacheraddress, $_SESSION['school_id'], $teacherallergy, $teachervegetarian);

                    $_SESSION["teacher_id"] = $idGuru;
                    redirect(base_url() . 'registration/team_data');
                }

            }
            else
            {

                   $this->data['error'] = true;
                    $this->choose_teacher();
            }
        }
    }

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

    public function _username_available($username)
    {
        $this->form_validation->set_message('_username_available','{field} tidak tersedia');
        return $this->registration_model->isAvailableUsername($username,$_SESSION['competition_id']);
    }

    public function _teamname_available($teamname)
    {
        $this->form_validation->set_message('_teamname_available','{field} tidak tersedia');
        return $this->registration_model->isAvailableTim($teamname, $_SESSION['competition_id']);
    }

     public function register()
    {
        if($this->input->post('btnRegister') && isset($_SESSION['teacher_id']) && isset($_SESSION['teacher_id']))
        {
            $jum_tim = $this->input->post('jum_tim');
            $this->form_validation->set_rules('team_name', "Nama Tim", 'trim|required|max_length[50]|callback__teamname_available');
            $this->form_validation->set_rules('username', "Username", 'trim|required|min_length[5]|max_length[50]|callback__username_available');
            $this->form_validation->set_rules('password', "Password", 'required|min_length[7]');
            $this->form_validation->set_rules('conf_password', "Confirm Password", 'required|matches[password]|min_length[7]');

            $cadangan = false;
            $this->data['enableReserved'] = 'true';
            if ($this->input->post('enable') === NULL)
            {
                $jum_tim--;
                $cadangan = true;
                $this->data['enableReserved'] = 'false';
            }

            //echo $jum_tim;
            for ($i = 0; $i <= $jum_tim; $i++)
            {
                $x = $i + 1;
                if($x == 4)
                {
                    $this->form_validation->set_rules("member_name_" . $i . "", "Nama Anggota Cadangan", 'trim|required');
                    $this->form_validation->set_rules("member_phone_" . $i . "", "Nomor HP Anggota Cadangan" , 'trim|required|numeric|callback__valid_phone');
                    $this->form_validation->set_rules("member_email_" . $i . "", "Email Anggota Cadangan" , 'required|valid_email');
                    $this->form_validation->set_rules("member_grade_" . $i . "", "Kelas Anggota Cadangan", 'required');
                    $this->form_validation->set_rules("member_allergy_" . $i . "", "Alergi Anggota Cadangan", 'trim');
                    $this->form_validation->set_rules("member_vegetarian_" . $i . "", "Status Vegetarian Anggota Cadangan", 'required');
                }
                else
                {
                    $this->form_validation->set_rules("member_name_" . $i . "", "Nama Anggota " . $x , 'trim|required');
                    $this->form_validation->set_rules("member_phone_" . $i . "", "Nomor HP Anggota " . $x , 'trim|required|numeric|callback__valid_phone');
                    $this->form_validation->set_rules("member_email_" . $i . "", "Email Anggota " . $x , 'required|valid_email');
                    $this->form_validation->set_rules("member_grade_" . $i . "", "Kelas Anggota " . $x , 'required');
                    $this->form_validation->set_rules("member_allergy_" . $i . "", "Alergi Anggota " . $x , 'trim');
                    $this->form_validation->set_rules("member_vegetarian_" . $i . "", "Status Vegetarian Anggota " . $x , 'required');
                }

                $err = 0;
                if ($_FILES['member_student_card_' . $i]["error"] > 0)
                {
                    $err = 1;
                }
                else
                {
                    if ($_FILES["member_student_card_" . $i]["size"] > (500 * 1024)) {
                        $err = 1;
                    }
                    if ($_FILES["member_student_card_" . $i]["type"] != "image/jpeg" && $_FILES["member_student_card_" . $i]["type"] != "image/jpg" && $_FILES["member_student_card_" . $i]["type"] != "image/png") {
                        $err = 1;
                    }
                }
                if ($err == 1) {
                    if($x <= 3)
                        $errors[$i] = "Kartu Pelajar anggota " . $x . " tidak valid";
                    else
                        $errors[$i] = "Kartu Pelajar anggota cadangan tidak valid";
                }
            }

            $this->form_validation->set_message('required','{field} harus diisi');
            $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
            $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');
            //$this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
            if ($this->form_validation->run() == FALSE || isset($errors))  //klo data ga diisi lengkap
            {
                /*if (isset($jum_tim)) {
                    if ($cadangan) {
                        $this->data['jum_tim'] = $jum_tim + 1;
                    } else {
                        $this->data['jum_tim'] = $jum_tim;
                    }
                }*/
                //$data['aktif'] = "team_view";
                if (isset($errors)) {
                    $this->data['photoErrors'] = $errors;
                    $this->data['errors'] = "Data tim gagal tersimpan. Mohon isi data sesuai kriteria.";
                }
                //$this->load->view("register/register_view", $data);

                //$this->load->view("web/bg_register", $data);
                $this->render_view('registration/team_data','registration/master_registration');
            }
            else // kalo data diisi lengkap, username & teamname tersedia
            {
                //input tim
                $teamName = $this->input->post('team_name');
                $username = $this->input->post('username');
                //$password = md5($this->input->post('password'));
                $password = $this->input->post('password');

                $this->registration_model->setTeam($teamName, $username, $password, $_SESSION['competition_id'], $_SESSION['teacher_id']);
                $id_tim = $this->registration_model->getIdTeamWithUsername($username, $_SESSION['competition_id']);
                $id_tim = $id_tim['id'];

                //set langsung untuk login
                /*$_SESSION['id_kompetisi'] = $_SESSION['competition_id'];
                $_SESSION["login_username"] =  $username;
                $_SESSION["login_nama"] = $nama;
                $_SESSION["login_id"] = $id_tim;*/

                //input anggota
                for ($i = 0; $i <= $jum_tim; $i++)
                {
                    //upload foto siswa
                    $nama = $this->input->post('member_name_' . $i);
                    $kelas = $this->input->post('member_grade_' . $i);
                    $alamat = "-";
                    $alergi = $this->input->post('member_allergy_' . $i);
                    $email = $this->input->post('member_email_' . $i);
                    $nis = $this->input->post('member_id_' . $i);
                    $hp = $this->input->post('member_phone_' . $i);
                    $vegetarian = $this->input->post('member_vegetarian_' . $i);
                    $ukuranbaju = $this->input->post('member_ukuran_baju_' . $i);

                    //upload kartu siswa
                    $config['upload_path'] = 'asset/images/kartu/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '500'; // dalam KB
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('member_student_card_' . $i);

                    $data2 = $this->upload->data();
                    $kartu_pelajar = "asset/images/kartu/" . $data2['file_name'];

                    if ($i == $jum_tim && !$cadangan) {
                        $this->registration_model->setMember($nama, $kelas, $alamat, $email, $kartu_pelajar, $id_tim, $alergi, $vegetarian,$ukuranbaju, $hp, 'cadangan');
                    }
                    else {
                        $this->registration_model->setMember($nama, $kelas, $alamat, $email, $kartu_pelajar, $id_tim, $alergi, $vegetarian,$ukuranbaju, $hp, 'inti');
                    }
                }
                unset($_SESSION['competition_id']);
                unset($_SESSION['teacher_id']);
                unset($_SESSION['school_id']);

                $_SESSION['registrationConfirm'] = true;

                //diambil langsung dr var stlh form validation shg perlu di htmlspecialchars
                $_SESSION['namaTim'] = htmlspecialchars($teamName);

                //arahkan ke halaman success
                redirect(base_url() . "registration/confirm");

                /* awalnya seperti ini di thn 2015 & sblmnya, skrg pengecekkan dipindah ke form-validation
                 * if ($this->registration_model->isAvailableUsername($this->input->post('username'),$_SESSION['competition_id']))
                {
                    if ($this->registration_model->isAvailableTim($this->input->post('team_name'), $_SESSION['competition_id']))
                    {
                    }
                    else
                    {
                        //to do: show nama tim error. plan: tidak bisa lngsng di pass ke data['errors'], krna bisa conflict message
                        //$this->data['aktif'] = "team_view";
                        //$this->data['errors'] = array('Nama Tim sudah digunakan, silahkan ganti dengan yang lain');
                        //$this->load->view("web/bg_register", $data);
                    }
                }
                else
                {
                    //to do : show username error. plan: tidak bisa lngsng di pass ke data['errors'], krna bisa conflict message
                    //$this->data['errors'] = array('Username sudah digunakan, silahkan ganti dengan yang lain');
                    //$this->load->view("web/bg_register", $data);
                    //$this->load->view()
                }*/
            }
        }
        else
        {
            redirect(base_url() . 'registration');
        }
    }


    public function confirm()
    {
        if(isset($_SESSION['registrationConfirm']))
        {
            //$this->data['namaTim'] = 'ABCDEFGH';
            $this->data['namaTim'] = $_SESSION['namaTim'];
            unset($_SESSION['registrationConfirm']);
            unset($_SESSION['namaTim']);
            $this->render_view('registration/konfirmasi_tim','registration/master_registration');
        }
        else
        {
            redirect(base_url());
        }
    }

    public function get_team_name()
    {
        if($this->input->is_ajax_request() && isset($_SESSION['teacher_id']))
        {
            $nama = $this->input->post("teamName");
            $maxTeamNameLength = 50;
            $teamNameLength = strlen($nama);

            $this->form_validation->set_rules('teamName', "Team Name", 'trim|required|max_length[50]');
            //if ($nama != "" && $teamNameLength <= $maxTeamNameLength)
            if($this->form_validation->run() != FALSE)
            {
                if ($this->registration_model->isAvailableTim($nama,$_SESSION['competition_id']))
                {
                    echo "<strong style='color:green;'>Available</strong>";
                    //echo json_encode("Team name Available");
                }
                else
                {
                    echo "<strong class='pesanSalah'>Not Available</strong>";
                    //echo json_encode("Team name already exist");
                }
            }
            else
            {
                //echo "<strong style='color:#f98181;'>Not Available</strong>";
                echo "<strong class='pesanSalah'>Not Available</strong>";
            }
        }
        else
        {
            redirect(base_url());
        }
    }

    public function get_username()
    {
        if($this->input->is_ajax_request() && isset($_SESSION['teacher_id']))
        {
            $nama = trim($this->input->post("username"));
            $minUsernameLength = 5;
            $maxUsernameLength = 50;
            $usernameLength = strlen($nama);
            $this->form_validation->set_rules('username', "Username", 'trim|required|min_length[5]|max_length[50]');
            //if ($nama != "" && $usernameLength >= $minUsernameLength && $usernameLength <= $maxUsernameLength)
            if($this->form_validation->run() != FALSE)
            {
                if ($this->registration_model->isAvailableUsername($nama, $_SESSION['competition_id']))
                {
                    echo "<strong style='color:green;'>Available</strong>";
                }
                else
                {
                    //echo "<strong style='color:#f26060;'>Not Available</strong>";
                    echo '<strong class="pesanSalah">Not Available</strong>';
                }
            }
            else
            {
                //echo "<strong style='color:#f98181;'>Not Available</strong>";
                echo '<strong class="pesanSalah">Not Available</strong>';
            }
        }
        else
        {
            redirect(base_url());
        }
    }
}
?>