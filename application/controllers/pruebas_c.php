<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Pruebas_c extends CI_Controller {

		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url', 'form'));
			//$this->load->model('nuevo_m'); //Cargando mi modelo
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		}
		

		
		function index()
		
		
		{
			$config['upload_path'] = 'static/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				echo "</p> no sirve";
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('pruebas_v', $error);
			}
			else
			{
				echo "</p> sirve";
				$data = array('upload_data' => $this->upload->data());
				$this->load->view('pruebas_v', $data);
			}
		}
		
		// function do_upload()
		// {
			// echo "aqui vamos bien";
// 			
			// $config['upload_path'] = 'static/img/';
			// $config['allowed_types'] = 'gif|jpg|png';
			// $this->load->library('upload', $config);
// 
// 			
			// if ( ! $this->upload->do_upload())
			// {
				// echo "</p> no sirve";
				// $error = array('error' => $this->upload->display_errors());
				// $this->load->view('pruebas_v', $error);
			// }
			// else
			// {
				// echo "</p> sirve";
				// $data = array('upload_data' => $this->upload->data());
				// $this->load->view('pruebas_v', $data);
			// }
// 
		// }
	}
?>
		