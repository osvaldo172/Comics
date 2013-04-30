<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/foundation.min.css">
		<script src="<?=base_url(); ?>static/foundation/javascripts/foundation.min.js"></script>
        <script src="<?=base_url(); ?>static/foundation/javascripts/modernizr.foundation.js"></script>
		<script src="<?=base_url(); ?>static/foundation/javascripts/marketing_docs.js"></script>
		<script src="<?=base_url(); ?>static/js/jquery-1.8.2.js"></script>
		<script src="<?=base_url(); ?>static/js/comics.js"></script>
		<link rel="stylesheet" href="<?=base_url();?>/static/CSS/comic.css">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
		<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Eater' rel='stylesheet' type='text/css'>
		
   </head>
   
   <body>
   		<div data-role="header" class="header">
				<h1>COMICSCRIPT</h1>
				<div class="row">
				<form  method='post' action="<?=base_url();?>index.php/buscador/busqueda">
					<div class="ten columns">
						<input type="text" name="buscar" id="buscar">
					</div>
					<div class="two columns">
						<input type="submit" value="Buscar" name="boton_buscar" id="boton_buscar">
					</div> 
				</form>
			</div>			
		</div><!--Aquí termina header-->
   		<title>Comicscript</title>
   		</br>
   		<div class="row">
		
	   		<div class="twelve columns">
		   		<div class="continer">
		   			<div class="menu">
						<dl class="tabs three-up">
							<!--<?php $dir_marvel=base_url().'index.php/marvel_c/index';?>-->
							<?php foreach ($lEditoriales as $index=>$value) {
								if($index==1){?>
									<dd><a href='#<?= $value['nombre']; ?>'  onclick='redireccionar2(<?= $value['nombre']?>);' id=<?= $value['nombre']?>> <?= $value['nombre']; ?> </a></dd>
								<?php }
								else{ ?>
									<dd><a href='#<?= $value['nombre']; ?>' onclick='redireccionar(<?= $value['nombre']?>);' id=<?= $value['nombre']?> > <?= $value['nombre'] ?> </a></dd>
								<?php }
							}	?>
							<dd class='active'><a href='#'  id='Busqueda'> Busqueda</a></dd>
						</dl>
					</div>
			
						<ul class="tabs-content">
			            	<li class="active" id="MarvelTab">
								<dl class="vertical tabs twelve">
									
									<?php
										echo $lcadena;
										print_r($resultado);	
									?>
								
										
			            	</li>
	
								
	
			            	<li id="DCTab">
			            		
								<dl class="vertical tabs twelve">
									
									
								</dl>	
			            	</li>
			            	
			            </ul>	
			            		
				</div>
			</div>
		</div>
	</body>
</html>