<html>
<head>
<title>Formulario de carga de archivos</title>
</head>
<body>
<h3>Su archivo fue exitosamente subido!</h3>
<ul>
<?php foreach($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<p><?php echo anchor('upload', 'Subir otro archivo!'); ?></p>
</body>
</html>
