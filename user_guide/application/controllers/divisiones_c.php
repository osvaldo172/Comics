<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divisiones_c extends CI_Controller {
	 
	function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url'));
        $this->load->model('Divisiones_m'); // Load the model
    }


	public function index(){
		
		$lDivisiones=$this->Divisiones_m->obtenLDivisiones();
		$lCBI=$this->Divisiones_m->obtenLCBI();
		$lCBS=$this->Divisiones_m->obtenLCBS();
		$lCSH=$this->Divisiones_m->obtenLCSH();

		$datos=Array(
				'lDivisiones' => $lDivisiones,
				'lCBI' => $lCBI,
				'lCBS' => $lCBS,
				'lCSH' => $lCSH

		 );

		$this->load->view('divisiones_v', $datos);	

	}	
}	