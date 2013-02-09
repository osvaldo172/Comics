<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

  	<link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/app.css">
 
  	<script src="<?=base_url(); ?>static/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>static/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>static/foundation/javascripts/modernizr.foundation.js"></script>

</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				
				<fieldset >
					
					<form class="custom" action="" method="post">
						<div class="row">
							<label for="matriculaInput">Matricula</label>
				  			<input type="text" id="matriculaInput" name="matriculaInput"/>
				  		</div>
						<div class="row">
							<label for="passInput">Contraseña</label>
				  			<input type="password" id="passInput" name="passInput"/>
				  		</div>
						<div class="row">
							<label for="pass2Input">Repite contraseña</label>
				  			<input type="password" id="pass2Input" name="pass2Input"/>
				  		</div>				  		
						<div class="row">
							<label for="correoInput">Correo</label>
				  			<input type="text" id="correoInput" name="correoInput"/>
				  		</div>
				  		
						<div class="row">
					       	<label for="divisionesDropdown">División</label>
							  	<select id="divisionesDropdown" name="divisionesDropdown">
									<?php 
										$add='division';
										foreach ($listaDivisiones['divisiones'] as $indice => $valor) {
											$divisionid=$add.strtolower($valor);
											echo "<option id=$divisionid name=$divisionid>"; print_r($valor); echo "</option>";	
										}
								    ?>
						  		</select>
						</div>				  		
				  		
						<input type="submit" id="registroBtn" class="button offset-by-two" value="Registrar" />
					
					</form>
				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
