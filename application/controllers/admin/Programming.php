<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/12/2015
 * Time: 20:56
 */
class Programming extends Soal_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['pageTitle'] = 'Sie Soal';
        $this->load->model('programming_model', 'progModel');
        $this->data['prog'] = true; // supaya kelihatan navigasinya lg dimana posisinya
    }

    public function index()
    {
        $this->data['upcomingContests'] = $this->progModel->getUpcomingContests($_SESSION['id_kompetisi']);
        $this->data['runningContests'] = $this->progModel->getRunningContests($_SESSION['id_kompetisi']);
        $this->data['finishedContests'] = $this->progModel->getFinishedContests($_SESSION['id_kompetisi']);
        $this->render_view('sie_soal_programming/home', 'sie_soal/master_soal');
    }

    public function new_contest()
    {
        $this->render_view('sie_soal_programming/create_contest', 'sie_soal/master_soal');
    }

    public function create_contest()
    {
        if($this->input->post('createContest') === null)
        {
            redirect(base_url('admin/programming/new_contest'));
        }

        $this->form_validation->set_rules("name", "Nama Kontes", 'trim|required|max_length[100]|min_length[5]');
        $this->form_validation->set_rules("date", "Tanggal", 'trim|required|callback__valid_date');
        $this->form_validation->set_rules("startTime", "Waktu Mulai", 'trim|required');
        $this->form_validation->set_rules("endTime", "Waktu Selesai", 'trim|required');
        $this->form_validation->set_rules("freezeTime", "Waktu Freeze", 'trim|required');
        $this->form_validation->set_rules("endFreezeTime", "End Freeze DateTime", 'trim|required');
        $this->form_validation->set_rules("scoreboardUrl", "Scoreboard URL", 'trim|required|alpha_dash|is_unique[kontes_pemrograman.scoreboard_name]|max_length[30]');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
        $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

        $contestName = $this->input->post('name');
        $date = $this->input->post('date');
        $startTime = $this->input->post('startTime');
        $endTime = $this->input->post('endTime');
        $freezeTime = $this->input->post('freezeTime');
        $endFreezeTime = $this->input->post('endFreezeTime');
        $scoreboardUrl = $this->input->post('scoreboardUrl');

        //$date = date('Y-m-d', strtotime($date));

        $contestTime = $this->isNewContestTimeValid($date,$startTime,$endTime, $freezeTime,$endFreezeTime);
        if ($this->form_validation->run() === FALSE || $contestTime === false)
        {
            if($contestTime === false)
            {
                $this->data['error'] = "Waktu Mulai harus lebih awal dari Waktu Selesai, Waktu Freeze harus diantara Waktu Mulai dan Selesai, dan Waktu End Freeze harus >= Waktu Selesai";
            }
            $this->render_view('sie_soal_programming/create_contest', 'sie_soal/master_soal');
        }
        else
        {

            $contestId = $this->progModel->createProgrammingContest($contestName,$date, $startTime, $endTime, $freezeTime,$endFreezeTime,$scoreboardUrl, 0, $_SESSION['admin_id']);
            $_SESSION['contestCreated'] = true;
            $this->session->mark_as_flash('contestCreated');
            redirect(base_url() . 'admin/programming/contest/' . $contestId);

        }
    }

    private function isNewContestTimeValid($date,$startTime, $endTime, $freezeTime,$endFreezeTime)
    {
        $endDateTime = $date . " " . $endTime;
        $startTime = strtotime($startTime);
        $endTime = strtotime($endTime);
        $freezeTime = strtotime($freezeTime);
        $endDateTime = date('Y-m-d H:i:s', strtotime($endDateTime));
        $endFreezeTime = date('Y-m-d H:i:s',strtotime($endFreezeTime));

        if($startTime < $freezeTime && $freezeTime < $endTime && $endDateTime <= $endFreezeTime)
        {
          //  return [$startTime,$endTime,$freezeTime,$endFreezeTime];
            return true;
        }
        else
        {
            return false;
        }
    }

    public function edit_contest()
    {
        if($this->input->post('editContest') == null)
            redirect(base_url() . 'admin/programming');

        $this->form_validation->set_rules("name", "Nama Kontes", 'trim|required|max_length[100]|min_length[5]');
        $this->form_validation->set_rules("date", "Tanggal", 'trim|required|callback__valid_date');
        $this->form_validation->set_rules("startTime", "Waktu Mulai", 'trim|required');
        $this->form_validation->set_rules("endTime", "Waktu Selesai", 'trim|required');
        $this->form_validation->set_rules("freezeTime", "Waktu Freeze", 'trim|required');

        $this->form_validation->set_rules("endFreezeTime", "Waktu Selesai Freeze", 'trim|required');
        $this->form_validation->set_rules("scoreboardUrl", "Scoreboard Url", 'trim|required|alpha_dash|max_length[30]');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
        $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

        $contestId = $this->input->post('id');
        $contestName = $this->input->post('name');
        $date = $this->input->post('date');
        $startTime = $this->input->post('startTime');
        $endTime = $this->input->post('endTime');
        $freezeTime = $this->input->post('freezeTime');
        $endFreezeTime = $this->input->post('endFreezeTime');
        $scoreboardUrl = $this->input->post('scoreboardUrl');

        //$date = date('Y-m-d', strtotime($date));

        $contestTime = $this->isNewContestTimeValid($date,$startTime,$endTime, $freezeTime,$endFreezeTime);

        if ($this->form_validation->run() === FALSE || $contestTime === false)
        {
            if($contestTime === false)
            {
                $this->data['error'] = "aktu Mulai harus lebih awal dari Waktu Selesai, Waktu Freeze harus diantara Waktu Mulai dan Selesai, dan Waktu End Freeze harus >= Waktu Selesai";
            }
            $this->data['contest'] = $this->progModel->getContestById($contestId);
            $this->render_view('sie_soal_programming/contest_info', 'sie_soal/master_soal');
        }
        else
        {
            $this->progModel->updateProgrammingContest($contestName,$date, $startTime, $endTime, $freezeTime,$endFreezeTime,$scoreboardUrl, $contestId);
            $_SESSION['contestUpdated'] = true;
            $this->session->mark_as_flash('contestUpdated');
            redirect(base_url() . 'admin/programming/contest/' . $contestId);
        }
    }

    public function contest($contestId)
    {
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/programming');
        }

        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_programming/contest_info', 'sie_soal/master_soal');
    }

    public function _valid_date($date)
    {
        $this->form_validation->set_message('_valid_date','{field} harus dalam format yang sesuai');
        if (strtotime($date) === false)
        {
            return false;
        }
        /*else
        {
            list($year, $month, $day) = explode('-', $date);
            if (checkdate($month, $day, $year) === false)
            {
                return false;
            }
        }*/
        return true;
    }

    public function new_problem($contestId)
    {
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/programming');
        }
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_programming/create_soal', 'sie_soal/master_soal');
    }

    public function create_problem()
    {
        if($this->input->post('createProblem') === null)
        {
            redirect(base_url('admin/programming/new_problem'));
        }
        $this->form_validation->set_rules("judul", "Judul Soal", 'trim|required');
        $this->form_validation->set_rules("pembuat", "Pembuat soal", 'trim|required');
        $this->form_validation->set_rules("timeLimit", "Time Limit", 'trim|required|numeric');
        $this->form_validation->set_rules("deskripsi", "Deskripsi Soal", 'trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
        $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

        $this->check_file();
        $contestId = $this->input->post('contestId');

        if($this->form_validation->run() === false || isset($_SESSION['errors']))
        {
            $this->data['contest'] = $this->progModel->getContestById($contestId);
            $this->render_view('sie_soal_programming/create_soal', 'sie_soal/master_soal');
        }
        else
        {
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');
            $timeLimit = $this->input->post('timeLimit');
            $pembuat = $this->input->post('pembuat');

            $config['upload_path'] = 'asset/input_files/';
            $config['allowed_types'] = 'in';
            $config['max_size'] = 5120; // 5 MB '2048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('inputFile');
            $uploaded = $this->upload->data();
            $inputFileName = "asset/input_files/" . $uploaded['file_name'];

            $config['upload_path'] = 'asset/output_files/';
            $config['allowed_types'] = 'out';
            $config['max_size'] = 5120; //'2048';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $this->upload->do_upload('outputFile');
            $uploaded = $this->upload->data();
            $outputFileName = "asset/output_files/" . $uploaded['file_name'];

            $this->progModel->setProblem($judul,$deskripsi,$inputFileName,$outputFileName,$timeLimit,$pembuat,$contestId);
            $_SESSION['problemCreated'] = true;
            $this->session->mark_as_flash('problemCreated');
            redirect(base_url() . 'admin/programming/problems/' . $contestId);
        }
    }

    private function check_file(){
        //var_dump($_FILES); die();
        $err = 0;
        if ($_FILES['inputFile']["error"] > 0) {
            $err = 1;
        }
        else {
            if ($_FILES['inputFile']["size"] > (5 * 1024 * 1024)) {
                $err = 1;
            }
            $myArray = explode(".", $_FILES['inputFile']["name"]);
            if (end($myArray) != "in") {
                $err = 1;
            }
        }

        if ($err == 1) {
            $errors['inputFile'] = "The input file is not valid";
            $err = 0;
        }

        if ($_FILES['outputFile']["error"] > 0) {
            $err = 1;
        }
        else {
            if ($_FILES['outputFile']["size"] > (5 * 1024 * 1024)) {
                $err = 1;
            }
            $temp = explode(".", $_FILES['outputFile']["name"]);

            if (end($temp) != 'out') {
                $err = 1;
            }
        }

        if ($err == 1) {
            $errors['outputFile'] = "The output file is not valid";
        }
        if (isset($errors))
        {
            $_SESSION['errors'] = $errors;
            $this->session->mark_as_flash('errors');
        }
    }

    public function problems($contestId)
    {
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/programming');
        }

        $problemSet = $this->progModel->getProblemSet($contestId);
        $this->data['problemSet'] = $problemSet;
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_programming/list_soal', 'sie_soal/master_soal');
    }

    public function see_problem($problemId)
    {
        $problem = $this->progModel->getProblem($problemId);
        if(!isset($problem)) {
            redirect(base_url() . 'admin/programming');
        }

        $this->data['soal'] = $problem;
        $this->render_view('sie_soal_programming/soal', 'sie_soal/master_soal');
    }

    public function edit_problem($problemId)
    {
        $problem = $this->progModel->getProblem($problemId);
        if(!isset($problem)) {
            redirect(base_url() . 'admin/programming');
        }

        $this->data['soal'] = $problem;
        $this->render_view('sie_soal_programming/edit_soal', 'sie_soal/master_soal');
    }

    public function update_problem()
    {
        if($this->input->post('editSoal') === null)
        {
            redirect(base_url(). 'admin/programming');
        }

        $this->form_validation->set_rules("judul", "Judul Soal", 'trim|required');
        $this->form_validation->set_rules("pembuat", "Pembuat soal", 'trim|required');
        $this->form_validation->set_rules("timeLimit", "Time Limit", 'trim|required|numeric');
        $this->form_validation->set_rules("deskripsi", "Deskripsi Soal", 'trim|required');

        $this->form_validation->set_message('required','{field} harus diisi');
        $this->form_validation->set_message('min_length','{field} harus diisi minimum {param} karakter');
        $this->form_validation->set_message('max_length','{field} tidak boleh melebihi {param} karakter');

        $editInputFile = null;
        $editOutputFile = null;
        if(!empty($_FILES['inputFile']['name']))
        {
            $this->check_inputfile();
            $editInputFile = true;
        }
        if(!empty($_FILES['outputFile']['name']))
        {
            $this->check_outputfile();
            $editOutputFile = true;
        }

        $problemId = $this->input->post('problemId');
        if($this->form_validation->run() === false || isset($_SESSION['inputFileError']) || isset($_SESSION['outputFileError']))
        {
            $this->data['soal'] = $this->progModel->getProblem($problemId);
            $this->render_view('sie_soal_programming/edit_soal', 'sie_soal/master_soal');
        }
        else
        {
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');
            $timeLimit = $this->input->post('timeLimit');
            $pembuat = $this->input->post('pembuat');

            $inputFileName = null;
            $outputFileName = null;
            $this->load->library('upload');
            if($editInputFile !== null)
            {
                $config['upload_path'] = 'asset/input_files/';
                $config['allowed_types'] = 'in';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('inputFile');
                $uploaded = $this->upload->data();
                $inputFileName = "asset/input_files/" . $uploaded['file_name'];
            }
            if($editOutputFile !== null)
            {
                $config['upload_path'] = 'asset/output_files/';
                $config['allowed_types'] = 'out';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('outputFile');
                $uploaded = $this->upload->data();
                $outputFileName = "asset/output_files/" . $uploaded['file_name'];
            }

            $this->progModel->updateProblem($judul,$deskripsi,$inputFileName,$outputFileName,$timeLimit,$pembuat,$problemId);
            $_SESSION['problemUpdated'] = true;
            $this->session->mark_as_flash('problemUpdated');
            redirect(base_url() . 'admin/programming/see_problem/' . $problemId);
        }

    }

    private function check_inputfile()
    {
        $err = 0;
        if ($_FILES['inputFile']["error"] > 0) {
            $err = 1;
        }
        else {
            if ($_FILES['inputFile']["size"] > (5 * 1024 * 1024)) {
                $err = 1;
            }
            $myArray = explode(".", $_FILES['inputFile']["name"]);
            if (end($myArray) != "in") {
                $err = 1;
            }
        }

        if ($err == 1) {
            $_SESSION['inputFileError'] = "The input file is not valid";
            $this->session->mark_as_flash('inputFileError');
        }
    }

    private function check_outputfile()
    {
        if ($_FILES['outputFile']["error"] > 0) {
            $err = 1;
        }
        else {
            if ($_FILES['outputFile']["size"] > (5 * 1024 * 1024)) {
                $err = 1;
            }
            $temp = explode(".", $_FILES['outputFile']["name"]);

            if (end($temp) != 'out') {
                $err = 1;
            }
        }

        if ($err == 1) {
            $_SESSION['outputFileError'] = "The output file is not valid";
            $this->session->mark_as_flash('outputFileError');
        }
    }

    public function team_list($contestId = null)
    {
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest))
        {
            redirect(base_url() . 'admin/programming');
        }

        $this->data['contest'] = $contest;
        $this->data['teams'] = $this->progModel->getReadyTeam($_SESSION['id_kompetisi'], $contestId);

        $this->render_view('sie_soal_programming/team_list', 'sie_soal/master_soal');

    }

    public function save_team_list()
    {
        if($this->input->post('teamList') === null)
        {
            redirect(base_url() . 'admin/programming');
        }

        $teamsId = $this->input->post('tim');
        $id_kontes = $this->input->post('contestId');


        $_SESSION['emptyTeamList'] = true;
        $this->session->mark_as_flash('emptyTeamList');

        $this->progModel->updateMengikutiPemrograman($id_kontes, $teamsId);

        $_SESSION['updateTeamList'] = true;
        $this->session->mark_as_flash('updateTeamList');
        redirect(base_url() . "admin/programming/team_list/" . $id_kontes);
    }

    /**
     *
     * @param $contestId
     */
    public function score($contestId)
    {
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest))
        {
            redirect(base_url() . 'admin/programming');
        }

        $this->data['score'] = $this->progModel->getScore($contestId, $_SESSION['id_kompetisi']);
        $this->data['contest'] = $contest;

        $this->load->model('competition_model', 'competitionModel');
        $this->data['max_poin_ac'] = $this->competitionModel->getMaxPoin($contestId);
        $this->render_view('sie_soal_programming/score', 'sie_soal/master_soal');
    }

    public function scoreboard($contestId)
    {
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest))
        {
            redirect(base_url() . 'admin/programming');
        }
        $this->data['contest'] = $contest;
        $this->data['problem'] = $this->progModel->getProblemByIdKontes($contestId);
        $this->data['scoreboard'] = $this->progModel->getScoreboard($contestId);
        $this->data['hasil'] = $this->progModel->getTotalAttSolved($contestId);
        $this->render_view('sie_soal_programming/scoreboard', 'sie_soal/master_soal');
    }

    public function clarification($contestId)
    {
    	
        $contest = $this->progModel->getContestById($contestId);
        if(empty($contest)) {
            redirect(base_url() . 'admin/programming');
        }
        $this->data['klar_sudah'] = $this->progModel->getKlarAnswer($contestId);
        $this->data['klar_belum'] = $this->progModel->getKlarNotAnswer($contestId);
        $this->data['contest'] = $contest;
        $this->render_view('sie_soal_programming/clarification','sie_soal/master_soal');
    }

    public function answer_clarification($id_klar, $contestId)
    {
        if($this->input->post('answer')==null){
            redirect(base_url().'admin/programming');
        }
        $jawaban = $this->input->post('jawaban');
        $this->progModel->setJawabanKlarPilgan($_SESSION['admin_id'], $jawaban, $id_klar);
        redirect(base_url() . "admin/programming/clarification/" . $contestId);
    }
}