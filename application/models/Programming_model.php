<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/12/2015
 * Time: 20:58
 */
class Programming_model extends MY_Model
{
    // offset waktu GMT+7 dlm detik
    private $offset = 25200;

    /* This area is for admin */
    public function createProgrammingContest($contestName, $date, $startTime, $endTime, $freezeTime,$endFreezeTime,$scoreboardUrl, $totalProblems, $creatorId)
    {
        $contestName = parent::sanitize_input($contestName);
        $date = parent::sanitize_input($date);
        $startTime = parent::sanitize_input($startTime);
        $endTime = parent::sanitize_input($endTime);
        $freezeTime = parent::sanitize_input($freezeTime);
        $endFreezeTime = parent::sanitize_input($endFreezeTime);
        $scoreboardUrl = parent::sanitize_input($scoreboardUrl);
        $totalProblems = parent::sanitize_input($totalProblems);
        $creatorId = parent::sanitize_input($creatorId);
       /* echo date('Y-m-d', time());
        echo "<br>" . gmdate('Y-m-d', strtotime($date) + $this->offset);
        echo "<br>";
        echo gmdate('Y-m-d', time());*/

        $date = gmdate('Y-m-d', strtotime($date) + $this->offset);
        $startTime = gmdate('H:i:s', strtotime($startTime) + $this->offset);
        $endTime = gmdate('H:i:s', strtotime($endTime) + $this->offset);
        $freezeTime = gmdate('H:i:s', strtotime($freezeTime) + $this->offset);
        $endFreezeTime = gmdate('Y-m-d H:i:s', strtotime($endFreezeTime) + $this->offset);
        /*echo $starttime . "<br>" . $endTime . "<br>" . $freezeTime;
        die();*/

        $sql = "INSERT INTO kontes_pemrograman(nama,tanggal,jam_mulai,jam_selesai,start_freeze,end_freeze,scoreboard_name,jml_soal,id_admin) VALUES
        (?,?,?,?,?,?,?,?,?)";
        $param = [$contestName, $date, $startTime, $endTime, $freezeTime,$endFreezeTime,$scoreboardUrl, $totalProblems, $creatorId];
        $this->db->query($sql, $param);
        return $this->db->insert_id();
    }

    public function updateProgrammingContest($contestName,$date, $startTime, $endTime, $freezeTime,$endFreezeTime,$scoreboardUrl, $contestId)
    {
        $contestName = parent::sanitize_input($contestName);
        $date = parent::sanitize_input($date);
        $startTime = parent::sanitize_input($startTime);
        $endTime = parent::sanitize_input($endTime);
        $freezeTime = parent::sanitize_input($freezeTime);
        $endFreezeTime = parent::sanitize_input($endFreezeTime);
        $scoreboardUrl = parent::sanitize_input($scoreboardUrl);
        $contestId = parent::sanitize_input($contestId);

        $date = gmdate('Y-m-d', strtotime($date) + $this->offset);
        $startTime = gmdate('H:i:s', strtotime($startTime) + $this->offset);
        $endTime = gmdate('H:i:s', strtotime($endTime) + $this->offset);
        $freezeTime = gmdate('H:i:s', strtotime($freezeTime) + $this->offset);
        $endFreezeTime = gmdate('Y-m-d H:i:s', strtotime($endFreezeTime) + $this->offset);


        $sql = "UPDATE kontes_pemrograman SET nama = ?, tanggal = ?, jam_mulai = ?, jam_selesai = ?, start_freeze = ?, end_freeze = ? ,
        scoreboard_name = ?
        WHERE id = ? ";
        $param = [$contestName, $date, $startTime, $endTime, $freezeTime,$endFreezeTime,$scoreboardUrl,$contestId];
        $this->db->query($sql, $param);
    }

    public function getContestById($contestId, $needsCreatorInfo = false)
    {
        $contestId = $this->sanitize_input($contestId);
        $needsCreatorInfo = $this->sanitize_input($needsCreatorInfo);
        if($needsCreatorInfo == false)
        {
            $sql = "SELECT id, nama, tanggal, jam_mulai, jam_selesai, jml_soal AS jumlah_soal , start_freeze as 'waktu_freeze',end_freeze,scoreboard_name FROM kontes_pemrograman WHERE id = ?";
        }
        else
        {
            $sql = "SELECT id, nama, tanggal, jam_mulai, jam_selesai, jml_soal AS jumlah_soal , start_freeze as 'waktu_freeze',end_freeze,scoreboard_name, id_admin FROM kontes_pemrograman WHERE id = ?";
        }

        $param = [$contestId];
        $res = $this->db->query($sql, $param);
        return $res->row_array();
    }

