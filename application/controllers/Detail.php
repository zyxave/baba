<?php

class Detail extends MY_Controller {

    public function index()
    {
        $this->data['acara'] = 1;
        $this->data['pageTitle'] = 'Detail | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/detail.php','info/master');
    }
}
?>