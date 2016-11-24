<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Nova Preiscripció</title>
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
			<h2>Nova Preiscripció</h2>
			<form method="post" id="formulario">
				 	<label>Id_Curs:</label>
				 	<input type='text'  name='id_curs' required="required"/><br>				 	
				 	<label>DNI Usuari:</label>
				 	<input type='text' name='dni' /><br>
				 				 	    
			 	    <input type='submit' value='guardarp' name='nuevo'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>