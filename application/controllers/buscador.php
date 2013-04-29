<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

<<<<<<< HEAD
	
	class Buscador extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('buscador_m', 'comics_m')); // Load the model
			
	   	}

    function index( $msg = NULL ){
 		$data['msg'] = $msg;
        $this->load->view('buscador_v', $data);
=======
class Buscador extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url'));
		$this->load->library('pagination');
        $this->load->model(array('Comics_m', "Buscador_m")); // Load the model
>>>>>>> 850d517b7a026380a1f094a4eea51926c5dd856e
    }


	 
	  function index( $msg = NULL ){
	  	//$cadena = $_POST['buscar'];
	 	//echo "<script languaje='javascript'>alert('esto es el index')</script>";
	 	$lEditoriales=$this->Comics_m->obtenLEditoriales();
 		//$data['msg'] = $msg;
		$datos=Array(
				'lEditoriales' => $lEditoriales,
				//'lMarvel' => $lMarvel,
				//'lDC' => $this->Comics_m->obtenLDC($aux2, $aux),
				//'lMarvel' => $this->Comics_m->obtenLMarvel($aux2, $aux),
				//'lBlog' => $lBlog
				'msg' => $msg
		 );
		
		 $this->load->view('buscador_v', $datos);	
		 
	
    }
	function mostrar_resultado($cadena){
		echo $cadena;
		
	}
	 public function busqueda(){
  		$cadena = $_POST['buscar'];
		$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$datos['lEditoriales']=$lEditoriales;
		$datos['lcadena'] = htmlentities($_POST['buscar']);
		print_r($datos);
		echo "<script languaje='javascript'>alert('esto es el index')</script>";
		$this->load->view('pruebas_v', $datos);	
		
		//redirect('buscador/mostrar_resultado/'.$cadena); 
		//$lEditoriales=$this->Comics_m->obtenLEditoriales();        
    } 
}	
