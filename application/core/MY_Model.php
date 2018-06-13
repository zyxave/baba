<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 12/09/2015
 * Time: 20:33
 */
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Mengamankan variabel hasil input tanpa di 'escape'
     * Berfungsi untuk :
     * 1. Membuang slash di akhir value & convert special character ke bentuk html
     * 2. replace script tag with "blocked" string.
     * @param $var inputan yang mau di "sanitize"
     * @return mixed|string sanitized
     */
    public function sanitize_input($var)
    {
        $var = htmlspecialchars(stripslashes($var));
        $var = str_replace("script", "blocked", $var);
        return $var;
    }

    /**
     * fungsi sama dengan sanitize() ditambah dengan escpae string menggunakan mysqli
     * @return mixed|string sanitized & escpaed variable
     */
    public function sanitize_and_escape($var)
    {
        $var = htmlspecialchars(stripslashes($var));
        $var = str_replace("script", "blocked", $var);
        $var = mysqli_escape_string($this->db->conn_id, $var);
        return $var;
    }
}
?>