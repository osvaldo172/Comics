<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Buscador_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
	function busca($cadena, $per_page, $aux){
		$this->db->select('nombre, descripcion, imagen, precio, cantidad, idcomic');
		//$this->db->from('comics');
		$this->db->like('nombre', $cadena);
		// $this->db->select('nombre, ideditorial'); //Haciendo la consulta
		// $this->db->from('editorial');
		//$resultado=$this->db->get('comics', $por_pagina, $segmento);		
		$resultado=$this->db->get('comics', $per_page, $aux); //Vaciando el resultado}{+}}
		if(($resultado->num_rows())>0){ //Verificando si tengo datos a cargar
			$indice=1;
			foreach ($resultado->result_array() as $value) {
					
				$aResultado[$indice] = $value; //Guardando mis datos en un arreglo
				$indice=$indice+1;
						
			}
					
			return ($aResultado); //Regreso información al controlador
		}//fin del else
		else{
			$mensaje_error="No hay resultados";	
			return ($mensaje_error);
		}
	}	
		
				
}//Fin de la clase

?>	

 