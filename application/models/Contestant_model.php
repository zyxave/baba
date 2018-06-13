<?php
/**
 * @author Christoper W.Rimba
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/09/2015
 * Time: 20:32
 */
class Contestant_model extends MY_Model
{
    private $resetPasswordLimitPerDay = 5;

    private $lamaExpired = 7200; // dalam detik

    /**
     * @param $username
     * @param $password
     * @param $competitionId
     * @return null jika password/username salah. sebaliknya return aray data tim (id, nama, id_kompetisi, token).
     */
    public function login($username, $password, $competitionId)
    {
        $username = parent::sanitize_input($username);

        $sql = "select id,nama,password,id_kompetisi
                from tim
                where username = ? and id_kompetisi = ?";
        $bindParam = array($username, $competitionId);
        $executedQuery = $this->db->query($sql, $bindParam);
        $row = $executedQuery->row_array();

        if($row === NULL)
        {
            $loginResult = NULL;
        }
        else
        {
            $password_hash = $row['password'];
            if(password_verify($password, $password_hash))
            {
                $row['token'] = $this->insertLoginToken($row['id']);
                $loginResult = $row;
            }
            else
            {
                $loginResult = NULL;
            }
        }
        return $loginResult;
    }

    /**
     * @param $teamId
     * @param $token
     * @return bool
     */
    public function checkToken($teamId, $token)
    {
        $teamId = $this->sanitize_input($teamId);
        $token = $this->sanitize_input($token);

        $sql = "SELECT login_token FROM tim WHERE id = ? ";
        $bindParam = $teamId;
        $executedQuery = $this->db->query($sql,$bindParam);
        $row = $executedQuery->row_array();

        $hasil = true;
        if(strcmp($row['login_token'], $token) !== 0)
        {
            $hasil = false;
        }
        return $hasil;
    }

    /**
     * generate login token baru, untuk membatasi tiap tim cuma boleh login di 1 device.
     * @param $teamId
     * @return string token baru yang digenerate
     */
    private function insertLoginToken($teamId)
    {
        $teamId = parent::sanitize_input($teamId);

        $sql = "UPDATE tim SET login_token = ? WHERE id = ?";
        $newToken = md5(time() . $teamId);
        $bindParam = array($newToken, $teamId);
        $executedQuery = $this->db->query($sql,$bindParam);
        return $newToken;
    }

    public function getStatusTim($teamId)
    {
        $teamId = parent::sanitize_input($teamId);

        $sql = "SELECT status FROM tim WHERE id = ? ";
        $bindParam = [$teamId];
        $executedQuery = $this->db->query($sql,$bindParam);
        $result = $executedQuery->row_array();
        return $result['status'];
    }

    public function getIdTim($username, $competitionId)
    {
        $username = $this->sanitize_input($username);
        $competitionId = $this->sanitize_input($competitionId);

        $sql = "SELECT id FROM tim WHERE username = ? AND id_kompetisi = ?";
        $bindParam = [$username, $competitionId];
        $executedQuery= $this->db->query($sql,$bindParam);
        $result = $executedQuery->row_array();
        return $result['id'];
    }

    public function getDataTim($id_tim, $competitionId)
    {
        $id_tim = $this->sanitize_input($id_tim);
        $competitionId = $this->sanitize_input($competitionId);

        /*$sql = "SELECT DISTINCT t.nama as 'nama_tim',t.bukti_transfer, t.nominal, g.nama as 'nama_guru',g.email,g.telp, g.alamat as alamat_guru,g.alergi,g.vegetarian, s.nama as 'nama_sekolah', s.kota as 'kota_sekolah' ,s.alamat
                FROM tim t, guru g, sekolah s
                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping AND t.id = '" . $id_tim . "' and t.id_kompetisi = '" . $competitionId . "'";*/

        $sql = "SELECT t.id , t.nama AS 'nama_tim', t.bukti_transfer, t.status, kab.nama AS kab, g.nama AS 'nama_guru', g.email, g.telp, g.alamat AS alamat_guru,
            g.alergi, g.vegetarian, s.nama as 'nama_sekolah', s.kota as 'kota_sekolah' ,s.alamat
            FROM sekolah s INNER JOIN kabupaten kab ON s.id_kabupaten = kab.id
            INNER JOIN guru g ON g.id_sekolah = s.id INNER JOIN tim t ON t.id_guru_pendamping = g.id
            WHERE t.id = ? AND t.id_kompetisi = ? ";
        $bindParam = [$id_tim, $competitionId];
        $executedQuery= $this->db->query($sql,$bindParam);
        return $executedQuery->row_array();
    }

