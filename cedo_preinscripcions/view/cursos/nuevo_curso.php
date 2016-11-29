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
				 	<input type='text' name='codi' required="required" placeholder="11/17"/>
					<label>Selecciona Area Formativa:</label>
					<select  name='id_area' required="required"> 
					    <?php foreach($areas as $c)   
					      echo '<option value="'.$c->id.'" >'.$c->nom.'</option>';
				        ?>					
					</select><br>					
				 	<label>Nom Curs:</label>
				 	<input type='text' name='nom' required="required" placeholder="Reparación de Manguitos" />
				 	<label>Tipus:</label>
				 	<input type='text' name='tipus' required="required" placeholder="CP Nivel 3" /><br>
				 	<label>Data d'Inici:</label>
				 	<input type='date' name='data_inici' placeholder="2017-01-01"/>
				 	<label>Data d'Fi:</label>
				 	<input type='date' name='data_fi' placeholder="2017-05-15"/><br>
				 	<label>Horari:</label>
				 	<input type='text' name='horari' placeholder="De 8h a 14h"/>
				 	<label>Torn:</label>
				 	<input type='text' name='torn'  placeholder="M/T/N(Mañana, Tarde, Noche)" /><br>
				 	<label>Requisits:</label>
				 	<input type='text' name='requisits'  placeholder="Batxillerat"/>
				 	<label>Hores:</label>
				 	<input type='number' name='hores' min="1" max="100000" /><br>
				 	<label>Descripció:</label>
					<textarea rows="12" cols="60" name='descripcio' placeholder="breu descripció ..." ></textarea>

			 	    <input type='submit' value='guardar' class="botonguardar" title="guardar curs" name='nuevo'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>