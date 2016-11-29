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
					<label>Selecciona el Curs:</label>
					<select  name='id_curs' required="required"> 
					    <?php foreach($cursos as $c)   
					      echo '<option value="'.$c->id.'" >'.$c->nom.'</option>';
				        ?>					
					</select><br>				 	
				 	<br>				 	
				 	<label>DNI Usuari:</label>
				 	<input type='text' name='dni'  required="required" placeholder="99888777V"/>
				 				 	    
			 	    <input type='submit' value='guardarp' class="botonguardar" title="nova preinscripció" name='nuevo'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>