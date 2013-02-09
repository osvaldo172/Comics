<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

       class Login_m extends CI_Model{
       
               function __construct(){
                       parent::__construct();
                       $this->load->database(); 
                   	}
       
               function trae_matricula($matricula){
               		$this->db->select('matricula');
					$this->db->from('alumnos');
					$this->db->where('matricula', $matricula); 

					$resultado_mat=$this->db->get();

					if($resultado_mat->num_rows()==1){
                               $existe=1; //Usuario registrado                                
                       }else{
                               $existe=0; //Usuario no registrado
                        }

                   return ($existe);


               }

               function trae_pass($pass){
               		$this->db->select('contrasenia');
					$this->db->from('alumnos');
					$this->db->where('contrasenia', $pass); 

					$resultado_pass=$this->db->get();

					if($resultado_pass->num_rows()==1){
                               $existe=1; //Usuario registrado                                
                       }else{
                               $existe=0; //Usuario no registrado
                        }

                   return ($existe);

               }

                               
       } //Fin de la clase

?>