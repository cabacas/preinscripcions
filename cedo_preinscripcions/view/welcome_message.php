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
			<h2>Presentació</h2>
			<p>Aquesta Aplicació ha estat realitzada per facilitar la preinscripció als cursos del cifo Vallés.</p>
			
			<p>Es un exemple de arquitectura model-vista-controlador.</p>
			
			<p>Els Usuaris no registrats només podrán veure el llistat de cursos i els detalls dels cursos.</p>
			
			<p>Els usuaris es podrán registrar amb el DNI com usuari i la data de naixement com a password.</p>
			
			<p>Un cop registrats al sistema es podrán preinscriure als cursos y suscriures per rebre informació 
			   sobre els cursos de les arees formatives indicades.</p>
			   
			<p>Per últim existirá un perfil administrador que podrá conectar-se remotament y fer el manteniment 
			   de usuaris, cursos, i suscripcions .</p>   
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>