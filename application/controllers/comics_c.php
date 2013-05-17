<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comics_c extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url', 'cookie'));
		$this->load->library(array('pagination', 'email'));
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
		
		
       	$this->email->initialize($config);    
		
		$datos['direccion'] = $_POST['direccion'];
        $this->email->from('osvaldo172@gmail.com', 'myname');
        $this->email->to('osvaldo172@gmail.com'); 
        $this->email->subject('Solicutud de compra de comic');
		
        $this->email->message($datos['direccion']);

		if($this->email->send()){
			//redirect(base_url().'index.php/nuevo_c');
		}
		else {
			echo $this->email->print_debugger();
		}
	}
}	