
<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
	 
	
class Boligrama_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model('boligrama_m');
        
    }


    //Aquí he modificado
    public function editarBoligrama ($matricula,$clave=0){

        $datos['licenciaturaId'] = $this->boligrama_m->traer_boligrama_m($matricula);
        $id_lic=$this->boligrama_m->trae_idLic($matricula);
        $datos['UEAAnterior'] = $this->boligrama_m->traer_anterior($clave);
        $datos['UEASiguiente'] = $this->boligrama_m->traer_siguiente($clave);
        $datos['creditosL'] = $this->boligrama_m->trae_creditos_licenciatura($id_lic);
        $datos['ueasCursadas'] =$this->boligrama_m->trae_id_ueas_cursadas($matricula);
        $datos['creditosAlumno'] =0;
        $datos['matricula']=$matricula;
        $datos['clave']=$clave;

        foreach ($datos['ueasCursadas'] as $valor) {
            $datos['creditosAlumno'] = $datos['creditosAlumno'] + $this->boligrama_m->trae_creditos_uea($valor);
        }

        if ($clave!= 0) {
            if ( $datos['UEASiguiente']!= '-1') {
                $datos['script']= "<script>";
                    $datos['script']=$datos['script']."$('#".$clave."').css('background-color','#A5CC9D');";
                    $datos['script']=$datos['script']."$('#".$clave."').css('color','#000');";

                    foreach ($datos['UEASiguiente']['ueasSiguientes'] as $UEA) {
                        $datos['script']=$datos['script']."$('#".$UEA."').css('background-color','#deeeb6');";
                        $datos['script']=$datos['script']."$('#".$UEA."').css('color','#000');";
                    }
             } else {
                $datos['script']= "<script>";
                    $datos['script']=$datos['script']."$('#".$clave."').css('background-color','#A5CC9D');";
                    $datos['script']=$datos['script']."$('#".$clave."').css('color','#000');";
                    $datos['script']=$datos['script']."</script>";

            }
            

           $datos['script']=$datos['script']."</script>";
        }
        // echo "<br>";print_r($datos['UEAAnterior']);
        // echo "<br>";print_r($datos['UEASiguiente']);     

         if ($datos['ueasCursadas']!=1) {
            $datos['pintaCursada']='<script>';
            foreach ($datos['ueasCursadas'] as $cursadaUEA ) { 

                $datos['pintaCursada']=$datos['pintaCursada']."$('#".$cursadaUEA."').css('background-color','#214112');";
                $datos['pintaCursada']=$datos['pintaCursada']."$('#".$cursadaUEA."').css('color','#dbdbdb');";

            } 
           $datos['pintaCursada']=$datos['pintaCursada'].'</script>';
        }


        $this->load->view('boligrama_v', $datos);
    }


    public function mostrarBoligrama ($matricula,$clave=0){

    	$datos['licenciaturaId'] = $this->boligrama_m->traer_boligrama_m($matricula);
		$id_lic=$this->boligrama_m->trae_idLic($matricula);
    	$datos['UEAAnterior'] = $this->boligrama_m->traer_anterior($clave);
		$datos['UEASiguiente'] = $this->boligrama_m->traer_siguiente($clave);
		$datos['creditosL'] = $this->boligrama_m->trae_creditos_licenciatura($id_lic);
		$datos['ueasCursadas'] =$this->boligrama_m->trae_id_ueas_cursadas($matricula);
		$datos['creditosAlumno'] =0;
		$datos['matricula']=$matricula;
        $datos['clave']=$clave;

		foreach ($datos['ueasCursadas'] as $valor) {
			$datos['creditosAlumno'] = $datos['creditosAlumno'] + $this->boligrama_m->trae_creditos_uea($valor);
		}

		if ($clave!= 0) {
            if ( $datos['UEASiguiente']!= '-1') {
                $datos['script']= "<script>";
                    $datos['script']=$datos['script']."$('#".$clave."').css('background-color','#A5CC9D');";
                    $datos['script']=$datos['script']."$('#".$clave."').css('color','#000');";

                    foreach ($datos['UEASiguiente']['ueasSiguientes'] as $UEA) {
                        $datos['script']=$datos['script']."$('#".$UEA."').css('background-color','#deeeb6');";
                        $datos['script']=$datos['script']."$('#".$UEA."').css('color','#000');";
                    }
             } else {
                $datos['script']= "<script>";
                    $datos['script']=$datos['script']."$('#".$clave."').css('background-color','#A5CC9D');";
                    $datos['script']=$datos['script']."$('#".$clave."').css('color','#000');";
                    $datos['script']=$datos['script']."</script>";

            }
            

           $datos['script']=$datos['script']."</script>";
        }
		// echo "<br>";print_r($datos['UEAAnterior']);
		// echo "<br>";print_r($datos['UEASiguiente']);		

         if ($datos['ueasCursadas']!=1) {
            $datos['pintaCursada']='<script>';
            foreach ($datos['ueasCursadas'] as $cursadaUEA ) { 

                $datos['pintaCursada']=$datos['pintaCursada']."$('#".$cursadaUEA."').css('background-color','#214112');";
                $datos['pintaCursada']=$datos['pintaCursada']."$('#".$cursadaUEA."').css('color','#dbdbdb');";

            } 
           $datos['pintaCursada']=$datos['pintaCursada'].'</script>';
        }

        $this->load->view('boligramaMuestraSeriacion_v', $datos);
    }
	//Hasta aquí he modificado


	public function eliminarBoligrama($matricula){
	
		$this->load->view('eliminar_boligrama_v');
		if($_POST!=NULL){
			echo "<br>mandará a llamar la función para eliminar boligrama";
			$this->boligrama_m->elimina_boligrama($matricula);
		}
				
	}
	
	public function eliminarAlumno($matricula){
		$this->load->view('eliminar_alumno_v');
		if($_POST!=NULL){
			echo "<br>mandará a llamar la función para eliminar usuario";
			$this->boligrama_m->elimina_alumno($matricula);
		}
	}
	
	public function insertar_ueas_cursadas($matricula, $clave){

        $datos['UEAAnterior'] = $this->boligrama_m->traer_anterior($clave);

        $datos['ueasCursadas'] =$this->boligrama_m->trae_id_ueas_cursadas($matricula);

        $datos['existe']=$this->boligrama_m->valida_inserta_uea($matricula, $clave);

        if ($datos['existe']== '-1') {

            if ($datos['ueasCursadas'] =='-1') {
                if ($datos['UEAAnterior'] =='-1') {
                    $this->boligrama_m->inserta_uea_cursada($matricula, $clave);
                }
            } else {

                if ($datos['UEAAnterior']!='-1') {

                    $contador=0;
                    foreach ($datos['UEAAnterior'] as $value) {
                        $contador=$contador+1;
                    }

                    foreach ($datos['ueasCursadas'] as  $ueasCursada) {
                        foreach ($datos['UEAAnterior']['ueasAnteriores'] as $anterior) {
                            if (($anterior == $ueasCursada) && ($ueasCursada != $clave)) {
                                $contador=$contador-1;
                                if ($contador==0) {
                                    $this->boligrama_m->inserta_uea_cursada($matricula, $clave);
                                }
                            }
                        }
                    }

                } else {
                    $this->boligrama_m->inserta_uea_cursada($matricula, $clave);

                }
            }

        } else {

            $this->boligrama_m->eliminaMateria($clave);
        }

        redirect(base_url().'index.php/boligrama_c/editarBoligrama/'.$matricula.'/'.$clave);
        

	}		

}

?>