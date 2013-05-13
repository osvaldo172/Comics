<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginacion_c extends CI_Controller {
	 
   public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model(array('Paginacion_m', 'Comics_m'));
        $this->load->library("pagination");
    }

    public function index() {
    	$this->load->library('pagination');
		$this->load->library('table');
		//Configuramos los datos de la paginacion
		$config['base_url'] = base_url().'index.php/paginacion_c/index';
		$config['total_rows'] = $this->Paginacion_m->obtenTotalDeRows();
		$config['per_page']   = 2;
		$aux2=$config['per_page'];
		$aux=$this->uri->segment(3);
		//$aux=3;
		//printf($aux);
		// $config['num_links']   = 1;
		//iniciamos la paginacion
		//print_r($config['per_page']);
		$this->pagination->initialize($config);
		//Cargamos los datos para la tabla OJO! acá va el limit
		$data["records"] = $this->Paginacion_m->prueba($aux2, $aux);
		//Cargamos la vista
		//print_r($data);
		$this->load->view("paginacion_v", $data);
		
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


	
