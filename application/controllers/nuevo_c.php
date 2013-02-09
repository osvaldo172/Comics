<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Nuevo_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url', 'form'));
			$this->load->model('nuevo_m'); //Cargando mi modelo
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		}
		
		function Upload()
		
		{
			parent::Controller();
			$this->load->helper(array('form', 'url'));
		
		
		}
		
		public function index()	{
			$datos['nombre'] = $this->nuevo_m->trae_editorial();
			$datos['edicion'] = $this->nuevo_m->trae_edicion();
			// print_r ($datos['edicion']);
			//$this->load->view('nuevo_v',$datos);
			
			$this->form_validation->set_rules('idcomic', 'idcomic', 'required');
			$this->form_validation->set_rules('editorial', 'editorial', 'callback_editorial_ideditorial');
			$this->form_validation->set_rules('descripcion', 'descripcion', 'required');
			$this->form_validation->set_rules('fecha', 'fecha', 'required');
			$this->form_validation->set_rules('cantidad', 'cantidad', 'required');
			$this->form_validation->set_message('required', 'Campo obligatorio');
					
			
			if($this->form_validation->run()){
				
				
				
				$datos2['idcomic'] = $_POST['idcomic'];
				$datos2['nombre'] = $_POST['nombre']; 
				$datos2['descripcion'] =$_POST['descripcion'];
				$datos2['fecha'] =$_POST['fecha'];
				$datos2['cantidad'] =$_POST['cantidad'];
				$datos2['precio'] =$_POST['precio'];
				$datos2['imagen'] =$_FILES["userfile"]['name'];
				$datos2['editorial_ideditorial'] = $_POST['editorial_ideditorial'];
				$datos2['edicion_idedicion'] =$_POST['edicion_idedicion'];
				$registro_exitoso=$this->nuevo_m->inserta_comic($datos2);
				
				
				if($registro_exitoso){
						
					$config['upload_path'] = 'static/img/';
					$config['allowed_types'] = 'gif|jpg|png';
					
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload())
						{
							echo"no se subio la imagen";
							$error = array('error' => $this->upload->display_errors());
							$this->load->view('nuevo_v', array('error' => ' ' ));
						}
						else
						{
							echo "por fin </p>";
							$data = array('upload_data' => $this->upload->data());
							$this->load->view('nuevo_v', $data);
						}
					
					}
				}
			else{
				$this->load->view('nuevo_v',$datos);
			}
	

		} //Fin de index
		
		public function editorial_ideditorial($str){
			if ($_POST['editorial_ideditorial']=='Marvel'){
				$datos2['editorial'] = 1;
				return TRUE;
			}			
			$datos2['editorial'] = 2;
			return TRUE;
		}
		
		
		// function do_upload()
		// {
			// $config['upload_path'] ="/static/img/";
			// $config['allowed_types'] = 'gif|jpg|png';
			// $config['max_size'] = '100';
// 			
			// $this->load->library('upload', $config);
			// if ( ! $this->upload->do_upload())
			// {
				// $error = array('Archivo no valido');
				// $this->load->view('nuevo_v', $error);
			// }
			// else
			// {
				// echo "adios mundo cruel";
				// $data = array('upload_data' => $this->upload->data());
// 				
				// echo "Imagen subida";
				// //$this->load->view('comic_v', $data);
			// }
		// }		
	}
?>
