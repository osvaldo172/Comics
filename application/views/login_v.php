<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link href='http://fonts.googleapis.com/css?family=Eater' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/foundation.min.css">
		<script>var base = "<?=base_url(); ?>"</script>
		<script src="<?=base_url(); ?>static/foundation/javascripts/foundation.min.js"></script>
        <script src="<?=base_url(); ?>static/foundation/javascripts/modernizr.foundation.js"></script>
		<script src="<?=base_url(); ?>static/foundation/javascripts/marketing_docs.js"></script>
		<script src="<?=base_url(); ?>static/js/jquery-1.8.2.js"></script>
		<link rel="stylesheet" href="<?=base_url();?>/static/CSS/comic.css">
<!-- 		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" /> -->
<!-- 		<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>  <!--FRAMEWORK JQUERY LIBRERÍA --> 
<!-- 		<script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
		<script src="<?=base_url(); ?>static/js/comics.js"></script>

   </head>
   
   <body><center>
   
   		<form method="post" action="<?=base_url(); ?>index.php/login" accept-charset="utf-8">
   			<?php if(! is_null($msg) AND $msg != 'NULL')
					echo $msg;?>	
				<dl class="vertical tabs twelve">
	   		<div class="login">
	
		   		<div class = "row">
					<div class="five columns">
						<label for="usuario">Ingrese su usuario:</label>
						<input type="text" id="usuario" name="usuario" required value="<?php echo set_value('usuario'); ?>"/>
						<?php echo form_error('usuario'); ?>
					</div>	
				</div>
																	
				<div class = "row">
					<div class="five columns">
						<label for="contrasenia">Ingrese su password:</label>
						<input type="password" id="contrasenia" name="contrasenia" required value="<?php echo set_value('contrasenia'); ?>"/>
						<?php echo form_error('correo'); ?>
					</div>	
				</div>
				
				<div class="boton_login">
					<div class="row"> 
						<input type="submit" id="registrar" class="button large offset-by-one" value="Entrar" />
					</div>
				</div>
	   		</div>
	   		
	   	</fieldset >
	   	</from>
   		</center>
   		
   </body>
</html>