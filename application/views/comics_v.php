<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link href='http://fonts.googleapis.com/css?family=Eater' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/foundation.min.css">
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
   
   <body>
   		<div class="header">
   			</br>
			<h4>COMICSCRIPT</h4>
			</br>
			<div class="row">
				<span><?php echo validation_errors(); ?></span>
				<form method="post" action="<?=base_url();?>index.php/buscador/busqueda" accept-charset="utf-8"> 
					<div class="ten columns">
						<input type="text" name="buscar" id="buscar">
					</div>
					<div class="boton_busca">
						<input type="submit" value="Buscar" name="boton_buscar" id="boton_buscar">
					</div> 
				</form>
			</div>			
		</div><!--Aquí termina header-->
		 <div class="color12"> <!--Aquí iran las images-->

   		<title>Comicscript</title>
   		</br>

   		<div class="row">
   			
   			
	   		<div class="twelve columns">
		   		<div class="continer">
		   			<div class="menu">
						<dl class="tabs three-up">
							<?php $dir_marvel=base_url().'index.php/marvel_c/index';?>
							<?php foreach ($lEditoriales as $index=>$value) {
								if($index==1){?>
									<dd class='active'><a href='#<?= $value['nombre']; ?>'  onclick='redireccionar2(<?= $value['nombre']?>);' id=<?= $value['nombre']?>> <?= $value['nombre']; ?> </a></dd>
								<?php }
								else{ ?>
									<dd><a href='#<?= $value['nombre']; ?>' onclick='redireccionar(<?= $value['nombre']?>);' id=<?= $value['nombre']?> > <?= $value['nombre'] ?> </a></dd>
								<?php }
							}	?>
							<!--<dd><a href='https://www.google.com.mx/' id='Blog' > Blog </a></dd>-->
							
						</dl>
					</div>
			
						<ul class="tabs-content">
			            	<li class="active" id="MarvelTab">
								<dl class="vertical tabs twelve">
									
									<?php $i=0;
									foreach ($lMarvel as $value) {?>
										<?php
										$aux=$i%2;
										if ($aux==0) { ?>
											<dd id=<?=$value['nombre']?>>
												<div class="par_img">
													<img src="<?=base_url(); ?>static/img/<?= $value['imagen'];?>"><br>
													Precio: <?= $value['precio'];?> </br>
													Comics en existencia: <?= $value['cantidad'];?>
											       	<button id="toggle_par" class="button">Comprar</button>
											       	<div class="block_par"> 
														hola mundo </br>
														hola mundo </br>
														hola mundo </br>
														hola mundo </br>
													</div>	
											      
													<script>
														var $block1 = $('.block_par');
														/* Toggle a sliding animation animation */
														$('#toggle_par').on('click', function() {
														    $block1.stop().slideToggle();
														});
													</script>
													
													
												</div> 
												<div class="par_text">
													<h5><?= $value['nombre'];?> </h5> </br> 
												</div>
													<?= $value['descripcion'];?>
											</dd>	
											
										<?php $i++; } else { ?>
											<dd id=<?=$value['nombre']?>>
												<div class="impar_img"> 
													<img src="<?=base_url(); ?>static/img/<?= $value['imagen'];?>"><br>
													Precio: <?= $value['precio'];?></br>
													Comics en existencia: <?= $value['cantidad'];?>
													<button id="toggle_impar" class="button">Comprar</button>
											       	<div class="block_impar"> 
														hola mundo </br>
														hola mundo </br>
														hola mundo </br>
														hola mundo </br>
													</div>	
											      
													<script>
														var $block_impar = $('.block_impar');
														/* Toggle a sliding animation animation */
														$('#toggle_impar').on('click', function() {
														    $block_impar.stop().slideToggle();
														});
													</script>	
												</div> 
												<div class="impar_text">
													<h5><?= $value['nombre'];?> </h5> </br> 
													<?= $value['descripcion'];?>
												</div>
											</dd>	
											
										<?php $i++; } ?>		
									
									<?php }	?>
									<?php echo $this->pagination->create_links(); ?>
								</dl>		
			            	</li>
	
								
	
			            	<li id="DCTab">
			            		
								<dl class="vertical tabs twelve">
									
									
								</dl>	
			            	</li>
			            	
			            </ul>	
			            		
				</div>
				
				
				
			</div>
		</div>
		</div><!--Aquí termina donde iran las imageness-->
	</body>
</html>