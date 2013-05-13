<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('matricula, contrasenia');
   $this -> db -> from('alumnos');
   $this -> db -> where('matricula ' ,$username);
   $this -> db -> where('contrasenia' ,$password);
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   	{
	return $query->result();
   		}
   			else
   			{
     			return false;
   			}
 		}
	}
?>

