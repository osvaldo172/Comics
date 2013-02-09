<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginacion_c extends CI_Controller {
	 
   public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model(array('Paginacion_m', 'Comics_m'));
        $this->load->library("pagination");
    }

    public function index() {
    	$lEditoriales=$this->Comics_m->obtenLEditoriales();
		$lMarvel=$this->Comics_m->obtenLMarvel();
		$lDC=$this->Comics_m->obtenLDC();
		$total=$this->Comics_m->obtenTotal();
		//$lBlog=$this->Comics_m->obtenerLBlog();
		$config['base_url'] = base_url()."/Comic/index.php/comics_c";
		//$config['uri_segment'] = '2';
		//$config['base_url'] ='http://localhost/Comic/index.php/comics_c/';
		$config['total_rows'] = $total;
		$config['per_page'] = '1';
		$this->pagination->initialize($config);
		$paginacion = $this->pagination->create_links();
		
		$datos=Array(
				'lEditoriales' => $lEditoriales,
				'lMarvel' => $lMarvel,
				'lDC' => $lDC,
				'paginacion' => $paginacion
				//'lBlog' => $lBlog

		 );
		$config['base_url'] = 'http://localhost/Comic/index.php/paginacion_c';
		$config['total_rows'] = $this->Paginacion_m->obtenTotalDeRows();
		$config['per_page'] = '2';
		$this->pagination->initialize($config);
		echo $this->pagination->create_links();
		$this->load->view("comics_v");
		
        // $config = array();
        // $config["base_url"] = base_url().'index.php/paginacion_c/';
        // $config["total_rows"] = $this->Paginacion_m->obtenTotalDeRows();
        // $config["per_page"] = 2;
        // $config["uri_segment"] = 3;
		// print_r($config);
        // $this->pagination->initialize($config);
// 
        // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
// 		
        // $data["results"] = $this->Paginacion_m->obtenLComics($config["per_page"], $page); 
        // $data["links"] = $this->pagination->create_links();
		// echo "</p>";
		//print_r($datos);
		// echo "</p>";
        //$this->load->view("paginacion_v", $data);
    }
}


	 
	 
	 
	    // $opciones = array();
	    // $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
// 	 
	    // $opciones['base_url'] = base_url().'index.php/paginacion_c/';
	    // $opciones['per_page'] = 3;
	    // $opciones['uri_segment'] = 3;
	    // $opciones['total_rows'] = $this->Paginacion_m->obtenTotalDeRows();
// 	 
	    // $this->pagination->initialize($opciones);
// 	 	
	    // $data['lista'] = $this->Paginacion_m->obtenLComics($opciones['per_page'],$desde);
		// //print_r ($data['lista']);
	    // $data['paginacion'] = $this->pagination->create_links();
// 	 	
	   // $this->load->view('paginacion_v',$data);


	
