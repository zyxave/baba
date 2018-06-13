<?php
/**
 * Date: 11/10/2015
 * Time: 14:22
 */
class Akomodasi extends MY_Controller {

    public function index()
    {
        $this->data['akomodasi'] = 1;
        $this->data['pageTitle'] = 'Akomodasi | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/akomodasi','info/master');
    }
}