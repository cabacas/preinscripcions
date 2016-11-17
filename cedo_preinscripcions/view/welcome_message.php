<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Portada</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>

		<section id="content">
			<h2>Presentación</h2>
			<p>Este micro framework ha sido desarrollado con fines docentes para el CP de 
			desarrollo de aplicaciones con tecnologías web (IFCD0210) que imparte Robert Sallent.</p>
			
			<p>Es un ejemplo de arquitectura modelo-vista-controlador sencillo para entender los
			conceptos y poder trabajar con él.</p>
			
			<p>A lo largo del curso se desarrollarán varios proyectos de ejemplo usando este pequeño framework,
			para ir entendiendo los conceptos básicos comunes a este tipo de herramientas de trabajo MVC existentes en PHP.</p>
			
			<p>NO ES 100% SEGURO, así que no se debe usar para desarrollos en entornos de producción.</p>
			
			<p>En el mismo curso, en el último módulo, utilizaremos otro CodeIgniter para desarrollos más complejos.</p>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>