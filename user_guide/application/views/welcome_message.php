<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?=base_url();?>/static/CSS/index.css"
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
		<!--<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->
	</head>
	
	<body>
		<?=base_url();?> <= esto es lo que me regresa el base_url
		<div data-role="index" id="index" name="index" class="index">
			<div data-role="header" id="header" > <!--Aqui comienza el encabezado-->
				<img id="uamizt" src="<?=base_url();?>/static/img/LOGO_UAM.GIF"> <br />
			</div><!--Aquí termina mi encabezado-->


			<div data-role="content"> 
				<form method="post" action="<?php echo base_url();?>index.php/intermedio">
					<label for="matricula">Matricula:</label><br />
					<input type="text" name="matricula" id="matricula" value="" placeholder="Introduce tu matricula" />
					<br /><br />
				
					<label for="pass">Password:</label><br />
					<input type="password" name="pass" id="pass" value="" placeholder="Password" />
					<br /><br />

					<button type="submit" class="button">Entrar</button>
    			
					<button type="button"  class="button" id="registro">Registar</button>
    			
				</form>
			</div>
		</div>
	</body>
</html>
			
