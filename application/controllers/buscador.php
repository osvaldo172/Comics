<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Buscador extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('buscador_m', 'comics_m')); // Load the model
			
	   	}

    function index( $msg = NULL ){
 		$data['msg'] = $msg;
        $this->load->view('buscador_v', $data);
    }
	
	
	 public function busca(){
  		// $usuario = $this->loguin2_m->
        $result = $this->buscador_m->busca();// Validate the user can login 
		if($result[] = NUL){ // Now we verify the result
           	$msg = '<font color=red>No se encontro ningun resultado relacionado a su busqueda</font><br/>';
			$this->index($msg);
			
        }else{
        	
        $lEditoriales=$this->Comics_m->obtenLEditoriales();
		//$lMarvel=$this->Comics_m->obtenLMarvel();
		//$lDC=$this->Comics_m->obtenLDC();
		$total=$this->Comics_m->obtenTotal();
		//$lBlog=$this->Comics_m->obtenerLBlog();
		$config['base_url'] = base_url().'index.php/buscador/busca';
		//$config['uri_segment'] = '2';
		//$config['base_url'] ='http://localhost/Comic/index.php/comics_c/';
		$config['total_rows'] = $total;
		$config['per_page'] = 2;
		$aux2=$config['per_page'];
		$aux=$this->uri->segment(3);
		$this->pagination->initialize($config);
		//$paginacion = $this->pagination->create_links();
		
		$datos=Array(
				'lEditoriales' => $lEditoriales,
				'lMarvel' => $lMarvel,
				'resultado' => $this->buscador_m->busca($aux2, $aux),
				
				//'lBlog' => $lBlog

		 );
		 
		 
		//print_r($datos);
		$this->load->view('buscador_v', $datos);	
        }        
    } 
}
?>