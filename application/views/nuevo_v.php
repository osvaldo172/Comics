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
   
	<body>
   		<title>Agrega nuevo comic</title>
   		</br>
   		<div class="row">
   			<div class="twelve columns">
   				<br>
   				
   				<div class="twelve columns">
			   		<div class="continer">
			   			<div class="menu">
							<dl class="tabs three-up">
								<dd class='active'><a href='#nuevo'  id='nuevo'> Nuevo </a></dd>
								<dd><a href='#editar' name='editar' id='editar'> Editar </a></dd>
								<dd><a href='#eliminar' name='eliminar' id='eliminar' > Eliminar </a></dd>
								
							</dl>
						</div>
						
						<ul class="tabs-content">
							<li class="active" id="nuevoTab">
								<fieldset>
									<h3>Ingresa los datos del nuevo comic</h3>
							
							
									<?php echo form_open_multipart('nuevo_c')?>
										<div class="row">
											<div class="six columns">
												<label for="idcomic">Ingresa identificador del comic:</label>
									  			<input type="text" id="idcomic" name="idcomic" value="<?php echo set_value('idcomic'); ?>" placeholder="Es numero del codigo de barras del comic"/>
									  			<?php echo form_error('idcomic'); ?>
									  		</div>
								  		</div>
										
										<div class="row">
									  		<div class="five columns">
												<label for="nombre">Nombre del comic:</label>
									  			<input type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>" placeholder="Nombre del comic"/>
									  			<?php echo form_error('nombre'); ?>
									  		</div>
									  	</div>
										
										<div class="row">				  			
											<div class="six columns">
												<label for="editorial_ideditorial" class="select">Editorial:</label>
												<select name="editorial_ideditorial" id="editorial_ideditorial">
													<?php foreach ($nombre as $valor) {
														$value=$valor['ideditorial'];
														$editorial=$valor['nombre'];
														$name='editorial_ideditorial' ?>
														<option id=<?= $editorial ?> name=<?= $name?> value=<?= $value ?>> <?= $editorial ?></option>	
															
													<?php } ?>
												</select>
											</div>
										</div>
										
										<div class="row">				  			
											<div class="six columns">
												<label for="edicion_idedicion" class="select">Edicion:</label>
												
												<select name="edicion_idedicion" id="edicion_idedicion">
													<?php foreach ($edicion as $valor) {
														$value=$valor['idedicion'];
														$edicion2=$valor['descripcion'];
														$name='edicion_idedicion' ?>
														<option id=<?= $edicion2 ?> name=<?= $name?> value=<?= $value ?>> <?= $edicion2 ?></option>	
															
													<?php } ?>
												</select>
											</div>
										</div>
										
										<div class="row">	
											<div class="ten columns">
												<label for="descripcion">Descripcion del comic:</label>
												<textarea name="descripcion" id="descripcion" rows="8" value="<?php echo set_value('descripcion'); ?>" placeholder="Escribe la descripcion del comic :)" size="500"/></textarea>
											  	<?php echo form_error('descripcion'); ?>
											</div>
										</div>
									  	
									  	<div class="row">
										  	<div class="six columns">
										  		<label for="fecha">Ingresa la fecha de salida del comic:</label>	
										  	</div>
										</div>
									  	
									  	<div class="row">
										  	<div class="three columns">
									  			<input type="date" id="fecha" name="fecha" value="<?php echo set_value('fecha'); ?>" placeholder="dd/mm/aaaa"/>
									  			<?php echo form_error('fecha'); ?>
									  		</div>
									  	</div>
								  		
								  		<div class="row">
									  		<div class="five columns">
												<label for="cantidad">Ingresa el numero de comics existentes:</label>
									  			<input type="number" id="cantidad" name="cantidad" value="<?php echo set_value('cantidad'); ?>" placeholder="Ingresa la cantidad de comics que se tienen"/>
									  			<?php echo form_error('cantidad'); ?>
									  		</div>
									  	</div>
									  	
									  	<div class="row">
									  		<div class="five columns">
												<label for="precio">Costo del comic:</label>
									  			<input type="text" id="precio" name="precio" value="<?php echo set_value('precio'); ?>" placeholder="Costo por pieza"/>
									  			<?php echo form_error('cantidad'); ?>
									  		</div>
									  	</div>
									  	
									  	<div class="row">
											<div class="five columns">
												<label for="imagen">Seleccione la imagen del comic:</label>
											</div>
									  	</di>
									  	
									  	
										<div class="row">
											<div class="twelve columns">
												<div class="five columns">									  	
														<!-- <?php echo form_open_multipart('pruebas_c/do_upload');?> -->
														<input type="file" name="userfile" id="userfile" size="20" />
												</div>
											</div>
										</div></br>
										
												  
									  	
									  	<div class="row">
											<input type="submit" id="registrar" class="button large offset-by-five" value="Registrar comic" />
										</div>
									</form>
								</fieldset>
							</li>
							
							<li id="editarTab">
								<fieldset>
									<h3>Editar comic</h3>
							
							
									<?php echo form_open_multipart('nuevo_c')?>
										<div class="row">
											<div class="six columns">
												<label for="idcomic">Ingresa identificador del comic:</label>
									  			<input type="text" id="idcomic" name="idcomic" value="<?php echo set_value('idcomic'); ?>" placeholder="Es numero del codigo de barras del comic"/>
									  			<?php echo form_error('idcomic'); ?>
									  		</div>
								  		</div>
										
										<div class="row">
									  		<div class="five columns">
												<label for="nombre">Nombre del comic:</label>
									  			<input type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>" placeholder="Nombre del comic"/>
									  			<?php echo form_error('nombre'); ?>
									  		</div>
									  	</div>
										
										<div class="row">				  			
											<div class="six columns">
												<label for="editorial_ideditorial" class="select">Editorial:</label>
												<select name="editorial_ideditorial" id="editorial_ideditorial">
													<?php foreach ($nombre as $valor) {
														$value=$valor['ideditorial'];
														$editorial=$valor['nombre'];
														$name='editorial_ideditorial' ?>
														<option id=<?= $editorial ?> name=<?= $name?> value=<?= $value ?>> <?= $editorial ?></option>	
															
													<?php } ?>
												</select>
											</div>
										</div>
										
										<div class="row">				  			
											<div class="six columns">
												<label for="edicion_idedicion" class="select">ddEdicion:</label>
												
												<select name="edicion_idedicion" id="edicion_idedicion">
													<?php foreach ($edicion as $valor) {
														$value=$valor['idedicion'];
														$edicion2=$valor['descripcion'];
														$name='edicion_idedicion' ?>
														<option id=<?= $edicion2 ?> name=<?= $name?> value=<?= $value ?>> <?= $edicion2 ?></option>	
															
													<?php } ?>
												</select>
												
											</div>
										</div>
										
										<div class="row">	
											<div class="ten columns">
												<label for="descripcion">Descripcion del comic:</label>
												<textarea name="descripcion" id="descripcion" rows="8" value="<?php echo set_value('descripcion'); ?>" placeholder="Escribe la descripcion del comic :)" size="500"/></textarea>
											  	<?php echo form_error('descripcion'); ?>
											</div>
										</div>
									  	
									  	<div class="row">
										  	<div class="six columns">
										  		<label for="fecha">Ingresa la fecha de salida del comic:</label>	
										  	</div>
										</div>
									  	
									  	<div class="row">
										  	<div class="three columns">
									  			<input type="date" id="fecha" name="fecha" value="<?php echo set_value('fecha'); ?>" placeholder="dd/mm/aaaa"/>
									  			<?php echo form_error('fecha'); ?>
									  		</div>
									  	</div>
								  		
								  		<div class="row">
									  		<div class="five columns">
												<label for="cantidad">Ingresa el numero de comics existentes:</label>
									  			<input type="number" id="cantidad" name="cantidad" value="<?php echo set_value('cantidad'); ?>" placeholder="Ingresa la cantidad de comics que se tienen"/>
									  			<?php echo form_error('cantidad'); ?>
									  		</div>
									  	</div>
									  	
									  	<div class="row">
									  		<div class="five columns">
												<label for="precio">Costo del comic:</label>
									  			<input type="text" id="precio" name="precio" value="<?php echo set_value('precio'); ?>" placeholder="Costo por pieza"/>
									  			<?php echo form_error('cantidad'); ?>
									  		</div>
									  	</div>
									  	
									  	<div class="row">
											<div class="five columns">
												<label for="imagen">Seleccione la imagen del comic:</label>
											</div>
									  	</di>
									  	
									  	
										<div class="row">
											<div class="twelve columns">
												<div class="five columns">									  	
														<!-- <?php echo form_open_multipart('pruebas_c/do_upload');?> -->
														<input type="file" name="userfile" id="userfile" size="20" />
												</div>
											</div>
										</div></br>
										
												  
									  	
									  	<div class="row">
											<input type="submit" id="registrar" class="button large offset-by-five" value="Registrar comic" />
										</div>
									</form>
														
								</fieldset>
							</li>
							<li id="eliminarTab">
								<fieldset>
									<h3>Estas en eliminar</h3>
								</fieldset>
							</li>
					
						</ul>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>