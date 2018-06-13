<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 05/01/2016
 * Time: 21:49
 */
class Problem extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function logic($contestId)
    {
        $this->load->model('logika_model','logikaModel');
        $this->data['pageTitle'] = 'Soal Logika ILPC 2018';
        if(isset($_SESSION['login_id']))
        {
            redirect(base_url() . 'contest/logic_problem/' . $contestId);
        }
        else
        {
            //kalo kontes udah expired, boleh akses
            $contest = $this->logikaModel->isContestExpired($contestId);
            if(count($contest) > 0)
            {
                $this->data['contestName'] = $contest['nama'];
                $this->data['problems'] = $this->logikaModel->getProblemSet($contestId);
                //print_r($this->data['problems']); die();
                for ($i = 1; $i <= $contest['jml_soal']; $i++)
                {
                    $pilihan[] = $this->logikaModel->getOptions($i, $contestId);
                }
                $this->data["options"] = $pilihan;
                $this->render_view('problem/logic',NULL);
            }
            else
            {
                redirect(base_url() . 'error');
            }
        }
    }
}
