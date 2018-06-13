<?php

/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 12/26/2015
 * Time: 4:13 PM
 */
class Logika extends Soal_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['pageTitle'] = 'Sie Soal';
        $this->load->model('Logika_model', 'logikamodel');
        $this->data['logic'] = true; // supaya kelihatan navigasinya lg dimana posisinya
    }

    public function index(){
        $this->data['upcomingContests'] = $this->logikamodel->getUpcomingContests($_SESSION['id_kompetisi']);
        $this->data['runningContests'] = $this->logikamodel->getRunningContests($_SESSION['id_kompetisi']);
        $this->data['finishedContests'] = $this->logikamodel->getFinishedContests($_SESSION['id_kompetisi']);
        $this->render_view('sie_soal_logika/home', 'sie_soal/master_soal');
    }

    public function new_contest()
    {
        $this->render_view('sie_soal_logika/create_contest', 'sie_soal/master_soal');
    }

    public function create_contest()
    {
        if($this->input->post('createContest') === null)
        {
            redirect(base_url('admin/logika/new_contest'));
        }

        $this->form_validation->set_rules("name", "Nama Kontes", 'trim|required|min_length[5]');
        $this->form_validation->set_rules("date", "Tanggal", 'trim|required|callback__valid_date');
        $this->form_validation->set_rules("startTime", "Waktu Mulai", 'trim|required');
        $this->form_validation->set_rules("endTime", "Waktu Selesai", 'trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');

        $contestName = $this->input->post('name');
        $date = $this->input->post('date');
        $startTime = $this->input->post('startTime');
        $endTime = $this->input->post('endTime');

        $date = date('Y-m-d', strtotime($date));

        $contestTime = $this->isNewContestTimeValid($startTime,$endTime);
        if ($this->form_validation->run() === FALSE || $contestTime === false)
        {
            if($contestTime === false)
            {
                $this->data['error'] = "Waktu Mulai harus lebih awal dari Waktu Selesai";
            }
            $this->render_view('sie_soal_logika/create_contest', 'sie_soal/master_soal');
        }
        else
        {
            $contestId = $this->logikamodel->createLogikaContest($contestName,$date, $startTime, $endTime, 0, $_SESSION['admin_id']);
            $_SESSION['contestCreated'] = true;
            $this->session->mark_as_flash('contestCreated');
            redirect(base_url() . 'admin/logika/contest/' . $contestId);

        }
    }

    public function contest($contestId)
    {
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/logika');
        }

        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_logika/contest_info', 'sie_soal/master_soal');
    }

    public function new_problem($contestId)
    {
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/logika');
        }
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_logika/create_soal', 'sie_soal/master_soal');
    }

    public function create_problem()
    {
        if($this->input->post('createProblem') === null)
        {
            redirect(base_url('admin/logika/new_problem'));
        }
        $this->form_validation->set_rules("a", "A", 'trim|required');
        $this->form_validation->set_rules("b", "B", 'trim|required');
        $this->form_validation->set_rules("c", "C", 'trim|required');
        $this->form_validation->set_rules("d", "D", 'trim|required');
        $this->form_validation->set_rules("e", "E", 'trim|required');
        $this->form_validation->set_rules("isi", "Soal", 'trim|required');
        $this->form_validation->set_rules("jawaban", "Jawaban", 'trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
        $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

        $contestId = $this->input->post('contestId');

        if($this->form_validation->run() === false || isset($_SESSION['errors']))
        {
            $this->data['contest'] = $this->logikamodel->getContestById($contestId);
            $this->render_view('sie_soal_logika/create_soal', 'sie_soal/master_soal');
        }
        else
        {
            $soal = $this->input->post('isi');
            $a = $this->input->post('a');
            $b = $this->input->post('b');
            $c = $this->input->post('c');
            $d = $this->input->post('d');
            $e = $this->input->post('e');
            $jawaban = $this->input->post('jawaban');

            $id_soal_pilgan = $this->logikamodel->setSoalKontesPilgan($soal, $jawaban, $contestId);
            $this->logikamodel->setPilihanPilgan('a', $a, $id_soal_pilgan['id']);
            $this->logikamodel->setPilihanPilgan('b', $b, $id_soal_pilgan['id']);
            $this->logikamodel->setPilihanPilgan('c', $c, $id_soal_pilgan['id']);
            $this->logikamodel->setPilihanPilgan('d', $d, $id_soal_pilgan['id']);
            $this->logikamodel->setPilihanPilgan('e', $e, $id_soal_pilgan['id']);

            $_SESSION['problemCreated'] = true;
            $this->session->mark_as_flash('problemCreated');
            redirect(base_url() . 'admin/logika/problems/' . $contestId);
        }
    }

    public function update_problem()
    {
        if($this->input->post('editSoal') === null)
        {
            redirect(base_url(). 'admin/logika');
        }

        $this->form_validation->set_rules("a", "A", 'trim|required');
        $this->form_validation->set_rules("b", "B", 'trim|required');
        $this->form_validation->set_rules("c", "C", 'trim|required');
        $this->form_validation->set_rules("d", "D", 'trim|required');
        $this->form_validation->set_rules("e", "E", 'trim|required');
        $this->form_validation->set_rules("isi", "Soal", 'trim|required');
        $this->form_validation->set_rules("jawaban", "Jawaban", 'trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
        $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');


        $problemId = $this->input->post('problemId');

        if($this->form_validation->run() === false)
        {
            $this->data['soal'] = $this->logikamodel->getProblem($problemId);
            $this->render_view('sie_soal_logika/edit_soal', 'sie_soal/master_soal');
        }
        else
        {
            $soal = $this->input->post('isi');
            $a = $this->input->post('a');
            $b = $this->input->post('b');
            $c = $this->input->post('c');
            $d = $this->input->post('d');
            $e = $this->input->post('e');
            $jawaban = $this->input->post('jawaban');

            $this->logikamodel->updateProblem($soal, $jawaban, $problemId);
            $this->logikamodel->updatePilihanPilgan('a', $a, $problemId);
            $this->logikamodel->updatePilihanPilgan('b', $b, $problemId);
            $this->logikamodel->updatePilihanPilgan('c', $c, $problemId);
            $this->logikamodel->updatePilihanPilgan('d', $d, $problemId);
            $this->logikamodel->updatePilihanPilgan('e', $e, $problemId);

            $_SESSION['problemUpdated'] = true;
            $this->session->mark_as_flash('problemUpdated');
            redirect(base_url() . 'admin/logika/see_problem/' . $problemId);
        }
    }

    function score($contestId) {
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/logika');
        }
        $this->data['score'] = $this->logikamodel->getScoreMultipleChoice($contestId, $_SESSION['id_kompetisi']);
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_logika/score','sie_soal/master_soal');
    }

    public function edit_problem($problemId)
    {
        $problem = $this->logikamodel->getProblem($problemId);
        if(!isset($problem)) {
            redirect(base_url() . 'admin/logika');
        }

        $this->data['soal'] = $problem;
        $this->data['a'] = $this->logikamodel->getPilihan('a',$problemId);
        $this->data['b'] = $this->logikamodel->getPilihan('b',$problemId);
        $this->data['c'] = $this->logikamodel->getPilihan('c',$problemId);
        $this->data['d'] = $this->logikamodel->getPilihan('d',$problemId);
        $this->data['e'] = $this->logikamodel->getPilihan('e',$problemId);
        $this->render_view('sie_soal_logika/edit_soal', 'sie_soal/master_soal');
    }

    public function problems($contestId)
    {
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/logika');
        }

        $problemSet = $this->logikamodel->getProblemSet($contestId);
        $this->data['problemSet'] = $problemSet;
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_logika/list_soal', 'sie_soal/master_soal');
    }

    public function see_problem($problemId)
    {
        $problem = $this->logikamodel->getProblem($problemId);
        if(!isset($problem)) {
            redirect(base_url() . 'admin/logika');
        }

        $this->data['soal'] = $problem;
        $this->data['jawaban'] = $this->logikamodel->getJawaban($problemId);
        $this->render_view('sie_soal_logika/soal', 'sie_soal/master_soal');
    }

    public function see_all_problem($contestId){
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/logika');
        }
        $kontes = $this->logikamodel->getNamaKontesPilganWithId2($contestId);
        if (count($kontes) > 0)
        { // kontes ada
            $this->data['nama'] = $kontes['nama'];
            $this->data['soal'] = $this->logikamodel->getProblemSet($contestId);
            for ($i = 1; $i <= $kontes['jml_soal']; $i++) {
                $pilihan[] = $this->logikamodel->getPilihanAllSoal($i, $contestId);
            }
            $this->data['pilihan'] = $pilihan;
            //$this->load->view('problem_multiple_choice_view', $data);
            $this->render_view('sie_soal_logika/all_soal','sie_soal/master_soal');
        }
    }

    private function isNewContestTimeValid($startTime, $endTime)
    {
        $startTime = strtotime($startTime);
        $endTime = strtotime($endTime);
        if($startTime < $endTime)
        {
            return [$startTime,$endTime];
        }
        else
        {
            return false;
        }
    }

    public function _valid_date($date)
    {
        $this->form_validation->set_message('_valid_date','{field} harus dalam format yang sesuai');
        if (strtotime($date) === false)
        {
            return false;
        }
        return true;
    }

    public function edit_contest()
    {
        if($this->input->post('editContest') == null)
            redirect(base_url() . 'admin/logika');

        $this->form_validation->set_rules("name", "Nama Kontes", 'trim|required|min_length[5]');
        $this->form_validation->set_rules("date", "Tanggal", 'trim|required|callback__valid_date');
        $this->form_validation->set_rules("startTime", "Waktu Mulai", 'trim|required');
        $this->form_validation->set_rules("endTime", "Waktu Selesai", 'trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');


        $contestId = $this->input->post('id');
        $contestName = $this->input->post('name');
        $date = $this->input->post('date');
        $startTime = $this->input->post('startTime');
        $endTime = $this->input->post('endTime');

        $date = date('Y-m-d', strtotime($date));

        $contestTime = $this->isNewContestTimeValid($startTime,$endTime);
        if ($this->form_validation->run() === FALSE || $contestTime === false)
        {
            if($contestTime === false)
            {
                $this->data['error'] = "Waktu Mulai harus lebih awal dari Waktu Selesai";
            }
            $this->data['contest'] = $this->logikamodel->getContestById($contestId);
            $this->render_view('sie_soal_logika/contest_info', 'sie_soal/master_soal');
        }
        else
        {
            $this->logikamodel->updateLogikaContest($contestName,$date, $startTime, $endTime, $contestId);
            $_SESSION['contestUpdated'] = true;
            $this->session->mark_as_flash('contestUpdated');
            redirect(base_url() . 'admin/logika/contest/' . $contestId);
        }
    }

    public function team_list($contestId = null)
    {
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest))
        {
            redirect(base_url() . 'admin/logika');
        }

        $this->data['contest'] = $contest;
        $this->data['teams'] = $this->logikamodel->getReadyTeam($_SESSION['id_kompetisi'], $contestId);

        $this->render_view('sie_soal_logika/team_list', 'sie_soal/master_soal');
    }

    public function save_team_list()
    {
        if($this->input->post('teamList') === null)
        {
            redirect(base_url() . 'admin/logika');
        }

        $teamsId = $this->input->post('tim');
        $id_kontes = $this->input->post('contestId');

        $_SESSION['emptyTeamList'] = true;
        $this->session->mark_as_flash('emptyTeamList');

        $this->logikamodel->updateMengikutiPilgan($id_kontes, $teamsId);

        $_SESSION['updateTeamList'] = true;
        $this->session->mark_as_flash('updateTeamList');
        redirect(base_url() . "admin/logika/team_list/" . $id_kontes);
    }

    public function clarification($contestId){
        $contest = $this->logikamodel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/logika');
        }
        $this->data['klar_sudah'] = $this->logikamodel->getKlarifikasiSudahDijawab($contestId);
        $this->data['klar_belum'] = $this->logikamodel->getKlarifikasiBelumDijawab($contestId);
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_logika/clarification','sie_soal/master_soal');
    }
    
    function answer_clarification($id_klar, $contestId) {
        if($this->input->post('answer')==null){
            redirect(base_url().'admin/logika');
        }
            $jawaban = $this->input->post('jawaban');
            $this->logikamodel->setJawabanKlarPilgan($_SESSION['admin_id'], $jawaban, $id_klar);
            redirect(base_url() . "admin/logika/clarification/" . $contestId);
    }


}