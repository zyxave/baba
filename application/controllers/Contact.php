<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 11/10/2015
 * Time: 14:21
 */
class Contact extends MY_Controller {

    public function index()
    {
        //$this->load->view('main/public_home');
        $this->data['contact'] = 1;
        $this->data['pageTitle'] = 'Kontak Kami | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/contact','info/master');
    }
}