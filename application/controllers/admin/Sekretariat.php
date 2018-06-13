<?php
/**
 * Date: 16/10/2015
 * Time: 21:11
 */
class Sekretariat extends Sekretariat_Controller
{
    private $perPage = 20;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
        $this->load->model('admin_model');
        $this->load->library("pagination");
    }

    public function index()
    {
        $this->data['allContestants'] = $this->registration_model->countAllRegistration($_SESSION['id_kompetisi']);
        $this->data['readyContestants'] = $this->registration_model->countCompletedRegistration($_SESSION['id_kompetisi']);
        $this->data['pageTitle'] = 'Sekretariat Home';
        $this->render_view('sekret/home','sekret/master_sekret');
    }

    /**
     * Admin
     */
    public function reset_search_teacher()
    {
        if($this->input->get('resetSearch') !== NULL)
        {
            unset($_SESSION['teacher']);
            redirect(base_url() . 'admin/sekretariat/teacher_list');
        }
        else
        {
            redirect(base_url() . 'admin');
        }
    }

    public function teacher_list($page = 1)
    {
        if(!ctype_digit($page)) {
            $page = 1;
        }

        //$data['id'] = $_SESSION['id_kompetisi'];

        if ($this->input->post('btn') !== NULL)
        {
            $data['ringkasan'] = trim($this->input->post('cari'));
            if(strlen($data['ringkasan']) > 0) {
                // session untuk menyimpan data yang dicari (digunakan untuk pagination)
                $_SESSION['teacher'] = $data['ringkasan'];
            }
        }

        if(isset($_SESSION['teacher']))
        {
            $data['ringkasan'] = $_SESSION['teacher'];
            $this->data['searchKeyword'] = htmlentities(trim($_SESSION['teacher']));
        }
        else
        {
            $data['ringkasan'] = null;
        }

        //$data['listsekolah'] = $this->registration_model->search('guru','nama',$data['ringkasan']);

        // pagination limit
        $pagination['base_url'] = site_url('admin/sekretariat/teacher_list');
        $pagination['per_page'] = $this->perPage;
        $pagination['total_rows'] = $this->admin_model->getTotalTeacher($data['ringkasan']);
        $pagination['uri_segment'] = 4;
        //$offset = 20*$this->uri->segment(4,1)-20;
        $offset = $this->perPage * ($page - 1);

        $pagination['use_page_numbers']= TRUE;
        $pagination['cur_tag_open'] = "<li class='active'><span><b>";
        $pagination['cur_tag_close'] = "</b></span></li>";
        $pagination['first_tag_open'] = $pagination['last_tag_open']= $pagination['next_tag_open']= $pagination['prev_tag_open'] = $pagination['num_tag_open'] = '<li>';
        $pagination['first_tag_close'] = $pagination['last_tag_close']= $pagination['next_tag_close']= $pagination['prev_tag_close'] = $pagination['num_tag_close'] = '</li>';

        $this->pagination->initialize($pagination);

        $this->data['paginglinks'] = $this->pagination->create_links();

        if($this->data['paginglinks']!= '')
        {
            $startPosition =  ( ($this->pagination->cur_page-1) * $this->pagination->per_page ) + 1;
            $endPosition = $startPosition + $this->pagination->per_page - 1;
            $endPosition = ($endPosition > $pagination['total_rows']) ? $pagination['total_rows'] : $endPosition;
            $this->data['pagerMessage'] = 'Showing '. $startPosition .' to '. $endPosition .' of '.$pagination['total_rows'];
        }

        $this->data['listteacher'] = $this->admin_model->getTeacher($pagination['per_page'],$offset, $data['ringkasan'],$_SESSION['id_kompetisi']);
        $this->data['no'] = $offset+1;

        $this->data['pageTitle'] = 'Teacher List';
        $this->render_view('sekret/teacher_list','sekret/master_sekret');
    }

    public function reset_search_school()
    {
        if($this->input->get('resetSearch') !== NULL)
        {
            unset($_SESSION['school']);
            redirect(base_url() . 'admin/sekretariat/school_list');
        }
        else
        {
            redirect(base_url() . 'admin');
        }
    }

    function school_list($page = 1)
    {
        $this->load->model('area_model');

        $pagination['base_url'] = base_url().'admin/sekretariat/school_list';
        $pagination['per_page'] = $this->perPage;
        $pagination['uri_segment'] = 4;
        $pagination['num_links'] = 2;
        $pagination['use_page_numbers']= TRUE;
        //$offset = 20*$this->uri->segment(4,1)-20;
        $offset = $this->perPage * ($page - 1);

        $pagination['cur_tag_open'] = "<li class='active'><span><b>";
        $pagination['cur_tag_close'] = "</b></span></li>";
        $pagination['first_tag_open'] = $pagination['last_tag_open']= $pagination['next_tag_open']= $pagination['prev_tag_open'] = $pagination['num_tag_open'] = '<li>';
        $pagination['first_tag_close'] = $pagination['last_tag_close']= $pagination['next_tag_close']= $pagination['prev_tag_close'] = $pagination['num_tag_close'] = '</li>';

        if(!ctype_digit($page)) {
            $page = 1;
        }
        if ($this->input->post('btn') !== NULL)
        {
            $data['ringkasan'] = trim($this->input->post('cari'));
            if(strlen($data['ringkasan']) > 0) {
                // session untuk menyimpan data yang dicari (digunakan untuk pagination)
                $_SESSION['school'] = $data['ringkasan'];
            }
        }

        if(isset($_SESSION['school']))
        {
            $data['ringkasan'] = $_SESSION['school'];
            $this->data['searchKeyword'] = htmlentities(trim($_SESSION['school'])) ;
        }
        else{
            $data['ringkasan'] = null;
        }

        $pagination['total_rows'] = $this->admin_model->getTotalSekolah($data['ringkasan']);
        $this->pagination->initialize($pagination);

        $this->data['paginglinks'] = $this->pagination->create_links();

        if($this->data['paginglinks']!= '') {
            $startPosition =  ( ($this->pagination->cur_page-1) * $this->pagination->per_page ) + 1;
            $endPosition = $startPosition + $this->pagination->per_page - 1;
            $endPosition = ($endPosition > $pagination['total_rows']) ? $pagination['total_rows'] : $endPosition;
            $this->data['pagerMessage'] = 'Showing '. $startPosition .' to '. $endPosition .' of '.$pagination['total_rows'];
        }

        $this->data['no'] = $offset+1;
        $this->data['daftar_sekolah'] = $this->admin_model->getSchoolList($pagination['per_page'],$offset,$data['ringkasan']);
        $this->data['daftarProvinsi'] = $this->area_model->getSemuaProvinsi();

        if ($this->input->post('add_school'))
        {
            $this->add_school();
        }

        $this->data['pageTitle'] = 'School List';
        $this->render_view('sekret/school_list','sekret/master_sekret');
    }

    function edit_school($id = null)
    {
        if ($this->registration_model->isAvailableSchool($id) && $id != null && ctype_digit($id))
        {
            $this->load->model('area_model');
            if ($this->input->post('edit_school') !== NULL)
            {
                $this->form_validation->set_rules('schoolname', "Nama sekolah", 'trim|required|max_length[100]');
                $this->form_validation->set_rules('schooladdress', "Alamat sekolah", 'trim|required|max_length[300]');
                $this->form_validation->set_rules('cboKabupaten', "Kabupaten/Kota", 'trim|required|numeric');

                $this->form_validation->set_error_delimiters('<span class="required">', '</span>');
                $this->form_validation->set_message('required','{field} harus diisi');
                $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->data['error_edit_school'] = true;
                    $this->data['sekolah'] = $this->admin_model->getSekolahWithID($id);
                    $idProv = $this->data['sekolah']['id_prov'];
                    $this->data['daftarProvinsi'] = $this->area_model->getSemuaProvinsi();
                    $this->data['daftarKabupaten'] = $this->area_model->getKabupaten($idProv);
                    $this->render_view('sekret/edit_school_list','sekret/master_sekret');
                }
                else
                {
                    $school_name = $this->input->post('schoolname');
                    /*$school_city = $this->input->post('schoolcity');*/
                    $school_address = $this->input->post('schooladdress');
                    $id_kabupaten = $this->input->post('cboKabupaten');

                    $this->registration_model->updateSchool($school_name, "-", $school_address, $id, $id_kabupaten);

                    //$this->session->set_flashdata("pesan", "The School has been updated");
                    $_SESSION['pesan'] = "Data Sekolah berhasil diperbarui";
                    $this->session->mark_as_flash('pesan');
                    redirect(base_url() . "admin/sekretariat/school_list");
                }
            }
            else
            {
                //$this->data['backPage'] = $id * $this->perPage
                $this->data['sekolah'] = $this->admin_model->getSekolahWithID($id);
                $idProv = $this->data['sekolah']['id_prov'];
                $this->data['daftarProvinsi'] = $this->area_model->getSemuaProvinsi();
                $this->data['daftarKabupaten'] = $this->area_model->getKabupaten($idProv);
                $this->render_view('sekret/edit_school_list','sekret/master_sekret');
            }
        }
        else
        {
            redirect(base_url() . 'admin/sekretariat/school_list');
        }
    }

    private function add_school()
    {
       /* if ($this->input->post('add_school'))
        {*/
            $this->form_validation->set_rules('schoolname', "Nama sekolah", 'trim|required|max_length[100]');
            $this->form_validation->set_rules('schooladdress', "Alamat sekolah", 'trim|required|max_length[300]');
            $this->form_validation->set_rules('cboKabupaten', "Kabupaten/Kota", 'trim|required|numeric');

            $this->form_validation->set_error_delimiters('<span class="required">', '</span>');
            $this->form_validation->set_message('required','{field} harus diisi');
            $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

            if ($this->form_validation->run() == FALSE)
            {
                $this->data['error_add_school'] = true;

                $this->render_view('sekret/school_list','sekret/master_sekret');
            }
            else
            {
                $school_name = $this->input->post('schoolname');
                //$school_city = $this->input->post('schoolcity');
                $school_city = '-';
                $school_address = $this->input->post('schooladdress');
                $id_kabupaten = $this->input->post('cboKabupaten');

                $this->registration_model->setSchool($school_name, $school_city, $school_address, $id_kabupaten);

                $_SESSION['pesan'] = "Sekolah baru berhasil disimpan";
                $this->session->mark_as_flash('pesan');
                redirect(base_url() . "admin/sekretariat/school_list");
            }
        /*}*/
    }
}
?>