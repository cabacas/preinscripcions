<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Nova Area Formativa</title>
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
			<h2>Nova Area Formativa</h2>
			<form method="post" id="formulario">
				 	<label>Nom Area:</label>
				 	<input type='text' name='nom' required="required" placeholder="Ej:Electromecànica" />
				 				 	    
			 	    <input type='submit' value='guardar'class="botonguardar" title="guardar àrea" name='nueva'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>