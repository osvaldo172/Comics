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
												    </div> 
												    
													<div class="row">
														<div class="par_text">
															<h5><?= $value['nombre'];?> </h5> </br> 
														</div>
															<?= $value['descripcion'];?>	
													</div>
	
											       	<div class="block_par"> 
											       		
											       		<?php

															$idcomic=$value['idcomic'];
															$url=base_url()."index.php/comics_c/correo/".$idcomic;
															print_r($url);
											       		?>  
							
														<form method="post" action="<?= $url ?>" accept-charset="utf-8"> 
															<div class = "row">
																<div class="five columns">
																	<label for="cliente">Ingrese su nombre:</label>
																	<input type="text" id="cliente" name="cliente" required value="<?php echo set_value('cliente'); ?>"/>
																	<?php echo form_error('cliente'); ?>
																</div>	
															</div>
															
															<div class = "row">
																<div class="five columns">
																	<label for="correo">Ingrese su correo:</label>
																	<input type="email" id="correo" title="Correo invalido" name="correo" required value="<?php echo set_value('correo'); ?>"/>
																	<?php echo form_error('correo'); ?>
																</div>	
															</div>
															
															<div class = "row">
																<div class="five columns">
																	<label for="telefono">Ingrese su telefono:</label>
																	<input type="text" id="telefono"  title="Telefono invalido, ejemplo 55657611 ó 5513815414" pattern="[0-9]{10}" name="telefono" value="<?php echo set_value('telefono'); ?>"/>
																	<?php echo form_error('telefono'); ?>
																</div>	
															</div>		
															
															<div class="ten columns">
																<label for="direccion">Direccion completa:</label>
																<textarea name="direccion" id="direccion" rows="8" value="<?php echo set_value('direccion'); ?>" placeholder="Escribir toda su direccion completa calle, colonia, estado, delegacion" size="500"/></textarea>
															  	<?php echo form_error('direccion'); ?>
															</div>	
															
															<div class="row">
																<input type="submit" id="compra_cliente" class="button large offset-by-five" value="Enviar" />
															</div>
															
														</form>
													</div>	
													<script>
														var $block1 = $('.block_par');
														/* Toggle a sliding animation animation */
														$('#toggle_par').on('click', function() {
															
														    $block1.stop().slideToggle();
														});
													</script>
												</dd>	
												
											<?php $i++; } else { ?>
												<dd id=<?=$value['nombre']?>>
													<div class="impar_img"> 
														<img src="<?=base_url(); ?>static/img/<?= $value['imagen'];?>"><br>
														Precio: <?= $value['precio'];?></br>
														Comics en existencia: <?= $value['cantidad'];?>
													
														<button id="toggle_impar" class="button">Comprar</button>
													</div>
												      
													<div class="row"> 
														<div class="impar_text">
															<h5><?= $value['nombre'];?> </h5> </br> 
															<?= $value['descripcion'];?>
														</div>
													</div>
													
													 <div class="block_impar"> 
														<form method="post" action="#" accept-charset="utf-8"> 
															<div class = "row">
																<div class="five columns">
																	<label for="cliente">Ingrese su nombre:</label>
																	<input type="text" id="cliente" name="cliente" value="<?php echo set_value('cliente'); ?>"/>
																	<?php echo form_error('cliente'); ?>
																</div>	
															</div>
															
															<div class = "row">
																<div class="five columns">
																	<label for="correo">Ingrese su correo:</label>
																	<input type="text" id="correo" name="correo" value="<?php echo set_value('correo'); ?>"/>
																	<?php echo form_error('correo'); ?>
																</div>	
															</div>
															
															<div class = "row">
																<div class="five columns">
																	<label for="telefono">Ingrese su telefono:</label>
																	<input type="text" id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>"/>
																	<?php echo form_error('telefono'); ?>
																</div>	
															</div>		
															
															<div class="ten columns">
																<label for="direccion">Direccion completa:</label>
																<textarea name="direccion" id="direccion" rows="8" value="<?php echo set_value('direccion'); ?>" placeholder="Escribir toda su direccion completa calle, colonia, estado, delegacion" size="500"/></textarea>
															  	<?php echo form_error('direccion'); ?>
															</div>	
															
															<div class="row">
																<input type="submit" id="compra_cliente" class="button large offset-by-five" value="Enviar" />
															</div>
															
														</form>
													</div>	
												      
													<script>
														var $block_impar = $('.block_impar');
														/* Toggle a sliding animation animation */
														$('#toggle_impar').on('click', function() {
															
														    $block_impar.stop().slideToggle();
														});
													</script>	
													
												</dd>	
												
											<?php $i++; } ?>		
										
										<?php }	?>
										<?php echo $this->pagination->create_links(); ?>
									</dl>		
				            	</li>

				            	<li id="DCTab">
	
									</dl>	
				            	</li>
				            	
				            </ul>	
				            		
					</div>		
				</div>
			</div>
		</div><!--Aquí termina donde iran las imageness-->
	</body>
</html>