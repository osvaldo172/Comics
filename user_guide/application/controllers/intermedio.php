<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intermedio extends CI_Controller {
	 function __construct(){
               parent::__construct();
               $this->load->helper(array('html', 'url'));
               $this->load->model('Login_m'); // Load the model
               }


	public function index()
	{

		echo "hola";
	/**	print_r($_POST);

		$prueba=$this->Login_m->trae_matricula($_POST['matricula']);

		echo "aqui va el valor del modelo $prueba";

		$this->load->view('welcome_message');**/

		/*foreach($_POST as $campo => $valor){ 
   		    $datos[$campo] = $valor;
        }
		
		
		$entrar=$_POST[entrar];
		$registro=$_POST[registro];
		

		if(isset($dato[$campo]=entrar)){
			echo "entraste<br>";
			$matricula=$_POST[matricula];
			$pass=$_POST[pass];	
			$this->load->view('boligrama');
		
		//include("<?=base_url();? >/application/views/boligrama.php");
		}
	
		elseif (isset($registro)) {
			echo "registrate";
		}

		else{
			echo "no te has registrado";
		}*/

	}
}
?>