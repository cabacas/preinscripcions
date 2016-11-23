<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Detall Curs</title>
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
			<h2>Detall Curs</h2>
		<?php				
				
			echo "<p> DNI: $preinscripcio->id </p>";
			echo "<p> NOM: $preinscripcio->codi </p>";
			echo "<p> TEL. MOBIL: $preinscripcio->id_area </p>";
			echo "<p> TEL. FIXE: $preinscripcio->nom </p>";
			echo "<p> EMAIL: $preinscripcio->descripcio </p>";
			echo "<p> DATA: $preinscripcio->hores </p>";
			echo "<p> ID CURS: $preinscripcion->id_curs </p>";
			echo '<p><b><a href="index.php?controlador=preinscripcion&operacion=baja&parametro='.
					$preinscripcio->id.'" >Baixa Preinscripció</a></b></p>';
								
		?>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>