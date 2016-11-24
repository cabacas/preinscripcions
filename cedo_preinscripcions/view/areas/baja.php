<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Esborrar Area Formativa</title>
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
			<h2>Esborrar Area Formativa</h2>
			<form method="post" id="formulario">
				<label>Id Area Formativa:</label>
				<input type='text' name='id' readonly="readonly" required="required" value="<?php echo $area->id;?>"/><br>
			 	<label>Nom Area:</label>
				 <input type='text' name='nom' readonly="readonly" required="required"  value="<?php echo $area->nom;?>"/><br>
				 				 	    
		 	    <input type='submit' value='Confirmar Esborrar' name='borrar'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>