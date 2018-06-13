<?php
/**
 * User: CWR
 * Date: 20/10/2015
 * Time: 9:47
 */
class Registration extends Sekretariat_Controller
{
    private $perPage = 20;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
        $this->load->library("pagination");
    }

    public function index() {
        $this->waiting_team_list(1);
    }

    /*public function confirm_waiting_team($id_team){
        $_SESSION['pesan'] = "Status berhasil dirubah";
        $this->session->mark_as_flash('pesan');
        $this->registration_model->setStatusReady($id_team);
        redirect(base_url() . "admin/registration/waiting_team_list");
    }*/

    public function accept_payment()
    {
        $this->load->model('contestant_model');
        $id_team = $this->input->post('teamId');
        $statusPembayaran = $this->contestant_model->getStatusTim($id_team);

        if($this->input->post('terimaPembayaran') === NULL || $statusPembayaran != "unverified payment")
        {
            redirect(base_url() . 'admin/registration/unverified_team_list_detail/' . $id_team);
        }
        $statusBaru = "ready";
        $this->registration_model->setTeamStatus($id_team, $statusBaru);

        $_SESSION['pesanSukses'] = "Pembayaran berhasil diterima.";
        $this->session->mark_as_flash('pesanSukses');
        redirect(base_url() . "admin/registration/unverified_team_list");
    }

    public function decline_payment()
    {
        $this->load->model('contestant_model');
        $id_team = $this->input->post('teamId');
        $statusPembayaran = $this->contestant_model->getStatusTim($id_team);

        if($this->input->post('tolakPembayaran') === NULL || $statusPembayaran != 'unverified payment')
        {
            redirect(base_url() . 'admin/registration/unverified_team_list_detail/' . $id_team);
        }
        $statusBaru = "waiting payment";
        $this->registration_model->setTeamStatus($id_team, $statusBaru);

        $_SESSION['pesanSukses'] = "Pembayaran berhasil ditolak.";
        $this->session->mark_as_flash('pesanSukses');
        redirect(base_url() . "admin/registration/unverified_team_list");
    }

    public function reset_search_waiting()
    {
        if($this->input->get('resetSearch') !== NULL)
        {
            unset($_SESSION['waiting']);
            redirect(base_url() . 'admin/registration/waiting_team_list');
        }
        else
        {
            redirect(base_url() . 'admin');
        }
    }

    public function waiting_team_list($page = 1)
    {
        if(!ctype_digit($page)) {
            $page = 1;
        }
        if ($this->input->post('btn') !== NULL)
        {
            $data['ringkasan'] = trim($this->input->post('cari'));

            if(strlen($data['ringkasan']) > 0) {
                // session untuk menyimpan data yang dicari (digunakan untuk pagination)
                $_SESSION['waiting'] =  $data['ringkasan'];
            }
        }
        //else {
        if(isset($_SESSION['waiting']))
        {
            $data['ringkasan'] = $_SESSION['waiting'];
            // CWR Notes: wajib di beri htmlentities() utk prevent basic XSS attack.
            $this->data['searchKeyword'] = htmlentities(trim($_SESSION['waiting'])) ;
        }
        else {
            $data['ringkasan'] = null;
        }
        //}

        // CWR Notes: dibawah ini sptnya tidak dipakai??
        //$data['listsekolah'] = $this->registration_model->search('tim','nama',$data['ringkasan']);

        // pagination limit
        $pagination['base_url'] = base_url().'admin/registration/waiting_team_list';
        $pagination['per_page'] = $this->perPage;
        /*$result =$this->registration_model->getTotalReady($data['ringkasan']);*/
        $pagination['total_rows'] = $this->registration_model->getTotalWaiting($data['ringkasan'], $_SESSION['id_kompetisi']);
        $pagination['uri_segment'] = 4;
        $pagination['use_page_numbers']= TRUE;
        //$offset = 20*$this->uri->segment(4,1)-20;
        $offset = $this->perPage * ($page - 1);

        $pagination['cur_tag_open'] = "<li class='active'><span><b>";
        $pagination['cur_tag_close'] = "</b></span></li>";
        $pagination['first_tag_open'] = $pagination['last_tag_open']= $pagination['next_tag_open']= $pagination['prev_tag_open'] = $pagination['num_tag_open'] = '<li>';
        $pagination['first_tag_close'] = $pagination['last_tag_close']= $pagination['next_tag_close']= $pagination['prev_tag_close'] = $pagination['num_tag_close'] = '</li>';

        $this->pagination->initialize($pagination);
        $this->data['paginglinks'] = $this->pagination->create_links();

        //CWR notes: logic showing a to b of c pages nya kuubah
        if($this->data['paginglinks'] != '') {
            $startPosition =  ( ($this->pagination->cur_page-1) * $this->pagination->per_page ) + 1;
            $endPosition = $startPosition + $this->pagination->per_page - 1;
            $endPosition = ($endPosition > $pagination['total_rows']) ? $pagination['total_rows'] : $endPosition;
            $this->data['pagerMessage'] = 'Showing '. $startPosition .' to '. $endPosition .' of '.$pagination['total_rows'];
        }

        $this->data['no'] = $offset + 1;
        $this->data['listwaitingtim'] = $this->registration_model->getWaitingTim($pagination['per_page'],$offset,
            $data['ringkasan'], $_SESSION['id_kompetisi']);

        //CWR Notes: supaya klo dr halaman lihat detail lalu klik back, baliknya bukan ke halaman 1 lagi
        $_SESSION['visitedPage'] = $page;

        $this->data['pageTitle'] = 'Waiting Payment List';
        //CWR notes: change to sekret
        $this->render_view('sekret/waiting_tim_view', 'sekret/master_sekret');
    }

    function waiting_team_list_detail($id_team) {
        $this->load->model('contestant_model');
        $this->data['tim'] = $this->contestant_model->getDataTim($id_team, $_SESSION['id_kompetisi']);
        $this->data['anggota'] = $this->contestant_model->getDataAnggota($id_team);

        //CWR Notes: supaya klo habis liat detail, baliknya bukan ke halaman 1 lagi
        if(isset($_SESSION['visitedPage']))
        {
            $this->data['backPage'] = htmlentities($_SESSION['visitedPage']);
        }
        else {
            $this->data['backPage'] = 1;
        }

        if($this->data['tim']['status'] != 'waiting payment') {
            redirect(base_url() . 'admin/registration/waiting_team_list');
        }
        $this->render_view('sekret/waiting_tim_detail_view', 'sekret/master_sekret');

    }

    public function reset_search_unverified()
    {
        if($this->input->get('resetSearch') !== NULL)
        {
            unset($_SESSION['unverified']);
            redirect(base_url() . 'admin/registration/unverified_team_list');
        }
        else
        {
            redirect(base_url() . 'admin');
        }
    }

    function unverified_team_list($page = 1) {
        if(!ctype_digit($page)) {
            $page = 1;
        }

        if ($this->input->post('btn') !== NULL)
        {
            $data['ringkasan'] = trim($this->input->post('cari'));
            // session untuk menyimpan data yang dicari (digunakan untuk pagination)
            if(strlen($data['ringkasan']) > 0) {
                // session untuk menyimpan data yang dicari (digunakan untuk pagination)
                $_SESSION['unverified'] = $data['ringkasan'];
            }
        }

        if(isset($_SESSION['unverified'])){
            $data['ringkasan'] = $_SESSION['unverified'];
            // CWR Notes: wajib di beri htmlentities() utk prevent basic XSS attack.
            $this->data['searchKeyword'] = htmlentities(trim($_SESSION['unverified'])) ;
        }
        else{
            $data['ringkasan'] = null;
        }

        //$data['listsekolah'] = $this->registration_model->search('tim','nama',$data['ringkasan']);

        // pagination limit
        $pagination['base_url'] = base_url().'admin/registration/unverified_team_list';
        $pagination['per_page'] = $this->perPage;
        $pagination['total_rows'] = $this->registration_model->getTotalUnverified($data['ringkasan'], $_SESSION['id_kompetisi']);
        $pagination['uri_segment'] = 4;
        $pagination['num_links'] = 2;
        $pagination['use_page_numbers']= TRUE;
        //$offset = 20*$this->uri->segment(4,1)-20;
        $offset = $this->perPage * ($page - 1);

        $pagination['cur_tag_open'] = "<li class='active'><span><b>";
        $pagination['cur_tag_close'] = "</b></span></li>";
        $pagination['first_tag_open'] = $pagination['last_tag_open']= $pagination['next_tag_open']= $pagination['prev_tag_open'] = $pagination['num_tag_open'] = '<li>';
        $pagination['first_tag_close'] = $pagination['last_tag_close']= $pagination['next_tag_close']= $pagination['prev_tag_close'] = $pagination['num_tag_close'] = '</li>';
        $this->pagination->initialize($pagination);
        $this->data['paginglinks'] = $this->pagination->create_links();

        //CWR notes: logic showing a to b of c pages nya kuubah
        if($this->data['paginglinks'] != '') {
            $startPosition =  ( ($this->pagination->cur_page-1) * $this->pagination->per_page ) + 1;
            $endPosition = $startPosition + $this->pagination->per_page - 1;
            $endPosition = ($endPosition > $pagination['total_rows']) ? $pagination['total_rows'] : $endPosition;
            $this->data['pagerMessage'] = 'Showing '. $startPosition .' to '. $endPosition .' of '.$pagination['total_rows'];
        }
        /*if($this->data['paginglinks']!= '') {
            $this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.$pagination['total_rows'].' of '.$pagination['total_rows'];
        }*/

        $this->data['no'] = $offset+1;
        $this->data['listunverifiedtim'] = $this->registration_model->getUnverifiedTim($pagination['per_page'],$offset,$data['ringkasan'],$_SESSION['id_kompetisi']);

        //CWR Notes: supaya klo dr halaman lihat detail lalu klik back, baliknya bukan ke halaman 1 lagi
        $_SESSION['visitedPage'] = $page;

        $this->data['pageTitle'] = 'Waiting Payment Verification List';
        $this->render_view('sekret/unverified_tim_view', 'sekret/master_sekret');
    }

    function unverified_team_list_detail($id_team) {
        $this->load->model('contestant_model');
        $this->data['tim'] = $this->contestant_model->getDataTim($id_team, $_SESSION['id_kompetisi']);
        $this->data['anggota'] = $this->contestant_model->getDataAnggota($id_team);

        //CWR Notes: supaya klo habis liat detail, baliknya bukan ke halaman 1 lagi
        if(isset($_SESSION['visitedPage']))
        {
            $this->data['backPage'] = htmlentities($_SESSION['visitedPage']);
        }
        else
        {
            $this->data['backPage'] = 1;
        }

        if($this->data['tim']['status'] != 'unverified payment') {
            redirect(base_url() . 'admin/registration/unverified_team_list');
        }
        $this->render_view('sekret/unverified_tim_detail_view', 'sekret/master_sekret');
    }


    public function reset_search_ready()
    {
        if($this->input->get('resetSearch') !== NULL)
        {
            unset($_SESSION['ready']);
            redirect(base_url() . 'admin/registration/ready_team');
        }
        else
        {
            redirect(base_url() . 'admin');
        }
    }

    /**
     * noted bug: 1.session['visitedPages'] keynya sama semua utk tiap function di controller ini,
     * sehingga bisa saja dibypass klo si user hafal url nya.
     * Contoh skenario: ready tim page 2, lihat detail tim. setelah itu user langsung ketik url utk view detail tim yg statusnya 'waiting payment'. begitu klik back, baliknya ke page 2 daftar waiting payment.
     * 2. klo diketik manual page nya lebih dari page yg tersedia
     * @param int $page
     */
    function ready_team($page = 1)
    {
        if(!ctype_digit($page)) {
            $page = 1;
        }

        if ($this->input->post('btn') !== NULL) {
            $data['ringkasan'] = trim($this->input->post('cari'));

            if(strlen($data['ringkasan']) > 0) {
                // session untuk menyimpan data yang dicari (digunakan untuk pagination)
                $_SESSION['ready'] = $data['ringkasan'];
            }
        }

        if(isset($_SESSION['ready'])){
            $data['ringkasan'] = $_SESSION['ready'];
            // CWR Notes: wajib di beri htmlentities() utk prevent basic XSS attack.
            $this->data['searchKeyword'] = htmlentities(trim($_SESSION['ready']));
        }
        else{
            $data['ringkasan'] = null;
        }

        //$data['listsekolah'] = $this->registration_model->search('tim','nama',$data['ringkasan']);

        $pagination['base_url'] = base_url().'admin/registration/ready_team';
        $pagination['per_page'] = $this->perPage;
        $pagination['total_rows'] = $this->registration_model->getTotalReady($data['ringkasan'],$_SESSION['id_kompetisi']);
        $pagination['uri_segment'] = 4;
        $pagination['use_page_numbers']= TRUE;
        //$offset = 20*$this->uri->segment(4,1)-20;
        $offset = $this->perPage * ($page - 1);

        $pagination['cur_tag_open'] = "<li class='active'><span><b>";
        $pagination['cur_tag_close'] = "</b></span></li>";
        $pagination['first_tag_open'] = $pagination['last_tag_open']= $pagination['next_tag_open']= $pagination['prev_tag_open'] = $pagination['num_tag_open'] = '<li>';
        $pagination['first_tag_close'] = $pagination['last_tag_close']= $pagination['next_tag_close']= $pagination['prev_tag_close'] = $pagination['num_tag_close'] = '</li>';

        $this->pagination->initialize($pagination);
        $this->data['paginglinks'] = $this->pagination->create_links();


        //CWR notes: logic showing a to b of c pages nya kuubah
        if($this->data['paginglinks'] != '')
        {
            $startPosition =  ( ($this->pagination->cur_page-1) * $this->pagination->per_page ) + 1;
            $endPosition = $startPosition + $this->pagination->per_page - 1;
            $endPosition = ($endPosition > $pagination['total_rows']) ? $pagination['total_rows'] : $endPosition;
            $this->data['pagerMessage'] = 'Showing '. $startPosition .' to '. $endPosition .' of '.$pagination['total_rows'];
        }


        $this->data['no'] = $offset + 1;
        $this->data['readytim'] = $this->registration_model->getReadyTim($pagination['per_page'],$offset,
            $data['ringkasan'],$_SESSION['id_kompetisi']);

        //CWR Notes: supaya klo dr halaman lihat detail lalu klik back, baliknya bukan ke halaman 1 lagi
        $_SESSION['visitedPage'] = $page;

        $this->data['pageTitle'] = 'Completed Registration (Ready Team) List';
        //CWR notes: change to sekret
        $this->render_view('sekret/ready_team', 'sekret/master_sekret');
    }

    function ready_team_detail($id_team)
    {
        $this->load->model('contestant_model');
        $this->data['tim'] = $this->contestant_model->getDataTim($id_team, $_SESSION['id_kompetisi']);
        $this->data['anggota'] = $this->contestant_model->getDataAnggota($id_team);

        //CWR Notes: supaya klo habis liat detail, baliknya bukan ke halaman 1 lagi
        if(isset($_SESSION['visitedPage']))
        {
            $this->data['backPage'] = htmlentities($_SESSION['visitedPage']);
        }
        else
        {
            $this->data['backPage'] = 1;
        }
        if($this->data['tim']['status'] != 'ready') {
            redirect(base_url() . 'admin/registration/ready_team');
        }
        $this->render_view('sekret/ready_team_detail', 'sekret/master_sekret');
    }


    /*function all_tim(){
        $this->load->library("pagination");
        if ($this->input->post('btn')) {
            $data['ringkasan'] = $this->input->post('cari');
            // session untuk menyimpan data yang dicari (digunakan untuk pagination)
            $_SESSION['all'] =  $data['ringkasan'];
        }
        else {
            if(isset($_SESSION['all'])){
                $data['ringkasan'] = $_SESSION['all'];
            }
            else{
                $data['ringkasan'] = null;
            }
        }
        $data['listsekolah'] = $this->registration_model->search('tim','nama',$data['ringkasan']);

        // pagination limit
        $pagination['base_url'] = base_url().'admin/Registration/all_tim';
        $pagination['per_page'] = "20";
        //$result =$this->registration_model->getTotalReady($data['ringkasan']);
        $pagination['total_rows'] = $this->registration_model->getTotal($data['ringkasan']);
        $pagination['uri_segment'] = 4;
        $pagination['use_page_numbers']= TRUE;
        $offset = 20*$this->uri->segment(4,1)-20;
        $this->pagination->initialize($pagination);
        $this->data['paginglinks'] = $this->pagination->create_links();
        if($this->data['paginglinks']!= '') {
            $this->data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.$pagination['total_rows'].' of '.$pagination['total_rows'];
        }
        $this->data['no'] = $offset+1;
        $this->data['readytim'] = $this->registration_model->getStatusTim($pagination['per_page'],$offset,
            $data['ringkasan']);
        $this->render_view('registration/all_tim', 'sekret/master_sekret');
    }*/


    public function add_reserve_member($teamId)
    {
        if($this->input->post('addReserve') === null)
        {
            $this->render_view('sekret/add_reserve','sekret/master_sekret');
        }
        else
        {
            $this->form_validation->set_rules("name", "Nama", 'trim|required|max_length[50]');
            $this->form_validation->set_rules("phone", "Nomor HP" , 'trim|required|numeric|callback__valid_phone');
            $this->form_validation->set_rules("email" , "Email" , 'required|valid_email');
            $this->form_validation->set_rules("grade" , "Kelas" , 'required');
            $this->form_validation->set_rules("allergy" , "Alergi"  , 'trim|max_length[150]');
            $this->form_validation->set_rules("vegetarian", "Status Vegetarian"  , 'required');
            $this->form_validation->set_rules("ukuran_baju", "Ukuran Baju"  , 'required');

            $this->form_validation->set_message('required','{field} harus diisi');
            $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
            $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

            $maxImageSize = 500* 1024; // in bytes
            $photoErrors = $this->checkStudentCard($_FILES['student_card'],$maxImageSize);

            if ($this->form_validation->run() === FALSE || !empty($photoErrors))
            {
                if(!empty($photoErrors))
                {
                    $this->data['photoErrors'] = $photoErrors;
                }
                $this->render_view('sekret/add_reserve','sekret/master_sekret');
            }
            else
            {
                $this->alreadyHasReserveMember($teamId);

                $nama = $this->input->post('name' );
                $hp = $this->input->post('phone');
                $email = $this->input->post('email' );
                $alamat = "-";
                $kelas = $this->input->post('grade');
                $alergi = $this->input->post('allergy' );
                $vegetarian = $this->input->post('vegetarian');
                $ukuran_baju = $this->input->post('ukuran_baju');

                $config['upload_path'] = 'asset/images/kartu/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '500'; // dalam KB
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                $this->upload->do_upload('student_card');
                $hasilUpload = $this->upload->data();
                $kartu_pelajar = "asset/images/kartu/" . $hasilUpload['file_name'];

                $id_tim = $teamId;
                $this->registration_model->setMember($nama, $kelas, $alamat, $email, $kartu_pelajar, $id_tim, $alergi, $vegetarian,$ukuran_baju, $hp, 'cadangan');

                $_SESSION['addReserveSucceed'] = true;
                $this->session->mark_as_flash('addReserveSucceed');
                redirect(base_url() . 'admin/registration/ready_team_detail/' . $teamId);
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

        return $errorMessage;
    }

    private function alreadyHasReserveMember($teamId)
    {
        $this->load->model('contestant_model');
        if($this->contestant_model->hasReserveMember($teamId))
        {
            redirect(base_url() . 'admin/registration/ready_team_detail/' . $teamId);
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
}