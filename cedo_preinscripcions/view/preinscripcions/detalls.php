<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Detall Preinscripció</title>
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
			<h2>Detall Preinscripció</h2>
		<?php
				
			echo "<p> DNI: $usuario->dni </p>";
			echo "<p> NOM: $preinscripcion->nom </p>";
			echo "<p> TEL. MOBIL: $usuario->telefon_mobil </p>";
			echo "<p> TEL. FIXE: $usuario->telefon_fix</p>";
			echo "<p> EMAIL: $usuario->email</p>";
			echo "<p> DATA: $preinscripcion->data</p>";
			echo "<p> ID CURS: $preinscripcion->id_curs</p>";
			echo '<p><b><a href="index.php?controlador=preinscripcion&operacion=baja&parametro='.
					$usuario->dni.'" >Baixa Preinscripció</a></b></p>';
								
		?>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>