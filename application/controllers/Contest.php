<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 02/01/2016
 * Time: 19:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contest extends Contestant_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('competition_model','competitionModel');
        $this->load->model('contestant_model','contestantModel');
    }

    public function index()
    {
        $teamStatus = $this->contestantModel->getStatusTim($_SESSION['login_id']);
        if($teamStatus !== 'ready')
        {
            $_SESSION['notReadyMessage'] = "Maaf, Tim anda belum dapat mengakses kontes ILPC";
		
            $this->session->mark_as_flash('notReadyMessage');
			
		
            redirect(base_url() . 'contest/not_available');
			
        }

        $upcomingContests = $this->competitionModel->getUpcomingContestsToJoin($_SESSION['login_id']);
        $availableContests = $this->competitionModel->getContestsToJoin($_SESSION['login_id']);
        $this->data['availableContests'] = $availableContests;
        $this->data['upcomingContests'] = $upcomingContests;

        $this->data['contest'] = true;
        $this->render_view('contestant/contest','contestant/mastercontestant');

    }

    /**
     * pengecekan awal untuk semua function yg terkait page "Active Contest"
     * klo tidak pernah join contest, beri pemberitahuan utk join dulu
     *
     */
    private function check_active_contest_access()
    {
        if(!isset($_SESSION['id_kontes']))
        {
            $_SESSION['hasNotJoinContest'] = true;
            $this->session->mark_as_flash('hasNotJoinContest');
            redirect(base_url() . 'contest/has_not_join');
        }

        if($_SESSION['tipe_kontes'] === 'programming')
        {
            //jika kontes tidak ada, atau waktunya udah habis
            if(!$this->competitionModel->isProgrammingContestAvailable($_SESSION['id_kontes']))
            {
                $_SESSION['contestEndedMessage'] = "Maaf, kontes " . $_SESSION['nama_kontes'] . " telah berakhir.";
                unset($_SESSION['id_kontes']);
                unset($_SESSION['tipe_kontes']);
                unset($_SESSION['nama_kontes']);
                redirect(base_url() . 'contest/not_available');
            }

            if(!$this->competitionModel->bolehIkutKontesPemrograman($_SESSION['id_kontes'], $_SESSION['login_id']))
            {
                redirect(base_url() . 'contest/not_found');
            }
        }
        elseif($_SESSION['tipe_kontes'] === 'multiple_choice')
        {

            if(!$this->competitionModel->isMultipleChoiceContestAvailable($_SESSION['id_kontes']))
            {
                $_SESSION['contestEndedMessage'] = "Maaf, kontes " . $_SESSION['nama_kontes'] . " telah berakhir.";
                unset($_SESSION['id_kontes']);
                unset($_SESSION['tipe_kontes']);
                unset($_SESSION['nama_kontes']);
                redirect(base_url() . 'contest/not_available');
            }

            if(!$this->competitionModel->bolehIkutKontesPilgan($_SESSION['id_kontes'], $_SESSION['login_id']))
            {
                redirect(base_url() . 'contest/not_found');
            }
        }
        else
        {
            redirect(base_url() . 'contest/not_found');
        }
    }

    public function active_contest()
    {
        $this->check_active_contest_access();

        $this->data['activeContest'] = true;

        if($_SESSION['tipe_kontes'] === 'programming')
        {

            $this->data['problems'] = $this->competitionModel->getProgrammingProblemsId($_SESSION['id_kontes']);
            $this->render_view('contestant/active_contest_program','contestant/mastercontestant');

        }
        elseif($_SESSION['tipe_kontes'] === 'multiple_choice')
        {
            $this->load->model('logika_model','logikaModel');
            $contest = $this->logikaModel->getRunningContestById($_SESSION['id_kontes']);

            $poin = $this->competitionModel->getMultipleChoicePoint($_SESSION['id_kompetisi']);
            if(count($contest) > 0 && $this->competitionModel->bolehIkutKontesPilgan($contest['id'], $_SESSION['login_id']))
            {
                $this->data['contestName'] = $contest['nama'];
               // $this->data['problems'] = $this->logikaModel->getProblemSet($_SESSION['id_kontes']);
                $this->data['problems'] = $this->logikaModel->getProblemSetAndTeamsAnswer($_SESSION['id_kontes'],$_SESSION['login_id']);

                for ($i = 1; $i <= $contest['jumlah_soal']; $i++)
                {
                    $pilihan[] = $this->logikaModel->getOptions($i,$_SESSION['id_kontes']);
                }
                $this->data["options"] = $pilihan;
                $this->data["poin"] = $poin;
                $this->render_view('contestant/active_contest_logika','contestant/mastercontestant');
            }
            else
            {
                redirect(base_url() . 'contest/not_found');
            }
            
        }
        else
        {
            redirect(base_url() . 'contest');
        }
    }

    public function save_temp_answer()
    {
    	$nomor = $this->input->get('nomor');
        $jawaban = $this->input->get('jawaban');

        $kontes_array = $_SESSION['kontes'];
        $kontes_array[$nomor] = $jawaban;
        $_SESSION['kontes'] = $kontes_array;

        //echo $_SESSION[$nomor];
    }

    /**
     * dipanggil jika :
     * 1.tim yg status nya != 'ready' karena belum bayar dsb,
     * 2. tim sdh join contest, tapi waktu kontes sudah habis
     */
    public function not_available()
    {
        if(isset($_SESSION['notReadyMessage']) || isset($_SESSION['contestEndedMessage']))
        {
            $this->data['activeContest'] = true;
            $this->render_view('contestant/contest_closed','contestant/mastercontestant');
        }
        else
        {
            redirect(base_url() . 'contest/not_found');
        }
    }

    public function has_not_join()
    {
        if(isset($_SESSION['hasNotJoinContest']))
        {
            $this->data['activeContest'] = true;
            $this->render_view('contestant/has_not_join','contestant/mastercontestant');
        }
        else
        {
            redirect(base_url() . 'contest/not_found');
        }
    }

    public function join_programming($contestId)
    {
        //cek apa ada kontes yg sedang running
        if(!$this->competitionModel->isProgrammingContestAvailable($contestId))
        {
            redirect(base_url() . 'contest/not_found');
        }

        if(!$this->competitionModel->bolehIkutKontesPemrograman($contestId, $_SESSION['login_id']))
        {
            // ga boleh ikut kontes
            redirect(base_url() . 'contest/not_found');
        }

        $contestName = $this->competitionModel->getNamaKontesPemrograman($contestId);
        $_SESSION['id_kontes'] = $contestId;
        $_SESSION['kontes_url'] = $this->competitionModel->getScoreboardUrlKontesPemrograman($contestId);

        $_SESSION['tipe_kontes'] = 'programming';
        $_SESSION['nama_kontes'] = $contestName;
        if(!$this->competitionModel->pernahIkutKontesPemrograman($contestId, $_SESSION['login_id']))
        {
            $this->competitionModel->setJamIkutKontesPemrograman($contestId, $_SESSION['login_id']);
        }

        $_SESSION['kontes'] = array();
        redirect(base_url() . 'contest/active_contest');
    }

    public function join_logic($contestId)
    {
        if(!$this->competitionModel->isMultipleChoiceContestAvailable($contestId))
        {
            redirect(base_url() . 'contest/not_found');
        }
        if(!$this->competitionModel->bolehIkutKontesPilgan($contestId, $_SESSION['login_id']))
        {
            // ga boleh ikut kontes
            redirect(base_url() . 'contest/not_found');
        }

        $contestName = $this->competitionModel->getNamaKontesPilgan($contestId);
        $_SESSION['id_kontes'] = $contestId;
        $_SESSION['tipe_kontes'] = 'multiple_choice';
        $_SESSION['nama_kontes'] = $contestName;
        if(!$this->competitionModel->pernahIkutKontesPilgan($contestId, $_SESSION['login_id']))
        {
            $this->competitionModel->setJamIkutKontesPilgan($contestId, $_SESSION['login_id']);
        }

        $_SESSION['kontes'] = array();
        redirect(base_url() . 'contest/active_contest');
    }

    public function programming_problem($problemId)
    {
        $this->check_active_contest_access();
        if($_SESSION['tipe_kontes'] !== 'programming')
        {
            redirect(base_url() . 'contest/not_found');
        }

        //get contestId By Problem
        $this->load->model('programming_model','programmingModel');
        $contest = $this->programmingModel->getContestByProblemId($problemId);
        //echo $contest['id'] . " " . $_SESSION['id_kontes']; die();

        if(!$this->competitionModel->bolehIkutKontesPemrograman($contest['id'], $_SESSION['login_id']) || !$this->competitionModel->isProgrammingContestAvailable($contest['id']))
        {
            redirect(base_url() . 'contest/not_found');
        }
        /*$contest = $this->programmingModel->getContestById($_SESSION['id_kontes']);*/
        $problems = $this->programmingModel->getProblem($problemId);

        $this->data['soal'] = $problems;
        $this->data['contestName'] = $contest['nama'];
        $this->data['pageTitle'] = 'Soal Programming ILPC 2018';
        $this->render_view('problem/programming','contestant/mastersimple');
    }

    public function logic_problem($contestId)
    {
        $this->check_active_contest_access();
        if($_SESSION['tipe_kontes'] !== 'multiple_choice')
        {
            redirect(base_url() . 'contest/not_found');
        }

        $this->load->model('logika_model','logikaModel');
        //$contest = $this->logikaModel->getContestById($contestId);
        $contest = $this->logikaModel->getRunningContestById($contestId);
        if(count($contest) > 0 && $this->competitionModel->bolehIkutKontesPilgan($contest['id'], $_SESSION['login_id']))
        {
            $this->data['contestName'] = $contest['nama'];
            $this->data['problems'] = $this->logikaModel->getProblemSet($contestId);
            //print_r($this->data['problems']); die();
            for ($i = 1; $i <= $contest['jumlah_soal']; $i++)
            {
                $pilihan[] = $this->logikaModel->getOptions($i, $contestId);
            }
            $this->data['pageTitle'] = 'Soal Logika ILPC 2018';
            $this->data["options"] = $pilihan;
            $this->render_view('problem/logic',NULL);
        }
        else
        {
            redirect(base_url() . 'contest/not_found');
        }
    }

    public function submit_solution()
    {
        $this->check_active_contest_access();
        $this->data['activeContest'] = true;
        if($_SESSION['tipe_kontes'] === 'programming')
        {
            $this->data['problems'] = $this->competitionModel->getProgrammingProblemsId($_SESSION['id_kontes']);
            $this->render_view('contestant/submit_programming','contestant/mastercontestant');
        }
        elseif($_SESSION['tipe_kontes'] === 'multiple_choice')
        {
            $this->data['problems'] = $this->competitionModel->getMultipleChoiceProblemsId($_SESSION['id_kontes']);
            $this->render_view('contestant/submit_logic','contestant/mastercontestant');
        }
        else
        {
            redirect(base_url() . 'contest/not_found');
        }
    }

    public function redirect_submit()
    {
        if($_SESSION['submitSucceed'] === true)
        {
           if($_SESSION['tipe_kontes'] === 'programming')
	        {
	            $this->data['problems'] = $this->competitionModel->getProgrammingProblemsId($_SESSION['id_kontes']);
	            $this->render_view('contestant/submit_contest','contestant/mastersimple');
	        }
	        elseif($_SESSION['tipe_kontes'] === 'multiple_choice')
	        {
	            $this->data['problems'] = $this->competitionModel->getMultipleChoiceProblemsId($_SESSION['id_kontes']);
	            $this->render_view('contestant/submit_contest','contestant/mastersimple');
	        }
	        $_SESSION['submitSucceed'] = FALSE;
        }
        else
        {
            redirect(base_url() . 'contest/not_found');
        }
    }
    public function submit_programming($problemId)
    {
    	//parameter problemId ditiadakan. di view soal programming, beri input type hidden, valuenya adalah problemId.
    	//dapatkan nilai problemId dr input type hidden: $this->input->post('namaKey');
        $this->load->model('programming_model','programmingModel');
        $this->check_active_contest_access();
        if($_SESSION['tipe_kontes'] !== 'programming')
        {
            redirect(base_url() . 'contest/not_found');
        }

        if($this->input->post('submitProgramming') === null)
        {
            redirect(base_url() . 'contest/not_found');
        }

        $idCompetition = $this->programmingModel->getContestByProblemId($problemId); 
        if($_SESSION['id_kontes'] !== $idCompetition['id'])
        {
            redirect(base_url() . 'contest/not_found');
        }
        //TODO ON THE NEXT LINE: cek apakah problemId ini boleh diakses oleh tim?
        	//clue 1: programmingModel->getContestByProblemId()
        	// ambil idContest dr hasil clue 1. lalu call competitionModel->bolehIkutKontesPemrograman()
        //END OF TODO

        $config['upload_path'] = 'asset/submission_files/';
        $config['allowed_types'] = 'cpp|pas|java';
        $config['max_size'] = '5120';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('codeFile'))
        {
            $_SESSION['submitFailed'] = $this->upload->display_errors();
            $this->session->mark_as_flash('submitFailed');
            redirect(base_url('contest/programming_problem/' . $problemId));
        }
        else
        {
            $uploadedData = $this->upload->data();
            $submissionName = "asset/submission_files/" . $uploadedData['file_name'];
            $ext = $uploadedData['file_ext'];
            if(strtolower($ext) == '.cpp')
            {
                $language = 'cpp';
            }
            else if(strtolower($ext) == '.pas')
            {
                $language = 'pascal';
            }
            else if(strtolower($ext) == '.java')
            {
                $language = 'java';
            }

            $this->competitionModel->setProgrammingSubmission($_SESSION['login_id'], $problemId, $language, $submissionName);
            $_SESSION['submitSucceed'] = true;
            $this->session->mark_as_flash('submitSucceed');

            $problems = $this->programmingModel->getProblem($problemId);

            $_SESSION['judulSoal'] = $problems['judul'];
            $this->session->mark_as_flash('judulSoal');

            redirect(base_url('contest/redirect_submit'));
        }
    }

    public function submit_multiple_choice()
    {
        $this->check_active_contest_access();
        if($_SESSION['tipe_kontes'] !== 'multiple_choice')
        {
            redirect(base_url() . 'contest/not_found');
        }
        if($this->input->post('submitMultipleChoice') === null)
        {
            redirect(base_url() . 'contest/not_found');
        }
        $poin = $this->competitionModel->getMultipleChoicePoint($_SESSION['id_kompetisi']);

        $hasSubmittedBefore = $this->competitionModel->hasSubmitMultipleChoice($_SESSION['login_id'], $_SESSION['id_kontes']);
        $answers = $this->competitionModel->getMultipleChoiceAnswers($_SESSION['id_kontes']);
        $submissions = array();
        for($i=0; $i < count($answers); $i++)
        {
            $kunciJawaban = $answers[$i]['jawaban'];
            $jawabanPeserta = $this->input->post('nomor' . ($i + 1));
            if($jawabanPeserta === "-")
                $jawabanPeserta = NULL;
            $submissions[$i] = ['id_soal' => $answers[$i]['id'], 'no_soal' => $answers[$i]['nomor'], 'jawaban_peserta' => $jawabanPeserta, 'kunci_jawaban' => $kunciJawaban ];
            //catatan: klo ga diisi sm user, nilai radio button nya null
        }

        $totalScore = $this->competitionModel->saveMultipleChoiceSubmissions($_SESSION['login_id'], $submissions, $poin);
        $this->competitionModel->setMultipleChoiceTotalScore($_SESSION['login_id'],$_SESSION['id_kontes'], $totalScore);
        $_SESSION['submitSucceed'] = true;
        $this->session->mark_as_flash('submitSucceed');
        redirect(base_url('contest/redirect_submit'));
    }

    public function submissions()
    {
        $this->check_active_contest_access();
        if($_SESSION['tipe_kontes'] !== 'programming')
        {
            redirect(base_url() . 'contest/not_found');
        }

        $this->data['activeContest'] = true;
        $this->data['submissions'] = $this->competitionModel->getProgrammingSubmissions($_SESSION['id_kontes'], $_SESSION['login_id']);
        $this->render_view('contestant/submission_history','contestant/mastersimple');
    }

    public function clarification()
    {
        $this->check_active_contest_access();
        if($_SESSION['tipe_kontes'] === 'programming')
        {
            $this->data['problems'] = $this->competitionModel->getProgrammingProblemsId($_SESSION['id_kontes']);
            $this->data['clarifications'] = $this->competitionModel->getProgrammingClarifications($_SESSION['id_kontes'], $_SESSION['login_id']);
            $this->data['formSubmitLink'] = base_url() . 'contest/submit_programming_clarification';
        }
        elseif($_SESSION['tipe_kontes'] === 'multiple_choice')
        {
            $this->data['problems'] = $this->competitionModel->getMultipleChoiceProblemsId($_SESSION['id_kontes']);
            $this->data['clarifications'] = $this->competitionModel->getMultipleChoiceClarifications($_SESSION['id_kontes'], $_SESSION['login_id']);
            $this->data['formSubmitLink'] = base_url() . 'contest/submit_multiple_choice_clarification';
        }
        $this->data['activeContest'] = true;
        $this->render_view('clarification/clarification','clarification/mastersimple');

    }

    public function submit_programming_clarification()
    {
        $this->check_active_contest_access();
        if($this->input->post('submitClarification') === null)
        {
            redirect(base_url() . 'contest/clarification');
        }
        $this->form_validation->set_rules('nomor', 'Nomor Soal', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->data['problems'] = $this->competitionModel->getProgrammingProblemsId($_SESSION['id_kontes']);
            $this->data['clarifications'] = $this->competitionModel->getProgrammingClarifications($_SESSION['id_kontes'], $_SESSION['login_id']);
            $this->data['formSubmitLink'] = base_url() . 'contest/submit_programming_clarification';
            $this->data['activeContest'] = true;
            $this->render_view('contestant/clarification','contestant/mastersimple');
        }
        else
        {
            $problemId = $this->input->post('nomor');
            $question = $this->input->post('pertanyaan');
            $this->competitionModel->setProgrammingClarification($_SESSION['login_id'], $problemId, $question);
            $_SESSION['clarSucceed'] = true;
            $this->session->mark_as_flash('clarSucceed');
            redirect(base_url() . 'contest/clarification');
        }
    }

    public function submit_multiple_choice_clarification()
    {
        $this->check_active_contest_access();
        if($this->input->post('submitClarification') === null)
        {
            redirect(base_url() . 'contest/clarification');
        }
        $this->form_validation->set_rules('nomor', 'Nomor Soal', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->data['problems'] = $this->competitionModel->getMultipleChoiceProblemsId($_SESSION['id_kontes']);
            $this->data['clarifications'] = $this->competitionModel->getMultipleChoiceClarifications($_SESSION['id_kontes'], $_SESSION['login_id']);
            $this->data['formSubmitLink'] = base_url() . 'contest/submit_multiple_choice_clarification';
            $this->data['activeContest'] = true;
            $this->render_view('contestant/clarification','contestant/mastersimple');
        }
        else
        {
            $problemId = $this->input->post('nomor');
            $question = $this->input->post('pertanyaan');
            $this->competitionModel->setMultipleChoiceClarification($_SESSION['login_id'], $problemId, $question);
            $_SESSION['clarSucceed'] = true;
            $this->session->mark_as_flash('clarSucceed');
            redirect(base_url() . 'contest/clarification');
        }
    }

    /**
     * klo ada yg iseng masuk2 url secara manual harus diarahkan kesini
     */
    public function not_found()
    {
        $this->render_view('contestant/not_found','contestant/mastercontestant');
    }
}