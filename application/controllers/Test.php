<?php

class Test extends MY_Controller {
    public function index()
    {
        $this->data['pageTitle'] = 'ILPC UBAYA 2018 | Informatic Logical Programming Competition Universitas Surabaya';
        $this->render_view('password/reset_request_salah', 'info/masterbg');
    }
}
?>