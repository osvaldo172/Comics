<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Buscador extends CI_Controller{
    	
	
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->library(array('pagination', 'session', 'form_validation'));
	        $this->load->model(array('Buscador_m', 'Comics_m')); // Load the model
	   	}

    function index(){
    	
		redirect(base_url().'index.php/marvel_c');
	}
		
	public function mostrar(){
		
		$cadena = $this->session->userdata('cadenaK');
		//$cadena = $this->session->userdata('palabra');
		$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$total=$this->Comics_m->obtenTotalPag($cadena);
		$config['base_url'] = base_url().'index.php/buscador/mostrar/';
		$config['total_rows'] = $total;
		$config['per_page'] = 5;
		$aux2=$config['per_page'];
		$aux=$this->uri->segment(3);
		$this->pagination->initialize($config);
		$datos=Array(
			'lEditoriales' => $lEditoriales,
			'resultado' => $this->Buscador_m->busca($cadena, $aux2, $aux),
			'cadena'=>$cadena,
			'total'=>$total
			);
		$this->load->view('buscador_v', $datos);
		
	}	
		
	public function busqueda(){
	 	$cadena = htmlentities($_POST['buscar']);
	 	if(!empty($cadena)/*isset($_POST['buscar'])*/){
	  		// $cadena = htmlentities($_POST['buscar'])
	  		$this->session->set_userdata('cadenaK', $cadena);
	  		redirect(base_url().'index.php/buscador/mostrar/');
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
	
	public function validar() {
		//redirect(base_url().'index.php/comics_c/');
		
        $this->form_validation->set_rules('buscando', 'buscando', 'required');
		$this->form_validation->set_message('required', 'Campo obligatorio');
		
		//redirect(base_url().'index.php/comics_c/');
		if ($this->form_validation->run() == TRUE) {
  			
            $buscador = $this->input->post('buscando');
            $this->session->set_userdata('buscando', $buscador);
            //todo correcto y pasamos a la función index
           redirect('../buscador', 'refresh');
        } else {
            //mostramos de nuevo el buscador con los errores
           redirect(base_url().'index.php/comics_c/');
        }
    }
	
}