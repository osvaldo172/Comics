<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Loguin2_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('loguin2_m'); // Load the model
			
	   	}

    function index( $msg = NULL ){
 		$data['msg'] = $msg;
        $this->load->view('login2_v', $data);
    }
	
	
	 public function process(){
      
        $result = $this->loguin2_m->validate();// Validate the user can login         
		
		if(! $result){ // Now we verify the result
            // If user did not validate, then show them login page again
           	$msg = '<font color=red>Nombre de usuario y/o contraseña incorrectos</font><br/>';
			$this->index($msg);
			
        }else{
            // If user did validate, send them to members area
            redirect('boligrama2_c/mostrarBoligrama/207310034');
        }        
    } 
}
?>