    public function getContestByProblemId($problemId)
    {
        $problemId= $this->sanitize_input($problemId);

        $sql = "SELECT kp.id, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal AS jumlah_soal , kp.start_freeze
        FROM kontes_pemrograman kp INNER JOIN soal_pemrograman s ON s.id_kontes_pemrograman = kp.id WHERE s.id = ?";

        $param = [$problemId];
        $res = $this->db->query($sql, $param);
        return $res->row_array();
    }

    public function getUpcomingContests($competitionId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal AS jumlah_soal, kp.start_freeze as 'waktu_freeze', a.nama AS creator, kp.scoreboard_name
        FROM kontes_pemrograman kp INNER JOIN admin a ON a.id = kp.id_admin
        WHERE a.id_kompetisi = ? AND (( kp.tanggal > ? ) OR ( kp.tanggal = ? AND kp.jam_mulai > ? ))";
        $param = [$competitionId, $currentDate, $currentDate ,$currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getRunningContests($competitionId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal AS jumlah_soal, kp.start_freeze as 'waktu_freeze', a.nama AS creator, kp.scoreboard_name
        FROM kontes_pemrograman kp INNER JOIN admin a ON a.id = kp.id_admin
        WHERE a.id_kompetisi = ? AND kp.tanggal = ? AND (kp.jam_mulai <= ? AND kp.jam_selesai > ?) ";
        $param = [$competitionId, $currentDate, $currentTime, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getFinishedContests($competitionId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $currentTimestamp = time() + $this->offset;
        $currentDate = gmdate('Y-m-d',$currentTimestamp);
        $currentTime = gmdate('H:i:s', $currentTimestamp);

        $sql = "SELECT kp.id, kp.nama, kp.tanggal, kp.jam_mulai, kp.jam_selesai, kp.jml_soal AS jumlah_soal, kp.start_freeze as 'waktu_freeze', a.nama AS creator, kp.scoreboard_name
        FROM kontes_pemrograman kp INNER JOIN admin a ON a.id = kp.id_admin
        WHERE a.id_kompetisi = ? AND ((kp.tanggal < ? ) OR ( kp.tanggal = ? AND kp.jam_selesai <= ?)) 
        ORDER BY kp.tanggal DESC, kp.jam_mulai DESC";
        $param = [$competitionId, $currentDate, $currentDate, $currentTime];
        $res = $this->db->query($sql, $param);
        return $res->result_array();

    }

    //bisa ditambahkan fitur lg melalui parameter ke-2
    public function getProblemSet($contestId, $competitionId = null)
    {
        $contestId= parent::sanitize_input($contestId);
        if($competitionId === null)
        {
            $sql = "SELECT id, nomor, judul, pembuat, time_limit FROM soal_pemrograman WHERE id_kontes_pemrograman = ?
            ORDER BY nomor ASC";
            $param = [$contestId];
        }
        $res = $this->db->query($sql, $param);
        return $res->result_array();
    }

    public function getProblem($problemId)
    {
        $problemId = parent::sanitize_input($problemId);
        $sql = "SELECT id,nomor, judul, deskripsi, time_limit, pembuat, id_kontes_pemrograman AS id_kontes FROM soal_pemrograman
        WHERE id = ?";
        $param = [$problemId];
        $res = $this->db->query($sql, $param);
        //var_dump($res->result_array()); die();
        return $res->row_array();
    }

    function getProblemByIdKontes($id_kontes) {
        $id_kontes = parent::sanitize_input($id_kontes);
        $sql = "select id,nomor,judul
        from soal_pemrograman
        where id_kontes_pemrograman = ?
        order by nomor asc";
        $param = [$id_kontes];
        $hasil = $this->db->query($sql,$param);
        return $hasil->result_array();
    }

    function getScoreboard($id_kontes) {
        $id_kontes = parent::sanitize_input($id_kontes);
        $sql = "select t.id as id_tim , t.nama as nama_tim, s.nama as nama_sekolah, k.nama AS 'kabupaten',
        ifnull(
        (select count(*)
        from submission_pemrograman
        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman=?)),0) as jumlah_ac,
        ifnull(
        (select sum(poin)
        from submission_pemrograman
        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman=?)),0) as time
        from tim t
        left join guru g on t.id_guru_pendamping = g.id
        left join sekolah s on g.id_sekolah=s.id
        INNER JOIN kabupaten k ON k.id = s.id_kabupaten
        left join mengikuti_kontes_pemrograman p on t.id=p.id_tim
        where p.id_kontes_pemrograman = ?
        order by jumlah_ac desc, time asc";
        $param = [$id_kontes,$id_kontes,$id_kontes];
        $scoreboard = $this->db->query($sql,$param);
        $scoreboard = $scoreboard->result_array();
        $i = 0;
        foreach ($scoreboard as $row) {
            $sql = "select p.nomor as nomor_soal,
            ifnull((select count(*) from submission_pemrograman where id_soal_pemrograman=p.id and id_tim='" . $row['id_tim'] . "' and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'),0) as att,
            ifnull((select poin from submission_pemrograman where id_soal_pemrograman=p.id and id_tim='" . $row['id_tim'] . "' and hasil='Accepted'),-1) as time
            from soal_pemrograman p
            where id_kontes_pemrograman = ?
            order by nomor_soal asc";
            $param = [$id_kontes];
            $hasil = $this->db->query($sql,$param);
            $scoreboard[$i]['soal'] = $hasil->result_array();
            $i++;
        }
        return $scoreboard;
    }

    function getTotalAttSolved($id_kontes) {
        $id_kontes = parent::sanitize_input($id_kontes);
        $sql = "select
        ifnull(
        (select count(*)
        from submission_pemrograman
        where id_soal_pemrograman=p.id and hasil!='Solved' and hasil !='Pending' and hasil !='Judging'),0)as att,
        ifnull(
        (select count(*)
        from submission_pemrograman
        where id_soal_pemrograman=p.id and hasil='Accepted'),0)as ac
        from soal_pemrograman p
        where id_kontes_pemrograman=?
        order by p.nomor asc";
        $param = [$id_kontes];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    public function setProblem($judul, $deskripsi, $input, $output, $time_limit, $pembuat, $id_kontes_pemrograman) {

        $judul = parent::sanitize_input($judul);
        $input = parent::sanitize_input($input);
        $output = parent::sanitize_input($output);
        $time_limit = parent::sanitize_input($time_limit);
        $pembuat = parent::sanitize_input($pembuat);
        $id_kontes_pemrograman = parent::sanitize_input($id_kontes_pemrograman);
        //$deskripsi = str_replace("'", "''", $deskripsi);

        $sql = "insert into soal_pemrograman(nomor,judul,deskripsi,input,output,time_limit,pembuat,id_kontes_pemrograman) values(?,?,?,?,?,?,?,?)";
        $nomor = $this->getLatestProblemNumber($id_kontes_pemrograman);

        if($nomor === null)
            $nomor = 'A';
        else
            $nomor++;
        $param = [$nomor, $judul, $deskripsi, $input, $output, $time_limit, $pembuat, $id_kontes_pemrograman];

        $sqlUpdateJumlah = "UPDATE kontes_pemrograman SET jml_soal = (jml_soal + 1) WHERE id = ?";
        $updateParam = [$id_kontes_pemrograman];

        $this->db->trans_start();
        $this->db->query($sql, $param);
        $this->db->query($sqlUpdateJumlah, $updateParam);
        $this->db->trans_complete();
    }

    public function updateProblem($judul, $deskripsi, $input, $output, $time_limit, $pembuat, $id_soal)
    {
        $judul = parent::sanitize_input($judul);
        $input = parent::sanitize_input($input);
        $output = parent::sanitize_input($output);
        $time_limit = parent::sanitize_input($time_limit);
        $pembuat = parent::sanitize_input($pembuat);
        $id_soal = parent::sanitize_input($id_soal);
        //$deskripsi = str_replace("'", "''", $deskripsi);

        if(empty($input) && empty($output))
        {
            $sql = "UPDATE soal_pemrograman SET judul = ?, deskripsi = ?, time_limit = ?, pembuat = ? WHERE id = ?";
            $param = [$judul, $deskripsi, $time_limit, $pembuat, $id_soal];
        }
        elseif(empty($input) && !empty($output))
        {
            $sql = "UPDATE soal_pemrograman SET judul = ?, deskripsi = ?, time_limit = ?, pembuat = ?, output = ? WHERE id = ?";
            $param = [$judul, $deskripsi, $time_limit, $pembuat,$output, $id_soal];
        }
        elseif(!empty($input) && empty($output))
        {
            $sql = "UPDATE soal_pemrograman SET judul = ?, deskripsi = ?, time_limit = ?, pembuat = ?, input = ? WHERE id = ?";
            $param = [$judul, $deskripsi, $time_limit, $pembuat,$input, $id_soal];
        }
        else
        {
            $sql = "UPDATE soal_pemrograman
            SET judul = ?, deskripsi = ?, time_limit = ?, pembuat = ?, input = ?, output = ? WHERE id = ?";
            $param = [$judul, $deskripsi, $time_limit, $pembuat,$input,$output, $id_soal];
        }
        $this->db->query($sql,$param);
    }

    public function getLatestProblemNumber($contestId)
    {
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT nomor FROM soal_pemrograman WHERE id_kontes_pemrograman = ?
        ORDER BY id DESC LIMIT 1";
        $param = [$contestId];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        return $result['nomor'];
    }

    public function isContestAvailable($progContestId)
    {
        $progContestId = parent::sanitize_input($progContestId);
        $offset = 7 * 60 * 60; //converting to seconds GMT +7.
        $time = gmdate("H:i:s", time() + $offset);
        $date = gmdate("Y-m-d", time() + $offset);
        $sql = "select id
        from kontes_pemrograman
        where id = ?";
        $param = [$progContestId];
        $res = $this->db->query($sql,$param);
        if ($res->num_rows() > 0)
            return true;
        else
            return false;
    }

    // belum di optimize
    public function getReadyTeam($competitionId, $contestId)
    {
        $competitionId = parent::sanitize_input($competitionId);
        $contestId = parent::sanitize_input($contestId);
        $sql = "SELECT t.id, t.nama AS  'nama_tim', t.status, s.nama AS  'nama_sekolah', s.kota AS  'kota_sekolah',
        k.nama AS 'kabupaten', p.nama AS 'provinsi',
        ( select count(*) from mengikuti_kontes_pemrograman mkp
        where mkp.id_kontes_pemrograman = ? and mkp.id_tim = t.id ) as 'jumlah'
        FROM tim t INNER JOIN guru g ON t.id_guru_pendamping = g.id
        INNER JOIN sekolah s ON s.id = g.id_sekolah
        INNER JOIN kabupaten k ON k.id = s.id_kabupaten
        INNER JOIN provinsi p ON p.id = k.id_provinsi
        WHERE t.id_kompetisi = ?
        AND t.status =  'ready'
        ORDER BY s.nama";
        $param = [$contestId, $competitionId];
        $res = $this->db->query($sql,$param);
        return $res->result_array();
    }

    // di merge dengan setMengikuti, menjadi updateMengikutiPemrograman()
    private function deleteMengikutiPemrograman($kontes_id)
    {
        $kontes_id = parent::sanitize_input($kontes_id);

    }

    public function updateMengikutiPemrograman($contestId, $teamsId)
    {
        $contestId = parent::sanitize_input($contestId);
        //$teamsId = parent::sanitize_input($teamsId);
        $score = 0;

        //var_dump($sql); print_r($param); die();

        $sqlDelete = "DELETE from mengikuti_kontes_pemrograman
        where id_kontes_pemrograman = ?";
        $paramDelete = [$contestId];

        if(is_array($teamsId))
        {
            $sql = "INSERT INTO mengikuti_kontes_pemrograman(id_tim,id_kontes_pemrograman,score) VALUES ";
            $param = array();
            for($i=0; $i < count($teamsId); $i++)
            {
                if($i == (count($teamsId) - 1))
                {
                    $sql .= " (?,?,?)";
                }
                else
                {
                    $sql .= " (?,?,?),";
                }
                $param[] = parent::sanitize_input($teamsId[$i]);
                $param[] = $contestId;
                $param[] = $score;
            }

            $this->db->trans_start();
            $this->db->query($sqlDelete, $paramDelete);
            $this->db->query($sql, $param);
            $this->db->trans_complete();
        }
        else
        {
            $this->db->query($sqlDelete, $paramDelete);
        }
    }

    public function getScore($id_kontes, $id_kompetisi)
    {
        $id_kontes = $this->sanitize_and_escape($id_kontes);
        $id_kompetisi = $this->sanitize_and_escape($id_kompetisi);

        $sql = "select t.id as id_tim , t.nama as nama_tim, s.nama as nama_sekolah, k.nama AS kabupaten,
        ifnull(
        (select count(*)
        from submission_pemrograman
        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='" . $id_kontes . "')),0) as jumlah_ac,
        ifnull(
        (select sum(poin)
        from submission_pemrograman
        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='" . $id_kontes . "')),0) as time,
        ifnull(
        (select count(*)
        from (
        select
        ifnull(
        (select count(*)
        from submission_pemrograman
        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='" . $id_kontes . "')),0) as jumlah_ac
        from tim t
        left join guru g
        on t.id_guru_pendamping = g.id
        left join sekolah s
        on g.id_sekolah=s.id
        left join mengikuti_kontes_pemrograman p
        on t.id=p.id_tim
        where p.id_kontes_pemrograman='" . $id_kontes . "'
        ) as tabel
        where jumlah_ac=(select count(*)
        from submission_pemrograman
        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='" . $id_kontes . "'))
        ),0) as jjb
        from tim t
        left join guru g
        on t.id_guru_pendamping = g.id
        left join sekolah s
        on g.id_sekolah=s.id
        INNER JOIN kabupaten k ON k.id = s.id_kabupaten
        left join mengikuti_kontes_pemrograman p
        on t.id=p.id_tim
        where p.id_kontes_pemrograman='" . $id_kontes . "'
        order by jumlah_ac desc, time asc";

        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }

    function getKlarNotAnswer($id_kontes) { //untuk yang belum dijawab
        $id_kontes = parent::sanitize_input($id_kontes);
       /* $sql = "select k.id,k.waktu_kirim,k.pertanyaan, s.nomor,s.judul,t.nama,k.jawaban
                from klarifikasi_pemrograman k, soal_pemrograman s, tim t,kontes_pemrograman i
                where k.id_soal_pemrograman = s.id and k.id_tim=t.id and s.id_kontes_pemrograman = i.id and i.id = ? and k.jawaban=''
                order by k.waktu_kirim asc";*/
                $sql = "select k.id,k.waktu_kirim,k.pertanyaan, s.nomor,s.judul,t.nama,k.jawaban
                from klarifikasi_pemrograman k, soal_pemrograman s, tim t,kontes_pemrograman i
                where k.id_soal_pemrograman = s.id and k.id_tim=t.id and s.id_kontes_pemrograman = i.id and i.id = ? and k.jawaban is NULL
                order by k.waktu_kirim asc";
                $param = [$id_kontes];
                $result = $this->db->query($sql,$param);
                return $result->result_array();
            }

    function getKlarAnswer($id_kontes) { //untuk yang sudah dijawab
        $id_kontes = parent::sanitize_input($id_kontes);
       /* $sql = "select k.id,k.waktu_kirim,k.pertanyaan, s.nomor,s.judul,t.nama,k.jawaban
                from klarifikasi_pemrograman k, soal_pemrograman s, tim t,kontes_pemrograman i
                where k.id_soal_pemrograman = s.id and k.id_tim=t.id and s.id_kontes_pemrograman = i.id and i.id = ? and k.jawaban<>''
                order by k.waktu_kirim asc";*/
                $sql = "select k.id,k.waktu_kirim,k.pertanyaan, s.nomor,s.judul,t.nama,k.jawaban
                from klarifikasi_pemrograman k, soal_pemrograman s, tim t,kontes_pemrograman i
                where k.id_soal_pemrograman = s.id and k.id_tim=t.id and s.id_kontes_pemrograman = i.id and i.id = ? and k.jawaban is not NULL
                order by k.waktu_kirim asc";
                $param = [$id_kontes];
                $result = $this->db->query($sql,$param);
                return $result->result_array();
            }

            function setJawabanKlarPilgan($id_admin, $jawaban, $id_klar) {
                $id_admin = parent::sanitize_input($id_admin);
                $jawaban = parent::sanitize_input($jawaban);
                $id_klar = parent::sanitize_input($id_klar);
                $dateFormat = "H:i:s";
                $time = gmdate($dateFormat, time() + $this->offset);
                $sql = "update klarifikasi_pemrograman set jawaban=?, id_admin=?, waktu_jawab=?
                where id = ?";
                $param = [$jawaban,$id_admin,$time,$id_klar];
                $this->db->query($sql,$param);
            }

            function getKontes($id_kontes) {
                $id_kontes = parent::sanitize_input($id_kontes);
                $sql = "select id,nama
                from kontes_pemrograman
                where id=?";
                $param = [$id_kontes];
                $result = $this->db->query($sql,$param);
                return $result->row_array();
            }

            function getMaxPoin($id_kontes) {
                $id_kontes = $this->sanitize_and_escape($id_kontes);
                $sql = "select max_poin_ac
                from kompetisi
                where id = (select k.id
                from kompetisi k, admin a
                where a.id_kompetisi = k.id and a.id = (select id_admin from kontes_pemrograman where id='" . $id_kontes . "'))";

                $result = $this->db->query($sql);
                $result = $result->row_array();
                return $result['max_poin_ac'];
            }

            /* end of admin area */


        }