<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 
	function __construct(){
     	parent::__construct();
     	$this->load->helper(array('html', 'url'));
		$this->load->library('session');
      	$this->load->model('Login_m'); // Load the model
		
    }

	public function index(){
		$this->load->view('login_v');	
	}
}