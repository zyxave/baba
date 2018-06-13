<?php
/**
 * @author CWR
 * Date: 11/10/2015
 * Time: 14:24
 */
class Peraturan extends MY_Controller {

    public function index()
    {
        $this->data['acara'] = 1;
        $this->data['pageTitle'] = 'Peraturan | ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('info/peraturan','info/master');
    }
}