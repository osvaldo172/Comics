<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Comics_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function obtenLEditoriales(){
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
		
		// function obtenLDC(){
			// $this->db->select('nombre, descripcion, imagen, precio, cantidad'); //Haciendo la consulta
			// $this->db->from('comics');
			// $this->db->where('editorial_ideditorial', 2);
			// $this->db->order_by("fecha", "desc");
// 
			// $lDC=$this->db->get(); //Vaciando el resultado
// 			
			// if(($lDC->num_rows())>0){ //Verificando si tengo datos a cargar
				// $indice=1;
				// foreach ($lDC->result_array() as $value) {
					// $l_DC[$indice] = $value; //Guardando mis datos en un arreglo
					// $indice=$indice+1;
				// }
				// return ($l_DC); //Regreso información al controlador
			// }else{
				// $mensaje_error="No hay datos que cargar CBS";
				// return ($mensaje_error);
			// }//fin del else
		// }
		
		
		function obtenTotal(){
			$this->db->select('*'); //Haciendo la consulta
			$this->db->from('comics');
			$this->db->where('editorial_ideditorial', 1);
			$total=$this->db->get(); //Vaciando el resultado
			$total=$total->num_rows();
							
			return ($total);
		}
		
		function obtenLMarvel ($per_page, $aux){
			
			$this->db->select('nombre, descripcion, imagen, precio, cantidad');
			$this->db->order_by("fecha", "desc");
			$data = $this->db-> get_where('comics', array('editorial_ideditorial' => 1), $per_page, $aux);
			return $data->result_array();
		}

		function obtenLDC ($per_page, $aux){
			
			$this->db->select('nombre, descripcion, imagen, precio, cantidad');
			$this->db->order_by("fecha", "desc");
			$data = $this->db-> get_where('comics', array('editorial_ideditorial' => 2), $per_page, $aux);
			return $data->result_array();
		}
		/*function obtenLCSH(){
			$this->db->select('nombre,idlicenciaturas'); //Haciendo la consulta
			$this->db->from('licenciaturas');
			$this->db->where('divisiones_iddivisiones',3);

			$lCSH=$this->db->get(); //Vaciando el resultado
			
			if(($lCSH->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($lCSH->result_array() as $value) {
					$l_CSH[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				}
				return ($l_CSH); //Regreso información al controlador
			}else{
				$mensaje_error="No hay datos que cargar CSH";
				return ($mensaje_error);
			}//fin del else
		}*/
	
				
	} //Fin de la clase

?>


		

 