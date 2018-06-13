<?php
/**
 * Date: 20/10/2015
 * Time: 20:51
 */
class Panduan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['acara'] = 1;
        $this->data['pageTitle'] = 'Panduan | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/panduan','info/master');
    }

}