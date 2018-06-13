<?php

/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/6/2016
 * Time: 11:19 AM
 */
class Scoreboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('scoreboard_model', 'scoreModel');
    }

    public function contest($contestUrl){
        $contestId  = $this->scoreModel->getKontesIdByUrl($contestUrl);

        $contest = $this->scoreModel->getKontes($contestId);

        if(empty($contest)) {
            redirect(base_url() . 'error');
        }
        //jam sekarang
        $offset = 7 * 60 * 60; //converting to seconds.
        $dateFormat = "H:i:s";
        $time = gmdate($dateFormat, time() + $offset);
        $this->data['contest'] = $contest;

        $currentDate = gmdate("Y-m-d", time() + $offset);

      /*  // mendapatkan nilai brp menit stlh berakhirnya kontes baru dibuka scoreboardnya
        $tambah_akhir_freeze = $this->scoreModel->getTimeFreezeKompetisiWithKontesId($contestId);
        $waktu_akhir = date('H:i:s', strtotime($contest['jam_selesai'] . ' + ' . $tambah_akhir_freeze . ' minutes'));
        //echo $currentDate . " $time " . $contest['tanggal'] . " " . $contest['waktu_freeze'] . " $waktu_akhir"; die();
        if ($time >= $contest['waktu_freeze'] && $time <= $waktu_akhir && $contest['tanggal'] == $currentDate)
        { //antara waktu freeze dan jam selesai
            $this->data['freeze'] = 1;
            $this->data['scoreboard'] = $this->scoreModel->getScoreboard2($contestId, $contest['waktu_freeze']);
            $this->data['hasil'] = $this->scoreModel->getTotalAttSolved2($contestId, $contest['waktu_freeze']);
        }
        else
        {
            if($currentDate > $contest['tanggal'] || ($currentDate == $contest['tanggal'] && $time > $waktu_akhir))
            {
                $this->data['finalScore'] = 1;
            }
            else {
                //echo "AUTOREFRESH<br>";
                $this->data['autoRefresh'] = 1;
            }
            $this->data['scoreboard'] = $this->scoreModel->getScoreboard($contestId);
            $this->data['hasil'] = $this->scoreModel->getTotalAttSolved($contestId);
        }*/

        $now = date("Y-m-d H:i:s");
        $startDatetime = $contest["tanggal"]." ".$contest["waktu_freeze"];
        $startFreeze = date('Y-m-d H:i:s', strtotime($startDatetime));
        $endFreeze = date('Y-m-d H:i:s', strtotime($contest["end_freeze"]));

        if ($now >= $startFreeze && $now <= $endFreeze)
        { //antara waktu freeze dan jam selesai
            $this->data['freeze'] = 1;
            $this->data['scoreboard'] = $this->scoreModel->getScoreboard2($contestId, $contest['waktu_freeze']);
            $this->data['hasil'] = $this->scoreModel->getTotalAttSolved2($contestId, $contest['waktu_freeze']);
        }
        else
        {
            if($now >= $endFreeze)
            {
                $this->data['finalScore'] = 1;
            }
            else {
                //echo "AUTOREFRESH<br>";
                $this->data['autoRefresh'] = 1;
            }
            $this->data['scoreboard'] = $this->scoreModel->getScoreboard($contestId);
            $this->data['hasil'] = $this->scoreModel->getTotalAttSolved($contestId);
        }

        $this->data['problem'] = $this->scoreModel->getProblem($contestId);
        $this->data['id_kontes'] = $contestId;
        $this->data['freezeOpenAfter'] = $contest["end_freeze"];
        $this->data['pageTitle'] = "ILPC UBAYA 2018 - Scoreboard";
        $this->render_view('main/scoreboard', 'contestant/mastersimple');
    }
}