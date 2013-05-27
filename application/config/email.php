<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	
	$config['protocol'] = 'mail';
	$config['wordwrap'] = FALSE;				
	//$config['mailtype']='html';
	//$config['protocol']    = 'smtp';
	$config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '45';
    $config['smtp_user']    = 'pedidosrawcomics@gmail.com';
    $config['smtp_pass']    = '#Linux_172';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['validation'] = TRUE; 
?>
