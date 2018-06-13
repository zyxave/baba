<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 9/17/2015
 * Time: 1:52 PM
 */
class admin_sekretariat extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('AdminSekretariat_model','sekreM');
    }
    function index(){
        $this->load->view('sekret/sekret_home');
        $this->load->library('form_validation');
    }

    function team_status(){
        if (isset($_POST['btn'])) {
            $data['ringkasan'] = $this->input->post('cari');
            // se session userdata untuk pencarian, untuk paging pencarian
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
        $this->db->like('tim.nama', $data['ringkasan']);
        $this->db->from('tim');

        // pagination limit
        $pagination['base_url'] = base_url().'Admin_Sekretariat/team_status';
        $pagination['total_rows'] = $this->db->count_all_results();
        $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
        $pagination['full_tag_close'] = "</div></p>";
        $pagination['cur_tag_open'] = "<span class=\"current\">";
        $pagination['cur_tag_close'] = "</span>";
        $pagination['num_tag_open'] = "<span class=\"disabled\">";
        $pagination['num_tag_close'] = "</span>";
        $pagination['per_page'] = "20";
        $pagination['uri_segment'] = 3;
        $pagination['num_links'] = 2;
        $this->pagination->initialize($pagination);
        $data['ListSekolah'] = $this->sekreM->getReadyTim($pagination['per_page'],$this->uri->segment(3,0),
            $data['ringkasan']);
        $this->load->vars($data);
        $this->load->view('sekret/ready_team');
    }

    function teacher_list() {
        if (isset($_POST['btn'])) {
            $data['ringkasan'] = $this->input->post('cari');
            // se session userdata untuk pencarian, untuk paging pencarian
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
        $this->db->like('guru.nama', $data['ringkasan']);
        $this->db->from('guru');

        // pagination limit
        $pagination['base_url'] = base_url().'Admin_Sekretariat/teacher_list';
        $pagination['total_rows'] = $this->db->count_all_results();
        $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
        $pagination['full_tag_close'] = "</div></p>";
        $pagination['cur_tag_open'] = "<span class=\"current\">";
        $pagination['cur_tag_close'] = "</span>";
        $pagination['num_tag_open'] = "<span class=\"disabled\">";
        $pagination['num_tag_close'] = "</span>";
        $pagination['per_page'] = "20";
        $pagination['uri_segment'] = 3;
        $pagination['num_links'] = 2;
        $this->pagination->initialize($pagination);
        $data['ListSekolah'] = $this->sekreM->getTeacher($pagination['per_page'],$this->uri->segment(3,0),
            $data['ringkasan']);
        $this->load->vars($data);
        $this->load->view('sekret/teacher_list');
    }

    function school_list(){
        if (isset($_POST['btn'])) {
            $data['ringkasan'] = $this->input->post('cari');
            // se session userdata untuk pencarian, untuk paging pencarian
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
        $this->db->like('nama', $data['ringkasan']);
        $this->db->from('sekolah');

        // pagination limit
        $pagination['base_url'] = base_url().'Admin_Sekretariat/school_list';
        $pagination['total_rows'] = $this->db->count_all_results();
        $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
        $pagination['full_tag_close'] = "</div></p>";
        $pagination['cur_tag_open'] = "<span class=\"current\">";
        $pagination['cur_tag_close'] = "</span>";
        $pagination['num_tag_open'] = "<span class=\"disabled\">";
        $pagination['num_tag_close'] = "</span>";
        $pagination['per_page'] = "20";
        $pagination['uri_segment'] = 3;
        $pagination['num_links'] = 2;
        $this->pagination->initialize($pagination);
        $data['ListSekolah'] = $this->sekreM->getSchool($pagination['per_page'],$this->uri->segment(3,0),
            $data['ringkasan']);
        $this->load->vars($data);
        $this->load->view('sekret/school_list');
    }
}