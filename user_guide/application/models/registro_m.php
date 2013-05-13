<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_m extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	
	public function inserta_alumno(){

		
	}
	
	// public function trae_divisiones(){
		// $this->db->select('idprofesores');
		// $this->db->from('profesores');
		// $this->db->where('numempleado',$numEmp);
// 		
	// }
}
?>