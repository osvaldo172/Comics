<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 
	function __construct(){
     	parent::__construct();
     	$this->load->helper(array('html', 'url'));
		$this->load->library('session');
      	$this->load->model('Login_m'); // Load the model
		
    }

	public function index($msg = NULL){
		$data['msg'] = $msg;
        $this->load->view('login_v', $data);
	}
	
	function process(){
        $result = $this->Login_m->validarLogin();// Validando al usuario         
		
		if(! $result){ 
           	$msg = '<font class="error">Nombre de usuario y/o contraseña incorrectos</font><br />';
			$this->index($msg);
			
        }else{ //Redirecciona las páginas para cuando la sesión ha expirado
        $datos2['idcomic'] = htmlentities($_POST['idcomic']);
				$datos2['nombre'] = htmlentities($_POST['nombre']); 
        	$newdata = array(
                   'usuario'  => htmlentities($_POST['usuario']),
                   'password'     => htmlentities($_POST['password']),
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($newdata);
       		redirect(base_url().'index.php/nuevo_c');
			break;   
		}  
    }
	
}