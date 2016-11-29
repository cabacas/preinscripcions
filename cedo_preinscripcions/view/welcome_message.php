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
			<p>Aquesta Aplicació ha estat realitzada per facilitar la preinscripció als cursos del CEDO.</p><br>
			<p>Els <b>Usuaris no registrats</b> podrán:</p> 
			<p> - Veure el llistat de cursos.</p>
			<p> - Veure els detalls de un curs seleccionat.</p>
			<p> - Registrarse.</p><br>			
			<p>Els usuaris es podrán registrar amb el DNI com usuari i la data de naixement (AAA-MM-DD) com a password.</p><br>
			<p>Un cop registrat al sistema els usuaris <b>registrats</b> més podrán:</p>
			<p> - Veure i modificar les dades del Alumne.</p>
			<p> - Donar-se de baixa a la Aplicació.</p>
			<p> - Preinscriure als cursos indicats.</p>
			<p> - Veure les preinscripcions del Alumne.</p>			
			<p> - Donar-se de baixa de les seves preinscripcions.</p>			
			<p> - Suscriures per rebre informació sobre els cursos de les arees formatives indicades.</p>
			<p> - Veure les subscripcions del Alumne.</p>			
			<p> - Donar-se de baixa de les seves subscripcions.</p><br>			
			<p>Per últim existirá un <b>perfil administrador</b> que podrá:</p>
			<p> - Conectar-se remotament.</p>
			<p> - Fer el manteniment (alta, modificació i baixa) de usuaris, cursos, arees formatives, preinscripcions i suscripcions .</p>   
			<p> - Adicionalment podrá imprimir la llista de preinscripcions i exportar a XML las preinscripcións i Subscripcions.</p><br>   
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>