<?php
	//Comentario. Conexión con la base de datos
   	$enlace = mysql_connect("localhost", "root", "207341483");
   	//echo "<br>", $matricula, "<br>";
   	//echo $pass, "<br>";
   	if (!$enlace) {
    	die('No se pudo conectar : ' . mysql_error());
	}
    else{
   		$bd_seleccionada = mysql_select_db("mydb", $enlace); //selecciona que base de datos se usara
   		echo "<br>";
   		//$tc2=include(conectar_alumnos.php);
   		$query="SELECT matricula, contrasenia FROM alumnos where (matricula='$matricula'  AND contrasenia='$pass')"; //hace la consulta
   		$resultado = mysql_query($query);  //Enviar una consulta MySQL
   		$tc=mysql_fetch_assoc($resultado); //Recupera una fila de resultados como un array asociativo
   		echo $query, "<br>";
   		print_r($tc);
		// Validas Si es Correcto Accesa Si no es correcto pues no Accesa 
		if ($tc["matricula"]==$matricula && $tc["contrasenia"]==$pass){
			echo "usuario valido";
		} else {
			echo "Error Usuario No valido";
		}
    }
?>