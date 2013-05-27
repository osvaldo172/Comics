<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comics_c extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url', 'cookie'));
		$this->load->library(array('pagination', 'email', 'session'));
        $this->load->model('Comics_m'); // Load the model
    }
	
	public function index(){
		
		$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$total=$this->Comics_m->obtenTotalMarvel();
		$config['base_url'] = base_url().'index.php/comics_c/index';
		$config['total_rows'] = $total;
		$config['per_page'] = 2;
		$aux2=$config['per_page'];
		$aux=$this->uri->segment(3);
		$this->pagination->initialize($config);
	
		$datos=Array(
			'lEditoriales' => $lEditoriales,
			//'lMarvel' => $lMarvel,
			'lDC' => $this->Comics_m->obtenLDC($aux2, $aux),
			'lMarvel' => $this->Comics_m->obtenLMarvel($aux2, $aux)
			//'lBlog' => $lBlog

		 );
		$this->load->view('comics_v', $datos);	

	}
	
	
	public function correo(){
		// bool whether to validate email or not      
		
		$cliente = htmlentities($_POST['cliente']);
		$nombre = htmlentities($_POST['nombre']);
		$idcomic = htmlentities($_POST['idcomic']);
		$precio = htmlentities($_POST['precio']);
		$cantidad = htmlentities($_POST['cantidad']);
		$de = htmlentities($_POST['correo']);
		$datos['direccion'] = htmlentities($_POST['direccion'])."\n\nEl comic que se solicita es: ".$nombre."\nCon idcomic: ".$idcomic."\nEl precio del comic es: ".$precio;
		$this->email->initialize($config);
        $this->email->from($de, $cliente);
        $this->email->reply_to($de);
        $this->email->subject('Solicutud de compra de comic');
        $this->email->to('pedidosrawcomics@gmail.com'); 
		$this->email->message($datos['direccion']);
		
		$actualiza=$this->Comics_m->restaCantidad($idcomic, $cantidad-1);
		
		
		if($this->email->send()){
			redirect(base_url().'index.php/comics_c', 'refresh');
			
		}
		else {
			echo $this->email->print_debugger();
		}
	}
}	
