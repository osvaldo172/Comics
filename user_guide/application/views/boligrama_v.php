<html>
	<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="<?=base_url(); ?>static/foundation/stylesheets/foundation.min.css">
        <script src="<?=base_url(); ?>static/foundation/javascripts/foundation.min.js"></script>
        <script src="<?=base_url(); ?>static/foundation/javascripts/modernizr.foundation.js"></script>
        <script src="<?=base_url(); ?>static/foundation/javascripts/marketing_docs.js"></script>
        <script src="<?=base_url(); ?>static/js/jquery-1.8.2.js"></script>
        <link rel="stylesheet" href="<?=base_url();?>/static/CSS/boligrama.css">
        <link rel="stylesheet" href="<?=base_url();?>/static/foundation/stylesheet/foundation.top-bar.css">
        <script src="<?=base_url(); ?>static/js/boligrama.js"></script>
        
        <!--modificaciones-->
        <script src="<?=base_url() ?>static/js/jquery.popupWindow.js"></script>
        <script src="<?=base_url(); ?>static/js/boligrama.js"></script>
        
    </head>
	<body>
		<!--pre> < ?= print_r($licenciaturaId['ueasRelacionadas']) ?></pre-->
    <div class="row"> <!--Barra de navegación -->
        <div class="twelve columns">
            <ul class="nav-bar">
                <li class="nine columns"><a href="#">Boligrama</a></li>
                <li class="has-flyout three columns">
                  <a href="#">Opciones</a>
                  <a href="#" class="flyout-toggle"><span> </span></a>
                  <ul class="flyout" style="display: none; ">
                    <li><a href="http://localhost/Boligrama/index.php/boligrama_c/eliminarBoligrama/<?=$matricula?>" id="eliminarBoli">Eliminar boligrama</a></li>
                    <li><a href="http://localhost/Boligrama/index.php/boligrama_c/eliminarAlumno/<?=$matricula?>" id="eliminarCuenta">Eliminar cuenta</a></li>
                    <li><a href="http://localhost/Boligrama/index.php/boligrama_c/mostrarBoligrama/<?=$matricula?>" id="eliminarCuenta">Mostrar seriación</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </div><hr>
    
<script src="//www.w3resource.com/zurb-foundation3/foundation3/javascripts/foundation.min.js"></script>  
<script>  
$(document).foundationNavigation();  
</script>  

<div class="twelve columns">


                <?php if(isset($licenciaturaId['ueasRelacionadas'])){
                    for ($i=1; $i <13 ; $i++) {
                        echo "<div class='twelve columns filaUEA'>";
                        echo "<div class='two columns'>Trimestre".$i."</div>";
                        foreach($licenciaturaId['ueasRelacionadas'] as $UEA){ 
                            if ($UEA['trimestre']==$i) {?>
                        			<?php $id=$UEA['ueas_idueas'];?> 
                                <a href="<?= base_url().'index.php/boligrama_c/insertar_ueas_cursadas/'.$matricula.'/'.$UEA['ueas_idueas'] ?>">
                                    <div class="two columns cajaUEA" id=<?=$id?> >
                                        Clave:<?=$UEA['ueas_idueas'] ?><br> 
                                        UEA: <?=$UEA['nombre'] ?> <br>
                                        créditos: <?=$UEA['creditos'] ?> <br>
                                    </div>
                                </a>
                        <?php }
                            }
                        echo "</div>";
                        }
                    } ?>
			<hr>
			<div class="row">
				<div class="twelve columns">
					<p class="six columns">Créditos totales de la carrera: <?=$creditosL?></p>
					<p class="six columns">Créditos acumulados: <?=$creditosAlumno ?></p>
				</div>
			</div>             
			<div class="row">
				<p class="six columns">Tiempo aproximado para terminar:  </p>
			</div> 

            <?= ($ueasCursadas!=-1) ? $pintaCursada  :  "" ;?>
            <?= (isset($script)) ?  $script : " " ;?>

	</body>
</html>	