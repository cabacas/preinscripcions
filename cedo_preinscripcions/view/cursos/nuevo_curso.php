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
				 	<input type='text' name='codi' required="required" />
					<label>Selecciona Area Formativa:</label>
					<select  name='id_area' required="required"> 
					    <?php foreach($areas as $c)   
					      echo '<option value="'.$c->id.'" >'.$c->nom.'</option>';
				        ?>					
					</select><br>					
				 	<label>Nom Curs:</label>
				 	<input type='text' name='nom' required="required" />
				 	<label>Tipus:</label>
				 	<input type='number' name='tipus' min="1" max="50" /><br>
				 	<label>Data d'Inici:</label>
				 	<input type='date' name='data_inici'/>
				 	<label>Data d'Fi:</label>
				 	<input type='date' name='data_fi'/><br>
				 	<label>Horari:</label>
				 	<input type='text' name='horari'/>
				 	<label>Torn:</label>
				 	<input type='text' name='torn' /><br>
				 	<label>Requisits:</label>
				 	<input type='text' name='requisits' />
				 	<label>Hores:</label>
				 	<input type='number' name='hores' min="1" max="100000" /><br>
				 	
				 	<label>Descripció:</label>
					<textarea rows="12" cols="60" name='descripcio' required="required"></textarea>
			 	    <input type='submit' value='guardar' class="botonguardar" title="guardar curs" name='nuevo'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>