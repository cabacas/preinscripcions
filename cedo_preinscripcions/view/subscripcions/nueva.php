<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Nova Subscripció</title>
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
			<h2>Nova Subscripció</h2>
			<form method="post" id="formulario">
				 	<label>Area Formativa:</label>
				 	<select  name='id_area' required="required">
						<option value=0 >Altres</option>	
						<option value=1 >Soldadura</option>	
						<option value=2 >Mecànica Convencional</option>	
						<option value=3 >Disseny Mecànic</option>	
						<option value=4 >Electricitat</option>	
						<option value=5 >Logística</option>	
						<option value=6 >Comunicacions - microinformàtica</option>	
						<option value=7 >Programació i web</option>	
						<option value=8 >PLCs i automatismes</option>	
						<option value=9 >Pneumàtica i hidràulica</option>	
						<option value=10 >e-commerce</option>	
						<option value=11 >Fontanería, climatització i calefacció</option>		       								 	
					</select><br>				 	
				 	<label>DNI Usuari:</label>
				 	<input type='text' name='dni' /><br>
				 				 	    
			 	    <input type='submit' value='guardars' class="botonguardar" title="guardar" name='nuevo'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>