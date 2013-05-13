<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Nuevo_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
		
		public function nuevoComic($idcomic, $nombre, $descripcion, $fecha, $cantidad, $precio, $editorial_ideditorial, $edicion_idedicion){
			$data = array(
				'idcomic' => $idcomic,
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'fecha' => $fecha,
				'cantidad' => $cantidad,
				'precio' => $precio,
				'imagen' => $imagen,
				'editorial_ideditorial' => $editorial_ideditorial,
				'edicion_idedicion' => $edicion_idedicion
				);
				
			$this->db->insert('comics', $data);
			
		}
		
		public function trae_editorial(){
			$this->db->select('ideditorial, nombre'); //Haciendo la consulta
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
			}
		}
		
		public function trae_edicion(){
			$this->db->select('idedicion, descripcion'); //Haciendo la consulta
			$this->db->from('edicion');
			
			$lEdicion=$this->db->get(); //Vaciando el resultado}{+}}
			//print_r($lEditoriales);
			
			if(($lEdicion->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($lEdicion->result_array() as $value) {
					$aEdicion[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				}
				
				return ($aEdicion); //Regreso información al controlador
			}else{
				$mensaje_error="No hay datos que cargar";
				return ($mensaje_error);
			}
		}
		
		public function inserta_comic($datos2){
		$datos=Array(
			'idcomic' => $datos2['idcomic'],
			'nombre' => $datos2['nombre'],
			'descripcion' => $datos2['descripcion'],
			'fecha' => $datos2['fecha'],
			'cantidad' => $datos2['cantidad'],
			'precio' => $datos2['precio'],
			'imagen' => $datos2['imagen'],
			'edicion_idedicion' => $datos2['edicion_idedicion'],
			'editorial_ideditorial' => $datos2['editorial_ideditorial']	
		);
		
		$this->db->insert('comics',$datos);
		return TRUE;
		}
	}

?>