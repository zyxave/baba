<?php
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['pageTitle'] = 'ILPC UBAYA 2018';
		$this->data['jquery'] = '<script src="' .  base_url() . 'asset/2018/jquery-1.11.3.min.js"></script>';
		$this->data['bootstrapJs'] = '<script src="' .  base_url() . 'asset/2018/bootstrap/js/bootstrap.min.js"></script>';
	}

	/**
	 * @param $viewFileName isi dengan nama view yang mau ditampilkan. jika berada di subfolder, sertakan juga subfoldernya
	 * Contoh: view login berada di subfolder web. maka penulisannya "web/login"
	 * @param string $template isi dengan nama template tempat si $viewFileName mau disisipkan. jika tidak pakai template, /
	 * isi dengan NULL atau tidak perlu diberi nilai parameter.
     * Khusus untuk kasus AJAX request, jika ingin return JSON , isi dengan "json". Jika ingin return AJAX berupa html (pending dulu, not tested yet)
	 */
	protected function render_view($viewFileName, $template = NULL)
	{
		if($this->input->is_ajax_request())
		{
			if($template == 'json')
			{
				/* 
				header('Content-Type: application/json');
				echo json_encode($this->data); 

				OR

				$this->output->set_output(json_encode($this->data));

				*/
				//header('Content-Type: application/json');
				//echo json_encode($this->data);
				$this->output->set_output(json_encode($this->data));
			}
			else
			{
				$this->load->view($viewFileName,$this->data);
			}
		}
		else if(is_null($template))
		{
			$this->load->view($viewFileName,$this->data);
		}
		else 
		{
			$this->data['content'] = $this->load->view($viewFileName, $this->data,TRUE);
			$this->load->view( $template , $this->data);
		}
	}
}
?>