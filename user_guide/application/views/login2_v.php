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
			<div class="eight columns offset-by-two">
				<br><br>
				<p class="instrucciones">Introduzca sus datos para ingresar al sistema</p>
				<fieldset>
					<form action='<?php echo base_url();?>index.php/loguin2_c/process' method='post' name='process'>
						<?php if(! is_null($msg)) echo $msg;?>			
						<label for="usuarioInput">Usuario</label>
				  		<input type="text" id="usuarioInput" name="usuarioInput" />
					  
						<label for="passInput">Contraseña</label>
				  		<input type="password" id="passInput" name="passInput"/>
				  		
  						<input type="submit" id="LogueoAdminBtn" class="button large offset-by-five" value="Ingresar" />
					</form>
				</fieldset>
	
				<p><a class="six columns OlvidoPassBtn" href="divisiones_c/" id="OlvidoPassBtn">REGISTRO</a></p>
				<p><a class="six columns OlvidoPassBtn" href="#" id="OlvidoPassBtn">¿Olvidó su contraseña?</a></p>

			</div><!--twelve columns-->
		</div> <!--row-->

</body>
</html>
