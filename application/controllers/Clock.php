<?php
/**
 * Created by PhpStorm.
 * User: CWR
 * Date: 08/01/2016
 * Time: 11:30
 */
class Clock extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getclock()
    {
        if($this->input->is_ajax_request())
        {
            //$receiveTime = date("Y-m-d\TH:i:sP",time());
            $receiveTime = date("F j, Y H:i:s",time());
            $this->data['originalTime'] = $this->input->get('original');
            $this->data['receiveTime'] = $receiveTime;
            $this->data['transmitTime'] = date("F j, Y H:i:s",time());
            //$this->render_view('contestant/jam',NULL);
            $this->render_view(NULL, 'json');
        }
        else
        {
            redirect(base_url() . 'error');
        }
    }
}
