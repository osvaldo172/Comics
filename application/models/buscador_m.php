<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Buscador_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function busca(){
			$cadena = $this->security->xss_clean($this->input->post('cadena_buscar'));
			if($cadena = '' or NULL){
				return FALSE;
			}
			
			else {
				
			}
			
			$this->db->select('nombre, ideditorial'); //Haciendo la consulta
			$this->db->from('editorial');
			
			$lEditoriales=$this->db->get(); //Vaciando el resultado}{+}}
			//print_r($lEditoriales);
			
			if(($lEditoriales->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($lEditoriales->result_array() as $value) {
				
					$aEditoriales[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				}
				
				return ($aEditoriales); //Regreso información al controlador
			}else{
				$mensaje_error="No hay datos que cargar";
				return ($mensaje_error);
			}//fin del else
			//return ($aEditoriales); //Regreso información al controlador
			
		}
				
	} //Fin de la clase

?>	

 