    public function getDataAnggota($id_tim)
    {
        $id_tim = $this->sanitize_input($id_tim);
/*        $sql = "SELECT id,nama, kelas, kartu_pelajar,alergi,email,vegetarian,hp,status
                FROM peserta
                WHERE id_tim ='" . $id_tim . "'";*/

        $sql = "SELECT id,nama, kelas, kartu_pelajar,alergi,email,vegetarian,hp,status,ukuran_baju
                FROM peserta
                WHERE id_tim = ? ";
        $bindParam = [$id_tim];
        $result = $this->db->query($sql, $bindParam);
        return $result->result_array();
    }

    public function createResetPasswordLink($teamId,$competitionId)
    {
        $teamId = $this->sanitize_input($teamId);
        $competitionId = $this->sanitize_input($competitionId);

        $email = $this->getEmailKetua($teamId, $competitionId);

        if(!isset($email))
        {
            return false;
        }

        $token = bin2hex(openssl_random_pseudo_bytes(16)) . time();

        $offset = 7 * 60 * 60; // ditambah 7 jam karena waktu dihitung based on GMT +7.
        $lamaExpired = $this->lamaExpired;
        $expiredTime = gmdate('Y-m-d H:i', time() + $offset + $lamaExpired);

        $sql = "INSERT INTO tim_password_reset (expired_time, reset_token, id_tim) VALUES (?, ?, ?)";
        $bindParam = [$expiredTime, $token, $teamId];
        $executedQuery = $this->db->query($sql,$bindParam);

        $reset = ['email' => $email, 'token' => $token];
        return $reset;
    }

    private function getEmailKetua($teamId,$competitionId)
    {
        $sql = "SELECT p.email FROM peserta p INNER JOIN tim t ON t.id = p.id_tim
                WHERE t.id = ? AND t.id_kompetisi = ? ORDER BY p.id ASC LIMIT 1";
        $bindParam = [$teamId, $competitionId];
        $executedQuery = $this->db->query($sql,$bindParam);
        $result =  $executedQuery->row_array();
        return $result['email'];
    }

    public function checkResetPasswordLimit($teamId)
    {
        $teamId = $this->sanitize_input($teamId);

        $now = new DateTime('today + ' . $this->lamaExpired . ' seconds' , new DateTimeZone('UTC'));

        // ga jadi sampai akurasi second
        $timeLowerBound = $now->format('Y-m-d H:i');

        $tomorrow = new DateTime($timeLowerBound . ' + 1 day - 1 second', new DateTimeZone('UTC'));
        $timeUpperBound = $tomorrow->format('Y-m-d H:i');

        $sql = "SELECT COUNT(pr.id) AS today_reset
            FROM tim_password_reset pr
            WHERE pr.id_tim = ? AND pr.expired_time BETWEEN ? AND ? ";
        $bindParam = [$teamId, $timeLowerBound, $timeUpperBound];
        $executedQuery = $this->db->query($sql,$bindParam);
        $result =  $executedQuery->row_array();

        if( $result['today_reset'] >= $this->resetPasswordLimitPerDay)
            return false;
        else
            return true;
    }

    public function verifyResetToken($token)
    {
        $token = $this->sanitize_input($token);

        $offset = 7 * 60 * 60;
        $currentTime = gmdate('Y-m-d H:i', time() + $offset);

        $sql = "SELECT pr.id_tim, pr.reset_token AS token
            FROM tim_password_reset pr
            WHERE pr.reset_token = ? AND pr.reset_time IS NULL AND pr.expired_time > ?";
        $bindParam = [$token, $currentTime];
        $executedQuery = $this->db->query($sql,$bindParam);
        $result =  $executedQuery->row_array();

        if($result === NULL)
            return false;
        else
            return $result;
    }

