<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/foundation.min.css">
		<script src="<?=base_url(); ?>static/foundation/javascripts/foundation.min.js"></script>
        <script src="<?=base_url(); ?>static/foundation/javascripts/modernizr.foundation.js"></script>
		<script src="<?=base_url(); ?>static/foundation/javascripts/marketing_docs.js"></script>

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

				<?php foreach ($records as $value) {?>
					<dd id=<?=$value['nombre']?>>
						<div class="par_text">
							<h5><?= $value['nombre'];?> </h5> </br> 
						</div>
						<?= $value['descripcion'];?>
						</dd>	
				<?php } ?>
						
		   		<?php print_r($records); 
				echo "<br><br>";
		   		$this->table->generate($records);
				print_r($records);
				//Creamos la páginación
				echo $this->pagination->create_links(); ?>
							            		

			</div>
		</div>
	</body>
</html>