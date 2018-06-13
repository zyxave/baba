<?php
/**
 * @author CWR
 * Date: 11/10/2015
 * Time: 14:18
 */
class Home extends MY_Controller {

    public function index()
    {
        //$this->load->view('main/public_home');
        $this->data['home'] = 1;
        $this->data['pageTitle'] = 'ILPC UBAYA 2018 | Informatic Logical Programming Competition | Universitas Surabaya';
        parent::render_view('info/home','info/master');
    }
}