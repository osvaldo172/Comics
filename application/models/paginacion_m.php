<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Paginacion_m extends CI_Model{
	
		public function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
		
		function prueba ($per_page, $aux){
			
			$this->db->select('nombre, descripcion, imagen, precio, cantidad');
			$this->db->order_by("fecha", "desc");
			$data = $this->db-> get_where('comics', array('editorial_ideditorial' => 1), $per_page, $aux);
			return $data->result_array();
		}
			
		function obtenLComics($limit, $start){

			$this->db->limit($limit, $start);
	        $query = $this->db->get("comics");

			if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
            	return $data;
	        }
	
	        return false;
			}

			 
		
		function obtenTotalDeRows(){
			return $this->db->count_all('comics');
		}	
				
	} //Fin de la clase

?>


		

 