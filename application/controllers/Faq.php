<?php
/**
 * Date: 11/10/2015
 * Time: 14:23
 */
class Faq extends MY_Controller {

    public function index()
    {
        $this->data['faq'] = 1;
        $this->data['pageTitle'] = 'FAQ | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/faq','info/master');
    }
}