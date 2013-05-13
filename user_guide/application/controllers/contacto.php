<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');

	class Contacto extends CI_Controller
	{
		parent::__construct();
	}

	function index()
	{
		print_r($_POST);
		$this->load->view('contacto');
	}
}
?>	