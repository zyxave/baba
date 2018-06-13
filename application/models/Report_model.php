<?php

/**
 * Description of report_model
 *
 * @author santos sabanari
 */
Class Report_model extends MY_Model {

    function secure($var) {
        $var = htmlspecialchars(stripslashes($var));
        $var = str_replace("script", "blocked", $var);
        $var = mysql_escape_string($var);
        return $var;
    }

    function getAllKompetisi() {
        $sql = "select id, tahun, tema
                from kompetisi";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

//    function getTimKompetisi($id) {
//        $id = $this->secure($id);
//        $sql = "SELECT t.nama as 'nama_tim', a.nama as 'nama_anggota',a.vegetarian, a.alergi, g.nama as 'nama_guru', s.nama as 'nama_sekolah'
//                FROM tim t, guru_pendamping g, sekolah s, anggota a
//                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping and id_kompetisi = " . $id . " and t.status='ready' and t.id=a.id_tim";
//        $result = $this->db->query($sql);
//        return $result->result_array();
//    }
    function getTimKompetisi($id) {
        $id = $this->secure($id);
        if ($id == 1) {
            $sql = "SELECT t.nama as 'nama_tim', a.nama as 'nama_anggota',a.vegetarian, a.alergi, g.nama as 'nama_guru', s.nama as 'nama_sekolah'
                FROM tim t, guru_pendamping g, sekolah s, anggota a
                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping and id_kompetisi = " . $id . " and t.status='ready' and t.id=a.id_tim";
        } else {
            $sql = "SELECT t.nama as 'nama_tim', a.nama as 'nama_anggota',a.vegetarian, a.alergi, g.nama as 'nama_guru', s.nama as 'nama_sekolah'
                FROM tim t, guru g, sekolah s, peserta a
                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping and id_kompetisi = " . $id . " and t.status='ready' and t.id=a.id_tim";
        }
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getTimKompetisiWithIdSekolah($id_kompetisi, $id_sekolah) {
        $id_kompetisi = $this->secure($id_kompetisi);
        $id_sekolah = $this->secure($id_sekolah);
        if ($id_kompetisi == 1) {
            $sql = "SELECT t.nama as 'nama_tim', a.nama as 'nama_anggota', a.email, a.alergi, a.vegetarian
                FROM tim t, guru_pendamping g, sekolah s, anggota a
                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping and id_kompetisi = " . $id_kompetisi . " and t.status='ready' and t.id=a.id_tim and s.id=" . $id_sekolah . "";
        } else {
            $sql = "SELECT t.nama as 'nama_tim', a.nama as 'nama_anggota', a.email, a.alergi, a.vegetarian
                FROM tim t, guru g, sekolah s, peserta a
                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping and id_kompetisi = " . $id_kompetisi . " and t.status='ready' and t.id=a.id_tim and s.id=" . $id_sekolah . "";
        }
        $result = $this->db->query($sql);
        return $result->result_array();
    }

//        function getTimKompetisiWithIdSekolah($id_kompetisi,$id_sekolah) {
//        $id_kompetisi = $this->secure($id_kompetisi);
//        $id_sekolah = $this->secure($id_sekolah);
//        $sql = "SELECT t.nama as 'nama_tim', a.nama as 'nama_anggota', a.email, a.alergi, a.vegetarian
//                FROM tim t, guru_pendamping g, sekolah s, anggota a
//                WHERE s.id = g.id_sekolah AND g.id = t.id_guru_pendamping and id_kompetisi = " . $id_kompetisi . " and t.status='ready' and t.id=a.id_tim and s.id=".$id_sekolah."";
//        $result = $this->db->query($sql);
//        return $result->result_array();
//    }

    function getSekolah($id_kompetisi) {
        $id_kompetisi = $this->secure($id_kompetisi);
        if ($id_kompetisi == 1) {
            $sql = "select distinct s.id, s.nama
                from sekolah s, guru_pendamping g, tim t 
                where s.id=g.id_sekolah and g.id=t.id_guru_pendamping and t.id_kompetisi=" . $id_kompetisi . "";
        } else {
            $sql = "select distinct s.id, s.nama
                from sekolah s, guru g, tim t 
                where s.id=g.id_sekolah and g.id=t.id_guru_pendamping and t.id_kompetisi=" . $id_kompetisi . "";
        }
        $result = $this->db->query($sql);
        return $result->result_array();
    }

//        function getSekolah($id_kompetisi) {
//        $id_kompetisi = $this->secure($id_kompetisi);
//        $sql = "select distinct s.id, s.nama
//                from sekolah s, guru_pendamping g, tim t 
//                where s.id=g.id_sekolah and g.id=t.id_guru_pendamping and t.id_kompetisi=".$id_kompetisi."";
//        $result = $this->db->query($sql);
//        return $result->result_array();
//    }

    function getKontesIsian($id_kompetisi) {
        $id_kompetisi = $this->secure($id_kompetisi);
        $sql = "select i.id, i.nama
                from kontes_isian i, admin a, kompetisi k
                where i.id_admin=a.id and a.id_kompetisi=k.id and k.id=" . $id_kompetisi . "";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getKontesPilgan($id_kompetisi) {
        $id_kompetisi = parent::sanitize_input($id_kompetisi);
        $sql = "select i.id, i.nama
                from kontes_pilgan i, admin a, kompetisi k
                where i.id_admin=a.id and a.id_kompetisi=k.id and k.id=?";
        $param = [$id_kompetisi];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    function getKontesPemrograman($id_kompetisi) {
        $id_kompetisi = parent::sanitize_input($id_kompetisi);
        $sql = "select i.id, i.nama
                from kontes_pemrograman i, admin a, kompetisi k
                where i.id_admin=a.id and a.id_kompetisi=k.id and k.id=?";
        $param = [$id_kompetisi];
        $result = $this->db->query($sql,$param);
        return $result->result_array();
    }

    function getSekolahWithId($id_sekolah) {
        $id_sekolah = $this->secure($id_sekolah);
        $sql = "select id, nama, kota, alamat
                from sekolah
                where id=" . $id_sekolah . "";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    function getKompetisiWithId($id_kompetisi) {
        $id_kompetisi = $this->secure($id_kompetisi);
        $sql = "select id, tahun, tema
                from kompetisi
                where id=" . $id_kompetisi . "";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    function getKontesIsianWithId($id_kontes) {
        $id_kontes = $this->secure($id_kontes);
        $sql = "select id,nama, tanggal
                from kontes_isian
                where id=" . $id_kontes . "";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    function getKontesPilganWithId($id_kontes) {
        $id_kontes = parent::sanitize_input($id_kontes);
        $sql = "select id,nama, tanggal
                from kontes_pilgan
                where id=?";
        $param = [$id_kontes];
        $result = $this->db->query($sql,$param);
        return $result->row_array();
    }

    function getKontesPemrogramanWithId($id_kontes) {
        $id_kontes = $this->secure($id_kontes);
        $sql = "select id,nama, tanggal
                from kontes_pemrograman
                where id=" . $id_kontes . "";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

//    function getScoreKontesIsian($id_kontes){
//        $id_kontes = $this->secure($id_kontes);
//        $sql = "select t.nama as nama_tim,s.nama as nama_sekolah,(select score from mengikuti_kontes_isian where id_tim=t.id and id_kontes_isian='".$id_kontes."') as score
//                from tim t,guru_pendamping g, sekolah s
//                where t.id_guru_pendamping=g.id and g.id_sekolah=s.id and t.id in (
//                                                                                   select id_tim from mengikuti_kontes_isian
//                                                                                   where id_kontes_isian=".$id_kontes.")
//                order by score desc";
//        $hasil = $this->db->query($sql);
//        return $hasil->result_array();
//    }
    function getScoreKontesIsian($id_kontes) {
        $id_kontes = $this->secure($id_kontes);
        $sql = "select t.nama as nama_tim,s.nama as nama_sekolah,(select score from mengikuti_kontes_isian where id_tim=t.id and id_kontes_isian='" . $id_kontes . "') as score
                from tim t,guru g, sekolah s
                where t.id_guru_pendamping=g.id and g.id_sekolah=s.id and t.id in (
                                                                                   select id_tim from mengikuti_kontes_isian
                                                                                   where id_kontes_isian=" . $id_kontes . ")
                order by score desc";
        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }

    function getScoreKontesPilgan($id_kontes) {
        $id_kontes = $this->secure($id_kontes);
        $sql = "select t.nama as nama_tim,s.nama as nama_sekolah,(select score from mengikuti_kontes_pilgan where id_tim=t.id and id_kontes_pilgan='" . $id_kontes . "') as score
                from tim t,guru g, sekolah s
                where t.id_guru_pendamping=g.id and g.id_sekolah=s.id and t.id in (
                                                                                   select id_tim from mengikuti_kontes_pilgan
                                                                                   where id_kontes_pilgan=" . $id_kontes . ")
                order by score desc";

        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }

    function getScoreKontesPemrograman($id_kontes) {
        $id_kontes = $this->secure($id_kontes);
        $sql = "select t.id as id_tim , t.nama as nama_tim, s.nama as nama_sekolah, 
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
                left join mengikuti_kontes_pemrograman p
                on t.id=p.id_tim
                where p.id_kontes_pemrograman='" . $id_kontes . "'
                order by jumlah_ac desc, time asc";

        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }

//    function getScoreKontesPemrograman($id_kontes){
//        $id_kontes = $this->secure($id_kontes);
//        $sql = "select t.id as id_tim , t.nama as nama_tim, s.nama as nama_sekolah, 
//                ifnull(
//                    (select count(*)
//                    from submission_pemrograman
//                    where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as jumlah_ac,
//                ifnull(
//                    (select sum(poin)
//                    from submission_pemrograman
//                    where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as time,
//                ifnull(
//                    (select count(*)
//                    from (
//                    select 
//                        ifnull(
//                            (select count(*)
//                            from submission_pemrograman
//                            where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."')),0) as jumlah_ac
//                        from tim t
//                        left join guru_pendamping g
//                        on t.id_guru_pendamping = g.id
//                        left join sekolah s
//                        on g.id_sekolah=s.id
//                        left join mengikuti_kontes_pemrograman p
//                        on t.id=p.id_tim
//                        where p.id_kontes_pemrograman='" . $id_kontes . "'
//                    ) as tabel
//                    where jumlah_ac=(select count(*)
//                        from submission_pemrograman
//                        where id_tim=t.id and hasil='Accepted' and id_soal_pemrograman in (select id from soal_pemrograman where id_kontes_pemrograman='".$id_kontes."'))
//                    ),0) as jjb
//                from tim t
//                left join guru_pendamping g
//                on t.id_guru_pendamping = g.id
//                left join sekolah s
//                on g.id_sekolah=s.id
//                left join mengikuti_kontes_pemrograman p
//                on t.id=p.id_tim
//                where p.id_kontes_pemrograman='" . $id_kontes . "'
//                order by jumlah_ac desc, time asc";
//        
//        $hasil = $this->db->query($sql);
//        return $hasil->result_array();
//    }

    function getMaxPoin($id_kontes) {
        $id_kontes = $this->secure($id_kontes);
        $sql = "select max_poin_ac
                from kompetisi
                where id = (select k.id
                from kompetisi k, admin a
                where a.id_kompetisi = k.id and a.id = (select id_admin from kontes_pemrograman where id='" . $id_kontes . "'))";

        $result = $this->db->query($sql);
        $result = $result->row_array();
        return $result['max_poin_ac'];
    }

}

?>