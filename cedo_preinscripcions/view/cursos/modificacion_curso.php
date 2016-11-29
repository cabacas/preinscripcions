<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Modificació Curs</title>
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
			<h2>Modificació Curs</h2>
			<form method="post" id="formulario">
				 	<label>Codi:</label>
				 	<input type='text' name='codi' required="required" value="<?php echo $curso->codi;?>"/><br>
					<label>Selecciona Area Formativa:</label>
					<select  name="id_area" required="required"> 
					    <?php 
					    	foreach($areas as $c) {  
					     		echo '<option value="'.$c->id.'"';
						  		if($curso->id_area == $c->id)echo(" selected='selected' ");
						  		echo '>'.$c->nom.'</option>';
					    	}
				        ?>					
					</select><br>   
				 	<label>Nom Curs:</label>
				 	<input type='text' name='nom' required="required"  value="<?php echo $curso->nom;?>"/><br>
				 	<label>Descripció:</label>
					<textarea rows="12" cols="60" name='descripcio'> <?php echo $curso->descripcio;?></textarea><br>
				 	<label>Hores:</label>
				 	<input type='number' name='hores' min="1" max="100000"  value="<?php echo $curso->hores;?>"/><br>
				 	<label>Data d'Inici:</label>
				 	<input type='date' name='data_inici' value="<?php echo $curso->data_inici;?>"/><br>
				 	<label>Data d'Fi:</label>
				 	<input type='date' name='data_fi' value="<?php echo $curso->data_fi;?>"/><br>
				 	<label>Horari:</label>
				 	<input type='text' name='horari'  value="<?php echo $curso->horari;?>"/><br>
				 	<label>Torn:</label>
					<select  name='torn' >
					  <option value="M" <?php if($curso->torn == 'M'){echo("selected");}?>>Mañana</option>
					  <option value="T" <?php if($curso->torn == 'T'){echo("selected");}?>>Tarde</option>
					  <option value="N" <?php if($curso->torn == 'N'){echo("selected");}?>>Nocturno</option>
					</select><br>
				 	<label>Tipus:</label>
				 	<input type='text' name='tipus' value="<?php echo $curso->tipus;?>"/><br>
				 	<label>Requisits:</label>
				 	<input type='text' name='requisits'  value="<?php echo $curso->requisits;?>"/><br>
				 				 	    
			 	    <input type='submit' value='guardar' class="botoneditar" name='modificar'/><br>	 	
			 </form>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>