<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marvel_c extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url'));
		$this->load->library('pagination');
        $this->load->model('Comics_m'); // Load the model
    }


	public function index(){
		
		$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$total=$this->Comics_m->obtenTotalMarvel();
		$config['base_url'] = base_url().'index.php/marvel_c/index';
		$config['total_rows'] = $total;
		$config['per_page'] = 3;
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

		 
		 
		//print_r($datos);
		$this->load->view('comics_v', $datos);	

	}	
}	