<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Buscador extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('Buscador_m', 'Comics_m')); // Load the model
			
	   	}

    function index( $msg = NULL ){
 		$datos=Array(
				'lEditoriales' => $lEditoriales,
				//'lMarvel' => $lMarvel,
				'lDC' => $this->Comics_m->obtenLDC($aux2, $aux),
				'lMarvel' => $this->Comics_m->obtenLMarvel($aux2, $aux)
				//'lBlog' => $lBlog

		 );
       	$this->load->view('buscador_v', $data);
	}
	// class Buscador extends CI_Controller {
	// 	 
		// function __construct(){
	        // parent::__construct();
	        // $this->load->helper(array('html', 'url'));
			// $this->load->library('pagination');
	        // $this->load->model(array('Comics_m', "Buscador_m")); // Load the model
	    // }

	function mostrar_resultado($cadena){
		echo $cadena;
		
	}
	 public function busqueda(){
	 	if(isset($_POST['buscar'])){
	  		$cadena = $_POST['buscar'];
			$lEditoriales=$this->Comics_m->obtenLEditoriales();
			$datos['lEditoriales']=$lEditoriales;
			$datos['lcadena'] = htmlentities($_POST['buscar']);
			print_r($datos);
			echo "<script languaje='javascript'>alert('esto es el index')</script>";
			$this->load->view('pruebas_v', $datos);	
		}
		else{
		redirect(base_url().'index.php/marvel_c/index');
		} 
		//redirect('buscador/mostrar_resultado/'.$cadena); 
		//$lEditoriales=$this->Comics_m->obtenLEditoriales();        
    } 
	
}