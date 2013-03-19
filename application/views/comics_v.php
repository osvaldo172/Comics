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
		<script src="<?=base_url(); ?>static/js/divisiones.js"></script>
		<link rel="stylesheet" href="<?=base_url();?>/static/CSS/comic.css">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
		<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Eater' rel='stylesheet' type='text/css'>
		
   </head>
   
   <body>
   		<div data-role="header" class="header">
				<h1>COMICSCRIPT</h1>		
		</div><!--Aquí termina header-->
   		<title>Comicscript</title>
   		</br>
   		<div class="row">
		
	   		<div class="twelve columns">
		   		<div class="continer">
		   			<div class="menu">
						<dl class="tabs three-up">
						
							<?php foreach ($lEditoriales as $index=>$value) {
								if($index==1){?>
									<dd class='active'><a href='#<?= $value['nombre']; ?>' id=<?= $value['nombre']?>> <?= $value['nombre']; ?> </a></dd>
								<?php }
								else{ ?>
									<dd><a href='#<?= $value['nombre']; ?>' id=<?= $value['nombre']?> > <?= $value['nombre'] ?> </a></dd>
								<?php }
							}	?>
							<dd><a href='#' id='Blog' > Blog </a></dd>
							
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
									
									<?php $i=0;
									foreach ($lDC as $value) {?>
									<?php
										$aux=$i%2;
										if ($aux==0) { ?>
											<dd id=<?=$value['nombre']?>>
												<div class="par_img">
													<img src="<?=base_url(); ?>static/img/<?= $value['imagen'];?>"><br>
													Precio: <?= $value['precio'];?></br>
													Comics en existencia: <?= $value['cantidad'];?> 
												</div> 
												<div class="par_text">
													<h5><?= $value['nombre'];?> </h5> </br> 
													<?= $value['descripcion'];?>
												</div>
											</dd>	
											
										<?php $i++; } else { ?>
											<dd id=<?=$value['nombre']?>>
												<div class="impar_img">
													<img src="<?=base_url(); ?>static/img/<?= $value['imagen'];?>"><br>
													Precio: <?= $value['precio'];?></br>
													Comics en existencia: <?= $value['cantidad'];?> 
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
			            </ul>	
			            		
			            	<!--<li id="CSHTab">
								<dl class="vertical tabs twelve">
									<?php foreach ($lCSH as $value) {?>
										<dd class=''><a href='#' id=<?=$value['idlicenciaturas']?>> <?= $value['nombre']; ?> </a></dd>
									<?php }	?>
								</dl>		
			            	</li>
			           		            	
				        </ul>	
				        <input type="hidden" id="divisiones" name="division" value="">
				        <input type="hidden" id="carrera" name="carrera" value="">
				        <input type="submit" class="button" value="Siguiente">	
		
		   		--></div>
			</div>
		</div>
	</body>
</html>