    public function saveNewPassword($teamId, $token, $password)
    {
        $teamId = $this->sanitize_input($teamId);
        $token = $this->sanitize_input($token);
        $password = password_hash($password,PASSWORD_DEFAULT);
        if(!$this->verifyResetToken($token))
        {
            return false;
        }

        $sqlUpdatePassword = "UPDATE tim SET password = ? WHERE id = ?";
        $bindParamPass = [$password, $teamId];

        $sqlResetHistory = "UPDATE tim_password_reset SET reset_time = ? WHERE reset_token = ? AND id_tim = ?";
        $offset = 7 * 60 * 60;
        $currentTime = gmdate('Y-m-d H:i', time() + $offset);
        $bindParamResetHistory = [ $currentTime,$token, $teamId];

        $this->db->trans_start();
        $this->db->query($sqlUpdatePassword, $bindParamPass);
        $this->db->query($sqlResetHistory, $bindParamResetHistory);
        $this->db->trans_complete();

        return true;
    }

    public function cekPassword($teamId,$password){
        $teamId = $this->sanitize_input($teamId);
        $password = $this->sanitize_input($password);

        $sql = "SELECT password FROM tim WHERE id = ?";
        $bindParam = $teamId;
        $executedQuery = $this->db->query($sql,$bindParam);
        $row = $executedQuery->row_array();

        if($row === NULL)
        {
            $loginResult = NULL;
        }
        else
        {
            $password_hash = $row['password'];
            if(password_verify($password, $password_hash))
            {
                $loginResult = $row;
            }
            else
            {
                $loginResult = NULL;
            }
        }
        return $loginResult;
    }

    public function changePassword($teamId,$password){
        $password = parent::sanitize_input($password);
        $teamId = $this->sanitize_input($teamId);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE tim SET password = ? WHERE id = ?";
        $bindParam = array($password, $teamId);
        $this->db->query($sql,$bindParam);
    }

    public function hasReserveMember($teamId)
    {
        $teamId = $this->sanitize_input($teamId);
        $sql = "SELECT id FROM peserta WHERE id_tim = ? AND status = 'cadangan'";
        $param = [$teamId];
        $res = $this->db->query($sql,$param);
        if($res->row_array() === null)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function getProfile($contestantId)
    {
        $contestantId = $this->sanitize_input($contestantId);
        $sql = "SELECT id,nama, kelas, kartu_pelajar,alergi,email,vegetarian,hp,status,ukuran_baju FROM peserta WHERE id = ?";
        $param = [$contestantId];
        $res = $this->db->query($sql,$param);
        $result = $res->row_array();
        return $result;
    }

    public function updateProfile($contestantId, $email, $hp, $alergi, $vegetarian, $studentCard,$ukuran_baju)
    {
        $contestantId = $this->sanitize_input($contestantId);
        $email = $this->sanitize_input($email);
        $hp = $this->sanitize_input($hp);
        $alergi = $this->sanitize_input($alergi);
        $vegetarian = $this->sanitize_input($vegetarian);
        $ukuran_baju = $this->sanitize_input($ukuran_baju);
        $studentCard = $this->sanitize_input($studentCard);

        if(empty($studentCard))
        {
            $sql = "UPDATE peserta SET email = ?, hp = ?, alergi = ?, vegetarian = ?,ukuran_baju=? WHERE id = ?";
            $param = [$email, $hp, $alergi, $vegetarian,$ukuran_baju, $contestantId];
        }
        else
        {
            $sql = "UPDATE peserta SET email = ?, hp = ?, alergi = ?, vegetarian = ?, kartu_pelajar = ?,ukuran_baju=? WHERE id = ?";
            $param = [$email, $hp, $alergi, $vegetarian, $studentCard,$ukuran_baju, $contestantId];
        }
        $this->db->query($sql,$param);

    }
}
?>