<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 24/09/2015
 * Time: 20:37
 */
class Registration_model extends MY_Model
{
    private $idUbaya = 1356;
    private $idUjicoba = [375, 376, 377,453];
    private $completedRegistrationStatus = 'ready';
    private $unverifiedRegistrationStatus = 'unverified payment';
    private $waitingPaymentRegistrationStatus = 'waiting payment';

    /**
     * from last year code. added filter by status='buka'
     * search apakah registrasi masih dibuka
     * @return null jka tidak buka registrasi. jika ya, return id kompetisi
     */
    public function getRegistrasiTersedia()
    {
        /* Catatan: time() selalu return timestamp based on UTC, walaupun udah di set timezone spt ini:
                date_default_timezone_set("Europe/Helsinki");

        */
        $offset = 7 * 60 * 60; //converting to seconds.
        $dateFormat = "H:i:s";
        $time = gmdate($dateFormat, time() + $offset);
        $dateFormat2 = "Y-m-d";
        $date = gmdate($dateFormat2, time() + $offset);

        $sql = "select id
            from kompetisi where ? between tgl_awal_gelombang1 and tgl_akhir_gelombang1 or ? between tgl_awal_gelombang2 and tgl_akhir_gelombang2 AND status = 'buka'";

        $param = [$date, $date];
        $executedQuery = $this->db->query($sql,$param);
        if ($executedQuery->num_rows() > 0) {
            $result = $executedQuery->row_array();
            //$_SESSION["competition_id"] = $result['id'];
            return $result['id'];
        }
        else {
            return NULL;
        }
    }

    public function getSchool($kabupaten_id)
    {
        $kabupaten_id = parent::sanitize_input($kabupaten_id);
        //$sql = "SELECT id AS kode,nama,kota,alamat FROM sekolah WHERE id_kabupaten = ? AND nama != 'Universitas Surabaya'";
        $sql = "SELECT id AS kode,nama,kota,alamat FROM sekolah WHERE id_kabupaten = ? AND id != 1356";
        // ubaya id = 1356
        $bindParam = [$kabupaten_id];
        $executedQuery = $this->db->query($sql, $bindParam);
        return $executedQuery->result_array();
    }

    public function getTeachers($school_id) {
        $school_id = parent::sanitize_input($school_id);

        //$sql = "select id,nama,email,alamat from guru where nama like '%" . $search_teacher . "%' and id_sekolah=" . $school_id . " order by nama asc";
        $sql = "SELECT id AS kode, nama, email, telp FROM guru WHERE id_sekolah = ?";
        $bindParam = [$school_id];
        $result = $this->db->query($sql, $bindParam);
        return $result->result_array();
    }

    function setTeacher($teacherName, $teacherEmail, $teachertelp, $teacherAddress, $schoolId, $teacherAllergy, $teacherVegetarian) {
        $teacherName = $this->sanitize_input($teacherName);
        $teacherEmail = $this->sanitize_input($teacherEmail);
        $teachertelp = $this->sanitize_input($teachertelp);
        $teacherAddress = $this->sanitize_input($teacherAddress);
        //$teacherPhoto = $this->sanitize_input($teacherPhoto);
        $schoolId = $this->sanitize_input($schoolId);
        $teacherAllergy = $this->sanitize_input($teacherAllergy);
        $teacherVegetarian = $this->sanitize_input($teacherVegetarian);

        /*$sql = "insert into guru(nama,email,telp,alamat,id_sekolah,alergi,vegetarian) values('" . $teacherName . "','" . $teacherEmail . "','" . $teachertelp . "','" . $teacherAddress . "'," . $schoolId . ",'" . $teacherAllergy . "','" . $teacherVegetarian . "')";*/

        $sql = "INSERT INTO guru(nama,email,telp,alamat,id_sekolah,alergi,vegetarian) VALUES(?,?,?,?,?,?,?)";
        $bindParam = [$teacherName, $teacherEmail, $teachertelp, $teacherAddress, $schoolId, $teacherAllergy, $teacherVegetarian];
        $this->db->query($sql,$bindParam);
        return $this->db->insert_id();
    }

