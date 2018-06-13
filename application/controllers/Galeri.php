<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 13/10/2015
 * Time: 15:27
 */
class Galeri extends MY_Controller {

    public function index()
    {
        $this->data['galeri'] = 1;
        $this->data['pageTitle'] = 'Galeri | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/galeri','info/master');
    }
}
?>