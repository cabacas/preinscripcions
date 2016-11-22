<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Nou Curs</title>
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
			<h2>Nou Curs</h2>
			<form method="post" id="formulario">
				 	<label>Codi:</label>
				 	<input type='text' name='codi' required="required" /><br>
				 	<label>id_area:</label>
				 	<input type='text' name='id_area' required="required" /><br>
				 	<label>Nom Curs:</label>
				 	<input type='text' name='nom' required="required" /><br>
				 	<label>Descripció:</label>
					<textarea rows="12" cols="60" name='descripcio' required="required"></textarea><br>
				 	<label>Hores:</label>
				 	<input type='number' name='hores' min="1" max="100000" /><br>
				 	<label>Data d'Inici:</label>
				 	<input type='date' name='data_inici'/><br>
				 	<label>Data d'Fi:</label>
				 	<input type='date' name='data_fi'/><br>
				 	<label>Horari:</label>
				 	<input type='text' name='horari'/><br>
				 	<label>Torn:</label>
				 	<input type='text' name='torn' /><br>
				 	<label>Tipus:</label>
				 	<input type='number' name='tipus' min="1" max="50" /><br>
				 	<label>Requisits:</label>
				 	<input type='text' name='requisits' /><br>
				 				 	    
			 	    <input type='submit' value='guardar' name='nuevo'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>