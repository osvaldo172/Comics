<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Buscador extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('Buscador_m', 'Comics_m')); // Load the model
			
	   	}

    function index( $msg = NULL ){
    	redirect(base_url().'index.php/marvel_c');
	}
		
	public function mostrar($cadena){
		
		$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$resultado=$this->Buscador_m->busca($cadena);
		$datos['lEditoriales']=$lEditoriales;
		$datos['lcadena'] = htmlentities($_POST['buscar']);
		$datos['resultado'] = $resultado;
		$this->load->view('pruebas_v', $datos);
		
	}	
		
	public function busqueda(){
	 	$cadena = htmlentities($_POST['buscar']);
	 	if(!empty($cadena)/*isset($_POST['buscar'])*/){
	  		// $cadena = htmlentities($_POST['buscar']);
	  			redirect(base_url().'index.php/buscador/mostrar/'.$_POST['buscar']);
				// $lEditoriales=$this->Comics_m->obtenLEditoriales();
				// $resultado=$this->Buscador_m->busca($cadena);
				// $datos['lEditoriales']=$lEditoriales;
				// $datos['lcadena'] = htmlentities($_POST['buscar']);
				// $datos['resultado'] = $resultado;
				// $this->load->view('pruebas_v', $datos);
			
		}
		else{
		redirect(base_url().'index.php/marvel_c');
		} 
		//redirect('buscador/mostrar_resultado/'.$cadena); 
		//$lEditoriales=$this->Comics_m->obtenLEditoriales();        
    } 
	
}