<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Registro_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('registro_m'); //Cargando mi modelo
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		}
		
		function index()	{           //Cargamos vista
			
			/**Validación del formulario**/			
			$this->form_validation->set_rules('matriculaInput', 'matriculaInput', 'required');
			$this->form_validation->set_rules('passInput', 'passInput', 'required');
			$this->form_validation->set_rules('pass2Input', 'pass2Input', 'required');
			$this->form_validation->set_rules('correoInput', 'correoInput', 'required');
			$this->form_validation->set_message('required','Campo obligatorio');

			
			if($this->form_validation->run()){

				$matricula = $_POST['matriculaInput'];
				$pass = $_POST['passInput'];
				$pass2 = $_POST['pass2Input'];
				$correo =$_POST['correoInput'];
				$creditos = 0;
				$licenciatura = $_POST['licenciatura'];
				
				$this->registro_m->inserta_alumno();
			}
			else{
				$this->load->view('registro_v');
			}
			

		} //Fin de index

	}//Fin de la clase
?>