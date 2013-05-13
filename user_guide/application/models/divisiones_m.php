<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Divisiones_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function obtenLDivisiones(){
			$this->db->select('nombre,idDivisiones'); //Haciendo la consulta
			$this->db->from('divisiones');

			$lDivisiones=$this->db->get(); //Vaciando el resultado
			
			if(($lDivisiones->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($lDivisiones->result_array() as $value) {
					$aDivisiones[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				}
				return ($aDivisiones); //Regreso información al controlador
			}else{
				$mensaje_error="No hay datos que cargar";
				return ($mensaje_error);
			}//fin del else
		}
		
		function obtenLCBI(){
			$this->db->select('nombre,idlicenciaturas'); //Haciendo la consulta
			$this->db->from('licenciaturas');
			$this->db->where('divisiones_iddivisiones',1);

			$lCBI=$this->db->get(); //Vaciando el resultado
			
			if(($lCBI->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($lCBI->result_array() as $value) {
					$l_CBI[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				}
				return ($l_CBI); //Regreso información al controlador
			}else{
				$mensaje_error="No hay datos que cargar";
				return ($mensaje_error);
			}//fin del else
		}

		function obtenLCBS(){
			$this->db->select('nombre,idlicenciaturas'); //Haciendo la consulta
			$this->db->from('licenciaturas');
			$this->db->where('divisiones_iddivisiones',2);

			$lCBS=$this->db->get(); //Vaciando el resultado
			
			if(($lCBS->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($lCBS->result_array() as $value) {
					$l_CBS[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				}
				return ($l_CBS); //Regreso información al controlador
			}else{
				$mensaje_error="No hay datos que cargar CBS";
				return ($mensaje_error);
			}//fin del else
		}
		
		function obtenLCSH(){
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
		}
				
	} //Fin de la clase

?>


		

 