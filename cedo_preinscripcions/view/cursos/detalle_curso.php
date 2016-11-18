<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>LListat de Cursos</title>
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
			<h2>Detalles del Curso</h2>
		<?php
				echo '';
				echo "<p> ID: $curso->id </p>";
				echo "<p> CODI: $curso->codi </p>";
				echo "<p> ID_AREA: $curso->id_area </p>";
				echo "<p> NOM CURS: $curso->nom </p>";
				echo "<p> DESCRIPCIÓ: $curso->descripcio </p>";
				echo "<p> HORES: $curso->hores </p>";
				echo "<p> DATA D'INICI: $curso->data_inici </p>";
				echo "<p> DATA DE FI: $curso->data_fi </p>";
				echo "<p> HORARI: $curso->horari</p>";
				echo "<p> TORN: $curso->torn </p>";
				echo "<p> TIPUS: $curso->tipus </p>";
				echo "<p> REQUSITS: $curso->requisits</p>";
				echo '<p><b><a href="index.php?controlador=preinscipcion&operacion=guardar&parametro='.$curso->id.'" >Preinscrivirse</a></b></p>';
				echo '';
		?>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>