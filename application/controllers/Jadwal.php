<?php
/**
 * @author CWR
 * Date: 11/10/2015
 * Time: 14:25
 */
class Jadwal extends MY_Controller {

    public function index()
    {
        $this->render_view('main/jadwal','main/master_public');
    }
}