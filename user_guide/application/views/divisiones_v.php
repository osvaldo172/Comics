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
   </head>
   
   <body>
   		<title>Boligrama-Divisiones</title>
   		<div class="twelve columns">
	   		<div class="continer">
					<h3>Elige división y carrera</h3>
					<br>
					<dl class="tabs three-up">
						<?php foreach ($lDivisiones as $index=>$value) {
								 if($index==1){?>
									<dd class='active'><a href='#<?= $value['nombre']; ?>' id=<?= $value['nombre']?>> <?= $value['nombre']; ?> </a></dd>
								<?php }
								else{ ?>
								<dd><a href='#<?= $value['nombre']; ?>' id=<?= $value['nombre']?> > <?= $value['nombre'] ?> </a></dd>
							<?php } ?>
						<?php }	?>
					</dl>
	
					
					<ul class="tabs-content">
		            	<li class="active" id="CBITab">
	
							<dl class="vertical tabs twelve">
								<?php foreach ($lCBI as $value) {?>
									<dd class=''><a href='#' id=<?=$value['idlicenciaturas']?>> <?= $value['nombre'];?> </a></dd>
								<?php }	?>
							</dl>
	
		            	</li>
		            	
		            	<li id="CBSTab">
			            	
							<dl class="vertical tabs twelve">
								<?php foreach ($lCBS as $value) {?>
									<dd class=''><a href='#' id=<?=$value['idlicenciaturas']?>> <?= $value['nombre']; ?> </a></dd>
								<?php }	?>
							</dl>		
		            	</li>
		            	
		            	<li id="CSHTab">
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
	
	   		</div>
		</div>   	
   </body>
</html>