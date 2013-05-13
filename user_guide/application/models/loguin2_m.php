<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loguin2_m extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	
	public function validate(){

		$username = $this->security->xss_clean($this->input->post('usuarioInput'));
		$password = $this->security->xss_clean($this->input->post('passInput'));
		
		print_r($username);
		print_r($password);
		
		$this->db->where('matricula', $username);
		$this->db->where('contrasenia', $password);
				
		$query = $this->db->get('alumnos');

		if($query->num_rows == 1)
		{
			$row = $query->row();
			$data = array(
					'matricula' => $row->idusuarioadmin,
					'usuario' => $row->usuario,
					'validated' => true
					);
			$this->session->set_userdata($data);
			return true;
		}

		return false;
	}
}
?>