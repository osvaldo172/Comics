<?php

    class Boligrama_m extends CI_Model {

        function __construct(){
            
            parent::__construct();
            
            $this->load->database();
        
        }           


    function traer_boligrama_m($matricula){

            $this->db->select('licenciaturas_idlicenciaturas');
            $this->db->from('alumnos');
            $this->db->where('matricula',$matricula);

            $resultado = $this->db->get();

            foreach ($resultado->result_array() as $value) {
                $value;
            }

            $licenciatura=$value['licenciaturas_idlicenciaturas'];

            if (isset($licenciatura)) {
            $this->db->select('ueas_idueas,trimestre');
            $this->db->from('ueas_licenciaturas');
            $this->db->where('licenciaturas_idlicenciaturas',$licenciatura);

            $UEAS = $this->db->get();

            foreach ($UEAS->result_array() as $index => $row) {
                $datos['ueasRelacionadas'][$index+1]=$row;

                foreach ($datos['ueasRelacionadas'] as  $value) {

                    if (isset($value['ueas_idueas'])) {

                        $this->db->select('nombre,division,creditos');
                        $this->db->from('ueas');
                        $this->db->where('idueas',$value['ueas_idueas']);

                        $datosUeas= $this->db->get();

                        foreach ($datosUeas->result_array() as  $row2) {
                            $datos['ueasRelacionadas'][$index+1]=$row+$row2;

                            $this->db->select('uea_seriada');
                            $this->db->from('seriacion');
                            $this->db->where('ueas_idueas',$value['ueas_idueas']);

                            $seriacion= $this->db->get();

                            $this->db->select('ueas_idueas');
                            $this->db->from('seriacion');
                            $this->db->where('uea_seriada',$value['ueas_idueas']);

                            $anterior= $this->db->get();

                            foreach ($anterior->result_array() as $index3 => $row4) {
                                //echo"<pre>"; print_r($row3['ueas_idueas']); echo"</pre>";
                                $datos['ueasRelacionadas'][$index+1]['seriacion_ant'][$index3+1]=$row4['ueas_idueas'];
                            }
                            foreach ($seriacion->result_array() as $index2 => $row3) {
                            //echo"<pre>"; print_r($row3); echo"</pre>";
                                $datos['ueasRelacionadas'][$index+1]['seriacion_sgte'][$index2+1]=$row3['uea_seriada'];
                            }

                        }
                    }
                }

            }

            }


            return $datos;

    }

    function traer_anterior($UEAsgt){

        $this->db->select('ueas_idueas');
        $this->db->from('seriacion');
        $this->db->where('uea_seriada',$UEAsgt);

        $anterior= $this->db->get();
		
		if(($anterior->num_rows())>0){ //Verificando si tengo datos a cargar
	        foreach ($anterior->result_array() as $index2 => $row3) {
	            //echo"<pre>"; print_r($row3['ueas_idueas']); echo"</pre>";
	            $datos['ueasAnteriores'][$index2+1]=$row3['ueas_idueas'];
	        }
		}else{
			$datos=-1;
		}

        return $datos;
    }

    function traer_siguiente($UEAsgt){

        $this->db->select('uea_seriada');
        $this->db->from('seriacion');
        $this->db->where('ueas_idueas',$UEAsgt);

        $anterior= $this->db->get();
		if(($anterior->num_rows())>0){ //Verificando si tengo datos a cargar
	        foreach ($anterior->result_array() as $index2 => $row3) {
	            $datos['ueasSiguientes'][$index2+1]=$row3['uea_seriada'];
	        }
		}else{
			$datos=-1;
		}

        return $datos;
    }
	
	function elimina_boligrama($matricula){
		$datos=Array(
			'alumnos_matricula' => $matricula,
		);
		
		//$this->db->delete('ueas_cursadas', $datos); 
	}
	
	function elimina_alumno($matricula){
			
		$datos=Array(
				'matricula' => $matricula,
		);
		//$this->db->delete('ueas_cursadas', $datos); 

		$datos=Array(
				'matricula' => $matricula,
		);
		//$this->db->delete('ueas_cursadas', $datos); 
	}

	function trae_creditos_licenciatura($idlicenciatura){
		$this->db->select('creditos');
        $this->db->from('licenciaturas');
        $this->db->where('idlicenciaturas',$idlicenciatura);

        $cred= $this->db->get();
		if(($cred->num_rows())>0){ //Verificando si tengo datos a cargar
	        foreach ($cred->result_array() as $valor) {
	            $datos[1]=$valor['creditos'];
	        }
		}else{
			$datos[1]=-1;
		}

        return $datos[1];
	}

	function trae_idLic($matricula){
		$this->db->select('licenciaturas_idlicenciaturas');
        $this->db->from('alumnos');
        $this->db->where('matricula',$matricula);

        $idL= $this->db->get();
		if(($idL->num_rows())>0){ //Verificando si tengo datos a cargar
	        foreach ($idL->result_array() as $valor) {
	            $datos[1]=$valor['licenciaturas_idlicenciaturas'];
	        }
		}else{
			$datos[1]=-1;
		}
      return $datos[1];
	}

	function trae_id_ueas_cursadas($matricula){
		$this->db->select('iduea');
        $this->db->from('ueas_cursadas');
        $this->db->where('alumnos_matricula',$matricula);

        $ueas_c= $this->db->get();
		if(($ueas_c->num_rows())>0){ //Verificando si tengo datos a cargar
			$indice=1;
	        foreach ($ueas_c->result_array() as $valor) {
	            $datos[$indice]=$valor['iduea'];
				$indice++;
	        }
		}else{
			$datos=-1;
		}
      return $datos;			
	}

	function trae_creditos_uea($iduea){
			
		$this->db->select('creditos');
        $this->db->from('ueas');
        $this->db->where('idueas',$iduea);

        $credU= $this->db->get();
		if(($credU->num_rows())>0){ //Verificando si tengo datos a cargar
	        foreach ($credU->result_array() as $valor) {
	            $datos[1]=$valor['creditos'];
	        }
		}else{
			$datos[1]=-1;
		}
      return $datos[1];		
		
	}

	function inserta_uea_cursada($matricula, $iduea){
		$datos=Array(
			'alumnos_matricula' => $matricula,
			'iduea' => $iduea,
		);
		
		$this->db->insert('ueas_cursadas', $datos);
	}

        function valida_inserta_uea($matricula, $iduea){
        
        $this->db->select('alumnos_matricula');
        $this->db->from('ueas_cursadas');
        $this->db->where('alumnos_matricula',$matricula);
        $this->db->where('iduea',$iduea);
        
        $existe= $this->db->get();
        
        if(($existe->num_rows())>0){ //Verificando si tengo datos a cargar
            return 1;
        }else{
            return -1;
        }
    }

        public function eliminaMateria($matricula){

            $this->db->select('iduea');
            $this->db->from('ueas_cursadas');
            $this->db->where('iduea', $matricula);
            if($this->db->delete('ueas_cursadas')){
                /* Regresa la cadena al controlador*/
                return ($mensaje = 'Hecho');
                
            }else{
                $mensaje['error'] = $this->db->_error_message();
                /* Regresa la cadena al controlador*/
                return $mensaje;
            }
        }

}


?>