    public function isAvailableUsername($username, $competitionId) {
        $username = $this->sanitize_input($username);
        $competitionId = $this->sanitize_input($competitionId);
        /*$sql = "select id
            from tim
            where username='" . $username . "' and id_kompetisi='" . $id_kompetisi . "'";*/
        $sql = "SELECT id FROM tim WHERE username = ? AND id_kompetisi = ?";
        $bindParam = [$username,$competitionId];
        $result = $this->db->query($sql,$bindParam);
        if ($result->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function isAvailableTim($namaTim, $competitionId) {
        $namaTim = $this->sanitize_input($namaTim);
        $competitionId = $this->sanitize_input($competitionId);
        /*$sql = "select id
            from tim
            where nama='" . $namaTim . "' and id_kompetisi=" . $_SESSION['competition_id'] . "";*/
        $sql = "SELECT id FROM tim WHERE nama = ? AND id_kompetisi = ?";
        $bindParam = [$namaTim, $competitionId];
        $result = $this->db->query($sql,$bindParam);
        if ($result->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getIdTeamWithUsername($username, $competitionId) {
        $username = $this->sanitize_input($username);
        //$id_kompetisi = $this->sanitize_input($_SESSION['competition_id']);
        $competitionId = $this->sanitize_input($competitionId);
        /*$sql = "select id
            from tim
            where username = '" . $username . "' and id_kompetisi = '" . $id_kompetisi . "'";*/
        $sql = "SELECT id FROM tim WHERE username = ? AND id_kompetisi = ?";
        $bindParam = [$username, $competitionId];
        $result = $this->db->query($sql,$bindParam);
        return $result->row_array();
    }

    public function setTeam($nama, $username, $password, $id_kompetisi, $id_guru_pendamping) {
        $nama = $this->sanitize_input($nama);
        $username = $this->sanitize_input($username);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $id_kompetisi = $this->sanitize_input($id_kompetisi);
        $id_guru_pendamping = $this->sanitize_input($id_guru_pendamping);
        $bukti_transfer = "-";

        /*$sql = "insert into tim(nama,username,password,status,tgl_daftar,bukti_transfer,id_kompetisi,id_guru_pendamping)
            values('" . $nama . "','" . $username . "','" . $password . "','waiting_payment','" . date('Y-m-d') . "','" . $bukti_transfer . "','" . $id_kompetisi . "'," . $id_guru_pendamping . ")";*/

        $offset = 7 * 60 * 60; //converting to seconds.

        $sql = "INSERT INTO tim(nama,username,password,status,tgl_daftar,bukti_transfer,id_kompetisi,id_guru_pendamping) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $bindParam = [$nama, $username, $password, 'waiting payment', date('Y-m-d'), $bukti_transfer, $id_kompetisi, $id_guru_pendamping];
        $this->db->query($sql,$bindParam);
    }

    public function setMember($nama, $kelas, $alamat, $email, $kartu_pelajar, $id_tim, $alergi, $vegetarian,$ukuranbaju, $hp, $status) {
        $nama = $this->sanitize_input($nama);
        $kelas = $this->sanitize_input($kelas);
        $alamat = "-";
        $email = $this->sanitize_input($email);
        $kartu_pelajar = $this->sanitize_input($kartu_pelajar);
        $id_tim = $this->sanitize_input($id_tim);
        $alergi = $this->sanitize_input($alergi);
        $vegetarian = $this->sanitize_input($vegetarian);
        $ukuranbaju= $this->sanitize_input($ukuranbaju);
        $nis = "-";
        $hp = $this->sanitize_input($hp);
        $status = $this->sanitize_input($status);

        /*$sql = "insert into peserta(nama,kelas,alamat,email,kartu_pelajar,id_tim,alergi,vegetarian,nis,hp,status) values('" . $nama . "','" . $kelas . "','" . $alamat . "','" . $email . "','" . $kartu_pelajar . "','" . $id_tim . "','" . $alergi . "','" . $vegetarian . "','" . $nis . "','" . $hp . "','" . $status . "')";*/

        $sql = "INSERT INTO peserta(nama, kelas, alamat, email, kartu_pelajar, id_tim, alergi, vegetarian,ukuran_baju, nis, hp, status) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
        $bindParam = [$nama, $kelas, $alamat, $email, $kartu_pelajar, $id_tim, $alergi, $vegetarian,$ukuranbaju, $nis, $hp, $status];
        $this->db->query($sql,$bindParam);
    }

    public function confirmPayment($teamId, $buktiTransfer)
    {
        $teamId = $this->sanitize_input($teamId);
        $buktiTransfer = $this->sanitize_input($buktiTransfer);

        $sql = "UPDATE tim SET bukti_transfer = ? , status = 'unverified payment'
                WHERE id = ? ";
        $bindParam = [$buktiTransfer, $teamId];
        $this->db->query($sql,$bindParam);
    }

    public function getUnpaidTeams($teamId,$competitionId)
    {
        $teamId = $this->sanitize_input($teamId);
        $competitionId = $this->sanitize_input($competitionId);
        $sql = "SELECT s.id
                FROM tim t INNER JOIN guru g ON g.id = t.id_guru_pendamping
                INNER JOIN sekolah s ON s.id = g.id_sekolah
                WHERE t.id = ? ";
        $bindParam = [$teamId];
        $result = $this->db->query($sql,$bindParam);
        $school = $result->row_array();

        $sql = "SELECT t.id, t.nama
                FROM tim t INNER JOIN guru g ON t.id_guru_pendamping = g.id
                INNER JOIN sekolah s ON s.id = g.id_sekolah
                WHERE s.id = ? AND t.id_kompetisi = ? AND t.status = 'waiting payment' AND t.id != ?";
        $bindParam = [$school['id'], $competitionId, $teamId];
        $result = $this->db->query($sql,$bindParam);
        return $result->result_array();
    }

    /* belum jadi
     * public function getTanggalDaftar($teamId)
    {
        $teamId = parent::sanitize_input($kabupaten_id);
        $sql = "SELECT id AS kode,nama,kota,alamat FROM sekolah WHERE id_kabupaten = ? AND nama != 'Universitas Surabaya'";
        // ubaya id = 1356
        $bindParam = [$teamId];
        $executedQuery = $this->db->query($sql, $bindParam);
        return $executedQuery->result_array();
    }*/


    /**
     * Model Admin
     */

    function getSchoolList($perPage, $uri, $ringkasan) {
        $this->db->select('*');
        $this->db->from('sekolah');
        if(!empty($ringkasan)) {
            $this->db->like('nama', $ringkasan);
        }
        $this->db->order_by('id','asc');
        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }

    function getTeacher($perPage, $uri, $search, $id) {
        $perPage = $this->sanitize_and_escape($perPage);
        $uri = $this->sanitize_and_escape($uri);
        $search = $this->sanitize_and_escape($search);
        $id = $this->sanitize_and_escape($id);
        /*$sql = "SELECT g.id, g.nama, g.email, g.telp, s.nama AS namasekolah, s.kota, t.nama AS tim
FROM guru g
LEFT JOIN sekolah s ON g.id_sekolah = s.id
LEFT JOIN tim t ON g.id = t.id_guru_pendamping and t.id_kompetisi= '".$id."' LIMIT " .$perPage." OFFSET ". $uri;
        $this->db->select('guru.id, guru.nama, guru.email, guru.telp, sekolah.nama AS namasekolah, sekolah.kota, tim.nama AS tim');
        $this->db->from('guru');
        $this->db->join('sekolah', 'sekolah.id = guru.id_sekolah','left');
        $this->db->join('tim','guru.id = tim.id_guru_pendamping and tim.id_kompetisi = ' + $id,'left');
        $this->db->group_by('guru.id');*/
        /*$this->db->where('tim.id_kompetisi = 2');*/
        if(!empty($search)) {
            $sql = "SELECT g.id, g.nama, g.email, g.telp, s.nama AS namasekolah, s.kota, t.nama AS tim
FROM guru g
LEFT JOIN sekolah s ON g.id_sekolah = s.id
LEFT JOIN tim t ON g.id = t.id_guru_pendamping and t.id_kompetisi= '".$id."' WHERE g.nama LIKE '%" .$search."%' GROUP BY
 g.nama LIMIT " .$perPage." OFFSET ". $uri;
        }
        else{
            $sql = "SELECT g.id, g.nama, g.email, g.telp, s.nama AS namasekolah, s.kota, t.nama AS tim
FROM guru g
LEFT JOIN sekolah s ON g.id_sekolah = s.id
LEFT JOIN tim t ON g.id = t.id_guru_pendamping and t.id_kompetisi= '".$id."' GROUP BY
g.id LIMIT " .$perPage." OFFSET ". $uri;
        }
        $getData = $this->db->query($sql);
        /*$getData['data'] = $this->db->query($sql);
        $getData['total_rows'] = $getData['data'];*/
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }


    public function setSchool($schoolName, $schoolCity, $schoolAddress, $idKabupaten)
    {
        $schoolName = $this->sanitize_input($schoolName);
        $schoolCity = $this->sanitize_input($schoolCity);
        $schoolAddress = $this->sanitize_input($schoolAddress);
        $idKabupaten = $this->sanitize_input($idKabupaten);

        //$sql = "insert into sekolah(nama,kota,alamat) values('" . $schoolName . "','" . $schoolCity . "','" . $schoolAddress . "')";
        $sql = "INSERT INTO sekolah(nama,kota,id_kabupaten, alamat) VALUES (?,?,?,?)";
        $bindParam = [$schoolName, $schoolCity, $idKabupaten, $schoolAddress];
        $this->db->query($sql,$bindParam);
    }

    function setTeamStatus($teamId, $status)
    {
        $teamId = $this->sanitize_input($teamId);
        $status = $this->sanitize_input($status);
        $sql = "UPDATE tim SET status = ? WHERE id = ?";
        $bindParam = [$status, $teamId];
        $this->db->query($sql,$bindParam);
    }

    function setStatusWaiting($id){
        $id = $this->sanitize_input($id);
        $sql = "UPDATE tim SET status = 'waiting payment' WHERE id = ".$id;
        $this->db->query($sql);
    }

    function updateSchool($school_name, $school_city, $school_address, $id, $idKabupaten)
    {
        $school_name = $this->sanitize_input($school_name);
        $school_city = $this->sanitize_input($school_city);
        $school_address = $this->sanitize_input($school_address);
        $id = $this->sanitize_input($id);
        $idKabupaten = $this->sanitize_input($idKabupaten);

        $sql = "update sekolah
                set nama= ?, kota = ?, alamat = ?, id_kabupaten = ?
                where id = ? ";
        $bindParam = [$school_name, $school_city, $school_address, $idKabupaten, $id];
        $this->db->query($sql,$bindParam);
    }

    function isAvailableSchool($id){
        $id = $this->sanitize_input($id);
        $sql = "select id from sekolah
                where id= ?";
        $bindParam = [$id];
        $result = $this->db->query($sql, $bindParam);
        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //CWR Notes: Jgn lupa sanitize input
    function getWaitingTim($perPage, $offset, $search, $competitionId)
    {
        $perPage = $this->sanitize_input($perPage);
        $offset = $this->sanitize_input($offset);
        $competitionId = $this->sanitize_input($competitionId);

        $this->db->select('tim.id, tim.nama, sekolah.nama AS sekolah, kabupaten.nama AS kabupaten, tim.tgl_daftar,tim
        .status');
        $this->db->from('tim');
        $this->db->join('guru', 'guru.id = tim.id_guru_pendamping','left');
        $this->db->join('sekolah','sekolah.id = guru.id_sekolah','left');
        $this->db->join('kabupaten','sekolah.id_kabupaten = kabupaten.id','left');
        $this->db->where('status = "waiting payment"');
        $this->db->where('id_kompetisi', $competitionId);
        $this->db->group_by('tim.id');

        if(!empty($search)) {
            $search = $this->sanitize_input($search);
            $this->db->like('tim.nama', $search);
        }
        $getData = $this->db->get('',$perPage,$offset);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }

    function getTotalWaiting($search, $competitionId)
    {
        $search = $this->sanitize_input($search);
        $competitionId = $this->sanitize_input($search);
        $this->db->where('status = "waiting payment"');
        $this->db->where('id_kompetisi', $competitionId);

        if(!empty($search))
        {
            $search = $this->sanitize_input($search);
            $this->db->like('nama',$search);
        }
        return $this->db->count_all_results('tim');
    }

    function getTimDetail($id_tim)
    {
        $sql = "SELECT DISTINCT t.id,t.nama as 'nama_tim', t.status,t.bukti_transfer, g.nama as 'nama_guru',g.vegetarian,g.email,g
.telp, g.alergi,g.alamat as alamat_guru, s.nama as 'nama_sekolah', s.kota as 'kota_sekolah' , s.alamat
                FROM tim t, guru g, sekolah s
                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping AND t.id = '" . $id_tim . "'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    function getAnggotaDetail($id_tim) {
        $sql = "SELECT *
                FROM peserta
                WHERE id_tim ='" . $id_tim . "'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    function getUnverifiedTim($perPage, $offset, $search, $competitionId){
        $perPage = $this->sanitize_input($perPage);
        $offset = $this->sanitize_input($offset);
        $competitionId = $this->sanitize_input($competitionId);

        $this->db->select('tim.id, tim.nama, sekolah.nama as sekolah, kabupaten.nama AS kabupaten, tim
        .tgl_daftar,
         tim
        .status');
        $this->db->from('tim');
        $this->db->join('guru', 'guru.id = tim.id_guru_pendamping','left');
        $this->db->join('sekolah','sekolah.id = guru.id_sekolah','left');
        $this->db->join('kabupaten','sekolah.id_kabupaten = kabupaten.id','left');
        $this->db->where('status = "unverified payment"');
        $this->db->where('id_kompetisi', $competitionId);
        $this->db->group_by('tim.id');

        if(!empty($search)) {
            $search = $this->sanitize_input($search);
            $this->db->like('tim.nama', $search);
        }
        $getData=$this->db->get('',$perPage,$offset);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }

    function getTotalUnverified($search, $competitionId)
    {
        $competitionId = $this->sanitize_input($competitionId);
        $this->db->where('status = "unverified payement"');
        $this->db->where('id_kompetisi', $competitionId);

        if(!empty($search))
        {
            $search = $this->sanitize_input($search);
            $this->db->like('nama',$search);
        }
        return $this->db->count_all_results('tim');
    }

    //CWR Notes: Jgn lupa sanitize input
    function getReadyTim($perPage,$offset,$search,$competitionId){
        $perPage = $this->sanitize_input($perPage);
        $offset = $this->sanitize_input($offset);
        $competitionId = $this->sanitize_input($competitionId);

        $this->db->select('tim.id, tim.nama, sekolah.nama as sekolah, kabupaten.nama AS kabupaten, tim
        .tgl_daftar,tim.status');
        $this->db->from('tim');
        $this->db->join('guru', 'guru.id = tim.id_guru_pendamping','left');
        $this->db->join('sekolah','sekolah.id = guru.id_sekolah','left');
        $this->db->join('kabupaten','sekolah.id_kabupaten = kabupaten.id','left');
        $this->db->where('status = "ready"');
        $this->db->where('id_kompetisi', $competitionId);
        $this->db->group_by('tim.id');

        if(!empty($search)) {
            $search = $this->sanitize_input($search);
            $this->db->like('tim.nama', $search);
        }
        $getData=$this->db->get('',$perPage,$offset);

        if ($getData->num_rows()> 0)
            return $getData->result_array();
        else
            return null;
    }

    function getTotalReady($search, $competitionId)
    {
        $competitionId = $this->sanitize_input($competitionId);
        $this->db->where('status = "ready"');
        $this->db->where('id_kompetisi', $competitionId);
        if(!empty($search))
        {
            $search = $this->sanitize_input($search);
            $this->db->like('nama',$search);
        }
        return $this->db->count_all_results('tim');
    }


    function getStatusTim($perPage,$uri,$search){
        if(!empty($search)) {
        $sql = "select t.id,t.nama,s.nama AS sekolah, k.nama AS kabupaten, t.tgl_daftar, t.status
                from tim t LEFT JOIN guru g ON g.id = t.id_guru_pendamping LEFT JOIN sekolah s ON s.id = g.id_sekolah
                LEFT JOIN kabupaten k ON s.id_kabupaten = k.id WHERE t.nama LIKE '%".$search."%' GROUP BY t.id LIMIT
        " .$perPage." OFFSET ". $uri;
        }
        else
        {
            $sql = "select t.id,t.nama,s.nama AS sekolah, k.nama AS kabupaten, t.tgl_daftar, t.status
                from tim t LEFT JOIN guru g ON g.id = t.id_guru_pendamping LEFT JOIN sekolah s ON s.id = g.id_sekolah
                LEFT JOIN kabupaten k ON s.id_kabupaten = k.id GROUP BY t.id LIMIT " .$perPage." OFFSET
                ". $uri;
        }
        $getData = $this->db->query($sql);
        if ($getData->num_rows()> 0)
            return $getData->result_array();
        else
            return null;
    }

    function getTotal($search){
        if(!empty($search)) {
            $this->db->like('nama',$search);
        }
        return $this->db->count_all_results('tim');
    }

    public function countAllRegistration($competitionId)
    {
        $competitionId = $this->sanitize_input($competitionId);
        $sql = "SELECT COUNT(t.id) AS jumlah
                FROM tim t INNER JOIN kompetisi k ON t.id_kompetisi = k.id
                INNER JOIN guru g ON g.id = t.id_guru_pendamping INNER JOIN sekolah s ON s.id = g.id_sekolah
                WHERE k.id = ? AND s.id != ? AND t.id NOT IN ?";
        $bindParam = [$competitionId, $this->idUbaya, $this->idUjicoba] ;
        $result = $this->db->query($sql,$bindParam);
        return $result->row_array();
    }

    public function countCompletedRegistration($competitionId)
    {
        $competitionId = $this->sanitize_input($competitionId);
        $sql = "SELECT COUNT(t.id) AS jumlah
                FROM tim t INNER JOIN kompetisi k ON t.id_kompetisi = k.id
                INNER JOIN guru g ON g.id = t.id_guru_pendamping INNER JOIN sekolah s ON s.id = g.id_sekolah
                WHERE k.id = ? AND s.id != ? AND t.id NOT IN ? AND t.status = ?";
        $bindParam = [$competitionId, $this->idUbaya, $this->idUjicoba, $this->completedRegistrationStatus ] ;
        $result = $this->db->query($sql,$bindParam);
        return $result->row_array();
    }
}
?>