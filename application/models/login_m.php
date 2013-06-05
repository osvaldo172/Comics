<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Login_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function validarLogin(){
			$nick = $this->security->xss_clean($this->input->post('usuario'));
			$pass = $this->security->xss_clean($this->input->post('password'));
			
			$this->db->select('nombre'); //Haciendo la consulta
			$this->db->from('usuario');
			$this->db->where('cargo_idcargo', 1);
			$this->db->where('nick', $nick);
			$this->db->where('password', $pass);
			$valida=$this->db->get();
			
			if($valida->num_rows == 1){
				$row = $valida->row();
				$data = array(
					'validated' => true
					);
				$this->session->set_userdata($data);
				return true;
			}

		return false;
		}
	}
?>	