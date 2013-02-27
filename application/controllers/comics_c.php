<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comics_c extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url'));
		$this->load->library('pagination');
        $this->load->model('Comics_m'); // Load the model
    }


	public function index(){
		
		$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$lMarvel=$this->Comics_m->obtenLMarvel();
		$lDC=$this->Comics_m->obtenLDC();
		$total=$this->Comics_m->obtenTotal();
		//$lBlog=$this->Comics_m->obtenerLBlog();
		$config['base_url'] = base_url().'index.php/comics_c/index';
		//$config['uri_segment'] = '2';
		//$config['base_url'] ='http://localhost/Comic/index.php/comics_c/';
		$config['total_rows'] = $total;
		$config['per_page'] = '1';
		$this->pagination->initialize($config);
		//$paginacion = $this->pagination->create_links();
		
		$datos=Array(
				'lEditoriales' => $lEditoriales,
				'lMarvel' => $lMarvel,
				'lDC' => $lDC,
				'records' => $this->db->get('comics',$config['per_page'],$this->uri->segment(3))
				//'lBlog' => $lBlog

		 );
		 
		 
		print_r($datos);
		//$this->load->view('comics_v', $datos);	

	}	
}	