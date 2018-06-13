<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 13/10/2015
 * Time: 15:27
 */
class Maintenance extends MY_Controller {

    public function index()
    {
        $this->data['pageTitle'] = 'Maintenance | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->data['pesan'] = "Mohon maaf, halaman ini sedang dalam perbaikan.";
        $this->render_view('main/maintenance',NULL);
    }

    public function registration()
    {
    	$this->data['pageTitle'] = 'Maintenance | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->data['pesan'] = "Mohon maaf, pendaftaran saat ini sedang dalam perbaikan. Diperkirakan perbaikan akan selesai pada 18.00 WIB. Terima kasih";
        $this->render_view('main/maintenance',NULL);
    }
}
?>